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

class CategoryController extends Controller
{
    use Helpers;

    public function get(Request $request)
    {
        $categories = \DB::table('oollah_category')->where('status', 0)->select(['id', 'name'])->orderby('id', 'asc')->get();
        $cat = array('status_code'=>'200', 'data'=>$categories);
        return response()->json($cat);
    }
    public function regions(Request $request)
    {
        $categories = \DB::table('oollah_cities')->where('status', 0)->select(['id', 'name'])->orderby('id', 'asc')->get();
        $cat = array('status_code'=>'200', 'data'=>$categories);
        return response()->json($cat);
    }
    public function notifications(Request $request)
    {
        $today = date('Y-m-d');
        $notifications = \DB::table('oollah_notifications')->where('expired', '>=', $today)->where('status', 0)->select(['id', 'title', 'description', 'created_at'])->orderby('created_at', 'desc')->get();
        $cat = array('status_code'=>'200', 'data'=>$notifications);
        return response()->json($cat);
    }
    public function gettypes(Request $request)
    {
        $categories = \DB::table('oollah_type')->where('status', 0)->select(['id', 'name'])->orderby('id', 'asc')->get();
        $cat = array('status_code'=>'200', 'data'=>$categories);
        return response()->json($cat);
    }
}