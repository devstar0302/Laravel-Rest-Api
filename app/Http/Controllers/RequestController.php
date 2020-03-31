<?php namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\User;
use Cartalyst\Sentinel\Laravel\Facades\Activation;
use File;
use Hash;
use Illuminate\Support\Facades\Request;
use Lang;
use Mail;
use Redirect;
use Sentinel;
use URL;
use View;
use Datatables;
use Validator;
use DB;
class RequestController extends JoshController
{

    /**
     * Show a list of all the users.
     *
     * @return View
     */
    public function index()
    {
        // Grab all the users
        //$users = User::All();

        // Show the page
        return View('admin.request.index', compact('users'));
    }

    /*
     * Pass data through ajax call
     */
    public function data()
    {
        //$users = User::get(['id', 'first_name', 'last_name', 'email', 'gender', 'postal','created_at']);
        /*$users = DB::table('users as u')
            ->join('role_users as ru', 'ru.user_id', '=', 'u.id')
            ->select(['u.id', 'u.first_name', 'u.last_name', 'u.email', 'u.gender', 'u.postal','u.created_at'])
            ->where('ru.role_id', 2)->orderby('u.id', 'desc');*/

        $users = User::select(['users.id', 'users.first_name', 'users.pic', 'users.last_name', 'oollah_user_details.verified_date', 'users.email', 'oollah_user_details.plan_id', 'oollah_merchant_plans.name as plan_name', 'oollah_merchant_plans.expired', 'oollah_merchant_plans.planunit', 'oollah_merchant_plans.price'])
            ->join('role_users', 'role_users.user_id', '=', 'users.id')
            ->leftJoin('oollah_user_details', 'oollah_user_details.user_id', '=', 'users.id')
            ->leftJoin('oollah_merchant_plans', 'oollah_merchant_plans.id', '=', 'oollah_user_details.plan_id')
            ->where('role_users.role_id', 4)->where('oollah_user_details.merchant_verified', 2)->orderby('id', 'desc');

        return Datatables::of($users)
            ->add_column('status',function($user){
                if($activation = Activation::completed($user))
                    return 'Activated';
                else
            		return 'Pending';

            })
            ->add_column('realname',function($user){
                return $user->first_name.' '.$user->last_name;
            })
            ->edit_column('pic',function($user){
                $photo = '<img src="/img/userimage.png" style="width:50px;height:50px;border-radius:50%"/>';
                if(!empty($user->pic)){
                    $photo = '<img src="/uploads/users/'.$user->pic.'" style="width:50px;height:50px;border-radius:50%"/>';
                }
                return $photo;
            })
            ->add_column('price',function($user){
                if($user->price == 0){
                    $user->price = 'FREE';
                }
                return $user->price;
            })
            ->edit_column('expired',function($user){
                $expired = $user->expired.' '.$user->planunit;
                return $expired;
            })
            ->add_column('actions',function($user) {
                $actions = '<a href='. url('/admin/request/verified/'.$user->id) .'><i class="livicon" data-name="check-circle" data-size="18" data-loop="true" data-c="rgb(248, 154, 20)" data-hc="rgb(248, 154, 20)" title="verified to merchant"></i></a>&nbsp;&nbsp;';
                $actions .= '<a href='. route('admin.merchant.show', $user->id) .'><i class="livicon" data-name="user-flag" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="view user"></i></a>&nbsp;&nbsp;';
                $actions .= '<a href='. url('/admin/request/delete/'. $user->id) .'><i class="livicon" data-name="user-remove" data-size="18" data-loop="true" data-c="#f56954" data-hc="#f56954" title="delete request"></i></a>';

                return $actions;
            }

            )
            ->make(true);
    }
    public function verified($id = 0)
    {
        // Get all the available groups
        \DB::table('oollah_user_details')->where('user_id', $id)->update(['merchant_verified'=>1]);
        //$user = \DB::table('oollah_user_details')->where('user_id', $userid)->first();
        \DB::table("role_users")->where('user_id', $id)->update(['role_id'=>'3']);
        // Show the page
        return Redirect::back();
    }
    public function delete($id = 0)
    {
        // Get all the available groups
        \DB::table('oollah_user_details')->where('user_id', $id)->update(['merchant_verified'=>0, 'plan_id'=>0, 'verified_date'=>'0000-00-00']);

        return Redirect::back();
    }

