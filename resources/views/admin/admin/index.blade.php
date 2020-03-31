@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
    Users
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
    <h1>Users</h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('dashboard') }}">
                <i class="livicon" data-name="home" data-size="14" data-color="#000"></i>
                Dashboard
            </a>
        </li>
        <li><a href="#"> Users</a></li>
        <li class="active">User List</li>
    </ol>
</section>

<!-- Main content -->
<section class="content paddingleft_right15">
    <div class="row">
        <div class="panel panel-primary ">
            <div class="panel-heading">
                <h4 class="panel-title"> <i class="livicon" data-name="user" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                    User List
                </h4>
            </div>
            <br />
            <div class="panel-body">
                <table class="table table-striped table-bordered table-hover dataTable no-footer sample_editable"
                       id="table" role="grid">
                    <thead>
                    <tr role="row">
                        <th class="sorting_asc"  tabindex="0" aria-controls="paidtable" rowspan="1" te
                            colspan="1"  aria-label="
                                                   ID
                                            : activate to sort column ascending" style="width: 30px;">ID
                        </th>
                        <th class="sorting_asc" tabindex="0" aria-controls="paidtable" rowspan="1"
                            colspan="1"  aria-label="
                                                   First Name
                                            : activate to sort column ascending" style="width: 100px;"> First Name
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="paidtable" rowspan="1"
                            colspan="1" aria-label="
                                                Last Name
                                            : activate to sort column ascending" style="width: 100px;">Last Name
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="paidtable" rowspan="1"
                            colspan="1" aria-label="
                                                User E-mail
                                            : activate to sort column ascending" style="width: 100px;">E-mail
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="paidtable" rowspan="1"
                            colspan="1" aria-label="
                                                User Gender
                                            : activate to sort column ascending" style="width: 100px;">Gender
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="paidtable" rowspan="1"
                            colspan="1" aria-label="
                                                User Postal Code
                                            : activate to sort column ascending" style="width: 100px;">Postal Code
                        </th>
                        <th class="sorting_asc" tabindex="0" aria-controls="paidtable" rowspan="1"
                            colspan="1"  aria-label="
                                                   Status
                                            : activate to sort column ascending" style="width: 100px;">Status
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="paidtable" rowspan="1"
                            colspan="1" aria-label="
                                                Created At
                                            : activate to sort column ascending" style="width: 80px;">Created Date
                        </th>
                        <th class="sorting_asc" tabindex="0" aria-controls="paidtable" rowspan="1"
                            colspan="1"  aria-label="
                                                   Actions
                                            : activate to sort column ascending" style="width:100px;">Actions
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
    $(function() {
        var nEditing = null;
        var table = $('#table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('users.data') !!}',
            columns: [
                { data: 'id', name: 'id' },
                { data: 'first_name', name: 'first_name' },
                { data: 'last_name', name: 'last_name' },
                { data: 'email', name: 'email' },
                { data: 'gender', name: 'gender' },
                { data: 'postal', name: 'postal' },
                { data: 'status', name: 'status'},
                { data: 'created_at', name:'created_at'},
                { data: 'actions', name: 'actions', orderable: false, searchable: false }
            ]
        });
        table.on( 'draw', function () {
            $('.livicon').each(function(){
                $(this).updateLivicon();
            });
        } );

    });

</script>

<div class="modal fade" id="delete_confirm" tabindex="-1" role="dialog" aria-labelledby="user_delete_confirm_title" aria-hidden="true">
	<div class="modal-dialog">
    	<div class="modal-content"></div>
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
