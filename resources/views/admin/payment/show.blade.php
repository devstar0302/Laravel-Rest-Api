@extends('admin/layouts/default')
{{-- Page title --}}
@section('title')
    {{ _t('Third Party', [], $_SESSION['lang']) }}
    @parent
@stop

{{-- page level styles --}}
@section('header_styles')
    <link href="{{ asset('assets/vendors/bootstrap3-wysihtml5-bower/css/bootstrap3-wysihtml5.min.css') }}"  rel="stylesheet" media="screen"/>
    <link href="{{ asset('assets/css/pages/editor.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/vendors/jasny-bootstrap/css/jasny-bootstrap.css') }}" rel="stylesheet" />

    <link href="/vendors/daterangepicker/css/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
    <link href="/vendors/datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css" />
    <link href="/vendors/clockface/clockface.css" rel="stylesheet" type="text/css"/>
    <link href="/vendors/jasny-bootstrap/jasny-bootstrap.min.css" rel="stylesheet" type="text/css" />
@stop

{{-- Page content --}}
@section('content')

    <section class="content-header">
        <!--section starts-->
        <h1>{{ _t('Third Party', [], $_SESSION['lang']) }}</h1>
        <ol class="breadcrumb">
            <li>
                <a href="">
                    <i class="livicon" data-name="home" data-size="14" data-loop="true"></i>
                    {{ _t('Dashboard', [], $_SESSION['lang']) }}
                </a>
            </li>
            <li>
                <a href="#">{{ _t('Third Party', [], $_SESSION['lang']) }}</a>
            </li>
            <li class="active">{{ _t('Third Party', [], $_SESSION['lang']) }}</li>
        </ol>
    </section>

    <div class="panel-body" style="width:90%;margin-left:5%">

        <div class="form-group has-success" style="margin-top:20px;">
        </div>
            <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
            <input type="hidden" name="id" value="{{ $payment->id }}"/>

            <div class="form-group has-success">
                <label class="control-label" style="font-size: 120%" for="name">{{ _t('Third Party Name', [], $_SESSION['lang']) }}</label>
                <div>
                    <input type="text" class="form-control" name="name" value="{{ $payment->name }}" readonly disabled>
                </div>
            </div>
            <div class="form-group has-success">
                <label class="control-label" style="font-size: 120%" for="name">{{ _t('App ID', [], $_SESSION['lang']) }}</label>
                <div>
                    <input type="text" class="form-control" name="app_id" value="{{ $payment->app_id }}" readonly disabled>
                </div>
            </div>
            <div class="form-group has-success">
                <label class="control-label" style="font-size: 120%" for="name">{{ _t('Secret', [], $_SESSION['lang']) }}</label>
                <div>
                    <input type="text" class="form-control" name="secret" value="{{ $payment->secret }}" readonly disabled>
                </div>
            </div>
            <div class="form-group has-success">
                <label class="control-label" style="font-size: 120%" for="name">{{ _t('API Key', [], $_SESSION['lang']) }}</label>
                <div>
                    <input type="text" class="form-control" name="api_key" value="{{ $payment->api_key }}" readonly disabled>
                </div>
            </div>

            <div class="col-md-12 mar-10" style="padding-top:30px;">
                <div class="col-lg-6">
                    <input type="button" value="{{ _t('Back', [], $_SESSION['lang']) }}" style="font-size: 120%" class="btn btn-danger btn-block btn-md btn-responsive" onclick="javascript:history.back();">
                </div>
                <div class="col-lg-6">
                    <input type="button" value="{{ _t('Edit', [], $_SESSION['lang']) }}" style="font-size: 120%" class="btn btn-success btn-block btn-md btn-responsive" onclick="editPayment()">
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
    <script src="/vendors/daterangepicker/moment.min.js" type="text/javascript"></script>
    <script src="/vendors/daterangepicker/daterangepicker.js" type="text/javascript"></script>
    <script src="/vendors/datetimepicker/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
    <script src="/vendors/clockface/clockface.js" type="text/javascript"></script>
    <script src="/vendors/jasny-bootstrap/jasny-bootstrap.min.js" type="text/javascript"></script>
    <script>
        function editPayment(){
            location.href="{{ url('/admin/thirdparty/'.$payment->id.'/edit') }}";
        }
    </script>
@stop
