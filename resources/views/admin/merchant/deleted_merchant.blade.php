@extends('admin.layouts.default')

{{-- Page title --}}
@section('title')
    {{ _t('Deleted Merchants', [], $_SESSION['lang']) }}
@parent
@stop

{{-- page level styles --}}
@section('header_styles')

    <link rel="stylesheet" href="{{ asset('assets/vendors/datatables/css/dataTables.bootstrap.css') }}" />
    <link href="{{ asset('assets/css/pages/tables.css') }}" rel="stylesheet" type="text/css" />
    <!-- end page css -->
@stop

{{-- Page content --}}
@section('content')

<section class="content-header">
                <h1>{{ _t('Deleted Merchants', [], $_SESSION['lang']) }}</h1>
                <ol class="breadcrumb">
                    <li>
                        <a href="{{ route('dashboard') }}">
                            <i class="livicon" data-name="home" data-size="14" data-color="#000"></i>
                            {{ _t('Dashboard', [], $_SESSION['lang']) }}
                        </a>
                    </li>
                    <li><a href="#">{{ _t('Merchants', [], $_SESSION['lang']) }}</a> </li>
                    <li class="active">{{ _t('Deleted Merchants', [], $_SESSION['lang']) }}</li>
                </ol>
            </section>
            <!-- Main content -->
         <section class="content paddingleft_right15">
    <div class="row">
        <div class="panel panel-warning">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <i class="livicon" data-name="users-remove" data-size="18" data-c="#ffffff" data-hc="#ffffff"></i>
                    {{ _t('Deleted Merchants', [], $_SESSION['lang']) }}
                </h4>
            </div>
            <div class="panel-body">
                <table class="table table-bordered" id="table">
                    <thead>
                    <tr class="filters">
                        <th>{{ _t('Merchant Photo', [], $_SESSION['lang']) }}</th>
                        <th>{{ _t(config('Convert.user_name')[0], [], $_SESSION['lang']) }}</th>
                        <th>{{ _t(config('Convert.email')[0], [], $_SESSION['lang']) }}</th>
                        <th>{{ _t('Verify', [], $_SESSION['lang']) }}</th>
                        <th>{{ _t(config('Convert.create_date')[0], [], $_SESSION['lang']) }}</th>
                        <th>{{ _t(config('Convert.actions')[0], [], $_SESSION['lang']) }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <?php
                            $photo = '<img src="/img/userimage.png" style="width:50px;height:50px;border-radius:50%"/>';
                            if(!empty($user->pic)){
                                $photo = '<img src="/uploads/users/'.$user->pic.'" style="width:50px;height:50px;border-radius:50%"/>';
                            }
                            $verify = \DB::table('oollah_user_details')->where('user_id', $user->id)->first();
                            $verified = '';
                            if(!empty($verify)){
                                if($verify->merchant_verified == 1){
                                    $verified = '<img src="/img/icon_premium_small.png" style="width:20px;height:20px;"/>';
                                }
                            }
                            ?>
                            <td>{!! $photo !!}</td>
                            <td>{!! $user->first_name !!} {!! $user->last_name !!}</td>
                            <td>{!! $user->email !!}</td>
                            <td>{!! $verified !!}</td>
                            <td>{!! $user->created_at->diffForHumans() !!}</td>
                            <td>
                                <a href="{{ route('restore/merchant', $user->id) }}"><i class="livicon" data-name="user-flag" data-c="#6CC66C" data-hc="#6CC66C" data-size="18"></i></a>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

        
    @stop

{{-- page level scripts --}}
@section("footer_scripts")
    <script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/jquery.dataTables.js') }}" ></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/dataTables.bootstrap.js') }}" ></script>
    <script>
        $(document).ready(function() {
            $('#table').DataTable();
        });
    </script>
@stop