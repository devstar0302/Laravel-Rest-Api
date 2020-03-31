<?php

namespace App\Http\Controllers;

use App\City;
use App\Http\Requests;
use Illuminate\Http\Request;
use Datatables;
use DB;
use App\Http\Controllers\sweetAlert;
use App\MerchantPlan;

class PlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */

    public function getlist()
    {
        $tables = MerchantPlan::orderBy('id', 'asc')->get();
        $expireds = array('3 months', '6 months', '1 year', '2 years', '5 years');
        return View('admin/plan/index', compact('tables', 'expireds'));
    }

    public function getData()
    {
        $tables = MerchantPlan::get(['id', 'name', 'expired', 'planunit', 'price',  'status',  'created_at']);

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
            ->edit_column('expired', function ($data) {
                return $data->expired.' '.$data->planunit;
            })
            ->add_column('edit', '<a class="edit" href="javascript:;">'.config('Convert.edit')[0].'</a>')
            ->add_column('delete', '<a class="delete" href="javascript:;">'.config('Convert.delete')[0].'</a>')
            ->make(true);
    }

    public function update(Request $request, $id)
    {
        $table = MerchantPlan::find($id);
        $expired1 = $request->get('expired', '');
        $expired2 = explode(' ', $expired1);
        if(count($expired2) == 2){
            $expired = $expired2[0];
            $planunit = $expired2[1];
            $request['expired'] = $expired;
            $request['planunit'] = $planunit;
            $table->update($request->except('_token'));
            return $table->id;
        }else{
            return;
        }
    }

    public function delete($id)
    {

        DB::table('oollah_merchant_plans')->where('id', $id)->delete();

    }

    public function add(Request $request)
    {
        $tables = array();
        if ($request->ajax()) {
            $expired1 = $request->get('expired', '');
            $expired2 = explode(' ', $expired1);
            if(count($expired2) == 2){
                $expired = $expired2[0];
                $planunit = $expired2[1];
                $request['expired'] = $expired;
                $request['planunit'] = $planunit;
                $tables = MerchantPlan::create($request->except('_token'));
            }
        }
        return $tables;
    }

    public function active($id = 0)
    {
        DB::table('oollah_merchant_plans')->where('id', $id)->update(['status'=>0]);
        $data = array("status"=>0);
        return $data;
    }

    public function inactive($id = 0)
    {
        DB::table('oollah_merchant_plans')->where('id', $id)->update(['status'=>1]);
        $data = array("status"=>1);
        return $data;
    }
}

