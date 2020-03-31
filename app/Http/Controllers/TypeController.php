<?php

namespace App\Http\Controllers;

use App\Type;
use App\Http\Requests;
use Illuminate\Http\Request;
use Datatables;
use DB;
use App\Http\Controllers\sweetAlert;
use Translation;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */

    public function getlist()
    {
        $tables = Type::orderBy('id', 'asc')->get();
        return View('admin/type/type', compact('tables'));
    }

    public function typeData()
    {
        $tables = Type::get(['id', 'name',  'status',  'created_at']);

        return Datatables::of($tables)
            ->edit_column('status', function ($data) {
                if ($data->status == 1) {
                    $status = config('Convert.active')[0];
                    return '<a style="color: #ca0002" class="active" href="javascript:;">' . $status . '</a>';
                    //return '<a onmouseover="this.style.color=\'#0618d8\" onMouseOut="this.style.color=\'#d80b06\'"> '. $status .'</span>';
                } else {
                    $status = config('Convert.inactive')[0];
                    return '<a class="inactive" href="javascript:;">' . $status . '</a>';
                    //return '<a onmouseover="this.style.color=\'#0618d8\'" onMouseOut="this.style.color=\'#d80b06\'" class="active" href="javascript:;">' . $status . '</a>';
                }
            })
            ->add_column('edit', '<a class="edit" href="javascript:;">'.config('Convert.edit')[0].'</a>')
            ->add_column('delete', '<a class="delete" href="javascript:;">'.config('Convert.delete')[0].'</a>')
            ->make(true);
    }

    public function updateType(Request $request, $id)
    {
        $table = Type::find($id);

        $table->update($request->except('_token'));
        return $table->id;
    }

    public function deleteType($id)
    {

        DB::table('oollah_type')->where('id', $id)->delete();

    }

    public function addType(Request $request)
    {
        $tables = array();
        if ($request->ajax()) {

            $tables = Type::create($request->except('_token'));
        }
        return $tables;
    }

    public function activeType($id = 0)
    {
        DB::table('oollah_type')->where('id', $id)->update(['status'=>0]);
        $data = array("status"=>0);
        return $data;
    }

    public function inactiveType($id = 0)
    {
        DB::table('oollah_type')->where('id', $id)->update(['status'=>1]);
        $data = array("status"=>1);
        return $data;
    }
}

