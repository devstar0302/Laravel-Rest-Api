<?php

namespace App\Api\V1\Controllers;

use JWTAuth;
use Validator;
use Config;
use App\User;
use App\DeviceToken;
use Illuminate\Http\Request;
use Illuminate\Mail\Message;
use Dingo\Api\Routing\Helpers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Password;
use Tymon\JWTAuth\Exceptions\JWTException;
use Dingo\Api\Exception\ValidationHttpException;
use Sentinel;
use Edujugon\PushNotification\PushNotification;
use File;

class HistoryController extends Controller
{
    use Helpers;

    public function sendalert(Request $request)
    {
        $credentials = $request->only(
            'sender_id', 'receiver_id'
        );
        $validator = Validator::make($credentials, [
            'sender_id' => 'required',
            'receiver_id' => 'required'
        ]);
        if($validator->fails()) {
            throw new ValidationHttpException($validator->errors()->all());
        }
        $sender_id = $request->get('sender_id','');
        $receiver_id = $request->get('receiver_id','');

        $sender = \DB::table('users')->where('id', $sender_id)->first();
        $send_data = array( 'flag'=>'alert', 'send_id'=>$sender->id, 'send_firstname'=>$sender->first_name, 'send_lastname'=>$sender->last_name,'send_photo'=>$sender->pic);
        $deviceToken = DeviceToken::where('user_id',$receiver_id)->first()->device_token;
        if($deviceToken){
            //  push notification
            $push = new PushNotification('fcm');
            $pushtoken = array($deviceToken);
            $push->setMessage($send_data)
                ->setApiKey('AAAAklb_MN0:APA91bF2anpw5fl5gCPzCcQErJ6lRV5PZ-rs9gywkaEuiJpFo5iShlgb244telOPggZQB1ryXuS8CRwTZqMa7-RapD2zHc2Ue9mhbAoCXD8ZDFvN01F9bqQxg5UZh8fZ6YPZJzsYPC9A')
                ->setDevicesToken($pushtoken)
                ->setConfig(['dry_run' => false]);
            /*->setConfig(['priority' => 'high',
                          'dry_run' => true,
                          'time_to_live' => 3])*/
            $push->send();
            //$push->getFeedback();
            //$push->getUnregisteredDeviceTokens();
            $result = array('status_code'=>'200', 'message'=>"success");
        }else{
            $result = array('status_code'=>'603', 'message'=>"Push Notification Failure.");
        }

        return response()->json($result);
    }
    public function sendalerttoGroup(Request $request)
    {
        $credentials = $request->only(
            'user_id', 'group_id'
        );
        $validator = Validator::make($credentials, [
            'user_id' => 'required',
            'group_id' => 'required'
        ]);
        if($validator->fails()) {
            throw new ValidationHttpException($validator->errors()->all());
        }
        $user_id = $request->get('user_id','');
        $group_id = $request->get('group_id','');

        $sender = \DB::table('users')->where('id', $user_id)->first();
        $send_data = array( 'flag'=>'alert', 'send_id'=>$sender->id, 'send_firstname'=>$sender->first_name, 'send_lastname'=>$sender->last_name,'send_photo'=>$sender->pic);

        $pushtoken = array();
        $group_member = \DB::table('ptt_group_member')->where('group_id', $group_id)->first();
        $group_useridlist = explode(",", $group_member->user_id);
        foreach($group_useridlist as $group_userid){
            $deviceToken = DeviceToken::where('user_id',$group_userid)->first()->device_token;
            if($deviceToken)
                array_push($pushtoken, $deviceToken);
        }
        if($pushtoken){
            $push = new PushNotification('fcm');
            //$pushtoken = array($deviceToken);
            $push->setMessage($send_data)
                ->setApiKey('AAAAklb_MN0:APA91bF2anpw5fl5gCPzCcQErJ6lRV5PZ-rs9gywkaEuiJpFo5iShlgb244telOPggZQB1ryXuS8CRwTZqMa7-RapD2zHc2Ue9mhbAoCXD8ZDFvN01F9bqQxg5UZh8fZ6YPZJzsYPC9A')
                ->setDevicesToken($pushtoken)
                ->setConfig(['dry_run' => false]);
            /*->setConfig(['priority' => 'high',
                           'dry_run' => true,
                           'time_to_live' => 3])*/
            $push->send();
            //$push->getFeedback();
            //$push->getUnregisteredDeviceTokens();
            $result = array('status_code'=>'200', 'message'=>"success");
        }else{
            $result = array('status_code'=>'606', 'message'=>"Push Notification Failure.");
        }
        return response()->json($result);
    }
    public function sendalerttoPhone(Request $request)
    {
        $credentials = $request->only(
            'user_id', 'phone'
        );
        $validator = Validator::make($credentials, [
            'user_id' => 'required',
            'phone' => 'required'
        ]);
        if($validator->fails()) {
            throw new ValidationHttpException($validator->errors()->all());
        }
        $sender_id = $request->get('user_id');
        $phone = $request->get('phone');

        $userofPhone = \DB::table('users')->where('phone', $phone)->first();

        if($userofPhone) {
            $sender = \DB::table('users')->where('id', $sender_id)->first();
            $send_data = array( 'flag'=>'alert', 'send_id'=>$sender->id, 'send_firstname'=>$sender->first_name, 'send_lastname'=>$sender->last_name,'send_photo'=>$sender->pic);
            $deviceToken = DeviceToken::where('user_id',$userofPhone->id)->first()->device_token;
            if($deviceToken){
                //  push notification
                $push = new PushNotification('fcm');
                $pushtoken = array($deviceToken);
                $push->setMessage($send_data)
                    ->setApiKey('AAAAklb_MN0:APA91bF2anpw5fl5gCPzCcQErJ6lRV5PZ-rs9gywkaEuiJpFo5iShlgb244telOPggZQB1ryXuS8CRwTZqMa7-RapD2zHc2Ue9mhbAoCXD8ZDFvN01F9bqQxg5UZh8fZ6YPZJzsYPC9A')
                    ->setDevicesToken($pushtoken)
                    ->setConfig(['dry_run' => false]);
                $push->send();

                $result = array('status_code'=>'200', 'message'=>"success");
            }else{
                $result = array('status_code'=>'603', 'message'=>"Push Notification Failure.");
            }
        }else {
            $result = array('status_code' => '607', 'message' => 'Phone number no exist!');
        }
        return response()->json($result);
    }
    public function recordupload(Request $request)
    {
        $credentials = $request->only(
            'user_id', 'receive_id', 'recordfile'
        );
        $validator = Validator::make($credentials, [
            'user_id' => 'required',
            'receive_id' => 'required',
            'recordfile' => 'required'
        ]);
        if($validator->fails()) {
            throw new ValidationHttpException($validator->errors()->all());
        }
        $user_id = $request->get('user_id','');
        $receive_id = $request->get('receive_id','');

        $fileName = '';
        $safeName = '';
        $file = $request->file('recordfile');
        if ($file) {
            $fileName = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension() ?: 'wav';
            $folderName = '/uploads/record';
            $destinationPath = public_path() . $folderName;
            $safeName = str_random(10) . '.' . $extension;
            $file->move($destinationPath, $safeName);

            $sender = \DB::table('users')->where('id', $user_id)->first();
            $send_data = array('flag'=>'record','recordfile'=>$safeName, 'send_id'=>$sender->id, 'send_firstname'=>$sender->first_name, 'send_lastname'=>$sender->last_name,'send_photo'=>$sender->pic);
            //  push notification
            $push = new PushNotification('fcm');
            $deviceToken = DeviceToken::where('user_id',$receive_id)->first()->device_token;
            $pushtoken = array($deviceToken);

            $push->setMessage($send_data)
                ->setApiKey('AAAAklb_MN0:APA91bF2anpw5fl5gCPzCcQErJ6lRV5PZ-rs9gywkaEuiJpFo5iShlgb244telOPggZQB1ryXuS8CRwTZqMa7-RapD2zHc2Ue9mhbAoCXD8ZDFvN01F9bqQxg5UZh8fZ6YPZJzsYPC9A')
                ->setDevicesToken($pushtoken)
                ->setConfig(['dry_run' => false]);
            /*->setConfig(['priority' => 'high',
                          'dry_run' => true,
                          'time_to_live' => 3])*/
            $push->send();
            //$push->getFeedback();
            //$push->getUnregisteredDeviceTokens();

            \DB::table('ptt_history')->insert(['send_id'=>$user_id, 'receive_id'=>$receive_id, 'realname'=>$fileName, 'filename'=>$safeName]);
            $result = array('status_code'=>'200', 'message'=>"success record upload");
        }else{
            $result = array('status_code'=>'601', 'message'=>"Record file upload failure.");
        }

        return response()->json($result);
    }

