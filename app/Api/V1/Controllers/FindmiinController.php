<?php

namespace App\Api\V1\Controllers;

use JWTAuth;
use Validator;
use Config;
use App\User;
use App\Cardfinds;
use App\Section;
use App\Jobs;
use Illuminate\Http\Request;
use Illuminate\Mail\Message;
use Dingo\Api\Routing\Helpers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Password;
use Tymon\JWTAuth\Exceptions\JWTException;
use Dingo\Api\Exception\ValidationHttpException;
use Sentinel;
use DB;

class FindmiinController extends Controller
{
    use Helpers;

    public function getCard(Request $request)
    {
        $credentials = $request->only(
            'clientid','userid'
        );
        $validator = Validator::make($credentials, [
            'clientid' => 'required',
            'userid' => 'required'
        ]);
        if($validator->fails()) {
            throw new ValidationHttpException($validator->errors()->all());
        }
        $clientid = $request->get('clientid', '');
        $userid = $request->get('userid', '');

        $client = Cardfinds::find($clientid);

        $datatable = array();
        $datatable['id'] = $client->id;
        $datatable['business_name'] = $client->business_name;
        $datatable['business_address'] = $client->business_country.' '.$client->business_state.' '.$client->business_city.' '.$client->business_address;
        $datatable['business_phone_number'] = $client->business_phone_number;
        $datatable['business_lat'] = $client->business_lat;
        $datatable['business_lon'] = $client->business_lon;
        $datatable['manager_name'] = $client->manager_name;
        $datatable['manager_phone_number'] = $client->manager_phone_number;
        $datatable['business_short_description'] = $client->business_short_description;
        $datatable['business_information'] = $client->business_information;
        $datatable['open_hour_mon_fri_from'] = $client->open_hour_mon_fri_from;
        $datatable['open_hour_mon_fri_to'] = $client->open_hour_mon_fri_to;
        $datatable['open_hour_sat_from'] = $client->open_hour_sat_from;
        $datatable['open_hour_sat_to'] = $client->open_hour_sat_to;
        $datatable['open_hour_sun_from'] = $client->open_hour_sun_from;
        $datatable['open_hour_sun_to'] = $client->open_hour_sun_to;
        $datatable['logo'] = '/uploads/card_logo/'.$client->logo;

        $picture_list = explode(",", $client->pictures);
        if($client->pictures != '')
            $picture_count = count($picture_list);
        else
            $picture_count = 0;
        $pictures = "";
        for($i = 0; $i < $picture_count; $i++){
            if($i == 0)
               $pictures = '/uploads/card_picture/'. $picture_list[$i];
            else
               $pictures = $pictures .'@/uploads/card_picture/'. $picture_list[$i];
        }
        $datatable['picture_count'] = $picture_count;
        $datatable['pictures'] = $pictures;
        $datatable['facebook_link'] = $client->facebook_link;
        $datatable['google_plus_link'] = $client->google_plus_link;
        $datatable['twitter_link'] = $client->twitter_link;
        $datatable['keywords'] = $client->keywords;
        $datatable['category'] = $client->category;
        $datatable['section_permission'] = $client->section_permission;
        $datatable['contract_start_date'] = $client->contract_start_date;
        $datatable['contract_end_date'] = $client->contract_end_date;

//        $datatable['comment_num'] = $client->comment_num;
//        if($client->comment_num != 0){
//            $comments = DB::table('findmiin_comment')->select(['visitor_name','rating','content'])->where('card_id',$clientid)->get();
//            $datatable['comment'] = $comments;
//        }
        $comment_num = DB::table('findmiin_comment')->where('card_id',$client->id)->get();
        $num = count($comment_num);
        $datatable['comment_num'] = $num;

        $datatable['comment'] = '';
        if($num != 0){
            $comments = array();
            $comments_list = array();

            $cardComment_list = DB::table('findmiin_comment')->where('card_id',$client->id)->orderby('rating','desc')
                ->offset(0)->limit(5)->get();

            foreach($cardComment_list as $cardComment) {
                $comments['rating'] = $cardComment->rating;
                $comments['content'] = $cardComment->content;
                if($cardComment->user_id == '0' || $cardComment->user_id == '') {
                    $comments['userid'] = 'serveruser';
                    $comments['firstname'] = $cardComment->visitor_name;
                    $comments['lastname'] = '';
                }else {
                    $comments['userid'] = $cardComment->user_id;
                    $user = DB::table('users')->select(['first_name','last_name'])->where('id',$cardComment->user_id)->first();
                    $comments['firstname'] = $user->first_name;
                    $comments['lastname'] = $user->last_name;
                }
                array_push($comments_list, $comments);
            }
            $datatable['comment'] = $comments_list;
        }
        $commented = 'no';
        $like = 'no';
        $comment_flag = DB::table('findmiin_comment')->where('card_id',$clientid)->where('user_id',$userid)->first();
        if(empty($comment_flag)) $commented = 'no';
        else $commented = 'yes';

        $like_flag = DB::table('findmiin_like')->where('card_id',$clientid)->where('user_id',$userid)->first();
        if(!empty($like_flag) && $like_flag->like == 1 ) $like = 'yes';

        $datatable['commented'] = $commented;
        $datatable['like'] = $like;
        
        $datatable['created_at'] = $client->created_at;

        $result = array('status_code'=>'200', 'data'=>$datatable, 'message'=>'success');
        return response()->json($result);
    }
    public function getSectionList(Request $request)
    {
        $sectionlist = DB::table('findmiin_section')->select(['id', 'name', 'image'])->orderby('name','asc')->get();

        foreach ($sectionlist as $section){
            $section->image = '/uploads/category/'.$section->image;
        }


        $result = array('status_code'=>'200', 'data'=>$sectionlist, 'message'=>'success');
        return response()->json($result);
    }
    public function getCategory(Request $request)
    {
        $categorylist = DB::table('findmiin_jobs_category')->select(['id', 'name', 'image'])->orderby('name','asc')->get();

        foreach ($categorylist as $category){
            $category->image = '/uploads/category/'.$category->image;
        }

        $result = array('status_code'=>'200', 'data'=>$categorylist, 'message'=>'success');
        return response()->json($result);
    }
    public function getCity(Request $request)
    {
        $citylist = DB::table('oollah_cities')->select(['id', 'name'])->orderby('name','asc')->get();

        $result = array('status_code'=>'200', 'data'=>$citylist, 'message'=>'success');
        return response()->json($result);
    }
    public function postcard(Request $request)
    {
        $credentials = $request->only(
            'clientid','sectionid'
        );
        $validator = Validator::make($credentials, [
            'clientid' => 'required',
            'sectionid' => 'required'
        ]);
        if($validator->fails()) {
            throw new ValidationHttpException($validator->errors()->all());
        }

        $clientid = $request->get('clientid', '');
        $sectionid = $request->get('sectionid', '');

        $client = Cardfinds::find($clientid);

        if($sectionid == 0){
            $postcard = DB::table('findmiin_jobs')->where('card_id',$clientid)->first();
            if(!empty($postcard)){
                $result = array('status_code'=>'200', 'message'=>'success');
                return response()->json($result);
            }
            $jobs = new Jobs();
            $jobs->card_id = $clientid;
            $jobs->business_name = $client->business_name;
            $jobs->business_address = $client->business_address;
            $jobs->business_city = $client->business_city;
            $jobs->business_state = $client->business_state;
            $jobs->business_country = $client->business_country;
            $jobs->business_phone_number = $client->business_phone_number;
            $jobs->business_lat = $client->business_lat;
            $jobs->business_lon = $client->business_lon;
            $jobs->manager_name = $client->manager_name;
            $jobs->manager_phone_number = $client->manager_phone_number;
            $jobs->business_short_description = $client->business_short_description;
            $jobs->business_information = $client->business_information;
            $jobs->open_hour_mon_fri_from = $client->open_hour_mon_fri_from;
            $jobs->open_hour_mon_fri_to = $client->open_hour_mon_fri_to;
            $jobs->open_hour_sat_from = $client->open_hour_sat_from;
            $jobs->open_hour_sat_to = $client->open_hour_sat_to;
            $jobs->open_hour_sun_from = $client->open_hour_sun_from;
            $jobs->open_hour_sun_to = $client->open_hour_sun_to;
            $jobs->logo = $client->logo;
            $jobs->pictures = $client->pictures;
            $jobs->facebook_link = $client->facebook_link;
            $jobs->google_plus_link = $client->google_plus_link;
            $jobs->twitter_link = $client->twitter_link;
            $jobs->contract_start_date = $client->contract_start_date;
            $jobs->contract_end_date = $client->contract_end_date;
            $jobs->keywords = $client->keywords;
            $jobs->category = $client->category;
            $jobs->comment_num = $client->comment_num;           

            $jobs->save();
        }else{
            $postcard = DB::table('findmiin_localfinds')->where('card_id',$clientid)->where('section_id',$sectionid)->first();
            if(!empty($postcard)){
                $result = array('status_code'=>'200', 'message'=>'success');
                return response()->json($result);
            }
            $section = new Section();
            $section->card_id = $clientid;
            $section->section_id = $sectionid;
            $section->business_name = $client->business_name;
            $section->business_address = $client->business_address;
            $section->business_city = $client->business_city;
            $section->business_state = $client->business_state;
            $section->business_country = $client->business_country;
            $section->business_phone_number = $client->business_phone_number;
            $section->business_lat = $client->business_lat;
            $section->business_lon = $client->business_lon;
            $section->manager_name = $client->manager_name;
            $section->manager_phone_number = $client->manager_phone_number;
            $section->business_short_description = $client->business_short_description;
            $section->business_information = $client->business_information;
            $section->open_hour_mon_fri_from = $client->open_hour_mon_fri_from;
            $section->open_hour_mon_fri_to = $client->open_hour_mon_fri_to;
            $section->open_hour_sat_from = $client->open_hour_sat_from;
            $section->open_hour_sat_to = $client->open_hour_sat_to;
            $section->open_hour_sun_from = $client->open_hour_sun_from;
            $section->open_hour_sun_to = $client->open_hour_sun_to;
            $section->logo = $client->logo;
            $section->pictures = $client->pictures;
            $section->facebook_link = $client->facebook_link;
            $section->google_plus_link = $client->google_plus_link;
            $section->twitter_link = $client->twitter_link;
            $section->contract_start_date = $client->contract_start_date;
            $section->contract_end_date = $client->contract_end_date;
            $section->keywords = $client->keywords;
            $section->category = $client->category;
            $section->comment_num = $client->comment_num;

            $section->save();
        }

        if($client->post_flag == 0){
            $client->post_flag = 1;
            $client->save();
        }
        $result = array('status_code'=>'200', 'message'=>'success');
        return response()->json($result);
    }

