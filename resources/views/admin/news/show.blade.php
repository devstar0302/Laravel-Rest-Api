@extends('admin/layouts/default')
{{-- Page title --}}
@section('title')
    {{ _t('News Detail', [], $_SESSION['lang']) }}
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
        <h1>{{ _t('News Detail', [], $_SESSION['lang']) }}</h1>
        <ol class="breadcrumb">
            <li>
                <a href="">
                    <i class="livicon" data-name="home" data-size="14" data-loop="true"></i>
                    {{ _t(config('Convert.dashboard')[0], [], $_SESSION['lang']) }}
                </a>
            </li>
            <li>
                <a href="#">{{ _t('News Detail', [], $_SESSION['lang']) }}</a>
            </li>
            <li class="active">{{ _t('News Detail', [], $_SESSION['lang']) }}</li>
        </ol>
    </section>

    <div class="panel-body" style="width:90%;margin-left:5%">
        <ul class="nav  nav-tabs ">
            <li class="active">
                <a href="#tab1" data-toggle="tab">
                    <i class="livicon" data-name="address-book" data-size="16" data-c="#418BCA" data-hc="#418BCA" data-loop="true"></i>
                    {{ _t('News Detail', [], $_SESSION['lang']) }}</a>
            </li>
            <li>
                <a href="#tab2" data-toggle="tab">
                    <i class="livicon" data-name="edit" data-size="16" data-loop="true" data-c="#418BCA" data-hc="#418BCA"></i>
                    {{ _t('Comments', [], $_SESSION['lang']) }}</a>
            </li>

        </ul>
        <div  class="tab-content mar-top">
            <div id="tab1" class="tab-pane fade active in">
                <div class="form-group has-success" style="margin-top:20px;">
                </div>
                <form role="form" action="" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}"/>

                    <?php
                        if($news->user_photo == null || $news->user_photo == ''){
                            $news->user_photo = 'noimage.png';
                        }
                    ?>
                    <div class="form-group has-success row">
                        <div class="row" style="vertical-align: bottom">
                            <img src="/uploads/users/{{ $news->user_photo }}" style="max-height:150px;">
                            <span  class="control-label" style="margin-top:-5px;margin-left:20px;font-size:20px;">&nbsp;&nbsp; {{ $news->username }}</span>
                        </div>
                    </div>

                    <div class="form-group has-success row" style="margin-top:20px;">
                        <hr style="color:#999;border-top: 1px solid #a55e5e;">
                        <label class="control-label" for="photo" style="font-size: 120%">{{ _t('News Title', [], $_SESSION['lang']) }}</label>
                        <div class="row" style="padding-left:20px;">
                            <span  class="control-label" style="margin-top:-5px;">{{ $news->title }}
                        </div>
                    </div>
                    <div class="form-group has-success" style="margin-top:20px;">
                        <hr style="color:#999;border-top: 1px solid #a55e5e;">
                        <label class="control-label" for="photo" style="font-size: 120%">{{ _t('News Description', [], $_SESSION['lang']) }}</label>
                        <div class="row" style="padding-left:20px;">
                            <span  class="control-label" style="margin-top:-5px;">{{ $news->description }}
                        </div>
                    </div>
                    <div class="form-group has-success">
                        <div class="col-lg-3">
                            <span  class="control-label" style="margin-top:-5px;">{{ _t('Likes', [], $_SESSION['lang']) }}</span>&nbsp;&nbsp; {{ $news->likenum }}
                        </div>
                        <div class="col-lg-3">
                            <span  class="control-label" style="margin-top:-5px;">{{ _t('Dislikes', [], $_SESSION['lang']) }}</span>&nbsp;&nbsp; {{ $news->dislikenum }}
                        </div>
                        <div class="col-lg-3">
                            <span  class="control-label" style="margin-top:-5px;">{{ _t('Comments', [], $_SESSION['lang']) }}</span>&nbsp;&nbsp; {{ $news->comment_num }}
                        </div>
                        <div class="col-lg-3">
                            <?php
                            $cdate = date('Y-m-d', strtotime($news->created_at));
                            ?>
                            <span  class="control-label" style="margin-top:-5px;">{{ _t('Created Date', [], $_SESSION['lang']) }}</span>&nbsp;&nbsp; {{ $cdate }}
                        </div>
                    </div>
                    <div class="form-group has-success" style="margin-top:20px;">
                        <hr style="color:#999;border-top: 1px solid #a55e5e;">
                        <label class="control-label" for="photo" style="font-size: 120%">{{ _t('News Photo', [], $_SESSION['lang']) }}</label>
                        <div class="row" style="padding-left:20px;">
                            <img src="/uploads/files/newitems/{{ $news->photo }}" style="max-height:300px;">
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
                                        <th>{{ _t('Comment', [], $_SESSION['lang']) }}</th>
                                        <th>{{ _t('Created Date', [], $_SESSION['lang']) }}</th>
                                        <th>{{ _t('Actions', [], $_SESSION['lang']) }}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    //print_r($customers);
                                    $i = 0;

                                    foreach($comments as $comment){

                                        $i++;
                                        $cdate = date('M d, Y', strtotime($comment->created_at));
                                        if($comment->user_photo == null || $comment->user_photo == ''){
                                            $comment->user_photo = 'noimage.png';
                                        }
                                        ?>
                                        <tr>
                                            <td>{{ $i }}</td>
                                            <td><img src="/uploads/users/{{ $news->user_photo }}" style="max-height:50px;"></td>
                                            <td>{{ $comment->username }}</td>
                                            <td>{{ $comment->comment }}</td>
                                            <td>{{ $cdate }}</td>
                                            <td>
                                                <a href="" data-toggle="modal" data-target="#delete_confirm" onclick="deleteItem('{{$comment->comment_id }}')"><i class="livicon" data-name="trash" data-size="18" data-loop="true" data-c="#f56954" data-hc="#f56954" title="inactive advertise"></i></a>
                                            </td>

                                        </tr>
                                    <?php
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
