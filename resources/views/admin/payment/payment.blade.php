@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
    {{ _t('Third Party', [], $_SESSION['lang']) }}
    @parent
@stop

{{-- page level styles --}}
@section('header_styles')
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
        <h1>{{ _t('Third Party', [], $_SESSION['lang']) }}</h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{ route('dashboard') }}">
                    <i class="livicon" data-name="home" data-size="14" data-color="#000"></i>
                    {{ _t('Dashboard', [], $_SESSION['lang']) }}
                </a>
            </li>
            <li><a href="#"> {{ _t('Third Party', [], $_SESSION['lang']) }}</a></li>
            <li class="active">{{ _t('Third Party', [], $_SESSION['lang']) }}</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content paddingleft_right15">
        <div class="row">
            <div class="panel panel-primary ">
                <div class="panel-heading">
                    <h4 class="panel-title"> <i class="livicon" data-name="magic" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                        {{ _t('Third Party', [], $_SESSION['lang']) }}
                    </h4>
                </div>
                <br />
                <div class="panel-body">
                    <div class="panel panel-primary filterable" style="background-color: transparent !important;">

                        <div class="panel-body table-responsive">
                            <table class="table table-striped table-bordered" id="table2">
                                <thead>
                                <tr>
                                    <th>{{ _t('NO', [], $_SESSION['lang']) }}</th>
                                    <th>{{ _t('Third Part Name', [], $_SESSION['lang']) }}</th>
                                    <th>{{ _t('App ID', [], $_SESSION['lang']) }}</th>
                                    <th>{{ _t('Secret', [], $_SESSION['lang']) }}</th>
                                    <th>{{ _t('API Key', [], $_SESSION['lang']) }}</th>
                                    <th>{{ _t('Created Date', [], $_SESSION['lang']) }}</th>
                                    <th>{{ _t('Actions', [], $_SESSION['lang']) }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                //print_r($customers);
                                $i = 0;

                                foreach($payments as $payment){

                                $i++;
                                $paiddate = date('M d, Y', strtotime($payment->created_at));

                                ?>
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{ $payment->name }}</td>
                                    <td>{{ $payment->app_id }}</td>
                                    <td>{{ $payment->secret }}</td>
                                    <td>{{ $payment->api_key }}</td>
                                    <td>{{ $paiddate }}</td>
                                    <td>
                                        <a href="{{ url('/admin/thirdparty/'.$payment->id.'/show') }}"><i class="livicon" data-name="info" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="view third party"></i></a>&nbsp;&nbsp;&nbsp;
                                        <a href="{{ url('/admin/thirdparty/'.$payment->id.'/edit') }}"><i class="livicon" data-name="edit" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="update third party"></i></a>&nbsp;&nbsp;&nbsp;
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
        </div>    <!-- row-->
    </section>
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



    <!-- delete modal -->
    <div class="modal fade" id="delete_confirm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="width: 80%">
                <input type="hidden" id="deleteid" value="0">
                <div class="modal-body">
                    {{ _t('Do you want to delete?', [], $_SESSION['lang']) }}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" class="form-control" data-dismiss="modal" onclick="deleteData()">{{ _t('Delete', [], $_SESSION['lang']) }}</button>
                    <button type="button" class="btn btn-default" class="form-control" data-dismiss="modal">{{ _t('Cancel', [], $_SESSION['lang']) }}</button>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="activeModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="width: 80%">
                <input type="hidden" id="occ_id" value="0">
                {{--<input type="hidden" id="activeid" value="0">--}}
                <div class="modal-body" id="statecontent">
                    {{ _t('Do you want to active?', [], $_SESSION['lang']) }}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" class="form-control" data-dismiss="modal" onclick="active_data()">{{ _t('OK', [], $_SESSION['lang']) }}</button>
                    <button type="button" class="btn btn-default" class="form-control" data-dismiss="modal">{{ _t('Cancel', [], $_SESSION['lang']) }}</button>
                </div>
            </div>
        </div>
    </div>
    {{-- inactive product modal--}}
    <div class="modal fade" id="inactiveModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="width: 80%">
                <input type="hidden" id="occ_id" value="0">
                {{--<input type="hidden" id="inactiveid" value="0">--}}
                <div class="modal-body" id="statecontent">
                    {{ _t('Do you want to inactive?', [], $_SESSION['lang']) }}
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" class="form-control" data-dismiss="modal" onclick="inactive_data()">{{ _t('OK', [], $_SESSION['lang']) }}</button>
                    <button type="button" class="btn btn-default" class="form-control" data-dismiss="modal">{{ _t('Cancel', [], $_SESSION['lang']) }}</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(function () {
            $('body').on('hidden.bs.modal', '.modal', function () {
                $(this).removeData('bs.modal');
            });
        });
    </script>
@stop