    public function postupdate(Request $request)
    {
        $credentials = $request->only(
            'cardid','sectionid','pictures','business_information','contract_end_date'
        );
        $validator = Validator::make($credentials, [
            'cardid' => 'required',
            'sectionid' => 'required',
            'pictures' => 'required',
            'business_information' => 'required',
            'contract_end_date' => 'required'
        ]);
        if($validator->fails()) {
            throw new ValidationHttpException($validator->errors()->all());
        }

        $cardid = $request->get('cardid', '');
        $sectionid = $request->get('sectionid', '');
        $pictures = $request->get('pictures', '');
        $post_description = $request->get('business_information', '');
        $contract_end_date = $request->get('contract_end_date', '');

        $post = DB::table('findmiin_localfinds')->where('card_id',$cardid)->where('section_id',$sectionid)->first();

        if(!empty($post)){
            DB::table('findmiin_localfinds')->where('card_id',$cardid)->where('section_id',$sectionid)
                ->update(['pictures'=>$pictures,'post_description'=>$post_description,'contract_end_date'=>$contract_end_date]);
        }else{
            $client = Cardfinds::find($cardid);

            $section = new Section();
            $section->card_id = $cardid;
            $section->section_id = $sectionid;
            $section->business_name = $client->business_name;
            $section->business_address = $client->business_address;
            $section->business_city = $client->business_city;
            $section->business_state = $client->business_state;
            $section->business_country = $client->business_country;
            $section->business_phone_number = $client->business_phone_number;
            $section->business_lat = $client->business_lat;
            $section->business_lon = $client->business_lon;
            $section->manager_name = $client->manager_name;
            $section->manager_phone_number = $client->manager_phone_number;
            $section->business_short_description = $client->business_short_description;
            $section->business_information = $client->business_information;
            $section->post_description = $post_description;
            $section->open_hour_mon_fri_from = $client->open_hour_mon_fri_from;
            $section->open_hour_mon_fri_to = $client->open_hour_mon_fri_to;
            $section->open_hour_sat_from = $client->open_hour_sat_from;
            $section->open_hour_sat_to = $client->open_hour_sat_to;
            $section->open_hour_sun_from = $client->open_hour_sun_from;
            $section->open_hour_sun_to = $client->open_hour_sun_to;
            $section->logo = $client->logo;
            $section->pictures = $pictures;
            $section->facebook_link = $client->facebook_link;
            $section->google_plus_link = $client->google_plus_link;
            $section->twitter_link = $client->twitter_link;
            $section->contract_start_date = $client->contract_start_date;
            $section->contract_end_date = $contract_end_date;
            $section->keywords = $client->keywords;
            $section->category = $client->category;
            $section->comment_num = $client->comment_num;

            $section->save();

            if($client->post_flag == 0){
                $client->post_flag = 1;
                $client->save();
            }
        }

        $result = array('status_code'=>'200', 'message'=>'success');
        return response()->json($result);
    }
    public function getPostWithCategory(Request $request)
    {
        $credentials = $request->only(
            'category', 'pageno', 'flag', 'type', 'userid'
        );
        $validator = Validator::make($credentials, [
            'category' => 'required',
            'pageno' => 'required',
            'flag' => 'required',
            'type' => 'required',
            'userid' => 'required'
        ]);
        if ($validator->fails()) {
            throw new ValidationHttpException($validator->errors()->all());
        }
        $category = $request->get('category', '');
        $pageno = $request->get('pageno', '');
        $flag = $request->get('flag', '');
        $type = $request->get('type', '');
        $userid = $request->get('userid', '');
        $keyword = $request->get('keyword', '');

        $lat1 = 0;
        $lon1 = 0;
        if($type == 'client') {
            $user = DB::table('findmiin_card')->select(['business_lat', 'business_lon'])->where('id', $userid)->first();
            $lat1 = (float)$user->business_lat;
            $lon1 = (float)$user->business_lon;
        }else {
            $user = DB::table('users')->select(['lat', 'lon'])->where('id', $userid)->first();
            $lat1 = (float)$user->lat;
            $lon1 = (float)$user->lon;
        }

        $num = 10;
        $start_num = (int)$pageno * $num;
        $datatable = array();
        $datatable_list = array();
        if ($flag == '0'){
            if($keyword == '')
                $jobslist = \DB::table('findmiin_card')->where('category', $category)
                    ->orderby('id', 'desc')->offset((int)$start_num)->limit($num)->get();
            else
                $jobslist = \DB::table('findmiin_card')->where('category', $category)->where('keywords', 'like', '%'.$keyword.'%')
                    ->orderby('id', 'desc')->offset((int)$start_num)->limit($num)->get();


            foreach($jobslist as $job){
                $commented = 'no';
                $like = 'no';
                $datatable['id'] = $job->id;
                $datatable['business_name'] = $job->business_name;
                $datatable['business_address'] = $job->business_country.' '.$job->business_state.' '.$job->business_city.' '.$job->business_address;
                $datatable['business_phone_number'] = $job->business_phone_number;
                $datatable['business_lat'] = $job->business_lat;
                $datatable['business_lon'] = $job->business_lon;
                $mile = $this->distance($lat1, $lon1, (float)$job->business_lat, (float)$job->business_lon, 'M');
                $datatable['distance'] = $mile;
                $datatable['manager_name'] = $job->manager_name;
                $datatable['manager_phone_number'] = $job->manager_phone_number;
                $datatable['business_short_description'] = $job->business_short_description;
                $datatable['business_information'] = $job->business_information;
                $datatable['open_hour_mon_fri_from'] = $job->open_hour_mon_fri_from;
                $datatable['open_hour_mon_fri_to'] = $job->open_hour_mon_fri_to;
                $datatable['open_hour_sat_from'] = $job->open_hour_sat_from;
                $datatable['open_hour_sat_to'] = $job->open_hour_sat_to;
                $datatable['open_hour_sun_from'] = $job->open_hour_sun_from;
                $datatable['open_hour_sun_to'] = $job->open_hour_sun_to;
                $datatable['logo'] = '/uploads/card_logo/'.$job->logo;

                $picture_list = explode(",", $job->pictures);
                if($job->pictures != '')
                    $picture_count = count($picture_list);
                else
                    $picture_count = 0;
                $pictures = "";
                for($i = 0; $i < $picture_count; $i++){
                    if($i == 0)
                        $pictures = '/uploads/card_picture/'. $picture_list[$i];
                    else
                        $pictures = $pictures .'@/uploads/card_picture/'. $picture_list[$i];
                }
                $datatable['picture_count'] = $picture_count;
                $datatable['pictures'] = $pictures;
                $datatable['facebook_link'] = $job->facebook_link;
                $datatable['google_plus_link'] = $job->google_plus_link;
                $datatable['twitter_link'] = $job->twitter_link;
                $datatable['keywords'] = $job->keywords;
                $datatable['category'] = $job->category;
                $datatable['section_permission'] = $job->section_permission;
                $datatable['contract_start_date'] = $job->contract_start_date;
                $datatable['contract_end_date'] = $job->contract_end_date;

                $comment_num = DB::table('findmiin_comment')->where('card_id',$job->id)->get();
                $num = count($comment_num);
                $datatable['comment_num'] = $num;

                $datatable['comment'] = '';
                if($num != 0){
                    $comments = array();
                    $comments_list = array();

                    $cardComment_list = DB::table('findmiin_comment')->where('card_id',$job->id)->orderby('rating','desc')
                                ->offset(0)->limit(5)->get();

                    foreach($cardComment_list as $cardComment) {
                        $comments['rating'] = $cardComment->rating;
                        $comments['content'] = $cardComment->content;
                        if($cardComment->user_id == '0' || $cardComment->user_id == '') {
                            $comments['userid'] = 'serveruser';
                            $comments['firstname'] = $cardComment->visitor_name;
                            $comments['lastname'] = '';
                        }else {
                            $comments['userid'] = $cardComment->user_id;
                            $user = DB::table('users')->select(['first_name','last_name'])->where('id',$cardComment->user_id)->first();
                            $comments['firstname'] = $user->first_name;
                            $comments['lastname'] = $user->last_name;
                        }
                        array_push($comments_list, $comments);
                    }
                    $datatable['comment'] = $comments_list;
                }

                if($type=='user'){
                    $comment_flag = DB::table('findmiin_comment')->where('card_id',$job->id)->where('user_id',$userid)->first();
                    if(empty($comment_flag)) $commented = 'no';
                    else $commented = 'yes';

                    $like_flag = DB::table('findmiin_like')->where('card_id',$job->id)->where('user_id',$userid)->first();
                    if(!empty($like_flag) && $like_flag->like == 1 ) $like = 'yes';
                }

                $datatable['commented'] = $commented;
                $datatable['like'] = $like;

                $datatable['created_at'] = $job->created_at;

                array_push($datatable_list, $datatable);
            }
            usort($datatable_list, create_function('$a, $b',
                'if ($a["distance"] == $b["distance"]) return 0; return ($a["distance"] < $b["distance"]) ? -1 : 1;'));

        }else{
            $jobslist = \DB::table('findmiin_jobs')->where('id', 0)
                ->orderby('id', 'desc')->offset((int)$start_num)->limit($num)->get();
        }

        $result = array('status_code'=>'200', 'data'=>$datatable_list, 'message'=>'success');
        return response()->json($result);
    }

