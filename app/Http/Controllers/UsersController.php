<?php namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\User;
use Cartalyst\Sentinel\Laravel\Facades\Activation;
use File;
use Hash;
use Illuminate\Support\Facades\App;
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
class UsersController extends JoshController
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
        
        return View('admin.users.index', compact('users'));
    }

    /*
     * Pass data through ajax call
     */
    public function data()
    {
        $users = User::select(['users.id', 'users.email', 'users.username', 'users.pic', 'users.gender', 'users.created_at'])
            ->join('role_users', 'role_users.user_id', '=', 'users.id')
            ->where('role_users.role_id', 4)->orderby('id', 'asc');

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
                    $url = '/uploads/users/'.$user->pic;
                    $photo = '<img src="'.$url.'" style="width:50px;height:50px;border-radius:50%"/>';
                }
                return $photo;
            })
            ->add_column('username',function($user){
                return $user->username;
            })
            ->add_column('actions',function($user) {
                $actions = '<a href='. route('admin.users.show', $user->id) .'><i class="livicon" data-name="user-flag" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="view user"></i></a>&nbsp;&nbsp;';

                if ((Sentinel::getUser()->id != $user->id) && ($user->id != 1)) {
                    $actions .= '<a href='. route('confirm-delete/user', $user->id) .' data-toggle="modal" data-target="#delete_confirm"><i class="livicon" data-name="user-remove" data-size="18" data-loop="true" data-c="#f56954" data-hc="#f56954" title="delete user"></i></a>';
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
        // Get all the available groups
        $groups = Sentinel::getRoleRepository()->all();
        $groups = DB::table('roles')->where('id', 4)->get();

        $countries = $this->countries;
        // Show the page
        return View('admin/users/create', compact('groups', 'countries'));
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
            $extension = $file->getClientOriginalExtension();
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
            return Redirect::route('admin.users.index')->with('success', Lang::get('users/message.success.create'));

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
    public function edit($user = null)
    {
        // Get this user groups
        $userRoles = $user->getRoles()->lists('name', 'id')->all();

        // Get a list of all the available groups
        $roles = Sentinel::getRoleRepository()->all();
        $roles = DB::table('roles')->where('id', 4)->get();

        $status = Activation::completed($user);

        $countries = $this->countries;

        // Show the page
        return View('admin/users/edit', compact('user', 'roles', 'userRoles', 'countries', 'status'));
    }

    /**
     * User update form processing page.
     *
     * @param  User $user
     * @param UserRequest $request
     * @return Redirect
     */
    public function update(User $user, UserRequest $request)
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

        try {
            $user->first_name = $request->get('first_name');
            $user->last_name = $request->get('last_name');
            $user->email = $request->get('email');
            $user->birthday = $request->get('birthday');
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
                return Redirect::route('admin.users.edit', $user)->with('success', $success);
            }

            // Prepare the error message
            $error = Lang::get('users/message.error.update');
        } catch (UserNotFoundException $e) {
            // Prepare the error message
            $error = Lang::get('users/message.user_not_found', compact('user'));
            // Redirect to the user management page
            return Redirect::route('admin.users.index')->with('error', $error);
        }

        // Redirect to the user page
        return Redirect::route('admin.users.edit', $user)->withInput()->with('error', $error);
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
            ->where('role_users.role_id', 4)->get();

        // Show the page
        return View('admin/users/deleted_users', compact('users'));
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
        $confirm_route = route('delete/user', ['id' => $user->id]);
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
                return Redirect::route('admin.users.index')->with('error', $error);
            }

            // Delete the user
            //to allow soft deleted, we are performing query on users model instead of Sentinel model
            //$user->delete();
            User::destroy($id);

            // Prepare the success message
            $success = Lang::get('users/message.success.delete');

            // Redirect to the user management page
            return Redirect::route('admin.users.index')->with('success', $success);
        } catch (UserNotFoundException $e) {
            // Prepare the error message
            $error = Lang::get('admin/users/message.user_not_found', compact('id'));

            // Redirect to the user management page
            return Redirect::route('admin.users.index')->with('error', $error);
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
            return Redirect::route('deleted_users')->with('success', $success);
        } catch (UserNotFoundException $e) {
            // Prepare the error message
            $error = Lang::get('users/message.user_not_found', compact('id'));

            // Redirect to the user management page
            return Redirect::route('deleted_users')->with('error', $error);
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
//            if ($user->country) {
//                $user->country = $this->countries[$user->country];
//            }

        } catch (UserNotFoundException $e) {
            // Prepare the error message
            $error = Lang::get('users/message.user_not_found', compact('id'));

            // Redirect to the user management page
            return Redirect::route('admin.users.index')->with('error', $error);
        }
        $invitelist = DB::table('weebie_invite')
            ->where('masterid', $id)->orwhere('receiverid', $id)->orderby('id', 'desc')->get();
        $data = array();
        $item = array();
        foreach($invitelist as $invite){
            $mastername = DB::table('users')->where('id', $invite->masterid)->first()->username;
            $receivername = DB::table('users')->where('id', $invite->receiverid)->first()->username;
            $item['sender'] = $mastername;
            $item['receiver'] = $receivername;
            $item['status'] = $invite->status;
            $item['created'] = $invite->created_at;
            array_push($data, $item);
        }
        $role_id = DB::table('role_users')->where('user_id', $id)->first()->role_id;
        
        // Show the page
        return View('admin.users.show', compact('user', 'data', 'role_id'));

    }

    public function passwordreset($id)
    {
        if (Request::ajax()) {
            $data = Request::all();
            $user = Sentinel::findUserById($id);
            $password = Request::get('password');
            $user->password = Hash::make($password);
            $user->save();
            return $data;
        }
    }

    public function lockscreen($id){
        $user = Sentinel::findUserById($id);
        return View('admin/lockscreen',compact('user'));
    }



}
