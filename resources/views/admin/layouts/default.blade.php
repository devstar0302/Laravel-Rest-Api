<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>
        @section('title')
            | {{ _t(config('Convert.cms_name')[0], [], $_SESSION['lang']) }}
        @show
    </title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link rel="icon" href="/img/logo.png">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    <!-- global css -->

    <link href="{{ asset('assets/css/app.css') }}" rel="stylesheet" type="text/css"/>

    <!-- font Awesome -->


    <!-- end of global css -->
    <!--page level css-->
    @yield('header_styles')
            <!--end of page level css-->

<body class="skin-josh">
<header class="header">
    <a href="{{ route('dashboard') }}" class="logo" style="color:white;font-size:20px;text-align: left;">
        <img src="{{ url('/img/logo.png') }}" alt="logo" style="width:30px;margin-top:-5px;">&nbsp;&nbsp;&nbsp;<span>{{ _t('FINDMIIN' , [], $_SESSION['lang']) }}</span>
    </a>
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <div>
            <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                <div class="responsive_nav"></div>
            </a>
        </div>
        <div class="navbar-right">
            <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}"/>
            <ul class="nav navbar-nav">
                <li class="dropdown">
                    <a data-toggle="modal" data-target="#importModal" class="dropdown-toggle">
                        <div class="riot" style="padding-left:10px;padding-right:10px;padding-bottom:2px;">
                            <div>
                                <i class="livicon" data-name="file-import" data-s="22" data-c="#eeeeee" data-hc="#eeeeee"></i>
                            </div>
                        </div></a>
                </li>
            </ul>
            <ul class="nav navbar-nav">
                <li class="dropdown">
                    <a data-toggle="modal" data-target="#exportModal" class="dropdown-toggle">
                    <div class="riot" style="padding-left:10px;padding-right:10px;padding-bottom:2px;">
                        <div>
                            <i class="livicon" data-name="backup" data-s="22" data-c="#eeeeee" data-hc="#eeeeee"></i>
                        </div>
                    </div></a>
                </li>
            </ul>
            <ul class="nav navbar-nav">
                <!--lang select part-->
                <!--<li style="padding-top:10px;margin-right:20px;">
                    <?php
                    //$arr = config('translation.locales');
                    //echo '<select id="getlang" class="form-control" style="width:100px;height:30px;    padding: 3px 5px;color:#fff;    background-color: #515763;" name="locale" onchange="selectLang()">';
                    //foreach($arr as $key=>$data){
                    //    if($_SESSION['lang'] == $key)
                    //        echo '<option style="width:150px;" value="'.$key.'" selected>'.$data.'</option>';
                    //    else
                    //        echo '<option style="width:150px;" value="'.$key.'">'.$data.'</option>';
                    //}
                    //echo '</select>';
                    ?>
                    <!--<input type="hidden" id="on-off-switch-notext" value="{{ $_SESSION['lang'] }}">-->
                <!--</li>-->
                @include('admin.layouts._notifications')
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        @if(Sentinel::getUser()->pic)
                            <img src="{!! url('/').'/uploads/staffs/'.Sentinel::getUser()->pic !!}" alt="img" height="35px" width="35px"
                                 class="img-circle img-responsive pull-left"/>
                        @else
                            <img src="{!! url('/').('/img/userimage.png') !!} " width="35"
                                 class="img-circle img-responsive pull-left" height="35" alt="riot">
                        @endif
                        <div class="riot">
                            <div>
                                {{ Sentinel::getUser()->first_name }} {{ Sentinel::getUser()->last_name }}
                                <span>
                                        <i class="caret"></i>
                                    </span>
                            </div>
                        </div>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header bg-light-blue">
                            @if(Sentinel::getUser()->pic)
                                <img src="{!! url('/').'/uploads/staffs/'.Sentinel::getUser()->pic !!}" alt="img"
                                     class="img-circle img-bor"/>
                            @else
                                <img src="{!! url('/').('/img/userimage.png') !!}"
                                     class="img-responsive img-circle" alt="User Image">
                            @endif
                            <p class="topprofiletext">{{ Sentinel::getUser()->first_name }} {{ Sentinel::getUser()->last_name }}</p>
                        </li>
                        <!-- Menu Body -->
                        <li>
                            <a href="{{ URL::route('users.show',Sentinel::getUser()->id) }}">
                                <i class="livicon" data-name="user" data-s="18"></i>
                                {{ _t('My Profile', [], $_SESSION['lang']) }}
                            </a>
                        </li>
                        <!--<li role="presentation"></li>
                        <li>
                            <a href="{{ route('admin.users.edit', Sentinel::getUser()->id) }}">
                                <i class="livicon" data-name="gears" data-s="18"></i>
                                アカウントの設定
                            </a>
                        </li>-->
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="{{ URL::route('lockscreen',Sentinel::getUser()->id) }}">
                                    <i class="fa fa-angle-double-right"></i>
                                    {{ _t('Lock', [], $_SESSION['lang']) }}
                                </a>
                            </div>
                            <div class="pull-right">
                                <a href="{{ URL::to('admin/logout') }}">
                                    <i class="livicon" data-name="sign-out" data-s="18"></i>
                                    {{ _t('Log out', [], $_SESSION['lang']) }}
                                </a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>

        </div>
    </nav>
