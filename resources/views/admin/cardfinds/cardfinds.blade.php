@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
    {{ _t('Cardfinds', [], $_SESSION['lang']) }}
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
        <h1>Cardfinds</h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{ route('dashboard') }}">
                    <i class="livicon" data-name="home" data-size="14" data-color="#000"></i>
                    {{ config('Convert.dashboard')[0] }}
                </a>
            </li>
            <li><a href="#"> Cardfinds</a></li>
            <li class="active">Clients</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content paddingleft_right15">
        <div class="row">
            <div class="panel panel-primary ">
                <div class="panel-heading">
                    <h4 class="panel-title"> <i class="livicon" data-name="user" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                        Clients
                    </h4>
                </div>
                <br />
                <div class="panel-body" style="overflow-x: auto">
                    <table class="table table-striped table-bordered table-hover dataTable no-footer sample_editable"
                           id="cardfindstable" role="grid">
                        <thead>
                        <tr role="row">
                            <th class="tb_id sorting_asc"  tabindex="0" aria-controls="paidtable" rowspan="1"
                                colspan="1"  aria-label="
                                                   ID
                                            : activate to sort column ascending" style="">{{ config('Convert.id')[0] }}
                            </th>
                            <th class="tb_width_1 sorting_asc" tabindex="0" aria-controls="paidtable" rowspan="1"
                                colspan="1"  aria-label="
                                                   Logo
                                            : activate to sort column ascending" style="">Logo
                            </th>
                            <th class="tb_width_4 sorting_asc" tabindex="0" aria-controls="paidtable" rowspan="1"
                                colspan="1"  aria-label="
                                                   Business Name
                                            : activate to sort column ascending" style="">Business Name
                            </th>
                            <th class="tb_width_5 sorting_asc" tabindex="0" aria-controls="paidtable" rowspan="1"
                                colspan="1"  aria-label="
                                                   Business Address
                                            : activate to sort column ascending" style="">Business Address
                            </th>
                            <th class="tb_width_3 sorting_asc" tabindex="0" aria-controls="paidtable" rowspan="1"
                                colspan="1"  aria-label="
                                                   Business Phone Number
                                            : activate to sort column ascending" style="">Business Phone Number
                            </th>
                            <th class="tb_width_1 sorting_asc" tabindex="0" aria-controls="paidtable" rowspan="1"
                                colspan="1"  aria-label="
                                                   Business Latitude
                                            : activate to sort column ascending" style="">Business Latitude
                            </th>
                            <th class="tb_width_1 sorting_asc" tabindex="0" aria-controls="paidtable" rowspan="1"
                                colspan="1"  aria-label="
                                                   Business Longitude
                                            : activate to sort column ascending" style="">Business Longitude
                            </th>
                            <th class="tb_width_2 sorting_asc" tabindex="0" aria-controls="paidtable" rowspan="1"
                                colspan="1"  aria-label="
                                                   Manager Name
                                            : activate to sort column ascending" style="">Manager Name
                            </th>
                            <th class="tb_width_3 sorting_asc" tabindex="0" aria-controls="paidtable" rowspan="1"
                                colspan="1"  aria-label="
                                                   Manager Phone Number
                                            : activate to sort column ascending" style="">Manager Phone Number
                            </th>
                            <th class="tb_width_4 sorting_asc" tabindex="0" aria-controls="paidtable" rowspan="1"
                                colspan="1"  aria-label="
                                                   Monday ~ Friday Open Hour
                                            : activate to sort column ascending" style="">Monday ~ Friday Open Hour
                            </th>
                            <th class="tb_width_4 sorting_asc" tabindex="0" aria-controls="paidtable" rowspan="1"
                                colspan="1"  aria-label="
                                                   Saturday Open Hour
                                            : activate to sort column ascending" style="">Saturday Open Hour
                            </th>
                            <th class="tb_width_4 sorting_asc" tabindex="0" aria-controls="paidtable" rowspan="1"
                                colspan="1"  aria-label="
                                                   Sunday Open Hour
                                            : activate to sort column ascending" style="">Sunday Open Hour
                            </th>
                            <th class="tb_width_6 sorting_asc" tabindex="0" aria-controls="paidtable" rowspan="1"
                                colspan="1"  aria-label="
                                                   Business Description
                                            : activate to sort column ascending" style="">Business Description
                            </th>
                            <th class="tb_width_7 sorting_asc" tabindex="0" aria-controls="paidtable" rowspan="1"
                                colspan="1"  aria-label="
                                                   Business Information
                                            : activate to sort column ascending" style="">Business Information
                            </th>
                            <th class="tb_width_7 sorting_asc" tabindex="0" aria-controls="paidtable" rowspan="1"
                                colspan="1"  aria-label="
                                                   Keywords
                                            : activate to sort column ascending" style="">Keywords
                            </th>
                            <th class="tb_id sorting_asc" tabindex="0" aria-controls="paidtable" rowspan="1"
                                colspan="1"  aria-label="
                                                   Comments
                                            : activate to sort column ascending" style="">Comments
                            </th>
                            <th class="sorting_asc" tabindex="0" aria-controls="paidtable" rowspan="1"
                                colspan="1"  aria-label="
                                                   Status
                                            : activate to sort column ascending" style="">{{ config('Convert.status')[0] }}
                            </th>
                            <th class="tb_width_2 sorting" tabindex="0" aria-controls="paidtable" rowspan="1"
                                colspan="1" aria-label="
                                                Created At
                                            : activate to sort column ascending" style="">{{ config('Convert.create_date')[0] }}
                            </th>
                            <th class="tb_width_2 sorting_asc" tabindex="0" aria-controls="paidtable" rowspan="1"
                                colspan="1"  aria-label="
                                                   Actions
                                            : activate to sort column ascending" style="">{{ config('Convert.actions')[0] }}
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
    <style>
        .table{
            width:200% !important;
        }
        .tb_id{ width:30px !important; }
        .tb_width_1{ width:70px !important; }
        .tb_width_2{ width:100px !important; }
        .tb_width_3{ width:200px !important; }
        .tb_width_4{ width:230px !important; }
        .tb_width_5{ width:250px !important; }
        .tb_width_6{ width:600px !important; }
        .tb_width_7{ width:800px !important; }

    </style>
    <script>
        var table = null;
        $(function() {
            var nEditing = null;
            table = $('#cardfindstable').DataTable({
                processing: true,
                serverSide: true,
                autoWidth: true,
                ajax: '{!! route('admin.cardfinds.data', $type) !!}',
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'logo', name: 'logo' , orderable: false, searchable: false},
                    { data: 'business_name', name: 'business_name' },
                    { data: 'business_address', name: 'business_address' },
                    { data: 'business_phone_number', name: 'business_phone_number', orderable: false, searchable: false },
                    { data: 'business_lat', name: 'business_lat', orderable: false, searchable: false },
                    { data: 'business_lon', name: 'business_lon', orderable: false, searchable: false },
                    { data: 'manager_name', name: 'manager_name' },
                    { data: 'manager_phone_number', name: 'manager_phone_number' , orderable: false, searchable: false},
                    { data: 'open_hour_mon_fri_from', name: 'open_hour_mon_fri_from' , orderable: false, searchable: false},
                    { data: 'open_hour_sat_from', name: 'open_hour_sat_from', orderable: false, searchable: false },
                    { data: 'open_hour_sun_from', name: 'open_hour_sun_from', orderable: false, searchable: false },
                    { data: 'business_short_description', name: 'business_short_description' , orderable: false, searchable: false},
                    { data: 'business_information', name: 'business_information' , orderable: false, searchable: false},
                    { data: 'keywords', name: 'keywords' , orderable: false, searchable: false},
                    { data: 'comment_num', name: 'comment_num' , orderable: false, searchable: false},
                    { data: 'status', name: 'status', orderable: false, searchable: false},
                    { data: 'created_at', name:'created_at', searchable: false},
                    { data: 'actions', name: 'actions', orderable: false, searchable: false }
                ]
            });
            table.columns.adjust().draw();
            table.on( 'draw', function () {
                $('.livicon').each(function(){
                    $(this).updateLivicon();
                });
            } );

            //$('#advertisetable_filter').append('<button type="button" style="margin-left: 20px; border:1px solid #ccc; background-color: #6c7def; color: white" class="form-control button-sm" onclick="addClient()">{{ config('Convert.add')[0] }}</button >');

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
                url: '/admin/cardfinds/' + id + '/activedata',
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
                url: '/admin/cardfinds/' + id + '/inactivedata',
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
        function addClient(){
            location.href="{{ route('admin.cardfinds.add', $type) }}";
        }
        function deleteData(){
            var id = $('#deleteid').val();
            /* delete row in database and datatable  */
            $.ajax({
                type: "get",
                url: '/admin/cardfinds/' + id + '/delete',
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