    /**
     * Create new user
     *
     * @return View
     */
    public function create()
    {
        // Get all the available groups
        $groups = Sentinel::getRoleRepository()->all();
        $groups = DB::table('roles')->where('id', 3)->get();

        $countries = $this->countries;
        // Show the page
        return View('admin/merchant/create', compact('groups', 'countries'));
    }

    /**
     * User create form processing.
     *
     * @return Redirect
     */
    public function store(UserRequest $request)
    {
        /*$rules = array(
            'pic_file' => 'image|mimes:jpg,jpeg,bmp,png',
        );

        $validator = Validator::make($request->only('pic_file'), $rules);

        if ($validator->fails()) {
            return Redirect::back()
                 ->with('error',Lang::get('users/message.error.file_type_error'))
                ->withInput();
        }*/

        //upload image
        if ($file = $request->file('pic_file')) {
            $fileName = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension() ?: 'png';
            $folderName = '/uploads/users/';
            $destinationPath = public_path() . $folderName;
            $safeName = str_random(10) . '.' . $extension;
            $file->move($destinationPath, $safeName);
            $request['pic'] = $safeName;
        }
        //check whether use should be activated by default or not
        $activate = $request->get('activate') ? true : false;

        try {
            // Register the user
            $user = Sentinel::register($request->except('_token', 'password_confirm', 'group', 'activate', 'pic_file'), $activate);

            //add user to 'User' group
            $role = Sentinel::findRoleById($request->get('group'));
            if ($role) {
                $role->users()->attach($user);
            }
            //check for activation and send activation mail if not activated by default
            if (!$request->get('activate')) {
                // Data to be used on the email view
                $data = array(
                    'user' => $user,
                    'activationUrl' => URL::route('activate', [$user->id, Activation::create($user)->code]),
                );

                // Send the activation code through email
                /*Mail::send('emails.register-activate', $data, function ($m) use ($user) {
                    $m->to($user->email, $user->first_name . ' ' . $user->last_name);
                    $m->subject('Welcome ' . $user->first_name);
                });*/
            }

            // Redirect to the home page with success menu
            return Redirect::route('admin.merchant.index')->with('success', Lang::get('users/message.success.create'));

        } catch (LoginRequiredException $e) {
            $error = Lang::get('admin/users/message.user_login_required');
        } catch (PasswordRequiredException $e) {
            $error = Lang::get('admin/users/message.user_password_required');
        } catch (UserExistsException $e) {
            $error = Lang::get('admin/users/message.user_exists');
        }

        // Redirect to the user creation page
        return Redirect::back()->withInput()->with('error', $error);
    }

    /**
     * User update.
     *
     * @param  int $id
     * @return View
     */
    public function edit($user_id = null)
    {
        $user = User::find($user_id);
        // Get this user groups
        $userRoles = $user->getRoles()->lists('name', 'id')->all();

        // Get a list of all the available groups
        $roles = Sentinel::getRoleRepository()->all();
        $roles = DB::table('roles')->where('id', 3)->get();

        $status = Activation::completed($user);

        $countries = $this->countries;

        // Show the page
        return View('admin/merchant/edit', compact('user', 'roles', 'userRoles', 'countries', 'status'));
    }

