@extends('backend.layouts.default')
@section('content')
		<div id="content" class="content">
			<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
				<li><a href="javascript:;">Home</a></li>
				<li class="active">Admin</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">รายชื่อ Admin</h1>
			<!-- end page-header -->

			<!-- begin row -->
			<div class="row">
			    <!-- begin col-12 -->
			    <div class="col-md-12">
			        <!-- begin panel -->
                    <div class="panel panel-inverse">
                        <div class="panel-heading">
                            <div class="panel-heading-btn">
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                            </div>
                            <h4 class="panel-title">รายชื่อ Admin</h4>
                        </div>

                        <div class="panel-body">
                          <div class="row" style="padding: 0px 2px 0 0;">
            								<div class="col-md-6 text-left" >
            									<div class="pull-left w210">
            									</div>
            								</div>
            								<div class="col-md-6 text-right" >
            									<!-- <a href="#" class="btn btn-sm btn-success">Create User</a> -->
            								</div>
            							</div>
            							<br>
                          <table id="data-table" class="table table-striped table-bordered"></table>
                        </div>
                    </div>
                    <!-- end panel -->
                </div>
                <!-- end col-12 -->
            </div>
            <!-- end row -->
		</div>




@stop

@push('scripts')
<script>
$(function() {
  		oTable = $('#data-table').DataTable({

          processing: true,
          serverSide: true,
          ajax: {
    			url: '{{ action("HomeController@datatable") }}',
    			data: function ( d ) {},
                method: 'POST'
            },
          columns: [
            {title :'UserName',data:'username', className: 'text-center', defaultContent: '-'},
            {title :'Name',data:'name', className: 'text-center', defaultContent: '-'},
            {title :'Email',data:'email', className: 'text-center', defaultContent: '-'},
          ],
          rowCallback: function(nRow, aData, dataIndex){

      }
    });
});






</script>
@endpush
