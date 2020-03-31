<?php

namespace App\Http\Controllers;

use App\City;
use App\Http\Requests;
use Illuminate\Http\Request;
use Datatables;
use DB;
use App\Http\Controllers\sweetAlert;
use App\Category;
use App\Contact;
use Illuminate\Support\Facades\Redirect;
use Validator;
use URL;
use File;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */


    public function getlist(Request $request)
    {
        return View('admin/contact/contact');
    }
    public function getgrouplist(Request $request)
    {
        return View('admin/contact/contactgroup');
    }
    public function getItem($id = 0){
        $notification = Advertisement::find($id);
        return json_encode($notification);
    }
    public function getData(Request $request)
    {

        $tables = Contact::orderby('id', 'asc');

        return Datatables::of($tables)
            ->edit_column('master_id', function ($data) {
                $masterUser = DB::table('users')->select(['users.first_name as firstname', 'users.last_name as lastname'])->where('users.id', $data->master_id)->first();

                return $masterUser->firstname." ".$masterUser->lastname;
            })
            ->edit_column('contact_id', function ($data) {
                $contactUser = DB::table('users')->select(['users.first_name as firstname', 'users.last_name as lastname'])->where('users.id', $data->contact_id)->first();

                return $contactUser->firstname." ".$contactUser->lastname;
            })->make(true);
        /*  ->add_column('actions',function($data) {
                $actions = '<a href='. url('/admin/advertisement/'.$data->id.'/show') .' ><i class="livicon" data-name="info" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="view notification"></i></a>&nbsp;&nbsp;&nbsp;
                <a href='. url('/admin/advertisement/'.$data->id.'/edit').'><i class="livicon" data-name="edit" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="update notification"></i></a>&nbsp;&nbsp;&nbsp;';

                if ($data->status == 0) {
                    $actions .= '<a href="" data-toggle="modal" data-target="#delete_confirm" onclick="deleteItem('.$data->id.')"><i class="livicon" data-name="trash" data-size="18" data-loop="true" data-c="#f56954" data-hc="#f56954" title="inactive advertisement"></i></a>';
                }
                return $actions;
            })
            ->make(true);*/
    }
    public function getGroupData(Request $request)
    {
        $tables = DB::table('ptt_group')
            ->join('ptt_group_member', 'ptt_group.id', '=', 'ptt_group_member.group_id')
            ->select(['ptt_group.id as id','ptt_group.create_userid as create_userid','ptt_group.group_name as group_name','ptt_group_member.user_id as user_id','ptt_group.created_at as created_at'])
            ->orderby('ptt_group.created_at', 'desc');
        
        return Datatables::of($tables)
            ->edit_column('create_userid', function ($data) {
                $createdUser = DB::table('users')->select(['users.first_name as firstname', 'users.last_name as lastname'])->where('users.id', $data->create_userid)->first();

                return $createdUser->firstname." ".$createdUser->lastname;
            })
            ->edit_column('user_id', function ($data) {
                $userlist = '';
                $memberlist = explode(",", $data->user_id);
                foreach ($memberlist as $member){
                    if($userlist != "")
                        $userlist = $userlist.', ';
                    $user = DB::table('users')->select(['users.first_name as firstname', 'users.last_name as lastname'])->where('users.id', $member)->first();
                    if($user)
                        $userlist = $userlist.$user->firstname." ".$user->lastname;
                }

                return $userlist;
            })->make(true);

    }

    public function updateData($id = 0, Request $request)
    {
        $rules = array(
            'title' => 'required',
            'description' => 'required',
            'expired' => 'required',
        );
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            // Ooops.. something went wrong
            return Redirect::to(URL::previous())->withInput()->withErrors($validator);
        }

        $notification = Advertisement::find($id);
        if ($file = $request->file('photo')) {
            $extension = $file->getClientOriginalExtension() ?: 'png';
            $folderName = '/uploads/advertisement/';
            $destinationPath = public_path() . $folderName;
            $safeName = str_random(10) . '.' . $extension;
            $file->move($destinationPath, $safeName);
            //delete old pic if exists
            if (File::exists(public_path() . $folderName . $notification->photo)) {
                File::delete(public_path() . $folderName . $notification->photo);
            }
            //save new file path into db
            $notification->photo = $safeName;

        }
        $notification->title = $request->get('title');
        $notification->description = $request->get('description');
        $notification->expired = $request->get('expired');
        $notification->save();
        return Redirect::to("admin/advertisement/")->with('success', 'Successfully updated.');
    }

    public function deleteData($id)
    {

        DB::table('oollah_advertisements')->where('id', $id)->delete();

    }

    public function updateShow($id = 0, Request $request)
    {
        $notification = Advertisement::find($id);
        $today = date('Y-m-d');
        return View('admin/advertisement/show', compact('today', 'notification'));
    }
    public function editData($id = 0, Request $request)
    {
        $notification = Advertisement::find($id);
        $today = date('Y-m-d');
        return View('admin/advertisement/edit', compact('today', 'notification'));
    }
    public function create(Request $request)
    {
        $today = date('Y-m-d');
        return View('admin/advertisement/create', compact('today'));
    }
    public function addData(Request $request)
    {
        $rules = array(
            'title' => 'required',
            'description' => 'required',
            'expired' => 'required',
        );
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            // Ooops.. something went wrong
            return Redirect::to(URL::previous())->withInput()->withErrors($validator);
        }

        $notification = new Advertisement();
        $notification->title = $request->get('title');
        $notification->description = $request->get('description');
        $notification->expired = $request->get('expired');
        if ($file = $request->file('photo')) {
            $extension = $file->getClientOriginalExtension() ?: 'png';
            $folderName = '/uploads/advertisement/';
            $destinationPath = public_path() . $folderName;
            $safeName = str_random(10) . '.' . $extension;
            $file->move($destinationPath, $safeName);


            //save new file path into db
            $notification->photo = $safeName;

        }
        $notification->save();
        return Redirect::to("admin/advertisement/")->with('success', 'Successfully added.');
    }

    public function activeData($id = 0, Request $request)
    {
        DB::table('oollah_advertisements')->where('id', $id)->update(['status'=>0]);
        $data = array("status"=>0);
        return $data;
    }

    public function inactiveData($id = 0, Request $request)
    {
        DB::table('oollah_advertisements')->where('id', $id)->update(['status'=>1]);
        $data = array("status"=>1);
        return $data;
    }
}

