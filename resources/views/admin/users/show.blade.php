@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
    {{ _t('User Profile', [], $_SESSION['lang']) }}
@parent
@stop

{{-- page level styles --}}
@section('header_styles')
<link href="{{ asset('assets/vendors/jasny-bootstrap/css/jasny-bootstrap.css') }}" rel="stylesheet"/>
<link href="{{ asset('assets/vendors/x-editable/css/bootstrap-editable.css') }}" rel="stylesheet"/>
<link href="{{ asset('assets/css/pages/user_profile.css') }}" rel="stylesheet"/>
@stop


{{-- Page content --}}
@section('content')
    <section class="content-header">
        <!--section starts-->
        <?php
            $sel_user = DB::table('users')->where('id', $user->id)->first();
            $name = $sel_user->username;
        ?>
        <h1>{{ _t($name, [], $_SESSION['lang']) }}</h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{ route('dashboard') }}">
                    <i class="livicon" data-name="home" data-size="14" data-loop="true"></i>
                    {{ _t('Dashboard', [], $_SESSION['lang']) }}
                </a>
            </li>
            <li>
                <a href="#">{{ _t('Users', [], $_SESSION['lang']) }}</a>
            </li>
            <li class="active">{{ _t('User Profile', [], $_SESSION['lang']) }}</li>
        </ol>
    </section>
    <!--section ends-->
    <section class="content">
        <div class="row">
            <div class="col-lg-12">
                <ul class="nav  nav-tabs ">
                   <li class="active">
                        <a href="#tab1" data-toggle="tab">
                            <i class="livicon" data-name="user" data-size="16" data-c="#000" data-hc="#000" data-loop="true"></i>
                            {{ _t('User Profile', [], $_SESSION['lang']) }}</a>
                    </li>
                    <?php
                        if($role_id == 1 || $role_id == 2){
                    ?>
                    <li>
                        <a href="#tab2" data-toggle="tab">
                            <i class="livicon" data-name="key" data-size="16" data-loop="true" data-c="#000" data-hc="#000"></i>
                            Change Password
                        </a>
                    </li>
                    <?php } else {
                    ?>
                    <li>
                        <a href="#tab2" data-toggle="tab" style="display: none">
                            <i class="livicon" data-name="sandglass" data-size="16" data-c="#000" data-hc="#000"></i>
                            {{ _t('Invite', [], $_SESSION['lang']) }}</a>
                        </a>
                    </li>
                    <?php }
                    ?>

                </ul>
                <div  class="tab-content mar-top">
                    <div id="tab1" class="tab-pane fade active in">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="panel">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">
                                            {{ _t('User Profile', [], $_SESSION['lang']) }}
                                        </h3>

                                    </div>
                                    <div class="panel-body">
                                        <div class="col-md-4">
                                            <div class="img-file" style="width:300px;height:250px;">
                                                @if($user->pic)
                                                    <img src="{!! $user->pic !!}" alt="profile pic" class="img-max" style="width:200px;">
                                                @else
                                                    <img src="{{ url('/').'/img/userimage.png' }}" alt="profile pic" style="width:200px;">
                                                @endif
                                            </div>
                                            <?php
                                            //$verify = DB::table('oollah_user_details')->where('user_id', $user->id)->first();
                                            $location = '';
                                            if($user->lat =="0" && $user->lon =="0"){
                                            }else{
                                                $location = '<a href="https://www.google.com/maps/place/'.$user->lat.','.$user->lon.'" target="_blank">'.$user->lat.', '.$user->lon.'</a>';
                                            }
                                            ?>
                                            <div style="margin-top:10px;">
                                                {{ _t('Current Location', [], $_SESSION['lang']) }}: {!! $location !!}
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="panel-body">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered table-striped" id="users">

                                                        <tr>
                                                            <td>{{ _t(config('Convert.username')[0], [], $_SESSION['lang']) }}</td>
                                                            <td>
                                                                {{ $user->username }}
                                                            </td>

                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                {{ _t(config('Convert.gender')[0], [], $_SESSION['lang']) }}
                                                            </td>
                                                            <td>
                                                                {{ $user->gender }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>{{ _t(config('Convert.birthday')[0], [], $_SESSION['lang']) }}</td>

                                                            @if($user->birthday=='0000-00-00')
                                                                <td>
                                                                </td>
                                                            @else
                                                                <td>
                                                                {{ $user->birthday }}
                                                            </td>
                                                             @endif
                                                        </tr>
                                                        <tr>
                                                            <td>{{ _t(config('Convert.country')[0], [], $_SESSION['lang']) }}</td>
                                                            <td>
                                                                {{ $user->country }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>{{ _t(config('Convert.state')[0], [], $_SESSION['lang']) }}</td>
                                                            <td>
                                                                {{ $user->state }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>{{ _t(config('Convert.cities')[0], [], $_SESSION['lang']) }}</td>
                                                            <td>
                                                                {{ $user->city }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>{{ _t(config('Convert.address')[0], [], $_SESSION['lang']) }}</td>
                                                            <td>
                                                                {{ $user->address }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>{{ _t(config('Convert.postal_code')[0], [], $_SESSION['lang']) }}</td>
                                                            <td>
                                                                {{ $user->postal }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>{{ _t(config('Convert.status')[0], [], $_SESSION['lang']) }}</td>
                                                            <td>

                                                                @if($user->deleted_at)
                                                                    Deleted
                                                                @elseif($activation = Activation::completed($user))
                                                                    Activated
                                                                @else
                                                                    Pending
                                                                @endif
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>{{ _t(config('Convert.create_date')[0], [], $_SESSION['lang']) }}</td>
                                                            <td>
                                                                {!! $user->created_at->diffForHumans() !!}
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="tab2" class="tab-pane fade" style="display: none">
                        <div class="row">
                            <?php
                                 if($role_id == 1 || $role_id == 2){
                            ?>
                                <div class="col-md-12 pd-top">
                                    <form class="form-horizontal">
                                        <div class="form-body">
                                            <div class="form-group">
                                                <label for="inputpassword" class="col-md-2 control-label">
                                                    Password
                                                    <span class='require'>*</span>
                                                </label>
                                                <div class="col-md-8">
                                                    <div class="input-group">
                                                                <span class="input-group-addon">
                                                                    <i class="livicon" data-name="key" data-size="16" data-loop="true" data-c="#000" data-hc="#000"></i>
                                                                </span>
                                                        <input type="password" id="password" placeholder="Password"
                                                               class="form-control"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputnumber" class="col-md-2 control-label">
                                                    Confirm Password
                                                    <span class='require'>*</span>
                                                </label>
                                                <div class="col-md-8">
                                                    <div class="input-group">
                                                                <span class="input-group-addon">
                                                                    <i class="livicon" data-name="key" data-size="16" data-loop="true" data-c="#000" data-hc="#000"></i>
                                                                </span>
                                                        <input type="password" id="password-confirm" placeholder="Password"
                                                               class="form-control"/>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-actions">
                                            <div class="col-md-offset-3 col-md-9">
                                                <button type="submit" class="btn btn-primary" id="change-password">Submit
                                                </button>
                                                &nbsp;
                                                <input type="reset" class="btn btn-default hidden-xs" value="Reset"></div>
                                        </div>
                                    </form>
                                </div>
                            <?php }
                            else{ ?>
                            <div class="col-md-12 pd-top">
                                <div class="panel-body table-responsive">
                                    <table class="table table-striped table-bordered" id="table2">
                                        <thead>
                                        <tr>
                                            <th>{{ _t('NO', [], $_SESSION['lang']) }}</th>
                                            <th>{{ _t('Sender Name', [], $_SESSION['lang']) }}</th>
                                            <th>{{ _t('Receiver Name', [], $_SESSION['lang']) }}</th>
                                            <th>{{ _t('Status', [], $_SESSION['lang']) }}</th>
                                            <th>{{ _t('Date', [], $_SESSION['lang']) }}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $i = 0;
                                        foreach($data as $item){
                                        $i++;
                                        ?>
                                        <tr>
                                            <td>{{ $i }}</td>
                                            <td>{{ $item['sender'] }}</td>
                                            <td>{{ $item['receiver'] }}</td>
                                            <td>{{ $item['status'] }}</td>
                                            <td>{{ $item['created'] }}</td>
                                        </tr>
                                        <?php } ?>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                            <?php }?>
                        </div>
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
                        {{ _t(config('Convert.inpute_message')[0], [], $_SESSION['lang']) }}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" class="form-control" data-dismiss="modal">{{ _t(config('Convert.ok')[0], [], $_SESSION['lang']) }}</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- claimed delete modal -->
        <div class="modal fade" id="deleteClaimedModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content" style="width: 80%">
                    <div class="modal-body" style="font-size: 150%">
                        {{ _t(config('Convert.notice')[0], [], $_SESSION['lang']) }}
                    </div>
                    <input type="hidden" id="deleteclaimedid" value="0">
                    <div class="modal-body">
                        {{ _t(config('Convert.delete_message')[0], [], $_SESSION['lang']) }}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" class="form-control" data-dismiss="modal" onclick="deleteClaimed()">{{ _t(config('Convert.delete')[0], [], $_SESSION['lang']) }}</button>
                        <button type="button" class="btn btn-default" class="form-control" data-dismiss="modal">{{ _t(config('Convert.cancel')[0], [], $_SESSION['lang']) }}</button>
                    </div>
                </div>
            </div>
        </div>


        <div class="modal fade" id="activeClaimedModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content" style="width: 80%">
                    <div class="modal-body" style="font-size: 150%">
                        {{ _t(config('Convert.notice')[0], [], $_SESSION['lang']) }}
                    </div>
                    <input type="hidden" id="occ_id" value="0">
                    {{--<input type="hidden" id="activeid" value="0">--}}
                    <div class="modal-body" id="statecontent">
                        {{ _t(config('Convert.active_message')[0], [], $_SESSION['lang']) }}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" class="form-control" data-dismiss="modal" onclick="claimedActive()">{{ _t(config('Convert.ok')[0], [], $_SESSION['lang']) }}</button>
                        <button type="button" class="btn btn-default" class="form-control" data-dismiss="modal">{{ _t(config('Convert.cancel')[0], [], $_SESSION['lang']) }}</button>
                    </div>
                </div>
            </div>
        </div>
        {{-- inactive product modal--}}
        <div class="modal fade" id="inactiveClaimedModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content" style="width: 80%">
                    <div class="modal-body" style="font-size: 150%">
                        {{ _t(config('Convert.notice')[0], [], $_SESSION['lang']) }}
                    </div>
                    <input type="hidden" id="occ_id" value="0">
                    {{--<input type="hidden" id="inactiveid" value="0">--}}
                    <div class="modal-body" id="statecontent">
                        {{ _t(config('Convert.inactive_message')[0], [], $_SESSION['lang']) }}
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" class="form-control" data-dismiss="modal" onclick="claimedInactive()">{{ _t(config('Convert.ok')[0], [], $_SESSION['lang']) }}</button>
                        <button type="button" class="btn btn-default" class="form-control" data-dismiss="modal">{{ _t(config('Convert.cancel')[0], [], $_SESSION['lang']) }}</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- favorite delete modal -->
        <div class="modal fade" id="deleteFavoriteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content" style="width: 80%">
                    <div class="modal-body" style="font-size: 150%">
                        {{ _t(config('Convert.notice')[0], [], $_SESSION['lang']) }}
                    </div>
                    <input type="hidden" id="deletefavoriteid" value="0">
                    <div class="modal-body">
                        {{ _t(config('Convert.delete_message')[0], [], $_SESSION['lang']) }}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" class="form-control" data-dismiss="modal" onclick="deleteFavorite()">{{ _t(config('Convert.delete')[0], [], $_SESSION['lang']) }}</button>
                        <button type="button" class="btn btn-default" class="form-control" data-dismiss="modal">{{ _t(config('Convert.cancel')[0], [], $_SESSION['lang']) }}</button>
                    </div>
                </div>
            </div>
        </div>


        <div class="modal fade" id="activeFavoriteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content" style="width: 80%">
                    <div class="modal-body" style="font-size: 150%">
                        {{ _t(config('Convert.notice')[0], [], $_SESSION['lang']) }}
                    </div>
                    <input type="hidden" id="occ_id" value="0">
                    {{--<input type="hidden" id="activeid" value="0">--}}
                    <div class="modal-body" id="statecontent">
                        {{ _t(config('Convert.active_message')[0], [], $_SESSION['lang']) }}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" class="form-control" data-dismiss="modal" onclick="favoriteActive()">{{ _t(config('Convert.ok')[0], [], $_SESSION['lang']) }}</button>
                        <button type="button" class="btn btn-default" class="form-control" data-dismiss="modal">{{ _t(config('Convert.cancel')[0], [], $_SESSION['lang']) }}</button>
                    </div>
                </div>
            </div>
        </div>
        {{-- inactive product modal--}}
        <div class="modal fade" id="inactiveFavoriteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content" style="width: 80%">
                    <div class="modal-body" style="font-size: 150%">
                        {{ _t(config('Convert.notice')[0], [], $_SESSION['lang']) }}
                    </div>
                    <input type="hidden" id="occ_id" value="0">
                    {{--<input type="hidden" id="inactiveid" value="0">--}}
                    <div class="modal-body" id="statecontent">
                        {{ _t(config('Convert.inactive_message')[0], [], $_SESSION['lang']) }}
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" class="form-control" data-dismiss="modal" onclick="favoriteInactive()">{{ _t(config('Convert.ok')[0], [], $_SESSION['lang']) }}</button>
                        <button type="button" class="btn btn-default" class="form-control" data-dismiss="modal">{{ _t(config('Convert.cancel')[0], [], $_SESSION['lang']) }}</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop

{{-- page level scripts --}}
@section('footer_scripts')
<!-- Bootstrap WYSIHTML5 -->
<script  src="{{ asset('assets/vendors/jasny-bootstrap/js/jasny-bootstrap.js') }}" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#change-password').click(function (e) {
                e.preventDefault();
                var check = false;
                var token = '{{ Session::getToken() }}';
                var sendData = '_token={{ Session::getToken() }}' + '&password=' + $('#password').val() + '&password-confirm=' + $('#password-confirm').val();
                //var sendData = '&password=' + $('#password').val() + '&password-confirm=' + $('#password-confirm').val();
                if ($('#password').val() === $('#password-confirm').val()) {
                    check = true;
                }
                //headers: {'X-CSRF-Token': token},
                //processData: false,
                //contentType: false,
                if (check) {
                    $.ajax({
                        url: '{{ route('passwordreset', $user->id) }}',
                        type: 'get',
                        data: sendData,
                        success: function (data) {
                            alert('password reset successful');
                        },
                        error: function (xhr, ajaxOptions, thrownError) {
                            alert('error in password reset');
                        }
                    });
                } else {
                    alert('password and password confirm does not match');
                }
            });
        });

        //claimed functions

        function claimedActive(id){
            var id = $('#deleteclaimedid').val();
            // console.log(id);
            $.ajax({
                type: "get",
                url: '/admin/claimed/' + id + '/active',
                success: function (result) {
                    location.reload();
                },
                error: function (result) {
                    console.log(result)
                }
            });
        }
        function claimedInactive(id){
            var id = $('#deleteclaimedid').val();
            console.log(id);
            // console.log(id);
            $.ajax({
                type: "get",
                url: '/admin/claimed/' + id + '/inactive',
                success: function (result) {
                    location.reload();
                },
                error: function (result) {
                    console.log(result)
                }
            });
        }
        function setClaimedActive(id){
            $('#deleteclaimedid').val(id);
            $('#activeClaimedModal').modal('show');
        }
        function setClaimedInactive(id){
            $('#deleteclaimedid').val(id);
            $('#inactiveClaimedModal').modal('show');
        }
        function deleteClaimedItem(id){
            $('#deleteclaimedid').val(id);
            //$('#deleteModal').modal('show');
        }
        function deleteClaimed(){
            var id = $('#deleteclaimedid').val();
            /* delete row in database and datatable  */
            $.ajax({
                type: "get",
                url: '/admin/claimed/' + id + '/delete',
                success: function (result) {
                    if(result == ''){
                        $('#messagecontent').html('{{ _t('Successfully deleted', [], $_SESSION['lang']) }}');
                        location.reload();
                    }else{
                        $('#messagecontent').html('This is using in '+result);
                    }
                    $('#messageModal').modal('show');
                    //location.reload();
                },
                error: function (result) {
                    console.log(result)

                }
            });
        }
        //favorites functions

        function favoriteActive(id){
            var id = $('#deletefavoriteid').val();
            // console.log(id);
            $.ajax({
                type: "get",
                url: '/admin/favorite/' + id + '/active',
                success: function (result) {
                    location.reload();
                },
                error: function (result) {
                    console.log(result)
                }
            });
        }
        function favoriteInactive(id){
            var id = $('#deletefavoriteid').val();
            console.log(id);
            // console.log(id);
            $.ajax({
                type: "get",
                url: '/admin/favorite/' + id + '/inactive',
                success: function (result) {
                    location.reload();
                },
                error: function (result) {
                    console.log(result)
                }
            });
        }
        function setFavoriteActive(id){
            $('#deletefavoriteid').val(id);
            $('#activeFavoriteModal').modal('show');
        }
        function setFavoriteInactive(id){
            $('#deletefavoriteid').val(id);
            $('#inactiveFavoriteModal').modal('show');
        }
        function deleteFavoriteItem(id){
            $('#deletefavoriteid').val(id);
            //$('#deleteModal').modal('show');
        }
        function deleteFavorite(){
            var id = $('#deletefavoriteid').val();
            /* delete row in database and datatable  */
            $.ajax({
                type: "get",
                url: '/admin/favorite/' + id + '/delete',
                success: function (result) {
                    if(result == ''){
                        $('#messagecontent').html('{{ _t('Successfully deleted', [], $_SESSION['lang']) }}');
                        location.reload();
                    }else{
                        $('#messagecontent').html('This is using in '+result);
                    }
                    $('#messageModal').modal('show');
                    //location.reload();
                },
                error: function (result) {
                    console.log(result)

                }
            });
        }
    </script>
@stop