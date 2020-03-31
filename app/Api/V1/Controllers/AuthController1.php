<?php

namespace App\Api\V1\Controllers;

use JWTAuth;
use Validator;
use Config;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Mail\Message;
use Dingo\Api\Routing\Helpers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Password;
use Tymon\JWTAuth\Exceptions\JWTException;
use Dingo\Api\Exception\ValidationHttpException;
use Sentinel;

class AuthController extends Controller
{
    use Helpers;

    public function login(Request $request)
    {
        $credentials = $request->only(['email', 'password']);

        $validator = Validator::make($credentials, [
            'email' => 'required',
            'password' => 'required',
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
        $id = Sentinel::getuser()->userno;

        $lat = $request->get('lat', 0);
        $lon = $request->get('lon', 0);
        if($lat != 0 && $lon != 0){
            $detail = \DB::table('oollah_user_details')->where('user_id', $id)->first();
            if(!empty($detail)) {
                \DB::table('oollah_user_details')->where('user_id', $id)->update(['lat' => $lat, 'lon' => $lon]);
            }else{
                \DB::table('oollah_user_details')->insert(['user_id'=>$id, 'lat' => $lat, 'lon' => $lon]);
            }
        }
        $first_name = Sentinel::getuser()->first_name;
        $last_name = Sentinel::getuser()->last_name;
        $email = Sentinel::getuser()->email;
        $phone = Sentinel::getuser()->phone;
        $city = Sentinel::getuser()->city;
        $userdetail = \DB::table('oollah_user_details')->where('user_id', $id)->first();
        if(!empty($userdetail)) {
            $merchant_verified = $userdetail->merchant_verified;
            $comment = $userdetail->comment;
            $lat = $userdetail->lat;
            $lon = $userdetail->lon;
            $plan_name = '';
            $plan_price = '0';
            $period = '';
            $verified_date = '';
            $expired_date = '';
            if ($userdetail->plan_id != 0 && $merchant_verified == 1) {
                $verified_date = $userdetail->verified_date;

                $plan = \DB::table('oollah_merchant_plans')->where('id', $userdetail->plan_id)->first();
                if (!empty($plan)) {
                    $plan_name = $plan->name;
                    $plan_price = $plan->price;
                    $period = $plan->expired;
                    $unit = $plan->planunit;
                    if ($unit == 'months') {
                        $expired_date = date('Y-m-d', strtotime($verified_date . ' ' . $period . ' months'));
                    } else {
                        $expired_date = date('Y-m-d', strtotime($verified_date . ' ' . $period . ' years'));
                    }
                    $period = $period . ' ' . $unit;
                }
            }
            $usertable = array();
            $usertable['id'] = $id;
            $usertable['first_name'] = $first_name;
            $usertable['last_name'] = $last_name;
            $usertable['email'] = $email;
            $usertable['phone'] = $phone;
            $usertable['city'] = $city;
            $usertable['merchant_verified'] = $merchant_verified;
            $usertable['comment'] = $comment;
            $usertable['lat'] = $lat;
            $usertable['lon'] = $lon;
            $merchanttable = array();
            $merchanttable['verified_date'] = $verified_date;
            $merchanttable['plan_id'] = $userdetail->plan_id;
            $merchanttable['plan_name'] = $plan_name;
            $merchanttable['plan_price'] = $plan_price;
            $merchanttable['expired_date'] = $expired_date;
            $merchanttable['period'] = $period;
        }else{
            $first_name = Sentinel::getuser()->first_name;
            $last_name = Sentinel::getuser()->last_name;
            $email = Sentinel::getuser()->email;
            $phone = Sentinel::getuser()->phone;
            $city = Sentinel::getuser()->city;
            $lat = 0;
            $lon = 0;
            $usertable = array();
            $usertable['id'] = $id;
            $usertable['first_name'] = $first_name;
            $usertable['last_name'] = $last_name;
            $usertable['email'] = $email;
            $usertable['phone'] = $phone;
            $usertable['city'] = $city;
            $usertable['merchant_verified'] = 0;
            $usertable['lat'] = $lat;
            $usertable['lon'] = $lon;
            $merchanttable['verified_date'] = "";
            $merchanttable['plan_id'] = "0";
            $merchanttable['plan_name'] = "";
            $merchanttable['plan_price'] = "0.00";
            $merchanttable['expired_date'] = "";
            $merchanttable['period'] = "";

        }

        $data = array('status_code'=>200, 'token'=>$token, 'user'=>$usertable, 'merchant'=>$merchanttable);
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
                'first_name' => $request->get('first_name'),
                'last_name' => $request->get('last_name'),
                'username' => $request->get('first_name').' '.$request->get('last_name'),
                'email' => $request->get('email'),
                'password' => $request->get('password'),
                'phone' => $request->get('phone'),
                'userno' => $request->get('userno'),
                'city' => $request->get('city'),
            ));

            $safeName = '';
            if ($file = $request->file('photo')) {
                $fileName = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension() ?: 'png';
                $folderName = '/uploads/users';
                $destinationPath = public_path() . $folderName;
                $safeName = str_random(10) . '.' . $extension;
                $file->move($destinationPath, $safeName);
            }

            //add user to 'User' group
            $role = Sentinel::findRoleById(4);
            $role->users()->attach($user);
            $userid =\DB::table('users')->where('userno', $request->get('userno'))->first()->id;
            \DB::table('users')->where('userno', $request->get('userno'))->update(['id'=>$request->get('userno'), 'pic'=>$safeName]);
            \DB::table('oollah_user_details')->insert(['user_id'=>$request->get('userno')]);
            \DB::table('role_users')->where('user_id', $userid)->update(['user_id'=>$request->get('userno')]);
            \DB::table('activations')->where('user_id', $userid)->update(['user_id'=>$request->get('userno')]);



            // Log the user in
            return $this->login($request);


        } catch (UserExistsException $e) {
            return $this->response->error('could_not_create_user', 500);
        }

    }
    public function updateprofile(Request $request)
    {
        $credentials = $request->only(
            'token', 'userid', 'first_name', 'last_name', 'city'
        );

        $validator = Validator::make($credentials, [
            'token' => 'required',
            'userid' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'city' => 'required',
        ]);
        if($validator->fails()) {
            throw new ValidationHttpException($validator->errors()->all());
        }


            $first_name = $request->get('first_name');
            $last_name = $request->get('last_name');
            $username = $request->get('first_name').' '.$request->get('last_name');
            $city = $request->get('city');

        $safeName = '';
        if ($file = $request->file('photo')) {
            $fileName = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension() ?: 'png';
            $folderName = '/uploads/users';
            $destinationPath = public_path() . $folderName;
            $safeName = str_random(10) . '.' . $extension;
            $file->move($destinationPath, $safeName);
        }
            \DB::table('users')->where('id', $request->get('userid'))->update(['first_name'=>$first_name, 'last_name'=>$last_name, 'username'=>$username, 'city'=>$city, 'pic'=>$safeName]);
        $cat = array('status_code'=>'200', 'data'=>'Successfully updated.');
        return response()->json($cat);
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

    public function reset(Request $request)
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
        
        $response = Password::reset($credentials, function ($user, $password) {
            $user->password = $password;
            $user->save();
        });

        switch ($response) {
            case Password::PASSWORD_RESET:
                if(Config::get('boilerplate.reset_token_release')) {
                    return $this->login($request);
                }
                return $this->response->noContent();

            default:
                return $this->response->error('could_not_reset_password', 500);
        }
    }
}