</header>
<div class="wrapper row-offcanvas row-offcanvas-left">
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="left-side sidebar-offcanvas" style="min-height: 150%;">
        <section class="sidebar ">
            <div class="page-sidebar  sidebar-nav">

                <div class="clearfix"></div>
                <!-- BEGIN SIDEBAR MENU -->
                @include('admin.layouts._left_menu')
                <!-- END SIDEBAR MENU -->
            </div>
        </section>
    </aside>
    <aside class="right-side">

        <!-- Notifications -->
        @include('notifications')

                <!-- Content -->
        @yield('content')

    </aside>
    <!-- right-side -->
</div>
<a id="back-to-top" href="#" class="btn btn-primary btn-lg back-to-top" role="button" title="Return to top"
   data-toggle="tooltip" data-placement="left">
    <i class="livicon" data-name="plane-up" data-size="18" data-loop="true" data-c="#fff" data-hc="white"></i>
</a>
<!-- sql export modal -->
<div class="modal fade" id="exportModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="width: 80%">
            <div class="modal-header" style="font-size: 150%">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel" style="color: #000;">Export SQL</h4>
            </div>
            <div class="modal-body" style="font-size: 120%">
                <label style="font-weight: 400;margin-top:20px;">Do you want to export SQL file to localhost?</label>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" class="form-control" data-dismiss="modal" onclick="sqlBackup();">Export</button>
                <button type="button" class="btn btn-default" class="form-control" data-dismiss="modal">{{ _t(config('Convert.cancel')[0], [], $_SESSION['lang']) }}</button>
            </div>
        </div>
    </div>
</div>
<!-- sql import modal -->
<div class="modal fade" id="importModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="width: 80%">
            <div class="modal-header" style="font-size: 150%">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel" style="color: #000;">Import SQL</h4>
            </div>
            <div class="modal-body" style="font-size: 120%">
                <label style="font-weight: 400; margin-bottom: 20px;">Please select SQL file to import to Database.</label>

                <input type="file" name="sql_import" class="form-control" id="sql_import"  value="">

                <label style="font-weight: 400;margin-top:20px;">Do you want to import really SQL file to Database?</label>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" class="form-control" data-dismiss="modal" onclick="sqlImport();">Import</button>
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
                {{ _t(config('Convert.category_inpute_message')[0], [], $_SESSION['lang']) }}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" class="form-control" data-dismiss="modal">{{ _t('OK', [], $_SESSION['lang']) }}</button>
            </div>
        </div>
    </div>
</div>
<!-- global js -->
<script src="{{ asset('assets/js/app.js') }}" type="text/javascript"></script>


<script type="text/javascript" src="/js/on-off-switch.js"></script>
<script type="text/javascript" src="/js/on-off-switch-onload.js"></script>
<link rel="stylesheet" type="text/css" href="/css/on-off-switch.css"/>
<script type="text/javascript">

        /*new DG.OnOffSwitch({
            el: '#on-off-switch-notext',
            height: 30,
            trackColorOn:'#F57C00',
            trackColorOff:'#da0e3f',
            trackBorderColor:'#676dad',
            textColorOff:'#fff',
            textOn:'EN',
            textOff:'CN',
            listener:function(name, checked){
                // if true, en
                // if false, cn
                var lang = 0;
                if(checked) lang = 1;
                else lang = 0;
                location.href="/admin/setlang/"+lang;
            }
        });*/
    $(document).ready(function () {
        $("#importModal").on("hidden.bs.modal", function () {
            $("#sql_import").val("");
        });
    });
    function selectLang(){
        var lang = $('#getlang').val();
        location.href="/admin/setlang/"+lang;
    }
    function sqlBackup() {
        //location.href = '/admin/cardfinds/sqlbackup';
        var _token = $('#_token').val();
        var data = {
            _token:_token
        };
        $.ajax({
            type: "post",
            url: '/admin/cardfinds/sqlbackup',
            data: data,
            success: function (result) {
                console.log(result);
                var path = '/uploads/backup/'+result;
                //window.open(path, '_blank');
                //window.open(result, '_blank');
                location.href = result;
                $('#messagecontent').html('Database backuped successfully to localhost.');
                $('#messageModal').modal('show');
            },
            error: function (result) {
                console.log(result)
            }
        });
    }
    function sqlImport(){
        var filename = $("#sql_import").val();
        if(filename == ""){
            $('#messagecontent').html('Sql file does not select. &nbsp;&nbsp;&nbsp;Please select SQL file.');
            $('#messageModal').modal('show');
            return;
        }
        var parts = filename.split('.');
        var filetype = parts[parts.length - 1];
        if(filetype != "sql"){
            $('#messagecontent').html('File type is incorrectly. &nbsp;&nbsp;&nbsp;Please select correctly SQL file.');
            $('#messageModal').modal('show');
            return;
        }

        var formData = new FormData();
        formData.append('_token', $('#_token').val());

        //var file_data = $('#sql_import').prop('files')[0];
        var file_data = $('input[type=file]')[0].files[0];

        formData.append('file', file_data);

        console.log(file_data);

        $.ajax({
            type: 'post',
            url: '/admin/cardfinds/sqlimport',
            enctype: 'multipart/form-data',
            cache: false,
            processData: false,
            contentType: false,
            data: formData,
            success: function (result) {
                console.log(result);

                if(result == 'empty'){
                    $('#messagecontent').html('Sql file does not select. &nbsp;&nbsp;&nbsp;Please select SQL file.');
                    $('#messageModal').modal('show');
                }else {
                    $('#messagecontent').html('Database resotred successfully.');
                    $('#messageModal').modal('show');
                }
            },
            error: function (result) {
                console.log(result)
            }
        });


    }
</script>
<!-- end of global js -->
<!-- begin page level js -->
@yield('footer_scripts')
        <!-- end page level js -->
</body>
</html>
