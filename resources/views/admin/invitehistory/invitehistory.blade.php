@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
    {{ _t('Invite History', [], $_SESSION['lang']) }}
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
        <h1>{{ _t('Invite History', [], $_SESSION['lang']) }}</h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{ route('dashboard') }}">
                    <i class="livicon" data-name="home" data-size="14" data-color="#000"></i>
                    {{ _t(config('Convert.dashboard')[0], [], $_SESSION['lang']) }}
                </a>
            </li>
            <li><a href="#"> {{ _t('Invite History', [], $_SESSION['lang']) }}</a></li>
            <li class="active">{{ _t('Invite History', [], $_SESSION['lang']) }}</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content paddingleft_right15">
        <div class="row">
            <div class="panel panel-primary ">
                <div class="panel-heading">
                    <h4 class="panel-title"> <i class="livicon" data-name="spinner-six" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                        {{ _t('Invite History', [], $_SESSION['lang']) }}
                    </h4>
                </div>
                <br />
                <div class="panel-body">
                    <table class="table table-striped table-bordered table-hover dataTable no-footer sample_editable"
                           id="notificationtable" role="grid">
                        <thead>
                        <tr role="row">
                            <th class="sorting_asc"  tabindex="0" aria-controls="paidtable" rowspan="1" te
                                colspan="1"  aria-label="
                                                   ID
                                            : activate to sort column ascending" style="width: 30px;">{{ _t(config('Convert.id')[0], [], $_SESSION['lang']) }}
                            </th>
                            <th class="sorting_asc" tabindex="0" aria-controls="paidtable" rowspan="1"
                                colspan="1"  aria-label="
                                                   Send User
                                            : activate to sort column ascending" style="width: 100px;">{{ _t(config('Convert.sendUser')[0], [], $_SESSION['lang']) }}
                            </th>
                            <th class="sorting_asc" tabindex="0" aria-controls="paidtable" rowspan="1"
                                colspan="1"  aria-label="
                                                   Receive User
                                            : activate to sort column ascending" style="width: 100px;">{{ _t(config('Convert.receiveUser')[0], [], $_SESSION['lang']) }}
                            </th>
                            <th class="sorting_asc" tabindex="0" aria-controls="paidtable" rowspan="1"
                                colspan="1"  aria-label="
                                                   Status
                                            : activate to sort column ascending" style="width: 100px;">{{ _t('Status', [], $_SESSION['lang']) }}
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="paidtable" rowspan="1"
                                colspan="1" aria-label="
                                                Created At
                                            : activate to sort column ascending" style="width: 80px;">{{ _t(config('Convert.create_date')[0], [], $_SESSION['lang']) }}
                            </th>
                            <th class="sorting_asc" tabindex="0" aria-controls="paidtable" rowspan="1"
                                colspan="1"  aria-label="
                                                   Actions
                                            : activate to sort column ascending" style="width:100px;">{{ _t(config('Convert.actions')[0], [], $_SESSION['lang']) }}
                            </th>
                        </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>    <!-- row-->
    </section>
@stop

{{-- page level scripts --}}
@section('footer_scripts')
    <script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/jquery.dataTables.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/dataTables.bootstrap.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/dataTables.buttons.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/dataTables.colReorder.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/dataTables.responsive.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/dataTables.rowReorder.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/buttons.colVis.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/buttons.html5.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/buttons.print.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/buttons.bootstrap.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/buttons.print.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/pdfmake.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/vfs_fonts.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/dataTables.scroller.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/select2/js/select2.js') }}"></script>

    <script>
        var table = null;
        $(function() {
            var nEditing = null;
            table = $('#notificationtable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route('admin.invitehistory.data') !!}',
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'masterid', name: 'masterid' },
                    { data: 'receiverid', name: 'receiverid' },
                    { data: 'status', name: 'status' },
                    { data: 'created_at', name:'created_at', searchable: false},
                    { data: 'actions', name: 'actions', orderable: false, searchable: false }
                ]
            });
            table.on( 'draw', function () {
                $('.livicon').each(function(){
                    $(this).updateLivicon();
                });
            } );
            //$('#notificationtable_filter').append('<button type="button" style="margin-left: 20px; border:1px solid #ccc; background-color: #6c7def; color: white" class="form-control button-sm" onclick="addNotification()">{{ _t(config('Convert.add')[0], [], $_SESSION['lang']) }}</button >');

        });

    </script>


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


    <div class="modal fade" id="activeModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="width: 80%">
                <input type="hidden" id="occ_id" value="0">
                {{--<input type="hidden" id="activeid" value="0">--}}
                <div class="modal-body" id="statecontent">
                    {{ _t(config('Convert.active_message')[0], [], $_SESSION['lang']) }}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" class="form-control" data-dismiss="modal" onclick="active_data()">{{ _t(config('Convert.ok')[0], [], $_SESSION['lang']) }}</button>
                    <button type="button" class="btn btn-default" class="form-control" data-dismiss="modal">{{ _t(config('Convert.cancel')[0], [], $_SESSION['lang']) }}</button>
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
                    {{ _t(config('Convert.inactive_message')[0], [], $_SESSION['lang']) }}
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" class="form-control" data-dismiss="modal" onclick="inactive_data()">{{ _t(config('Convert.ok')[0], [], $_SESSION['lang']) }}</button>
                    <button type="button" class="btn btn-default" class="form-control" data-dismiss="modal">{{ _t(config('Convert.cancel')[0], [], $_SESSION['lang']) }}</button>
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
        /* active and inactive product */
        function active_data(){
            var id = $('#deleteid').val();
             console.log(id);
            $.ajax({
                type: "get",
                url: '/admin/advertisement/' + id + '/activedata',
                success: function (result) {
                    console.log('row ' + result + ' actived');
                    //location.reload();
                    //location.reload();
                    table.draw(false);
                },
                error: function (result) {
                    console.log(result)
                }
            });
        }

        function inactive_data(){

            var id = $('#deleteid').val();
            console.log(id);
            // console.log(id);
            $.ajax({
                type: "get",
                url: '/admin/advertisement/' + id + '/inactivedata',
                success: function (result) {
                    console.log('row ' + result + ' inactived');
                    //location.reload();
                    //location.reload();
                    table.draw(false);
                },
                error: function (result) {
                    console.log(result)
                }
            });
        }
        function addNotification(){
            location.href="{{ route('admin.advertisement.add') }}";
        }
        function deleteData(){
            var id = $('#deleteid').val();
            /* delete row in database and datatable  */

            $.ajax({
                type: "get",
                url: '/admin/invitehistory/' + id + '/delete',
                success: function (result) {
                    //alert(result);
                    if(result == ''){
                        $('#messagecontent').html('{{ _t('Successfully deleted.', [], $_SESSION['lang']) }}');
                    }else{
                        $('#messagecontent').html('This is using in '+result);
                    }
                    $('#messageModal').modal('show');
                    //location.reload();
                    table.draw(false);
                },
                error: function (result) {
                    console.log(result)

                }
            });
        }
        function deleteItem(id){
            $('#deleteid').val(id);
        }
        function active_data1(id){
            $('#deleteid').val(id);
        }
        function inactive_data1(id){
            $('#deleteid').val(id);
        }
    </script>
@stop
