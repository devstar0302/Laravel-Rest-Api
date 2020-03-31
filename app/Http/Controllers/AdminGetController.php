<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use File;
use Sentinel;

class AdminGetController extends BaseController
{
    use AuthorizesRequests, AuthorizesResources, DispatchesJobs, ValidatesRequests;
    //home
    public function getHome(Request $request)
    {
        $homes = DB::table('client_homes')->orderby('created_at', 'desc')->get();

        return View('admin.view.home', compact('homes'));
    }
    public function getHomeView($uid = 0, Request $request)
    {
        $home = DB::table('client_homes')->where('uid', $uid)->orderby('created_at', 'desc')->first();

        return View('admin.view.homeview', compact('home'));
    }

    //about
    public function getAbout(Request $request)
    {
        $items = DB::table('client_abouts')->orderby('created_at', 'desc')->get();

        return View('admin.view.about', compact('items'));
    }
    public function getAboutView($uid = 0, Request $request)
    {
        $about = DB::table('client_abouts')->where('uid', $uid)->orderby('created_at', 'desc')->first();

        return View('admin.view.aboutview', compact('about'));
    }

    //service1
    public function getService1(Request $request)
    {
        $items = DB::table('client_services_1')->orderby('created_at', 'desc')->get();

        return View('admin.view.service1', compact('items'));
    }
    public function getServiceView1($uid = 0, Request $request)
    {
        $service1 = DB::table('client_services_1')->where('uid', $uid)->orderby('created_at', 'desc')->first();

        return View('admin.view.serviceview1', compact('service1'));
    }

    //service 2
    public function getService2(Request $request)
    {
        $items = DB::table('client_services_2')->orderby('created_at', 'desc')->get();

        return View('admin.view.service2', compact('items'));
    }
    public function getServiceView2($uid = 0, Request $request)
    {
        $service2 = DB::table('client_services_2')->where('uid', $uid)->orderby('created_at', 'desc')->first();

        return View('admin.view.serviceview2', compact('service2'));
    }

    //option
    public function getOption(Request $request)
    {
        $items = DB::table('client_option_items')->orderby('created_at', 'desc')->get();

        return View('admin.view.option', compact('items'));
    }
    public function getOptionView($uid = 0, Request $request)
    {
        $option = DB::table('client_option_items')->where('uid', $uid)->orderby('created_at', 'desc')->first();

        return View('admin.view.optionview', compact('option'));
    }
}

