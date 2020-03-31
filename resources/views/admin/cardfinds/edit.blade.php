@extends('admin/layouts/default')
{{-- Page title --}}
@section('title')
    Edit Client
    @parent
@stop

{{-- page level styles --}}
@section('header_styles')
    <link href="{{ asset('assets/vendors/bootstrap3-wysihtml5-bower/css/bootstrap3-wysihtml5.min.css') }}"  rel="stylesheet" media="screen"/>
    <link href="{{ asset('assets/css/pages/editor.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/vendors/jasny-bootstrap/css/jasny-bootstrap.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/jquery.rateyo.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/jquery.timepicker.min.css') }}" rel="stylesheet" />

    <link href="/vendors/daterangepicker/css/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
    <link href="/vendors/datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css" />
    <link href="/vendors/clockface/clockface.css" rel="stylesheet" type="text/css"/>
    <link href="/vendors/jasny-bootstrap/jasny-bootstrap.min.css" rel="stylesheet" type="text/css" />

    <link href="{{ asset('assets/css/owl.carousel.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/css/owl.theme.default.min.css') }}" rel="stylesheet"/>
    <script type="text/javascript" src="/../assets/js/jquery-2.2.4.min.js"></script>
    <script type="text/javascript" src="/../assets/js/owl.carousel.min.js"></script>
@stop