    public function getPostWithSection(Request $request)
    {
        $credentials = $request->only(
            'sectionid', 'pageno', 'flag', 'type', 'userid'
        );
        $validator = Validator::make($credentials, [
            'sectionid' => 'required',
            'pageno' => 'required',
            'flag' => 'required',
            'type' => 'required',
            'userid' => 'required'
        ]);
        if ($validator->fails()) {
            throw new ValidationHttpException($validator->errors()->all());
        }
        $sectionid = $request->get('sectionid', '');
        $pageno = $request->get('pageno', '');
        $flag = $request->get('flag', '');
        $type = $request->get('type', '');
        $userid = $request->get('userid', '');
        $keyword = $request->get('keyword', '');

        $lat1 = 0;
        $lon1 = 0;
        if($type == 'client') {
            $user = DB::table('findmiin_card')->select(['business_lat', 'business_lon'])->where('id', $userid)->first();
            $lat1 = (float)$user->business_lat;
            $lon1 = (float)$user->business_lon;
        }else {
            $user = DB::table('users')->select(['lat', 'lon'])->where('id', $userid)->first();
            $lat1 = (float)$user->lat;
            $lon1 = (float)$user->lon;
        }

        $num = 10;
        $start_num = (int)$pageno * $num;
        $datatable = array();
        $datatable_list = array();
        if ($flag == '0'){
            if($keyword == ''){
                $sectionslist = \DB::table('findmiin_localfinds')->where('section_id', $sectionid)
                    ->orderby('id', 'desc')->offset((int)$start_num)->limit($num)->get();
            }else{
                $sectionslist = \DB::table('findmiin_localfinds')->where('section_id', $sectionid)
                    ->where('keywords', 'like', '%'.$keyword.'%')
                    ->orderby('id', 'desc')->offset((int)$start_num)->limit($num)->get();
            }


            foreach($sectionslist as $sections){
                $commented = 'no';
                $like = 'no';
                $datatable['id'] = $sections->card_id;
                $datatable['business_name'] = $sections->business_name;
                $datatable['business_address'] = $sections->business_country.' '.$sections->business_state.' '.$sections->business_city.' '.$sections->business_address;
                $datatable['business_phone_number'] = $sections->business_phone_number;
                $datatable['business_lat'] = $sections->business_lat;
                $datatable['business_lon'] = $sections->business_lon;
                $mile = $this->distance($lat1, $lon1, (float)$sections->business_lat, (float)$sections->business_lon, 'M');
                $datatable['distance'] = $mile;
                $datatable['manager_name'] = $sections->manager_name;
                $datatable['manager_phone_number'] = $sections->manager_phone_number;
                $datatable['business_short_description'] = $sections->business_short_description;
                $datatable['business_information'] = $sections->business_information;
                $datatable['post_description'] = $sections->post_description;
                $datatable['open_hour_mon_fri_from'] = $sections->open_hour_mon_fri_from;
                $datatable['open_hour_mon_fri_to'] = $sections->open_hour_mon_fri_to;
                $datatable['open_hour_sat_from'] = $sections->open_hour_sat_from;
                $datatable['open_hour_sat_to'] = $sections->open_hour_sat_to;
                $datatable['open_hour_sun_from'] = $sections->open_hour_sun_from;
                $datatable['open_hour_sun_to'] = $sections->open_hour_sun_to;
                $datatable['logo'] = '/uploads/card_logo/'.$sections->logo;

                $picture_list = explode(",", $sections->pictures);
                if($sections->pictures != '')
                    $picture_count = count($picture_list);
                else
                    $picture_count = 0;
                $pictures = "";
                for($i = 0; $i < $picture_count; $i++){
                    if($i == 0)
                        $pictures = '/uploads/card_picture/'. $picture_list[$i];
                    else
                        $pictures = $pictures .'@/uploads/card_picture/'. $picture_list[$i];
                }
                $datatable['picture_count'] = $picture_count;
                $datatable['pictures'] = $pictures;
                $datatable['facebook_link'] = $sections->facebook_link;
                $datatable['google_plus_link'] = $sections->google_plus_link;
                $datatable['twitter_link'] = $sections->twitter_link;
                $datatable['keywords'] = $sections->keywords;
                $datatable['category'] = $sections->category;
                $datatable['contract_start_date'] = $sections->contract_start_date;
                $datatable['contract_end_date'] = $sections->contract_end_date;

                $comment_num = DB::table('findmiin_comment')->where('card_id',$sections->card_id)->get();
                $num = count($comment_num);
                $datatable['comment_num'] = $num;

                $datatable['comment'] = '';
                if($num != 0){
                    $comments = array();
                    $comments_list = array();

                    $cardComment_list = DB::table('findmiin_comment')->where('card_id',$sections->card_id)->orderby('rating','desc')
                        ->offset(0)->limit(5)->get();

                    foreach($cardComment_list as $cardComment) {
                        $comments['rating'] = $cardComment->rating;
                        $comments['content'] = $cardComment->content;
                        if($cardComment->user_id == '0' || $cardComment->user_id == '') {
                            $comments['userid'] = 'serveruser';
                            $comments['firstname'] = $cardComment->visitor_name;
                            $comments['lastname'] = '';
                        }else {
                            $comments['userid'] = $cardComment->user_id;
                            $user = DB::table('users')->select(['first_name','last_name'])->where('id',$cardComment->user_id)->first();
                            $comments['firstname'] = $user->first_name;
                            $comments['lastname'] = $user->last_name;
                        }
                        array_push($comments_list, $comments);
                    }
                    $datatable['comment'] = $comments_list;
                }
                if($type=='user'){
                    $comment_flag = DB::table('findmiin_comment')->where('card_id',$sections->card_id)->where('user_id',$userid)->first();
                    if(empty($comment_flag)) $commented = 'no';
                    else $commented = 'yes';

                    $like_flag = DB::table('findmiin_like')->where('card_id',$sections->card_id)->where('user_id',$userid)->first();
                    if(!empty($like_flag) && $like_flag->like == 1 ) $like = 'yes';
                }
                $datatable['commented'] = $commented;
                $datatable['like'] = $like;

                $datatable['created_at'] = $sections->created_at;

                array_push($datatable_list, $datatable);
            }

            usort($datatable_list, create_function('$a, $b',
                'if ($a["distance"] == $b["distance"]) return 0; return ($a["distance"] < $b["distance"]) ? -1 : 1;'));

        }else{
            $sectionslist = \DB::table('findmiin_localfinds')->where('id', 0)
                ->orderby('id', 'desc')->offset((int)$start_num)->limit($num)->get();
        }

        $result = array('status_code'=>'200', 'data'=>$datatable_list, 'message'=>'success');
        return response()->json($result);
    }
    public function getPost(Request $request)
    {
        $credentials = $request->only(
            'cardid', 'sectionid', 'userid'
        );
        $validator = Validator::make($credentials, [
            'cardid' => 'required',
            'sectionid' => 'required',
            'userid' => 'required'
        ]);
        if ($validator->fails()) {
            throw new ValidationHttpException($validator->errors()->all());
        }
        $sectionid = $request->get('sectionid', '');
        $cardid = $request->get('cardid', '');
        $userid = $request->get('userid', '');

        $datatable = array();

        $sections = \DB::table('findmiin_localfinds')->where('card_id', $cardid)->where('section_id', $sectionid)->first();

        if(!empty($sections)){
            $commented = 'no';
            $like = 'no';
            $datatable['id'] = $sections->card_id;
            $datatable['business_name'] = $sections->business_name;
            $datatable['business_address'] = $sections->business_country . ' ' . $sections->business_state . ' ' . $sections->business_city . ' ' . $sections->business_address;
            $datatable['business_phone_number'] = $sections->business_phone_number;
            $datatable['business_lat'] = $sections->business_lat;
            $datatable['business_lon'] = $sections->business_lon;
            $datatable['manager_name'] = $sections->manager_name;
            $datatable['manager_phone_number'] = $sections->manager_phone_number;
            $datatable['business_short_description'] = $sections->business_short_description;
            $datatable['business_information'] = $sections->business_information;
            $datatable['post_description'] = $sections->post_description;
            $datatable['open_hour_mon_fri_from'] = $sections->open_hour_mon_fri_from;
            $datatable['open_hour_mon_fri_to'] = $sections->open_hour_mon_fri_to;
            $datatable['open_hour_sat_from'] = $sections->open_hour_sat_from;
            $datatable['open_hour_sat_to'] = $sections->open_hour_sat_to;
            $datatable['open_hour_sun_from'] = $sections->open_hour_sun_from;
            $datatable['open_hour_sun_to'] = $sections->open_hour_sun_to;
            $datatable['logo'] = '/uploads/card_logo/' . $sections->logo;

            $picture_list = explode(",", $sections->pictures);
            if ($sections->pictures != '')
                $picture_count = count($picture_list);
            else
                $picture_count = 0;
            $pictures = "";
            for ($i = 0; $i < $picture_count; $i++) {
                if ($i == 0)
                    $pictures = '/uploads/card_picture/' . $picture_list[$i];
                else
                    $pictures = $pictures . '@/uploads/card_picture/' . $picture_list[$i];
            }
            $datatable['picture_count'] = $picture_count;
            $datatable['pictures'] = $pictures;
            $datatable['facebook_link'] = $sections->facebook_link;
            $datatable['google_plus_link'] = $sections->google_plus_link;
            $datatable['twitter_link'] = $sections->twitter_link;
            $datatable['keywords'] = $sections->keywords;
            $datatable['category'] = $sections->category;
            $datatable['contract_start_date'] = $sections->contract_start_date;
            $datatable['contract_end_date'] = $sections->contract_end_date;

            $comment_num = DB::table('findmiin_comment')->where('card_id', $sections->card_id)->get();
            $num = count($comment_num);
            $datatable['comment_num'] = $num;

            $datatable['comment'] = '';
            if ($num != 0) {
                $comments = array();
                $comments_list = array();

                $cardComment_list = DB::table('findmiin_comment')->where('card_id', $sections->card_id)->orderby('rating', 'desc')
                    ->offset(0)->limit(5)->get();

                foreach ($cardComment_list as $cardComment) {
                    $comments['rating'] = $cardComment->rating;
                    $comments['content'] = $cardComment->content;
                    if ($cardComment->user_id == '0' || $cardComment->user_id == '') {
                        $comments['userid'] = 'serveruser';
                        $comments['firstname'] = $cardComment->visitor_name;
                        $comments['lastname'] = '';
                    } else {
                        $comments['userid'] = $cardComment->user_id;
                        $user = DB::table('users')->select(['first_name', 'last_name'])->where('id', $cardComment->user_id)->first();
                        $comments['firstname'] = $user->first_name;
                        $comments['lastname'] = $user->last_name;
                    }
                    array_push($comments_list, $comments);
                }
                $datatable['comment'] = $comments_list;
            }

            $comment_flag = DB::table('findmiin_comment')->where('card_id', $sections->card_id)->where('user_id', $userid)->first();
            if (empty($comment_flag)) $commented = 'no';
            else $commented = 'yes';

            $like_flag = DB::table('findmiin_like')->where('card_id', $sections->card_id)->where('user_id', $userid)->first();
            if (!empty($like_flag) && $like_flag->like == 1) $like = 'yes';

            $datatable['commented'] = $commented;
            $datatable['like'] = $like;

            $datatable['created_at'] = $sections->created_at;

            $result = array('status_code' => '200', 'data' => $datatable, 'message' => 'success');
        }else{
            $result = array('status_code' => '600', 'message' => 'Posted card do not exsit.');
        }
        return response()->json($result);
    }
    public function getPostAll(Request $request)
    {
        $credentials = $request->only(
            'cardid', 'userid'
        );
        $validator = Validator::make($credentials, [
            'cardid' => 'required',
            'userid' => 'required'
        ]);
        if ($validator->fails()) {
            throw new ValidationHttpException($validator->errors()->all());
        }
        $cardid = $request->get('cardid', '');
        $userid = $request->get('userid', '');

        $lat1 = 0;
        $lon1 = 0;

        $user = DB::table('findmiin_card')->select(['business_lat', 'business_lon'])->where('id', $cardid)->first();
        $lat1 = (float)$user->business_lat;
        $lon1 = (float)$user->business_lon;

        $datatable = array();
        $datatable_list = array();

        $sectionslist = \DB::table('findmiin_localfinds')->where('card_id', $cardid)->orderby('id', 'desc')->get();

        foreach($sectionslist as $sections){
            $commented = 'no';
            $like = 'no';
            $datatable['id'] = $sections->card_id;
            $datatable['sectionid'] = $sections->section_id;
            $sectionid = $sections->section_id;
            $datatable['section_name'] = DB::table('findmiin_section')->where('id',$sectionid)->first()->name;
            $datatable['business_name'] = $sections->business_name;
            $datatable['business_address'] = $sections->business_country.' '.$sections->business_state.' '.$sections->business_city.' '.$sections->business_address;
            $datatable['business_phone_number'] = $sections->business_phone_number;
            $datatable['business_lat'] = $sections->business_lat;
            $datatable['business_lon'] = $sections->business_lon;
            $mile = $this->distance($lat1, $lon1, (float)$sections->business_lat, (float)$sections->business_lon, 'M');
            $datatable['distance'] = $mile;
            $datatable['manager_name'] = $sections->manager_name;
            $datatable['manager_phone_number'] = $sections->manager_phone_number;
            $datatable['business_short_description'] = $sections->business_short_description;
            $datatable['business_information'] = $sections->business_information;
            $datatable['post_description'] = $sections->post_description;
            $datatable['open_hour_mon_fri_from'] = $sections->open_hour_mon_fri_from;
            $datatable['open_hour_mon_fri_to'] = $sections->open_hour_mon_fri_to;
            $datatable['open_hour_sat_from'] = $sections->open_hour_sat_from;
            $datatable['open_hour_sat_to'] = $sections->open_hour_sat_to;
            $datatable['open_hour_sun_from'] = $sections->open_hour_sun_from;
            $datatable['open_hour_sun_to'] = $sections->open_hour_sun_to;
            $datatable['logo'] = '/uploads/card_logo/'.$sections->logo;

            $picture_list = explode(",", $sections->pictures);
            if($sections->pictures != '')
                $picture_count = count($picture_list);
            else
                $picture_count = 0;
            $pictures = "";
            for($i = 0; $i < $picture_count; $i++){
                if($i == 0)
                    $pictures = '/uploads/card_picture/'. $picture_list[$i];
                else
                    $pictures = $pictures .'@/uploads/card_picture/'. $picture_list[$i];
            }
            $datatable['picture_count'] = $picture_count;
            $datatable['pictures'] = $pictures;
            $datatable['facebook_link'] = $sections->facebook_link;
            $datatable['google_plus_link'] = $sections->google_plus_link;
            $datatable['twitter_link'] = $sections->twitter_link;
            $datatable['keywords'] = $sections->keywords;
            $datatable['category'] = $sections->category;
            $datatable['contract_start_date'] = $sections->contract_start_date;
            $datatable['contract_end_date'] = $sections->contract_end_date;

            $comment_num = DB::table('findmiin_comment')->where('card_id',$sections->card_id)->get();
            $num = count($comment_num);
            $datatable['comment_num'] = $num;

            $datatable['comment'] = '';
            if($num != 0){
                $comments = array();
                $comments_list = array();

                $cardComment_list = DB::table('findmiin_comment')->where('card_id',$sections->card_id)->orderby('rating','desc')
                    ->offset(0)->limit(5)->get();

                foreach($cardComment_list as $cardComment) {
                    $comments['rating'] = $cardComment->rating;
                    $comments['content'] = $cardComment->content;
                    if($cardComment->user_id == '0' || $cardComment->user_id == '') {
                        $comments['userid'] = 'serveruser';
                        $comments['firstname'] = $cardComment->visitor_name;
                        $comments['lastname'] = '';
                    }else {
                        $comments['userid'] = $cardComment->user_id;
                        $user = DB::table('users')->select(['first_name','last_name'])->where('id',$cardComment->user_id)->first();
                        $comments['firstname'] = $user->first_name;
                        $comments['lastname'] = $user->last_name;
                    }
                    array_push($comments_list, $comments);
                }
                $datatable['comment'] = $comments_list;
            }

            $comment_flag = DB::table('findmiin_comment')->where('card_id',$sections->card_id)->where('user_id',$userid)->first();
            if(empty($comment_flag)) $commented = 'no';
            else $commented = 'yes';

            $like_flag = DB::table('findmiin_like')->where('card_id',$sections->card_id)->where('user_id',$userid)->first();
            if(!empty($like_flag) && $like_flag->like == 1 ) $like = 'yes';

            $datatable['commented'] = $commented;
            $datatable['like'] = $like;

            $datatable['created_at'] = $sections->created_at;

            array_push($datatable_list, $datatable);
        }

        usort($datatable_list, create_function('$a, $b',
            'if ($a["distance"] == $b["distance"]) return 0; return ($a["distance"] < $b["distance"]) ? -1 : 1;'));


        $result = array('status_code'=>'200', 'data'=>$datatable_list, 'message'=>'success');
        return response()->json($result);
    }
    public function getPostWithCity(Request $request)
    {
        $credentials = $request->only(
            'city', 'pageno', 'flag', 'type', 'userid'
        );
        $validator = Validator::make($credentials, [
            'city' => 'required',
            'pageno' => 'required',
            'flag' => 'required',
            'type' => 'required',
            'userid' => 'required'
        ]);
        if ($validator->fails()) {
            throw new ValidationHttpException($validator->errors()->all());
        }
        $city = $request->get('city', '');
        $pageno = $request->get('pageno', '');
        $flag = $request->get('flag', '');
        $type = $request->get('type', '');
        $userid = $request->get('userid', '');
        $keyword = $request->get('keyword', '');

        $lat1 = 0;
        $lon1 = 0;
        if($type == 'client') {
            $user = DB::table('findmiin_card')->select(['business_lat', 'business_lon'])->where('id', $userid)->first();
            $lat1 = (float)$user->business_lat;
            $lon1 = (float)$user->business_lon;
        }else {
            $user = DB::table('users')->where('id', $userid)->first();
            $lat1 = (float)$user->lat;
            $lon1 = (float)$user->lon;            
        }

        $num = 10;
        $start_num = (int)$pageno * $num;
        $datatable = array();
        $datatable_list = array();
        
        if ($flag == '0' || $flag == '10'){
            if($keyword == '')
                if($flag == '0')
                    $cardlist = \DB::table('findmiin_card')->where('business_city','like','%'.$city.'%')
                        ->orderby('id', 'desc')->offset((int)$start_num)->limit($num)->get();
                else
                    $cardlist = \DB::table('findmiin_card')
                        ->orderby('id', 'desc')->offset((int)$start_num)->limit($num)->get();
            else
                if($flag == '0')
                    $cardlist = \DB::table('findmiin_card')->where('keywords','like','%'.$keyword.'%')
                        ->orderby('id', 'desc')->offset((int)$start_num)->limit($num)->get();
                else
                    $cardlist = \DB::table('findmiin_card')
                        ->orderby('id', 'desc')->offset((int)$start_num)->limit($num)->get();


            foreach($cardlist as $card){
                $commented = 'no';
                $like = 'no';
                $datatable['id'] = $card->id;
                $datatable['business_name'] = $card->business_name;
                $datatable['business_address'] = $card->business_country.' '.$card->business_state.' '.$card->business_city.' '.$card->business_address;
                $datatable['business_phone_number'] = $card->business_phone_number;
                $datatable['business_lat'] = $card->business_lat;
                $datatable['business_lon'] = $card->business_lon;
                $mile = $this->distance($lat1, $lon1, (float)$card->business_lat, (float)$card->business_lon, 'M');
                $datatable['distance'] = $mile;
                $datatable['manager_name'] = $card->manager_name;
                $datatable['manager_phone_number'] = $card->manager_phone_number;
                $datatable['business_short_description'] = $card->business_short_description;
                $datatable['business_information'] = $card->business_information;
                $datatable['open_hour_mon_fri_from'] = $card->open_hour_mon_fri_from;
                $datatable['open_hour_mon_fri_to'] = $card->open_hour_mon_fri_to;
                $datatable['open_hour_sat_from'] = $card->open_hour_sat_from;
                $datatable['open_hour_sat_to'] = $card->open_hour_sat_to;
                $datatable['open_hour_sun_from'] = $card->open_hour_sun_from;
                $datatable['open_hour_sun_to'] = $card->open_hour_sun_to;
                $datatable['logo'] = '/uploads/card_logo/'.$card->logo;

                $picture_list = explode(",", $card->pictures);
                if($card->pictures != '')
                    $picture_count = count($picture_list);
                else
                    $picture_count = 0;
                $pictures = "";
                for($i = 0; $i < $picture_count; $i++){
                    if($i == 0)
                        $pictures = '/uploads/card_picture/'. $picture_list[$i];
                    else
                        $pictures = $pictures .'@/uploads/card_picture/'. $picture_list[$i];
                }
                $datatable['picture_count'] = $picture_count;
                $datatable['pictures'] = $pictures;
                $datatable['facebook_link'] = $card->facebook_link;
                $datatable['google_plus_link'] = $card->google_plus_link;
                $datatable['twitter_link'] = $card->twitter_link;
                $datatable['keywords'] = $card->keywords;
                $datatable['category'] = $card->category;
                $datatable['section_permission'] = $card->section_permission;
                $datatable['contract_start_date'] = $card->contract_start_date;
                $datatable['contract_end_date'] = $card->contract_end_date;

                $comment_num = DB::table('findmiin_comment')->where('card_id',$card->id)->get();
                $num = count($comment_num);
                $datatable['comment_num'] = $num;

                $datatable['comment'] = '';
                if($num != 0){
                    $comments = array();
                    $comments_list = array();

                    $cardComment_list = DB::table('findmiin_comment')->where('card_id',$card->id)->orderby('rating','desc')
                        ->offset(0)->limit(5)->get();

                    foreach($cardComment_list as $cardComment) {
                        $comments['rating'] = $cardComment->rating;
                        $comments['content'] = $cardComment->content;
                        if($cardComment->user_id == '0' || $cardComment->user_id == '') {
                            $comments['userid'] = 'serveruser';
                            $comments['firstname'] = $cardComment->visitor_name;
                            $comments['lastname'] = '';
                        }else {
                            $comments['userid'] = $cardComment->user_id;
                            $user = DB::table('users')->select(['first_name','last_name'])->where('id',$cardComment->user_id)->first();
                            $comments['firstname'] = $user->first_name;
                            $comments['lastname'] = $user->last_name;
                        }
                        array_push($comments_list, $comments);
                    }
                    $datatable['comment'] = $comments_list;
                }
                if($type=='user'){
                    $comment_flag = DB::table('findmiin_comment')->where('card_id',$card->id)->where('user_id',$userid)->first();
                    if(empty($comment_flag)) $commented = 'no';
                    else $commented = 'yes';

                    $like_flag = DB::table('findmiin_like')->where('card_id',$card->id)->where('user_id',$userid)->first();
                    if(!empty($like_flag) && $like_flag->like == 1 ) $like = 'yes';
                }
                $datatable['commented'] = $commented;
                $datatable['like'] = $like;

                $datatable['created_at'] = $card->created_at;

                array_push($datatable_list, $datatable);
            }
            
            

            usort($datatable_list, create_function('$a, $b',
                'if ($a["distance"] == $b["distance"]) return 0; return ($a["distance"] < $b["distance"]) ? -1 : 1;'));

        }else{
            $cardlist = \DB::table('findmiin_card')->where('id', 0)
                ->orderby('id', 'desc')->offset((int)$start_num)->limit($num)->get();
        }

        $result = array('status_code'=>'200', 'data'=>$datatable_list, 'message'=>'success');
        return response()->json($result);
    }
    
