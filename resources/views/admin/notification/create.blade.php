@extends('admin/layouts/default')
{{-- Page title --}}
@section('title')
    {{ _t('Add Notification', [], $_SESSION['lang']) }}
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
        <h1>{{ _t('Add Notification', [], $_SESSION['lang']) }}</h1>
        <ol class="breadcrumb">
            <li>
                <a href="">
                    <i class="livicon" data-name="home" data-size="14" data-loop="true"></i>
                    {{ _t(config('Convert.dashboard')[0], [], $_SESSION['lang']) }}
                </a>
            </li>
            <li>
                <a href="#">{{ _t('Notifications', [], $_SESSION['lang']) }}</a>
            </li>
            <li class="active">{{ _t('Add Notification', [], $_SESSION['lang']) }}</li>
        </ol>
    </section>

    <div class="panel-body" style="width:90%;margin-left:5%">

                <div class="form-group has-success" style="margin-top:20px;">
                </div>
                <form role="form" action="{{ route('admin.notification.adddata') }}" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}"/>

                    <div class="form-group has-success">
                        <label class="control-label" style="font-size: 120%" for="name">{{ _t('Notification Title', [], $_SESSION['lang']) }}</label>
                        <div>
                            <input type="text" class="form-control" name="title" value="" placeholder="notification title">
                        </div>
                    </div>
                    <div class="form-group has-success">
                        <label class="control-label" style="font-size: 120%" for="name">{{ _t('Notification Description', [], $_SESSION['lang']) }}</label>

                        <div class="row">
                            <div class="panel panel-success">
                                <div class="bootstrap-admin-panel-content">
                                    <textarea id="ckeditor_full" name="description"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group has-success">
                        <label class="control-label" style="font-size: 120%" for="name">{{ _t('Expired Date', [], $_SESSION['lang']) }}</label>
                        <div>
                            <input type="text" class="form-control pull-right" id="expired" name="expired" size="20" placeholder="expired date" value="{{ $today }}">
                        </div>
                    </div>

                    <div class="col-md-12 mar-10" style="padding-top:30px;">
                        <input type="submit" value="{{ _t('Add Notification', [], $_SESSION['lang']) }}" style="font-size: 120%" class="btn btn-success btn-block btn-md btn-responsive">
                    </div>
                </form>
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
        $("#expired").daterangepicker({
            singleDatePicker: true,
            showDropdowns: true,
            format: 'YYYY-MM-DD',
        });
    </script>

@stop
