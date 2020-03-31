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

class ContactController extends Controller
{
    use Helpers;

    public function getContactList(Request $request)
    {
        $credentials = $request->only(
            'user_id'
        );
        $validator = Validator::make($credentials, [
            'user_id' => 'required'
        ]);
        if($validator->fails()) {
            throw new ValidationHttpException($validator->errors()->all());
        }
        $user_id = $request->get('user_id', '');
                
        $contactlist = \DB::table('ptt_contact')
            ->join('users', 'users.id', '=', 'ptt_contact.contact_id')
            ->select(['ptt_contact.id as id','users.id as user_id', 'users.first_name as firstname', 'users.last_name as lastname', 'users.phone as phone', 'users.pic as photo','ptt_contact.created_at as created'])
            ->where('ptt_contact.master_id', $user_id)->orderby('ptt_contact.created_at', 'desc')->get();

        $user = array();
        $data = array();
        foreach ($contactlist as $contact){
            $user['id'] = $contact->id;
            $user['user_id'] = $contact->user_id;
            $user['firstname'] = $contact->firstname;
            $user['lastname'] = $contact->lastname;
            $user['phone'] = $contact->phone;
            $user['photo'] = $contact->photo;
            $user['created'] = $contact->created;
            $user['flag'] = 'contact';
            $user['member'] = '';
            array_push($data, $user);
        }

        $grouplist = \DB::table('ptt_group')->where('create_userid', $user_id)->get();
        foreach ($grouplist as $group){
            $group_member = \DB::table('ptt_group_member')->where('group_id', $group->id)->first()->user_id;

            $user['id'] = '';
            $user['user_id'] = $group->id;
            $user['firstname'] = $group->group_name;
            $user['lastname'] = '';
            $user['phone'] = '';
            $user['photo'] = '';
            $user['created'] = '';
            $user['flag'] = 'group';
            $user['member'] = $group_member;
            array_push($data, $user);
        }
        $result = array('status_code'=>'200', 'data'=>$data, 'message'=>'success');
        return response()->json($result);
    }
    public function addContact(Request $request)
    {
        $credentials = $request->only(
            'user_id', 'contact_id'
        );
        $validator = Validator::make($credentials, [
            'user_id' => 'required',
            'contact_id' => 'required'
        ]);
        if($validator->fails()) {
            throw new ValidationHttpException($validator->errors()->all());
        }
        $user_id = $request->get('user_id', '');
        $contact_id = $request->get('contact_id', '');

        $contact_user = \DB::table('ptt_contact')->where('master_id', $user_id)->where('contact_id',$contact_id)->first();
        if($contact_user){
            \DB::table('ptt_contact')->where('master_id', $user_id)->where('contact_id',$contact_id)->update(['master_id'=>$user_id, 'contact_id'=>$contact_id]);
        }else{
            \DB::table('ptt_contact')->insert(['master_id'=>$user_id, 'contact_id'=>$contact_id]);
        }

        $result = array('status_code'=>'200', 'message'=>'success');
        return response()->json($result);

    }
    public function searchName(Request $request)
    {
        $credentials = $request->only(
            'keyword'
        );
        $validator = Validator::make($credentials, [
             'keyword' => 'required'
        ]);
        if($validator->fails()) {
            throw new ValidationHttpException($validator->errors()->all());
        }
        $keyword = $request->get('keyword', '');

        $search = \DB::table('users')->join('role_users', 'role_users.user_id', '=', 'users.id')
            ->select(['users.id as user_id', 'users.first_name as firstname', 'users.last_name as lastname', 'users.phone as phone', 'users.pic as photo', 'users.created_at as created'])
            ->where('role_users.role_id', 4)
            ->where(function ($query) use($keyword) {
                $query->where('users.first_name', 'like', '%'.$keyword.'%')
                      ->orwhere('users.last_name', 'like', '%'.$keyword.'%');
            })->get();

        $result = array('status_code'=>'200', 'message'=>'success', 'data'=>$search);
        return response()->json($result);

    }
    public function searchPhone(Request $request)
    {
        $credentials = $request->only(
            'keyword'
        );
        $validator = Validator::make($credentials, [
            'keyword' => 'required'
        ]);
        if($validator->fails()) {
            throw new ValidationHttpException($validator->errors()->all());
        }
        $keyword = $request->get('keyword', '');

        $search = \DB::table('users')->join('role_users', 'role_users.user_id', '=', 'users.id')
            ->select(['users.id as user_id', 'users.first_name as firstname', 'users.last_name as lastname', 'users.phone as phone', 'users.pic as photo', 'users.created_at as created'])
            ->where('role_users.role_id', 4)
            ->where('users.phone', 'like', '%'.$keyword.'%')
            ->get();

        $result = array('status_code'=>'200', 'message'=>'success', 'data'=>$search);
        return response()->json($result);

    }
    public function searchContactName(Request $request)
    {
        $credentials = $request->only(
            'user_id', 'keyword'
        );
        $validator = Validator::make($credentials, [
            'user_id' => 'required',
            'keyword' => 'required'
        ]);
        if($validator->fails()) {
            throw new ValidationHttpException($validator->errors()->all());
        }
        $user_id = $request->get('user_id', '');
        $keyword = $request->get('keyword', '');

        $search = \DB::table('ptt_contact')->join('users', 'users.id', '=', 'ptt_contact.contact_id')
            ->select(['users.id as user_id', 'users.first_name as firstname', 'users.last_name as lastname', 'users.phone as phone','ptt_contact.created_at as createdat'])
            ->where('ptt_contact.master_id', $user_id)
            ->where('users.first_name', 'like', '%'.$keyword.'%')
            ->orwhere('users.last_name', 'like', '%'.$keyword.'%')->get();

        $result = array('status_code'=>'200', 'message'=>'success', 'data'=>$search);
        return response()->json($result);

    }
    public function searchContactPhone(Request $request)
    {
        $credentials = $request->only(
            'user_id', 'keyword'
        );
        $validator = Validator::make($credentials, [
            'user_id' => 'required',
            'keyword' => 'required'
        ]);
        if($validator->fails()) {
            throw new ValidationHttpException($validator->errors()->all());
        }
        $user_id = $request->get('user_id', '');
        $keyword = $request->get('keyword', '');

        $search = \DB::table('ptt_contact')->join('users', 'users.id', '=', 'ptt_contact.contact_id')
            ->select(['users.id as user_id', 'users.first_name as firstname', 'users.last_name as lastname', 'users.phone as phone','ptt_contact.created_at as createdat'])
            ->where('ptt_contact.master_id', $user_id)
            ->where('users.phone', 'like', '%'.$keyword.'%')
            ->orwhere('users.last_name', 'like', '%'.$keyword.'%')->get();

        $result = array('status_code'=>'200', 'message'=>'success', 'data'=>$search);
        return response()->json($result);

    }
    public function removeContact(Request $request)
    {
        $credentials = $request->only(
            'user_id', 'contact_id'
        );
        $validator = Validator::make($credentials, [
            'user_id' => 'required',
            'contact_id' => 'required'
        ]);
        if($validator->fails()) {
            throw new ValidationHttpException($validator->errors()->all());
        }
        $user_id = $request->get('user_id', '');
        $contact_id = $request->get('contact_id', '');

        $contact = \DB::table('ptt_contact')->where('master_id', $user_id)->where('contact_id',$contact_id)->first();
        if($contact){
            \DB::table('ptt_contact')->where('master_id', $user_id)->where('contact_id',$contact_id)->delete();
            $result = array('status_code'=>'200', 'message'=>'success');
        }else{
            $result = array('status_code'=>'602', 'message'=>'Selected User can not find.');
        }

        return response()->json($result);

    }
    
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