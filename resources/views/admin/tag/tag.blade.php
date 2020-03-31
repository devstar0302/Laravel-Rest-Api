@extends('admin.layouts.default')

{{-- Page title --}}
@section('title')
    {{ _t(config('Convert.tags')[0], [], $_SESSION['lang']) }}
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

    <link href="{{ asset('assets/vendors/bootstrap3-wysihtml5-bower/css/bootstrap3-wysihtml5.min.css') }}"  rel="stylesheet" media="screen"/>
    <link href="{{ asset('assets/css/pages/editor.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/vendors/jasny-bootstrap/css/jasny-bootstrap.css') }}" rel="stylesheet" />

    <link href="/vendors/daterangepicker/css/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
    <link href="/vendors/datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css" />
    <link href="/vendors/clockface/clockface.css" rel="stylesheet" type="text/css"/>
    <link href="/vendors/jasny-bootstrap/jasny-bootstrap.min.css" rel="stylesheet" type="text/css" />
@stop

{{-- Page content --}}
@section('content')

    <section class="content-header">
        <h1>{{ _t(config('Convert.tags')[0], [], $_SESSION['lang']) }}</h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{ route('dashboard') }}">
                    <i class="livicon" data-name="home" data-size="14" data-loop="true"></i>
                    {{ _t(config('Convert.dashboard')[0], [], $_SESSION['lang']) }}
                </a>
            </li>
            <li class="active">{{ _t(config('Convert.tags')[0], [], $_SESSION['lang']) }}</li>
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
                                     <i class="livicon" data-name="tags" data-size="15" data-c="#fff" data-hc="#fff"
                                        data-loop="true"></i>
                                        {{ _t(config('Convert.tags')[0], [], $_SESSION['lang']) }}</span>
                        </h3>
                    </div>

                    <div class="panel-body">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}"/>

                        <table class="table table-striped table-bordered table-hover dataTable no-footer sample_editable"
                               id="tagtable" role="grid">
                            <thead>
                            <tr role="row">
                                <th class="sorting_asc" tabindex="0" aria-controls="occasiontable" rowspan="1"
                                    colspan="1" aria-label="
                                                ID
                                            : activate to sort column ascending" style="width: 30px;">{{ _t(config('Convert.id')[0], [], $_SESSION['lang']) }}
                                </th>
                                <th class="sorting_asc" tabindex="0" aria-controls="occasiontable" rowspan="1"
                                    colspan="1" aria-label="
                                                Name
                                            : activate to sort column ascending" style="width: 100px;">{{ _t(config('Convert.tag_name')[0], [], $_SESSION['lang']) }}
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="occasiontable" rowspan="1"
                                    colspan="1" aria-label="
                                                Photo
                                            : activate to sort column ascending" style="width: 50px;">{{ _t('Photo', [], $_SESSION['lang']) }}
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="occasiontable" rowspan="1"
                                    colspan="1" aria-label="
                                                Created Date
                                            : activate to sort column ascending" style="width: 150px;">{{ _t(config('Convert.create_date')[0], [], $_SESSION['lang']) }}
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="occasiontable" rowspan="1"
                                    colspan="1" aria-label="
                                                status
                                            : activate to sort column ascending" style="width: 50px;">{{ _t(config('Convert.status')[0], [], $_SESSION['lang']) }}
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="occasiontable" rowspan="1"
                                    colspan="1" aria-label="
                                                Edit
                                            : activate to sort column ascending" style="width: 50px;">{{ _t(config('Convert.edit')[0], [], $_SESSION['lang']) }}
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="occasiontable" rowspan="1"
                                    colspan="1" aria-label="
                                                Delete
                                            : activate to sort column ascending" style="width: 50px;">{{ _t(config('Convert.delete')[0], [], $_SESSION['lang']) }}
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

    <!-- add modal -->
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <form role="form" action="{{ route('admin.tag.add') }}" id="AddCategoryForm" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                <div class="modal-content" style="width: 80%">
                    <div class="modal-header" style="font-size: 150%">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">{{ _t(config('Convert.add_tag')[0], [], $_SESSION['lang']) }} </h4>
                    </div>
                    <div class="modal-body" style="font-size: 120%">
                        <table style="width:50%" class="table form-body" border="0">
                            <tr style="border:0">
                                <th style="border:0">{{ _t('Category name', [], $_SESSION['lang']) }}:</th>
                                <td style="border:0">
                                    <input type="text" name="name" class="form-control" id="name"  value="" placeholder="{{ _t('Category name', [], $_SESSION['lang']) }}">
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div style="padding: 0px 15px;">
                        <label class="control-label" style="font-size: 120%" for="name">Image</label>
                        <div>
                            <div>
                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                    <div class="fileinput-new thumbnail" style="width: 450px; min-height: 200px;">
                                        <img data-src="holder.js/100%x100%"></div>
                                    <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 450px; min-height: 200px;"></div>
                                    <div style="margin-top:10px">
                                        <span class="btn btn-default btn-file">
                                            <span class="fileinput-new">{{ config('Convert.select_image')[0] }}</span>
                                            <span class="fileinput-exists">{{ config('Convert.change')[0] }}</span>
                                            <input type="file" id="photo" name="photo">
                                        </span>
                                        <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">{{ config('Convert.remove')[0] }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" class="form-control" data-dismiss="modal" onclick="addCategory()">{{ _t('Add', [], $_SESSION['lang']) }}</button>
                        <button type="button" class="btn btn-default" class="form-control" data-dismiss="modal">{{ _t('Cancel', [], $_SESSION['lang']) }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- edit modal -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <form role="form" action="{{ route('admin.tag.edit') }}" id="EditCategoryForm" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                <input type="hidden" name="id" id="edit_id" value=""/>
                <div class="modal-content" style="width: 80%">
                    <div class="modal-header" style="font-size: 150%">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Edit Category</h4>
                    </div>
                    <div class="modal-body" style="font-size: 120%">
                        <table style="width:50%" class="table form-body" border="0">
                            <tr style="border:0">
                                <th style="border:0">Category Name:</th>
                                <td style="border:0">
                                    <input type="text" name="name" class="form-control" id="edit_name"  value="" placeholder="Category Name">
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div style="padding: 0px 15px;">
                        <label class="control-label" style="font-size: 120%" for="name">Image</label>
                        <div>
                            <div>
                                <div class="fileinput fileinput-exists" data-provides="fileinput">
                                    <div class="fileinput-new thumbnail" style="display:none;width: 450px; min-height: 200px;">
                                        <img data-src="holder.js/100%x100%"></div>
                                    <div class="fileinput-preview thumbnail" style="min-width: 450px;max-width: 450px; min-height: 200px; line-height: 210px;">
                                        <img id="edit_photo" src="" alt="No Image" style="max-width: 450px; min-height: 200px;">
                                    </div>
                                    <div>
                                        <span class="btn btn-default btn-file">
                                            <span class="fileinput-new">{{ config('Convert.select_image')[0] }}</span>
                                            <span class="fileinput-exists">{{ config('Convert.change')[0] }}</span>
                                            <input type="hidden" value="" name=""><input type="file" name="photo">
                                        </span>
                                        <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">{{ config('Convert.remove')[0] }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" class="form-control" data-dismiss="modal" onclick="updateCategory()">Update</button>
                        <button type="button" class="btn btn-default" class="form-control" data-dismiss="modal">{{ _t('Cancel', [], $_SESSION['lang']) }}</button>
                    </div>
                </div>
            </form>
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
                    {{ _t(config('Convert.tag_delete_message')[0], [], $_SESSION['lang']) }}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" class="form-control" data-dismiss="modal" onclick="deleteTag()">{{ _t(config('Convert.delete')[0], [], $_SESSION['lang']) }}</button>
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
                    {{ _t(config('Convert.tag_inpute_message')[0], [], $_SESSION['lang']) }}
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
                <div class="modal-body" style="font-size: 150%">
                    {{ _t(config('Convert.notice')[0], [], $_SESSION['lang']) }}
                </div>
                <input type="hidden" id="occ_id" value="0">
                {{--<input type="hidden" id="activeid" value="0">--}}
                <div class="modal-body" id="statecontent">
                    {{ _t(config('Convert.tag_active_message')[0], [], $_SESSION['lang']) }}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" class="form-control" data-dismiss="modal" onclick="inactive_tag()">{{ _t(config('Convert.ok')[0], [], $_SESSION['lang']) }}</button>
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
                    {{ _t(config('Convert.tag_inactive_message')[0], [], $_SESSION['lang']) }}
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" class="form-control" data-dismiss="modal" onclick="active_tag()">{{ _t(config('Convert.ok')[0], [], $_SESSION['lang']) }}</button>
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

    <script src="{{asset('assets/vendors/tinymce/tinymce.min.js')}}" type="text/javascript"></script>
    <script  src="{{ asset('assets/vendors/ckeditor/js/ckeditor.js') }}"  type="text/javascript"></script>
    <script  src="{{ asset('assets/vendors/ckeditor/js/jquery.js') }}"  type="text/javascript" ></script>
    <script  src="{{ asset('assets/vendors/ckeditor/js/config.js') }}"  type="text/javascript"></script>
    <script  src="{{ asset('assets/js/pages/editor.js') }}"  type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/jasny-bootstrap/js/jasny-bootstrap.js') }}" ></script>
    <script src="/vendors/daterangepicker/moment.min.js" type="text/javascript"></script>
    <script src="/vendors/daterangepicker/daterangepicker.js" type="text/javascript"></script>
    <script src="/vendors/datetimepicker/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
    <script src="/vendors/clockface/clockface.js" type="text/javascript"></script>
    <script src="/vendors/jasny-bootstrap/jasny-bootstrap.min.js" type="text/javascript"></script>

    <script>


        /* display table by using Datatable method  */
        var table = null;
        $(function () {
            var nEditing = null;
            table = $('#tagtable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route("admin.tag.data") !!}',
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'name', name: 'name'},
                    {data: 'image', name: 'image', orderable: false, searchable: false},
                    {data: 'created_at', name: 'created_date', searchable: false},
                    {data: 'status', name: 'status', orderable: false, searchable: false},
                    {data: 'edit', name: 'edit', orderable: false, searchable: false},
                    {data: 'delete', name: 'delete', orderable: false, searchable: false}
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
            /*  in Javascript add HTML(button): append('-')  */
            $('#tagtable_length').append('<button type="button" style="margin-left: 20px; border:1px solid #ccc; background-color: #6c7def; color: white" class="form-control button-sm" data-toggle="modal" data-target="#addModal">{{ _t(config('Convert.add')[0], [], $_SESSION['lang']) }}</button >');

            /*  Edit functionality  */
            var row_id, name, description, created_date;

            function editRow(table, nRow) {
                var aData = table.row(nRow).data();
                var jqTds = $('>td', nRow);
                row_id = aData.id ? aData.id : '';
                name = aData.name ? aData.name : '';
                description = aData.description ? aData.description : '';

                jqTds[0].innerHTML = row_id;
                jqTds[1].innerHTML = '<input type="text" name="name" id="name" style="width:100% !important;" class="form-control input-small" value="' + name + '">';
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
                    url: '/admin/tag/' + row_id + '/update',
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
        function deleteTag(){
            var id = $('#deleteid').val();
            /* delete row in database and datatable  */
            $.ajax({
                type: "get",
                url: '/admin/tag/' + id + '/delete',
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

        /*   add occasion */
        function addTag () {
            /* get occasion name to add from modal  */
            var name = $("#name").val();
            /* get occasion description to add from modal  */
            /* if dont input  name to add in the modal, display messaggeModal and retry to input name  */
            if (name == "") {
                /*  make  modal- " Please input occasion name."  */
                $('#messagecontent').html('{{ _t('Please input tag name.', [], $_SESSION['lang']) }}');
                /*  display  modal- " Please input occasion name."  */
                $('#messageModal').modal('show');
                return;
            }

            /*  generate data from input value */
            var data = {
                name: name,
                _token:$('meta[name=_token]').attr('content')
            };
            /*  save generated data in database and display  */
            $.ajax({
                type: "post",
                url: '/admin/tag/addtag',
                data: data,
                success: function (result) {
                    table.draw(false);
                },
                error: function (result) {
                    console.log(result)
                }
            });
        }

        /*   add occasion */
        function addCategory () {

            var name = $("#name").val();
            if (name == "") {
                $('#messagecontent').html('{{ _t("Please input category name.", [], $_SESSION['lang']) }}');
                $('#messageModal').modal('show');
                return;
            }
            var photo = $("#photo").val();
            if (photo == "") {
                $('#messagecontent').html('{{ _t("Please select image.", [], $_SESSION['lang']) }}');
                $('#messageModal').modal('show');
                return;
            }
            $("#AddCategoryForm").submit();
        }

        function editCategory(id,name, img_url){
            $("#editModal").modal();
            $("#edit_id").val(id);
            $("#edit_name").val(name);

            if(img_url != ""){
                var edit_img = document.getElementById("edit_photo");
                edit_img.src = '/uploads/category/'+img_url;
            }else{
                var edit_img = document.getElementById("edit_photo");
                edit_img.src = '/uploads/category/noimage.jpg';
            }

        }
        /*   update occasion */
        function updateCategory () {

            var name = $("#edit_name").val();
            if (name == "") {
                $('#messagecontent').html('{{ _t("Please input category name.", [], $_SESSION['lang']) }}');
                $('#messageModal').modal('show');
                return;
            }
            var photo = $("#edit_photo").val();
            if (photo == "") {
                $('#messagecontent').html('{{ _t("Please select image.", [], $_SESSION['lang']) }}');
                $('#messageModal').modal('show');
                return;
            }
            $("#EditCategoryForm").submit();
        }
        /* active and inactive product */
        function active_tag(){
            var id = $('#occ_id').val();
            // console.log(id);
            $.ajax({
                type: "get",
                url: '/admin/tag/' + id + '/activetag',
                success: function (result) {
                    console.log('row ' + result + ' actived');
                    table.draw(false);
                },
                error: function (result) {
                    console.log(result)
                }
            });
        }

        function inactive_tag(){
            var id = $('#occ_id').val();
            console.log(id);
            // console.log(id);
            $.ajax({
                type: "get",
                url: '/admin/tag/' + id + '/inactivetag',
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
