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

class GroupController extends Controller
{
    use Helpers;

    public function createGroup(Request $request)
    {
        $credentials = $request->only(
            'user_id','group_name', 'group_members'
        );
        $validator = Validator::make($credentials, [
            'user_id' => 'required',
            'group_name' => 'required',
            'group_members' => 'required'
        ]);
        if($validator->fails()) {
            throw new ValidationHttpException($validator->errors()->all());
        }
        $create_userid = $request->get('user_id', '');
        $group_name = $request->get('group_name', '');
        $group_members = $request->get('group_members', '');

        $name = \DB::table('ptt_group')->where('group_name',$group_name)->first();
        if($name){
            $result = array('status_code'=>'605', 'message'=>'Group already exists.');
        }else{
            $data = [ 'group_name' => $group_name , 'create_userid' => $create_userid ];
            $group_id = \DB::table('ptt_group')->insertGetId($data);

            /*$group_userid = explode(",", $group_members);
            foreach ($group_userid as $userid){
                $data = [ 'group_id' => $group_id , 'user_id' => $userid ];
                \DB::table('ptt_group_member')->insert($data);
            }*/
            $data = [ 'group_id' => $group_id , 'user_id' => $group_members ];
            \DB::table('ptt_group_member')->insert($data);

            $data = array('group_id'=>$group_id);
            $result = array('status_code'=>'200', 'data'=>$data, 'message'=>'success');
        }

        return response()->json($result);
    }
    public function updateGroup(Request $request)
    {
        $credentials = $request->only(
            'user_id','group_id','group_name', 'group_members'
        );
        $validator = Validator::make($credentials, [
            'user_id' => 'required',
            'group_id' => 'required',
            'group_name' => 'required',
            'group_members' => 'required'
        ]);
        if($validator->fails()) {
            throw new ValidationHttpException($validator->errors()->all());
        }
        $create_userid = $request->get('user_id', '');
        $group_id = $request->get('group_id', '');
        $group_name = $request->get('group_name', '');
        $group_members = $request->get('group_members', '');

        $group = \DB::table('ptt_group')->where('id',$group_id)->first();
        if($group){
            $data = [ 'group_name' => $group_name ];
            \DB::table('ptt_group')->where('id', $group_id)->update($data);

            $data = [ 'user_id' => $group_members ];
            \DB::table('ptt_group_member')->where('group_id', $group_id)->update($data);

            $result = array('status_code'=>'200', 'message'=>'success');
        }else{
            $result = array('status_code'=>'606', 'message'=>'Group does not exists.');
        }

        return response()->json($result);
    }

    public function removeGroup(Request $request)
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
        $create_userid = $request->get('user_id', '');
        $group_id = $request->get('group_id', '');

        \DB::table('ptt_group')->where('create_userid', $create_userid)->where('id', $group_id)->delete();

        \DB::table('ptt_group_member')->where('group_id', $group_id)->delete();

        $result = array('status_code'=>'200', 'message'=>'success');
        return response()->json($result);
    }

}