@extends('admin.layouts.default')

{{-- Page title --}}
@section('title')
    {{ _t('Jobs', [], $_SESSION['lang']) }}
    @parent
@stop

{{-- page level styles --}}
@section('header_styles')
    <meta name="_token" content="{!! csrf_token() !!}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/select2/css/select2.min.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/select2/css/select2-bootstrap.css') }}"/>
    <link rel="stylesheet" type="text/css"
          href="{{ asset('assets/vendors/datatables/css/dataTables.bootstrap.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/datatables/css/buttons.bootstrap.css') }}"/>
    <link rel="stylesheet" type="text/css"
          href="{{ asset('assets/vendors/datatables/css/colReorder.bootstrap.css') }}"/>
    <link rel="stylesheet" type="text/css"
          href="{{ asset('assets/vendors/datatables/css/dataTables.bootstrap.css') }}"/>
    <link rel="stylesheet" type="text/css"
          href="{{ asset('assets/vendors/datatables/css/rowReorder.bootstrap.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/datatables/css/buttons.bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/datatables/css/scroller.bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/pages/tables.css') }}"/>
@stop

{{-- Page content --}}
@section('content')

    <section class="content-header">
        <h1>{{ _t('Jobs', [], $_SESSION['lang']) }}</h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{ route('dashboard') }}">
                    <i class="livicon" data-name="home" data-size="14" data-loop="true"></i>
                    {{ _t(config('Convert.dashboard')[0], [], $_SESSION['lang']) }}
                </a>
            </li>
            <li class="active">{{ _t('Jobs', [], $_SESSION['lang']) }}</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Second Data Table -->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="panel panel-danger table-edit">

                    <div class="panel-heading">
                        <h3 class="panel-title">
                                    <span style="font-size: 110%">
                                     <i class="livicon" data-name="notebook" data-size="15" data-c="#fff" data-hc="#fff"
                                        data-loop="true"></i>
                                        {{ _t('Jobs', [], $_SESSION['lang']) }}</span>
                        </h3>
                    </div>

                    <div class="panel-body" style="overflow-x: auto">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}"/>

                        <table class="table table-striped table-bordered table-hover dataTable no-footer sample_editable"
                               id="datatable" role="grid">
                            <thead>
                            <tr role="row">
                                <th class="tb_id sorting_asc"  tabindex="0" aria-controls="paidtable" rowspan="1"
                                    colspan="1"  aria-label="
                                                   ID
                                            : activate to sort column ascending" style="white-space:nowrap;">{{ config('Convert.id')[0] }}
                                </th>
                                <th class="tb_width_1 sorting_asc" tabindex="0" aria-controls="paidtable" rowspan="1"
                                    colspan="1"  aria-label="
                                                   Logo
                                            : activate to sort column ascending" style="">Logo
                                </th>
                                <th class="tb_width_2 sorting_asc" tabindex="0" aria-controls="paidtable" rowspan="1"
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
                                            : activate to sort column ascending" style="width: 100px;">Manager Phone Number
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
                    <!-- END EXAMPLE TABLE PORTLET-->
                </div>
            </div>
        </div>
        </div>
    </section>
    <!-- content -->

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

    <!-- Message modal -->
    <div class="modal fade" id="messageModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="width: 80%">
                <div class="modal-body" id="messagecontent">
                    {{ _t(config('Convert.inpute_message')[0], [], $_SESSION['lang']) }}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" class="form-control" data-dismiss="modal">{{ _t(config('Convert.ok')[0], [], $_SESSION['lang']) }}</button>
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
                    <button type="button" class="btn btn-default" class="form-control" data-dismiss="modal" onclick="inactive_data()">{{ _t(config('Convert.ok')[0], [], $_SESSION['lang']) }}</button>
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
                    <button type="button" class="btn btn-default" class="form-control" data-dismiss="modal" onclick="active_data()">{{ _t(config('Convert.ok')[0], [], $_SESSION['lang']) }}</button>
                    <button type="button" class="btn btn-default" class="form-control" data-dismiss="modal">{{ _t(config('Convert.cancel')[0], [], $_SESSION['lang']) }}</button>
                </div>
            </div>
        </div>
    </div>


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
    {{--<script type="text/javascript" src="{{ asset('assets/js/pages/table-editable.js') }}" ></script>--}}
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


        /* display table by using Datatable method  */
        var table = null;
        $(function () {
            var nEditing = null;
            table = $('#datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route("admin.section.jobs.data") !!}',
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
            table.on('draw', function () {
                $('.livicon').each(function () {
                    $(this).updateLivicon();
                });
            });

            /*  Cancel functionality in row */
            function restoreRow(table, nRow) {
                var aData = table.row(nRow).data();
                var jqTds = $('>td', nRow);

                for (var i = 0, iLen = jqTds.length; i < iLen; i++) {
                    table.cell().data(aData[i], nRow, i, false);
                }
                table.draw(false);
            }

            /*  Edit functionality  */
            var row_id, name, description, created_date;

            function editRow(table, nRow) {
                var aData = table.row(nRow).data();
                var jqTds = $('>td', nRow);
                row_id = aData.id ? aData.id : '';
                name = aData.name ? aData.name : '';
                description = aData.description ? aData.description : '';

                jqTds[0].innerHTML = row_id;
                jqTds[1].innerHTML = '<input type="text" min="0" name="name" id="name" class="form-control input-small" style="width:100% !important;" value="' + name + '">';
                jqTds[4].innerHTML = '<a class="edit" href="">{{ _t(config('Convert.save')[0], [], $_SESSION['lang']) }}</a>';
                jqTds[5].innerHTML = '<a class="cancel" href="">{{ _t(config('Convert.cancel')[0], [], $_SESSION['lang']) }}</a>';
            }

            /*  Save functionality  */
            function saveRow(table, nRow) {
                var jqInputs = $('input', nRow);
                name = jqInputs[0].value;

                var aData = table.row(nRow).data();
                console.log(aData);
                var jqTds = $('>td', nRow);
                row_id = aData.id ? aData.id : '';

                var tableData = 'name=' + name +
                        '&_token=' + $('meta[name=_token]').attr('content');

                $.ajax({
                    type: "post",
                    url: '/admin/section/' + row_id + '/update',
                    data: tableData,
                    success: function (result) {
                        console.log('result is' + result);
                        table.draw(false);
                    },
                    error: function (result) {
                        console.log(result)
                    }
                });
            }

            /*  Cancel Edit functionality  */
            function cancelEditRow(table, nRow) {
                var aData = table.row(nRow).data();
                var jqTds = $('>td', nRow);

                for (var i = 0, iLen = jqTds.length; i < iLen; i++) {
                    table.cell().data(aData[i], nRow, i, false);
                }
                table.draw(false);
            }

            /*  When clicked on Delete button   */
            table.on('click', '.delete', function (e) {
                e.preventDefault();
                var nRow = $(this).parents('tr')[0];
                var aData = table.row(nRow).data();
                var jqTds = $('>td', nRow);
                var id = aData.id;
                console.log(id);
                /*  get row id to delete */
                $('#deleteid').val(id);
                /*  display deletemodal */
                $('#deleteModal').modal('show');
            });

            /*  When clicked on cancel button  */
            table.on('click', '.cancel', function (e) {
                e.preventDefault();

                restoreRow(table, nEditing);
                nEditing = null;

            });

            /*  When clicked on edit button  */
            table.on('click', '.edit', function (e) {
                e.preventDefault();

                /* Get the row as a parent of the link that was clicked on */
                var nRow = $(this).parents('tr')[0];
                console.log(nRow);
                console.log(nEditing);
                if (nEditing !== null && nEditing != nRow) {
                    /* Currently editing - but not this row - restore the old before continuing to edit mode */
                    alert('You are already editing a row, you must save or cancel that row before editing a new row');

                } else if (nEditing == nRow && this.innerHTML == "Save") {
                    /* Editing this row and want to save it */
                    saveRow(table, nEditing);
                    nEditing = null;

                } else {
                    /* No edit in progress - let's start one */
                    editRow(table, nRow);
                    nEditing = nRow;
                }
            });

            /*
             When clicked on active button
             */
            table.on('click', '.active', function (e) {
                e.preventDefault();
                var nRow = $(this).parents('tr')[0];
                var aData = table.row(nRow).data();
                var jqTds = $('>td', nRow);
                var id = aData.id;
                console.log(id);
                /*  get row id to delete */
                $('#occ_id').val(id);
                /*  display deletemodal */
                $('#inactiveModal').modal('show');
            })
            /*
             When clicked on inactive button
             */
            table.on('click', '.inactive', function (e) {
                e.preventDefault();
                var nRow = $(this).parents('tr')[0];
                var aData = table.row(nRow).data();
                var jqTds = $('>td', nRow);
                var id = aData.id;
                console.log(id);
                /*  get row id to delete */
                $('#occ_id').val(id);
                /*  display deletemodal */
                $('#activeModal').modal('show');
            })
        });
    </script>

    /*  add and delete occasion */
    <script>
        //delete occasion
        function deleteData(){
            var id = $('#deleteid').val();
            /* delete row in database and datatable  */
            $.ajax({
                type: "get",
                url: '/admin/section/jobs/' + id + '/delete',
                success: function (result) {
                    if(result == ''){
                        console.log('row ' + result + ' deleted');
                        table.draw(false);
                        $('#messagecontent').html('{{ _t('Successfully deleted.', [], $_SESSION['lang']) }}');
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



        /* active and inactive product */
        function active_data(){
            var id = $('#occ_id').val();
            // console.log(id);
            $.ajax({
                type: "get",
                url: '/admin/section/jobs/' + id + '/activedata',
                success: function (result) {
                    console.log('row ' + result + ' actived');
                    table.draw(false);
                },
                error: function (result) {
                    console.log(result)
                }
            });
        }

        function inactive_data(){
            var id = $('#occ_id').val();
            console.log(id);
            // console.log(id);
            $.ajax({
                type: "get",
                url: '/admin/section/jobs/' + id + '/inactivedata',
                success: function (result) {
                    console.log('row ' + result + ' inactived');
                    table.draw(false);
                },
                error: function (result) {
                    console.log(result)
                }
            });
        }
    </script>

@stop