    /**
     * User update form processing page.
     *
     * @param  User $user
     * @param UserRequest $request
     * @return Redirect
     */
    public function update(UserRequest $request)
    {
        /*$rules = array(
            'pic_file' => 'image|mimes:jpg,jpeg,bmp,png',
        );

        $validator = Validator::make($request->only('pic_file'), $rules);

        if ($validator->fails()) {
            return Redirect::back()
                ->with('error',Lang::get('users/message.error.file_type_error'))
                ->withInput();
        }*/

        $user_id = $request->get('user_id', 0);
        $user = User::find($user_id);
        try {
            $user->first_name = $request->get('first_name');
            $user->last_name = $request->get('last_name');
            $user->email = $request->get('email');
            $user->dob = $request->get('dob');
            $user->bio = $request->get('bio');
            $user->gender = $request->get('gender');
            $user->country = $request->get('country');
            $user->state = $request->get('state');
            $user->city = $request->get('city');
            $user->address = $request->get('address');
            $user->postal = $request->get('postal');

            if ($password = $request->has('password')) {
                $user->password = Hash::make($request->password);
            }


            // is new image uploaded?
            if ($file = $request->file('pic_file')) {
                $extension = $file->getClientOriginalExtension() ?: 'png';
                $folderName = '/uploads/users/';
                $destinationPath = public_path() . $folderName;
                $safeName = str_random(10) . '.' . $extension;
                $file->move($destinationPath, $safeName);
                //delete old pic if exists
                if (File::exists(public_path() . $folderName . $user->pic)) {
                    File::delete(public_path() . $folderName . $user->pic);
                }

                //save new file path into db
                $user->pic = $safeName;

            }

            //save record
            $user->save();

            // Get the current user groups
            $userRoles = $user->roles()->lists('id')->all();

            // Get the selected groups
            $selectedRoles = $request->get('groups', array());

            // Groups comparison between the groups the user currently
            // have and the groups the user wish to have.
            $rolesToAdd = array_diff($selectedRoles, $userRoles);
            $rolesToRemove = array_diff($userRoles, $selectedRoles);

            // Assign the user to groups
            foreach ($rolesToAdd as $roleId) {
                $role = Sentinel::findRoleById($roleId);

                $role->users()->attach($user);
            }

            // Remove the user from groups
            foreach ($rolesToRemove as $roleId) {
                $role = Sentinel::findRoleById($roleId);

                $role->users()->detach($user);
            }

            // Activate / De-activate user
            $status = $activation = Activation::completed($user);
            if ($request->get('activate') != $status) {
                if ($request->get('activate')) {
                    $activation = Activation::exists($user);
                    if ($activation) {
                        Activation::complete($user, $activation->code);
                    }
                } else {
                    //remove existing activation record
                    Activation::remove($user);
                    //add new record
                    Activation::create($user);

                    //send activation mail
                    $data = array(
                        'user' => $user,
                        'activationUrl' => URL::route('activate', $user->id, Activation::exists($user)->code),
                    );

                    // Send the activation code through email
                    /*Mail::send('emails.register-activate', $data, function ($m) use ($user) {
                        $m->to($user->email, $user->first_name . ' ' . $user->last_name);
                        $m->subject('Welcome ' . $user->first_name);
                    });*/

                }
            }

            // Was the user updated?
            if ($user->save()) {
                // Prepare the success message
                $success = Lang::get('users/message.success.update');

                // Redirect to the user page
                return Redirect::route('admin.merchant.edit', $user)->with('success', $success);
            }

            // Prepare the error message
            $error = Lang::get('users/message.error.update');
        } catch (UserNotFoundException $e) {
            // Prepare the error message
            $error = Lang::get('users/message.user_not_found', compact('user'));
            // Redirect to the user management page
            return Redirect::route('admin.merchant.index')->with('error', $error);
        }

        // Redirect to the user page
        return Redirect::route('admin.merchant.edit', $user)->withInput()->with('error', $error);
    }

    /**
     * Show a list of all the deleted users.
     *
     * @return View
     */
    public function getDeletedUsers()
    {
        // Grab deleted users
        $users = User::onlyTrashed()
            ->join('role_users', 'role_users.user_id', '=', 'users.id')
            ->where('role_users.role_id', 3)->get();

        // Show the page
        return View('admin/merchant/deleted_merchant', compact('users'));
    }


    /**
     * Delete Confirm
     *
     * @param   int $id
     * @return  View
     */
    public function getModalDelete($id = null)
    {
        $model = 'users';
        $confirm_route = $error = null;
        try {
            // Get user information
            $user = Sentinel::findById($id);

            // Check if we are not trying to delete ourselves
            if ($user->id === Sentinel::getUser()->id) {
                // Prepare the error message
                $error = Lang::get('users/message.error.delete');

                return View('admin/layouts/modal_confirmation', compact('error', 'model', 'confirm_route'));
            }
        } catch (UserNotFoundException $e) {
            // Prepare the error message
            $error = Lang::get('users/message.user_not_found', compact('id'));
            return View('admin/layouts/modal_confirmation', compact('error', 'model', 'confirm_route'));
        }
        $confirm_route = route('delete/merchant', ['id' => $user->id]);
        return View('admin/layouts/modal_confirmation', compact('error', 'model', 'confirm_route'));
    }

