@extends('backend.layouts.default')
@section('content')
		<div id="content" class="content">
			<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
				<li><a href="javascript:;">Home</a></li>
				<li class="active">Change Password</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">Change Password</h1>
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
                            <h4 class="panel-title">Change Password</h4>
                        </div>

                        <div class="panel-body">

													<div class="row">
														<div class="col-sm-12 text-center"><h3>Change Password</h3></div>
													</div>
													<br>
													<form method="post" action="{{ action('AdminController@newpass') }}" enctype="multipart/form-data" id="myForm">
													{{ csrf_field() }}


													<input type="hidden" name="id" value="{{ $id }}">


													<div class="row">
														<div class="col-sm-4 text-right">New Password :</div>
														<div class="col-sm-4 text-left"><input type="password" class="form-control" id="n_password" name="n_password"/></div>
                        	</div>
													<br>
                          <div class="row">
														<div class="col-sm-4 text-right">Confirm Password :</div>
														<div class="col-sm-4 text-left"><input type="password" class="form-control" id="c_password" name="c_password"/></div>
                        	</div>
													<br>

													<div class="row">
															<div class="col-sm-12 text-center"><button type="button" class="btn btn-success" id="sendForm">Save</button>&nbsp&nbsp<a href="{{ action('AdminController@index') }}" class="btn btn-default">Back</a></div>
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

	$(function(){

	});

  $('#c_password').change(function(){

    var n_pass = $('#n_password').val();
    var c_pass = $('#c_password').val();

    if(n_pass == c_pass){

      $('#c_password').css('border','solid 1px #66ff66');
      $('#n_password').css('border','solid 1px #66ff66');

    }else{

      $('#c_password').css('border','solid 1px #ff4d4d');

    }

  });


	$('#sendForm').click(function() {

    var n_pass = $('#n_password').val();
    var c_pass = $('#c_password').val();

    if(n_pass == c_pass){

      $('#myForm').submit();

    }else{

      alert("confirm password ไม่ตรงกัน");

    }

	});



</script>
@endpush
