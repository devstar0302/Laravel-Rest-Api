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

class MainController extends BaseController
{
    use AuthorizesRequests, AuthorizesResources, DispatchesJobs, ValidatesRequests;
    public function index(Request $request)
    {
        $home = DB::table('client_homes')->where('uid', Sentinel::getuser()->id)->first();
        date_default_timezone_set("Asia/Tokyo");
        if(empty($home)){
            DB::table('client_homes')->insert(['uid'=>Sentinel::getuser()->id,'updated_at'=>date('Y-m-d H:i:s', time())]);
        }
        return View('index', compact('home'));
    }
    public function saveIndex(Request $request)
    {
        $data = $request->get('data');
        if(!empty($data) || !empty($request->file('file'))){
            $item1 = (!empty($data['item1']))? $data['item1']:'';
            $item2 = (!empty($data['item2']))? $data['item2']:'';
            $item3 = (!empty($data['item3']))? $data['item3']:'';
            $item4 = (!empty($data['item4']))? $data['item4']:'';
            $item5 = (!empty($data['item5']))? $data['item5']:'';
            $item6 = (!empty($data['item6']))? $data['item6']:'';
            $item7 = (!empty($data['item7']))? $data['item7']:'';
            $item8 = (!empty($data['item8']))? $data['item8']:'';
            $item9 = (!empty($data['item9']))? $data['item9']:'';
            $item10 = (!empty($data['item10']))? $data['item10']:'';
            $item11 = (!empty($data['item11']))? $data['item11']:'';
            $item12 = (!empty($data['item12']))? $data['item12']:'';
            $item13 = (!empty($data['item13']))? $data['item13']:'';
            $filename4 = '';
            $filename1 = '';
            $filename2 = '';
            $filename3 = '';
            if ($request->hasFile('file4')) {
                $file = $request->file('file4');
                $i = 0;
                $extension = $file->getClientOriginalExtension() ?: 'png';
                $safeName = $file->getClientOriginalName() ?: 'temp';
                $home = DB::table('client_homes')->where('uid', Sentinel::getuser()->id)->first();
                $folderName = '/uploads/data/home' . $home->id . '/';
                $destinationPath = public_path() . $folderName;
                //$safeName = str_random(10) . '.' . $extension;
                /*if (File::exists(public_path() . $folderName . $safeName)) {
                    File::delete(public_path() . $folderName . $safeName);
                }*/
                $file->move($destinationPath, $safeName);
                //delete old pic if exists
                //if($i == 0)
                $filename4 = $safeName;
            }
            if ($request->hasFile('file1')) {
                //$home = DB::table('client_homes')->first();
                //if(!empty($home) && !empty($home->itemfile1)) {
                    //unlink($_SERVER['DOCUMENT_ROOT'].'/uploads/data/home' . $home->id.'/'.$home->itemfile1);
                //}
                //$files = $request->file('file');
                $file = $request->file('file1');
                $i = 0;
                //foreach($files as $file) {
                    $extension = $file->getClientOriginalExtension() ?: 'png';
                    $safeName = $file->getClientOriginalName() ?: 'temp';
                    $home = DB::table('client_homes')->where('uid', Sentinel::getuser()->id)->first();
                    $folderName = '/uploads/data/home' . $home->id . '/';
                    $destinationPath = public_path() . $folderName;
                    //$safeName = str_random(10) . '.' . $extension;
                    /*if (File::exists(public_path() . $folderName . $safeName)) {
                        File::delete(public_path() . $folderName . $safeName);
                    }*/
                    $file->move($destinationPath, $safeName);
                    //delete old pic if exists
                    //if($i == 0)
                        $filename1 = $safeName;
                    //else
                        //$filename = $filename.','.$safeName;
                    $i++;
                //}
            }
            if ($request->hasFile('file2')) {
                /*$home = DB::table('client_homes')->first();
                if(!empty($home) && !empty($home->itemfile2)) {
                    unlink($_SERVER['DOCUMENT_ROOT'].'/uploads/data/home' . $home->id.'/'.$home->itemfile2);
                }*/
                //$files = $request->file('file');
                $file1 = $request->file('file2');
                $i = 0;
                //foreach($files as $file) {
                $extension = $file1->getClientOriginalExtension() ?: 'png';
                $safeName = $file1->getClientOriginalName() ?: 'temp';
                $home = DB::table('client_homes')->where('uid', Sentinel::getuser()->id)->first();
                $folderName = '/uploads/data/home' . $home->id . '/';
                $destinationPath = public_path() . $folderName;
                //$safeName = str_random(10) . '.' . $extension;
                /*if (File::exists(public_path() . $folderName . $safeName)) {
                    File::delete(public_path() . $folderName . $safeName);
                }*/
                $file1->move($destinationPath, $safeName);
                //delete old pic if exists
                //if($i == 0)
                $filename2 = $safeName;
                //else
                //$filename = $filename.','.$safeName;
                $i++;
                //}
            }
            if ($request->hasFile('file3')) {
                /*$home = DB::table('client_homes')->first();
                if(!empty($home) && !empty($home->itemfile3)) {
                    unlink($_SERVER['DOCUMENT_ROOT'].'/uploads/data/home' . $home->id.'/'.$home->itemfile3);
                }*/
                //$files = $request->file('file');
                $file2 = $request->file('file3');
                $i = 0;
                //foreach($files as $file) {
                $extension = $file2->getClientOriginalExtension() ?: 'png';
                $safeName = $file2->getClientOriginalName() ?: 'temp';
                $home = DB::table('client_homes')->where('uid', Sentinel::getuser()->id)->first();
                $folderName = '/uploads/data/home' . $home->id . '/';
                $destinationPath = public_path() . $folderName;
                //$safeName = str_random(10) . '.' . $extension;
                /*if (File::exists(public_path() . $folderName . $safeName)) {
                    File::delete(public_path() . $folderName . $safeName);
                }*/
                $file2->move($destinationPath, $safeName);
                //delete old pic if exists
                //if($i == 0)
                $filename3 = $safeName;
                //else
                //$filename = $filename.','.$safeName;
                $i++;
                //}
            }
            $arr = array();
                $arr = $arr + array('item1'=>$item1);
                $arr = $arr + array('item2'=>$item2);
                $arr = $arr + array('item3'=>$item3);
                $arr = $arr + array('item4'=>$item4);
                $arr = $arr + array('item5'=>$item5);
                $arr = $arr + array('item6'=>$item6);
                $arr = $arr + array('item7'=>$item7);
                $arr = $arr + array('item8'=>$item8);
                $arr = $arr + array('item9'=>$item9);
                $arr = $arr + array('item10'=>$item10);
                $arr = $arr + array('item11'=>$item11);
                $arr = $arr + array('item12'=>$item12);
                $arr = $arr + array('item13'=>$item13);
                if($filename1 != '')
                    $arr = $arr + array('itemfile1'=>$filename1);
                if($filename2 != '')
                    $arr = $arr + array('itemfile2'=>$filename2);
                if($filename3 != '')
                    $arr = $arr + array('itemfile3'=>$filename3);
                if($filename4 != '')
                    $arr = $arr + array('itemfile4'=>$filename4);
            date_default_timezone_set("Asia/Tokyo");
            $arr = $arr + array('updated_at'=>date('Y-m-d H:i:s', time()));

            if(!empty($arr)) {
                $home = DB::table('client_homes')->where('uid', Sentinel::getuser()->id)->first();
                if (empty($home)) {
                    $arr = $arr + array('uid'=>Sentinel::getuser()->id);
                    DB::table('client_homes')->insert($arr);
                } else {
                    DB::table('client_homes')->where('uid', Sentinel::getuser()->id)->where('id', $home->id)->update($arr);
                }
                $content = 'トップページを更新しました';
                $flg = 0;
                $noti = DB::table('notifications')->orderby('created_at', 'desc')->first();
                if(!empty($noti)){
                    if($noti->user_id == Sentinel::getuser()->id && $noti->opt_val == 1){
                        $flg = 1;
                    }
                }
                if($flg == 0)
                    DB::table('notifications')->insert(['user_id'=>Sentinel::getuser()->id, 'content'=>$content, 'opt_val'=>1, 'created_at'=>date('Y-m-d H:i:s', time())]);
            }
        }
        return Redirect::back();
    }
    public function removeIndex(Request $request)
    {
        $id = $request->get('id', 0);
        $filename = $request->get('filename', 0);
        $home = DB::table('client_homes')->where('uid', Sentinel::getuser()->id)->first();
        $folderName = '/uploads/data/home' . $home->id . '/';
        if (File::exists(public_path() . $folderName . $filename)) {
            File::delete(public_path() . $folderName . $filename);
        }
        date_default_timezone_set("Asia/Tokyo");
        if($id != 0){
            $home = DB::table('client_homes')->where('uid', Sentinel::getuser()->id)->first();
            if (!empty($home)) {
                DB::table('client_homes')->where('uid', Sentinel::getuser()->id)->where('id', $home->id)->update(['itemfile'.$id=>'','updated_at'=>date('Y-m-d H:i:s', time())]);
                $content = 'トップページを更新しました';
                $flg = 0;
                $noti = DB::table('notifications')->orderby('created_at', 'desc')->first();
                if(!empty($noti)){
                    if($noti->user_id == Sentinel::getuser()->id && $noti->opt_val == 1){
                        $flg = 1;
                    }
                }
                if($flg == 0)
                    DB::table('notifications')->insert(['user_id'=>Sentinel::getuser()->id, 'content'=>$content, 'opt_val'=>1, 'created_at'=>date('Y-m-d H:i:s', time())]);
            }
        }
        return Redirect::back();
    }
    public function about(Request $request)
    {
        $about = DB::table('client_abouts')->where('uid', Sentinel::getuser()->id)->first();
        date_default_timezone_set("Asia/Tokyo");
        if(empty($about)){
            DB::table('client_abouts')->insert(['uid'=>Sentinel::getuser()->id,'updated_at'=>date('Y-m-d H:i:s', time())]);
        }
        return View('about', compact('about'));
    }
    public function saveAbout(Request $request)
    {
        $data = $request->get('data');
        if(!empty($data) || !empty($request->file('file'))){
            $item1 = (!empty($data['item1']))? $data['item1']:'';
            $item2 = (!empty($data['item2']))? $data['item2']:'';
            $item3 = (!empty($data['item3']))? $data['item3']:'';
            $item4 = (!empty($data['item4']))? $data['item4']:'';
            $item5 = (!empty($data['item5']))? $data['item5']:'';
            $item6 = (!empty($data['item6']))? $data['item6']:'';
            $item7 = (!empty($data['item7']))? $data['item7']:'';
            $item8 = (!empty($data['item8']))? $data['item8']:'';
            $item9 = (!empty($data['item9']))? $data['item9']:'';
            $item10 = (!empty($data['item10']))? $data['item10']:'';
            $item11 = (!empty($data['item11']))? $data['item11']:'';
            $item12 = (!empty($data['item12']))? $data['item12']:'';
            $item13 = (!empty($data['item13']))? $data['item13']:'';
            $filename = '';
            if ($request->hasFile('file')) {
                $about = DB::table('client_abouts')->first();
                if(!empty($about)) {
                    array_map('unlink', glob($_SERVER['DOCUMENT_ROOT'].'/uploads/data/about' . $about->id . '/*.*'));
                }
                $files = $request->file('file');
                $i = 0;
                foreach($files as $file) {
                    $extension = $file->getClientOriginalExtension() ?: 'png';
                    $safeName = $file->getClientOriginalName() ?: 'temp';
                    $about = DB::table('client_abouts')->where('uid', Sentinel::getuser()->id)->first();
                    $folderName = '/uploads/data/about' . $about->id . '/';
                    $destinationPath = public_path() . $folderName;
                    //$safeName = str_random(10) . '.' . $extension;
                    if (File::exists(public_path() . $folderName . $safeName)) {
                        File::delete(public_path() . $folderName . $safeName);
                    }
                    $file->move($destinationPath, $safeName);
                    //delete old pic if exists
                    if($i == 0)
                        $filename = $safeName;
                    else
                        $filename = $filename.','.$safeName;
                    $i++;
                }
            }

            $arr = array();
                $arr = $arr + array('item1'=>$item1);
                $arr = $arr + array('item2'=>$item2);
                $arr = $arr + array('item3'=>$item3);
                $arr = $arr + array('item4'=>$item4);
                $arr = $arr + array('item5'=>$item5);
                $arr = $arr + array('item6'=>$item6);
                $arr = $arr + array('item7'=>$item7);
                $arr = $arr + array('item8'=>$item8);
                $arr = $arr + array('item9'=>$item9);
                $arr = $arr + array('item10'=>$item10);
                $arr = $arr + array('item11'=>$item11);
                $arr = $arr + array('item12'=>$item12);
                $arr = $arr + array('item13'=>$item13);
                $arr = $arr + array('itemfile'=>$filename);
            date_default_timezone_set("Asia/Tokyo");
            $arr = $arr + array('updated_at'=>date('Y-m-d H:i:s'));
            if(!empty($arr)) {
                $about = DB::table('client_abouts')->where('uid', Sentinel::getuser()->id)->first();
                if (empty($about)) {
                    $arr = $arr + array('uid'=>Sentinel::getuser()->id);
                    DB::table('client_abouts')->insert($arr);
                } else {
                    DB::table('client_abouts')->where('uid', Sentinel::getuser()->id)->where('id', $about->id)->update($arr);
                }
                $content = '会社概要を更新しました';
                $flg = 0;
                $noti = DB::table('notifications')->orderby('created_at', 'desc')->first();
                if(!empty($noti)){
                    if($noti->user_id == Sentinel::getuser()->id && $noti->opt_val == 2){
                        $flg = 1;
                    }
                }
                if($flg == 0)
                    DB::table('notifications')->insert(['user_id'=>Sentinel::getuser()->id, 'content'=>$content, 'opt_val'=>2, 'created_at'=>date('Y-m-d H:i:s', time())]);
            }

        }
        return Redirect::back();
    }
    public function service1(Request $request)
    {

        $service1 = DB::table('client_services_1')->where('uid', Sentinel::getuser()->id)->first();
        date_default_timezone_set("Asia/Tokyo");

        if(empty($service1)){
            DB::table('client_services_1')->insert(['uid'=>Sentinel::getuser()->id,'updated_at'=>date('Y-m-d H:i:s', time())]);
        }
        return View('service1', compact('service1'));
    }
    public function saveService1(Request $request)
    {
        $data = $request->get('data');
        if(!empty($data) || !empty($request->file('file'))){
            $item1 = (!empty($data['item1']))? $data['item1']:'';
            $item2 = (!empty($data['item2']))? $data['item2']:'';
            $item3 = (!empty($data['item3']))? $data['item3']:'';
            $item4 = (!empty($data['item4']))? $data['item4']:'';
            $item5 = (!empty($data['item5']))? $data['item5']:'';
            $item6 = (!empty($data['item6']))? $data['item6']:'';
            $item7 = (!empty($data['item7']))? $data['item7']:'';
            $item8 = (!empty($data['item8']))? $data['item8']:'';
            $item9 = (!empty($data['item9']))? $data['item9']:'';
            $item10 = (!empty($data['item10']))? $data['item10']:'';
            $item11 = (!empty($data['item11']))? $data['item11']:'';
            $item12 = (!empty($data['item12']))? $data['item12']:'';
            $item13 = (!empty($data['item13']))? $data['item13']:'';

            $filename1 = '';
            $filename2 = '';
            $filename3 = '';
            if ($request->hasFile('file1')) {
                $file = $request->file('file1');
                $i = 0;
                //foreach($files as $file) {
                $extension = $file->getClientOriginalExtension() ?: 'png';
                $safeName = $file->getClientOriginalName() ?: 'temp';
                $service1 = DB::table('client_services_1')->where('uid', Sentinel::getuser()->id)->first();
                $folderName = '/uploads/data/service1' . $service1->id . '/';
                $destinationPath = public_path() . $folderName;
                //$safeName = str_random(10) . '.' . $extension;
                /*if (File::exists(public_path() . $folderName . $safeName)) {
                    File::delete(public_path() . $folderName . $safeName);
                }*/
                $file->move($destinationPath, $safeName);
                //delete old pic if exists
                //if($i == 0)
                $filename1 = $safeName;
                //else
                //$filename = $filename.','.$safeName;
                $i++;
                //}
            }
            if ($request->hasFile('file2')) {
                $file1 = $request->file('file2');
                $i = 0;
                //foreach($files as $file) {
                $extension = $file1->getClientOriginalExtension() ?: 'png';
                $safeName = $file1->getClientOriginalName() ?: 'temp';
                $service1 = DB::table('client_services_1')->where('uid', Sentinel::getuser()->id)->first();
                $folderName = '/uploads/data/service1' . $service1->id . '/';
                $destinationPath = public_path() . $folderName;
                //$safeName = str_random(10) . '.' . $extension;
                /*if (File::exists(public_path() . $folderName . $safeName)) {
                    File::delete(public_path() . $folderName . $safeName);
                }*/
                $file1->move($destinationPath, $safeName);
                //delete old pic if exists
                //if($i == 0)
                $filename2 = $safeName;
                //else
                //$filename = $filename.','.$safeName;
                $i++;
                //}
            }
            if ($request->hasFile('file3')) {
                $file2 = $request->file('file3');
                $i = 0;
                //foreach($files as $file) {
                $extension = $file2->getClientOriginalExtension() ?: 'png';
                $safeName = $file2->getClientOriginalName() ?: 'temp';
                $service1 = DB::table('client_services_1')->where('uid', Sentinel::getuser()->id)->first();
                $folderName = '/uploads/data/service1' . $service1->id . '/';
                $destinationPath = public_path() . $folderName;
                //$safeName = str_random(10) . '.' . $extension;
                /*if (File::exists(public_path() . $folderName . $safeName)) {
                    File::delete(public_path() . $folderName . $safeName);
                }*/
                $file2->move($destinationPath, $safeName);
                //delete old pic if exists
                //if($i == 0)
                $filename3 = $safeName;
                //else
                //$filename = $filename.','.$safeName;
                $i++;
                //}
            }
            $arr = array();
            $arr = $arr + array('item1'=>$item1);
            $arr = $arr + array('item2'=>$item2);
            $arr = $arr + array('item3'=>$item3);
            $arr = $arr + array('item4'=>$item4);
            $arr = $arr + array('item5'=>$item5);
            $arr = $arr + array('item6'=>$item6);
            $arr = $arr + array('item7'=>$item7);
            $arr = $arr + array('item8'=>$item8);
            $arr = $arr + array('item9'=>$item9);
            $arr = $arr + array('item10'=>$item10);
            $arr = $arr + array('item11'=>$item11);
            $arr = $arr + array('item12'=>$item12);
            $arr = $arr + array('item13'=>$item13);
            if($filename1 != '')
                $arr = $arr + array('itemfile1'=>$filename1);
            if($filename2 != '')
                $arr = $arr + array('itemfile2'=>$filename2);
            if($filename3 != '')
                $arr = $arr + array('itemfile3'=>$filename3);
            date_default_timezone_set("Asia/Tokyo");
            $arr = $arr + array('updated_at'=>date('Y-m-d H:i:s'));
            if(!empty($arr)) {
                $service1 = DB::table('client_services_1')->where('uid', Sentinel::getuser()->id)->first();
                if (empty($service1)) {
                    $arr = $arr + array('uid'=>Sentinel::getuser()->id);
                    DB::table('client_services_1')->insert($arr);
                } else {
                    DB::table('client_services_1')->where('uid', Sentinel::getuser()->id)->where('id', $service1->id)->update($arr);
                }

                $content = 'サービス１を更新しました';
                $flg = 0;
                $noti = DB::table('notifications')->orderby('created_at', 'desc')->first();
                if(!empty($noti)){
                    if($noti->user_id == Sentinel::getuser()->id && $noti->opt_val == 3){
                        $flg = 1;
                    }
                }
                if($flg == 0)
                    DB::table('notifications')->insert(['user_id'=>Sentinel::getuser()->id, 'content'=>$content, 'opt_val'=>3, 'created_at'=>date('Y-m-d H:i:s', time())]);
            }

        }
        return Redirect::back();
    }
    public function removeService1(Request $request)
    {
        $id = $request->get('id', 0);
        $filename = $request->get('filename', 0);
        $home = DB::table('client_services_1')->where('uid', Sentinel::getuser()->id)->first();
        $folderName = '/uploads/data/service1' . $home->id . '/';
        if (File::exists(public_path() . $folderName . $filename)) {
            File::delete(public_path() . $folderName . $filename);
        }
        date_default_timezone_set("Asia/Tokyo");
        if($id != 0){
            $home = DB::table('client_services_1')->where('uid', Sentinel::getuser()->id)->first();
            if (!empty($home)) {
                DB::table('client_services_1')->where('uid', Sentinel::getuser()->id)->where('id', $home->id)->update(['itemfile'.$id=>'','updated_at'=>date('Y-m-d H:i:s', time())]);
                $content = 'サービス１を更新しました';
                $flg = 0;
                $noti = DB::table('notifications')->orderby('created_at', 'desc')->first();
                if(!empty($noti)){
                    if($noti->user_id == Sentinel::getuser()->id && $noti->opt_val == 3){
                        $flg = 1;
                    }
                }
                if($flg == 0)
                    DB::table('notifications')->insert(['user_id'=>Sentinel::getuser()->id, 'content'=>$content, 'opt_val'=>3, 'created_at'=>date('Y-m-d H:i:s', time())]);
            }
        }
        return Redirect::back();
    }
    public function service2(Request $request)
    {

        $service2 = DB::table('client_services_2')->where('uid', Sentinel::getuser()->id)->first();
        date_default_timezone_set("Asia/Tokyo");
        if(empty($service2)){
            DB::table('client_services_2')->insert(['uid'=>Sentinel::getuser()->id,'updated_at'=>date('Y-m-d H:i:s', time())]);
        }
        return View('service2', compact('service2'));
    }
    public function saveService2(Request $request)
    {
        $data = $request->get('data');
        if(!empty($data) || !empty($request->file('file'))){
            $item1 = (!empty($data['item1']))? $data['item1']:'';
            $item2 = (!empty($data['item2']))? $data['item2']:'';
            $item3 = (!empty($data['item3']))? $data['item3']:'';
            $item4 = (!empty($data['item4']))? $data['item4']:'';
            $item5 = (!empty($data['item5']))? $data['item5']:'';
            $item6 = (!empty($data['item6']))? $data['item6']:'';
            $item7 = (!empty($data['item7']))? $data['item7']:'';
            $item8 = (!empty($data['item8']))? $data['item8']:'';
            $item9 = (!empty($data['item9']))? $data['item9']:'';
            $item10 = (!empty($data['item10']))? $data['item10']:'';
            $item11 = (!empty($data['item11']))? $data['item11']:'';
            $item12 = (!empty($data['item12']))? $data['item12']:'';
            $item13 = (!empty($data['item13']))? $data['item13']:'';
            $filename = '';
            if ($request->hasFile('file')) {
                $service2 = DB::table('client_services_2')->where('uid', Sentinel::getuser()->id)->first();
                if(!empty($service2)) {
                    array_map('unlink', glob($_SERVER['DOCUMENT_ROOT'].'/uploads/data/service2' . $service2->id . '/*.*'));
                }
                $files = $request->file('file');
                $i = 0;
                foreach($files as $file) {
                    $extension = $file->getClientOriginalExtension() ?: 'png';
                    $safeName = $file->getClientOriginalName() ?: 'temp';
                    $service2 = DB::table('client_services_2')->where('uid', Sentinel::getuser()->id)->first();
                    $folderName = '/uploads/data/service2' . $service2->id . '/';
                    $destinationPath = public_path() . $folderName;
                    //$safeName = str_random(10) . '.' . $extension;
                    if (File::exists(public_path() . $folderName . $safeName)) {
                        File::delete(public_path() . $folderName . $safeName);
                    }
                    $file->move($destinationPath, $safeName);
                    //delete old pic if exists
                    if($i == 0)
                        $filename = $safeName;
                    else
                        $filename = $filename.','.$safeName;
                    $i++;
                }
            }
            $arr = array();
                $arr = $arr + array('item1'=>$item1);
                $arr = $arr + array('item2'=>$item2);
                $arr = $arr + array('item3'=>$item3);
                $arr = $arr + array('item4'=>$item4);
                $arr = $arr + array('item5'=>$item5);
                $arr = $arr + array('item6'=>$item6);
                $arr = $arr + array('item7'=>$item7);
                $arr = $arr + array('item8'=>$item8);
                $arr = $arr + array('item9'=>$item9);
                $arr = $arr + array('item10'=>$item10);
                $arr = $arr + array('item11'=>$item11);
                $arr = $arr + array('item12'=>$item12);
                $arr = $arr + array('item13'=>$item13);
            if($filename != '')
                $arr = $arr + array('itemfile'=>$filename);
            date_default_timezone_set("Asia/Tokyo");
            $arr = $arr + array('updated_at'=>date('Y-m-d H:i:s'));
            if(!empty($arr)) {
                $service2 = DB::table('client_services_2')->where('uid', Sentinel::getuser()->id)->first();
                if (empty($service2)) {
                    $arr = $arr + array('uid'=>Sentinel::getuser()->id);
                    DB::table('client_services_2')->insert($arr);
                } else {
                    DB::table('client_services_2')->where('uid', Sentinel::getuser()->id)->where('id', $service2->id)->update($arr);
                }
                $content = 'サービス２を更新しました';
                $flg = 0;
                $noti = DB::table('notifications')->orderby('created_at', 'desc')->first();
                if(!empty($noti)){
                    if($noti->user_id == Sentinel::getuser()->id && $noti->opt_val == 4){
                        $flg = 1;
                    }
                }
                if($flg == 0)
                    DB::table('notifications')->insert(['user_id'=>Sentinel::getuser()->id, 'content'=>$content, 'opt_val'=>4, 'created_at'=>date('Y-m-d H:i:s', time())]);
            }
        }
        return Redirect::back();
    }
    public function option(Request $request)
    {

        $option = DB::table('client_option_items')->where('uid', Sentinel::getuser()->id)->first();
        date_default_timezone_set("Asia/Tokyo");
        if(empty($option)){
            DB::table('client_option_items')->insert(['uid'=>Sentinel::getuser()->id,'updated_at'=>date('Y-m-d H:i:s', time())]);
        }
        return View('option', compact('option'));
    }
    public function saveOption(Request $request)
    {
        $data = $request->get('data');
        //if(!empty($data)){
        $item1 = (!empty($data['item1']))? $data['item1']:0;
        $item2 = (!empty($data['item2']))? $data['item2']:0;
        $item3 = (!empty($data['item3']))? $data['item3']:0;
        $item4 = (!empty($data['item4']))? $data['item4']:0;
        $item5 = (!empty($data['item5']))? $data['item5']:0;
        $item6 = (!empty($data['item6']))? $data['item6']:0;
        $item7 = (!empty($data['item7']))? $data['item7']:0;
        $item8 = (!empty($data['item8']))? $data['item8']:0;
        $item9 = (!empty($data['item9']))? $data['item9']:0;
        $item10 = (!empty($data['item10']))? $data['item10']:0;
        $item11 = (!empty($data['item11']))? $data['item11']:0;
        $item12 = (!empty($data['item12']))? $data['item12']:0;
        $item13 = (!empty($data['item13']))? $data['item13']:0;
        $item14 = (!empty($data['item14']))? $data['item14']:0;
        $item15 = (!empty($data['item15']))? $data['item15']:0;
        $item16 = (!empty($data['item16']))? $data['item16']:0;
        $item_1 = (!empty($data['item_1']))? $data['item_1']:0;
        $item_2 = (!empty($data['item_2']))? $data['item_2']:0;
        $item_3 = (!empty($data['item_3']))? $data['item_3']:0;
        date_default_timezone_set("Asia/Tokyo");
        $updated_at = date('Y-m-d H:i:s');

        $option = DB::table('client_option_items')->where('uid', Sentinel::getuser()->id)->first();
        if(empty($option)){
            DB::table('client_option_items')->insert(['uid'=>Sentinel::getuser()->id, 'item1'=>$item1, 'item2'=>$item2, 'item3'=>$item3, 'item4'=>$item4, 'item5'=>$item5, 'item6'=>$item6, 'item7'=>$item7, 'item8'=>$item8, 'item9'=>$item9, 'item10'=>$item10, 'item11'=>$item11, 'item12'=>$item12, 'item13'=>$item13, 'item14'=>$item14, 'item15'=>$item15, 'item16'=>$item16, 'item_1'=>$item_1, 'item_2'=>$item_2, 'item_3'=>$item_3, 'updated_at'=>$updated_at]);
        }else{
            DB::table('client_option_items')->where('uid', Sentinel::getuser()->id)->where('id', $option->id)->update(['item1'=>$item1, 'item2'=>$item2, 'item3'=>$item3, 'item4'=>$item4, 'item5'=>$item5, 'item6'=>$item6, 'item7'=>$item7, 'item8'=>$item8, 'item9'=>$item9, 'item10'=>$item10, 'item11'=>$item11, 'item12'=>$item12, 'item13'=>$item13, 'item14'=>$item14, 'item15'=>$item15, 'item16'=>$item16, 'item_1'=>$item_1, 'item_2'=>$item_2, 'item_3'=>$item_3, 'updated_at'=>$updated_at]);
        }
        $content = 'オプションを更新しました';
        $flg = 0;
        $noti = DB::table('notifications')->orderby('created_at', 'desc')->first();
        if(!empty($noti)){
            if($noti->user_id == Sentinel::getuser()->id && $noti->opt_val == 5){
                $flg = 1;
            }
        }
        if($flg == 0)
            DB::table('notifications')->insert(['user_id'=>Sentinel::getuser()->id, 'content'=>$content, 'opt_val'=>5, 'created_at'=>date('Y-m-d H:i:s', time())]);
        // }
        return Redirect::back();
    }
    function getDelNoti(Request $request){
        $id = $request->get('id', 0);
        DB::table('notifications')->where('id', $id)->delete();
        return 1;
    }
}

