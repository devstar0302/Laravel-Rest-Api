@extends('admin/layouts/default')
{{-- Page title --}}
@section('title')
    {{ _t('Product Detail', [], $_SESSION['lang']) }}
    @parent
@stop

{{-- page level styles --}}
@section('header_styles')
    <script async defer src="https://maps.google.com/maps/api/js?key=AIzaSyB_pkKqsbu-pnD5FBwU6vMTZupdoszcbdY" type="text/javascript"></script>
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
        <h1>{{ _t('Product Detail', [], $_SESSION['lang']) }}</h1>
        <ol class="breadcrumb">
            <li>
                <a href="">
                    <i class="livicon" data-name="home" data-size="14" data-loop="true"></i>
                    {{ _t(config('Convert.dashboard')[0], [], $_SESSION['lang']) }}
                </a>
            </li>
            <li>
                <a href="#">{{ _t('Products', [], $_SESSION['lang']) }}</a>
            </li>
            <li class="active">{{ _t('Product Detail', [], $_SESSION['lang']) }}</li>
        </ol>
    </section>

    <div class="panel-body" style="width:90%;margin-left:5%">
        <ul class="nav  nav-tabs ">
            <li class="active">
                <a href="#tab1" data-toggle="tab">
                    <i class="livicon" data-name="address-book" data-size="16" data-c="#418BCA" data-hc="#418BCA" data-loop="true"></i>
                    {{ _t('Product Detail', [], $_SESSION['lang']) }}</a>
            </li>
            <li>
                <a href="#tab2" data-toggle="tab">
                    <i class="livicon" data-name="edit" data-size="16" data-loop="true" data-c="#418BCA" data-hc="#418BCA"></i>
                    {{ _t('Claimed Redeems', [], $_SESSION['lang']) }}</a>
            </li>
            <li>
                <a href="#tab3" data-toggle="tab">
                    <i class="livicon" data-name="edit" data-size="16" data-loop="true" data-c="#418BCA" data-hc="#418BCA"></i>
                    {{ _t('Favorites', [], $_SESSION['lang']) }}</a>
            </li>

        </ul>
        <div  class="tab-content mar-top">
            <div id="tab1" class="tab-pane fade active in">
                <div class="form-group has-success" style="margin-top:20px;">
                </div>
                <form role="form" action="" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}"/>

                    <?php
                        $merchant = DB::table('users')->where('id', $product->merchant_id)->first();
                        $merchantname = '';
                        $merchantphoto = '/img/userimage.png';
                        $merchantemail = '';
                        if(!empty($merchant)){
                            $merchantname = $merchant->first_name." ".$merchant->last_name;
                            $merchantemail = $merchant->email;
                            if(!empty($merchant->pic))
                                $merchantphoto = '/uploads/merchant/'.$merchant->pic;
                        }
                        $category = DB::table('oollah_category')->where('id', $product->cat_id)->first();
                        $categoryname = '';
                        if(!empty($category))
                            $categoryname = $category->name;
                        $activestatus = 'Active';
                        if($product->status == 1){
                            $activestatus = 'Inactive';
                        }
                        $cdate = date('M d, Y h:i:s', strtotime($product->created_at));
                    ?>
                    <div class="form-group has-success row">
                        <div class="row" style="vertical-align: bottom">
                            <div class="col-lg-3">
                                <label class="control-label" for="photo" style="font-size: 120%">{{ _t('Product Name', [], $_SESSION['lang']) }}</label>
                                <div class="row" style="padding-left:20px;">
                                    <span  class="control-label1" style="margin-top:-5px;">{{ $product->title }}</span>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <label class="control-label" for="photo" style="font-size: 120%">{{ _t('Claim Redeem', [], $_SESSION['lang']) }}</label>
                                <div class="row" style="padding-left:20px;">
                                    <span  class="control-label1" style="margin-top:-5px;">{{ $product->claimnum }}</span>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <label class="control-label" for="photo" style="font-size: 120%">{{ _t('Price', [], $_SESSION['lang']) }}</label>
                                <div class="row" style="padding-left:20px;">
                                    @if($product->discount_price == 0)
                                    <span  class="control-label1" style="margin-top:-5px;">{{ $product->price }} USD</span>
                                    @else
                                    <span  class="control-label1" style="margin-top:-5px;">{{ $product->discount_price }} USD/ <span class="strikethrough">{{ $product->price }} USD</span></span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <label class="control-label" for="photo" style="font-size: 120%">{{ _t('QR Code', [], $_SESSION['lang']) }}</label>
                                <div class="row" style="padding-left:20px;">
                                    @if(!empty($product->qrcode))
                                        <img src="/uploads/qrcodes/{{ $product->qrcode }}" style="max-height:100px;">
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group has-success row">
                        <div class="row" style="vertical-align: bottom">
                            <img src="{{ $merchantphoto }}" style="max-height:100px; border-radius:50%">
                            <span  class="control-label1" style="margin-top:-5px;margin-left:20px;font-size:20px;">&nbsp;&nbsp; {{ $merchantname }}</span>
                            <span  class="control-label1" style="margin-top:-5px;margin-left:20px;font-size:20px;">&nbsp;&nbsp; {{ $merchantemail }}</span>
                        </div>
                    </div>
                    <div class="form-group has-success row">
                        <div class="row" style="vertical-align: bottom">
                            <div class="col-lg-3">
                                <label class="control-label" for="photo" style="font-size: 120%">{{ _t('Category Name', [], $_SESSION['lang']) }}</label>
                                <div class="row" style="padding-left:20px;">
                                    <span  class="control-label1" style="margin-top:-5px;">{{ $categoryname }}</span>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <label class="control-label" for="photo" style="font-size: 120%">{{ _t('Product Type', [], $_SESSION['lang']) }}</label>
                                <div class="row" style="padding-left:20px;">
                                    <span  class="control-label1" style="margin-top:-5px;">{{ $product->type }}</span>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <label class="control-label" for="photo" style="font-size: 120%">{{ _t('Starting Date', [], $_SESSION['lang']) }}</label>
                                <div class="row" style="padding-left:20px;">
                                    <span  class="control-label1" style="margin-top:-5px;">{{ $product->start_time }}</span>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <label class="control-label" for="photo" style="font-size: 120%">{{ _t('Ending Date', [], $_SESSION['lang']) }}</label>
                                <div class="row" style="padding-left:20px;">
                                    <span  class="control-label1" style="margin-top:-5px;">{{ $product->end_time }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group has-success row">
                        <div class="row" style="vertical-align: bottom">
                            <div class="col-lg-3">
                                <label class="control-label" for="photo" style="font-size: 120%">{{ _t('Product Region', [], $_SESSION['lang']) }}</label>
                                <div class="row" style="padding-left:20px;">
                                    <span  class="control-label1" style="margin-top:-5px;">{{ $product->region }}</span>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <label class="control-label" for="photo" style="font-size: 120%">{{ _t('Product Address', [], $_SESSION['lang']) }}</label>
                                <div class="row" style="padding-left:20px;">
                                    <span  class="control-label1" style="margin-top:-5px;">@if(!empty($product->address))<a href="https://www.google.com/maps/place/{{ $product->address }}" target="_blank"> @else <a href="https://www.google.com/maps/place/{{ $product->lat }},{{ $product->lon }}" target="_blank"> @endif @if(!empty($product->address)) {{ $product->address }} @endif <br> @if(!empty($product->lat)) ({{ $product->lat }},{{ $product->lon }}) @endif </a></span>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <label class="control-label" for="photo" style="font-size: 120%">{{ _t('Claimed Redeem', [], $_SESSION['lang']) }}</label>
                                <div class="row" style="padding-left:20px;">
                                    <span  class="control-label1" style="margin-top:-5px;">{{ $product->claimednum }}</span>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <label class="control-label" for="photo" style="font-size: 120%">{{ _t('Favorites', [], $_SESSION['lang']) }}</label>
                                <div class="row" style="padding-left:20px;">
                                    <span  class="control-label1" style="margin-top:-5px;">{{ $product->favonum }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group has-success row">
                        <div class="row" style="vertical-align: bottom">
                            <div class="col-lg-3">
                                <label class="control-label" for="photo" style="font-size: 120%">{{ _t('Likes', [], $_SESSION['lang']) }}</label>
                                <div class="row" style="padding-left:20px;">
                                    <span  class="control-label1" style="margin-top:-5px;">{{ $product->likenum }}</span>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <label class="control-label" for="photo" style="font-size: 120%">{{ _t('Dislikes', [], $_SESSION['lang']) }}</label>
                                <div class="row" style="padding-left:20px;">
                                    <span  class="control-label1" style="margin-top:-5px;">{{ $product->dislikenum }}</span>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <label class="control-label" for="photo" style="font-size: 120%">{{ _t('Active Status', [], $_SESSION['lang']) }}</label>
                                <div class="row" style="padding-left:20px;">
                                    <span  class="control-label1" style="margin-top:-5px;">{{ $activestatus }}</span>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <label class="control-label" for="photo" style="font-size: 120%">{{ _t('Created Date', [], $_SESSION['lang']) }}</label>
                                <div class="row" style="padding-left:20px;">
                                    <span  class="control-label1" style="margin-top:-5px;">{{ $cdate }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group has-success row">
                        <div class="row" style="vertical-align: bottom">
                            <div class="col-lg-12">
                                <label class="control-label" for="photo" style="font-size: 120%">{{ _t('Product Description', [], $_SESSION['lang']) }}</label>
                                <div class="row" style="padding-left:20px;">
                                    <span  class="control-label1" style="margin-top:-5px;">{{ $product->description }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group has-success row">
                        <div class="row" style="vertical-align: bottom">
                            <div class="col-lg-12">
                                <label class="control-label" for="photo" style="font-size: 120%">{{ _t('Product Photos', [], $_SESSION['lang']) }}</label>
                                <div class="row" style="padding-left:20px;">
                                    <?php
                                    foreach($photos as $photo){
                                    ?>
                                    <img src="/uploads/products/{{ $photo->photo }}" style="max-height:200px;">
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div id="tab2" class="tab-pane fade">
                <div class="form-group has-success" style="margin-top:20px;">
                    <div style="padding-top:10px;">
                        <div class="panel panel-primary filterable" style="background-color: transparent !important;">

                            <div class="panel-body table-responsive">
                                <table class="table table-striped table-bordered table-hover dataTable no-footer sample_editable"
                                       id="commentstable" role="grid">
                                    <thead>
                                    <tr>
                                        <th>{{ _t('NO', [], $_SESSION['lang']) }}</th>
                                        <th>{{ _t('User Photo', [], $_SESSION['lang']) }}</th>
                                        <th>{{ _t('User Name', [], $_SESSION['lang']) }}</th>
                                        <th>{{ _t('User Email', [], $_SESSION['lang']) }}</th>
                                        <th>{{ _t('Created Date', [], $_SESSION['lang']) }}</th>
                                        <!--<th>{{ _t('Actions', [], $_SESSION['lang']) }}</th>-->
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    //print_r($customers);
                                    $i = 0;

                                    foreach($claimeds as $claimed){

                                        $i++;
                                        $user = DB::table('users')->where('id', $claimed->user_id)->first();
                                        if(!empty($user)){
                                            $cdate = date('M d, Y h:i:s', strtotime($claimed->created_at));
                                            $claimedphoto = '/img/userimage.png';
                                            $claimedemail = '';
                                            $claimedname = $user->first_name." ".$user->last_name;
                                            $claimedemail = $user->email;
                                            if(!empty($user->pic))
                                                $claimedphoto = '/uploads/users/'.$user->pic;
                                        ?>
                                        <tr>
                                            <td>{{ $i }}</td>
                                            <td><img src="{{ $claimedphoto }}" style="max-height:40px;border-radius:50%"></td>
                                            <td>{{ $claimedname }}</td>
                                            <td>{{ $claimedemail }}</td>
                                            <td>{{ $cdate }}</td>
                                            <!--<td>
                                                <a href="" data-toggle="modal" data-target="#delete_confirm" onclick="deleteItem('{{$claimed->id }}')"><i class="livicon" data-name="trash" data-size="18" data-loop="true" data-c="#f56954" data-hc="#f56954" title="inactive advertise"></i></a>
                                            </td>-->

                                        </tr>
                                    <?php
                                         }
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="tab3" class="tab-pane fade">
                <div class="form-group has-success" style="margin-top:20px;">
                    <div style="padding-top:10px;">
                        <div class="panel panel-primary filterable" style="background-color: transparent !important;">

                            <div class="panel-body table-responsive">
                                <table class="table table-striped table-bordered table-hover dataTable no-footer sample_editable"
                                       id="commentstable" role="grid">
                                    <thead>
                                    <tr>
                                        <th>{{ _t('NO', [], $_SESSION['lang']) }}</th>
                                        <th>{{ _t('User Photo', [], $_SESSION['lang']) }}</th>
                                        <th>{{ _t('User Name', [], $_SESSION['lang']) }}</th>
                                        <th>{{ _t('User Email', [], $_SESSION['lang']) }}</th>
                                        <th>{{ _t('Created Date', [], $_SESSION['lang']) }}</th>
                                        <!--<th>{{ _t('Actions', [], $_SESSION['lang']) }}</th>-->
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    //print_r($customers);
                                    $i = 0;

                                    foreach($favorites as $favorite){

                                    $i++;
                                    $user = DB::table('users')->where('id', $favorite->user_id)->first();
                                    if(!empty($user)){
                                    $cdate = date('M d, Y h:i:s', strtotime($favorite->created_at));
                                    $claimedphoto = '/img/userimage.png';
                                    $claimedemail = '';
                                    $claimedname = $user->first_name." ".$user->last_name;
                                    $claimedemail = $user->email;
                                    if(!empty($user->pic))
                                        $claimedphoto = '/uploads/users/'.$user->pic;
                                    ?>
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td><img src="{{ $claimedphoto }}" style="max-height:40px;border-radius:50%"></td>
                                        <td>{{ $claimedname }}</td>
                                        <td>{{ $claimedemail }}</td>
                                        <td>{{ $cdate }}</td>
                                        <!--<td>
                                            <a href="" data-toggle="modal" data-target="#delete_confirm" onclick="deleteItem('{{$claimed->id }}')"><i class="livicon" data-name="trash" data-size="18" data-loop="true" data-c="#f56954" data-hc="#f56954" title="inactive advertise"></i></a>
                                        </td>-->

                                    </tr>
                                    <?php
                                    }
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

    </div>

        <!-- delete modal -->
        <div class="modal fade" id="delete_confirm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content" style="width: 80%">
                    <input type="hidden" id="deleteid" value="0">
                    <div class="modal-body">
                        {{ _t(config('Convert.delete_message')[0], [], $_SESSION['lang']) }}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" class="form-control" data-dismiss="modal" onclick="deleteData()">{{ _t(config('Convert.delete')[0], [], $_SESSION['lang']) }}</button>
                        <button type="button" class="btn btn-default" class="form-control" data-dismiss="modal">{{ _t(config('Convert.cancel')[0], [], $_SESSION['lang']) }}</button>
                    </div>
                </div>
            </div>
        </div>
        <style>
            .has-success .control-label {
                color: #389fc8;
            }
            .control-label1 {
                color: #124154;
            }
            .strikethrough:before {
                position: absolute;
                content: "";
                left: 0;
                top: 50%;
                right: 0;
                border-top: 1px solid;
                border-color: inherit;
            }
            .strikethrough {
                position: relative;
            }
        </style>
@stop

{{-- page level scripts --}}
@section('footer_scripts')

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
    <script>

        function deleteItem(id){
            $('#deleteid').val(id);
        }
        function deleteData(){
            var id = $('#deleteid').val();
            /* delete row in database and datatable  */
            $.ajax({
                type: "get",
                url: '/admin/comments/' + id + '/delete',
                success: function (result) {
                    if(result == ''){
                        $('#messagecontent').html('{{ _t('Successfully deleted.', [], $_SESSION['lang']) }}');
                    }else{
                        $('#messagecontent').html('This is using in '+result);
                    }
                    $('#messageModal').modal('show');
                    location.reload();
                    //table.draw(false);
                },
                error: function (result) {
                    console.log(result)

                }
            });
        }
    </script>

@stop
