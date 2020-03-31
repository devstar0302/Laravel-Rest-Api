<?php

namespace App\Http\Controllers;

use App\City;
use App\Http\Requests;
use Illuminate\Http\Request;
use Datatables;
use DB;
use App\Http\Controllers\sweetAlert;
use App\Category;
use App\Advertise;
use Illuminate\Support\Facades\Redirect;
use Validator;
use URL;

class AdvertiseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */


    public function getlist($type = 0, Request $request)
    {
        $today = date('Y-m-d');
        Advertise::where('expired', '<', $today)->where('type', $type)->update(['status'=>1]);
        return View('admin/advertise/advertise', compact('type'));
    }
    public function getItem($type = 0, $id = 0){
        $advertise = Advertise::find($id);
        return json_encode($advertise);
    }
    public function getData($type = 0, Request $request)
    {

        $tables = Advertise::where('type', $type)->orderby('id', 'desc');

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
            ->edit_column('image', function ($data) {
                $url = '/uploads/files/advertises/noimage.png';
                if($data->photo != ''){
                    $url = '/uploads/files/advertises/'.$data->photo;
                }
                return '<img src="'.$url.'" style="width:50px;height:auto;max-height:50px">';
            })
            ->edit_column('weburl', function ($data) {

                return '<a href="'.$data->weburl.'" style="text-decoration:none" target="_blank">'.$data->weburl.'</a>';
            })
            ->add_column('actions',function($data) {
                $actions = '<a href='. url('/admin/advertise/'.$data->id.'/show') .' ><i class="livicon" data-name="info" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="view advertise"></i></a>&nbsp;&nbsp;&nbsp;
                <a href='. url('/admin/advertise/'.$data->id.'/edit').'><i class="livicon" data-name="edit" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="update Advertise"></i></a>&nbsp;&nbsp;&nbsp;';

                if ($data->status == 0) {
                    $actions .= '<a href="" data-toggle="modal" data-target="#delete_confirm" onclick="deleteItem('.$data->id.')"><i class="livicon" data-name="trash" data-size="18" data-loop="true" data-c="#f56954" data-hc="#f56954" title="inactive advertise"></i></a>';
                }
                return $actions;
            })
            ->make(true);
    }

    public function updateData($id = 0, Request $request)
    {
        $rules = array(
            'type' => 'required',
            'title' => 'required',
            'description' => 'required',
            'weburl' => 'required',
            'photo' => 'image|mimes:jpg,jpeg,bmp,png',
            'expired' => 'required',
        );
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            // Ooops.. something went wrong
            return Redirect::to(URL::previous())->withInput()->withErrors($validator);
        }
        $type = $request->get('type', 0);
        $safeName = '';
        if ($file = $request->file('photo')) {
            $fileName = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension() ?: 'png';
            $folderName = '/uploads/files/advertises';
            $destinationPath = public_path() . $folderName;
            $safeName = str_random(10) . '.' . $extension;
            $file->move($destinationPath, $safeName);
        }
        $advertise = Advertise::find($id);
        $advertise->title = $request->get('title');
        $advertise->description = $request->get('description');
        if($safeName != '')
            $advertise->photo = $safeName;
        $advertise->weburl = $request->get('weburl');
        $advertise->expired = $request->get('expired');
        $advertise->type = $request->get('type');
        $advertise->save();
        return Redirect::to("admin/advertise/".$type)->with('success', 'Successfully updated.');
    }

    public function deleteData($id)
    {

        DB::table('oollah_advertises')->where('id', $id)->delete();

    }

    public function updateShow($id = 0, Request $request)
    {
        $advertise = Advertise::find($id);
        $type = $advertise->type;
        $today = date('Y-m-d');
        return View('admin/advertise/show', compact('type', 'today', 'advertise'));
    }
    public function editData($id = 0, Request $request)
    {
        $advertise = Advertise::find($id);
        $type = $advertise->type;
        $today = date('Y-m-d');
        return View('admin/advertise/edit', compact('type', 'today', 'advertise'));
    }
    public function create($type = 0, Request $request)
    {
        $today = date('Y-m-d');
        return View('admin/advertise/create', compact('type', 'today'));
    }
    public function addData(Request $request)
    {
        $rules = array(
            'type' => 'required',
            'title' => 'required',
            'description' => 'required',
            'weburl' => 'required',
            'photo' => 'image|mimes:jpg,jpeg,bmp,png',
            'expired' => 'required',
        );
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            // Ooops.. something went wrong
            return Redirect::to(URL::previous())->withInput()->withErrors($validator);
        }
        $type = $request->get('type', 0);
        $safeName = '';
        if ($file = $request->file('photo')) {
            $fileName = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension() ?: 'png';
            $folderName = '/uploads/files/advertises';
            $destinationPath = public_path() . $folderName;
            $safeName = str_random(10) . '.' . $extension;
            $file->move($destinationPath, $safeName);
        }
        $advertise = new Advertise();
        $advertise->title = $request->get('title');
        $advertise->description = $request->get('description');
        if($safeName != '')
            $advertise->photo = $safeName;
        $advertise->weburl = $request->get('weburl');
        $advertise->expired = $request->get('expired');
        $advertise->type = $request->get('type');
        $advertise->save();
        return Redirect::to("admin/advertise/".$type)->with('success', 'Successfully added.');
    }

    public function activeData($id = 0, Request $request)
    {
        DB::table('oollah_advertises')->where('id', $id)->update(['status'=>0]);
        $data = array("status"=>0);
        return $data;
    }

    public function inactiveData($id = 0, Request $request)
    {
        DB::table('oollah_advertises')->where('id', $id)->update(['status'=>1]);
        $data = array("status"=>1);
        return $data;
    }
}