    public function postedSections(Request $request){
        $credentials = $request->only(
            'clientid'
        );
        $validator = Validator::make($credentials, [
            'clientid' => 'required'
        ]);
        if ($validator->fails()) {
            throw new ValidationHttpException($validator->errors()->all());
        }
        $clientid = $request->get('clientid', '');

        $sectionid_list = \DB::table('findmiin_localfinds')->select(['section_id'])->where('card_id',$clientid)->get();
        $count = count($sectionid_list);
        $postSectionId = "";
        for($i = 0; $i < $count; $i++){
            if($i == 0){
                $postSectionId = $sectionid_list[$i]->section_id;
            }else{
                $postSectionId = $postSectionId.','.$sectionid_list[$i]->section_id;
            }
        }
//        $jobid = \DB::table('findmiin_jobs')->where('card_id',$clientid)->first();
//        if(!empty($jobid)){
//            $postSectionId = $postSectionId.','.'0';
//        }

        $result = array('status_code'=>'200', 'data'=>$postSectionId, 'message'=>'success');
        return response()->json($result);
    }
    public function updatelocation(Request $request)
    {
        $credentials = $request->only(
            'userid', 'lat', 'lon', 'type'
        );
        $validator = Validator::make($credentials, [
            'userid' => 'required',
            'lat' => 'required',
            'lon' => 'required',
            'type' => 'required'
        ]);
        if($validator->fails()) {
            throw new ValidationHttpException($validator->errors()->all());
        }
        $userid = $request->get('userid','');
        $lat = $request->get('lat','');
        $lon = $request->get('lon','');
        $type = $request->get('type','');
        
        if($type == 'client'){
            \DB::table('findmiin_card')->where('id', $userid)->update(['business_lat'=>$lat,'business_lon'=>$lon]);
        }else{
            \DB::table('users')->where('id', $userid)->update(['lat'=>$lat,'lon'=>$lon]);
        }

        $result = array('status_code'=>'200', 'message'=>"success");
        
        return response()->json($result);
    }
    public function getProfile(Request $request)
    {
        $credentials = $request->only(
            'userid', 'type','pageno'
        );
        $validator = Validator::make($credentials, [
            'userid' => 'required',
            'pageno' => 'required',
            'type' => 'required'
        ]);
        if($validator->fails()) {
            throw new ValidationHttpException($validator->errors()->all());
        }
        $userid = $request->get('userid','');
        $keyword = $request->get('keyword','');
        $pageno = $request->get('pageno','');
        $type = $request->get('type','');

        $lat1 = 0;
        $lon1 = 0;
        if($type == 'client') {
            $user = DB::table('findmiin_card')->select(['business_lat', 'business_lon'])->where('id', $userid)->first();
            $lat1 = (float)$user->business_lat;
            $lon1 = (float)$user->business_lon;
        }else {
            $user = DB::table('users')->select(['lat', 'lon'])->where('id', $userid)->first();
            $lat1 = (float)$user->lat;
            $lon1 = (float)$user->lon;
        }

        $num = 10;
        $start_num = (int)$pageno * $num;
        $datatable = array();
        $datatable_list = array();

        $cardlist = \DB::table('findmiin_card')->where('keywords','like','%'.$keyword.'%')
              ->orderby('id', 'desc')->offset((int)$start_num)->limit($num)->get();


        foreach($cardlist as $card){
            $commented = 'no';
            $like = 'no';
            $datatable['id'] = $card->id;
            $datatable['business_name'] = $card->business_name;
            $datatable['business_address'] = $card->business_country.' '.$card->business_state.' '.$card->business_city.' '.$card->business_address;
            $datatable['business_phone_number'] = $card->business_phone_number;
            $datatable['business_lat'] = $card->business_lat;
            $datatable['business_lon'] = $card->business_lon;
            $mile = $this->distance($lat1, $lon1, (float)$card->business_lat, (float)$card->business_lon, 'M');
            $datatable['distance'] = $mile;
            $datatable['manager_name'] = $card->manager_name;
            $datatable['manager_phone_number'] = $card->manager_phone_number;
            $datatable['business_short_description'] = $card->business_short_description;
            $datatable['business_information'] = $card->business_information;
            $datatable['open_hour_mon_fri_from'] = $card->open_hour_mon_fri_from;
            $datatable['open_hour_mon_fri_to'] = $card->open_hour_mon_fri_to;
            $datatable['open_hour_sat_from'] = $card->open_hour_sat_from;
            $datatable['open_hour_sat_to'] = $card->open_hour_sat_to;
            $datatable['open_hour_sun_from'] = $card->open_hour_sun_from;
            $datatable['open_hour_sun_to'] = $card->open_hour_sun_to;
            $datatable['logo'] = '/uploads/card_logo/'.$card->logo;

            $picture_list = explode(",", $card->pictures);
            if($card->pictures != '')
                $picture_count = count($picture_list);
            else
                $picture_count = 0;
            $pictures = "";
            for($i = 0; $i < $picture_count; $i++){
                if($i == 0)
                    $pictures = '/uploads/card_picture/'. $picture_list[$i];
                else
                    $pictures = $pictures .'@/uploads/card_picture/'. $picture_list[$i];
            }
            $datatable['picture_count'] = $picture_count;
            $datatable['pictures'] = $pictures;
            $datatable['facebook_link'] = $card->facebook_link;
            $datatable['google_plus_link'] = $card->google_plus_link;
            $datatable['twitter_link'] = $card->twitter_link;
            $datatable['keywords'] = $card->keywords;
            $datatable['category'] = $card->category;
            $datatable['section_permission'] = $card->section_permission;
            $datatable['contract_start_date'] = $card->contract_start_date;
            $datatable['contract_end_date'] = $card->contract_end_date;

            $comment_num = DB::table('findmiin_comment')->where('card_id',$card->id)->get();
            $num = count($comment_num);
            $datatable['comment_num'] = $num;

            $datatable['comment'] = '';
            if($num != 0){
                $comments = array();
                $comments_list = array();

                $cardComment_list = DB::table('findmiin_comment')->where('card_id',$card->id)->orderby('rating','desc')
                    ->offset(0)->limit(5)->get();

                foreach($cardComment_list as $cardComment) {
                    $comments['rating'] = $cardComment->rating;
                    $comments['content'] = $cardComment->content;
                    if($cardComment->user_id == '0' || $cardComment->user_id == '') {
                        $comments['userid'] = 'serveruser';
                        $comments['firstname'] = $cardComment->visitor_name;
                        $comments['lastname'] = '';
                    }else {
                        $comments['userid'] = $cardComment->user_id;
                        $user = DB::table('users')->select(['first_name','last_name'])->where('id',$cardComment->user_id)->first();
                        $comments['firstname'] = $user->first_name;
                        $comments['lastname'] = $user->last_name;
                    }
                    array_push($comments_list, $comments);
                }
                $datatable['comment'] = $comments_list;
            }

            if($type=='user'){
                $comment_flag = DB::table('findmiin_comment')->where('card_id',$card->id)->where('user_id',$userid)->first();
                if(empty($comment_flag)) $commented = 'no';
                else $commented = 'yes';

                $like_flag = DB::table('findmiin_like')->where('card_id',$card->id)->where('user_id',$userid)->first();
                if(!empty($like_flag) && $like_flag->like == 1 ) $like = 'yes';
            }
            $datatable['commented'] = $commented;
            $datatable['like'] = $like;

            $datatable['created_at'] = $card->created_at;

            array_push($datatable_list, $datatable);
        }

        usort($datatable_list, create_function('$a, $b',
            'if ($a["distance"] == $b["distance"]) return 0; return ($a["distance"] < $b["distance"]) ? -1 : 1;'));


        $result = array('status_code'=>'200', 'data'=>$datatable_list, 'message'=>'success');
        return response()->json($result);
    }
    public function getUserInfo(Request $request)
    {
        $credentials = $request->only(
            'userid'
        );
        $validator = Validator::make($credentials, [
            'userid' => 'required'
        ]);
        if($validator->fails()) {
            throw new ValidationHttpException($validator->errors()->all());
        }
        $userid = $request->get('userid','');

        $datatable = array();
        $datatable_list = array();
        $cardlist = array();
        $userprofile = array();

        $cardlike_list = \DB::table('findmiin_like')->select(['card_id'])->where('user_id',$userid)->where('like',1)->get();
        $cardcomment_list = \DB::table('findmiin_comment')->select(['card_id'])->where('user_id',$userid)->get();

        foreach($cardlike_list as $cardlike) {
            array_push($cardlist, $cardlike->card_id);
        }
        $count = count($cardlike_list);
        foreach($cardcomment_list as $cardcomment) {

            if($count != 0){
                $flag = 0;
                for($i = 0; $i < $count; $i++){
                    if($cardcomment->card_id == $cardlike_list[$i]->card_id)
                        $flag = 1;
                }
                if($flag == 0)
                    array_push($cardlist, $cardcomment->card_id);
            }else{
                array_push($cardlist, $cardcomment->card_id);
            }
        }

        $lat1 = 0;
        $lon1 = 0;

        $user = DB::table('users')->where('id', $userid)->first();
        $lat1 = (float)$user->lat;
        $lon1 = (float)$user->lon;
        
        $userprofile['photo'] = '/uploads/users/'.$user->pic;
        $userprofile['firstname'] = $user->first_name;
        $userprofile['lastname'] = $user->last_name;
        $userprofile['email'] = $user->email;
        $userprofile['commentnum'] = count($cardcomment_list);
        $userprofile['likenum'] = count($cardlike_list);


        foreach($cardlist as $card_id){
            $commented = 'no';
            $like = 'no';

            $card = \DB::table('findmiin_card')->where('id',$card_id)->first();

            $datatable['id'] = $card->id;
            $datatable['business_name'] = $card->business_name;
            $datatable['business_address'] = $card->business_country.' '.$card->business_state.' '.$card->business_city.' '.$card->business_address;
            $datatable['business_phone_number'] = $card->business_phone_number;
            $datatable['business_lat'] = $card->business_lat;
            $datatable['business_lon'] = $card->business_lon;
            $mile = $this->distance($lat1, $lon1, (float)$card->business_lat, (float)$card->business_lon, 'M');
            $datatable['distance'] = $mile;
            $datatable['manager_name'] = $card->manager_name;
            $datatable['manager_phone_number'] = $card->manager_phone_number;
            $datatable['business_short_description'] = $card->business_short_description;
            $datatable['business_information'] = $card->business_information;
            $datatable['open_hour_mon_fri_from'] = $card->open_hour_mon_fri_from;
            $datatable['open_hour_mon_fri_to'] = $card->open_hour_mon_fri_to;
            $datatable['open_hour_sat_from'] = $card->open_hour_sat_from;
            $datatable['open_hour_sat_to'] = $card->open_hour_sat_to;
            $datatable['open_hour_sun_from'] = $card->open_hour_sun_from;
            $datatable['open_hour_sun_to'] = $card->open_hour_sun_to;
            $datatable['logo'] = '/uploads/card_logo/'.$card->logo;

            $picture_list = explode(",", $card->pictures);
            if($card->pictures != '')
                $picture_count = count($picture_list);
            else
                $picture_count = 0;
            $pictures = "";
            for($i = 0; $i < $picture_count; $i++){
                if($i == 0)
                    $pictures = '/uploads/card_picture/'. $picture_list[$i];
                else
                    $pictures = $pictures .'@/uploads/card_picture/'. $picture_list[$i];
            }
            $datatable['picture_count'] = $picture_count;
            $datatable['pictures'] = $pictures;
            $datatable['facebook_link'] = $card->facebook_link;
            $datatable['google_plus_link'] = $card->google_plus_link;
            $datatable['twitter_link'] = $card->twitter_link;
            $datatable['keywords'] = $card->keywords;
            $datatable['category'] = $card->category;
            $datatable['section_permission'] = $card->section_permission;
            $datatable['contract_start_date'] = $card->contract_start_date;
            $datatable['contract_end_date'] = $card->contract_end_date;

            $comment_num = DB::table('findmiin_comment')->where('card_id',$card->id)->get();
            $num = count($comment_num);
            $datatable['comment_num'] = $num;

            $datatable['comment'] = '';
            if($num != 0){
                $comments = array();
                $comments_list = array();

                $cardComment_list = DB::table('findmiin_comment')->where('card_id',$card->id)->orderby('rating','desc')
                    ->offset(0)->limit(5)->get();

                foreach($cardComment_list as $cardComment) {
                    $comments['rating'] = $cardComment->rating;
                    $comments['content'] = $cardComment->content;
                    if($cardComment->user_id == '0' || $cardComment->user_id == '') {
                        $comments['userid'] = 'serveruser';
                        $comments['firstname'] = $cardComment->visitor_name;
                        $comments['lastname'] = '';
                    }else {
                        $comments['userid'] = $cardComment->user_id;
                        $user = DB::table('users')->select(['first_name','last_name'])->where('id',$cardComment->user_id)->first();
                        $comments['firstname'] = $user->first_name;
                        $comments['lastname'] = $user->last_name;
                    }
                    array_push($comments_list, $comments);
                }
                $datatable['comment'] = $comments_list;
            }

            $comment_flag = DB::table('findmiin_comment')->where('card_id',$card->id)->where('user_id',$userid)->first();
            if(empty($comment_flag)) $commented = 'no';
            else $commented = 'yes';

            $like_flag = DB::table('findmiin_like')->where('card_id',$card->id)->where('user_id',$userid)->first();
            if(!empty($like_flag) && $like_flag->like == 1 ) $like = 'yes';

            $datatable['commented'] = $commented;
            $datatable['like'] = $like;

            $datatable['created_at'] = $card->created_at;

            array_push($datatable_list, $datatable);
        }

        usort($datatable_list, create_function('$a, $b',
            'if ($a["distance"] == $b["distance"]) return 0; return ($a["distance"] < $b["distance"]) ? -1 : 1;'));

        $result = array('status_code'=>'200','data'=>$datatable_list, 'profile'=>$userprofile, 'message'=>"success");

        return response()->json($result);
    }
    public function like(Request $request)
    {
        $credentials = $request->only(
            'cardid', 'userid'
        );
        $validator = Validator::make($credentials, [
            'cardid' => 'required',
            'userid' => 'required'
        ]);
        if($validator->fails()) {
            throw new ValidationHttpException($validator->errors()->all());
        }
        $cardid = $request->get('cardid','');
        $userid = $request->get('userid','');

        $like = \DB::table('findmiin_like')->where('card_id',$cardid)->where('user_id',$userid)->first();
        if(empty($like)){
            \DB::table('findmiin_like')->insert(['card_id'=>$cardid,'user_id'=>$userid,'like'=>1]);
        }else{
            if($like->like == 0)
                \DB::table('findmiin_like')->where('id', $like->id)->update(['like'=>1]);
        }

        $result = array('status_code'=>'200', 'message'=>"success");

        return response()->json($result);
    }
    public function dislike(Request $request)
    {
        $credentials = $request->only(
            'cardid', 'userid'
        );
        $validator = Validator::make($credentials, [
            'cardid' => 'required',
            'userid' => 'required'
        ]);
        if($validator->fails()) {
            throw new ValidationHttpException($validator->errors()->all());
        }
        $cardid = $request->get('cardid','');
        $userid = $request->get('userid','');

        $like = \DB::table('findmiin_like')->where('card_id',$cardid)->where('user_id',$userid)->first();
        if(empty($like)){
            \DB::table('findmiin_like')->insert(['card_id'=>$cardid,'user_id'=>$userid,'like'=>0]);
        }else{
            if($like->like == 1)
                \DB::table('findmiin_like')->where('id', $like->id)->update(['like'=>0]);
        }

        $result = array('status_code'=>'200', 'message'=>"success");

        return response()->json($result);
    }
    public function cardcomment(Request $request)
    {
        $credentials = $request->only(
            'cardid', 'userid', 'rating', 'content'
        );
        $validator = Validator::make($credentials, [
            'cardid' => 'required',
            'userid' => 'required',
            'rating' => 'required',
            'content' => 'required'
        ]);
        if($validator->fails()) {
            throw new ValidationHttpException($validator->errors()->all());
        }
        $cardid = $request->get('cardid','');
        $userid = $request->get('userid','');
        $rating = $request->get('rating','');
        $comment = $request->get('content','');

        $datatable = array();
        $datatable_list = array();

        $cardComment = \DB::table('findmiin_comment')->where('card_id',$cardid)->where('user_id',$userid)->first();
        if(empty($cardComment))
            \DB::table('findmiin_comment')->insert(['card_id'=>$cardid,'user_id'=>$userid,'rating'=>$rating,'content'=>$comment]);
        else
            \DB::table('findmiin_comment')->where('id', $cardComment->id)->update(['card_id'=>$cardid,'user_id'=>$userid,'rating'=>$rating,'content'=>$comment]);

        $comment_list = \DB::table('findmiin_comment')->where('card_id',$cardid)->get();

        foreach($comment_list as $comments){
            $datatable['rating'] = $comments->rating;
            $datatable['content'] = $comments->content;
            $datatable['userid'] = $comments->user_id;

            if($comments->user_id == 0){
                $datatable['firstname'] = $comments->visitor_name;
                $datatable['lastname'] = '';
            }else {
                $user = DB::table('users')->select(['first_name','last_name'])->where('id',$comments->user_id)->first();
                $datatable['firstname'] = $user->first_name;
                $datatable['lastname'] = $user->last_name;
            }

            array_push($datatable_list, $datatable);
        }

        $result = array('status_code'=>'200', 'data'=>$datatable_list, 'message'=>"success");

        return response()->json($result);
    }
    public function allcomment(Request $request)
    {
        $credentials = $request->only(
            'cardid'
        );
        $validator = Validator::make($credentials, [
            'cardid' => 'required'
        ]);
        if($validator->fails()) {
            throw new ValidationHttpException($validator->errors()->all());
        }
        $cardid = $request->get('cardid','');

        $datatable = array();
        $datatable_list = array();

        $cardComment_list = \DB::table('findmiin_comment')->where('card_id',$cardid)->get();

        foreach($cardComment_list as $cardComment) {
            $datatable['rating'] = $cardComment->rating;
            $datatable['content'] = $cardComment->content;
            if($cardComment->user_id == '0' || $cardComment->user_id == '') {
                $datatable['userid'] = 'serveruser';
                $datatable['firstname'] = $cardComment->visitor_name;
                $datatable['lastname'] = '';
            }else {
                $datatable['userid'] = $cardComment->user_id;
                $user = DB::table('users')->select(['first_name','last_name'])->where('id',$cardComment->user_id)->first();
                $datatable['firstname'] = $user->first_name;
                $datatable['lastname'] = $user->last_name;
            }
            array_push($datatable_list, $datatable);
        }

        $result = array('status_code'=>'200','data'=>$datatable_list, 'message'=>"success");

        return response()->json($result);
    }
    public function likecommentcard(Request $request)
    {
        $credentials = $request->only(
            'userid'
        );
        $validator = Validator::make($credentials, [
            'userid' => 'required'
        ]);
        if($validator->fails()) {
            throw new ValidationHttpException($validator->errors()->all());
        }
        $userid = $request->get('userid','');

        $datatable = array();
        $datatable_list = array();
        $cardlist = array();

        $cardlike_list = \DB::table('findmiin_like')->select(['card_id'])->where('user_id',$userid)->where('like', 1)->get();
        $cardcomment_list = \DB::table('findmiin_comment')->select(['card_id'])->where('user_id',$userid)->get();

        foreach($cardlike_list as $cardlike) {
            array_push($cardlist, $cardlike->card_id);
        }
        $count = count($cardlike_list);
        foreach($cardcomment_list as $cardcomment) {

            if($count != 0){
                $flag = 0;
                for($i = 0; $i < $count; $i++){
                    if($cardcomment->card_id == $cardlike_list[$i]->card_id)
                        $flag = 1;
                }
                if($flag == 0)
                    array_push($cardlist, $cardcomment->card_id);
            }else{
                array_push($cardlist, $cardcomment->card_id);
            }
        }

        $lat1 = 0;
        $lon1 = 0;

        $user = DB::table('users')->select(['lat', 'lon'])->where('id', $userid)->first();
        $lat1 = (float)$user->lat;
        $lon1 = (float)$user->lon;

        $commented = 'no';
        $like = 'no';
        foreach($cardlist as $card_id){
            $card = \DB::table('findmiin_card')->where('id',$card_id)->first();

            $datatable['id'] = $card->id;
            $datatable['business_name'] = $card->business_name;
            $datatable['business_address'] = $card->business_country.' '.$card->business_state.' '.$card->business_city.' '.$card->business_address;
            $datatable['business_phone_number'] = $card->business_phone_number;
            $datatable['business_lat'] = $card->business_lat;
            $datatable['business_lon'] = $card->business_lon;
            $mile = $this->distance($lat1, $lon1, (float)$card->business_lat, (float)$card->business_lon, 'M');
            $datatable['distance'] = $mile;
            $datatable['manager_name'] = $card->manager_name;
            $datatable['manager_phone_number'] = $card->manager_phone_number;
            $datatable['business_short_description'] = $card->business_short_description;
            $datatable['business_information'] = $card->business_information;
            $datatable['open_hour_mon_fri_from'] = $card->open_hour_mon_fri_from;
            $datatable['open_hour_mon_fri_to'] = $card->open_hour_mon_fri_to;
            $datatable['open_hour_sat_from'] = $card->open_hour_sat_from;
            $datatable['open_hour_sat_to'] = $card->open_hour_sat_to;
            $datatable['open_hour_sun_from'] = $card->open_hour_sun_from;
            $datatable['open_hour_sun_to'] = $card->open_hour_sun_to;
            $datatable['logo'] = '/uploads/card_logo/'.$card->logo;

            $picture_list = explode(",", $card->pictures);
            $picture_count = count($picture_list);
            $pictures = "";
            for($i = 0; $i < $picture_count; $i++){
                if($i == 0)
                    $pictures = '/uploads/card_picture/'. $picture_list[$i];
                else
                    $pictures = $pictures .'@/uploads/card_picture/'. $picture_list[$i];
            }
            $datatable['picture_count'] = $picture_count;
            $datatable['pictures'] = $pictures;
            $datatable['facebook_link'] = $card->facebook_link;
            $datatable['google_plus_link'] = $card->google_plus_link;
            $datatable['twitter_link'] = $card->twitter_link;
            $datatable['keywords'] = $card->keywords;
            $datatable['category'] = $card->category;
            $datatable['section_permission'] = $card->section_permission;
            $datatable['contract_start_date'] = $card->contract_start_date;
            $datatable['contract_end_date'] = $card->contract_end_date;

            $comment_num = DB::table('findmiin_comment')->where('card_id',$card->id)->get();
            $num = count($comment_num);
            $datatable['comment_num'] = $num;

            $datatable['comment'] = '';
            if($num != 0){
                $comments = array();
                $comments_list = array();

                $cardComment_list = DB::table('findmiin_comment')->where('card_id',$card->id)->orderby('rating','desc')
                    ->offset(0)->limit(5)->get();

                foreach($cardComment_list as $cardComment) {
                    $comments['rating'] = $cardComment->rating;
                    $comments['content'] = $cardComment->content;
                    if($cardComment->user_id == '0' || $cardComment->user_id == '') {
                        $comments['userid'] = 'serveruser';
                        $comments['firstname'] = $cardComment->visitor_name;
                        $comments['lastname'] = '';
                    }else {
                        $comments['userid'] = $cardComment->user_id;
                        $user = DB::table('users')->select(['first_name','last_name'])->where('id',$cardComment->user_id)->first();
                        $comments['firstname'] = $user->first_name;
                        $comments['lastname'] = $user->last_name;
                    }
                    array_push($comments_list, $comments);
                }
                $datatable['comment'] = $comments_list;
            }

            $comment_flag = DB::table('findmiin_comment')->where('card_id',$card->id)->where('user_id',$userid)->first();
            if(empty($comment_flag)) $commented = 'no';
            else $commented = 'yes';

            $like_flag = DB::table('findmiin_like')->where('card_id',$card->id)->where('user_id',$userid)->first();
            if(!empty($like_flag) && $like_flag->like == 1 ) $like = 'yes';

            $datatable['commented'] = $commented;
            $datatable['like'] = $like;

            $datatable['created_at'] = $card->created_at;

            array_push($datatable_list, $datatable);
        }

        usort($datatable_list, create_function('$a, $b',
            'if ($a["distance"] == $b["distance"]) return 0; return ($a["distance"] < $b["distance"]) ? -1 : 1;'));

        $result = array('status_code'=>'200','data'=>$datatable_list, 'message'=>"success");

        return response()->json($result);
    }
    public function distance($lat1, $lon1, $lat2, $lon2, $unit) {
        $theta = $lon1 - $lon2;
        $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
        $dist = acos($dist);
        $dist = rad2deg($dist);
        $miles = $dist * 60 * 1.1515;
        $unit = strtoupper($unit);

        if ($unit == "K") {
            return ($miles * 1.609344);
        } else if ($unit == "N") {
            return ($miles * 0.8684);
        } else {
            return $miles;
        }
    }
    function cmp($a, $b) {
        return $a["distance"] - $b["distance"];
    }
    function compareMid($a, $b)
    {
        if ($a['distance'] == $b['distance']) {
            return 0;
        }
        return ($a['distance'] < $b['distance']) ? -1 : 1;
    }
    public function postImgUpload(Request $request)
    {
        $safeName = '';
        if ($file = $request->file('photo')) {
            $fileName = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension() ?: 'png';
            $folderName = '/uploads/card_picture';
            $destinationPath = base_path() . $folderName;
            $safeName = str_random(10) . '.' . $extension;
            $file->move($destinationPath, $safeName);
        }

        if($safeName != '') {
            $result = array('status_code' => '200', 'image_name' => $safeName, 'message' => 'success');
        }else{
            $result = array('status_code' => '600', 'message' => 'Image upload failure.');
        }
        return response()->json($result);

    }
    