    public function recorduploadbygroup(Request $request)
    {
        $credentials = $request->only(
            'user_id', 'group_id', 'recordfile'
        );
        $validator = Validator::make($credentials, [
            'user_id' => 'required',
            'group_id' => 'required',
            'recordfile' => 'required'
        ]);
        if($validator->fails()) {
            throw new ValidationHttpException($validator->errors()->all());
        }
        $user_id = $request->get('user_id','');
        $group_id = $request->get('group_id','');

        $fileName = '';
        $safeName = '';
        $file = $request->file('recordfile');
        if ($file) {
            $fileName = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension() ?: 'wav';
            $folderName = '/uploads/record';
            //$destinationPath = public_path() . $folderName;
            $destinationPath = public_path() . $folderName;
            $safeName = str_random(10) . '.' . $extension;
            $file->move($destinationPath, $safeName);

            $sender = \DB::table('users')->where('id', $user_id)->first();
            $send_data = array('flag'=>'record','recordfile'=>$safeName, 'send_id'=>$sender->id, 'send_firstname'=>$sender->first_name, 'send_lastname'=>$sender->last_name,'send_photo'=>$sender->pic);

            $pushtoken = array();
            $group_member = \DB::table('ptt_group_member')->where('group_id', $group_id)->first()->user_id;
            $group_useridlist = explode(",", $group_member);
            foreach ($group_useridlist as $group_userid){
                $deviceToken = DeviceToken::where('user_id',$group_userid)->first()->device_token;
                if($deviceToken)
                    array_push($pushtoken, $deviceToken);
            }
            //  push notification
            $push = new PushNotification('fcm');

            $push->setMessage($send_data)
                ->setApiKey('AAAAklb_MN0:APA91bF2anpw5fl5gCPzCcQErJ6lRV5PZ-rs9gywkaEuiJpFo5iShlgb244telOPggZQB1ryXuS8CRwTZqMa7-RapD2zHc2Ue9mhbAoCXD8ZDFvN01F9bqQxg5UZh8fZ6YPZJzsYPC9A')
                ->setDevicesToken($pushtoken)
                ->setConfig(['dry_run' => false]);
            /*->setConfig(['priority' => 'high',
                          'dry_run' => true,
                          'time_to_live' => 3])*/
            $push->send();
            //$push->getFeedback();
            //$push->getUnregisteredDeviceTokens();

            \DB::table('ptt_history_group')->insert(['create_userid'=>$user_id, 'group_id'=>$group_id, 'realname'=>$fileName, 'filename'=>$safeName]);
            $result = array('status_code'=>'200', 'message'=>"success record upload");
        }else{
            $result = array('status_code'=>'601', 'message'=>"Record file upload failure.");
        }

        return response()->json($result);
    }
	public function gethistorylist(Request $request)
    {
        $credentials = $request->only(
            'user_id', 'page_no'
        );
        $validator = Validator::make($credentials, [
            'user_id' => 'required',
            'page_no' => 'required'
        ]);
        if($validator->fails()) {
            throw new ValidationHttpException($validator->errors()->all());
        }

        $user_id = $request->get('user_id','');
        $page_no = $request->get('page_no','0');
        $num = 50;
        $start_num = (int)$page_no * $num;
        
	    $contactlist = \DB::table('ptt_history')
		    ->select(['id','send_id as send_id', 'delete as create_userid','receive_id as receive_id','delete as group_id','filename','created_at'])
			->where('send_id', $user_id)->orWhere('receive_id', $user_id);
		$grouplist = \DB::table('ptt_history_group')
		    ->select(['id','delete as send_id','create_userid as create_userid','delete as receive_id','group_id as group_id','filename','created_at'])
			->where('create_userid', $user_id);
		
		$historylist = 	$contactlist->unionAll($grouplist)->orderby('created_at', 'desc')->get();//->offset((int)$start_num)->limit($num)->get();
		
        $user = array();
        $data = array();
		foreach ($historylist as $history){
            if( $history->group_id == 0 ){
			    $send_user = \DB::table('users')->where('id', $history->send_id)->first();
				$receive_user = \DB::table('users')->where('id', $history->receive_id)->first();
                if($receive_user) {
                    $user['id'] = $history->id;
                    $user['send_userid'] = $send_user->id;
                    $user['send_firstname'] = $send_user->first_name;
                    $user['send_lastname'] = $send_user->last_name;
                    $user['send_photo'] = $send_user->pic;
                    $user['receive_userid'] = $history->receive_id;
                    $user['receive_firstname'] = $receive_user->first_name;
                    $user['receive_lastname'] = $receive_user->last_name;
                    $user['receive_photo'] = $receive_user->pic;
                    $user['filename'] = $history->filename;
					
                    $date_temp = strtotime($history->created_at);
                    $user['created'] = date('m-d-Y H:i:s', $date_temp);
                    
                    $user['flag'] = 'contact';
                    array_push($data, $user);
                }
			} else{
				$send_user = \DB::table('users')->where('id', $user_id)->first();
				$group = \DB::table('ptt_group')->where('id', $history->group_id)->first();
                if($group) {
                    $user['id'] = $history->id;
                    $user['send_userid'] = $send_user->id;
                    $user['send_firstname'] = $send_user->first_name;
                    $user['send_lastname'] = $send_user->last_name;
                    $user['send_photo'] = $send_user->pic;
                    $user['receive_userid'] = $group->id;
                    $user['receive_firstname'] = $group->group_name;
                    $user['receive_lastname'] = '';
                    $user['receive_photo'] = '';
                    $user['filename'] = $history->filename;
					
					$date_temp = strtotime($history->created_at);
                    $user['created'] = date('m-d-Y H:i:s', $date_temp);
					
                    $user['flag'] = 'group';
                    array_push($data, $user);
                }
			}
	    }
        $unique_array = $this->get_unique_array($data,'send_userid','receive_userid');

        $result = array('status_code'=>'200', 'message'=>"success", 'data'=>$unique_array);
        return response()->json($result);
    }

