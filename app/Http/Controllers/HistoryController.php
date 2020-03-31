<?php

namespace App\Http\Controllers;

use App\City;
use App\Http\Requests;
use Illuminate\Http\Request;
use Datatables;
use DB;
use App\Http\Controllers\sweetAlert;
use App\Category;
use App\History;
use Illuminate\Support\Facades\Redirect;
use Validator;
use URL;
use File;

class HistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */


    public function getlist(Request $request)
    {
        return View('admin/history/history');
    }
    public function getgrouplist(Request $request)
    {
        return View('admin/history/historygroup');
    }
    public function getItem($id = 0){
        $notification = Advertisement::find($id);
        return json_encode($notification);
    }
    public function getData(Request $request)
    {

        $tables = History::orderby('id', 'asc');

        return Datatables::of($tables)
            ->edit_column('send_id', function ($data) {
                $sendUser = DB::table('users')->select(['users.first_name as firstname', 'users.last_name as lastname'])->where('users.id', $data->send_id)->first();

                return $sendUser->firstname." ".$sendUser->lastname;
            })
            ->edit_column('receive_id', function ($data) {
                $receiveUser = DB::table('users')->select(['users.first_name as firstname', 'users.last_name as lastname'])->where('users.id', $data->receive_id)->first();

                return $receiveUser->firstname." ".$receiveUser->lastname;
            })
            ->edit_column('filename', function ($data) {
                $realname = '<a href="'.url('/').'/uploads/record/'.$data->filename.'" target="_blank">'.$data->filename.'</a>';
                return $realname;
            })
            ->add_column('actions',function($data) {
                $actions = '';
                if ($data->delete == 0) {
                    $actions .= '<a href="" data-toggle="modal" data-target="#delete_confirm" onclick="deleteItem('.$data->id.')"><i class="livicon" data-name="trash" data-size="18" data-loop="true" data-c="#f56954" data-hc="#f56954" title="inactive advertisement"></i></a>';
                }
                return $actions;
            })
            ->make(true);
    }
    public function getGroupData(Request $request)
    {

        $tables = DB::table('ptt_history_group')
            ->join('ptt_group', 'ptt_history_group.group_id', '=', 'ptt_group.id')
            ->select(['ptt_history_group.id as id','ptt_history_group.create_userid as create_userid','ptt_group.group_name as group_name','ptt_history_group.realname as realname','ptt_history_group.filename as filename','ptt_history_group.delete as delete','ptt_history_group.created_at as created_at'])
            ->orderby('ptt_history_group.created_at', 'desc');

        return Datatables::of($tables)
            ->edit_column('send_id', function ($data) {
                $sendUser = DB::table('users')->select(['users.first_name as firstname', 'users.last_name as lastname'])->where('users.id', $data->create_userid)->first();

                return $sendUser->firstname." ".$sendUser->lastname;
            })
            ->edit_column('filename', function ($data) {
                $realname = '<a href="'.url('/').'/uploads/record/'.$data->filename.'" target="_blank">'.$data->filename.'</a>';
                return $realname;
            })
            ->add_column('actions',function($data) {
                $actions = '';
                if ($data->delete == 0) {
                    $actions .= '<a href="" data-toggle="modal" data-target="#delete_confirm" onclick="deleteItem('.$data->id.')"><i class="livicon" data-name="trash" data-size="18" data-loop="true" data-c="#f56954" data-hc="#f56954" title="inactive advertisement"></i></a>';
                }
                return $actions;
            })
            ->make(true);
    }
    public function deleteData($id)
    {
        $history = DB::table('ptt_history')->where('id', $id)->first();

        $record_name = "/uploads/record/".$history->filename;

        if (File::exists(public_path().$record_name)) {
            File::delete(public_path().$record_name);
        }

        DB::table('ptt_history')->where('id', $id)->delete();
        
    }
    public function deleteGroupData($id)
    {
        $history = DB::table('ptt_history_group')->where('id', $id)->first();

        $record_name = "/uploads/record/".$history->filename;

        if (File::exists(public_path().$record_name)) {
            File::delete(public_path().$record_name);
        }

        DB::table('ptt_history_group')->where('id', $id)->delete();

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