{{-- Page content --}}
@section('content')

    <section class="content-header">
        <!--section starts-->
        <h1>Edit Client</h1>
        <ol class="breadcrumb">
            <li>
                <a href="">
                    <i class="livicon" data-name="home" data-size="14" data-loop="true"></i>
                    {{ config('Convert.dashboard')[0] }}
                </a>
            </li>
            <li>
                <a href="#">Cardfinds</a>
            </li>
            <li class="active">Edit Client</li>
        </ol>
    </section>

    <div class="panel-body" style="width:90%;margin-left:5%">

                <div class="form-group has-success" style="margin-top:20px;">
                </div>
                <form role="form" action="{{ url('/admin/cardfinds/'.$client->id.'/update') }}" id="CardfindUpdateForm" method="POST" enctype="multipart/form-data">
                    <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}"/>
                    <input type="hidden" name="type" value="{{ $type }}"/>
                    <input type="hidden" name="id" id="card_id" value="{{ $client->id }}"/>

                    <div class="form-group has-success row">
                        <?php
                        $email_str = '';
                        $email = \DB::table('users')->where('id', $client->user_id)->first();
                        if(!empty($email)) $email_str = $email->email;
                        ?>
                        <div class="col-md-12">
                            <label class="control-label" style="font-size: 120%" for="name">Email</label>
                            <div>
                                <input type="text" class="form-control" id="email" name="email" value="{{$email_str}}" placeholder="email">
                            </div>
                        </div>
                    </div>
                    <div class="form-group has-success row">
                        <label class="control-label" style="width:100%;font-size: 120%;padding: 0px 15px;" for="name">Password</label>

                        <div class="col-md-3" style="display: inline-flex;margin-top: 20px;">
                            <input type="checkbox" class="form-control" id="modify_password" onclick="modifyCardPassword()" style="width:16px;height:16px;margin-left: 25px;margin-right: 15px;"/>
                            <label class="control-label" style="font-size: 110%;" for="name">Modify Password</label>
                        </div>
                        <div class="row" id = "password_div" style="display: none;">
                            <div class="col-md-3">
                                <label class="control-label" style="font-size: 100%;" for="name">Password</label>
                                <div>
                                    <input type="password" class="form-control" name="password" id="password" value="" placeholder="password">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label class="control-label" style="font-size: 100%;" for="name">Confirm Password</label>
                                <div>
                                    <input type="password" class="form-control" id="confirm_password" value="" placeholder="confirm password">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <label class="control-label" style="font-size: 100%" for="name"></label>
                                <div style="margin-top: 5px;">
                                    <input type="button" class="btn btn-success" value="Reset Password" onclick="resetCardPassword();">
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="form-group has-success row">
                        <div class="col-md-6">
                            <label class="control-label" style="font-size: 120%" for="name">Business Name</label>
                            <div>
                                <input type="text" class="form-control" name="business_name" value="{{ $client->business_name }}" placeholder="Business Name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="control-label" style="font-size: 120%" for="name">Business Phone Number</label>
                            <div>
                                <input type="text" class="form-control" name="business_phone_number" value="{{ $client->business_phone_number }}" placeholder="Business Phone Number">
                            </div>
                        </div>
                    </div>
                    <div class="form-group has-success row">
                        <label class="control-label" style="width:100%;font-size: 120%;padding: 0px 15px;" for="name">Business Address</label>
                        <div class="col-md-3">
                            <label class="control-label" style="font-size: 100%;" for="name">Address</label>
                            <div>
                                <input type="text" class="form-control" name="business_address" value="{{ $client->business_address }}" placeholder="Address">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label class="control-label" style="font-size: 100%;" for="name">City</label>
                            <div>
                                <?php
                                $cities = \DB::table('oollah_cities')->select(['name'])->get();
                                ?>
                                <select id="business_city" class="form-control"  name="business_city" type="text" value="">
                                    @foreach($cities as $city)
                                        <option value="{{ $city->name }}" {{$client->business_city == $city->name? 'selected':''}}>{{ $city->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label class="control-label" style="font-size: 100%;" for="name">State</label>
                            <div>
                                <input type="text" class="form-control" name="business_state" value="{{ $client->business_state }}" placeholder="State">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label class="control-label" style="font-size: 100%;" for="name">Country</label>
                            <div>
                                <input type="text" class="form-control" name="business_country" value="{{ $client->business_country }}" placeholder="Country">
                            </div>
                        </div>
                    </div>
                    <div class="form-group has-success row">
                        <div class="col-md-6">
                            <label class="control-label" style="font-size: 120%" for="name">Business Latitude</label>
                            <div>
                                <input type="text" class="form-control" name="business_lat" value="{{ $client->business_lat }}" placeholder="Business Latitude">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="control-label" style="font-size: 120%" for="name">Business Longitude</label>
                            <div>
                                <input type="text" class="form-control" name="business_lon" value="{{ $client->business_lon }}" placeholder="Business Longitude">
                            </div>
                        </div>
                    </div>
                    <div class="form-group has-success row">
                        <div class="col-md-6">
                            <label class="control-label" style="font-size: 120%" for="name">Manager Name</label>
                            <div>
                                <input type="text" class="form-control" name="manager_name" value="{{ $client->manager_name }}" placeholder="Manager Name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="control-label" style="font-size: 120%" for="name">Manager Phone Number</label>
                            <div>
                                <input type="text" class="form-control" name="manager_phone_number" value="{{ $client->manager_phone_number }}" placeholder="Manager Phone Number">
                            </div>
                        </div>
                    </div>

                    <div class="form-group has-success row">
                        <div class="col-md-12">
                            <label class="control-label" style="font-size: 120%" for="name">Business Description</label>
                            <textarea class="form-control" rows="3" id="business_short_description" value="" name="business_short_description">{{ $client->business_short_description }}</textarea>
                        </div>
                    </div>
                    <div class="form-group has-success row">
                        <div class="col-md-12">
                            <label class="control-label" style="font-size: 120%" for="name">Business Information</label>
                            <textarea class="form-control" rows="3" id="business_information" value="" name="business_information">{{ $client->business_information }}</textarea>
                        </div>
                    </div>

                    <div class="form-group has-success" style="padding:0px 15px;">
                        <label class="control-label" style="font-size: 120%" for="name">Logo</label>
                        <div>
                            <div class="form-group">
                                <div class="fileinput fileinput-exists" data-provides="fileinput">
                                    <div class="fileinput-new thumbnail" style="width: 500px; min-height: 200px;">
                                        <img data-src="holder.js/100%x100%"></div>
                                    <div class="fileinput-preview thumbnail" style="max-width: 500px; min-height: 200px; line-height: 210px;">
                                        <img src="/uploads/card_logo/{{ $client->logo }}" style="max-width: 500px; min-height: 200px;">
                                    </div>
                                    <div>
                                        <span class="btn btn-default btn-file">
                                            <span class="fileinput-new">{{ config('Convert.select_image')[0] }}</span>
                                            <span class="fileinput-exists">{{ config('Convert.change')[0] }}</span>
                                            <input type="hidden" value="" name=""><input type="file" id="business_logo" name="business_logo">
                                        </span>
                                        <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">{{ config('Convert.remove')[0] }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php

                    ?>
                    <div class="form-group has-success row">
                        <div class="control-label" id="picture">
                            <label class="control-label" style="font-size: 120%" for="name">Pictures</label>
                            <div id="multifilemaindiv">
                                <?php
                                    if($client->pictures != ''){
                                        $picture_list = explode(",", $client->pictures);
                                        $num = 0;
                                        foreach ($picture_list as $picture){
                                        $num++;
                                ?>
                                        <div id="picture_remove_{{$num}}" class="update_pictures form-group">
                                            <div class="fileinput fileinput-exists" data-provides="fileinput">
                                                <div class="fileinput-new thumbnail" style="width: 500px; min-height: 200px;">
                                                    <img data-src="holder.js/100%x100%"></div>
                                                <div class="fileinput-preview thumbnail" style="width: 500px; height: 200px;">
                                                <img src="/uploads/card_picture/{{ $picture }}" style="max-width: 500px; max-height: 200px;"></div>
                                                <div>
                                            {{--<span class="btn btn-default btn-file">--}}
                                                {{--<span class="fileinput-new">Select Image</span>--}}
                                                {{--<span class="fileinput-exists">Change</span>--}}
                                                {{--<input type="file" name="pictures[]" class="multi_pictures">--}}
                                            {{--</span>--}}
                                                    <span onclick="pictureRemove('{{$client->id}}','{{$picture}}','{{$num}}')" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</span>
                                                    <span onclick="addNewFile('1')" class="btn btn-default" style="margin-left:20px">More Add</span>
                                                </div>
                                            </div>
                                        </div>
                                <?php
                                        }
                                    }else{
                                ?>
                                    <div id="multifilediv1" class="form-group">
                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                            <div class="fileinput-new thumbnail" style="width: 500px; min-height: 200px;">
                                                <img data-src="holder.js/100%x100%"></div>
                                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 500px; min-height: 200px;"></div>
                                            <div>
                                                <span class="btn btn-default btn-file">
                                                    <span class="fileinput-new">Select Image</span>
                                                    <span class="fileinput-exists">Change</span>
                                                    <input type="file" name="pictures[]" class="multi_pictures">
                                                </span>
                                                <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                                                <span onclick="addNewFile('1')" class="btn btn-default" style="margin-left:20px">More Add</span>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                    }
                                ?>

                            </div>
                            <input type="hidden" id="multiindex" value="1">
                        </div>
                    </div>

                    <script>
                        function addNewFile(index){
                            var multiindex = $('#multiindex').val();
                            multiindex++;
                            $('#multiindex').val(multiindex);
                            var html = '' +
                                    '<div id="multifilediv'+multiindex+'" class="update_pictures form-group">'+
                                    '<div class="fileinput fileinput-new" data-provides="fileinput">'+
                                    '<div class="fileinput-new thumbnail" style="width: 500px; min-height: 200px;">'+
                                    '<img data-src="holder.js/100%x100%">'+
                                    '</div>'+
                                    '<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 500px; min-height: 200px;"></div>'+
                                    '<div>'+
                                    '<span class="btn btn-default btn-file">'+
                                    '<span class="fileinput-new">Select Image</span>'+
                                    '<span class="fileinput-exists">Change</span>'+
                                    '<input type="file" name="pictures[]" class="multi_pictures">'+
                                    '</span>'+
                                    '<a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>'+
                                    '<span id="addfile" onclick="addNewFile(\''+multiindex+'\')" class="btn btn-default" style="margin-left:20px">More Add</span>'+
                                    '<span id="cancelfile" onclick="removeNewFile(\''+multiindex+'\')" class="btn btn-default">Cancel</span>'+
                                    '</div>'+
                                    '</div>'+
                                    '</div>';
                            $('#multifilemaindiv').append(html);
                        }
                        function removeNewFile(index){
                            $('#multifilediv'+index).remove();
                        }
                        function pictureRemove(id,picture_name,num){
                            var _token = $('#_token').val();
                            var data = {
                                id:id,
                                picturename: picture_name,
                                _token:_token
                            };
                            console.log(data);
                            $.ajax({
                                type: "post",
                                url: '/admin/cardfinds/pictures/remove',
                                data: data,
                                success: function (result) {
                                    console.log(result);
                                    processPictureRemove(num);
                                },
                                error: function (result) {
                                    console.log(result)
                                }
                            });
                        }
                        function processPictureRemove(num){
                            var length = $('#multifilemaindiv .update_pictures').length;
                            if(length == 0){
                                addNewFile(1);
                                $("#cancelfile").hide();
                            }
                            $('#picture_remove_'+num).remove();

                        }
                    </script>
                    <div class="form-group has-success row">
                        <label class="control-label" style="width:100%;padding:0px 15px;font-size: 120%" for="name">Open Hours</label>
                        <div class="col-md-3">
                            <label class="control-label" style="font-size: 100%" for="name">Monday~Friday Start Time</label>
                            <div>
                                <input type="text" class="form-control pull-right" id="open_hour_mon_fri_from" name="open_hour_mon_fri_from" size="20" placeholder="start time" value="{{ $client->open_hour_mon_fri_from }}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label class="control-label" style="font-size: 100%" for="name">Monday~Friday End Time</label>
                            <div>
                                <input type="text" class="form-control pull-right" id="open_hour_mon_fri_to" name="open_hour_mon_fri_to" size="20" placeholder="end time" value="{{ $client->open_hour_mon_fri_to }}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label class="control-label" style="font-size: 100%" for="name">Saturday Start Time</label>
                            <div>
                                <input type="text" class="form-control pull-right" id="open_hour_sat_from" name="open_hour_sat_from" size="20" placeholder="start time" value="{{ $client->open_hour_sat_from }}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label class="control-label" style="font-size: 100%" for="name">Saturday End Time</label>
                            <div>
                                <input type="text" class="form-control pull-right" id="open_hour_sat_to" name="open_hour_sat_to" size="20" placeholder="end time" value="{{ $client->open_hour_sat_to }}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group has-success row">
                        <div class="col-md-3">
                            <label class="control-label" style="font-size: 100%" for="name">Sunday Start Time</label>
                            <div>
                                <input type="text" class="form-control pull-right" id="open_hour_sun_from" name="open_hour_sun_from" size="20" placeholder="start time" value="{{ $client->open_hour_sun_from }}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label class="control-label" style="font-size: 100%" for="name">Sunday End Time</label>
                            <div>
                                <input type="text" class="form-control pull-right" id="open_hour_sun_to" name="open_hour_sun_to" size="20" placeholder="end time" value="{{ $client->open_hour_sun_to }}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group has-success row">
                        <div class="col-md-6">
                            <label class="control-label" style="font-size: 120%" for="name">Contract Start Date</label>
                            <div>
                                <input type="text" class="form-control pull-right" id="contract_start_date" value="{{ $client->contract_start_date }}" name="contract_start_date" size="20" placeholder="contract start date" value="{{ $today }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="control-label" style="font-size: 120%" for="name">Contract End Date</label>
                            <div>
                                <input type="text" class="form-control pull-right" id="contract_end_date" value="{{ $client->contract_end_date }}" name="contract_end_date" size="20" placeholder="contract end date" value="{{ $today }}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group has-success row">
                        <div class="col-md-12">
                            <label class="control-label" style="font-size: 120%" for="name">Keywords</label>
                            <div>
                                <input type="text" class="form-control" name="keywords" value="{{ $client->keywords }}" placeholder="">
                            </div>
                        </div>
                    </div>
                    <div class="form-group has-success row">
                        <?php
                        $categories = \DB::table('findmiin_jobs_category')->select(['name'])->orderby('id','asc')->get();
                        ?>
                        <div class="col-md-6">
                            <label class="control-label" style="font-size: 120%" for="name">Category</label>
                            <select id="category" class="form-control"  name="category" type="text" value="">
                                @foreach($categories as $category)
                                    <option value="{{ $category->name }}" {{$client->category == $category->name? 'selected':''}}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group has-success row">
                        <div class="col-md-12">
                            <input type="hidden" id="section_permission" name="section_permission" value = "Jobs">
                            <label class="control-label" style="font-size: 120%" for="name">Section Permission</label>
                            <?php
                            $section_list = explode(",", $client->section_permission);
                            $sections = \DB::table('findmiin_section')->select(['name'])->orderby('id','asc')->get();
                            $num = 0;
                            ?>
                            {{--<div class="row" style="margin-bottom: 10px">--}}
                                {{--<label class="col-sm-2 control-label">Jobs </label>--}}
                                {{--<div class="col-sm-10">--}}
                                    {{--<input value="Jobs" type="checkbox" class="form-control"--}}
                                           {{--{{ in_array('Jobs', $section_list)? 'checked':''}}--}}
                                           {{--onclick="setPrivilege('0','Jobs')" style="width:16px;height:16px;margin-top:0px;"/>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            <input type="hidden" id="section_lenght" value="{{count($sections)}}">
                            <?php
                            foreach($sections as $section){
                            $num++;
                            ?>
                            <div class="row" style="margin-bottom: 10px">
                                <label class="col-sm-2 control-label">{{ $section->name }} </label>
                                <div class="col-sm-10">
                                    <input id="section_{{ $num }}" value="{{ $section->name }}" type="checkbox" class="form-control"
                                           {{ in_array($section->name, $section_list)? 'checked':''}}
                                           onclick="setPrivilege('{{ $num }}','{{ $section->name }}')" style="width:16px;height:16px;margin-top:0px;"/>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="form-group has-success row">
                        <input type="hidden" id="comment_num" name="comment_num" value="0">
                        <div class="col-md-12">
                            <label class="control-label" style="font-size: 120%" for="name">Comments</label>
                            <span class="btn btn-default" data-toggle="modal" data-target="#addModal" style="margin-left:20px;margin-bottom: 10px;">Add</span>
                        </div>
                        <div class="col-md-12" style="display: -webkit-box">
                            <table class="table table-striped table-bordered table-hover dataTable no-footer sample_editable"
                                   id="commenttable" role="grid">
                                <thead>
                                <tr role="row">
                                    <th width="5%" class="sorting_asc" tabindex="0" aria-controls="occasiontable" rowspan="1"
                                        colspan="1">{{ _t('No', [], $_SESSION['lang']) }}
                                    </th>
                                    <th width="15%" class="sorting_asc" tabindex="0" aria-controls="occasiontable" rowspan="1"
                                        colspan="1">{{ _t('Name', [], $_SESSION['lang']) }}
                                    </th>
                                    <th width="20%" class="sorting" tabindex="0" aria-controls="occasiontable" rowspan="1"
                                        colspan="1">{{ _t('Rating', [], $_SESSION['lang']) }}
                                    </th>
                                    <th width="40%" class="sorting" tabindex="0" aria-controls="occasiontable" rowspan="1"
                                        colspan="1">{{ _t('Content', [], $_SESSION['lang']) }}
                                    </th>
                                    {{--<th width="10%" class="sorting" tabindex="0" aria-controls="occasiontable" rowspan="1"--}}
                                        {{--colspan="1">{{ _t('Edit', [], $_SESSION['lang']) }}--}}
                                    {{--</th>--}}
                                    <th width="10%" class="sorting" tabindex="0" aria-controls="occasiontable" rowspan="1"
                                        colspan="1">{{ _t('Delete', [], $_SESSION['lang']) }}
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $comment_list = DB::table('findmiin_comment')->where('card_id',$client->id)->get();
                                $num = 0;
                                foreach ($comment_list as $comment){
                                $num++;
                                $rating = (float)$comment->rating;
                                $rating = $rating * 10;
                                $nser_name = $comment->visitor_name;
                                if($comment->user_id != 0){
                                $user = \DB::table('users')->select(['first_name','last_name'])->where('id',$comment->user_id)->first();
                                $nser_name = $user->first_name.' '.$user->last_name;
                                }
                                ?>
                                <tr id="tr_sel_{{$comment->id}}">
                                    <td>{{ $num }}</td>
                                    <td>{{ $nser_name }}</td>
                                    <td><div class="comment_rating_view" data-rateyo-rating="{{ $rating }}%"></div></td>
                                    <td>
                                        <?php
                                        echo base64_decode($comment->content, 'utf-8');
                                        ?>
                                    </td>
                                    {{--<td><span class="btn btn-default" data-toggle="modal" onclick="editBtn('{{$comment->id}}','{{$comment->visitor_name}}','{{$comment->rating}}','{{$comment->content}}');" data-target="#editModal" style="padding:2px 8px;">Edit</span></td>--}}
                                    <td><span class="btn btn-default" data-toggle="modal" onclick="deleteBtn('{{$comment->id}}','del');" data-target="#deleteModal" style="padding:2px 8px;">Delete</span></td>

                                </tr>
                                <?php } ?>

                                </tbody>
                            </table>
                        </div>

                    </div>
                    <div class="form-group has-success row">
                        <div class="col-md-12">
                            <label class="control-label" style="font-size: 120%" for="name">Facebook Link</label>
                            <div>
                                <input type="text" class="form-control pull-right" id="facebook_link" name="facebook_link" size="20" placeholder="facebook link" value="{{$client->facebook_link}}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group has-success row">
                        <div class="col-md-12">
                            <label class="control-label" style="font-size: 120%" for="name">Google Plus Link</label>
                            <div>
                                <input type="text" class="form-control pull-right" id="google_plus_link" name="google_plus_link" size="20" placeholder="google plus link" value="{{$client->google_plus_link}}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group has-success row">
                        <div class="col-md-12">
                            <label class="control-label" style="font-size: 120%" for="name">Twitter Link</label>
                            <div>
                                <input type="text" class="form-control pull-right" id="twitter_link" name="twitter_link" size="20" placeholder="twitter link" value="{{$client->twitter_link}}">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 mar-10" style="padding-top:30px;">
                        <div class="col-lg-6">
                            <input type="button" value="{{ config('Convert.back')[0] }}" style="font-size: 120%" class="btn btn-danger btn-block btn-md btn-responsive" onclick="javascript:history.back();">
                        </div>
                        <div class="col-lg-6">
                            {{--<input type="submit" value="Update Client" style="font-size: 120%" class="btn btn-success btn-block btn-md btn-responsive">--}}
                            <span style="font-size: 120%" onclick="updateCardfind();" class="btn btn-success btn-block btn-md btn-responsive">Update Client</span>
                        </div>
                    </div>
                </form>
    </div>
    <!-- add modal -->
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="width: 80%">
                <div class="modal-header" style="font-size: 150%">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Add Comment</h4>
                </div>
                <div class="modal-body" style="font-size: 120%">
                    <table style="width:100%" class="table form-body" border="0">
                        <tr style="border:0">
                            <th style="border:0">Name:</th>
                            <td style="border:0">
                                <input type="text" name="name" class="form-control" id="comment_add_name"  value="" placeholder="name">
                            </td>
                        </tr>
                        <tr style="border:0">
                            <th style="border:0">Rating:</th>
                            <td style="border:0">
                                <input type="number" maxlength="2" min="0" max="10" step="1" name="name" class="form-control" id="comment_add_rating"  value="0">
                            </td>
                        </tr>
                        <tr style="border:0">
                            <th style="border:0">Content:</th>
                            <td style="border:0">
                                <textarea class="form-control" rows="3" id="comment_add_content" name="content" placeholder="content"></textarea>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" class="form-control" data-dismiss="modal" onclick="addComment()">Add</button>
                    <button type="button" class="btn btn-default" class="form-control" data-dismiss="modal">{{ _t(config('Convert.cancel')[0], [], $_SESSION['lang']) }}</button>
                </div>
            </div>
        </div>
    </div>

    <!-- edit modal -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="width: 80%">
                <div class="modal-header" style="font-size: 150%">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Edit Comment</h4>
                </div>
                <div class="modal-body" style="font-size: 120%">
                    <input type="hidden" id="comment_edit_id" value=""/>
                    <table style="width:100%" class="table form-body" border="0">
                        <tr style="border:0">
                            <th style="border:0">Name:</th>
                            <td style="border:0">
                                <input type="text" name="name" class="form-control" id="comment_edit_name"  value="" placeholder="name">
                            </td>
                        </tr>
                        <tr style="border:0">
                            <th style="border:0">Rating:</th>
                            <td style="border:0">
                                <input type="number" min="0" max="10" step="1" name="name" class="form-control" id="comment_edit_rating"  value="4.5">
                            </td>
                        </tr>
                        <tr style="border:0">
                            <th style="border:0">Content:</th>
                            <td style="border:0">
                                <textarea class="form-control" rows="3" id="comment_edit_content" name="content" placeholder="content"></textarea>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" class="form-control" data-dismiss="modal" onclick="editComment()">Save</button>
                    <button type="button" class="btn btn-default" class="form-control" data-dismiss="modal">{{ _t(config('Convert.cancel')[0], [], $_SESSION['lang']) }}</button>
                </div>
            </div>
        </div>
    </div>

    <!-- delete modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="width: 80%">
                <div class="modal-body" style="font-size: 150%">
                    {{ _t(config('Convert.notice')[0], [], $_SESSION['lang']) }}
                </div>
                <input type="hidden" id="comment_delete_id" value="0">
                <input type="hidden" id="comment_delete_type" value="">
                <div class="modal-body">
                    {{ _t(config('Convert.tag_delete_message')[0], [], $_SESSION['lang']) }}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" class="form-control" data-dismiss="modal" onclick="deleteComment()">{{ _t(config('Convert.delete')[0], [], $_SESSION['lang']) }}</button>
                    <button type="button" class="btn btn-default" class="form-control" data-dismiss="modal">{{ _t(config('Convert.cancel')[0], [], $_SESSION['lang']) }}</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Message modal -->
    <div class="modal fade" id="messageModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="width: 80%">
                <div class="modal-body" style="font-size: 150%">
                    {{ _t(config('Convert.notice')[0], [], $_SESSION['lang']) }}
                </div>
                <div class="modal-body" id="messagecontent">
                    Please input a comment.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" class="form-control" data-dismiss="modal">{{ _t(config('Convert.ok')[0], [], $_SESSION['lang']) }}</button>
                </div>
            </div>
        </div>
    </div>
@stop

{{-- page level scripts --}}
@section('footer_scripts')

    <script src="{{asset('assets/vendors/tinymce/tinymce.min.js')}}" type="text/javascript"></script>
    <script  src="{{ asset('assets/vendors/ckeditor/js/ckeditor.js') }}"  type="text/javascript"></script>
    <script  src="{{ asset('assets/vendors/ckeditor/js/jquery.js') }}"  type="text/javascript" ></script>
    <script  src="{{ asset('assets/vendors/ckeditor/js/config.js') }}"  type="text/javascript"></script>
    <script  src="{{ asset('assets/js/pages/editor.js') }}"  type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/jasny-bootstrap/js/jasny-bootstrap.js') }}" ></script>
    <script src="{{ asset('assets/js/jquery.rateyo.min.js') }}" ></script>
    <script src="{{ asset('assets/js/jquery.timepicker.min.js') }}" ></script>
    <script src="/vendors/daterangepicker/moment.min.js" type="text/javascript"></script>
    <script src="/vendors/daterangepicker/daterangepicker.js" type="text/javascript"></script>
    <script src="/vendors/datetimepicker/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
    <script src="/vendors/clockface/clockface.js" type="text/javascript"></script>
    <script src="/vendors/jasny-bootstrap/jasny-bootstrap.min.js" type="text/javascript"></script>
    <script>
        $(document).ready(function () {
            $(".comment_rating_view").rateYo({
                numStars: 5,
                precision: 2,
                minValue: 0,
                maxValue: 10,
                starWidth: "18px",
                readOnly:true,
            });
            document.getElementById('comment_add_rating').oninput =
                    function (e) {
                        if (parseInt(this.value) > 10) {
                            this.value = 10;
                        }
                        if (parseInt(this.value) < 0) {
                            this.value = 0;
                        }
                    }
        });
        $("#open_hour_mon_fri_from").timepicker();
        $("#open_hour_mon_fri_to").timepicker();
        $("#open_hour_sat_from").timepicker();
        $("#open_hour_sat_to").timepicker();
        $("#open_hour_sun_from").timepicker();
        $("#open_hour_sun_to").timepicker();
        $("#contract_start_date").daterangepicker({
            singleDatePicker: true,
            showDropdowns: true,
            format: 'YYYY-MM-DD',
        });
        $("#contract_end_date").daterangepicker({
            singleDatePicker: true,
            showDropdowns: true,
            format: 'YYYY-MM-DD',
        });
        function setPrivilege(num,str){
            var val = "";
            var count = $("#section_lenght").val();

            for(var i=1; i<=parseInt(count); i++){
                if ($('#section_' + i).prop('checked') == true) {
                    if(val == '')
                        val = $('#section_' + i).val();
                    else
                        val = val + "," + $('#section_' + i).val();
                }
            }
            $("#section_permission").val(val);
            console.log(val);
        }
        function addComment () {
            var name = $("#comment_add_name").val();
            if (name == "") {
                $('#messagecontent').html('{{ _t('Please input name.', [], $_SESSION['lang']) }}');
                $('#messageModal').modal('show');
                return;
            }
            var content = $("#comment_add_content").val();
            if (content == "") {
                $('#messagecontent').html('{{ _t('Please input content.', [], $_SESSION['lang']) }}');
                $('#messageModal').modal('show');
                return;
            }
            var rating = $("#comment_add_rating").val();
            if (rating == "") {
                $('#messagecontent').html('{{ _t('Please input rating value.', [], $_SESSION['lang']) }}');
                $('#messageModal').modal('show');
                return;
            }
            var _token = $('#_token').val();
            console.log(_token);
            var data = {
                name: name,
                rating: rating,
                content: content,
                _token:_token
            };
            /*  save generated data in database and display  */
            $.ajax({
                type: "post",
                url: '/admin/cardfinds/comment/addcomment',
                data: data,
                success: function (result) {
                    processAddComment(result);
                },
                error: function (result) {
                    console.log(result)
                }
            });
        }
        function processAddComment(data){

            var newRow = "<tr id=\"tr_sel_" + data['id'] + "\">";
            newRow += "<td>"+ data['id'] +"</td>";
            newRow += "<td>"+ data['name'] +"</td>";
            var val = parseInt(data['rating']);
            val = val * 10;
            newRow += "<td><div class=\"comment_rating_view\" data-rateyo-rating='"+val.toString()+"%'></div></td>";
            newRow += "<td>"+ data['content'] +"</td>";
            //newRow += "<td><span class=\"btn btn-default\" data-toggle=\"modal\" onclick=\"editBtn('"+data['id']+"','"+data['name']+"','"+data['rating']+"','"+data['content']+"');\" data-target=\"#editModal\" style=\"padding:2px 8px;\">Edit</span></td>";
            newRow += "<td><span class=\"btn btn-default\" data-toggle=\"modal\" onclick=\"deleteBtn('"+data['id']+"','temp');\" data-target=\"#deleteModal\" style=\"padding:2px 8px;\">Delete</span></td>";
            newRow += "</tr>";
            $("#commenttable tbody").append(newRow);
            var rowCount = $('#commenttable tr').length -1;
            $("#comment_num").val(rowCount);

            var table = document.getElementById("commenttable"),
                    rows = table.getElementsByTagName('tr'),
                    cells;
            for(var i = 1; i < rowCount; i++){
                cells = rows[i].getElementsByTagName('td');
                cells[0].innerHTML = i;
            }

            $(".comment_rating_view").rateYo({
                numStars: 5,
                precision: 2,
                minValue: 0,
                maxValue: 10,
                starWidth: "18px",
                readOnly:true,
            });

        }
        function editBtn(id,name,rating,content){
            $("#comment_edit_id").val(id);
            $("#comment_edit_name").val(name);
            $("#comment_edit_rating").val(rating);
            $("#comment_edit_content").val(content);
        }

        function editComment () {
            var id=$("#comment_edit_id").val();
            var name = $("#comment_edit_name").val();
            if (name == "") {
                $('#messagecontent').html('{{ _t('Please input name.', [], $_SESSION['lang']) }}');
                $('#messageModal').modal('show');
                return;
            }
            var content = $("#comment_edit_content").val();
            if (content == "") {
                $('#messagecontent').html('{{ _t('Please input content.', [], $_SESSION['lang']) }}');
                $('#messageModal').modal('show');
                return;
            }
            var rating = $("#comment_edit_rating").val();
            if (rating == "") {
                $('#messagecontent').html('{{ _t('Please input rating value.', [], $_SESSION['lang']) }}');
                $('#messageModal').modal('show');
                return;
            }

            var _token = $('#_token').val();
            console.log(_token);
            var data = {
                name: name,
                rating: rating,
                content: content,
                _token:_token
            };
            /*  save generated data in database and display  */
            $.ajax({
                type: "post",
                url: '/admin/cardfinds/comment/' + id + '/updatecomment',
                data: data,
                success: function (result) {
                    processEditComment(result);
                },
                error: function (result) {
                    console.log(result)
                }
            });
        }
        function processEditComment(data){
            var row = document.getElementById("tr_sel_"+data['id']);
            row.innerHTML = "";
            var newRow = "";
            newRow += "<td>"+ data['id'] +"</td>";
            newRow += "<td>"+ data['name'] +"</td>";
            var val = parseInt(data['rating']);
            val = val * 10;
            newRow += "<td><div class=\"comment_rating_view\" data-rateyo-rating='"+val.toString()+"%'></div></td>";
            newRow += "<td>"+ data['content'] +"</td>";
           // newRow += "<td><span class=\"btn btn-default\" data-toggle=\"modal\" onclick=\"editBtn('"+data['id']+"','"+data['name']+"','"+data['rating']+"','"+data['content']+"');\" data-target=\"#editModal\" style=\"padding:2px 8px;\">Edit</span></td>";
            newRow += "<td><span class=\"btn btn-default\" data-toggle=\"modal\" onclick=\"deleteBtn('"+data['id']+"','temp');\" data-target=\"#deleteModal\" style=\"padding:2px 8px;\">Delete</span></td>";

            row.innerHTML = newRow;

            $(".comment_rating_view").rateYo({
                numStars: 5,
                precision: 2,
                minValue: 0,
                maxValue: 10,
                starWidth: "18px",
                readOnly:true,
            });
        }
        function deleteBtn(id,type){
            $("#comment_delete_id").val(id);
            $("#comment_delete_type").val(type);
        }
        function deleteComment(){
            var id = $('#comment_delete_id').val();
            var type = $('#comment_delete_type').val();
            var url = '';
            if(type == 'temp')
                url = '/deletecommenttemp';
            if(type == 'del')
                url = '/deletecomment';
            $.ajax({
                type: "get",
                url: '/admin/cardfinds/comment/' + id + url,
                success: function (result) {
                    processDeleteComment(result);
                    $('#messagecontent').html('{{ _t('Successfully deleted.', [], $_SESSION['lang']) }}');

                    $('#messageModal').modal('show');

                },
                error: function (result) {
                    $('#messagecontent').html('This is using in');
                    console.log(result)

                }
            });
        }
        function processDeleteComment(id){
            var row_sel = document.getElementById("tr_sel_"+id);
            row_sel.remove();

            var rowCount = $('#commenttable tr').length - 1;
            $("#comment_num").val(rowCount);

            var table = document.getElementById("commenttable"),
                    rows = table.getElementsByTagName('tr'),
                    cells;
            for(var i = 1; i < rowCount; i++){
                cells = rows[i].getElementsByTagName('td');
                cells[0].innerHTML = i;
            }
        }
        function modifyCardPassword(){
            if ($('#modify_password').prop('checked') == true) {
                $('#password_div').show();
                $('#password').val('');
                $('#confirm_password').val('');
            }else{
                $('#password_div').hide();
                $('#password').val('');
                $('#confirm_password').val('');
            }
        }
        function resetCardPassword(){
            $('#password').val('findmiin123');
            $('#confirm_password').val('findmiin123');
        }
        function updateCardfind() {
            var email = $("#email").val();
            if (email == '') {
                $('#messagecontent').html('Email field is required. &nbsp;&nbsp;&nbsp;Please input email.');
                $('#messageModal').modal('show');
                return;
            } else {
                var emailReg = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
                if (!emailReg.test(email)) {
                    $('#messagecontent').html('Email field is faild. &nbsp;&nbsp;&nbsp;Please input email again.');
                    $('#messageModal').modal('show');
                    return;
                }
            }
            var _token = $('#_token').val();
            var cardid = $('#card_id').val();
            var data = {
                email: email,
                cardid : cardid,
                _token: _token
            };

            $.ajax({
                type: "post",
                url: '/admin/cardfinds/detectemail',
                data: data,
                success: function (result) {
                    if (result == 'success') {
                        submitProcess();
                    } else {
                        $('#messagecontent').html('Email exsit already. &nbsp;&nbsp;&nbsp;Please input email again.');
                        $('#messageModal').modal('show');
                        return;
                    }
                },
                error: function (result) {
                    console.log(result);
                }
            });
        }
        function submitProcess(){
            if ($('#modify_password').prop('checked') == true){
                var password = $("#password").val();
                var confirm_password = $("#confirm_password").val();
                if( password == ''){
                    $('#messagecontent').html('Password field is required. &nbsp;&nbsp;&nbsp;Please input password.');
                    $('#messageModal').modal('show');
                    return;
                }
                if( password != confirm_password){
                    $('#messagecontent').html('The password and confirm password do not match.');
                    $('#messageModal').modal('show');
                    return;
                }
                if( password.length < 6 ){
                    $('#messagecontent').html('The password must be at least 6 characters long.');
                    $('#messageModal').modal('show');
                    return;
                }
            }
            var filename = $("#business_logo").val();
            if(filename != '') {
                var parts = filename.split('.');
                var filetype = parts[parts.length - 1];
                if (filetype != "jpg" && filetype != "png" && filetype != "jpeg" && filetype != "bmp") {
                    $('#messagecontent').html('Business Logo image file type is incorrectly. &nbsp;&nbsp;&nbsp;Please select correctly Image file.');
                    $('#messageModal').modal('show');
                    return;
                }
            }
            var flag = 0;
            $(".multi_pictures").each(function() {
                console.log($(this).val());
                if($(this).val() == ''){
                    flag = 1;
                }
            });

            if(flag == 1){
                $('#messagecontent').html('Pictures field does not select.');
                $('#messageModal').modal('show');
                return;
            }

            flag = 0;
            $(".multi_pictures").each(function() {
                var filename = $(this).val();
                var parts = filename.split('.');
                var filetype = parts[parts.length - 1];
                if(filetype != "jpg" && filetype != "png" && filetype != "jpeg" && filetype != "bmp") {
                    flag = 1;
                }
            });
            if(flag == 1){
                $('#messagecontent').html('Image type of pictures field is incorrectly. &nbsp;&nbsp;&nbsp;Please select correctly Image file.');
                $('#messageModal').modal('show');
                return;
            }else{
                $("#CardfindUpdateForm").submit();
            }
        }
    </script>

@stop
