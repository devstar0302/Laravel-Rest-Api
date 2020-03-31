<?php

namespace App\Http\Controllers;

use App\City;
use App\Http\Requests;
use Illuminate\Http\Request;
use Datatables;
use DB;
use App\Http\Controllers\sweetAlert;
use App\News;
use App\NewsComment;
use App\NewsFavorite;
use App\UserBook;
use App\UserChat;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */

    public function getNewslist()
    {
        return View('admin/news/news');
    }

    public function getData()
    {
        $tables = News::select(['role_users.role_id', 'users.username as username', DB::raw('count("oollah_news_comments.id") as comment_num'), 'oollah_news.id', 'oollah_news.user_id', 'oollah_news.likenum', 'oollah_news.dislikenum', 'oollah_news.title', 'oollah_news.description', 'oollah_news.photo',  'oollah_news.status',  'oollah_news.created_at'])
            ->leftJoin('users', 'users.id', '=', 'oollah_news.user_id')
            ->leftJoin('role_users', 'users.id', '=', 'role_users.user_id')
            ->leftJoin('oollah_news_comments', 'oollah_news_comments.news_id', '=', 'oollah_news.id')
            ->orderby('oollah_news.id', 'asc');

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
            ->edit_column('photo', function ($data) {
                $url = '/uploads/files/newitems/noimage.png';
                if($data->photo != ''){
                    $url = '/uploads/files/newitems/'.$data->photo;
                }
                return '<img src="'.$url.'" style="width:50px;height:auto;max-height:50px">';
            })
            ->edit_column('description', function ($data) {
                return '<span style="height:50px">'.$data->description.'</span>';
            })
            ->edit_column('username', function ($data) {
                $url = '';
                if($data->role_id == 3){
                    $url = url('/admin/merchant/'.$data->user_id);
                }else if($data->role_id == 4){
                    $url = url('/admin/users/'.$data->user_id);
                }
                return '<a href="'.$url.'">'.$data->username.'</a>';
            })
            ->edit_column('comment_num', function ($data) {

                return '<a href='. url('/admin/comments/'.$data->id) .' >'.$data->comment_num.'</a>';
            })
            ->add_column('delete', function ($data) {

                return '<a href='. url('/admin/news/'.$data->id.'/show') .' ><i class="livicon" data-name = "info" data-size = "18" data-loop = "true" data-c = "#428BCA" data-hc = "#428BCA" title = "view advertise" ></i ></a >&nbsp;&nbsp;&nbsp; <a class="delete" href = "javascript:;" ><i class="livicon" data-name = "trash" data-size = "18" data-loop = "true" data-c = "#f56954" data-hc = "#f56954" title = "inactive news" ></i ></a > ';
            })
            ->make(true);
    }
    public function getUserNewsData($user_id = 0)
    {
        $tables = News::select(['role_users.role_id', 'users.username as username', DB::raw('count("oollah_news_comments.id") as comment_num'), 'oollah_news.id', 'oollah_news.user_id', 'oollah_news.likenum', 'oollah_news.dislikenum', 'oollah_news.title', 'oollah_news.description', 'oollah_news.photo',  'oollah_news.status',  'oollah_news.created_at'])
            ->leftJoin('users', 'users.id', '=', 'oollah_news.user_id')
            ->leftJoin('role_users', 'users.id', '=', 'role_users.user_id')
            ->leftJoin('oollah_news_comments', 'oollah_news_comments.news_id', '=', 'oollah_news.id')
            ->where('oollah_news.user_id', $user_id)
            ->orderby('oollah_news.id', 'asc');

        return Datatables::of($tables)
            ->edit_column('status', function ($data) {
                if ($data->status == 1) {
                    $status = 'active';
                    return '<a style="color: #ca0002" class="active" href="javascript:;">' . $status . '</a>';
                    //return '<a onmouseover="this.style.color=\'#0618d8\" onMouseOut="this.style.color=\'#d80b06\'"> '. $status .'</span>';
                } else {
                    $status = 'inactive';
                    return '<a class="inactive" href="javascript:;">' . $status . '</a>';
                    //return '<a onmouseover="this.style.color=\'#0618d8\'" onMouseOut="this.style.color=\'#d80b06\'" class="active" href="javascript:;">' . $status . '</a>';
                }
            })
            ->edit_column('photo', function ($data) {
                $url = '/uploads/files/newitems/noimage.png';
                if($data->photo != ''){
                    $url = '/uploads/files/newitems/'.$data->photo;
                }
                return '<img src="'.$url.'" style="width:50px;height:auto;max-height:50px">';
            })
            ->edit_column('description', function ($data) {
                return '<span style="height:50px">'.$data->description.'</span>';
            })
            ->edit_column('username', function ($data) {
                $url = '';
                if($data->role_id == 3){
                    $url = url('/admin/masters/'.$data->user_id);
                }else if($data->role_id == 4){
                    $url = url('/admin/customers/'.$data->user_id);
                }
                return '<a href="'.$url.'">'.$data->username.'</a>';
            })
            ->edit_column('comment_num', function ($data) {

                return '<a href='. url('/admin/comments/'.$data->id) .' >'.$data->comment_num.'</a>';
            })
            ->add_column('delete', function ($data) {

                return '<a href='. url('/admin/news/'.$data->id.'/show') .' ><i class="livicon" data-name = "info" data-size = "18" data-loop = "true" data-c = "#428BCA" data-hc = "#428BCA" title = "view advertise" ></i ></a >&nbsp;&nbsp;&nbsp; <a class="delete" href = ""  data-toggle="modal" data-target="#deleteModal" onclick="deleteItem('.$data->id.')"><i class="livicon" data-name = "trash" data-size = "18" data-loop = "true" data-c = "#f56954" data-hc = "#f56954" title = "inactive news" ></i ></a > ';
            })
            ->make(true);
    }
    public function getCommentslist($news_id = 0)
    {
        return View('admin/news/comments', compact('news_id'));
    }
    public function getCommentsData($news_id = 0)
    {
        if($news_id == 0) {
            $tables = NewsComment::select(['role_users.role_id', 'oollah_news_comments.id', 'oollah_news_comments.news_id', 'oollah_news.title', 'oollah_news_comments.comment', 'oollah_news_comments.user_id', 'oollah_news_comments.created_at', 'users.username', 'users.pic as user_photo'])
                ->leftJoin('users', 'users.id', '=', 'oollah_news_comments.user_id')
                ->leftJoin('role_users', 'users.id', '=', 'role_users.user_id')
                ->leftJoin('oollah_news', 'oollah_news.id', '=', 'oollah_news_comments.news_id')
                ->orderby('oollah_news_comments.id', 'desc');
        }else{
            $tables = NewsComment::select(['role_users.role_id', 'oollah_news_comments.id', 'oollah_news_comments.news_id', 'oollah_news.title', 'oollah_news_comments.comment', 'oollah_news_comments.user_id', 'oollah_news_comments.created_at', 'users.username', 'users.pic as user_photo'])
                ->leftJoin('users', 'users.id', '=', 'oollah_news_comments.user_id')
                ->leftJoin('role_users', 'users.id', '=', 'role_users.user_id')
                ->leftJoin('oollah_news', 'oollah_news.id', '=', 'oollah_news_comments.news_id')
                ->where('oollah_news_comments.news_id', $news_id)
                ->orderby('oollah_news_comments.id', 'desc');
        }

        return Datatables::of($tables)

            ->edit_column('username', function ($data) {
                $url = '';
                if($data->role_id == 3){
                    $url = url('/admin/masters/'.$data->user_id);
                }else if($data->role_id == 4){
                    $url = url('/admin/customers/'.$data->user_id);
                }
                return '<a href="'.$url.'">'.$data->username.'</a>';
            })
            ->edit_column('title', function ($data) {
                $url = url('/admin/news/'.$data->news_id.'/show');
                return '<a href="'.$url.'">'.$data->title.'</a>';
            })
            ->edit_column('comment', function ($data) {

                return $data->comment;
            })
            ->add_column('delete', function ($data) {

                return '<a class="delete" href = "javascript:;" ><i class="livicon" data-name = "trash" data-size = "18" data-loop = "true" data-c = "#f56954" data-hc = "#f56954" title = "delete comment" ></i ></a > ';
            })
            ->make(true);
    }
    public function getUsersCommentsData($user_id = 0)
    {
        $tables = NewsComment::select(['role_users.role_id', 'oollah_news_comments.id', 'oollah_news_comments.news_id', 'oollah_news.title', 'oollah_news_comments.comment', 'oollah_news_comments.user_id', 'oollah_news_comments.created_at', 'users.username', 'users.pic as user_photo'])
            ->leftJoin('users', 'users.id', '=', 'oollah_news_comments.user_id')
            ->leftJoin('role_users', 'users.id', '=', 'role_users.user_id')
            ->leftJoin('oollah_news', 'oollah_news.id', '=', 'oollah_news_comments.news_id')
            ->where('oollah_news_comments.user_id', $user_id)
            ->orderby('oollah_news_comments.id', 'desc');

        return Datatables::of($tables)

            ->edit_column('title', function ($data) {
                $url = url('/admin/news/'.$data->news_id.'/show');
                return '<a href="'.$url.'">'.$data->title.'</a>';
            })
            ->edit_column('comment', function ($data) {

                return $data->comment;
            })
            ->add_column('delete', function ($data) {

                return '<a class="delete" href = ""  data-toggle="modal" data-target="#deleteCommentModal" onclick="deleteCommentItem('.$data->id.')"><i class="livicon" data-name = "trash" data-size = "18" data-loop = "true" data-c = "#f56954" data-hc = "#f56954" title = "delete comment" ></i ></a > ';
            })
            ->make(true);
    }

    public function deleteData($id)
    {

        DB::table('oollah_news')->where('id', $id)->delete();

    }
    public function deleteCommentsData($id)
    {

        DB::table('oollah_news_comments')->where('id', $id)->delete();

    }
    public function showData($id)
    {

        $news = News::select(['role_users.role_id', 'users.pic as user_photo', 'users.username as username', DB::raw('count("oollah_news_comments.id") as comment_num'), 'oollah_news.likenum', 'oollah_news.dislikenum', 'oollah_news.id', 'oollah_news.user_id', 'oollah_news.title', 'oollah_news.description', 'oollah_news.photo',  'oollah_news.status',  'oollah_news.created_at'])
            ->leftJoin('users', 'users.id', '=', 'oollah_news.user_id')
            ->leftJoin('role_users', 'users.id', '=', 'role_users.user_id')
            ->leftJoin('oollah_news_comments', 'oollah_news_comments.news_id', '=', 'oollah_news.id')
            ->orderby('oollah_news.id', 'asc')->where('oollah_news.id', $id)->first();
        $comments = NewsComment::select(['oollah_news_comments.id as comment_id', 'oollah_news_comments.comment', 'oollah_news_comments.user_id', 'oollah_news_comments.created_at', 'users.username', 'users.pic as user_photo'])
            ->leftJoin('users', 'users.id', '=', 'oollah_news_comments.user_id')
            ->where('news_id', $id)->get();
        return View('admin/news/show', compact('news', 'comments'));
    }

    public function activeData($id = 0)
    {
        DB::table('oollah_news')->where('id', $id)->update(['status'=>0]);
        $data = array("status"=>0);
        return $data;
    }

    public function inactiveData($id = 0)
    {
        DB::table('oollah_news')->where('id', $id)->update(['status'=>1]);
        $data = array("status"=>1);
        return $data;
    }
    public function getUsersBookData($user_id = 0)
    {
        $tables = UserBook::select(['role_users.role_id', 'oollah_user_books.id', 'oollah_user_books.book_user_id', 'oollah_user_details.vip_id', 'oollah_user_books.created_at', 'users.username', 'users.pic as user_photo'])
            ->leftJoin('users', 'users.id', '=', 'oollah_user_books.book_user_id')
            ->leftJoin('oollah_user_details', 'oollah_user_details.user_id', '=', 'oollah_user_books.book_user_id')
            ->leftJoin('role_users', 'role_users.user_id', '=', 'oollah_user_books.book_user_id')
            ->where('oollah_user_books.user_id', $user_id)
            ->orderby('oollah_user_books.id', 'desc');

        return Datatables::of($tables)
            ->edit_column('username', function ($data) {
                $url = '';
                if($data->role_id == 3){
                    $url = url('/admin/masters/'.$data->book_user_id);
                }else if($data->role_id == 4){
                    $url = url('/admin/customers/'.$data->book_user_id);
                }
                return '<a href="'.$url.'">'.$data->username.'</a>';
            })
            ->edit_column('user_photo', function ($data) {
                $url = '/uploads/users/noimage.png';
                if($data->user_photo != ''){
                    $url = '/uploads/users/'.$data->user_photo;
                }
                return '<img src="'.$url.'" style="border-radius:50%;width:30px;height:30px;">';
            })
            ->add_column('user_info', function ($data) {
                $url = '';
                $vip_name = '';
                $dancer = '';
                $detail = DB::table('oollah_vips')->where('id', $data->vip_id)->first();
                if(!empty($detail)) $vip_name = '<span style="padding:3px 5px;background:#999;margin-right:10px;">'.$detail->name.'</span>';
                if($data->role_id == 3){
                    $masters = DB::table('oollah_user_masters')->where('user_id', $data->book_user_id)->where('status', 0)->get();

                    $url = '/uploads/categories/';
                    foreach($masters as $master){
                        $subcat = DB::table('oollah_subcategory')->where('cat_id', $master->cat_id)->where('id', $master->subcat_id)->first();
                        if(!empty($subcat)){
                            $p = $subcat->icon;
                            if($dancer == '') $dancer = '<img src="'.$url.''.$p.'" style="border-radius:50%;width:30px;height:30px;margin-right:10px;">';
                            else  $dancer .= '<img src="'.$url.''.$p.'" style="border-radius:50%;width:30px;height:30px;margin-right:10px;">';

                        }
                    }
                }

                return $vip_name.' '.$dancer;
            })
            ->add_column('delete', function ($data) {

                return '<a class="delete" href = ""  data-toggle="modal" data-target="#deleteBookModal" onclick="deleteBookItem('.$data->id.')"><i class="livicon" data-name = "trash" data-size = "18" data-loop = "true" data-c = "#f56954" data-hc = "#f56954" title = "delete book contact" ></i ></a > ';
            })
            ->make(true);
    }
    public function deleteBookData($id)
    {

        DB::table('oollah_user_books')->where('id', $id)->delete();

    }
    public function getUsersChatData($user_id = 0)
    {
        $tables = UserChat::select(['role_users.role_id', 'oollah_user_chats.id', 'oollah_user_chats.chat_user_id', 'oollah_user_details.vip_id', 'oollah_user_chats.created_at', 'users.username', 'users.pic as user_photo'])
            ->leftJoin('users', 'users.id', '=', 'oollah_user_chats.chat_user_id')
            ->leftJoin('oollah_user_details', 'oollah_user_details.user_id', '=', 'oollah_user_chats.chat_user_id')
            ->leftJoin('role_users', 'role_users.user_id', '=', 'oollah_user_chats.chat_user_id')
            ->where('oollah_user_chats.user_id', $user_id)
            ->orderby('oollah_user_chats.id', 'desc');

        return Datatables::of($tables)
            ->edit_column('username', function ($data) {
                $url = '';
                if($data->role_id == 3){
                    $url = url('/admin/masters/'.$data->chat_user_id);
                }else if($data->role_id == 4){
                    $url = url('/admin/customers/'.$data->chat_user_id);
                }
                return '<a href="'.$url.'">'.$data->username.'</a>';
            })
            ->edit_column('user_photo', function ($data) {
                $url = '/uploads/users/noimage.png';
                if($data->user_photo != ''){
                    $url = '/uploads/users/'.$data->user_photo;
                }
                return '<img src="'.$url.'" style="border-radius:50%;width:30px;height:30px;">';
            })
            ->add_column('user_info', function ($data) {
                $url = '';
                $vip_name = '';
                $dancer = '';
                $detail = DB::table('oollah_vips')->where('id', $data->vip_id)->first();
                if(!empty($detail)) $vip_name = '<span style="padding:3px 5px;background:#999;margin-right:10px;">'.$detail->name.'</span>';
                if($data->role_id == 3){
                    $masters = DB::table('oollah_user_masters')->where('user_id', $data->chat_user_id)->where('status', 0)->get();

                    $url = '/uploads/categories/';
                    foreach($masters as $master){
                        $subcat = DB::table('oollah_subcategory')->where('cat_id', $master->cat_id)->where('id', $master->subcat_id)->first();
                        if(!empty($subcat)){
                            $p = $subcat->icon;
                            if($dancer == '') $dancer = '<img src="'.$url.''.$p.'" style="border-radius:50%;width:30px;height:30px;margin-right:10px;">';
                            else  $dancer .= '<img src="'.$url.''.$p.'" style="border-radius:50%;width:30px;height:30px;margin-right:10px;">';

                        }
                    }
                }

                return $vip_name.' '.$dancer;
            })
            ->add_column('delete', function ($data) {

                return '<a class="delete" href = ""  data-toggle="modal" data-target="#deleteChatModal" onclick="deleteChatItem('.$data->id.')"><i class="livicon" data-name = "trash" data-size = "18" data-loop = "true" data-c = "#f56954" data-hc = "#f56954" title = "delete book contact" ></i ></a > ';
            })
            ->make(true);
    }
    public function deleteChatData($id)
    {

        DB::table('oollah_user_chats')->where('id', $id)->delete();

    }
}

