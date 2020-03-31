<?php

namespace App\Http\Controllers;

use App\City;
use App\Http\Requests;
use Illuminate\Http\Request;
use Datatables;
use DB;
use App\Http\Controllers\sweetAlert;
use App\Category;
use App\Notification;
use Illuminate\Support\Facades\Redirect;
use Validator;
use URL;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */


    public function getlist(Request $request)
    {
        $today = date('Y-m-d');
        Notification::where('expired', '<', $today)->update(['status'=>1]);
        return View('admin/notification/notification');
    }
    public function getItem($id = 0){
        $notification = Notification::find($id);
        return json_encode($notification);
    }
    public function getData(Request $request)
    {

        $tables = Notification::orderby('id', 'desc');

        return Datatables::of($tables)
            ->edit_column('status', function ($data) {
                if ($data->status == 1) {
                    $status = config('Convert.active')[0];
                    return '<span style="color: #ca0002;cursor:pointer" class="active" data-toggle="modal" data-target="#activeModal" onclick="active_data1(\''.$data->id.'\')">' . $status . '</span>';
                    //return '<a onmouseover="this.style.color=\'#0618d8\" onMouseOut="this.style.color=\'#d80b06\'"> '. $status .'</span>';
                } else {
                    $status = config('Convert.inactive')[0];
                    return '<span class="inactive" style="color: #418bca;cursor:pointer" data-toggle="modal" data-target="#inactiveModal" onclick="inactive_data1(\''.$data->id.'\')">' . $status . '</span>';
                    //return '<a onmouseover="this.style.color=\'#0618d8\'" onMouseOut="this.style.color=\'#d80b06\'" class="active" href="javascript:;">' . $status . '</a>';
                }
            })
            ->add_column('actions',function($data) {
                $actions = '<a href='. url('/admin/notification/'.$data->id.'/show') .' ><i class="livicon" data-name="info" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="view notification"></i></a>&nbsp;&nbsp;&nbsp;
                <a href='. url('/admin/notification/'.$data->id.'/edit').'><i class="livicon" data-name="edit" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="update notification"></i></a>&nbsp;&nbsp;&nbsp;';

                if ($data->status == 0) {
                    $actions .= '<a href="" data-toggle="modal" data-target="#delete_confirm" onclick="deleteItem('.$data->id.')"><i class="livicon" data-name="trash" data-size="18" data-loop="true" data-c="#f56954" data-hc="#f56954" title="inactive notification"></i></a>';
                }
                return $actions;
            })
            ->make(true);
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

        $notification = Notification::find($id);
        $notification->title = $request->get('title');
        $notification->description = $request->get('description');
        $notification->expired = $request->get('expired');
        $notification->save();
        return Redirect::to("admin/notification/")->with('success', 'Successfully updated.');
    }

    public function deleteData($id)
    {

        DB::table('oollah_notifications')->where('id', $id)->delete();

    }

    public function updateShow($id = 0, Request $request)
    {
        $notification = Notification::find($id);
        $today = date('Y-m-d');
        return View('admin/notification/show', compact('today', 'notification'));
    }
    public function editData($id = 0, Request $request)
    {
        $notification = Notification::find($id);
        $today = date('Y-m-d');
        return View('admin/notification/edit', compact('today', 'notification'));
    }
    public function create(Request $request)
    {
        $today = date('Y-m-d');
        return View('admin/notification/create', compact('today'));
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
        $notification = new Notification();
        $notification->title = $request->get('title');
        $notification->description = $request->get('description');
        $notification->expired = $request->get('expired');
        $notification->save();
        return Redirect::to("admin/notification/")->with('success', 'Successfully added.');
    }

    public function activeData($id = 0, Request $request)
    {
        DB::table('oollah_notifications')->where('id', $id)->update(['status'=>0]);
        $data = array("status"=>0);
        return $data;
    }

    public function inactiveData($id = 0, Request $request)
    {
        DB::table('oollah_notifications')->where('id', $id)->update(['status'=>1]);
        $data = array("status"=>1);
        return $data;
    }
}

