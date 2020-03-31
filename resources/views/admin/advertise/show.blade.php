@extends('admin/layouts/default')
{{-- Page title --}}
@section('title')
    {{ config('Convert.advertise_detail')[0] }}
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
        <h1>{{ config('Convert.advertise_detail')[0] }}</h1>
        <ol class="breadcrumb">
            <li>
                <a href="">
                    <i class="livicon" data-name="home" data-size="14" data-loop="true"></i>
                    {{ config('Convert.dashboard')[0] }}
                </a>
            </li>
            <li>
                <a href="#">{{ config('Convert.advertises')[0] }}</a>
            </li>
            <li class="active">{{ config('Convert.advertise_detail')[0] }}</li>
        </ol>
    </section>

    <div class="panel-body" style="width:90%;margin-left:5%">

                <div class="form-group has-success" style="margin-top:20px;">
                </div>
                <!--<form role="form" action="{{ route('admin.advertise.adddata') }}" method="POST" enctype="multipart/form-data">-->
                    <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                    <input type="hidden" name="type" value="{{ $type }}"/>

                    <div class="form-group has-success">
                        <label class="control-label" style="font-size: 120%" for="name">{{ config('Convert.advertise_title')[0] }}</label>
                        <div>
                            <input type="text" class="form-control" name="title" value="{{ $advertise->title }}" placeholder="advertise title" disabled>
                        </div>
                    </div>
                    <div class="form-group has-success">
                        <label class="control-label" style="font-size: 120%" for="name">{{ config('Convert.advertise_description')[0] }}</label>

                        <div class="row">
                            <div class="panel panel-success">
                                <div class="bootstrap-admin-panel-content">
                                    <textarea id="ckeditor_full" name="description" disabled>{{ $advertise->description }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group has-success">
                        <label class="control-label" style="font-size: 120%" for="name">{{ config('Convert.advertise_photo')[0] }}</label>
                        <div>
                            <div class="form-group">
                                <img src="/uploads/files/advertises/{{ $advertise->photo }}" style="max-width: 500px; min-height: 200px;">
                            </div>
                        </div>
                    </div>
                    <div class="form-group has-success">
                        <label class="control-label" style="font-size: 120%" for="name">{{ config('Convert.advertise_weburl')[0] }}</label>
                        <div>
                            <input type="text" class="form-control" name="weburl" value="{{ $advertise->weburl }}" placeholder="advertise web url" disabled>
                        </div>
                    </div>
                    <div class="form-group has-success">
                        <label class="control-label" style="font-size: 120%" for="name">{{ config('Convert.advertise_expired_date')[0] }}</label>
                        <div>
                            <input type="text" class="form-control pull-right" id="expired" name="expired" size="20" disabled placeholder="expired date" value="{{ $advertise->expired }}">
                        </div>
                    </div>

                    <div class="col-md-12 mar-10" style="padding-top:30px;">
                        <div class="col-lg-6">
                        <input type="button" value="{{ config('Convert.back')[0] }}" style="font-size: 120%" class="btn btn-danger btn-block btn-md btn-responsive" onclick="javascript:history.back();">
                        </div>
                        <div class="col-lg-6">
                        <input type="submit" value="{{ config('Convert.edit_advertise')[0] }}" style="font-size: 120%" class="btn btn-success btn-block btn-md btn-responsive" onclick="editAdvertise()">
                        </div>
                    </div>
                <!--</form>-->
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
        function editAdvertise(){
            location.href="{{ url('/admin/advertise/'.$advertise->id.'/edit') }}";
        }
    </script>

@stop
