@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
    {{ _t('Dashboard', [], $_SESSION['lang']) }} | {{ _t(config('Convert.cms_name')[0], [], $_SESSION['lang']) }}
    @parent
@stop

{{-- page level styles --}}
@section('header_styles')

    <link href="{{ asset('/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />

    <!-- font Awesome -->
    <!--<link href="/css/styles/black.css" rel="stylesheet" type="text/css" id="colorscheme" />-->
    <link href="{{ asset('/css/panel.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/css/metisMenu.css')}}" rel="stylesheet" type="text/css" />
    <!-- end of global css -->
    <!--page level css -->
    <link href="{{ asset('/vendors/fullcalendar/css/fullcalendar.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/css/pages/calendar_custom.css')}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" media="all" href="{{ asset('/vendors/jvectormap/jquery-jvectormap.css')}}" />
    <link rel="stylesheet" href="{{ asset('/vendors/animate/animate.min.css')}}">
    <link rel="stylesheet" href="{{ asset('/css/only_dashboard.css')}}" />


    <link href="{{ asset('css/pages/piecharts.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('vendors/c3js/c3.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('vendors/morrisjs/morris.css')}}" rel="stylesheet" type="text/css" />

@stop

{{-- Page content --}}
@section('content')

    <section class="content-header">
        <h1>{{ _t(config('Convert.dashboard')[0], [], $_SESSION['lang']) }}</h1>
        <ol class="breadcrumb">
            <li class="active">
                <a href="#">
                    <i class="livicon" data-name="home" data-size="16" data-color="#333" data-hovercolor="#333"></i>
                    {{ _t(config('Convert.dashboard')[0], [], $_SESSION['lang']) }}
                </a>
            </li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 margin_10 animated fadeInLeftBig">
                <!-- Trans label pie charts strats here-->
                <div class="lightbluebg no-radius">
                    <div class="panel-body squarebox square_boxs" style="padding: 20px 8px;">
                        <div class="col-xs-12 pull-left nopadmar">
                            <div class="row">
                                <div class="square_box col-xs-7 text-right">
                                    <span>{{ _t('View Today', [], $_SESSION['lang']) }}</span>
                                    <div class="number" id="myTargetElement1"></div>
                                </div>
                                <i class="livicon  pull-right" data-name="eye-open" data-l="true" data-c="#fff" data-hc="#fff" data-s="70"></i>
                            </div>
                            <div class="row" style="display: none">
                                <div class="col-xs-6">
                                    <small class="stat-label">{{ _t('Last Week', [], $_SESSION['lang']) }}</small>
                                    <h4 id="myTargetElement1.1"></h4>
                                </div>
                                <div class="col-xs-6 text-right">
                                    <small class="stat-label">{{ _t('Last Month', [], $_SESSION['lang']) }}</small>
                                    <h4 id="myTargetElement1.2"></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 margin_10 animated fadeInUpBig">
                <!-- Trans label pie charts strats here-->
                <div class="redbg no-radius">
                    <div class="panel-body squarebox square_boxs" style="padding: 20px 8px;">
                        <div class="col-xs-12 pull-left nopadmar">
                            <div class="row">
                                <div class="square_box col-xs-7 pull-left">
                                    <span>{{ _t('Clients', [], $_SESSION['lang']) }}</span>
                                    <div class="number" id="myTargetElement2"></div>
                                </div>
                                <i class="livicon pull-right" data-name="archive-add" data-l="true" data-c="#fff" data-hc="#fff" data-s="70"></i>
                            </div>
                            <div class="row" style="display: none">
                                <div class="col-xs-6">
                                    <small class="stat-label">{{ _t('Last Week', [], $_SESSION['lang']) }}</small>
                                    <h4 id="myTargetElement2.1"></h4>
                                </div>
                                <div class="col-xs-6 text-right">
                                    <small class="stat-label">{{ _t('Last Month', [], $_SESSION['lang']) }}</small>
                                    <h4 id="myTargetElement2.2"></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-md-6 margin_10 animated fadeInDownBig">
                <!-- Trans label pie charts strats here-->
                <div class="goldbg no-radius">
                    <div class="panel-body squarebox square_boxs" style="padding: 20px 8px;">
                        <div class="col-xs-12 pull-left nopadmar">
                            <div class="row">
                                <div class="square_box col-xs-7 pull-left">
                                    <span>{{ _t('Post', [], $_SESSION['lang']) }}</span>
                                    <div class="number" id="myTargetElement3"></div>
                                </div>
                                <i class="livicon pull-right" data-name="address-book" data-l="true" data-c="#fff" data-hc="#fff" data-s="70"></i>
                            </div>
                            <div class="row" style="display: none">
                                <div class="col-xs-6">
                                    <small class="stat-label">{{ _t('Last Week', [], $_SESSION['lang']) }}</small>
                                    <h4 id="myTargetElement3.1"></h4>
                                </div>
                                <div class="col-xs-6 text-right">
                                    <small class="stat-label">{{ _t('Last Month', [], $_SESSION['lang']) }}</small>
                                    <h4 id="myTargetElement3.2"></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 margin_10 animated fadeInRightBig">
                <!-- Trans label pie charts strats here-->
                <div class="palebluecolorbg no-radius">
                    <div class="panel-body squarebox square_boxs" style="padding: 20px 8px;">
                        <div class="col-xs-12 pull-left nopadmar">
                            <div class="row">
                                <div class="square_box col-xs-7 pull-left">
                                    <span>{{ _t('Registered Users', [], $_SESSION['lang']) }}</span>
                                    <div class="number" id="myTargetElement4"></div>
                                </div>
                                <i class="livicon pull-right" data-name="users" data-l="true" data-c="#fff" data-hc="#fff" data-s="70"></i>
                            </div>
                            <div class="row" style="display: none">
                                <div class="col-xs-6">
                                    <small class="stat-label">{{ _t('Last Week', [], $_SESSION['lang']) }}</small>
                                    <h4 id="myTargetElement4.1"></h4>
                                </div>
                                <div class="col-xs-6 text-right">
                                    <small class="stat-label">{{ _t('Last Month', [], $_SESSION['lang']) }}</small>
                                    <h4 id="myTargetElement4.2"></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/row-->
        <div class="row ">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="livicon" data-name="dashboard" data-size="20" data-loop="true" data-c="#F89A14" data-hc="#F89A14"></i>
                    {{ _t('Communication Load', [], $_SESSION['lang']) }}
                    <small>- {{ _t('load on server', [], $_SESSION['lang']) }}</small>
                </h3>
            </div>
            <div class="panel-body">
                <div id="realtimechart" style="height:350px;"></div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <i class="livicon" data-name="piechart" data-size="16" data-loop="true" data-c="#000" data-hc="#000"></i>
                            {{ _t('User Distributions', [], $_SESSION['lang']) }}
                        </h3>
                    </div>
                    <div class="panel-body">
                        <div id="pie3"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <i class="livicon" data-name="piechart" data-size="16" data-loop="true" data-c="#000" data-hc="#000"></i>
                            {{ _t('Post Distributions', [], $_SESSION['lang']) }}
                        </h3>
                    </div>
                    <div class="panel-body">
                        <div id="pie1"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>

        <div class="row ">

            <div class="row">
                <div class="panel panel-border">

                    <div class="panel-heading">
                        <h4 class="panel-title pull-left">
                            <i class="livicon" data-name="map" data-size="16" data-loop="true" data-c="#515763" data-hc="#515763"></i>
                            {{ _t('Vectors Map', [], $_SESSION['lang']) }}
                        </h4>

                        <div class="btn-group pull-right">
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                <i class="livicon" data-name="settings" data-size="16" data-loop="true" data-c="#515763" data-hc="#515763"></i>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a class="panel-collapse collapses" href="#">
                                        <i class="fa fa-angle-up"></i>
                                        <span>{{ _t('Collapse', [], $_SESSION['lang']) }}</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="panel-refresh" href="#">
                                        <i class="fa fa-refresh"></i>
                                        <span>{{ _t('Refresh', [], $_SESSION['lang']) }}</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="panel-config" href="#panel-config" data-toggle="modal">
                                        <i class="fa fa-wrench"></i>
                                        <span>{{ _t('Configurations', [], $_SESSION['lang']) }}</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="panel-expand" href="#">
                                        <i class="fa fa-expand"></i>
                                        <span>{{ _t('Fullscreen', [], $_SESSION['lang']) }}</span>
                                    </a>
                                </li>
                            </ul>
                        </div>

                    </div>
                    <div class="panel-body nopadmar">
                        <div id="world-map-markers" style="width:100%; height:300px;"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@stop

