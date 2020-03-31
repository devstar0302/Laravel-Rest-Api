@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
{{ _t(config('Convert.edit_admins')[0], [], $_SESSION['lang']) }}
@parent
@stop

{{-- page level styles --}}
@section('header_styles')
<!--page level css -->
<link href="{{ asset('assets/vendors/jasny-bootstrap/css/jasny-bootstrap.css') }}" rel="stylesheet">
<link href="{{ asset('assets/vendors/select2/css/select2.min.css') }}" type="text/css" rel="stylesheet">
<link href="{{ asset('assets/vendors/select2/css/select2-bootstrap.css') }}" rel="stylesheet">
<link href="{{ asset('assets/vendors/datetimepicker/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet">
<link href="{{ asset('assets/css/pages/wizard.css') }}" rel="stylesheet">
<!--end of page level css-->
@stop

{{-- Page content --}}
@section('content')
<section class="content-header">
    <h1>{{ _t(config('Convert.edit_admins')[0], [], $_SESSION['lang']) }}</h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('dashboard') }}">
                <i class="livicon" data-name="home" data-size="14" data-color="#000"></i>
                {{ _t(config('Convert.dashboard')[0], [], $_SESSION['lang']) }}
            </a>
        </li>
        <li><a href="#"> {{ _t(config('Convert.admins')[0], [], $_SESSION['lang']) }}</a></li>
        <li class="active">{{ _t(config('Convert.edit_admins')[0], [], $_SESSION['lang']) }}</li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title"> <i class="livicon" data-name="users" data-size="16" data-c="#fff" data-hc="#fff" data-loop="true"></i>
                        {{ _t(config('Convert.edit_admins')[0], [], $_SESSION['lang']) }} : {!! $user->first_name!!} {!! $user->last_name!!}
                    </h3>
                    <span class="pull-right clickable">
                        <i class="glyphicon glyphicon-chevron-up"></i>
                    </span>
                </div>
                <div class="panel-body">
                    <!-- errors -->
                    <div class="has-error">
                        {!! $errors->first('first_name', '<span class="help-block">:message</span>') !!}
                        {!! $errors->first('email', '<span class="help-block">:message</span>') !!}
                        {!! $errors->first('password', '<span class="help-block">:message</span>') !!}
                        {!! $errors->first('password_confirm', '<span class="help-block">:message</span>') !!}
                        {!! $errors->first('group', '<span class="help-block">:message</span>') !!}
                        {!! $errors->first('pic', '<span class="help-block">:message</span>') !!}
                        {!! $errors->first('dob', '<span class="help-block">:message</span>') !!}
                        {!! $errors->first('bio', '<span class="help-block">:message</span>') !!}
                        {!! $errors->first('gender', '<span class="help-block">:message</span>') !!}
                        {!! $errors->first('country', '<span class="help-block">:message</span>') !!}
                        {!! $errors->first('state', '<span class="help-block">:message</span>') !!}
                        {!! $errors->first('city', '<span class="help-block">:message</span>') !!}
                        {!! $errors->first('address', '<span class="help-block">:message</span>') !!}
                        {!! $errors->first('postal', '<span class="help-block">:message</span>') !!}
                        {!! $errors->first('groups', '<span class="help-block">:message</span>') !!}


                    </div>

                    <!--main content-->
                    <div class="row">

                        <div class="col-md-12">
                            <form id="commentForm" action="{{ route('admin.staffs.update', $user) }}"
                                  method="POST" id="wizard-validation" enctype="multipart/form-data" class="form-horizontal">
                                <!-- CSRF Token -->
                                <input type="hidden" name="_method" value="PATCH"/>
                                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                <input type="hidden" name="user_id" value="{{ $user->id }}"/>

                                <div id="rootwizard">
                                    <ul>
                                        <li><a href="#tab1" data-toggle="tab">{{ _t(config('Convert.admin_profile')[0], [], $_SESSION['lang']) }}</a></li>
                                        <li><a href="#tab2" data-toggle="tab">{{ _t(config('Convert.bio')[0], [], $_SESSION['lang']) }}</a></li>
                                        <li><a href="#tab3" data-toggle="tab">{{ _t(config('Convert.address')[0], [], $_SESSION['lang']) }}</a></li>
                                        <li><a href="#tab4" data-toggle="tab">{{ _t(config('Convert.user_group')[0], [], $_SESSION['lang']) }}</a></li>
                                        <li><a href="#tab5" data-toggle="tab">{{ _t('Privilege', [], $_SESSION['lang']) }}</a></li>
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane" id="tab1">
                                            <h2 class="hidden">&nbsp;</h2>

                                            <div class="form-group">
                                                <label for="first_name" class="col-sm-2 control-label">{{ _t(config('Convert.first_name')[0], [], $_SESSION['lang']) }} *</label>
                                                <div class="col-sm-10">
                                                    <input id="first_name" name="first_name" type="text"
                                                           placeholder="First Name" class="form-control required"
                                                           value="{!! old('first_name', $user->first_name) !!}"/>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="first_name" class="col-sm-2 control-label">{{ _t(config('Convert.last_name')[0], [], $_SESSION['lang']) }} *</label>
                                                <div class="col-sm-10">
                                                    <input id="last_name" name="last_name" type="text"
                                                           placeholder="Last Name" class="form-control required"
                                                           value="{!! old('last_name', $user->last_name) !!}"/>
                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <label for="email" class="col-sm-2 control-label">{{ _t(config('Convert.email')[0], [], $_SESSION['lang']) }} *</label>
                                                <div class="col-sm-10">
                                                    <input id="email" name="email" placeholder="E-Mail" type="text"
                                                           class="form-control required email"
                                                           value="{!! old('email', $user->email) !!}"/>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <p class="text-warning" style="    margin-left: 18%;">{{ _t(config('Convert.password_leave_message')[0], [], $_SESSION['lang']) }}</p>
                                                <label for="password" class="col-sm-2 control-label">{{ _t(config('Convert.password')[0], [], $_SESSION['lang']) }} *</label>
                                                <div class="col-sm-10">
                                                    <input id="password" name="password" type="password" placeholder="Password"
                                                           class="form-control" value="{!! old('password') !!}"/>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="password_confirm" class="col-sm-2 control-label">{{ _t(config('Convert.confirm_password')[0], [], $_SESSION['lang']) }} *</label>
                                                <div class="col-sm-10">
                                                    <input id="password_confirm" name="password_confirm" type="password"
                                                           placeholder="Confirm Password " class="form-control"
                                                           value="{!! old('password_confirm') !!}"/>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="tab-pane" id="tab2" disabled="disabled">
                                            <h2 class="hidden">&nbsp;</h2>
                                            <div class="form-group">
                                                <label for="dob" class="col-sm-2 control-label">{{ _t(config('Convert.birthday')[0], [], $_SESSION['lang']) }}</label>
                                                <div class="col-sm-10">
                                                    <input id="dob" name="dob" type="text" class="form-control"
                                                           data-date-format="YYYY-MM-DD" value="{!! old('dob', $user->dob) !!}"
                                                           placeholder="yyyy-mm-dd"/>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="pic" class="col-sm-2 control-label">{{ _t(config('Convert.profile_picture')[0], [], $_SESSION['lang']) }}</label>
                                                <div class="col-sm-10">
                                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                                        <div class="fileinput-new thumbnail" style="width: 200px; height: 200px;">
                                                            @if($user->pic)
                                                                <img src="{!! url('/').'/uploads/staffs/'.$user->pic !!}" alt="profile pic">
                                                            @else
                                                                <img src="http://placehold.it/200x200" alt="profile pic">
                                                            @endif
                                                        </div>
                                                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 200px;"></div>
                                                        <div>
                                                    <span class="btn btn-default btn-file">
                                                        <span class="fileinput-new">{{ _t(config('Convert.select_image')[0], [], $_SESSION['lang']) }}</span>
                                                        <span class="fileinput-exists">{{ _t(config('Convert.change')[0], [], $_SESSION['lang']) }}</span>
                                                        <input id="pic" name="pic_file" type="file"
                                                               class="form-control"/>
                                                    </span>
                                                            <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput" style="color: black !important;">{{ _t(config('Convert.remove')[0], [], $_SESSION['lang']) }}</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="bio" class="col-sm-2 control-label">{{ _t(config('Convert.bio')[0], [], $_SESSION['lang']) }} <small>({{ _t(config('Convert.brief_intro')[0], [], $_SESSION['lang']) }})</small></label>
                                                <div class="col-sm-10">
                                            <textarea name="bio" id="bio" class="form-control"
                                                      rows="4">{!! old('bio', $user->bio) !!}</textarea>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="tab-pane" id="tab3" disabled="disabled">
                                            <div class="form-group">
                                                <label for="email" class="col-sm-2 control-label">{{ _t(config('Convert.gender')[0], [], $_SESSION['lang']) }} </label>
                                                <div class="col-sm-10">
                                                    <select class="form-control" title="Select Gender..." name="gender">
                                                        <option value="">{{ config('Convert.select')[0] }}</option>
                                                        <option value="male" @if($user->gender === 'male') selected="selected" @endif >{{ config('Convert.male')[0] }}</option>
                                                        <option value="female" @if($user->gender === 'female') selected="selected" @endif >{{ config('Convert.female')[0] }}</option>
                                                        <option value="other" @if($user->gender === 'other') selected="selected" @endif >{{ config('Convert.other')[0] }}</option>

                                                    </select>
                                                </div>
                                            </div>
                                            <input type="hidden" name="country" value="MY">

                                            <!--<div class="form-group required">
                                                <label for="country" class="col-sm-2 control-label">{{ config('Convert.country')[0] }} </label>
                                                <div class="col-sm-10">
                                                    {!! Form::select('country', $countries,old('country',$user->country),array('class' => 'form-control')) !!}
                                                    <input type="hidden" name="country" value="MY">
                                                </div>
                                            </div>-->

                                            <div class="form-group">
                                                <label for="state" class="col-sm-2 control-label">{{ _t(config('Convert.state')[0], [], $_SESSION['lang']) }} </label>
                                                <div class="col-sm-10">
                                                    <input id="state" name="state" type="text" class="form-control"
                                                           value="{!! old('state', $user->state) !!}"/>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="city" class="col-sm-2 control-label">{{ _t(config('Convert.cities')[0], [], $_SESSION['lang']) }} </label>
                                                <div class="col-sm-10">
                                                    <input id="city" name="city" type="text" class="form-control"
                                                           value="{!! old('city', $user->city) !!}"/>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="address" class="col-sm-2 control-label">{{ _t(config('Convert.address')[0], [], $_SESSION['lang']) }} </label>
                                                <div class="col-sm-10">
                                                    <input id="address" name="address" type="text" class="form-control"
                                                           value="{!! old('address', $user->address) !!}"/>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="postal" class="col-sm-2 control-label">{{ _t(config('Convert.postal_code')[0], [], $_SESSION['lang']) }}</label>
                                                <div class="col-sm-10">
                                                    <input id="postal" name="postal" type="text" class="form-control"
                                                           value="{!! old('postal', $user->postal) !!}"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="tab4" disabled="disabled">
                                            <div class="form-group">
                                                <label for="group" class="col-sm-2 control-label">{{ _t(config('Convert.user_group')[0], [], $_SESSION['lang']) }} *</label>
                                                <div class="col-sm-10">
                                                    <select class="form-control " title="Select group..." name="groups[]" id="groups" required>
                                                        <option value="">{{ config('Convert.select')[0] }}</option>
                                                        @foreach($roles as $role)
                                                            <option value="{!! $role->id !!}" {{ (array_key_exists($role->id, $userRoles) ? ' selected="selected"' : '') }}>{{ $role->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="activate" class="col-sm-2 control-label"> </label>
                                                <div class="col-sm-10">
                                                    <input id="activate" name="activate" type="hidden" class="pos-rel p-l-30" value="1" @if($status) checked="checked" @endif  >
                                                <span></span>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                            $privilege_r_list = explode(",", $user->privilege_r);
                                            $privilege_w_list = explode(",", $user->privilege_w);
                                        ?>
                                        <div class="tab-pane" id="tab5" disabled="disabled">
                                            <input id="privilege_r" name="privilege_r" type="hidden"  value="{{ $user->privilege_r }}"/>
                                            <input id="privilege_w" name="privilege_w" type="hidden"  value="{{ $user->privilege_w }}"/>
                                            <h5 id="privilege_warning" style="display: none; color: #D2413A">You must select a privilege at least</h5>
                                            <div class="form-group" style="margin-bottom: 10px">
                                                <label class="col-sm-2 control-label"></label>
                                                <div class="col-sm-10" style="display: inline-flex">
                                                    <label class="control-label" style="margin-right: 40px;">Read</label>
                                                    <label class="control-label">Write</label>
                                                </div>
                                            </div>
                                            <div class="form-group" style="margin-bottom: 10px">
                                                <label for="cardfinds" class="col-sm-2 control-label">{{ _t('Cardfinds', [], $_SESSION['lang']) }} </label>
                                                <div class="col-sm-10" style="display: inline-flex">
                                                    <input id="cardfinds_r" type="checkbox" onclick="setPrivilege_r('-1','cardfinds')"
                                                           {{in_array("cardfinds", $privilege_w_list)? 'disabled':(in_array("cardfinds", $privilege_r_list)? 'checked':'')}} class="form-control" style="width:16px;height:16px;margin-top:9px;margin-left:8px;margin-right:55px;"/>
                                                    <input id="cardfinds_w" type="checkbox" onclick="setPrivilege_w('-1','cardfinds')"
                                                           {{in_array("cardfinds", $privilege_w_list)? 'checked':''}} class="form-control" style="width:16px;height:16px;margin-top:9px"/>
                                                </div>
                                            </div>
                                            <?php
                                            $sections = \DB::table('findmiin_section')->select(['name'])->get();
                                            $num = 0;
                                            ?>
                                            <input type="hidden" id="section_lenght" value="{{count($sections)}}">
                                            <?php
                                            foreach($sections as $section){
                                            $num++;
                                            ?>
                                            <div class="form-group" style="margin-bottom: 10px">
                                                <label class="col-sm-2 control-label">{{ _t($section->name, [], $_SESSION['lang']) }} </label>
                                                <div class="col-sm-10" style="display: inline-flex">
                                                    <input id="section_r_{{ $num }}" value="{{ $section->name }}" onclick="setPrivilege_r('{{ $num }}','{{ $section->name }}')" type="checkbox" class="form-control"
                                                           {{in_array($section->name, $privilege_w_list)? 'disabled':(in_array($section->name, $privilege_r_list)? 'checked':'')}} style="width:16px;height:16px;margin-top:9px;margin-left: 8px;margin-right: 55px;"/>
                                                    <input id="section_w_{{ $num }}" value="{{ $section->name }}" onclick="setPrivilege_w('{{ $num }}','{{ $section->name }}')" type="checkbox" class="form-control"
                                                           {{in_array($section->name, $privilege_w_list)? 'checked':''}} style="width:16px;height:16px;margin-top:9px"/>
                                                </div>
                                            </div>
                                            <?php } ?>
                                            <div class="form-group" style="margin-bottom: 10px">
                                                <label for="jobs" class="col-sm-2 control-label">{{ _t('Jobs', [], $_SESSION['lang']) }} </label>
                                                <div class="col-sm-10" style="display: inline-flex">
                                                    <input id="jobs_r" type="checkbox" onclick="setPrivilege_r('-1','jobs')" class="form-control"
                                                           {{in_array('jobs', $privilege_w_list)? 'disabled':(in_array('jobs', $privilege_r_list)? 'checked':'')}} style="width:16px;height:16px;margin-top:9px;margin-left: 8px;margin-right: 55px;"/>
                                                    <input id="jobs_w" type="checkbox" onclick="setPrivilege_w('-1','jobs')" class="form-control"
                                                           {{in_array('jobs', $privilege_w_list)? 'checked':''}} style="width:16px;height:16px;margin-top:9px"/>
                                                </div>
                                            </div>
                                        </div>
                                        <ul class="pager wizard">
                                            <li class="previous"><a href="#">{{ _t(config('Convert.previous')[0], [], $_SESSION['lang']) }}</a></li>
                                            <li class="next"><a href="#">{{ _t(config('Convert.next')[0], [], $_SESSION['lang']) }}</a></li>
                                            <li class="next finish" style="display:none;"><a href="javascript:;">{{ _t(config('Convert.finish')[0], [], $_SESSION['lang']) }}</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!--main content end--> 
                </div>
            </div>
        </div>
    </div>
    <!--row end-->
</section>
@stop

{{-- page level scripts --}}
@section('footer_scripts')
    <script src="{{ asset('assets/vendors/moment/js/moment.min.js') }}" ></script>
    <script src="{{ asset('assets/vendors/jasny-bootstrap/js/jasny-bootstrap.js') }}"  type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/select2/js/select2.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/bootstrapwizard/jquery.bootstrap.wizard.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/bootstrapvalidator/js/bootstrapValidator.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/datetimepicker/js/bootstrap-datetimepicker.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/pages/edituser.js') }}"></script>
@stop
<script>
    function setPrivilege_r(num,str){
        var val = "";
        var count = $("#section_lenght").val();
        if(num == '-1') {
            if ($('#' + str + '_r').prop('checked') == true) {
                $('#' + str + '_r').prop('checked', true);
            } else {
                $('#' + str + '_r').prop('checked', false);
            }
        }else{
            if ($('#section_r_' + num).prop('checked') == true) {
                $('#section_r_' + num).prop('checked', true);
            } else {
                $('#section_r_' + num).prop('checked', false);
            }
        }

        if ($('#cardfinds_r').prop('checked') == true) {
            val = "cardfinds";
        }
        if ($('#jobs_r').prop('checked') == true) {
            if(val=="")
                val = "jobs";
            else
                val = val + "," + "jobs";
        }
        for(var i=1; i<=parseInt(count); i++){
            if ($('#section_r_' + i).prop('checked') == true) {
                if(val=="")
                    val = $('#section_r_' + i).val();
                else
                    val = val + "," + $('#section_r_' + i).val();
            }
        }
        $("#privilege_r").val(val);
        console.log(val);
    }
    function setPrivilege_w(num,str){
        var val = "";
        var count = $("#section_lenght").val();
        if(num == '-1') {
            if ($('#' + str +'_w').prop('checked') == true) {
                $('#' + str+ '_w').prop('checked', true);
                $('#' + str+ '_r').prop('checked', false);
                $('#' + str+ '_r').attr("disabled", true);
            } else {
                $('#' + str +'_w').prop('checked', false);
                $('#' + str +'_r').prop('checked', false);
                $('#' + str+ '_r').removeAttr("disabled");
            }
        }else{
            if ($('#section_w_' + num).prop('checked') == true) {
                $('#section_w_' + num).prop('checked', true);
                $('#section_r_' + num).prop('checked', false);
                $('#section_r_' + num).attr("disabled", true);
            } else {
                $('#section_w_' + num).prop('checked', false);
                $('#section_r_' + num).prop('checked', false);
                $('#section_r_' + num).removeAttr("disabled");
            }
        }

        if ($('#cardfinds_w').prop('checked') == true) {
            val = "cardfinds";
        }
        if ($('#jobs_w').prop('checked') == true) {
            if(val=="")
                val = "jobs";
            else
                val = val + "," + "jobs";
        }
        for(var i=1; i<=parseInt(count); i++){
            if ($('#section_w_' + i).prop('checked') == true) {
                if(val=="")
                    val = $('#section_w_' + i).val();
                else
                    val = val + "," + $('#section_w_' + i).val();
            }
        }
        $("#privilege_w").val(val);
        console.log(val);
    }
</script>