<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">
    <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
    <!--<link rel="stylesheet" type="text/css" media="all" href="/css/hamburger.css"/>-->
    <link rel="stylesheet" type="text/css" href="/css/custom.css">
    <script type="text/javascript" src="/js/jquery.min.js"></script>
    <script type="text/javascript" src="/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="/pushmenu/css/style.css">
    <!--<script type="text/javascript" src="/js/jquery-ui.min.js"></script>-->

    <!--<script src="/js/hamburger.js"></script>-->
    <!--end of global css-->
    <!--page level css starts-->
    <![endif]-->
    <title>
    	@section('title')
        | 格安ホームページ制作パック　ヒアリングフォーム
        @show
    </title>
    <!--page level css-->
    @yield('header_styles')
    <!--end of page level css-->
</head>
<script>
    $(function() {

        var screenwidth = window.innerWidth;
        if (screenwidth < 900) {
            $('#mainheader').css('display', 'none');
        }
    });
</script>
<body style="margin-left: auto;margin-right: auto;color:#555;">
    <!-- Header Start -->
    <div id="o-wrapper" class="o-wrapper">
    <header id="mainheader" style="background-color: #fafafa;">
        <!-- Icon Section Start -->
        <div class="header" style="margin-bottom:0px;">
            <div class="container" style="width:100%">
                <div id="leftheader" class="row" style="text-align: center;padding-bottom:5px;">
                    <h3 id="headerlogo" style="margin-top:10px;"><img src="img/motocle-logo.png" style="width:200px;height:auto"/></h3>
                    <div id="hamburger">
                        <div></div>
                        <div></div>
                        <div></div>
                    </div>
                </div>
                <?php
                    $company_name = '';
                    $name = '';
                if(!empty(Sentinel::getuser())){
                    $company_name = Sentinel::getuser()->company_name;
                    $name = Sentinel::getuser()->first_name.' '.Sentinel::getuser()->last_name;
                }
                ?>
                <div id="middleheader" class="row" style="text-align: center">
                    <span style="font-size: 16px;">会社名&nbsp;&nbsp;&nbsp;&nbsp;{{ $company_name }}</span>
                    <br>
                    <span style="font-size: 20px;">お名前 &nbsp;&nbsp;&nbsp;&nbsp;{{ $name }} &nbsp;&nbsp;&nbsp;<a href="/logout" style="text-decoration:none;font-size:12px;">ログアウト</a></span>
                    <br>
                    <span style="font-size: 16px;">ヒアリングフォーム</span>
                </div>
            </div>
        </div>
        <!-- //Icon Section End -->
        <!-- Nav bar Start -->
        <nav class="navbar navbar-default container" style="width: auto !important; float:left">

            <div class="collapse navbar-collapse col-md-4 col-md-offset-4" id="collapse" style="text-align: center;width: auto;">
                <ul class="nav navbar-nav">
                    <li {!! (Request::is('/') ? 'class="active"' : '') !!}><a class="navibt" href="{{ route('home') }}" style="padding: 5px 10px;"> トップページ</a></li>
                    <li {!! (Request::is('about') ? 'class="active"' : '') !!}><a class="navibt" href="{{ route('about') }}" style="padding: 5px 10px;"> 会社概要</a></li>
                    <li {!! (Request::is('service1') ? 'class="active"' : '') !!}><a class="navibt" href="{{ route('service1') }}" style="padding: 5px 10px;"> サービス１</a></li>
                    <li {!! (Request::is('service2') ? 'class="active"' : '') !!}><a class="navibt" href="{{ route('service2') }}" style="padding: 5px 10px;"> サービス２</a></li>
                    <li {!! (Request::is('option') ? 'class="active"' : '') !!}><a class="navibt" href="{{ route('option') }}" style="padding: 5px 10px;"> オプション</a></li>

                </ul>
            </div>
            <div id="savebuttondiv" style="float:left">
                <div href="#" class="btn btn-primary btn-success" style="font-size: 15px;padding: 3px 15px;" role="button" onclick="saveHome()">内容を保存する</div>
                <div style="color: #aaa;font-size:10px;">
                    <?php
                    if(!empty($home)){
                    $last = date('Y/m/d H:i:s', strtotime($home->updated_at));
                    ?>
                    <i>前回保存: {{ $last }}</i><br>
                    <?php
                    }else if(!empty($about)){
                        $last = date('Y/m/d H:i:s', strtotime($about->updated_at));
                        ?>
                        <i>前回保存: {{ $last }}</i><br>
                    <?php
                    }else if(!empty($service1)){
                        $last = date('Y/m/d H:i:s', strtotime($service1->updated_at));
                        ?>
                        <i>前回保存: {{ $last }}</i><br>
                    <?php
                    }else if(!empty($service2)){
                        $last = date('Y/m/d H:i:s', strtotime($service2->updated_at));
                        ?>
                        <i>前回保存: {{ $last }}</i><br>
                    <?php
                    }else if(!empty($option)){
                        $last = date('Y/m/d H:i:s', strtotime($option->updated_at));
                        ?>
                        <i>前回保存: {{ $last }}</i><br>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </nav>
        <hr style="margin-top: 6px;display:none">
        <!-- Nav bar End -->
    </header>
        <header class="o-header">
            <nav class="o-header-nav" style="background-color: #fff;border-bottom:3px solid #1886ea;">
                <a href="/" class="o-header-nav__link" style="padding-left: 10%;"><img src="img/motocle-logo.png" style="width:200px;height:auto"/></a>
                <button id="c-button--slide-right" class="c-button" style="    padding: 7px 20px;border: 2px solid #fff;;color:#1886ea;font-size:24px;"><i class="fa fa-bars"></i></button>
            </nav>
        </header><!-- /o-header -->
    <!-- //Header End -->
    <!-- slider / breadcrumbs section -->
    @yield('top')
    <!-- Content -->
    @yield('content')

    <!-- Footer Section Start -->
    <footer  style="background-color: #fafafa;">
        <div class="container footer-text" style="width: 100%">
            <!-- About Us Section Start -->
            <div class="col-sm-4" style="width: 100%">
                <hr>
                <ul class="list-inline" style="text-align: center;margin-top:10px;">
                    <li {!! (Request::is('/') ? 'class="active"' : '') !!}><a href="{{ route('home') }}"> トップページ</a></li>
                    <li {!! (Request::is('about') ? 'class="active"' : '') !!}><a href="{{ route('about') }}"> 会社概要</a></li>
                    <li {!! (Request::is('service1') ? 'class="active"' : '') !!} ><a href="{{ route('service1') }}"> サービス１</a></li>
                    <li {!! (Request::is('service2') ? 'class="active"' : '') !!}><a href="{{ route('service2') }}"> サービス２</a></li>
                    <li {!! (Request::is('option') ? 'class="active"' : '') !!}><a href="{{ route('option') }}"> オプション</a></li>
                </ul>
            </div>
            <!-- //About us Section End -->


        </div>
    </footer>


    @yield('footer_scripts')
    <!-- end page level js -->



        <nav id="c-menu--slide-right" class="c-menu c-menu--slide-right">
            <button class="c-menu__close" style="background-color: #fff;text-align: left;font-size:20px;color:#222"><img src="img/motocle-logo.png" style="width:150px;height:auto;margin-bottom:0px;"/><i class="fa fa-arrow-right" style="float: right;color:#1886ea;margin-top:10px;"></i></button>
            <ul class="c-menu__items">
                <li class="c-menu__item  {!! (Request::is('/') ? 'active1' : '') !!}"><a href="{{ route('home') }}" class="c-menu__link">トップページ</a></li>
                <li class="c-menu__item  {!! (Request::is('about') ? 'active1' : '') !!}"><a href="{{ route('about') }}" class="c-menu__link">会社概要</a></li>
                <li class="c-menu__item {!! (Request::is('service1') ? 'active1' : '') !!}"><a href="{{ route('service1') }}" class="c-menu__link">サービス１</a></li>
                <li class="c-menu__item {!! (Request::is('service2') ? 'active1' : '') !!}"><a href="{{ route('service2') }}" class="c-menu__link">サービス２</a></li>
                <li class="c-menu__item {!! (Request::is('option') ? 'active1' : '') !!}"><a href="{{ route('option') }}" class="c-menu__link">オプション</a></li>
            </ul>
        </nav><!-- /c-menu slide-right -->
        <div id="c-mask" class="c-mask"></div><!-- /c-mask -->
    </div>
</body>
<script src="/pushmenu/js/dist/menu.js"></script>
<style>
    .navbar-default .navbar-nav>.active>a, .navbar-default .navbar-nav>.active>a:focus, .navbar-default .navbar-nav>.active>a:hover {
        color: #555;
        background-color: transparent;
    }
    .list-inline>li, .navbar-nav>li>a{
        border-right: 1px;
        border-color: #aaa;
        border-right-style: double;
        padding-bottom: 0px;
        padding-top: 0px;

    }
    .list-inline>li{
        width:100px;
    }
    .list-inline>.active>a{
        color: #000 !important;
    }
    .navbar-nav>li>a{
        padding:0px 25px;
        text-transform: none;
    }
    .navbar-nav>.active>a{
        color: #000 !important;
    }
    .navbar-nav{
        width: 100%;
    }
</style>
<script>
    $(function(){

        var screenwidth = window.innerWidth;
        if(screenwidth > 900) {
            $('.o-header').css('display', 'none');
            $('#c-menu--slide-right').css('display', 'none');
            $('#c-mask').css('display', 'none');
            $('.navbar-collapse').css('width', '100%');
            $('.navbar-collapse').css('margin-top', '10px');
            $('.navbar-default').css('float', 'none');
            $('#savebuttondiv').css('display', 'none');
            $('.navibt').css('padding', '10px 20px');
            $('.hiddenbutton').css('display', 'none');
            $('#leftheader').css('border', '0');
            $(this).scrollTop(0);
            $(window).scroll(function () {
                var aTop = $('.ad').height();
                var top = $(this).scrollTop();
                if(screenwidth > 900) {
                    if (top > 0) {
                        $('#mainheader').css('position', 'fixed');
                        $('#mainheader').css('top', '0px');
                        $('#mainheader').css('text-align', 'center');
                        $('#mainheader').css('width', '100%');
                        $('#mainheader').css('z-index', '9999');
                        $('#middleheader').css('display', 'none');
                        $('#leftheader').css('margin-top', '0px');
                        $('#headerlogo').css('width', '35%');
                        $('#headerlogo').css('text-align', 'right');
                        $('.navbar-default').css('position', 'fixed');
                        $('.navbar-default').css('top', '15px');
                        $('.navbar-default').css('width', 'auto !important');
                        $('.navbar-default').css('margin-left', '35%');
                        $('.navbar-collapse').css('text-align', 'left');
                        $('#content').css('margin-top', '100px');
                        $('.navbar-collapse').css('width', 'auto');
                        $('.navbar-collapse').css('margin-top', '0px');
                        $('.navbar-default').css('float', 'left');
                        $('#savebuttondiv').css('display', 'block');
                        $('.hiddenbutton').css('display', 'none');
                        $('.navibt').css('padding', '3px 7px');
                        $('#leftheader').css('border', '3px solid #1886ea');
                        $('#leftheader').css('border-top', '0');
                        $('#leftheader').css('border-left', '0');
                        $('#leftheader').css('border-right', '0');
                    } else {
                        $('#content').css('margin-top', '0px');
                        $('#leftheader').css('margin-top', '0px');
                        $('#middleheader').css('display', 'block');
                        $('#headerlogo').css('width', 'auto');
                        $('#headerlogo').css('text-align', 'center');
                        $('.navbar-default').css('position', 'relative');
                        $('.navbar-default').css('top', '0px');
                        $('.navbar-default').css('width', '100% !important');
                        $('.navbar-default').css('margin-left', '0px');
                        $('.navbar-collapse').css('text-align', 'center');
                        $('#mainheader').css('position', 'relative');
                        $('.navbar-collapse').css('width', '100%');
                        $('.navbar-collapse').css('margin-top', '10px');
                        $('.navbar-default').css('float', 'none');
                        $('#savebuttondiv').css('display', 'none');
                        $('.hiddenbutton').css('display', 'none');
                        $('.navibt').css('padding', '10px 20px');
                        $('#leftheader').css('border', '0');
                    }
                }
            });
        }else{
            //mobile
            $('#mainheader').css('display', 'none');
            $('.o-header').css('display', 'block');
            $('#c-menu--slide-right').css('display', 'block');
            $('#c-mask').css('display', 'block');
            var slideRight = new Menu({
                wrapper: '#o-wrapper',
                type: 'slide-right',
                menuOpenerClass: '.c-button',
                maskId: '#c-mask'
            });

            var slideRightBtn = document.querySelector('#c-button--slide-right');

            slideRightBtn.addEventListener('click', function(e) {
                e.preventDefault;
                slideRight.open();
            });

        }
    });
</script>
</html>
