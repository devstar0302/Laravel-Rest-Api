@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
    {{ _t('Merchant', [], $_SESSION['lang']) }}
@parent
@stop

{{-- page level styles --}}
@section('header_styles')
<link href="{{ asset('assets/vendors/jasny-bootstrap/css/jasny-bootstrap.css') }}" rel="stylesheet"/>
<link href="{{ asset('assets/vendors/x-editable/css/bootstrap-editable.css') }}" rel="stylesheet"/>
<link href="{{ asset('assets/css/pages/user_profile.css') }}" rel="stylesheet"/>
<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/datatables/css/dataTables.bootstrap.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/datatables/css/buttons.bootstrap.css') }}"/>
<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/datatables/css/colReorder.bootstrap.css') }}"/>
<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/datatables/css/dataTables.bootstrap.css') }}"/>
<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/datatables/css/rowReorder.bootstrap.css') }}"/>
<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/datatables/css/buttons.bootstrap.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/datatables/css/scroller.bootstrap.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/pages/tables.css') }}" />
@stop


{{-- Page content --}}
@section('content')
    <section class="content-header">
        <!--section starts-->
        <h1>{{ _t('Merchant', [], $_SESSION['lang']) }}</h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{ route('dashboard') }}">
                    <i class="livicon" data-name="home" data-size="14" data-loop="true"></i>
                    {{ _t(config('Convert.dashboard')[0], [], $_SESSION['lang']) }}
                </a>
            </li>
            <li>
                <a href="#">{{ _t('Merchants', [], $_SESSION['lang']) }}</a>
            </li>
            <li class="active">{{ _t('Merchant', [], $_SESSION['lang']) }}</li>
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
                            {{ _t('Merchant Profile', [], $_SESSION['lang']) }}</a>
                    </li>
                    <li>
                        <a href="#tab2" data-toggle="tab">
                            <i class="livicon" data-name="qrcode" data-size="16" data-c="#000" data-hc="#000"></i>
                            {{ _t('Products', [], $_SESSION['lang']) }}</a>
                    </li>
                    <li>
                        <a href="#tab3" data-toggle="tab">
                            <i class="livicon" data-name="sandglass" data-size="16" data-c="#000" data-hc="#000"></i>
                            {{ _t('Claimed Redeem', [], $_SESSION['lang']) }}</a>
                    </li>
                    <li>
                        <a href="#tab4" data-toggle="tab">
                            <i class="livicon" data-name="heart" data-size="16" data-c="#000" data-hc="#000"></i>
                            {{ _t('Favorite', [], $_SESSION['lang']) }}</a>
                    </li>
                    <li>
                        <a href="#tab5" data-toggle="tab">
                            <i class="livicon" data-name="shopping-cart" data-size="16" data-c="#000" data-hc="#000"></i>
                            {{ _t('Merchant Transaction', [], $_SESSION['lang']) }}</a>
                    </li>

                </ul>
                <div  class="tab-content mar-top">
                    <div id="tab1" class="tab-pane fade active in">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="panel">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">

                                            {{ _t('Merchant Profile', [], $_SESSION['lang']) }}
                                        </h3>

                                    </div>
                                    <div class="panel-body">
                                        <div class="col-md-4">
                                            <div class="img-file" style="width:300px;height:250px;">
                                                @if($user->pic)
                                                    <img src="{!! url('/').'/uploads/users/'.$user->pic !!}" alt="profile pic" class="img-max" style="width:200px;">
                                                @else
                                                    <img src="{{ url('/img/userimage.png') }}" alt="profile pic" style="width:200px;">
                                                @endif
                                            </div>
                                            <?php
                                            $verify = \DB::table('oollah_user_details')->where('user_id', $user->id)->first();
                                            $verified = '';
                                            $location = '';
                                            $verify_date = '';
                                            if(empty($verify)){
                                            }else{
                                                if($verify->merchant_verified == 1){
                                                    $verified = '<img src="/img/icon_premium_small.png" style="width:20px;height:20px;"/>';
                                                    $verify_date = date('M d, Y', strtotime($verify->verified_date));
                                                    $plan = \DB::table('oollah_merchant_plans')->where('id', $verify->plan_id)->first();
                                                    if(!empty($plan)){
                                                        $verified .= ' <span title="'.$plan->expired.' '.$plan->planunit.' ('.$plan->price.'USD)">'.$plan->name.'</span>';
                                                    }
                                                }
                                                $location = '<a href="https://www.google.com/maps/place/'.$verify->lat.','.$verify->lon.'" target="_blank">'.$verify->lat.', '.$verify->lon.'</a>';
                                            }
                                            if($verified != ''){
                                            ?>
                                            <div>
                                                {{ _t('Merchant Verified', [], $_SESSION['lang']) }}: {!! $verified !!} &nbsp;&nbsp;{{ $verify_date }}
                                            </div>
                                            <?php } ?>
                                            <div style="margin-top:10px;">
                                                {{ _t('Current Location', [], $_SESSION['lang']) }}: {!! $location !!}
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="panel-body">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered table-striped" id="users">

                                                        <tr>
                                                            <td>{{ _t(config('Convert.first_name')[0], [], $_SESSION['lang']) }}</td>
                                                            <td>
                                                                {{ $user->first_name }}
                                                            </td>

                                                        </tr>
                                                        <tr>
                                                            <td>{{ _t(config('Convert.last_name')[0], [], $_SESSION['lang']) }}</td>
                                                            <td>
                                                                {{ $user->last_name }}
                                                            </td>

                                                        </tr>
                                                        <tr>
                                                            <td>{{ _t(config('Convert.email')[0], [], $_SESSION['lang']) }}</td>
                                                            <td>
                                                                {{ $user->email }}
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

                                                            @if($user->dob=='0000-00-00')
                                                                <td>
                                                                </td>
                                                            @else
                                                                <td>
                                                                {{ $user->dob }}
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
                    <div id="tab2" class="tab-pane fade">
                        <div class="row">
                            <div class="col-md-12 pd-top">
                                <div class="panel-body table-responsive">
                                <table class="table table-striped table-bordered" id="table1">
                                    <thead>
                                    <tr>
                                        <th>{{ _t('NO', [], $_SESSION['lang']) }}</th>
                                        <th>{{ _t('Category', [], $_SESSION['lang']) }}</th>
                                        <th>{{ _t('Merchant', [], $_SESSION['lang']) }}</th>
                                        <th>{{ _t('Title', [], $_SESSION['lang']) }}</th>
                                        <th>{{ _t('Start Date', [], $_SESSION['lang']) }}</th>
                                        <th>{{ _t('End Date', [], $_SESSION['lang']) }}</th>
                                        <th>{{ _t('Claim Redeem', [], $_SESSION['lang']) }}</th>
                                        <th>{{ _t('Claimed', [], $_SESSION['lang']) }}</th>
                                        <th>{{ _t('Price(USD)', [], $_SESSION['lang']) }}</th>
                                        <th>{{ _t('Discount(USD)', [], $_SESSION['lang']) }}</th>
                                        <th>{{ _t('Location', [], $_SESSION['lang']) }}</th>
                                        <th>{{ _t('Region', [], $_SESSION['lang']) }}</th>
                                        <th>{{ _t('Like', [], $_SESSION['lang']) }}</th>
                                        <th>{{ _t('Dislike', [], $_SESSION['lang']) }}</th>
                                        <th>{{ _t('Favorite', [], $_SESSION['lang']) }}</th>
                                        <th>{{ _t('Type', [], $_SESSION['lang']) }}</th>
                                        <th>{{ _t('Status', [], $_SESSION['lang']) }}</th>
                                        <th>{{ _t('Created Date', [], $_SESSION['lang']) }}</th>
                                        <th>{{ _t('Actions', [], $_SESSION['lang']) }}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $i = 0;
                                    foreach($products as $product){
                                    $i++;
                                    $category = DB::table('oollah_category')->where('id', $product->cat_id)->where('status', 0)->first();
                                    $categoryname = '';
                                    if(empty($category)) continue;
                                    $categoryname = $category->name;
                                    $merchant = DB::table('users')->where('id', $product->merchant_id)->first();
                                    $merchantname = '';
                                    if(!empty($merchant)) $merchantname = $merchant->first_name.' '.$merchant->last_name;
                                    $address = $product->address;
                                    if($product->lat != '') $address = $product->lat.','.$product->lon;
                                    $status = '<a class="inactive" href="javascript:;" onclick="setInactive(\''.$product->id.'\')">inactive</a>';
                                    if($product->status == 1) $status = '<a style="color: #ca0002" class="active" href="javascript:;" onclick="setActive(\''.$product->id.'\')">active</a>';
                                    ?>
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td>{{ $categoryname }}</td>
                                        <td>{{ $merchantname }}</td>
                                        <td>{{ $product->title }}</td>
                                        <td>{{ $product->start_time }}</td>
                                        <td>{{ $product->end_time }}</td>
                                        <td>{{ $product->claimnum }}</td>
                                        <td>{{ $product->claimednum }}</td>
                                        <td>{{ $product->price }}</td>
                                        <td>{{ $product->discount_price }}</td>
                                        <td>{{ $address }}</td>
                                        <td>{{ $product->region }}</td>
                                        <td>{{ $product->likenum }}</td>
                                        <td>{{ $product->dislikenum }}</td>
                                        <td>{{ $product->favonum }}</td>
                                        <td>{{ $product->type }}</td>
                                        <td>{!! $status !!}</td>
                                        <td>{{ $product->created_at }}</td>
                                        <td>
                                            <a href="{{ url('/admin/product/'.$product->id.'/show') }}">
                                                <i class="livicon" data-name = "info" data-size = "18" data-loop = "true" data-c = "#428BCA" data-hc = "#428BCA" title = "view product" ></i >
                                            </a >
                                            &nbsp;&nbsp;&nbsp;
                                            <a class="delete" href = ""  data-toggle="modal" data-target="#deleteModal" onclick="deleteItem('{{ $product->id }}')">
                                                <i class="livicon" data-name = "trash" data-size = "18" data-loop = "true" data-c = "#f56954" data-hc = "#f56954" title = "inactive product" ></i >
                                            </a >
                                        </td>
                                    </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="tab3" class="tab-pane fade">
                        <div class="row">
                            <div class="col-md-12 pd-top">
                                <div class="panel-body table-responsive">
                                    <table class="table table-striped table-bordered" id="table2">
                                        <thead>
                                        <tr>
                                            <th>{{ _t('NO', [], $_SESSION['lang']) }}</th>
                                            <th>{{ _t('Category', [], $_SESSION['lang']) }}</th>
                                            <th>{{ _t('Merchant', [], $_SESSION['lang']) }}</th>
                                            <th>{{ _t('Title', [], $_SESSION['lang']) }}</th>
                                            <th>{{ _t('Start Date', [], $_SESSION['lang']) }}</th>
                                            <th>{{ _t('End Date', [], $_SESSION['lang']) }}</th>
                                            <th>{{ _t('Claim Redeem', [], $_SESSION['lang']) }}</th>
                                            <th>{{ _t('Claimed', [], $_SESSION['lang']) }}</th>
                                            <th>{{ _t('Price(USD)', [], $_SESSION['lang']) }}</th>
                                            <th>{{ _t('Discount(USD)', [], $_SESSION['lang']) }}</th>
                                            <th>{{ _t('Location', [], $_SESSION['lang']) }}</th>
                                            <th>{{ _t('Region', [], $_SESSION['lang']) }}</th>
                                            <th>{{ _t('Type', [], $_SESSION['lang']) }}</th>
                                            <th>{{ _t('Status', [], $_SESSION['lang']) }}</th>
                                            <th>{{ _t('Created Date', [], $_SESSION['lang']) }}</th>
                                            <th>{{ _t('Actions', [], $_SESSION['lang']) }}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $i = 0;
                                        foreach($claimeds as $product){
                                        $i++;
                                        $category = DB::table('oollah_category')->where('id', $product->cat_id)->where('status', 0)->first();
                                        $categoryname = '';
                                        if(empty($category)) continue;
                                        $categoryname = $category->name;
                                        $merchant = DB::table('users')->where('id', $product->merchant_id)->first();
                                        $merchantname = '';
                                        if(!empty($merchant)) $merchantname = $merchant->first_name.' '.$merchant->last_name;
                                        $address = $product->address;
                                        if($product->lat != '') $address = $product->lat.','.$product->lon;
                                        $status = '<a class="inactive" href="javascript:;" onclick="setClaimedInactive(\''.$product->realid.'\')">inactive</a>';
                                        if($product->realstatus == 1) $status = '<a style="color: #ca0002" class="active" href="javascript:;" onclick="setClaimedActive(\''.$product->realid.'\')">active</a>';
                                        ?>
                                        <tr>
                                            <td>{{ $i }}</td>
                                            <td>{{ $categoryname }}</td>
                                            <td>{{ $merchantname }}</td>
                                            <td>{{ $product->title }}</td>
                                            <td>{{ $product->start_time }}</td>
                                            <td>{{ $product->end_time }}</td>
                                            <td>{{ $product->claimnum }}</td>
                                            <td>{{ $product->claimednum }}</td>
                                            <td>{{ $product->price }}</td>
                                            <td>{{ $product->discount_price }}</td>
                                            <td>{{ $address }}</td>
                                            <td>{{ $product->region }}</td>
                                            <td>{{ $product->type }}</td>
                                            <td>{!! $status !!}</td>
                                            <td>{{ $product->createdat }}</td>
                                            <td>
                                                <a href="{{ url('/admin/product/'.$product->id.'/show') }}">
                                                    <i class="livicon" data-name = "info" data-size = "18" data-loop = "true" data-c = "#428BCA" data-hc = "#428BCA" title = "view product" ></i >
                                                </a >
                                                &nbsp;&nbsp;&nbsp;
                                                <a class="delete" href = ""  data-toggle="modal" data-target="#deleteClaimedModal" onclick="deleteClaimedItem('{{ $product->realid }}')">
                                                    <i class="livicon" data-name = "trash" data-size = "18" data-loop = "true" data-c = "#f56954" data-hc = "#f56954" title = "inactive product" ></i >
                                                </a >
                                            </td>
                                        </tr>
                                        <?php } ?>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div id="tab4" class="tab-pane fade">
                        <div class="row">
                            <div class="col-md-12 pd-top">
                                <div class="panel-body table-responsive">
                                    <table class="table table-striped table-bordered" id="table3">
                                        <thead>
                                        <tr>
                                            <th>{{ _t('NO', [], $_SESSION['lang']) }}</th>
                                            <th>{{ _t('Category', [], $_SESSION['lang']) }}</th>
                                            <th>{{ _t('Merchant', [], $_SESSION['lang']) }}</th>
                                            <th>{{ _t('Title', [], $_SESSION['lang']) }}</th>
                                            <th>{{ _t('Start Date', [], $_SESSION['lang']) }}</th>
                                            <th>{{ _t('End Date', [], $_SESSION['lang']) }}</th>
                                            <th>{{ _t('Claim Redeem', [], $_SESSION['lang']) }}</th>
                                            <th>{{ _t('Claimed', [], $_SESSION['lang']) }}</th>
                                            <th>{{ _t('Price(USD)', [], $_SESSION['lang']) }}</th>
                                            <th>{{ _t('Discount(USD)', [], $_SESSION['lang']) }}</th>
                                            <th>{{ _t('Location', [], $_SESSION['lang']) }}</th>
                                            <th>{{ _t('Region', [], $_SESSION['lang']) }}</th>
                                            <th>{{ _t('Type', [], $_SESSION['lang']) }}</th>
                                            <th>{{ _t('Status', [], $_SESSION['lang']) }}</th>
                                            <th>{{ _t('Created Date', [], $_SESSION['lang']) }}</th>
                                            <th>{{ _t('Actions', [], $_SESSION['lang']) }}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $i = 0;
                                        foreach($favorites as $product){
                                        $i++;
                                        $category = DB::table('oollah_category')->where('id', $product->cat_id)->where('status', 0)->first();
                                        $categoryname = '';
                                        if(empty($category)) continue;
                                        $categoryname = $category->name;
                                        $merchant = DB::table('users')->where('id', $product->merchant_id)->first();
                                        $merchantname = '';
                                        if(!empty($merchant)) $merchantname = $merchant->first_name.' '.$merchant->last_name;
                                        $address = $product->address;
                                        if($product->lat != '') $address = $product->lat.','.$product->lon;
                                        $status = '<a class="inactive" href="javascript:;" onclick="setFavoriteInactive(\''.$product->realid.'\')">inactive</a>';
                                        if($product->realstatus == 1) $status = '<a style="color: #ca0002" class="active" href="javascript:;" onclick="setFavoriteActive(\''.$product->realid.'\')">active</a>';
                                        ?>
                                        <tr>
                                            <td>{{ $i }}</td>
                                            <td>{{ $categoryname }}</td>
                                            <td>{{ $merchantname }}</td>
                                            <td>{{ $product->title }}</td>
                                            <td>{{ $product->start_time }}</td>
                                            <td>{{ $product->end_time }}</td>
                                            <td>{{ $product->claimnum }}</td>
                                            <td>{{ $product->claimednum }}</td>
                                            <td>{{ $product->price }}</td>
                                            <td>{{ $product->discount_price }}</td>
                                            <td>{{ $address }}</td>
                                            <td>{{ $product->region }}</td>
                                            <td>{{ $product->type }}</td>
                                            <td>{!! $status !!}</td>
                                            <td>{{ $product->createdat }}</td>
                                            <td>
                                                <a href="{{ url('/admin/product/'.$product->id.'/show') }}">
                                                    <i class="livicon" data-name = "info" data-size = "18" data-loop = "true" data-c = "#428BCA" data-hc = "#428BCA" title = "view product" ></i >
                                                </a >
                                                &nbsp;&nbsp;&nbsp;
                                                <a class="delete" href = ""  data-toggle="modal" data-target="#deleteFavoriteModal" onclick="deleteFavoriteItem('{{ $product->realid }}')">
                                                    <i class="livicon" data-name = "trash" data-size = "18" data-loop = "true" data-c = "#f56954" data-hc = "#f56954" title = "inactive product" ></i >
                                                </a >
                                            </td>
                                        </tr>
                                        <?php } ?>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div id="tab5" class="tab-pane fade">
                        <div class="row">
                            <div class="col-md-12 pd-top">
                                <table class="table table-striped table-bordered" id="table5">
                                    <thead>
                                    <tr>
                                        <th>{{ _t('NO', [], $_SESSION['lang']) }}</th>
                                        <th>{{ _t('Payer ID', [], $_SESSION['lang']) }}</th>
                                        <th>{{ _t('Transaction ID', [], $_SESSION['lang']) }}</th>
                                        <th>{{ _t('Amount', [], $_SESSION['lang']) }}</th>
                                        <th>{{ _t('Fee', [], $_SESSION['lang']) }}</th>
                                        <th>{{ _t('Currency', [], $_SESSION['lang']) }}</th>
                                        <th>{{ _t('Transaction Date', [], $_SESSION['lang']) }}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $i = 0; ?>
                                    @foreach($transactions as $transaction)
                                        <?php $i++; ?>
                                        <tr>
                                            <td>{{ $i }}</td>
                                            <td>{{ $transaction->payer_id }}</td>
                                            <td>
                                                {{ $transaction->transaction_id }}
                                            </td>
                                            <td>{{ $transaction->transaction_amount }}</td>
                                            <td>{{ $transaction->transaction_fee }}</td>
                                            <td>{{ $transaction->transaction_currency }}</td>
                                            <td>{{ $transaction->transaction_date }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- delete modal -->
        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content" style="width: 80%">
                    <div class="modal-body" style="font-size: 150%">
                        {{ _t(config('Convert.notice')[0], [], $_SESSION['lang']) }}
                    </div>
                    <input type="hidden" id="deleteid" value="0">
                    <div class="modal-body">
                        {{ _t(config('Convert.delete_message')[0], [], $_SESSION['lang']) }}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" class="form-control" data-dismiss="modal" onclick="deleteProduct()">{{ _t(config('Convert.delete')[0], [], $_SESSION['lang']) }}</button>
                        <button type="button" class="btn btn-default" class="form-control" data-dismiss="modal">{{ _t(config('Convert.cancel')[0], [], $_SESSION['lang']) }}</button>
                    </div>
                </div>
            </div>
        </div>


        <div class="modal fade" id="activeModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
                        <button type="button" class="btn btn-default" class="form-control" data-dismiss="modal" onclick="procActive()">{{ _t(config('Convert.ok')[0], [], $_SESSION['lang']) }}</button>
                        <button type="button" class="btn btn-default" class="form-control" data-dismiss="modal">{{ _t(config('Convert.cancel')[0], [], $_SESSION['lang']) }}</button>
                    </div>
                </div>
            </div>
        </div>
        {{-- inactive product modal--}}
        <div class="modal fade" id="inactiveModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
                        <button type="button" class="btn btn-default" class="form-control" data-dismiss="modal" onclick="procInactive()">{{ _t(config('Convert.ok')[0], [], $_SESSION['lang']) }}</button>
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
    <script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/jquery.dataTables.js') }}" ></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/dataTables.bootstrap.js') }}" ></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/dataTables.buttons.js') }}" ></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/dataTables.colReorder.js') }}" ></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/dataTables.responsive.js') }}" ></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/dataTables.rowReorder.js') }}" ></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/buttons.colVis.js') }}" ></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/buttons.html5.js') }}" ></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/buttons.print.js') }}" ></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/buttons.bootstrap.js') }}" ></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/buttons.print.js') }}" ></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/pdfmake.js') }}" ></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/vfs_fonts.js') }}" ></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/dataTables.scroller.js') }}" ></script>
    <script type="text/javascript" src="{{ asset('assets/js/pages/table-advanced.js') }}" ></script>
    <script type="text/javascript">
        $(document).ready(function () {
        });
        var table1 = null;
        $(function () {

            $('body').on('hidden.bs.modal', '.modal', function () {
                $(this).removeData('bs.modal');
            });
            table1 = $('#table1').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            });
        });

        function procActive(id){
            var id = $('#deleteid').val();
            // console.log(id);
            $.ajax({
                type: "get",
                url: '/admin/product/' + id + '/active',
                success: function (result) {
                    location.reload();
                },
                error: function (result) {
                    console.log(result)
                }
            });
        }
        function procInactive(id){
            var id = $('#deleteid').val();
            console.log(id);
            // console.log(id);
            $.ajax({
                type: "get",
                url: '/admin/product/' + id + '/inactive',
                success: function (result) {
                    location.reload();
                },
                error: function (result) {
                    console.log(result)
                }
            });
        }
        function setActive(id){
            $('#deleteid').val(id);
            $('#activeModal').modal('show');
        }
        function setInactive(id){
            $('#deleteid').val(id);
            $('#inactiveModal').modal('show');
        }
        function deleteItem(id){
            $('#deleteid').val(id);
            //$('#deleteModal').modal('show');
        }
        function deleteProduct(){
            var id = $('#deleteid').val();
            /* delete row in database and datatable  */
            $.ajax({
                type: "get",
                url: '/admin/product/' + id + '/delete',
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