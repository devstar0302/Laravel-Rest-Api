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

class MerchantController extends Controller
{
    use Helpers;



    public function updateMerchant(Request $request)
    {
        $credentials = $request->only(
            'token', 'userid', 'planid'
        );

        $validator = Validator::make($credentials, [
            'token' => 'required',
            'userid' => 'required',
            'planid' => 'required',
        ]);
        if($validator->fails()) {
            throw new ValidationHttpException($validator->errors()->all());
        }
        $userid = $request->get('userid', '');
        $planid = $request->get('planid', '');
        //please make payment here

        //if success, register
        $verifydate = date('Y-m-d');
        //insert payment result in oollah_user_payments table

        //update user to merchant
        \DB::table('oollah_user_details')->where('user_id', $userid)->update(['plan_id'=>$planid, 'merchant_verified'=>'2', 'verified_date'=>$verifydate]);
        //$user = \DB::table('oollah_user_details')->where('user_id', $userid)->first();
        //\DB::table("role_users")->where('user_id', $user->id)->update(['role_id'=>'3']);
        $user = \DB::table('users')->where('id', $userid)->first();
        $first_name = $user->first_name;
        $last_name = $user->last_name;
        $email = $user->email;
        $phone = $user->phone;
        $city = $user->city;
        $userdetail = \DB::table('oollah_user_details')->where('user_id', $userid)->first();
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
            if ($userdetail->plan_id != 0 && $merchant_verified != 0) {
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
            $usertable['id'] = $userid;
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
        }

        $cat = array('status_code'=>'200', 'data'=>'Successfully updated. Please wait the admin\'s verification.', 'user'=>$usertable, 'merchant'=>$merchanttable);
        return response()->json($cat);
    }
    public function getplans(Request $request)
    {
        $categories = \DB::table('oollah_merchant_plans')->where('status', 0)->select(['id', 'name', 'expired', 'planunit', 'price'])->where('status', 0)->orderby('id', 'desc')->get();
        $cat = array('status_code'=>'200', 'data'=>$categories);
        return response()->json($cat);
    }
    public function userprofile($userid = 0, Request $request){
        $user = \DB::table('users')->where('userno', $userid)
            ->join('oollah_user_details as ud', 'users.userno', '=', 'ud.user_id')
            ->select(['users.*', 'ud.merchant_verified', 'ud.plan_id', 'ud.verified_date', 'ud.comment', 'ud.lat', 'ud.lon'])
            ->first();
        $plan_id = $user->plan_id;
        $plan = \DB::table('oollah_merchant_plans')->where('id', $plan_id)->first();
        $data = array('user'=>$user, 'plan'=>$plan);
        $cat = array('status_code'=>'200', 'data'=>$data);
        return response()->json($cat);
    }

}