    public function addContact(Request $request)
    {
        $credentials = $request->only(
            'user_id', 'contact_id'
        );
        $validator = Validator::make($credentials, [
            'user_id' => 'required',
            'contact_id' => 'required'
        ]);
        if($validator->fails()) {
            throw new ValidationHttpException($validator->errors()->all());
        }
        $user_id = $request->get('user_id', '');
        $contact_id = $request->get('contact_id', '');

        $contact_user = \DB::table('ptt_contact')->where('master_id', $user_id)->where('contact_id',$contact_id)->first();
        if($contact_user){
            \DB::table('ptt_contact')->where('master_id', $user_id)->where('contact_id',$contact_id)->update(['master_id'=>$user_id, 'contact_id'=>$contact_id]);
        }else{
            \DB::table('ptt_contact')->insert(['master_id'=>$user_id, 'contact_id'=>$contact_id]);
        }

        $result = array('status_code'=>'200', 'message'=>'success');
        return response()->json($result);

    }
    public function searchName(Request $request)
    {
        $credentials = $request->only(
            'keyword'
        );
        $validator = Validator::make($credentials, [
             'keyword' => 'required'
        ]);
        if($validator->fails()) {
            throw new ValidationHttpException($validator->errors()->all());
        }
        $keyword = $request->get('keyword', '');

        $search = \DB::table('users')->join('role_users', 'role_users.user_id', '=', 'users.id')
            ->select(['users.id as user_id', 'users.first_name as firstname', 'users.last_name as lastname', 'users.phone as phone', 'users.pic as photo', 'users.created_at as created'])
            ->where('role_users.role_id', 4)
            ->where(function ($query) use($keyword) {
                $query->where('users.first_name', 'like', '%'.$keyword.'%')
                      ->orwhere('users.last_name', 'like', '%'.$keyword.'%');
            })->get();

        $result = array('status_code'=>'200', 'message'=>'success', 'data'=>$search);
        return response()->json($result);

    }
    public function searchPhone(Request $request)
    {
        $credentials = $request->only(
            'keyword'
        );
        $validator = Validator::make($credentials, [
            'keyword' => 'required'
        ]);
        if($validator->fails()) {
            throw new ValidationHttpException($validator->errors()->all());
        }
        $keyword = $request->get('keyword', '');

        $search = \DB::table('users')->join('role_users', 'role_users.user_id', '=', 'users.id')
            ->select(['users.id as user_id', 'users.first_name as firstname', 'users.last_name as lastname', 'users.phone as phone', 'users.pic as photo', 'users.created_at as created'])
            ->where('role_users.role_id', 4)
            ->where('users.phone', 'like', '%'.$keyword.'%')
            ->get();

        $result = array('status_code'=>'200', 'message'=>'success', 'data'=>$search);
        return response()->json($result);

    }
    public function searchContactName(Request $request)
    {
        $credentials = $request->only(
            'user_id', 'keyword'
        );
        $validator = Validator::make($credentials, [
            'user_id' => 'required',
            'keyword' => 'required'
        ]);
        if($validator->fails()) {
            throw new ValidationHttpException($validator->errors()->all());
        }
        $user_id = $request->get('user_id', '');
        $keyword = $request->get('keyword', '');

        $search = \DB::table('ptt_contact')->join('users', 'users.id', '=', 'ptt_contact.contact_id')
            ->select(['users.id as user_id', 'users.first_name as firstname', 'users.last_name as lastname', 'users.phone as phone','ptt_contact.created_at as createdat'])
            ->where('ptt_contact.master_id', $user_id)
            ->where('users.first_name', 'like', '%'.$keyword.'%')
            ->orwhere('users.last_name', 'like', '%'.$keyword.'%')->get();

        $result = array('status_code'=>'200', 'message'=>'success', 'data'=>$search);
        return response()->json($result);

    }
    public function searchContactPhone(Request $request)
    {
        $credentials = $request->only(
            'user_id', 'keyword'
        );
        $validator = Validator::make($credentials, [
            'user_id' => 'required',
            'keyword' => 'required'
        ]);
        if($validator->fails()) {
            throw new ValidationHttpException($validator->errors()->all());
        }
        $user_id = $request->get('user_id', '');
        $keyword = $request->get('keyword', '');

        $search = \DB::table('ptt_contact')->join('users', 'users.id', '=', 'ptt_contact.contact_id')
            ->select(['users.id as user_id', 'users.first_name as firstname', 'users.last_name as lastname', 'users.phone as phone','ptt_contact.created_at as createdat'])
            ->where('ptt_contact.master_id', $user_id)
            ->where('users.phone', 'like', '%'.$keyword.'%')
            ->orwhere('users.last_name', 'like', '%'.$keyword.'%')->get();

        $result = array('status_code'=>'200', 'message'=>'success', 'data'=>$search);
        return response()->json($result);

    }
    public function removeContact(Request $request)
    {
        $credentials = $request->only(
            'user_id', 'contact_id'
        );
        $validator = Validator::make($credentials, [
            'user_id' => 'required',
            'contact_id' => 'required'
        ]);
        if($validator->fails()) {
            throw new ValidationHttpException($validator->errors()->all());
        }
        $user_id = $request->get('user_id', '');
        $contact_id = $request->get('contact_id', '');

        $contact = \DB::table('ptt_contact')->where('master_id', $user_id)->where('contact_id',$contact_id)->first();
        if($contact){
            \DB::table('ptt_contact')->where('master_id', $user_id)->where('contact_id',$contact_id)->delete();
            $result = array('status_code'=>'200', 'message'=>'success');
        }else{
            $result = array('status_code'=>'602', 'message'=>'Selected User can not find.');
        }

        return response()->json($result);

    }
    
