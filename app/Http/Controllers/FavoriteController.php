<?php

namespace App\Http\Controllers;

use App\City;
use App\Http\Requests;
use Illuminate\Http\Request;
use Datatables;
use DB;
use App\Http\Controllers\sweetAlert;

class FavoriteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */

    public function getFavorites(Request $request)
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
        $favorites = DB::table('oollah_promotion_favorites')
            ->join('oollah_promotions', 'oollah_promotions.id', '=', 'oollah_promotion_favorites.promotion_id')
            ->select(['oollah_promotions.*', 'oollah_promotion_favorites.created_at as createdat', 'oollah_promotion_favorites.status as realstatus', 'oollah_promotion_favorites.user_id', 'oollah_promotion_favorites.id as realid']);
        if($cat_id != 0){
            $favorites = $favorites->where('oollah_promotions.cat_id', $cat_id);
        }
        if($region != ''){
            $favorites = $favorites->where('oollah_promotions.region', $region);
        }
        if($type != ''){
            $favorites = $favorites->where('oollah_promotions.type', $type);
        }
        $favorites = $favorites->orderby('oollah_promotion_favorites.id', 'desc')->get();
        return View('admin/product/favorite', compact('categories', 'regions', 'types', 'cat_id', 'region', 'type', 'favorites'));
    }

    public function delete($id = 0)
    {

        DB::table('oollah_promotion_favorites')->where('id', $id)->delete();

    }

    public function active($id = 0)
    {
        DB::table('oollah_promotion_favorites')->where('id', $id)->update(['status'=>0]);
        $data = array("status"=>0);
        return $data;
    }

    public function inactive($id = 0)
    {
        DB::table('oollah_promotion_favorites')->where('id', $id)->update(['status'=>1]);
        $data = array("status"=>1);
        return $data;
    }
}

