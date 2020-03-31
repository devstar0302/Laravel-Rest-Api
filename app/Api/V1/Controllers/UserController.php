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

class UserController extends Controller
{
    use Helpers;

    public function updateprofile(Request $request)
    {
        $credentials = $request->only(
            'userid', 'interest'
        );
        $validator = Validator::make($credentials, [
            'userid' => 'required',
            'interest' => 'required'
        ]);
        if($validator->fails()) {
            throw new ValidationHttpException($validator->errors()->all());
        }
        $userid = $request->get('userid');
        $interest = $request->get('interest');
        
        $user = \DB::table('users')->where('id', $userid)->first();
        if($user){
            \DB::table('users')->where('id', $userid)->update(['interest'=>$interest]);
            $result = array('status_code'=>'200', 'message'=>"success");
        } else {
            $result = array('status_code'=>'603', 'message'=>"User don't exist!");
        }
        return response()->json($result);
    }
    public function uploadphoto(Request $request)
    {
        $credentials = $request->only(
            'userid', 'receiverid'
        );
        $validator = Validator::make($credentials, [
            'userid' => 'required',
            'receiverid' => 'required'
        ]);
        if($validator->fails()) {
            throw new ValidationHttpException($validator->errors()->all());
        }
        $userid = $request->get('userid');
        $receiverid = $request->get('receiverid');
        $message = $request->get('message');

        $safeName = '';
        if ($file = $request->file('photo')) {
            $fileName = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $folderName = '/uploads/photo';
            $destinationPath = base_path() . $folderName;
            $safeName = str_random(10) . '.' . $extension;
            $file->move($destinationPath, $safeName);

            $upload = \DB::table('weebie_message')->where('userid', $userid)->where('receiverid', $receiverid)->first();

            if($upload) {
                \DB::table('weebie_message')->where('id', $upload->id)->update(['userid' => $userid, 'receiverid' => $receiverid, 'message' => $message, 'photo' => $safeName]);
                $upload_id = $upload->id;
            }else
                $upload_id = \DB::table('weebie_message')->insertGetId(['userid'=>$userid,'receiverid'=>$receiverid,'message'=>$message,'photo'=>$safeName]);

            $sender = \DB::table('users')->where('id', $userid)->first();
            $receiver = \DB::table('users')->where('id', $receiverid)->first();
            $mile = $this->distance((float)$sender->lat, (float)$sender->lon, (float)$receiver->lat, (float)$receiver->lon, 'K');
            $unit = 'K';

            $send_data = array( 'flag'=>'receiveimage', 'inviteid'=>$upload_id, 'receiveimagepath'=>$safeName, 'id'=>$sender->id, 'distance'=>$mile,'unit'=>$unit);

            $push = new PushNotification('fcm');
            $deviceToken = DeviceToken::where('userid',$receiverid)->first()->device_token;
            $pushtoken = array($deviceToken);

            $push->setMessage($send_data)
                ->setApiKey('AAAAKBwMsyU:APA91bGcg1nKngLkM-Lld3YXssO6VcOtYRcMuGJqkGGEHfCtrldf87iRjgklzS1ptigPrMHZ3yGV8JxBrC_YdOJiH_367RUGpjDlDRSUUO6sZ-Rn7Q67Dog_cX__hxfwUl7zybn51TZQ')
                ->setDevicesToken($pushtoken)
                ->setConfig(['dry_run' => false]);
            $push->send();

            $result = array('status_code'=>'200', 'message'=>"success photo upload");
        } else {
            $result = array('status_code'=>'608', 'message'=>"Photo Upload Failure!");
        }
        return response()->json($result);
    }
    public function updatelocation(Request $request)
    {
        $credentials = $request->only(
            'userid', 'lat', 'lon'
        );
        $validator = Validator::make($credentials, [
            'userid' => 'required',
            'lat' => 'required',
            'lon' => 'required'
        ]);
        if($validator->fails()) {
            throw new ValidationHttpException($validator->errors()->all());
        }
        $userid = $request->get('userid','');
        $lat = $request->get('lat','');
        $lon = $request->get('lon','');
        $country = $request->get('country','');
        $state = $request->get('state','');
        $city = $request->get('city','');
        $address = $request->get('address','');

        $user = \DB::table('users')->where('id', $userid)->first();
        if($user){
            \DB::table('users')->where('id', $userid)->update(['lat'=>$lat,'lon'=>$lon,'country'=>$country,'state'=>$state,'city'=>$city,'address'=>$address]);
            $result = array('status_code'=>'200', 'message'=>"success");
        } else {
            $result = array('status_code'=>'603', 'message'=>"User don't exist!");
        }
        return response()->json($result);
    }
    public function getuserprofile(Request $request)
    {
        $credentials = $request->only(
            'senderuserid', 'inviteid'
        );
        $validator = Validator::make($credentials, [
            'senderuserid' => 'required',
            'inviteid' => 'required'
        ]);
        if($validator->fails()) {
            throw new ValidationHttpException($validator->errors()->all());
        }
        $userid = $request->get('senderuserid','');
        $inviteid = $request->get('inviteid','');

        $user = \DB::table('users')->where('id', $userid)->first();
        $invitecreated = \DB::table('weebie_invite')->where('id', $inviteid)->first()->created_at;
        if($user){
            $data = array( 'invitecreated'=>$invitecreated, 'name'=>$user->username,'photo'=>$user->pic,'gender'=>$user->gender,'interest'=>$user->interest,'country'=>$user->country,'state'=>$user->state,'city'=>$user->city,'address'=>$user->address);
            $result = array('status_code'=>'200','data'=>$data, 'message'=>"success");
        } else {
            $result = array('status_code'=>'603', 'message'=>"User don't exist!");
        }
        return response()->json($result);
    }
    public function getuserprofilefrommessage(Request $request)
    {
        $credentials = $request->only(
            'senderuserid','messageid'
        );
        $validator = Validator::make($credentials, [
            'senderuserid' => 'required',
            'messageid' => 'required'
        ]);
        if($validator->fails()) {
            throw new ValidationHttpException($validator->errors()->all());
        }
        $userid = $request->get('senderuserid');
        $messageid = $request->get('messageid');

        $user = \DB::table('users')->where('id', $userid)->first();
        $message = \DB::table('weebie_message')->where('id', $messageid)->first()->message;
        if($message == '') $message = 'null';
        if($user){
            $data = array( 'name'=>$user->username,'receivemessage'=>$message,'photo'=>$user->pic,'gender'=>$user->gender,'interest'=>$user->interest,'country'=>$user->country,'state'=>$user->state,'city'=>$user->city,'address'=>$user->address);
            $result = array('status_code'=>'200','data'=>$data, 'message'=>"success");
        } else {
            $result = array('status_code'=>'603', 'message'=>"User don't exist!");
        }
        return response()->json($result);
    }
    public function sendinvite(Request $request)
    {
        $credentials = $request->only(
            'userid', 'receiverid'
        );
        $validator = Validator::make($credentials, [
            'userid' => 'required',
            'receiverid' => 'required'
        ]);
        if($validator->fails()) {
            throw new ValidationHttpException($validator->errors()->all());
        }
        $userid = $request->get('userid','');
        $receiverid = $request->get('receiverid','');

        $invite = \DB::table('weebie_invite')->where('masterid', $userid)->where('receiverid', $receiverid)->orderby('id','desc')->first();
        if($invite){

            $createtime = new \DateTime($invite->created_at);
            $now = new \DateTime();

            $diff = date_diff($now, $createtime);
            //$diff = $now->diff($createtime);

            $hours = $diff->h - 8;
            $hours = $hours + ($diff->days*24);

            if($hours < 3){
                $result = array('status_code'=>'609', 'message'=>"Send invite after a moment.");
                return response()->json($result);
            }
        }

        $inviteid = \DB::table('weebie_invite')->insertGetId(['masterid'=>$userid, 'receiverid'=>$receiverid]);

        $sender = \DB::table('users')->where('id', $userid)->first();
        $receiver = \DB::table('users')->where('id', $receiverid)->first();
        $mile = $this->distance((float)$sender->lat, (float)$sender->lon, (float)$receiver->lat, (float)$receiver->lon, 'K');
        $unit = 'K';

        $send_data = array( 'flag'=>'invite', 'inviteid'=>$inviteid, 'id'=>$sender->id, 'distance'=>$mile,'unit'=>$unit);
        
        $deviceToken = DeviceToken::where('userid',$receiverid)->first()->device_token;
        if($deviceToken){
            //  push notification
            $push = new PushNotification('fcm');
            $pushtoken = array($deviceToken);
            $push->setMessage($send_data)
                ->setApiKey('AAAAKBwMsyU:APA91bGcg1nKngLkM-Lld3YXssO6VcOtYRcMuGJqkGGEHfCtrldf87iRjgklzS1ptigPrMHZ3yGV8JxBrC_YdOJiH_367RUGpjDlDRSUUO6sZ-Rn7Q67Dog_cX__hxfwUl7zybn51TZQ')
                ->setDevicesToken($pushtoken)
                ->setConfig(['dry_run' => false]);
            $push->send();

            $data = array( 'inviteid'=>$inviteid, 'status'=>'under');
            $result = array('status_code'=>'200', 'data'=>$data, 'message'=>"success");
        }else{
            $result = array('status_code'=>'603', 'message'=>"Push Notification Failure.");
        }
        return response()->json($result);
    }
    public function accept(Request $request)
    {
        $credentials = $request->only(
            'inviteid'
        );
        $validator = Validator::make($credentials, [
            'inviteid' => 'required'
        ]);
        if($validator->fails()) {
            throw new ValidationHttpException($validator->errors()->all());
        }
        $inviteid = $request->get('inviteid','');

        \DB::table('weebie_invite')->where('id', $inviteid)->update(['status'=>'accept']);
        $invite = \DB::table('weebie_invite')->where('id', $inviteid)->first();

        $sender = \DB::table('users')->where('id', $invite->receiverid)->first();
        $receiver = \DB::table('users')->where('id', $invite->masterid)->first();
        $mile = $this->distance((float)$sender->lat, (float)$sender->lon, (float)$receiver->lat, (float)$receiver->lon, 'K');
        $unit = 'K';

        $send_data = array( 'flag'=>'accept', 'inviteid'=>$invite->id,'id'=>$sender->id, 'distance'=>$mile,'unit'=>$unit );

        $deviceToken = DeviceToken::where('userid',$invite->masterid)->first()->device_token;
        if($deviceToken){
            //  push notification
            $push = new PushNotification('fcm');
            $pushtoken = array($deviceToken);
            $push->setMessage($send_data)
                ->setApiKey('AAAAKBwMsyU:APA91bGcg1nKngLkM-Lld3YXssO6VcOtYRcMuGJqkGGEHfCtrldf87iRjgklzS1ptigPrMHZ3yGV8JxBrC_YdOJiH_367RUGpjDlDRSUUO6sZ-Rn7Q67Dog_cX__hxfwUl7zybn51TZQ')
                ->setDevicesToken($pushtoken)
                ->setConfig(['dry_run' => false]);
            $push->send();

            $data = array( 'inviteid'=>$inviteid, 'status'=>$invite->status);
            $result = array('status_code'=>'200','data'=>$data, 'message'=>"success");
        }else{
            $result = array('status_code'=>'603', 'message'=>"Push Notification Failure.");
        }
        return response()->json($result);
    }
    public function discard(Request $request)
    {
        $credentials = $request->only(
            'inviteid'
        );
        $validator = Validator::make($credentials, [
            'inviteid' => 'required'
        ]);
        if($validator->fails()) {
            throw new ValidationHttpException($validator->errors()->all());
        }
        $inviteid = $request->get('inviteid','');

        \DB::table('weebie_invite')->where('id', $inviteid)->update(['status'=>'discard']);
        $invite = \DB::table('weebie_invite')->where('id', $inviteid)->first();

        $sender = \DB::table('users')->where('id', $invite->receiverid)->first();
        $receiver = \DB::table('users')->where('id', $invite->masterid)->first();
        $mile = $this->distance((float)$sender->lat, (float)$sender->lon, (float)$receiver->lat, (float)$receiver->lon, 'K');
        $unit = 'K';

        $send_data = array( 'flag'=>'discard', 'inviteid'=>$invite->id, 'id'=>$sender->id, 'distance'=>$mile,'unit'=>$unit);

        $deviceToken = DeviceToken::where('userid',$invite->masterid)->first()->device_token;
        if($deviceToken){
            //  push notification
            $push = new PushNotification('fcm');
            $pushtoken = array($deviceToken);
            $push->setMessage($send_data)
                ->setApiKey('AAAAKBwMsyU:APA91bGcg1nKngLkM-Lld3YXssO6VcOtYRcMuGJqkGGEHfCtrldf87iRjgklzS1ptigPrMHZ3yGV8JxBrC_YdOJiH_367RUGpjDlDRSUUO6sZ-Rn7Q67Dog_cX__hxfwUl7zybn51TZQ')
                ->setDevicesToken($pushtoken)
                ->setConfig(['dry_run' => false]);
            $push->send();

            $data = array( 'inviteid'=>$inviteid, 'status'=>$invite->status);
            $result = array('status_code'=>'200','data'=>$data, 'message'=>"success");
        }else{
            $result = array('status_code'=>'603', 'message'=>"Push Notification Failure.");
        }
        return response()->json($result);
    }
    public function deleteinvitehistory(Request $request)
    {
        $credentials = $request->only(
            'id'
        );
        $validator = Validator::make($credentials, [
            'id' => 'required'
        ]);
        if($validator->fails()) {
            throw new ValidationHttpException($validator->errors()->all());
        }

        $id = $request->get('id');
        $invite = \DB::table('weebie_invite')->where('id', $id)->first();
        if($invite){
            \DB::table('weebie_invite')->where('id', $id)
                ->update(['del_send'=>1]);
            $result = array('status_code'=>'200', 'message'=>"success");
        }else{
            $result = array('status_code'=>'600', 'message'=>"Invite item no exist!");
        }

        return response()->json($result);

    }
    public function deletereceiveinvitehistory(Request $request)
    {
        $credentials = $request->only(
            'id'
        );
        $validator = Validator::make($credentials, [
            'id' => 'required'
        ]);
        if($validator->fails()) {
            throw new ValidationHttpException($validator->errors()->all());
        }

        $id = $request->get('id');
        $invite = \DB::table('weebie_invite')->where('id', $id)->first();
        if($invite){
            \DB::table('weebie_invite')->where('id', $id)
                ->update(['del_receive'=>1]);
            $result = array('status_code'=>'200', 'message'=>"success");
        }else{
            $result = array('status_code'=>'600', 'message'=>"Invite item no exist!");
        }
        return response()->json($result);
    }
    public function getinvitehistory(Request $request)
    {
        $credentials = $request->only(
            'userid', 'page_no'
        );
        $validator = Validator::make($credentials, [
            'userid' => 'required',
            'page_no' => 'required'
        ]);
        if($validator->fails()) {
            throw new ValidationHttpException($validator->errors()->all());
        }

        $userid = $request->get('userid','');
        $page_no = $request->get('page_no','0');
        $num = 50;
        $start_num = (int)$page_no * $num;
        $user = array();
        $data = array();
        $historylist = \DB::table('weebie_invite')->where('masterid',$userid)
            ->where('del_send', 0)
            ->orderby('id', 'desc')->offset((int)$start_num)->limit($num)->get();

        $master = \DB::table('users')->where('id', $userid)->first();
        foreach ($historylist as $history){
            $receiver = \DB::table('users')->where('id', $history->receiverid)->first();

            $user['inviteid'] = $history->id;
            $user['status'] = $history->status;

            $user['userid'] = $history->receiverid;
            $user['name'] = $receiver->username;
            $user['gender'] = $receiver->gender;
            $user['interest'] = $receiver->interest;
            $user['photo'] = $receiver->pic;
            $user['country'] = $receiver->country;
            $user['state'] = $receiver->state;
            $user['city'] = $receiver->city;
            $user['address'] = $receiver->address;

            $mile = $this->distance((float)$master->lat, (float)$master->lon, (float)$receiver->lat, (float)$receiver->lon, 'K');
            $user['distance'] = $mile;
            $user['unit'] = 'K';

            $date_temp = strtotime($history->created_at);
            $user['created'] = date('m-d-Y H:i:s', $date_temp);

            array_push($data, $user);
        }

        $result = array('status_code'=>'200', 'message'=>"success", 'data'=>$data);
        return response()->json($result);
    }
    public function getreceiveinvitehistory(Request $request)
    {
        $credentials = $request->only(
            'userid', 'page_no'
        );
        $validator = Validator::make($credentials, [
            'userid' => 'required',
            'page_no' => 'required'
        ]);
        if($validator->fails()) {
            throw new ValidationHttpException($validator->errors()->all());
        }

        $userid = $request->get('userid','');
        $page_no = $request->get('page_no','0');
        $num = 50;
        $start_num = (int)$page_no * $num;
        $user = array();
        $data = array();
        $historylist = \DB::table('weebie_invite')->where('receiverid',$userid)
            ->where('del_receive', 0)
            ->orderby('id', 'desc')->offset((int)$start_num)->limit($num)->get();

        $master = \DB::table('users')->where('id', $userid)->first();
        foreach ($historylist as $history){
            $receiver = \DB::table('users')->where('id', $history->masterid)->first();

            $user['inviteid'] = $history->id;
            $user['status'] = $history->status;

            $user['userid'] = $history->masterid;
            $user['name'] = $receiver->username;
            $user['gender'] = $receiver->gender;
            $user['interest'] = $receiver->interest;
            $user['photo'] = $receiver->pic;
            $user['country'] = $receiver->country;
            $user['state'] = $receiver->state;
            $user['city'] = $receiver->city;
            $user['address'] = $receiver->address;

            $mile = $this->distance((float)$master->lat, (float)$master->lon, (float)$receiver->lat, (float)$receiver->lon, 'K');
            $user['distance'] = $mile;
            $user['unit'] = 'K';

            $date_temp = strtotime($history->created_at);
            $user['created'] = date('m-d-Y H:i:s', $date_temp);

            array_push($data, $user);
        }

        $result = array('status_code'=>'200', 'message'=>"success", 'data'=>$data);
        return response()->json($result);
    }
    public function search(Request $request)
    {
        $credentials = $request->only(
            'userid', 'distance', 'unit','gender'
        );
        $validator = Validator::make($credentials, [
            'userid' => 'required',
            'distance' => 'required',
            'unit' => 'required',
            'gender' => 'required'
        ]);
        if($validator->fails()) {
            throw new ValidationHttpException($validator->errors()->all());
        }
        $userid = $request->get('userid','');
        $distance = $request->get('distance','');
        $unit = $request->get('unit','');
        $gender = $request->get('gender','');

        $masteruser = \DB::table('users')->where('id', $userid )->first();
        $userlist = \DB::table('users')
            ->where('id', '<>', $userid )
            ->where('login_status', 'login' )
            ->where('gender', $gender )->get();

        if($userlist) {
            $person = array();
            $data = array();
            $lat1 = (float)$masteruser->lat;
            $lon1 = (float)$masteruser->lon;
            foreach ($userlist as $user) {
                $lat2 = (float)$user->lat;
                $lon2 = (float)$user->lon;
                $mile = $this->distance($lat1, $lon1, $lat2, $lon2, $unit);
                if ($mile <= (float)$distance) {
                    $person['id'] = $user->id;
                    $person['name'] = $user->username;
                    $person['gender'] = $user->gender;
                    $person['interest'] = $user->interest;
                    $person['photo'] = $user->pic;
                    $person['unit'] = $unit;
                    $person['distance'] = $mile;
                    $person['country'] = $user->country;
                    $person['state'] = $user->state;
                    $person['city'] = $user->city;
                    $person['address'] = $user->address;

                    array_push($data, $person);
                }
            }
            if($data)
                $result = array('status_code' => '200', 'data'=>$data,'message' => 'success');
            else
                $result = array('status_code' => '600');
        }else{
            $result = array('status_code' => '600');
        }
        return response()->json($result);
    }
    public function distance($lat1, $lon1, $lat2, $lon2, $unit) {
        $theta = $lon1 - $lon2;
        $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
        $dist = acos($dist);
        $dist = rad2deg($dist);
        $miles = $dist * 60 * 1.1515;
        $unit = strtoupper($unit);

        if ($unit == "K") {
            return ($miles * 1.609344);
        } else if ($unit == "N") {
            return ($miles * 0.8684);
        } else {
            return $miles;
        }
    }

}