@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
{{ _t('Edit User', [], $_SESSION['lang']) }}
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
    <h1>{{ _t('Edit User', [], $_SESSION['lang']) }}</h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('dashboard') }}">
                <i class="livicon" data-name="home" data-size="14" data-color="#000"></i>
                {{ _t('Dashboard', [], $_SESSION['lang']) }}
            </a>
        </li>
        <li><a href="#"> {{ _t('Users', [], $_SESSION['lang']) }}</a></li>
        <li class="active">{{ _t('Edit User', [], $_SESSION['lang']) }}</li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title"> <i class="livicon" data-name="users" data-size="16" data-c="#fff" data-hc="#fff" data-loop="true"></i>
                        {{ _t('Edit User', [], $_SESSION['lang']) }} : {!! $user->first_name!!} {!! $user->last_name!!}
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
                        {!! $errors->first('birthday', '<span class="help-block">:message</span>') !!}
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
                            <form id="commentForm" action="{{ route('admin.users.update', $user) }}"
                                  method="POST" id="wizard-validation" enctype="multipart/form-data" class="form-horizontal">
                                <!-- CSRF Token -->
                                <input type="hidden" name="_method" value="PATCH"/>
                                <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                                <div id="rootwizard">
                                    <ul>
                                        <li><a href="#tab1" data-toggle="tab">{{ _t('User Profile', [], $_SESSION['lang']) }}</a></li>
                                        <li><a href="#tab2" data-toggle="tab">{{ _t(config('Convert.bio')[0], [], $_SESSION['lang']) }}</a></li>
                                        <li><a href="#tab3" data-toggle="tab">{{ _t(config('Convert.address')[0], [], $_SESSION['lang']) }}</a></li>
                                        <li><a href="#tab4" data-toggle="tab">{{ _t(config('Convert.user_group')[0], [], $_SESSION['lang']) }}</a></li>
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
                                                <label for="password_confirm" class="col-sm-2 control-label">{{ _t(config('Convert.confirm_password')[0], [], $_SESSION['lang']) }}} *</label>
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
                                                <label for="birthday" class="col-sm-2 control-label">{{ _t(config('Convert.birthday')[0], [], $_SESSION['lang']) }}</label>
                                                <div class="col-sm-10">
                                                    <input id="birthday" name="birthday" type="text" class="form-control"
                                                           data-date-format="YYYY-MM-DD" value="{!! old('birthday', $user->birthday) !!}"
                                                           placeholder="yyyy-mm-dd"/>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="pic" class="col-sm-2 control-label">{{ _t(config('Convert.profile_picture')[0], [], $_SESSION['lang']) }}</label>
                                                <div class="col-sm-10">
                                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                                        <div class="fileinput-new thumbnail" style="width: 200px; height: 200px;">
                                                            @if($user->pic)
                                                                <img src="{!! url('/').'/uploads/users/'.$user->pic !!}" alt="profile pic">
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