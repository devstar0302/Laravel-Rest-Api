@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
    {{ config('Convert.advertises')[0] }}
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
        <h1>{{ config('Convert.advertises')[0] }}</h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{ route('dashboard') }}">
                    <i class="livicon" data-name="home" data-size="14" data-color="#000"></i>
                    {{ config('Convert.dashboard')[0] }}
                </a>
            </li>
            <li><a href="#"> {{ config('Convert.advertises')[0] }}</a></li>
            <li class="active">{{ config('Convert.advertises')[0] }}</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content paddingleft_right15">
        <div class="row">
            <div class="panel panel-primary ">
                <div class="panel-heading">
                    <h4 class="panel-title"> <i class="livicon" data-name="user" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                        {{ config('Convert.advertises')[0] }}
                    </h4>
                </div>
                <br />
                <div class="panel-body">
                    <table class="table table-striped table-bordered table-hover dataTable no-footer sample_editable"
                           id="advertisetable" role="grid">
                        <thead>
                        <tr role="row">
                            <th class="sorting_asc"  tabindex="0" aria-controls="paidtable" rowspan="1" te
                                colspan="1"  aria-label="
                                                   ID
                                            : activate to sort column ascending" style="width: 30px;">{{ config('Convert.id')[0] }}
                            </th>
                            <th class="sorting_asc" tabindex="0" aria-controls="paidtable" rowspan="1"
                                colspan="1"  aria-label="
                                                   Image
                                            : activate to sort column ascending" style="width: 100px;">{{ config('Convert.advertise_image')[0] }}
                            </th>
                            <th class="sorting_asc" tabindex="0" aria-controls="paidtable" rowspan="1"
                                colspan="1"  aria-label="
                                                   Title
                                            : activate to sort column ascending" style="width: 100px;"> {{ config('Convert.advertise_title')[0] }}
                            </th>
                            <th class="sorting_asc" tabindex="0" aria-controls="paidtable" rowspan="1"
                                colspan="1"  aria-label="
                                                   weburl
                                            : activate to sort column ascending" style="width: 100px;">{{ config('Convert.advertise_weburl')[0] }}
                            </th>
                            <th class="sorting_asc" tabindex="0" aria-controls="paidtable" rowspan="1"
                                colspan="1"  aria-label="
                                                   expired
                                            : activate to sort column ascending" style="width: 100px;">{{ config('Convert.advertise_expired_date')[0] }}
                            </th>
                            <th class="sorting_asc" tabindex="0" aria-controls="paidtable" rowspan="1"
                                colspan="1"  aria-label="
                                                   Status
                                            : activate to sort column ascending" style="width: 100px;">{{ config('Convert.status')[0] }}
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="paidtable" rowspan="1"
                                colspan="1" aria-label="
                                                Created At
                                            : activate to sort column ascending" style="width: 80px;">{{ config('Convert.create_date')[0] }}
                            </th>
                            <th class="sorting_asc" tabindex="0" aria-controls="paidtable" rowspan="1"
                                colspan="1"  aria-label="
                                                   Actions
                                            : activate to sort column ascending" style="width:100px;">{{ config('Convert.actions')[0] }}
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
            table = $('#advertisetable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route('admin.advertise.data', $type) !!}',
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'image', name: 'image' , orderable: false, searchable: false},
                    { data: 'title', name: 'title' },
                    { data: 'weburl', name: 'weburl' },
                    { data: 'expired', name: 'expired' },
                    { data: 'status', name: 'status', orderable: false, searchable: false},
                    { data: 'created_at', name:'created_at', searchable: false},
                    { data: 'actions', name: 'actions', orderable: false, searchable: false }
                ]
            });
            table.on( 'draw', function () {
                $('.livicon').each(function(){
                    $(this).updateLivicon();
                });
            } );
            $('#advertisetable_filter').append('<button type="button" style="margin-left: 20px; border:1px solid #ccc; background-color: #6c7def; color: white" class="form-control button-sm" onclick="addAdvertise()">{{ config('Convert.add')[0] }}</button >');

        });

    </script>


    <!-- delete modal -->
    <div class="modal fade" id="delete_confirm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="width: 80%">
                <input type="hidden" id="deleteid" value="0">
                <div class="modal-body">
                    {{ config('Convert.advertise_delete_message')[0] }}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" class="form-control" data-dismiss="modal" onclick="deleteData()">{{ config('Convert.delete')[0] }}</button>
                    <button type="button" class="btn btn-default" class="form-control" data-dismiss="modal">{{ config('Convert.cancel')[0] }}</button>
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
                    {{ config('Convert.advertise_active_message')[0] }}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" class="form-control" data-dismiss="modal" onclick="active_data()">{{ config('Convert.ok')[0] }}</button>
                    <button type="button" class="btn btn-default" class="form-control" data-dismiss="modal">{{ config('Convert.cancel')[0] }}</button>
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
                    {{ config('Convert.advertise_inactive_message')[0] }}
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" class="form-control" data-dismiss="modal" onclick="inactive_data()">{{ config('Convert.ok')[0] }}</button>
                    <button type="button" class="btn btn-default" class="form-control" data-dismiss="modal">{{ config('Convert.cancel')[0] }}</button>
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
                url: '/admin/advertise/' + id + '/activedata',
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
                url: '/admin/advertise/' + id + '/inactivedata',
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
        function addAdvertise(){
            location.href="{{ route('admin.advertise.add', $type) }}";
        }
        function deleteData(){
            var id = $('#deleteid').val();
            /* delete row in database and datatable  */
            $.ajax({
                type: "get",
                url: '/admin/advertise/' + id + '/delete',
                success: function (result) {
                    if(result == ''){
                        $('#messagecontent').html('Successfully deleted.');
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
