<?php

namespace App\Http\Controllers;

use App\City;
use App\Http\Requests;
use Illuminate\Http\Request;
use Datatables;
use DB;
use App\Http\Controllers\sweetAlert;

class ClaimedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */

    public function getClaimeds(Request $request)
    {
        $cat_id = $request->get('cat_id', 0);
        $region = $request->get('region', '');
        $type = $request->get('type', '');
        $categories = DB::table('oollah_category')->orderby('id', 'asc')->lists('name', 'id');
        $regions = DB::table('oollah_cities')->orderby('id', 'asc')->lists('name', 'name');
        $types = DB::table('oollah_type')->orderby('id', 'asc')->lists('name', 'name');
        $categories = array('0'=>'Select Category') + $categories;
        $regions = array(''=>'Select Region') + $regions;
        $types = array(''=>'Select Type') + $types;
        $claimeds = DB::table('oollah_promotion_claimed')
            ->join('oollah_promotions', 'oollah_promotions.id', '=', 'oollah_promotion_claimed.promotion_id')
            ->select(['oollah_promotions.*', 'oollah_promotion_claimed.created_at as createdat', 'oollah_promotion_claimed.status as realstatus', 'oollah_promotion_claimed.user_id', 'oollah_promotion_claimed.id as realid']);
        if($cat_id != 0){
            $claimeds = $claimeds->where('oollah_promotions.cat_id', $cat_id);
        }
        if($region != ''){
            $claimeds = $claimeds->where('oollah_promotions.region', $region);
        }
        if($type != ''){
            $claimeds = $claimeds->where('oollah_promotions.type', $type);
        }
        $claimeds = $claimeds->where('oollah_promotion_claimed.verified', 1)->orderby('oollah_promotion_claimed.id', 'desc')->get();
        return View('admin/product/claimed', compact('categories', 'regions', 'types', 'cat_id', 'region', 'type', 'claimeds'));
    }

    public function delete($id = 0)
    {

        DB::table('oollah_promotion_claimed')->where('id', $id)->delete();

    }

    public function active($id = 0)
    {
        DB::table('oollah_promotion_claimed')->where('id', $id)->update(['status'=>0]);
        $data = array("status"=>0);
        return $data;
    }

    public function inactive($id = 0)
    {
        DB::table('oollah_promotion_claimed')->where('id', $id)->update(['status'=>1]);
        $data = array("status"=>1);
        return $data;
    }
}