    public function updateMerchant(Request $request)
    {
        $credentials = $request->only(
            'token', 'userid', 'planid'
        );

        $validator = Validator::make($credentials, [
            'token' => 'required',
            'userid' => 'required',
            'planid' => 'required',
        ]);
        if($validator->fails()) {
            throw new ValidationHttpException($validator->errors()->all());
        }
        $userid = $request->get('userid', '');
        $planid = $request->get('planid', '');
        //please make payment here

        //if success, register
        $verifydate = date('Y-m-d');
        //insert payment result in oollah_user_payments table

        //update user to merchant
        \DB::table('oollah_user_details')->where('user_id', $userid)->update(['plan_id'=>$planid, 'merchant_verified'=>'2', 'verified_date'=>$verifydate]);
        //$user = \DB::table('oollah_user_details')->where('user_id', $userid)->first();
        //\DB::table("role_users")->where('user_id', $user->id)->update(['role_id'=>'3']);
        $user = \DB::table('users')->where('id', $userid)->first();
        $first_name = $user->first_name;
        $last_name = $user->last_name;
        $email = $user->email;
        $phone = $user->phone;
        $city = $user->city;
        $userdetail = \DB::table('oollah_user_details')->where('user_id', $userid)->first();
        if(!empty($userdetail)) {
            $merchant_verified = $userdetail->merchant_verified;
            $comment = $userdetail->comment;
            $lat = $userdetail->lat;
            $lon = $userdetail->lon;
            $plan_name = '';
            $plan_price = '0';
            $period = '';
            $verified_date = '';
            $expired_date = '';
            if ($userdetail->plan_id != 0 && $merchant_verified != 0) {
                $verified_date = $userdetail->verified_date;

                $plan = \DB::table('oollah_merchant_plans')->where('id', $userdetail->plan_id)->first();
                if (!empty($plan)) {
                    $plan_name = $plan->name;
                    $plan_price = $plan->price;
                    $period = $plan->expired;
                    $unit = $plan->planunit;
                    if ($unit == 'months') {
                        $expired_date = date('Y-m-d', strtotime($verified_date . ' ' . $period . ' months'));
                    } else {
                        $expired_date = date('Y-m-d', strtotime($verified_date . ' ' . $period . ' years'));
                    }
                    $period = $period . ' ' . $unit;
                }
            }
            $usertable = array();
            $usertable['id'] = $userid;
            $usertable['first_name'] = $first_name;
            $usertable['last_name'] = $last_name;
            $usertable['email'] = $email;
            $usertable['phone'] = $phone;
            $usertable['city'] = $city;
            $usertable['merchant_verified'] = $merchant_verified;
            $usertable['comment'] = $comment;
            $usertable['lat'] = $lat;
            $usertable['lon'] = $lon;
            $merchanttable = array();
            $merchanttable['verified_date'] = $verified_date;
            $merchanttable['plan_id'] = $userdetail->plan_id;
            $merchanttable['plan_name'] = $plan_name;
            $merchanttable['plan_price'] = $plan_price;
            $merchanttable['expired_date'] = $expired_date;
            $merchanttable['period'] = $period;
        }

        $cat = array('status_code'=>'200', 'data'=>'Successfully updated. Please wait the admin\'s verification.', 'user'=>$usertable, 'merchant'=>$merchanttable);
        return response()->json($cat);
    }
    public function getplans(Request $request)
    {
        $categories = \DB::table('oollah_merchant_plans')->where('status', 0)->select(['id', 'name', 'expired', 'planunit', 'price'])->where('status', 0)->orderby('id', 'desc')->get();
        $cat = array('status_code'=>'200', 'data'=>$categories);
        return response()->json($cat);
    }
    public function userprofile($userid = 0, Request $request){
        $user = \DB::table('users')->where('userno', $userid)
            ->join('oollah_user_details as ud', 'users.userno', '=', 'ud.user_id')
            ->select(['users.*', 'ud.merchant_verified', 'ud.plan_id', 'ud.verified_date', 'ud.comment', 'ud.lat', 'ud.lon'])
            ->first();
        $plan_id = $user->plan_id;
        $plan = \DB::table('oollah_merchant_plans')->where('id', $plan_id)->first();
        $data = array('user'=>$user, 'plan'=>$plan);
        $cat = array('status_code'=>'200', 'data'=>$data);
        return response()->json($cat);
    }

}