{{-- page level scripts --}}
@section('footer_scripts')
    <script src="{{ asset('/js/jquery-1.11.3.min.js')}}" type="text/javascript"></script>
    <script src="/js/bootstrap.min.js" type="text/javascript"></script>
    <!--livicons-->
    <script src="{{ asset('/vendors/livicons/minified/raphael-min.js')}}" type="text/javascript"></script>
    <script src="{{ asset('/vendors/livicons/minified/livicons-1.4.min.js')}}" type="text/javascript"></script>
    <script src="/js/josh.js" type="text/javascript"></script>
    <script src="/js/metisMenu.js" type="text/javascript"></script>
    <!-- end of global js -->
    <!-- begining of page level js -->
    <!--  todolist-->
    <script src="{{ asset('/js/todolist.js')}}"></script>
    <!-- EASY PIE CHART JS -->
    <script src="{{ asset('/vendors/charts/easypiechart.min.js')}}"></script>
    <script src="{{ asset('/vendors/charts/jquery.easypiechart.min.js')}}"></script>
    <script src="{{ asset('/vendors/charts/jquery.easingpie.js')}}"></script>
    <!--for calendar-->
    <!--   Realtime Server Load  -->
    <script src="{{ asset('/vendors/charts/jquery.flot.min.js')}}" type="text/javascript"></script>
    <script src="{{ asset('/vendors/charts/jquery.flot.resize.min.js')}}" type="text/javascript"></script>
    <!--Sparkline Chart-->
    <script src="{{ asset('/vendors/charts/jquery.sparkline.js')}}"></script>
    <!-- Back to Top-->
    <script type="text/javascript" src="{{ asset('/vendors/countUp/countUp.js')}}"></script>
    <!--   maps -->
    <script src="{{ asset('/vendors/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
    <script src="{{ asset('/vendors/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
    <script src="{{ asset('/vendors/jscharts/Chart.js')}}"></script>
    <script src="{{ asset('/js/dashboard.js')}}" type="text/javascript"></script>



    <!-- begining of page level js -->
    <script type="text/javascript" src="{{ asset('vendors/charts/jquery.flot.js')}}"></script>
    <script type="text/javascript" src="{{ asset('vendors/charts/jquery.flot.pie.js')}}"></script>
    <script type="text/javascript" src="{{ asset('vendors/charts/jquery.flot.resize.js')}}"></script>
    <script type="text/javascript" src="{{ asset('vendors/d3pie/d3.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('vendors/d3pie/d3pie.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('vendors/c3js/c3.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('vendors/morrisjs/morris.min.js')}}"></script>
    <!-- end of page level js -->

    <script>
        var user_num = '{{ $user_num }}';
        var post_num = '{{ $post_num }}';
        var card_num = '{{ $card_num }}';
        var total = parseInt(user_num) + parseInt(post_num) + parseInt(card_num);

        var pie = new d3pie("#pie3", {
            size: {
                pieOuterRadius: "100%",
                canvasHeight: 350
            },
            data: {
                sortOrder: "value-asc",
                smallSegmentGrouping: {
                    enabled: true,
                    value: 2,
                    valueType: "percentage",
                    label: "Other birds"
                },
                content: [
                    { label: "Client", value: parseInt(card_num), color:"#418BCA" },
                    { label: "Post", value: parseInt(post_num), color:"#01BC8C"},
                    { label: "User", value: parseInt(user_num), color:"#F89A14"}
                ]
            },
            tooltips: {
                enabled: true,
                type: "placeholder",
                string: "{label}, {value}, {percentage}%"
            }
        });

        var pie = new d3pie("#pie1", {
            size: {
                canvasHeight: 350,
                canvasWidth: 350
            },
            data: {
                content: [
                    { label: "Sports", value: 5, color:"#418BCA" },
                    { label: "Events", value: 2, color:"#01BC8C"},
                    { label: "Flower", value: 6, color:"#F89A14"},
                    { label: "Offerts", value: 3, color:"#67C5DF"},
                    { label: "Jobs", value: 2,color:"#EF6F6C"},
                    { label: "Other", value: 2,color:"#418BCA"}
//                    { label: "Song Sparrow", value: 6,color:"#01BC8C"},
//                    { label: "Blue Jay", value: 5, color:"#01BC8C"},
//                    { label: "Black-throated Gray warbler", value: 1, color:"#F89A14"},
//                    { label: "Pelican", value: 6, color:"#67C5DF"},
//                    { label: "Bewick's Wren", value: 5, color:"#EF6F6C"},
//                    { label: "Cowbird", value: 1, color:"#EF6F6C"},
//                    { label: "Fox Sparrow", value: 6, color:"#EF6F6C"},
//                    { label: "Common Yellowthroat", value: 5, color:"#418BCA"},
//                    { label: "Virginia Rail", value: 1, color:"#418BCA"},
//                    { label: "Sora", value: 1, color:"#01BC8C"},
//                    { label: "Osprey", value: 1, color:"#01BC8C"},
//                    { label: "Merlin", value: 1, color:"#F89A14"},
//                    { label: "Kestrel", value: 1, color:"#67C5DF"}
                ]
            }
        });

        $('.jvectormap-container').css('    background-color', '#515763 !important');

        var demo = new CountUp("myTargetElement1", 12.52, total, 0, 6, options);
        demo.start();
        var demo = new CountUp("myTargetElement2", 1, card_num, 0, 6, options);
        demo.start();
        var demo = new CountUp("myTargetElement3", 24.02, post_num, 0, 6, options);
        demo.start();
        var demo = new CountUp("myTargetElement4", 1254, user_num, 0, 6, options);
        demo.start();
    </script>
@stop
