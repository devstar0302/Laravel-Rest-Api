<?php

namespace App\Api\V1\Controllers;

use JWTAuth;
use Validator;
use Config;
use App\User;
use App\Cardfinds;
use Illuminate\Http\Request;
use Illuminate\Mail\Message;
use Dingo\Api\Routing\Helpers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Password;
use Tymon\JWTAuth\Exceptions\JWTException;
use Dingo\Api\Exception\ValidationHttpException;
use Sentinel;
use DB;
use Hash;

class AuthController extends Controller
{
    use Helpers;

    public function login(Request $request)
    {
        $credentials = $request->only(['email', 'password']);

        $validator = Validator::make($credentials, [
            'email' => 'required',
            'password' => 'required'
        ]);

        if($validator->fails()) {
            throw new ValidationHttpException($validator->errors()->all());
        }

        try {
            if (! $token = JWTAuth::attempt($credentials)) {
                return $this->response->errorUnauthorized();
            }
        } catch (JWTException $e) {
            return $this->response->error('could_not_create_token', 500);
        }
        
        $id = Sentinel::getuser()->id;
        
        $type = '';
        $roleid = DB::table('role_users')->where('user_id',$id)->first()->role_id;
        if($roleid == 4)
            $type = 'user';
        if($roleid == 5)
            $type = 'client';

        $datatable = array();
        if($type == 'user'){            
            $datatable['userid'] = $id;
            $datatable['cardid'] = 0;
            $datatable['type'] = $type;
        }else{
            $clientid = DB::table('findmiin_card')->where('user_id',$id)->first()->id;
            $datatable['userid'] = $id;
            $datatable['cardid'] = $clientid;
            $datatable['type'] = $type;
        }

        $data = array('status_code'=>200, 'token'=>$token, 'data'=>$datatable, 'message'=>'success');
        return response()->json($data);
    }

    public function signup(Request $request)
    {
        $signupFields = Config::get('boilerplate.signup_fields');
        $hasToReleaseToken = Config::get('boilerplate.signup_token_release');

        $userData = $request->only($signupFields);

        $validator = Validator::make($userData, Config::get('boilerplate.signup_fields_rules'));

        if($validator->fails()) {
            throw new ValidationHttpException($validator->errors()->all());
        }

        try {
            // Register the user
            $user = Sentinel::registerAndActivate(array(
                'first_name' => $request->get('firstname'),
                'last_name' => $request->get('lastname'),
                'email' => $request->get('email'),
                'password' => $request->get('password')
            ));

            $safeName = '';
            if ($file = $request->file('photo')) {
                $fileName = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension() ?: 'png';
                $folderName = '/uploads/users';
                $destinationPath = base_path() . $folderName;
                $safeName = str_random(10) . '.' . $extension;
                $file->move($destinationPath, $safeName);
            }
            
            $role = Sentinel::findRoleById(4);
            $role->users()->attach($user);
            if($safeName != ''){
                $userid =\DB::table('users')->where('email', $request->get('email'))->first()->id;
                \DB::table('users')->where('id', $userid)->update(['pic'=>$safeName]);
            }

            //Log the user in
            return $this->login($request);

        } catch (UserExistsException $e) {
            return $this->response->error('could_not_create_user', 500);
        }

    }
    public function logout(Request $request){
        $credentials = $request->only(
            'userid'
        );

        $validator = Validator::make($credentials, [
            'userid' => 'required'
        ]);
        if($validator->fails()) {
            throw new ValidationHttpException($validator->errors()->all());
        }
        $userid = $request->get('userid');
        \DB::table('users')->where('id',$userid)->update(['login_status'=>'logout']);

        $data = array('status_code'=>200, 'message'=>'success');
        return response()->json($data);
    }
    public function token() {
        return strrev(base_convert(bin2hex(hash('sha512', uniqid(mt_rand() . microtime(true) * 10000, true), true)), 16, 36));
    }
    public function updateprofile(Request $request)
    {
        $credentials = $request->only(
            'first_name', 'last_name', 'email', 'password', 'phone', 'push_key'
        );

        $validator = Validator::make($credentials, [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'phone' => 'required',
            'push_key' => 'required'
        ]);
        if($validator->fails()) {
            throw new ValidationHttpException($validator->errors()->all());
        }

        $user_id = $request->get('user_id');
        $first_name = $request->get('first_name');
        $last_name = $request->get('last_name');
        $username = $first_name.' '.$last_name;
        $email = $request->get('email');
        $phone = $request->get('phone');

        $password = $request->get('password');
        if ($password) {
            $password = Hash::make($password);
        }

        $file = $request->file('photo');
        $safeName = '';
        if ($file) {
            $fileName = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $folderName = '/uploads/users';
            $destinationPath = public_path() . $folderName;
            $safeName = str_random(10) . '.' . $extension;
            $file->move($destinationPath, $safeName);
        }
        $data = array('first_name'=>$first_name,'last_name'=>$last_name,'username'=>$username,'email'=>$email,'password'=>$password,'phone'=>$phone,'pic'=>$safeName);
        \DB::table('users')->where('id', $user_id)->update($data);

        //$data = array('id'=>$user_id,'first_name'=>$first_name,'last_name'=>$last_name,'username'=>$username,'email'=>$email,'phone'=>$phone,'photo'=>$safeName);
        //$result = array('status_code'=>200, 'data'=>$data, 'message'=>'success');
        //return response()->json($result);
        return $this->login($request);

    }
    
    public function recovery(Request $request)
    {
        $validator = Validator::make($request->only('email'), [
            'email' => 'required'
        ]);

        if($validator->fails()) {
            throw new ValidationHttpException($validator->errors()->all());
        }

        $response = Password::sendResetLink($request->only('email'), function (Message $message) {
            $message->subject(Config::get('boilerplate.recovery_email_subject'));
        });

        switch ($response) {
            case Password::RESET_LINK_SENT:
                return $this->response->noContent();
            case Password::INVALID_USER:
                return $this->response->errorNotFound();
        }
    }
    public function clientreset(Request $request)
    {
        $credentials = $request->only(
            'email', 'password', 'password_confirmation', 'token'
        );

        $validator = Validator::make($credentials, [
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:6',
        ]);

        if($validator->fails()) {
            throw new ValidationHttpException($validator->errors()->all());
        }

        $email = $request->get('email');
        $password = $request->get('password');
        $user_temp = DB::table('users')->where('email',$email)->first();
        if(!empty($user_temp)) {
            $user = User::find($user_temp->id);
            $user->password = Hash::make($password);
            $user->save();

            return $this->login($request);
        }

        return $this->response->error('could_not_reset_password', 500);

    }
    
}