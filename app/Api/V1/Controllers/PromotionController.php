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
use App\Promotion;
use File;

class PromotionController extends Controller
{
    use Helpers;

    public function addPromotion(Request $request)
    {
        $credentials = $request->only(
            'token', 'userid', 'catid', 'title', 'description', 'starttime', 'endtime', 'claimnum', 'price', 'discountprice', 'lat', 'lon', 'address', 'region', 'qrcode', 'type', 'photos'
        );

        $validator = Validator::make($credentials, [
            'token' => 'required',
            'userid' => 'required',
            'catid' => 'required',
            'title' => 'required',
            'description' => 'required',
            'starttime' => 'required',
            'endtime' => 'required',
            'claimnum' => 'required',
            'price' => 'required',
            'discountprice' => 'required',
            'lat' => 'required',
            'lon' => 'required',
            'address' => 'required',
            'region' => 'required',
            'type' => 'required',
            'photos' => 'required',
        ]);

        if($validator->fails()) {
            throw new ValidationHttpException($validator->errors()->all());
        }
        $userid = $request->get('userid', '');
        $title = $request->get('title', '');
        $description = $request->get('description', '');
        $qrcode = '';
        if ($file = $request->file('qrcode')) {
            $fileName = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension() ?: 'png';
            $folderName = '/uploads/qrcodes';
            $destinationPath = public_path() . $folderName;
            $qrcode = str_random(10) . '.' . $extension;
            $file->move($destinationPath, $qrcode);
        }
        $code = mt_rand(100000, 999999);
        $promotion = new Promotion();
        $promotion->cat_id = $request->get('catid');
        $promotion->merchant_id = $request->get('userid');
        $promotion->code = $code;
        $promotion->title = $request->get('title');
        $promotion->description = $request->get('description');
        $promotion->start_time = $request->get('starttime');
        $promotion->end_time = $request->get('endtime');
        $promotion->claimnum = $request->get('claimnum');
        $promotion->price = $request->get('price');
        $promotion->discount_price = $request->get('discountprice');
        $promotion->lat = $request->get('lat');
        $promotion->lon = $request->get('lon');
        $promotion->address = $request->get('address');
        $promotion->region = $request->get('region');
        $promotion->type = $request->get('type');
        $promotion->qrcode = $request->get('$qrcode');
        $promotion->save();

        if ($request->hasFile('photos')) {
            $files = $request->file('photos');
            $product = '';
            foreach($files as $file) {
                $fileName = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension() ?: 'png';
                $folderName = '/uploads/products';
                $destinationPath = public_path() . $folderName;
                $product = str_random(10) . '.' . $extension;
                $file->move($destinationPath, $product);
                \DB::table('oollah_promotion_photos')->where('promotion_id', $promotion->id)->insert(['photo'=>$product]);
            }
        }
        $cat = array('status_code'=>'200', 'data'=>'Successfully added');
        return response()->json($cat);
    }
    public function updatePromotion(Request $request)
    {
        $credentials = $request->only(
            'token', 'promotionid', 'userid', 'catid', 'title', 'description', 'starttime', 'endtime', 'claimnum', 'price', 'discountprice', 'lat', 'lon', 'address', 'region', 'qrcode', 'type', 'photos', 'deletephotos'
        );

        $validator = Validator::make($credentials, [
            'token' => 'required',
            'promotionid' => 'required',
            'userid' => 'required',
            'catid' => 'required',
            'title' => 'required',
            'description' => 'required',
            'starttime' => 'required',
            'endtime' => 'required',
            'claimnum' => 'required',
            'price' => 'required',
            'discountprice' => 'required',
            'lat' => 'required',
            'lon' => 'required',
            'address' => 'required',
            'region' => 'required',
            'type' => 'required',
            'photos' => 'required',
        ]);

        if($validator->fails()) {
            throw new ValidationHttpException($validator->errors()->all());
        }
        $userid = $request->get('userid', '');
        $title = $request->get('title', '');
        $description = $request->get('description', '');
        $qrcode = '';
        if ($file = $request->file('qrcode')) {
            $fileName = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension() ?: 'png';
            $folderName = '/uploads/qrcodes';
            $destinationPath = public_path() . $folderName;
            $qrcode = str_random(10) . '.' . $extension;
            $file->move($destinationPath, $qrcode);
        }
        $promotion = Promotion::find($request->get('promotionid'));
        $promotion->cat_id = $request->get('catid');
        $promotion->merchant_id = $request->get('userid');
        $promotion->title = $request->get('title');
        $promotion->description = $request->get('description');
        $promotion->start_time = $request->get('starttime');
        $promotion->end_time = $request->get('endtime');
        $promotion->claimnum = $request->get('claimnum');
        $promotion->price = $request->get('price');
        $promotion->discount_price = $request->get('discountprice');
        $promotion->lat = $request->get('lat');
        $promotion->lon = $request->get('lon');
        $promotion->address = $request->get('address');
        $promotion->region = $request->get('region');
        $promotion->type = $request->get('type');
        $promotion->qrcode = $request->get('$qrcode');
        $promotion->save();
        if(!empty($request->get('deletephotos'))){
            $deletephoto1 = \GuzzleHttp\json_decode($request->get('deletephotos'));
            $folderName = '/uploads/products';
            for($i = 0; $i < count($deletephoto1); $i++){
                if(File::exists(public_path().$folderName.$deletephoto1[$i])){
                    File::delete(public_path().$folderName.$deletephoto1[$i]);
                }
            }
        }
        if ($request->hasFile('photos')) {
            $files = $request->file('photos');
            $product = '';
            foreach($files as $file) {
                $fileName = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension() ?: 'png';
                $folderName = '/uploads/products';
                $destinationPath = public_path() . $folderName;
                $product = str_random(10) . '.' . $extension;
                $file->move($destinationPath, $product);
                \DB::table('oollah_promotion_photos')->where('promotion_id', $promotion->id)->insert(['photo'=>$product]);
            }
        }
        $cat = array('status_code'=>'200', 'data'=>'Successfully updated');
        return response()->json($cat);
    }
    public function deletePromotion($promotionid = 0, Request $request)
    {
        \DB::table('oollah_promotions')->where('id', $promotionid)->delete();
        \DB::table('oollah_promotion_photos')->where('promotion_id', $promotionid)->delete();
        \DB::table('oollah_promotion_claimed')->where('promotion_id', $promotionid)->delete();
        \DB::table('oollah_promotion_favorites')->where('promotion_id', $promotionid)->delete();
        $cat = array('status_code'=>'200', 'data'=>'Successfully deleted');
        return response()->json($cat);
    }
    public function getMerchant($userno = '', Request $request)
    {
        $credentials = $request->only(
            'token', 'offset', 'limit', 'lat', 'lon'
        );

        $validator = Validator::make($credentials, [
            'token' => 'required',
            'offset' => 'required',
            'limit' => 'required'
        ]);
        //$distance = $this->distance(32.9697, -96.80322, 29.46786, -98.53506, "K");
        if($validator->fails()) {
            throw new ValidationHttpException($validator->errors()->all());
        }
        $cudate = date('Y-m-d');
        $cutime = strtotime($cudate);
        $offset = $request->get('offset');
        $limit = $request->get('limit', 10);
        $offset = $offset * $limit;
        $promotions = \DB::table('oollah_promotions')->where('merchant_id', $userno)->where('status', 0)->offset($offset)->limit($limit)->orderby('id', 'desc')->get();
        $data = array();
        foreach($promotions as $promotion){
            $photos = \DB::table('oollah_promotion_photos')->where('promotion_id', $promotion->id)->orderby('created_at', 'asc')->get();
            $photo = array();
            $i = 0;
            foreach($photos as $p){
                $photo[$i] = $p->photo;
                $i++;
            }
            $promo = array();
            $promo['id'] = $promotion->id;
            $promo['catid'] = $promotion->cat_id;
            $promo['merchantid'] = $promotion->merchant_id;
            $promo['code'] = $promotion->code;
            $promo['title'] = $promotion->title;
            $promo['description'] = $promotion->description;
            $promo['start_time'] = $promotion->start_time;
            $promo['end_time'] = $promotion->end_time;
            $endtime = strtotime($promotion->end_time);
            $promo['expiredflg'] = 0;
            if($endtime < $cutime){
                $promo['expiredflg'] = 1;
            }
            $promo['claimnum'] = $promotion->claimnum;
            $promo['claimednum'] = $promotion->claimednum;
            $promo['price'] = $promotion->price;
            $promo['discount_price'] = $promotion->discount_price;
            $promo['lat'] = $promotion->lat;
            $promo['lon'] = $promotion->lon;
            $promo['address'] = $promotion->address;
            $promo['region'] = $promotion->region;
            $promo['likenum'] = $promotion->likenum;
            $promo['likenum'] = $promotion->likenum;
            $promo['dislikenum'] = $promotion->dislikenum;
            $promo['favonum'] = $promotion->favonum;
            $promo['type'] = $promotion->type;
            $promo['created_at'] = $promotion->created_at;
            $promo['photos'] = $photo;
            $data[] = $promo;
        }

        $cat = array('status_code'=>'200', 'data'=>$data);
        return stripslashes(json_encode($cat, JSON_UNESCAPED_SLASHES));
    }
    public function getRecent(Request $request)
    {

        $credentials = $request->only(
            'token', 'offset', 'limit', 'lat', 'lon', 'radius'
        );

        $validator = Validator::make($credentials, [
            'token' => 'required',
            'offset' => 'required',
            'limit' => 'required',
            'lat' => 'required',
            'lon' => 'required',
            'radius' => 'required',
        ]);
        $catid = $request->get('catid', '0');
        $region = $request->get('region', '');
        $type = $request->get('type', '');
        $radius = $request->get('radius', '0');
        $lat = $request->get('lat', '0');
        $lon = $request->get('lon', '0');

        if($validator->fails()) {
            throw new ValidationHttpException($validator->errors()->all());
        }
        $offset = $request->get('offset');
        $limit = $request->get('limit', 10);
        $offset = $offset * $limit;
        $cudate = date('Y-m-d');
        $where = ' WHERE end_time >= '.$cudate.' AND status = 0';
        if($catid != '0') {
                $where .= ' AND cat_id = '.$catid;
        }
        if($type != ''){
                $where .= ' AND type = '.$type;
        }
        if($region != ''){
                $where .= ' AND region = '.$region;
        }
        $limitset = 'LIMIT '.$offset.' , '.$limit;
        //$promotions = $promotions->select(['*', '(3959 * acos (cos ( radians($lat) ) * cos( radians( lat ) ) * cos( radians( lng ) - radians($lon) ) + sin ( radians($lat) ) * sin( radians( lat ) ) ) ) AS distance'])->having('distance', '<=', $radius);
        //$promotions = $promotions->where('status', 0)->offset($offset)->limit($limit)->orderby('distance', 'asc')->get();
        $promotions = \DB::select('SELECT  *, (3959 * acos (cos ( radians('.$lat.') ) * cos( radians( lat ) ) * cos( radians( lon ) - radians('.$lon.') ) + sin ( radians('.$lat.') ) * sin( radians( lat ) ) )) AS distance FROM oollah_promotions'.$where.' HAVING distance < '.$radius.' ORDER BY distance '.$limitset.';');
        $data = array();
        foreach($promotions as $promotion){
            $photos = \DB::table('oollah_promotion_photos')->where('promotion_id', $promotion->id)->orderby('created_at', 'asc')->get();
            $photo = array();
            $i = 0;
            foreach($photos as $p){
                $photo[$i] = $p->photo;
                $i++;
            }
            $promo["id"] = $promotion->id;
            $promo['catid'] = $promotion->cat_id;
            $promo['merchantid'] = $promotion->merchant_id;
            $promo['code'] = $promotion->code;
            $promo['title'] = $promotion->title;
            $promo['description'] = $promotion->description;
            $promo['start_time'] = $promotion->start_time;
            $promo['end_time'] = $promotion->end_time;
            $promo['claimnum'] = $promotion->claimnum;
            $promo['claimednum'] = $promotion->claimednum;
            $promo['featured'] = $promotion->featured;
            $promo['price'] = $promotion->price;
            $promo['discount_price'] = $promotion->discount_price;
            $promo['lat'] = $promotion->lat;
            $promo['lon'] = $promotion->lon;
            $promo['address'] = $promotion->address;
            $promo['region'] = $promotion->region;
            $promo['likenum'] = $promotion->likenum;
            $promo['dislikenum'] = $promotion->dislikenum;
            $promo['favonum'] = $promotion->favonum;
            $promo['type'] = $promotion->type;
            $promo['created_at'] = $promotion->created_at;
            $promo['photos'] = $photo;
            $distance = $this->distance($lat, $lon, $promotion->lat, $promotion->lon, "K");//(3959 * acos (cos ( radians($lat) ) * cos( radians( $promotion->lat ) ) * cos( radians( $promotion->lon ) - radians($lon) ) + sin ( radians($lat) ) * sin( radians(  $promotion->lon ) ) ));
            $distance = round($distance, 1);
            $promo['distance'] = $distance;
            //$promo = array('id'=>$promotion->id, 'catid'=>$promotion->cat_id, 'merchantid'=>$promotion->merchant_id, 'title'=> $promotion->title, 'description'=>$promotion->description, 'start_time'=>$promotion->start_time, 'end_time'=>$promotion->end_time, 'claimnum'=>$promotion->claimnum, 'claimednum'=>$promotion->claimednum, 'featured'=>$promotion->featured, 'price'=>$promotion->price, 'discount_price'=>$promotion->discount_price, 'lat'=>$promotion->lat, 'lon'=>$promotion->lon, 'address'=>$promotion->address, 'region'=>$promotion->region, 'likenum'=>$promotion->likenum, 'dislikenum'=>$promotion->dislikenum, 'favonum'=> $promotion->favonum, 'type'=> $promotion->type, 'created_at'=>$promotion->created_at, 'photos'=>json_encode($photo), 'distance'=>$distance);
            $data[] = $promo;
        }

        $cat = array('status_code'=>'200', 'data'=>$data);
        return stripslashes(json_encode($cat, JSON_UNESCAPED_SLASHES));
    }
    public function getSearch(Request $request)
    {
        $credentials = $request->only(
            'token', 'offset', 'limit', 'searchtext', 'lat', 'lon'
        );

        $validator = Validator::make($credentials, [
            'token' => 'required',
            'offset' => 'required',
            'limit' => 'required',
            'searchtext' => 'required',
            'lat' => 'required',
            'lon' => 'required',
            'radius' => 'required',
        ]);
        $catid = $request->get('catid', '0');
        $region = $request->get('region', '');
        $type = $request->get('type', '');
        $radius = $request->get('radius', '0');
        $lat = $request->get('lat', '0');
        $lon = $request->get('lon', '0');
        $searchtext = $request->get('searchtext', '');

        if($validator->fails()) {
            throw new ValidationHttpException($validator->errors()->all());
        }
        $offset = $request->get('offset');
        $limit = $request->get('limit', 10);
        $offset = $offset * $limit;
        $cudate = date('Y-m-d');
        $where = ' WHERE end_time >= '.$cudate.' AND status = 0';
        if($catid != '0') {
            $where .= ' AND cat_id = '.$catid;
        }
        if($type != ''){
            $where .= ' AND type = '.$type;
        }
        if($region != ''){
            $where .= ' AND region = '.$region;
        }

        if($searchtext != ""){
            $where .= ' AND (';
            $where .= 'type like %'.$searchtext.'%';
            $where .= ' OR region like %'.$searchtext.'%';
            $where .= ' OR title like %'.$searchtext.'%';
            $where .= ' OR description like %'.$searchtext.'%';
            $where .= ' OR address like %'.$searchtext.'%';
            $where .= ' OR price like %'.$searchtext.'%';
            $where .= ' OR discount_price like %'.$searchtext.'%';
            $where .= ' OR claimnum like %'.$searchtext.'%';
            $where .= ' OR start_time like %'.$searchtext.'%';
            $where .= ' OR end_time like %'.$searchtext.'%';
            $where .= ')';
        }

        $limitset = 'LIMIT '.$offset.' , '.$limit;
        //$promotions = $promotions->select(['*', '(3959 * acos (cos ( radians($lat) ) * cos( radians( lat ) ) * cos( radians( lng ) - radians($lon) ) + sin ( radians($lat) ) * sin( radians( lat ) ) ) ) AS distance'])->having('distance', '<=', $radius);
        //$promotions = $promotions->where('status', 0)->offset($offset)->limit($limit)->orderby('distance', 'asc')->get();
        $promotions = \DB::select('SELECT  *, (3959 * acos (cos ( radians('.$lat.') ) * cos( radians( lat ) ) * cos( radians( lon ) - radians('.$lon.') ) + sin ( radians('.$lat.') ) * sin( radians( lat ) ) )) AS distance FROM oollah_promotions'.$where.' HAVING distance < '.$radius.' ORDER BY distance '.$limitset.';');



       /* $offset = $request->get('offset');
        $limit = $request->get('limit', 10);
        $offset = $offset * $limit;
        $promotions = \DB::table('oollah_promotions')
            ->where(function($query) use($searchtext){
                $query->where('type', 'like', '%'.$searchtext.'%');
                $query->orWhere('region', 'like', '%'.$searchtext.'%');
                $query->orWhere('title', 'like', '%'.$searchtext.'%');
                $query->orWhere('description', 'like', '%'.$searchtext.'%');
                $query->orWhere('address', 'like', '%'.$searchtext.'%');
                $query->orWhere('price', 'like', '%'.$searchtext.'%');
                $query->orWhere('discount_price', 'like', '%'.$searchtext.'%');
                $query->orWhere('claimnum', 'like', '%'.$searchtext.'%');
                $query->orWhere('start_time', 'like', '%'.$searchtext.'%');
                $query->orWhere('end_time', 'like', '%'.$searchtext.'%');
            })
            ->where('status', 0)->offset($offset)->limit($limit)->orderby('created_at', 'desc')->get();*/

        $data = array();
        foreach($promotions as $promotion){
            $photos = \DB::table('oollah_promotion_photos')->where('promotion_id', $promotion->id)->orderby('created_at', 'asc')->get();
            $photo = array();
            $i = 0;
            foreach($photos as $p){
                $photo[$i] = $p->photo;
                $i++;
            }
            $promo = array();
            $promo['id'] = $promotion->id;
            $promo['catid'] = $promotion->cat_id;
            $promo['merchantid'] = $promotion->merchant_id;
            $promo['code'] = $promotion->code;
            $promo['title'] = $promotion->title;
            $promo['description'] = $promotion->description;
            $promo['start_time'] = $promotion->start_time;
            $promo['end_time'] = $promotion->end_time;
            $promo['claimnum'] = $promotion->claimnum;
            $promo['claimednum'] = $promotion->claimednum;
            $promo['price'] = $promotion->price;
            $promo['discount_price'] = $promotion->discount_price;
            $promo['lat'] = $promotion->lat;
            $promo['lon'] = $promotion->lon;
            $promo['address'] = $promotion->address;
            $promo['region'] = $promotion->region;
            $promo['likenum'] = $promotion->likenum;
            $promo['likenum'] = $promotion->likenum;
            $promo['dislikenum'] = $promotion->dislikenum;
            $promo['favonum'] = $promotion->favonum;
            $promo['type'] = $promotion->type;
            $promo['created_at'] = $promotion->created_at;
            $promo['photos'] = $photo;
            $data[] = $promo;
        }

        $cat = array('status_code'=>'200', 'data'=>$data);
        return stripslashes(json_encode($cat, JSON_UNESCAPED_SLASHES));
    }
    public function getItem($promotionid = 0, Request $request)
    {
        $promotion = \DB::table('oollah_promotions')->where('id', $promotionid)->where('status', 0)->orderby('created_at', 'desc')->first();
        $data = array();
            $photos = \DB::table('oollah_promotion_photos')->where('promotion_id', $promotion->id)->orderby('created_at', 'asc')->get();
            $photo = array();
            $i = 0;
            foreach($photos as $p){
                $photo[$i] = $p->photo;
                $i++;
            }
            $promo = array();
            $promo['id'] = $promotion->id;
            $promo['catid'] = $promotion->cat_id;
            $promo['merchantid'] = $promotion->merchant_id;
            $promo['code'] = $promotion->code;
            $promo['title'] = $promotion->title;
            $promo['description'] = $promotion->description;
            $promo['start_time'] = $promotion->start_time;
            $promo['end_time'] = $promotion->end_time;
            $promo['claimnum'] = $promotion->claimnum;
            $promo['claimednum'] = $promotion->claimednum;
            $promo['price'] = $promotion->price;
            $promo['discount_price'] = $promotion->discount_price;
            $promo['lat'] = $promotion->lat;
            $promo['lon'] = $promotion->lon;
            $promo['address'] = $promotion->address;
            $promo['region'] = $promotion->region;
            $promo['likenum'] = $promotion->likenum;
            $promo['likenum'] = $promotion->likenum;
            $promo['dislikenum'] = $promotion->dislikenum;
            $promo['favonum'] = $promotion->favonum;
            $promo['type'] = $promotion->type;
            $promo['created_at'] = $promotion->created_at;
            $promo['photos'] = $photo;

        $cat = array('status_code'=>'200', 'data'=>$promo);
        return stripslashes(json_encode($cat, JSON_UNESCAPED_SLASHES));
    }
    public function getClaimed($userno = 0, Request $request)
    {
        $credentials = $request->only(
            'token', 'offset', 'limit'
        );

        $validator = Validator::make($credentials, [
            'token' => 'required',
            'offset' => 'required',
            'limit' => 'required',
        ]);

        if($validator->fails()) {
            throw new ValidationHttpException($validator->errors()->all());
        }
        $offset = $request->get('offset');
        $limit = $request->get('limit', 10);
        $offset = $offset * $limit;
        $claimeds = \DB::table('oollah_promotion_claimed')->where('user_id', $userno)->where('status', 0)->where('verified', 1)->offset($offset)->limit($limit)->orderby('id', 'desc')->get();
        $data = array();
        foreach($claimeds as $claimed){
            $promotion = \DB::table('oollah_promotions')->where('id', $claimed->promotion_id)->where('status', 0)->orderby('created_at', 'desc')->first();
            $photos = \DB::table('oollah_promotion_photos')->where('promotion_id', $promotion->id)->orderby('created_at', 'asc')->get();
            $photo = array();
            $i = 0;
            foreach($photos as $p){
                $photo[$i] = $p->photo;
                $i++;
            }
            $promo = array();
            $promo['id'] = $promotion->id;
            $promo['catid'] = $promotion->cat_id;
            $promo['merchantid'] = $promotion->merchant_id;
            $promo['code'] = $promotion->code;
            $promo['title'] = $promotion->title;
            $promo['description'] = $promotion->description;
            $promo['start_time'] = $promotion->start_time;
            $promo['end_time'] = $promotion->end_time;
            $promo['claimnum'] = $promotion->claimnum;
            $promo['claimednum'] = $promotion->claimednum;
            $promo['price'] = $promotion->price;
            $promo['discount_price'] = $promotion->discount_price;
            $promo['lat'] = $promotion->lat;
            $promo['lon'] = $promotion->lon;
            $promo['address'] = $promotion->address;
            $promo['region'] = $promotion->region;
            $promo['likenum'] = $promotion->likenum;
            $promo['likenum'] = $promotion->likenum;
            $promo['dislikenum'] = $promotion->dislikenum;
            $promo['favonum'] = $promotion->favonum;
            $promo['type'] = $promotion->type;
            $promo['created_at'] = $promotion->created_at;
            $promo['photos'] = $photo;
            $data[] = $promo;
        }
        $cat = array('status_code'=>'200', 'data'=>$data);
        return stripslashes(json_encode($cat, JSON_UNESCAPED_SLASHES));
    }





    public function setlike($promotionid = 0, $userid = 0, Request $request)
    {
        $news = \DB::table('oollah_promotions')->where('status', 0)->where('id', $promotionid)->where('merchant_id', $userid)->first();
        if(!empty($news)){
            $likenum = $news->likenum+1;
            \DB::table('oollah_promotions')->where('status', 0)->where('id', $promotionid)->where('merchant_id', $userid)->update(['likenum'=>$likenum]);
        }
        $cat = array('status_code'=>'200', 'data'=>'Successfully liked');
        return response()->json($cat);
    }
    public function setdislike($promotionid = 0, $userid = 0, Request $request)
    {
        $news = \DB::table('oollah_promotions')->where('status', 0)->where('id', $promotionid)->where('merchant_id', $userid)->first();
        if(!empty($news)){
            $likenum = $news->likenum-1;
            \DB::table('oollah_promotions')->where('status', 0)->where('id', $promotionid)->where('merchant_id', $userid)->update(['likenum'=>$likenum]);
        }
        $cat = array('status_code'=>'200', 'data'=>'Successfully disliked');
        return response()->json($cat);
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
}