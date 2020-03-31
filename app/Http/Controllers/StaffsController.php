<?php namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\User;
use Cartalyst\Sentinel\Laravel\Facades\Activation;
use File;
use Hash;
use Illuminate\Http\Request;
use Lang;
use Mail;
use Redirect;
use Sentinel;
use URL;
use View;
use Datatables;
use Validator;
use DB;
class StaffsController extends JoshController
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
        $_SESSION["sectionType"] = 'other';

        return View('admin.staffs.index', compact('users'));
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

        $users = User::select(['users.id', 'users.first_name', 'users.last_name', 'users.email', 'users.pic', 'users.gender', 'users.privilege_r', 'users.privilege_w', 'users.postal','users.created_at'])
            ->join('role_users', 'role_users.user_id', '=', 'users.id')
            ->where('role_users.role_id', 2)->orderby('id', 'desc');

        return Datatables::of($users)
            ->edit_column('created_at','{!! $created_at !!}')
            ->add_column('status',function($user){
                if($activation = Activation::completed($user))
                    return 'Activated';
                else
            		return 'Pending';

            })
            ->edit_column('pic',function($user){
                $photo = '<img src="'.url('/').'/img/userimage.png" style="width:50px;height:50px;border-radius:50%"/>';
                if(!empty($user->pic)){
                    $photo = '<img src="'.url('/').'/uploads/staffs/'.$user->pic .'" style="width:50px;height:50px;border-radius:50%"/>';
                }
                return $photo;
            })
            ->edit_column('privilege_r',function($user){
                $privilege_r = str_replace(",",", ",$user->privilege_r);

                return $privilege_r;
            })
            ->edit_column('privilege_w',function($user){
                $privilege_w = str_replace(",",", ",$user->privilege_w);

                return $privilege_w;
            })
            ->add_column('realname',function($user){
                return $user->first_name.' '.$user->last_name;
            })
            ->add_column('actions',function($user) {
                $actions = '<a href='. route('admin.staffs.show', $user->id) .'><i class="livicon" data-name="user-flag" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="view user"></i></a>&nbsp;&nbsp;
                            <a href='. route('admin.staffs.edit', $user->id) .'><i class="livicon" data-name="edit" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="update user"></i></a>&nbsp;&nbsp;';

                if ((Sentinel::getUser()->id != $user->id) && ($user->id != 1)) {
                    $actions .= '<a href='. route('confirm-delete/staff', $user->id) .' data-toggle="modal" data-target="#delete_confirm"><i class="livicon" data-name="user-remove" data-size="18" data-loop="true" data-c="#f56954" data-hc="#f56954" title="delete user"></i></a>';
                }
                return $actions;
            }

            )
            ->make(true);
    }

    /**
     * Create new user
     *
     * @return View
     */
    public function create()
    {
        $_SESSION["sectionType"] = 'other';
        // Get all the available groups
        $groups = Sentinel::getRoleRepository()->all();
        $groups = DB::table('roles')->where('id', 2)->get();

        $countries = $this->countries;
        // Show the page
        return View('admin/staffs/create', compact('groups', 'countries'));
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
            $folderName = '/uploads/staffs/';
            //$destinationPath = public_path() . $folderName;
            $destinationPath = base_path() . $folderName;
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
            return Redirect::route('admin.staffs.index')->with('success', Lang::get('users/message.success.create'));

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
        $roles = DB::table('roles')->where('id', 2)->get();

        $status = Activation::completed($user);

        $countries = $this->countries;

        // Show the page
        return View('admin/staffs/edit', compact('user', 'roles', 'userRoles', 'countries', 'status'));
    }

    /**
     * User update form processing page.
     *
     * @param  User $user
     * @param UserRequest $request
     * @return Redirect
     */
    public function update(Request $request)
    {   
        $rules = array(
            'first_name' => 'required|min:3',
            'last_name' => 'required|min:1',
            'password' => 'between:3,32',
            'password_confirm' => 'between:3,32|same:password',
        );

        $validator = Validator::make($request->all(), $rules);
        //$validator = Validator::make($request->only('pic_file'), $rules);

        if ($validator->fails()) {
            /*return Redirect::back()
                ->with('error',Lang::get('users/message.error.file_type_error'))
                ->withInput();*/
            return Redirect::to(URL::previous())->withInput()->withErrors($validator);
        }

        $user_id = $request->get('user_id', 0);

        $email = $request->get('email');
        $email_d = \DB::table('users')->where('id','<>',$user_id)->where('email',$email)->get();
        if(!empty($email_d)){
            $this->messageBag->add('email', Lang::get('auth/message.account_already_exists'));
            return Redirect::to(URL::previous())->withInput()->withErrors($this->messageBag);
        }

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
            $user->privilege_r = $request->get('privilege_r');
            $user->privilege_w = $request->get('privilege_w');

            if ($password = $request->has('password')) {
                $user->password = Hash::make($request->password);
            }


            // is new image uploaded?
            if ($file = $request->file('pic_file')) {
                $extension = $file->getClientOriginalExtension() ?: 'png';
                $folderName = '/uploads/staffs/';
                $destinationPath = base_path() . $folderName;
                $safeName = str_random(10) . '.' . $extension;
                $file->move($destinationPath, $safeName);
                //delete old pic if exists
                if (File::exists(base_path() . $folderName . $user->pic)) {
                    File::delete(base_path() . $folderName . $user->pic);
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
                return Redirect::route('admin.staffs.edit', $user)->with('success', $success);
            }

            // Prepare the error message
            $error = Lang::get('users/message.error.update');
        } catch (UserNotFoundException $e) {
            // Prepare the error message
            $error = Lang::get('users/message.user_not_found', compact('user'));
            // Redirect to the user management page
            return Redirect::route('admin.staffs.index')->with('error', $error);
        }

        // Redirect to the user page
        return Redirect::route('admin.staffs.edit', $user)->withInput()->with('error', $error);
    }

    /**
     * Show a list of all the deleted users.
     *
     * @return View
     */
    public function getDeletedUsers()
    {
        $_SESSION["sectionType"] = 'other';
        // Grab deleted users
        $users = User::onlyTrashed()
            ->join('role_users', 'role_users.user_id', '=', 'users.id')
            ->where('role_users.role_id', 2)->get();

        // Show the page
        return View('admin/staffs/deleted_staffs', compact('users'));
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
        $confirm_route = route('delete/staff', ['id' => $user->id]);
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
                return Redirect::route('admin.staffs.index')->with('error', $error);
            }

            // Delete the user
            //to allow soft deleted, we are performing query on users model instead of Sentinel model
            //$user->delete();
            User::destroy($id);

            // Prepare the success message
            $success = Lang::get('users/message.success.delete');

            // Redirect to the user management page
            return Redirect::route('admin.staffs.index')->with('success', $success);
        } catch (UserNotFoundException $e) {
            // Prepare the error message
            $error = Lang::get('admin/users/message.user_not_found', compact('id'));

            // Redirect to the user management page
            return Redirect::route('admin.staffs.index')->with('error', $error);
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
            return Redirect::route('deleted_staffs')->with('success', $success);
        } catch (UserNotFoundException $e) {
            // Prepare the error message
            $error = Lang::get('users/message.user_not_found', compact('id'));

            // Redirect to the user management page
            return Redirect::route('deleted_staffs')->with('error', $error);
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
        $_SESSION["sectionType"] = 'other';
        try {
            // Get the user information
            $user = Sentinel::findUserById($id);

            //get country name
            if ($user->country) {
                $user->country = $this->countries[$user->country];
            }

        } catch (UserNotFoundException $e) {
            // Prepare the error message
            $error = Lang::get('users/message.user_not_found', compact('id'));

            // Redirect to the user management page
            return Redirect::route('admin.staffs.index')->with('error', $error);
        }

        // Show the page
        return View('admin.staffs.show', compact('user'));

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