    /**
     * Delete the given user.
     *
     * @param  int $id
     * @return Redirect
     */
    public function destroy($id = null)
    {
        try {
            // Get user information
            $user = Sentinel::findById($id);

            // Check if we are not trying to delete ourselves
            if ($user->id === Sentinel::getUser()->id) {
                // Prepare the error message
                $error = Lang::get('admin/users/message.error.delete');

                // Redirect to the user management page
                return Redirect::route('admin.merchant.index')->with('error', $error);
            }

            // Delete the user
            //to allow soft deleted, we are performing query on users model instead of Sentinel model
            //$user->delete();
            User::destroy($id);

            // Prepare the success message
            $success = Lang::get('users/message.success.delete');

            // Redirect to the user management page
            return Redirect::route('admin.merchant.index')->with('success', $success);
        } catch (UserNotFoundException $e) {
            // Prepare the error message
            $error = Lang::get('admin/users/message.user_not_found', compact('id'));

            // Redirect to the user management page
            return Redirect::route('admin.merchant.index')->with('error', $error);
        }
    }

    /**
     * Restore a deleted user.
     *
     * @param  int $id
     * @return Redirect
     */
    public function getRestore($id = null)
    {
        try {
            // Get user information
            $user = User::withTrashed()->find($id);

            // Restore the user
            $user->restore();

            // create activation record for user and send mail with activation link
            $data = array(
                'user' => $user,
                'activationUrl' => URL::route('activate', [$user->id, Activation::create($user)->code]),
            );

            // Send the activation code through email
            /*Mail::send('emails.register-activate', $data, function ($m) use ($user) {
                $m->to($user->email, $user->first_name . ' ' . $user->last_name);
                $m->subject('Dear ' . $user->first_name . '! Active your account');
            });*/


            // Prepare the success message
            $success = Lang::get('users/message.success.restored');

            // Redirect to the user management page
            return Redirect::route('deleted_merchant')->with('success', $success);
        } catch (UserNotFoundException $e) {
            // Prepare the error message
            $error = Lang::get('users/message.user_not_found', compact('id'));

            // Redirect to the user management page
            return Redirect::route('deleted_merchant')->with('error', $error);
        }
    }

    /**
     * Display specified user profile.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        try {
            // Get the user information
            $user = Sentinel::findUserById($id);

            //get country name
            if ($user->country) {
                $user->country = $this->countries[$user->country];
            }
            $transactions = \DB::table('oollah_user_payments')->where('user_id', $user->id)->get();

        } catch (UserNotFoundException $e) {
            // Prepare the error message
            $error = Lang::get('users/message.user_not_found', compact('id'));

            // Redirect to the user management page
            return Redirect::route('admin.merchant.index')->with('error', $error);
        }
        $products = DB::table('oollah_promotions');
        $products = $products->where('merchant_id', $user->id)->orderby('id', 'desc')->get();
        $claimeds = DB::table('oollah_promotion_claimed')
            ->join('oollah_promotions', 'oollah_promotions.id', '=', 'oollah_promotion_claimed.promotion_id')
            ->select(['oollah_promotions.*', 'oollah_promotion_claimed.created_at as createdat', 'oollah_promotion_claimed.status as realstatus', 'oollah_promotion_claimed.id as realid'])
            ->where('oollah_promotion_claimed.user_id', $user->id)->where('oollah_promotion_claimed.verified', 1)->orderby('oollah_promotion_claimed.id', 'desc')->get();
        $favorites = DB::table('oollah_promotion_favorites')
            ->join('oollah_promotions', 'oollah_promotions.id', '=', 'oollah_promotion_favorites.promotion_id')
            ->select(['oollah_promotions.*', 'oollah_promotion_favorites.created_at as createdat', 'oollah_promotion_favorites.status as realstatus', 'oollah_promotion_favorites.id as realid'])
            ->where('oollah_promotion_favorites.user_id', $user->id)->orderby('oollah_promotion_favorites.id', 'desc')->get();

        // Show the page
        return View('admin.merchant.show', compact('user', 'transactions', 'products', 'claimeds', 'favorites'));

    }

    public function passwordreset($id)
    {
        if (Request::ajax()) {
            $data = Request::all();
            $user = Sentinel::findUserById($id);
            $password = Request::get('password');
            $user->password = Hash::make($password);
            $user->save();

        }
    }

    public function lockscreen($id){
        $user = Sentinel::findUserById($id);
        return View('admin/lockscreen',compact('user'));
    }



}
