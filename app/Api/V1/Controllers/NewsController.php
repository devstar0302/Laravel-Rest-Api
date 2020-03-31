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

class NewsController extends Controller
{
    use Helpers;

    public function get($userno = '', Request $request)
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
        $categories = \DB::table('oollah_news')
            ->leftJoin('users', 'users.id', '=', 'oollah_news.user_id')
            ->select(['oollah_news.*', 'users.first_name', 'users.last_name'])->orderby('oollah_news.id', 'desc')
            ->where('oollah_news.user_id', $userno)->where('oollah_news.status', 0)->offset($offset)->limit($limit)->get();

        $cat = array('status_code'=>'200', 'data'=>$categories);
        return response()->json($cat);
    }
    public function getNews(Request $request)
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
        $categories = \DB::table('oollah_news')->where('status', 0)
            ->leftJoin('users', 'users.id', '=', 'oollah_news.user_id')
            ->select(['oollah_news.*', 'users.first_name', 'users.last_name'])->orderby('oollah_news.id', 'desc')->where('oollah_news.status', 0)->offset($offset)->limit($limit)->get();

        $cat = array('status_code'=>'200', 'data'=>$categories);
        return response()->json($cat);
    }
    public function getItem($newsid = 0, Request $request)
    {
        $news = \DB::table('oollah_news')->where('status', 0)->where('id', $newsid)->select(['title', 'description', 'photo', 'likenum', 'dislikenum', 'commentnum', 'created_at'])->first();
        $comments = \DB::table('oollah_news_comments as comment')
            ->leftJoin('users', 'users.id', '=', 'comment.user_id')
            ->select(['comment.id', 'comment.comment', 'comment.created_at', 'comment.user_id', 'users.first_name', 'users.last_name', 'users.pic as photo'])
            ->where('comment.status', 0)->where('comment.news_id', $newsid)->orderby('comment.created_at', 'desc')->get();
        $data = array('news'=>$news, 'comments'=>$comments);
        $cat = array('status_code'=>'200', 'data'=>$data);
        return response()->json($cat);
    }
    public function add(Request $request)
    {
        $credentials = $request->only(
            'token', 'userid', 'title', 'description', 'photo'
        );

        $validator = Validator::make($credentials, [
            'token' => 'required',
            'userid' => 'required',
            'title' => 'required',
            'description' => 'required',
            'photo' => 'required',
        ]);

        if($validator->fails()) {
            throw new ValidationHttpException($validator->errors()->all());
        }
        $userid = $request->get('userid', '');
        $title = $request->get('title', '');
        $description = $request->get('description', '');
        $safeName = '';
        if ($file = $request->file('photo')) {
            $fileName = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension() ?: 'png';
            $folderName = '/uploads/files/newitems';
            $destinationPath = public_path() . $folderName;
            $safeName = str_random(10) . '.' . $extension;
            $file->move($destinationPath, $safeName);
        }
        \DB::table('oollah_news')->insert(['user_id'=>$userid, 'title'=>$title, 'description'=>$description, 'photo'=>$safeName]);
        $cat = array('status_code'=>'200', 'data'=>'Successfully added');
        return response()->json($cat);
    }
    public function delete($newsid = 0, Request $request)
    {
        \DB::table('oollah_news')->where('status', 0)->where('id', $newsid)->delete();
        \DB::table('oollah_news_comments')->where('status', 0)->where('news_id', $newsid)->delete();
        $cat = array('status_code'=>'200', 'data'=>'Successfully deleted');
        return response()->json($cat);
    }
    public function newslike($newsid = 0, $userid = 0, Request $request)
    {
        $news = \DB::table('oollah_news')->where('status', 0)->where('id', $newsid)->first();
        if(!empty($news)){
            $likenum = $news->likenum+1;
            \DB::table('oollah_news')->where('status', 0)->where('id', $newsid)->update(['likenum'=>$likenum]);
        }
        $cat = array('status_code'=>'200', 'data'=>'Successfully liked');
        return response()->json($cat);
    }
    public function newsdislike($newsid = 0, $userid = 0, Request $request)
    {
        $news = \DB::table('oollah_news')->where('status', 0)->where('id', $newsid)->first();
        if(!empty($news)){
            $likenum = $news->likenum-1;
            \DB::table('oollah_news')->where('status', 0)->where('id', $newsid)->update(['likenum'=>$likenum]);
        }
        $cat = array('status_code'=>'200', 'data'=>'Successfully disliked');
        return response()->json($cat);
    }
    public function addComment(Request $request)
    {
        $credentials = $request->only(
            'token', 'userid', 'newsid', 'comment'
        );

        $validator = Validator::make($credentials, [
            'token' => 'required',
            'userid' => 'required',
            'newsid' => 'required',
            'comment' => 'required',
        ]);

        if($validator->fails()) {
            throw new ValidationHttpException($validator->errors()->all());
        }
        $userid = $request->get('userid', '');
        $newsid = $request->get('newsid', '');
        $comment = $request->get('comment', '');

        \DB::table('oollah_news_comments')->insert(['user_id'=>$userid, 'news_id'=>$newsid, 'comment'=>$comment]);
        $news = \DB::table('oollah_news')->where('id', $newsid)->first();
        $commentnum = 0;
        if(!empty($news)){
            $commentnum = $news->commentnum;
        }
        $commentnum++;
        \DB::table('oollah_news')->where('id', $newsid)->update(['commentnum'=>$commentnum]);
        $cat = array('status_code'=>'200', 'data'=>'Successfully added');
        return response()->json($cat);
    }
    public function deleteComment($commentid = 0, Request $request)
    {
        $comment = \DB::table('oollah_news_comments')->where('status', 0)->where('id', $commentid)->first();
        \DB::table('oollah_news_comments')->where('status', 0)->where('id', $commentid)->delete();
        $news = \DB::table('oollah_news')->where('id', $comment->news_id)->first();
        $commentnum = 0;
        if(!empty($news)){
            $commentnum = $news->commentnum;
        }
        $commentnum--;
        \DB::table('oollah_news')->where('id', $comment->news_id)->update(['commentnum'=>$commentnum]);
        $cat = array('status_code'=>'200', 'data'=>'Successfully deleted');
        return response()->json($cat);
    }
}