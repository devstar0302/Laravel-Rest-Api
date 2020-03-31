@extends('admin/layouts/default')
{{-- Page title --}}
@section('title')
    Detail Cardfind
    @parent
@stop

{{-- page level styles --}}
@section('header_styles')
    <link href="{{ asset('assets/vendors/bootstrap3-wysihtml5-bower/css/bootstrap3-wysihtml5.min.css') }}"  rel="stylesheet" media="screen"/>
    <link href="{{ asset('assets/css/pages/editor.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/vendors/jasny-bootstrap/css/jasny-bootstrap.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/jquery.rateyo.min.css') }}" rel="stylesheet" />

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
        <h1>Detail Card</h1>
        <ol class="breadcrumb">
            <li>
                <a href="">
                    <i class="livicon" data-name="home" data-size="14" data-loop="true"></i>
                    {{ config('Convert.dashboard')[0] }}
                </a>
            </li>
            <li>
                <a href="#">Detail Cardfind</a>
            </li>
            <li class="active">Client</li>
        </ol>
    </section>

    <div class="panel-body" style="width:90%;margin-left:5%">

                <div class="form-group has-success" style="margin-top:20px;">
                </div>
                <!--<form role="form" action="{{ route('admin.cardfinds.adddata') }}" method="POST" enctype="multipart/form-data">-->
                    <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                    <input type="hidden" name="type" value="{{ $type }}"/>


                    <div class="form-group has-success row">
                        <div class="col-md-6">
                            <label class="control-label" style="font-size: 120%" for="name">Business Name</label>
                            <div>
                                <input type="text" class="form-control" disabled name="business_name" value="{{ $client->business_name }}" >
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="control-label" style="font-size: 120%" for="name">Business Phone Number</label>
                            <div>
                                <input type="text" class="form-control" name="business_phone_number" disabled value="{{ $client->business_phone_number }}" >
                            </div>
                        </div>
                    </div>
                    <div class="form-group has-success row">
                        <label class="control-label" style="width:100%;font-size: 120%;padding: 0px 15px;" for="name">Business Address</label>
                        <div class="col-md-3">
                            <label class="control-label" style="font-size: 100%;" for="name">Address</label>
                            <div>
                                <input type="text" class="form-control" disabled name="business_address" value="{{ $client->business_address }}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label class="control-label" style="font-size: 100%;" for="name">City</label>
                            <div>
                                <input type="text" class="form-control" disabled name="business_city" value="{{ $client->business_city }}" >
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label class="control-label" style="font-size: 100%;" for="name">State</label>
                            <div>
                                <input type="text" class="form-control" disabled name="business_state" value="{{ $client->business_state }}" >
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label class="control-label" style="font-size: 100%;" for="name">Country</label>
                            <div>
                                <input type="text" class="form-control" disabled name="business_country" value="{{ $client->business_country }}" >
                            </div>
                        </div>
                    </div>
                    <div class="form-group has-success row">
                        <div class="col-md-6">
                            <label class="control-label" style="font-size: 120%" for="name">Business Latitude</label>
                            <div>
                                <input type="text" class="form-control" name="business_lat" disabled value="{{ $client->business_lat }}" >
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="control-label" style="font-size: 120%" for="name">Business Longitude</label>
                            <div>
                                <input type="text" class="form-control" name="business_lon" disabled value="{{ $client->business_lon }}" >
                            </div>
                        </div>
                    </div>
                    <div class="form-group has-success row">
                        <div class="col-md-6">
                            <label class="control-label" style="font-size: 120%" for="name">Manager Name</label>
                            <div>
                                <input type="text" class="form-control" name="manager_name" disabled value="{{ $client->manager_name }}" >
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="control-label" style="font-size: 120%" for="name">Manager Phone Number</label>
                            <div>
                                <input type="text" class="form-control" name="manager_phone_number" disabled value="{{ $client->manager_phone_number }}" >
                            </div>
                        </div>
                    </div>

                    <div class="form-group has-success row">
                        <div class="col-md-12">
                            <label class="control-label" style="font-size: 120%" for="name">Business Description</label>
                            <textarea class="form-control" rows="3" id="business_short_description" disabled value="" name="business_short_description">{{ $client->business_short_description }}</textarea>
                        </div>
                    </div>
                    <div class="form-group has-success row">
                        <div class="col-md-12">
                            <label class="control-label" style="font-size: 120%" for="name">Business Information</label>
                            <textarea class="form-control" rows="3" id="business_information" disabled value="" name="business_information">{{ $client->business_information }}</textarea>
                        </div>
                    </div>

                    <div class="form-group has-success" style="padding: 0px 15px;">
                        <label class="control-label" style="font-size: 120%" for="name">Logo</label>
                        <div>
                            <div class="form-group">
                                <img src="/uploads/card_logo/{{ $client->logo }}" style="max-width: 200px; min-height: 100px;">
                            </div>
                        </div>
                    </div>
                    <div class="form-group has-success " style="padding: 0px 15px;">
                        <label for="full_name"  style="display: inline-flex; font-size: 120%" class="control-label">Pictures<span style="display:{{ $client->pictures == ''?'block':'none' }}">&nbsp;&nbsp;:&nbsp;&nbsp;No</span></label>
                        <?php
                            if($client->pictures != ''){
                                $picture_list = explode(",", $client->pictures);
                        ?>
                        <div id="banner-slider-demo-1" class="owl-carousel owl-banner-carousel owl-middle-narrow" style="width:500px;">
                            @foreach($picture_list as $picture)
                            <div>
                                <img src="{{ url('/').'/uploads/card_picture/'.$picture }}" alt="Sample slide" style="max-width: 500px; min-height: 200px;"/>
                            </div>
                            @endforeach

                        </div>
                        <?php } ?>
                        <style>
                            .owl-next{    position: absolute;
                                right: 10px;
                                top: 40%;
                                font-size: 30px;
                                color: orange;
                                font-weight: bold;}
                            .owl-prev{    position: absolute;
                                left: 10px;
                                top: 40%;
                                font-size: 30px;
                                color: orange;
                                font-weight: bold;}
                        </style>
                        <script type="text/javascript">
                            $("#banner-slider-demo-1").owlCarousel({
                                items: 1,
                                autoplay: true,
                                autoplayTimeout: 3000,
                                autoplayHoverPause: true,
                                dots: false,
                                nav: true,
                                navRewind: true,
                                animateIn: 'fadeIn',
                                animateOut: 'fadeOut',
                                loop: true,
                                navText: ["<em class='fa fa-angle-left'></em>", "<em class='fa fa-angle-right'></em>"]
                            });
                        </script>

                    </div>
                    <div class="form-group has-success row">
                        <label class="control-label" style="width:100%;padding:0px 15px;font-size: 120%" for="name">Open Hours</label>
                        <div class="col-md-3">
                            <label class="control-label" style="font-size: 100%" for="name">Monday~Friday Start Time</label>
                            <div>
                                <input type="text" class="form-control pull-right" disabled id="open_hour_mon_fri_from" name="open_hour_mon_fri_from" size="20" value="{{ $client->open_hour_mon_fri_from }}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label class="control-label" style="font-size: 100%" for="name">Monday~Friday End Time</label>
                            <div>
                                <input type="text" class="form-control pull-right" disabled id="open_hour_mon_fri_to" name="open_hour_mon_fri_to" size="20" value="{{ $client->open_hour_mon_fri_to }}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label class="control-label" style="font-size: 100%" for="name">Saturday Start Time</label>
                            <div>
                                <input type="text" class="form-control pull-right" disabled id="open_hour_sat_from" name="open_hour_sat_from" size="20" value="{{ $client->open_hour_sat_from }}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label class="control-label" style="font-size: 100%" for="name">Saturday End Time</label>
                            <div>
                                <input type="text" class="form-control pull-right" disabled id="open_hour_sat_to" name="open_hour_sat_to" size="20" value="{{ $client->open_hour_sat_to }}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group has-success row">
                        <div class="col-md-3">
                            <label class="control-label" style="font-size: 100%" for="name">Sunday Start Time</label>
                            <div>
                                <input type="text" class="form-control pull-right" disabled id="open_hour_sun_from" name="open_hour_sun_from" size="20" value="{{ $client->open_hour_sun_from }}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label class="control-label" style="font-size: 100%" for="name">Sunday End Time</label>
                            <div>
                                <input type="text" class="form-control pull-right" disabled id="open_hour_sun_to" name="open_hour_sun_to" size="20" value="{{ $client->open_hour_sun_to }}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group has-success row">
                        <div class="col-md-6">
                            <label class="control-label" style="font-size: 120%" for="name">Contract Start Date</label>
                            <div>
                                <input type="text" class="form-control pull-right" id="contract_start_date" disabled value="{{ $client->contract_start_date }}" name="contract_start_date" size="20" value="{{ $today }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="control-label" style="font-size: 120%" for="name">Contract End Date</label>
                            <div>
                                <input type="text" class="form-control pull-right" id="contract_end_date" disabled value="{{ $client->contract_end_date }}" name="contract_end_date" size="20" value="{{ $today }}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group has-success row">
                        <div class="col-md-12">
                            <label class="control-label" style="font-size: 120%" for="name">Keywords</label>
                            <div>
                                <input type="text" class="form-control" name="keywords" disabled value="{{ $client->keywords }}" >
                            </div>
                        </div>
                    </div>
                    <div class="form-group has-success row">
                        <div class="col-md-12">
                            <label class="control-label" style="font-size: 120%" for="name">Category</label>
                            <div>
                                <input type="text" class="form-control" name="category" disabled value="{{ $client->category }}" >
                            </div>
                        </div>
                    </div>
                    <div class="form-group has-success row">
                        <div class="col-md-12">
                            <label class="control-label" style="font-size: 120%" for="name">Comments</label>
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
                                    ?>
                                    <tr>
                                        <td>{{ $num }}</td>
                                        <td>{{ $comment->visitor_name }}</td>
                                        <td><div class="comment_rating_view" data-rateyo-rating="{{ $rating }}%"></div></td>
                                        <td>{{ $comment->content }}</td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="form-group has-success row">
                            <div class="col-md-12">
                                <label class="control-label" style="font-size: 120%" for="name">Facebook Link</label>
                                <div>
                                    <input type="text" class="form-control pull-right" disabled id="facebook_link" name="facebook_link" size="20" value="{{$client->facebook_link}}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group has-success row">
                            <div class="col-md-12">
                                <label class="control-label" style="font-size: 120%" for="name">Google Plus Link</label>
                                <div>
                                    <input type="text" class="form-control pull-right" disabled id="google_plus_link" name="google_plus_link" size="20" value="{{$client->google_plus_link}}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group has-success row">
                            <div class="col-md-12">
                                <label class="control-label" style="font-size: 120%" for="name">Twitter Link</label>
                                <div>
                                    <input type="text" class="form-control pull-right" disabled id="twitter_link" name="twitter_link" size="20" value="{{$client->twitter_link}}">
                                </div>
                            </div>
                        </div>
                    </div>



                    <div class="col-md-12 mar-10" style="padding-top:30px;">
                        <div class="col-lg-6">
                        <input type="button" value="{{ config('Convert.back')[0] }}" style="font-size: 120%" class="btn btn-danger btn-block btn-md btn-responsive" onclick="javascript:history.back();">
                        </div>
                        <div class="col-lg-6">
                        <input type="submit" value="Edit Card" style="font-size: 120%" class="btn btn-success btn-block btn-md btn-responsive" onclick="editAdvertise()">
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
    <script src="{{ asset('assets/js/jquery.rateyo.min.js') }}" ></script>
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
        });
        $("#expired").daterangepicker({
            singleDatePicker: true,
            showDropdowns: true,
            format: 'YYYY-MM-DD',
        });
        function editAdvertise(){
            location.href="{{ url('/admin/cardfinds/'.$client->id.'/edit') }}";
        }
    </script>

@stop
