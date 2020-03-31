@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
    {{ _t('Request Merchant', [], $_SESSION['lang']) }}
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
    <h1>{{ _t('Request Merchant', [], $_SESSION['lang']) }}</h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('dashboard') }}">
                <i class="livicon" data-name="home" data-size="14" data-color="#000"></i>
                {{ _t(config('Convert.dashboard')[0], [], $_SESSION['lang']) }}
            </a>
        </li>
        <li><a href="#"> {{ _t('Request Merchant', [], $_SESSION['lang']) }}</a></li>
        <li class="active">{{ _t('Request Merchant', [], $_SESSION['lang']) }}</li>
    </ol>
</section>

<!-- Main content -->
<section class="content paddingleft_right15">
    <div class="row">
        <div class="panel panel-primary ">
            <div class="panel-heading">
                <h4 class="panel-title"> <i class="livicon" data-name="user-flag" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                    {{ _t('Request Merchant', [], $_SESSION['lang']) }}
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
                                            : activate to sort column ascending" style="width: 30px;">{{ _t(config('Convert.id')[0], [], $_SESSION['lang']) }}
                        </th>
                        <th class="sorting_asc" tabindex="0" aria-controls="paidtable" rowspan="1"
                            colspan="1"  aria-label="
                                                   User photo
                                            : activate to sort column ascending" style="width: 100px;">{{ _t('Merchant Photo', [], $_SESSION['lang']) }}
                        </th>
                        <th class="sorting_asc" tabindex="0" aria-controls="paidtable" rowspan="1"
                            colspan="1"  aria-label="
                                                   First Name
                                            : activate to sort column ascending" style="width: 100px;">{{ _t(config('Convert.user_name')[0], [], $_SESSION['lang']) }}
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="paidtable" rowspan="1"
                            colspan="1" aria-label="
                                                User E-mail
                                            : activate to sort column ascending" style="width: 100px;">{{ _t(config('Convert.email')[0], [], $_SESSION['lang']) }}
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="paidtable" rowspan="1"
                            colspan="1" aria-label="
                                                User Gender
                                            : activate to sort column ascending" style="width: 100px;">{{ _t("Package Name", [], $_SESSION['lang']) }}
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="paidtable" rowspan="1"
                            colspan="1" aria-label="
                                                User verify
                                            : activate to sort column ascending" style="width: 100px;">{{ _t('Package Expired', [], $_SESSION['lang']) }}
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="paidtable" rowspan="1"
                            colspan="1" aria-label="
                                                User verify
                                            : activate to sort column ascending" style="width: 100px;">{{ _t('Package Price (USD)', [], $_SESSION['lang']) }}
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="paidtable" rowspan="1"
                            colspan="1" aria-label="
                                                User verify
                                            : activate to sort column ascending" style="width: 100px;">{{ _t('Verify Date', [], $_SESSION['lang']) }}
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
    $(function() {
        var nEditing = null;
        var table = $('#table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('request.data') !!}',
            columns: [
                { data: 'id', name: 'id' },
                { data: 'pic', name: 'pic', orderable: false, searchable: false},
                { data: 'realname', name: 'realname' , searchable: false},
                { data: 'email', name: 'email' },
                { data: 'plan_name', name: 'plan_name' },
                { data: 'expired', name: 'expired' },
                { data: 'price', name: 'price' , searchable: false},
                { data: 'verified_date', name: 'verified_date'},
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
