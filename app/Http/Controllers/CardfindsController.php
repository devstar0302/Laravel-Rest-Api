<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Requests;
use Illuminate\Http\Request;
use Datatables;
use DB;
use App\Http\Controllers\sweetAlert;
use App\Category;
use App\Advertise;
use App\Cardfinds;
use Illuminate\Support\Facades\Redirect;
use Validator;
use URL;
use Config;
use Sentinel;
use Hash;
class CardfindsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */


    public function getlist($type = 0, Request $request)
    {
        return View('admin/cardfinds/cardfinds', compact('type'));
    }
    public function getItem($type = 0, $id = 0){
        $advertise = Advertise::find($id);
        return json_encode($advertise);
    }
    public function getData($type = 0, Request $request)
    {
        if($type != 1)
            $tables = Cardfinds::where('status', 1)->orderby('id', 'desc');
        else
            $tables = Cardfinds::where('status', 0)->orderby('id', 'desc');

        return Datatables::of($tables)
            ->edit_column('business_address', function ($data) {
                $address = $data->business_country.' '.$data->business_state.' '.$data->business_city.' '.$data->business_address;

                return $address;
            })
            ->edit_column('open_hour_mon_fri_from', function ($data) {
                $mon = '';
                if($data->open_hour_mon_fri_from != '' && $data->open_hour_mon_fri_to != '')
                    $mon = $data->open_hour_mon_fri_from.' ~ '.$data->open_hour_mon_fri_to;

                return $mon;
            })
            ->edit_column('open_hour_sat_from', function ($data) {
                $mon = '';
                if($data->open_hour_sat_from != '' && $data->open_hour_sat_to != '')
                    $mon = $data->open_hour_sat_from.' ~ '.$data->open_hour_sat_to;

                return $mon;
            })
            ->edit_column('open_hour_sun_from', function ($data) {
                $mon = '';
                if($data->open_hour_sun_from != '' && $data->open_hour_sun_to != '')
                    $mon = $data->open_hour_sun_from.' ~ '.$data->open_hour_sun_to;

                return $mon;
            })
            ->edit_column('business_address', function ($data) {
                $address = $data->business_country.' '.$data->business_state.' '.$data->business_city.' '.$data->business_address;

                return $address;
            })
            ->edit_column('status', function ($data) {
                if ($data->status == 1) {
                    $status = config('Convert.active')[0];
                    return '<span style="color: #ca0002;cursor:pointer" class="active" data-toggle="modal" data-target="#activeModal" onclick="active_data1(\''.$data->id.'\')">' . $status . '</span>';
                    //return '<a onmouseover="this.style.color=\'#0618d8\" onMouseOut="this.style.color=\'#d80b06\'"> '. $status .'</span>';
                } else {
                    $status = config('Convert.inactive')[0];
                    return '<span class="inactive" style="color: #418bca;cursor:pointer" data-toggle="modal" data-target="#inactiveModal" onclick="inactive_data1(\''.$data->id.'\')">' . $status . '</span>';
                    //return '<a onmouseover="this.style.color=\'#0618d8\'" onMouseOut="this.style.color=\'#d80b06\'" class="active" href="javascript:;">' . $status . '</a>';
                }
            })
            ->edit_column('logo', function ($data) {
                $url = '/uploads/card_logo/nologo.jpg';
                if($data->logo != ''){
                    $url = '/uploads/card_logo/'.$data->logo;
                }
                return '<img src="'.$url.'" style="width:50px;height:auto;max-height:50px">';
            })
            ->add_column('actions',function($data) {
                $actions = '<a href='. url('/admin/cardfinds/'.$data->id.'/show') .' ><i class="livicon" data-name="info" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="view advertise"></i></a>&nbsp;&nbsp;&nbsp;';

                $role_id = DB::table('role_users')->where('user_id', Sentinel::getuser()->id)->first()->role_id;
                $privilege_w = explode(",", Sentinel::getuser()->privilege_w);
                if($role_id == 1 || in_array('cardfinds', $privilege_w)) {
                    $actions .= '<a href=' . url('/admin/cardfinds/' . $data->id . '/edit') . '><i class="livicon" data-name="edit" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="update Advertise"></i></a>&nbsp;&nbsp;&nbsp;';

//                    if ($data->status == 0) {
//                        $actions .= '<a href="" data-toggle="modal" data-target="#delete_confirm" onclick="deleteItem(' . $data->id . ')"><i class="livicon" data-name="trash" data-size="18" data-loop="true" data-c="#f56954" data-hc="#f56954" title="inactive advertise"></i></a>';
//                    }
                }
                return $actions;
            })
            ->make(true);
    }

    public function updateData($id = 0, Request $request)
    {
        $rules = array(
            'business_name' => 'required',
            'business_address' => 'required',
            'business_city' => 'required',
            'business_state' => 'required',
            'business_country' => 'required',
            'business_lat' => 'required',
            'business_lon' => 'required',
            'business_phone_number' => 'required',
            'manager_name' => 'required',
            'manager_phone_number' => 'required',
            'business_short_description' => 'required',
            'business_information' => 'required',
            //'business_logo' => 'image|mimes:jpg,jpeg,bmp,png',
            'open_hour_mon_fri_from' => 'required',
            'open_hour_mon_fri_to' => 'required',
            'open_hour_sat_from' => 'required',
            'open_hour_sat_to' => 'required',
            'keywords' => 'required',
            'category' => 'required',
            'section_permission' => 'required',
        );

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            // Ooops.. something went wrong
            return Redirect::to(URL::previous())->withInput()->withErrors($validator);
        }

        $safeLogoName = '';
        if ($file = $request->file('business_logo')) {
            $fileName = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension() ?: 'png';
            $folderName = '/uploads/card_logo';
            $destinationPath = base_path() . $folderName;
            $safeLogoName = str_random(10) . '.' . $extension;
            $file->move($destinationPath, $safeLogoName);
        }

        $files = $request->file('pictures');
        $multifilenames = '';
        $safeName = '';
        if($request->hasFile('pictures'))
        {
            foreach ($files as $file) {
                $fileName = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension() ?: 'png';
                $folderName = '/uploads/card_picture';
                $destinationPath = base_path() . $folderName;
                $safeName = str_random(10) . '.' . $extension;
                $file->move($destinationPath, $safeName);
                if($multifilenames == ''){
                    $multifilenames = $safeName;
                }else{
                    $multifilenames .= ','.$safeName;
                }
            }
        }

        $client = Cardfinds::find($id);

        $user = User::find($client->user_id);
        if(!empty($user)){
            $user->email = $request->get('email');
            $password = $request->get('password');
            if($password != '')
                $user->password = Hash::make($password);
            $user->save();
        }

        $client->business_name = $request->get('business_name');
        $client->business_address = $request->get('business_address');
        $client->business_city = $request->get('business_city');
        $client->business_state = $request->get('business_state');
        $client->business_country = $request->get('business_country');
        $client->business_lat = $request->get('business_lat');
        $client->business_lon = $request->get('business_lon');
        $client->business_phone_number = $request->get('business_phone_number');
        $client->manager_name = $request->get('manager_name');
        $client->manager_phone_number = $request->get('manager_phone_number');
        $client->business_short_description = $request->get('business_short_description');
        $client->business_information = $request->get('business_information');
        $client->contract_start_date = $request->get('contract_start_date');
        $client->contract_end_date = $request->get('contract_end_date');
        $client->open_hour_mon_fri_from = $request->get('open_hour_mon_fri_from');
        $client->open_hour_mon_fri_to = $request->get('open_hour_mon_fri_to');
        $client->open_hour_sat_from = $request->get('open_hour_sat_from');
        $client->open_hour_sat_to = $request->get('open_hour_sat_to');
        $client->keywords = $request->get('keywords');
        $client->category = $request->get('category');
        $client->section_permission = $request->get('section_permission');
        $client->facebook_link = $request->get('facebook_link');
        $client->google_plus_link = $request->get('google_plus_link');
        $client->twitter_link = $request->get('twitter_link');
        $client->comment_num = $request->get('comment_num');
        if($multifilenames != '') {
            if ($client->pictures != '')
                $client->pictures .= ',' . $multifilenames;
            else
                $client->pictures = $multifilenames;

            if ($safeLogoName != '')
                $client->logo = $safeLogoName;
        }
        $type = 1;
        $client->save();

        $comment_list = DB::table('findmiin_comment_temp')->where('id','<>',0)->get();
        foreach ($comment_list as $comment ){
            DB::table('findmiin_comment')->insert(['card_id'=>$client->id,'visitor_name'=>$comment->visitor_name,'rating'=>$comment->rating,'content'=>$comment->content]);
        }
        DB::table('findmiin_comment_temp')->where('id','<>',0)->delete();

        return Redirect::to("admin/cardfinds/".$type)->with('success', 'Successfully updated.');        
    }

    public function updateComment(Request $request, $id)
    {
        $name = $request->get('name');
        $rating = $request->get('rating');
        $content = $request->get('content');
        $content = base64_encode($content);

        DB::table('findmiin_comment_temp')->where('id',$id)->update(['visitor_name'=>$name,'rating'=>$rating,'content'=>$content]);

        $content = base64_decode($content, 'utf-8');
        $result = array('id'=>$id, 'name'=>$name, 'rating'=>$rating, 'content'=>$content);
        return response()->json($result);
    }
    public function deleteCommentTemp($id)
    {
        DB::table('findmiin_comment_temp')->where('id', $id)->delete();
        
        return $id;
    }
    public function deleteComment($id)
    {
        //DB::table('findmiin_comment_temp')->where('id', $id)->delete();
        DB::table('findmiin_comment')->where('id', $id)->delete();
        return $id;
    }
    public function addComment(Request $request)
    {
        $name = $request->get('name');
        $rating = $request->get('rating');
        $content = $request->get('content');
        $content = base64_encode($content);

        $id = DB::table('findmiin_comment_temp')->insertGetId(['visitor_name'=>$name,'rating'=>$rating,'content'=>$content]);

        $content = base64_decode($content, 'utf-8');
        $result = array('id'=>$id, 'name'=>$name, 'rating'=>$rating, 'content'=>$content);
        return response()->json($result);
    }
    public function removePicture(Request $request)
    {
        $id = $request->get('id');
        $picturename = $request->get('picturename');

        $update_pictures = "";
        $client = Cardfinds::find($id);
        $picture_list = explode(",", $client->pictures);
        if(in_array($picturename,$picture_list)){
            $num = 0;
            foreach ($picture_list as $picture){
                if($picture != $picturename){
                    if($num == 0)
                        $update_pictures = $picture;
                    else
                        $update_pictures .=','. $picture;
                    $num++;
                }
            }

            $client->pictures = $update_pictures;
            $client->save();

            return 'success';

        }
        
        return '';
    }
    
    
    public function deleteData($id)
    {
        DB::table('findmiin_cardfinds')->where('id', $id)->delete();
    }

    public function updateShow($id = 0, Request $request)
    {
        $client = Cardfinds::find($id);
        $type = 1;
        $today = date('Y-m-d');
        return View('admin/cardfinds/show', compact('type', 'today', 'client'));
    }
    public function editData($id = 0, Request $request)
    {
        $client = Cardfinds::find($id);
        $type = 1;
        $today = date('Y-m-d');
        return View('admin/cardfinds/edit', compact('type', 'today', 'client'));
    }
    public function create($type = 0, Request $request)
    {
        $today = date('Y-m-d');
        return View('admin/cardfinds/create', compact('type', 'today'));
    }
    public function detectEmail(Request $request)
    {
        $email = $request->get('email','');
        $id = $request->get('cardid','');

        $card = Cardfinds::find($id);
        $user = DB::table('users')->where('id','<>',$card->user_id)->where('email',$email)->first();
        if(empty($user))
            return 'success';
        else
            return 'already exsit';
    }
    public function addData(Request $request)
    {
        $rules = array(
            'business_name' => 'required',
            'business_address' => 'required',
            'business_city' => 'required',
            'business_state' => 'required',
            'business_country' => 'required',
            'business_lat' => 'required',
            'business_lon' => 'required',
            'business_phone_number' => 'required',
            'manager_name' => 'required',
            'manager_phone_number' => 'required',
            'business_short_description' => 'required',
            'business_information' => 'required',
            //'business_logo' => 'image|mimes:jpg,jpeg,bmp,png',
            'open_hour_mon_fri_from' => 'required',
            'open_hour_mon_fri_to' => 'required',
            'open_hour_sat_from' => 'required',
            'open_hour_sat_to' => 'required',
            'keywords' => 'required',
            'category' => 'required',
            'section_permission' => 'required',
        );
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            // Ooops.. something went wrong
            return Redirect::to(URL::previous())->withInput()->withErrors($validator);
        }

        //register client to user
        $user = Sentinel::registerAndActivate(array(
            'email' => $request->get('email'),
            'password' => $request->get('password')
        ));

        $role = Sentinel::findRoleById(5);
        $role->users()->attach($user);

        $userid =\DB::table('users')->where('email', $request->get('email'))->first()->id;

        $safeLogoName = '';
        if ($file = $request->file('business_logo')) {
            $fileName = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension() ?: 'png';
            $folderName = '/uploads/card_logo';
            $destinationPath = base_path() . $folderName;
            $safeLogoName = str_random(10) . '.' . $extension;
            $file->move($destinationPath, $safeLogoName);
        }

        $files = $request->file('pictures');
        $multifilenames = '';
        $safeName = '';
        if($request->hasFile('pictures'))
        {
            foreach ($files as $file) {
                $fileName = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension() ?: 'png';
                $folderName = '/uploads/card_picture';
                $destinationPath = base_path() . $folderName;
                $safeName = str_random(10) . '.' . $extension;
                $file->move($destinationPath, $safeName);
                if($multifilenames == ''){
                    $multifilenames = $safeName;
                }else{
                    $multifilenames .= ','.$safeName;
                }
            }
        }

        $client = new Cardfinds();
        $client->business_name = $request->get('business_name');
        $client->business_address = $request->get('business_address');
        $client->business_city = $request->get('business_city');
        $client->business_state = $request->get('business_state');
        $client->business_country = $request->get('business_country');
        $client->business_lat = $request->get('business_lat');
        $client->business_lon = $request->get('business_lon');
        $client->business_phone_number = $request->get('business_phone_number');
        $client->manager_name = $request->get('manager_name');
        $client->manager_phone_number = $request->get('manager_phone_number');
        $client->business_short_description = $request->get('business_short_description');
        $client->business_information = $request->get('business_information');
        $client->contract_start_date = $request->get('contract_start_date');
        $client->contract_end_date = $request->get('contract_end_date');
        $client->open_hour_mon_fri_from = $request->get('open_hour_mon_fri_from');
        $client->open_hour_mon_fri_to = $request->get('open_hour_mon_fri_to');
        $client->open_hour_sat_from = $request->get('open_hour_sat_from');
        $client->open_hour_sat_to = $request->get('open_hour_sat_to');
        $client->keywords = $request->get('keywords');
        $client->category = $request->get('category');
        $client->section_permission = $request->get('section_permission');
        $client->facebook_link = $request->get('facebook_link');
        $client->google_plus_link = $request->get('google_plus_link');
        $client->twitter_link = $request->get('twitter_link');
        $client->comment_num = $request->get('comment_num');
        $client->pictures = $multifilenames;
        if($safeLogoName != '')
            $client->logo = $safeLogoName;

        $client->user_id = $userid;

        $type = 1;
        $client->save();

        $comment_list = DB::table('findmiin_comment_temp')->where('id','<>',0)->get();
        foreach ($comment_list as $comment ){
            DB::table('findmiin_comment')->insert(['card_id'=>$client->id,'visitor_name'=>$comment->visitor_name,'rating'=>$comment->rating,'content'=>$comment->content]);
        }
        DB::table('findmiin_comment_temp')->where('id','<>',0)->delete();

        return Redirect::to("admin/cardfinds/".$type)->with('success', 'Successfully added.');
    }

    public function activeData($id = 0, Request $request)
    {
        DB::table('findmiin_card')->where('id', $id)->update(['status'=>0]);
        $data = array("status"=>0);
        return $data;
    }

    public function inactiveData($id = 0, Request $request)
    {
        DB::table('findmiin_card')->where('id', $id)->update(['status'=>1]);
        $data = array("status"=>1);
        return $data;
    }
    public function sqlBackup(){
        //ENTER THE RELEVANT INFO BELOW
        $mysqlUserName      = "findmiin_db";
        $mysqlPassword      = "Tierra2Agua@";
        $mysqlHostName      = "localhost";
        $DbName             = "findmiin_db";
        $backup_name        = "mybackup.sql";
        $tables             = "Your tables";

        //or add 5th parameter(array) of specific tables:    array("mytable1","mytable2","mytable3") for multiple tables

        //$filename = $this->Export_Database($mysqlHostName,$mysqlUserName,$mysqlPassword,$DbName,  $tables=false, $backup_name=false );
        //return $filename;
        $filename='database_backup_'.date('Y_m_d_H_i_s').'.sql';
        $path  = base_path().'/uploads/backup/'.$filename;
        $result=exec('mysqldump --add-drop-database --single-transaction '.$DbName.' --password='.$mysqlPassword.' --user='.$mysqlUserName.' > '.$path,$output);
        $path  = 'http://'.$_SERVER['HTTP_HOST'].'/uploads/backup/'.$filename;
        return $path;

    }
    public function Export_Database($host,$user,$pass,$name,  $tables=false, $backup_name=false )
    {
        $mysqli = new \mysqli($host,$user,$pass,$name);
        $mysqli->select_db($name);
        $mysqli->query("SET NAMES 'utf8'");

        $queryTables    = $mysqli->query('SHOW TABLES');
        while($row = $queryTables->fetch_row())
        {
            $target_tables[] = $row[0];
        }
        if($tables !== false)
        {
            $target_tables = array_intersect( $target_tables, $tables);
        }
        $content1 = "create database findmiin_db;\n\nuse findmiin_db;";
        foreach($target_tables as $table)
        {
            $result         =   $mysqli->query('SELECT * FROM '.$table);
            //$fieldquery         =   $mysqli->query('show fields from '.$table);
            $fields_amount  =   $result->field_count;
            $rows_num=$mysqli->affected_rows;
            $res            =   $mysqli->query('SHOW CREATE TABLE '.$table);
            $TableMLine     =   $res->fetch_row();
            $content        = (!isset($content) ?  '' : $content) . "\n\n".$TableMLine[1].";\n\n";

            for ($i = 0, $st_counter = 0; $i < $fields_amount;   $i++, $st_counter=0)
            {
                while($row = $result->fetch_row())
                { //when started (and every after 100 command cycle):
                    if ($st_counter%100 == 0 || $st_counter == 0 )
                    {
                        $content .= "\nINSERT INTO ".$table." (";
                        $fielddata = '';
                        $fieldquery         =   $mysqli->query('show fields from '.$table);
                        while($row1 = $fieldquery->fetch_row())
                        {
                            if($fielddata == ''){
                                $fielddata = '`'.$row1[0].'`';
                            }else{
                                $fielddata .= ',`'.$row1[0].'`';
                            }
                        }
                        $content .= $fielddata.") VALUES";
                    }
                    $content .= "\n(";
                    for($j=0; $j<$fields_amount; $j++)
                    {
                        $row[$j] = str_replace("\n","\\n", addslashes($row[$j]) );
                        if (isset($row[$j]))
                        {
                            $content .= '"'.$row[$j].'"' ;
                        }
                        else
                        {
                            $content .= '""';
                        }
                        if ($j<($fields_amount-1))
                        {
                            $content.= ',';
                        }
                    }
                    $content .=")";
                    //every after 100 command cycle [or at last line] ....p.s. but should be inserted 1 cycle eariler
                    if ( (($st_counter+1)%100==0 && $st_counter!=0) || $st_counter+1==$rows_num)
                    {
                        $content .= ";";
                    }
                    else
                    {
                        $content .= ",";
                    }
                    $st_counter=$st_counter+1;
                }
            } $content .="\n\n\n";
        }
        //$backup_name = $backup_name ? $backup_name : $name."___(".date('H-i-s')."_".date('d-m-Y').")__rand".rand(1,11111111).".sql";
        $backup_name = $backup_name ? $backup_name : $name.".sql";
        header('Content-Type: application/octet-stream');
        header("Content-Transfer-Encoding: Binary");
        header("Content-disposition: attachment; filename=\"".$backup_name."\"");
        $path  = base_path().'/uploads/backup/'.$backup_name;
        $myfile = fopen($path, "w") or die("Unable to open file!");
        fwrite($myfile, $content1.$content);
        fclose($myfile);
        $path  = 'http://'.$_SERVER['HTTP_HOST'].'/uploads/backup/'.$backup_name;
        return $path;
    }
    public function sqlImport(Request $request){

        if(!empty($_FILES['file']['name'])){
            $targetPath = base_path()."/uploads/backup/import/".$_FILES['file']['name']; // Target path where file is to be stored
            move_uploaded_file($_FILES['file']['tmp_name'],$targetPath);

            $mysqlDatabaseName ='findmiin_db';
            $mysqlUserName ='findmiin_db';
            $mysqlPassword ='Tierra2Agua@';
            $mysqlHostName ='localhost';
            $targetPath = $_SERVER['DOCUMENT_ROOT']."/uploads/backup/import/".$_FILES['file']['name'];

            foreach(\DB::select('SHOW TABLES') as $table) {
                if(($table->Tables_in_findmiin_db != 'activations' && $table->Tables_in_findmiin_db != 'throttle') && ($table->Tables_in_findmiin_db != 'persistences' && $table->Tables_in_findmiin_db != 'users')) {
                    $table_array = get_object_vars($table);
                    \Schema::drop($table_array[key($table_array)]);
                }
            }

            $cmd = "mysql -h {$mysqlHostName} -u {$mysqlUserName} -p{$mysqlPassword} {$mysqlDatabaseName} < $targetPath";
            $result= exec($cmd);
            return $result;

        }else{
            return "empty";
        }
        

    }
}