    public function get_unique_array($array, $key1, $key2) {
        $temp_array = array();
        $i = 0;
        $key_array = array();

        foreach($array as $val) {
            $v1 = $val[$key1].$val[$key2];
            if (!in_array($v1, $key_array)) {
                array_push($key_array, $v1);
                $v2 = $val[$key2].$val[$key1];
                array_push($key_array, $v2);

                $temp_array[$i] = $val;
                $i++;
            }

        }
        return $temp_array;
    }

    public function gethistorylist1(Request $request)
    {
        $credentials = $request->only(
            'user_id', 'page_no'
        );
        $validator = Validator::make($credentials, [
            'user_id' => 'required',
            'page_no' => 'required'
        ]);
        if($validator->fails()) {
            throw new ValidationHttpException($validator->errors()->all());
        }

        $user_id = $request->get('user_id','');
        $page_no = $request->get('page_no','0');
        $num = 50;
        $start_num = (int)$page_no * $num;

        $user = array();
        $data = array();
        $historylist = \DB::table('ptt_history')->where('send_id', $user_id)->orWhere('receive_id', $user_id)->orderby('id', 'desc')->offset((int)$start_num)->limit($num)->get();
        foreach ($historylist as $history){
            $send_user = \DB::table('users')->where('id', $history->send_id)->first();
            $receive_user = \DB::table('users')->where('id', $history->receive_id)->first();

            $user['id'] = $history->id;
            $user['send_userid'] = $send_user->id;
            $user['send_firstname'] = $send_user->first_name;
            $user['send_lastname'] = $send_user->last_name;
            $user['send_photo'] = $send_user->pic;
            $user['receive_userid'] = $history->receive_id;
            $user['receive_firstname'] = $receive_user->first_name;
            $user['receive_lastname'] = $receive_user->last_name;
            $user['receive_photo'] = $receive_user->pic;
            $user['filename'] = $history->filename;
            
			$date_temp = strtotime($history->created_at);
            $user['created'] = date('m-d-Y H:i:s', $date_temp);
					
            $user['flag'] = 'contact';
            array_push($data, $user);
        }

        $send_user = \DB::table('users')->where('id', $user_id)->first();
        $historygrouplist = \DB::table('ptt_history_group')->where('create_userid', $user_id)->orderby('id', 'desc')->offset((int)$start_num)->limit($num)->get();
        foreach ($historygrouplist as $historygroup){
            $group = \DB::table('ptt_group')->where('id', $historygroup->group_id)->first();

            $user['id'] = $historygroup->id;
            $user['send_userid'] = $send_user->id;
            $user['send_firstname'] = $send_user->first_name;
            $user['send_lastname'] = $send_user->last_name;
            $user['send_photo'] = $send_user->pic;
            $user['receive_userid'] = $group->id;
            $user['receive_firstname'] = $group->group_name;
            $user['receive_lastname'] = '';
            $user['receive_photo'] = '';
            $user['filename'] = $historygroup->filename;
            
			$date_temp = strtotime($history->created_at);
            $user['created'] = date('m-d-Y H:i:s', $date_temp);
					
            $user['flag'] = 'group';
            array_push($data, $user);
        }

        $result = array('status_code'=>'200', 'message'=>"success", 'data'=>$data);
        return response()->json($result);
    }
    public function gethistorybycontact(Request $request)
    {
        $credentials = $request->only(
            'user_id', 'receive_id', 'page_no'
        );
        $validator = Validator::make($credentials, [
            'user_id' => 'required',
            'receive_id' => 'required',
            'page_no' => 'required'
        ]);
        if($validator->fails()) {
            throw new ValidationHttpException($validator->errors()->all());
        }

        $user_id = $request->get('user_id','');
        $receive_id = $request->get('receive_id','');
        $page_no = $request->get('page_no','0');
        $num = 50;
        $start_num = (int)$page_no * $num;
        $user = array();
        $data = array();
        $historylist = \DB::table('ptt_history')
            ->where(function ($query) use($user_id, $receive_id) {
                $query->where('send_id', $user_id)
                    ->where('receive_id', $receive_id);})
            ->orwhere(function ($query) use($user_id, $receive_id) {
                $query->where('send_id', $receive_id)
                    ->where('receive_id', $user_id);})
            ->orderby('id', 'desc')->offset((int)$start_num)->limit($num)->get();

        foreach ($historylist as $history){
            $send_user = \DB::table('users')->where('id', $history->send_id)->first();
            $receive_user = \DB::table('users')->where('id', $history->receive_id)->first();

            $user['id'] = $history->id;
            $user['send_userid'] = $history->send_id;
            $user['send_firstname'] = $send_user->first_name;
            $user['send_lastname'] = $send_user->last_name;
            $user['send_photo'] = $send_user->pic;
            $user['receive_userid'] = $history->receive_id;
            $user['receive_firstname'] = $receive_user->first_name;
            $user['receive_lastname'] = $receive_user->last_name;
            $user['receive_photo'] = $send_user->pic;
            $user['filename'] = $history->filename;
            
			$date_temp = strtotime($history->created_at);
            $user['created'] = date('m-d-Y H:i:s', $date_temp);
					
            array_push($data, $user);
        }

        $result = array('status_code'=>'200', 'message'=>"success", 'data'=>$data);
        return response()->json($result);
    }
    public function gethistorybygroup(Request $request)
    {
        $credentials = $request->only(
            'user_id', 'group_id', 'page_no'
        );
        $validator = Validator::make($credentials, [
            'user_id' => 'required',
            'group_id' => 'required',
            'page_no' => 'required'
        ]);
        if($validator->fails()) {
            throw new ValidationHttpException($validator->errors()->all());
        }

        $create_userid = $request->get('user_id','');
        $group_id = $request->get('group_id','');
        $page_no = $request->get('page_no','0');
        $num = 50;
        $start_num = (int)$page_no * $num;
        $user = array();
        $data = array();
        $send_user = \DB::table('users')->where('id', $create_userid)->first();
        $historygrouplist = \DB::table('ptt_history_group')
            ->where(function ($query) use($create_userid, $group_id) {
                $query->where('create_userid', $create_userid)
                    ->where('group_id', $group_id);})
            ->orwhere(function ($query) use($create_userid, $group_id) {
                $query->where('create_userid', $group_id)
                    ->where('group_id', $create_userid);})
            ->orderby('id', 'desc')->offset((int)$start_num)->limit($num)->get();

        foreach ($historygrouplist as $historygroup){
            $group = \DB::table('ptt_group')->where('id', $historygroup->group_id)->first();

            $user['id'] = $historygroup->id;
            $user['send_userid'] = $send_user->id;
            $user['send_firstname'] = $send_user->first_name;
            $user['send_lastname'] = $send_user->last_name;
            $user['send_photo'] = $send_user->pic;
            $user['receive_userid'] = $group->id;
            $user['receive_firstname'] = $group->group_name;
            $user['receive_lastname'] = '';
            $user['receive_photo'] = '';
            $user['filename'] = $historygroup->filename;
            
			$date_temp = strtotime($historygroup->created_at);
            $user['created'] = date('m-d-Y H:i:s', $date_temp);
					
            array_push($data, $user);
        }

        $result = array('status_code'=>'200', 'message'=>"success", 'data'=>$data);
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