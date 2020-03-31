<?php

namespace App\Http\Controllers;

use App\City;
use App\Http\Requests;
use Illuminate\Http\Request;
use Datatables;
use DB;
use App\Http\Controllers\sweetAlert;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */

    public function getProducts(Request $request)
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
        $products = DB::table('oollah_promotions');
        if($cat_id != 0){
            $products = $products->where('cat_id', $cat_id);
        }
        if($region != ''){
            $products = $products->where('region', $region);
        }
        if($type != ''){
            $products = $products->where('type', $type);
        }
        $products = $products->orderby('id', 'desc')->get();
        return View('admin/product/product', compact('categories', 'regions', 'types', 'cat_id', 'region', 'type', 'products'));
    }
    public function show($product_id = 0, Request $request)
    {
        $product = DB::table('oollah_promotions')->where('id', $product_id)->first();
        $claimeds = DB::table('oollah_promotion_claimed')->where('promotion_id', $product_id)->get();
        $favorites = DB::table('oollah_promotion_favorites')->where('promotion_id', $product_id)->get();
        $photos = DB::table('oollah_promotion_photos')->where('promotion_id', $product_id)->get();
        return View('admin/product/show', compact('product_id', 'product', 'claimeds', 'favorites', 'photos'));
    }


    public function delete($id = 0)
    {

        DB::table('oollah_promotions')->where('id', $id)->delete();

    }

    public function active($id = 0)
    {
        DB::table('oollah_promotions')->where('id', $id)->update(['status'=>0]);
        $data = array("status"=>0);
        return $data;
    }

    public function inactive($id = 0)
    {
        DB::table('oollah_promotions')->where('id', $id)->update(['status'=>1]);
        $data = array("status"=>1);
        return $data;
    }
    public function featured($id = 0)
    {
        DB::table('oollah_promotions')->where('id', $id)->update(['featured'=>1]);
        $data = array("status"=>0);
        return $data;
    }

    public function unfeatured($id = 0)
    {
        DB::table('oollah_promotions')->where('id', $id)->update(['featured'=>0]);
        $data = array("status"=>1);
        return $data;
    }
}

