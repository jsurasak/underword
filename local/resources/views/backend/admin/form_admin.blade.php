@extends('backend.layouts.default')
@section('content')
		<div id="content" class="content">
			<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
				<li><a href="javascript:;">Home</a></li>
				<li class="active">Registration Lab</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">ลงทะเบียน lab</h1>
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
                            <h4 class="panel-title">From ลงทะเบียน lab</h4>
                        </div>

                        <div class="panel-body">

                            <div class="row">
                                <div class="col-sm-12 text-center"><h3>{{ ((isset($admin))?'Edit':'Add') }} Admin Form</h3></div>
                            </div>
                            <br>
                            <form method="post" action="{{ ((isset($admin))? action('AdminController@save'):action('AdminController@add'))  }}" enctype="multipart/form-data" id="myForm">
                            {{ csrf_field() }}

                            @if(isset($admin))
                                <input type="hidden" name="id" value="{{ $admin->id }}">
                            @endif

                            <div class="row">
                                <div class="col-sm-3 text-right">UserName :</div>
                                <div class="col-sm-9 text-left"><input type="text" class="form-control" name="user" value="{{ ((isset($admin))? $admin->username:'') }}"/></div>
                            </div>
							<br>
                            @if(!isset($admin))
							<div class="row">
								<div class="col-sm-3 text-right">Password :</div>
								<div class="col-sm-9 text-left"><input type="password" class="form-control" name="password" /></div>
                        	</div>
							<br>
                          @endif
                          <div class="row">
							<div class="col-sm-3 text-right">Name :</div>
							<div class="col-sm-9 text-left"><input type="text" class="form-control" name="name" value="{{ ((isset($admin))? $admin->name:'') }}" /></div>
                          </div>
                          <br>
						 <div class="row">
							<div class="col-sm-3 text-right">Email :</div>
							<div class="col-sm-9 text-left"><input type="text" class="form-control" name="email" value="{{ ((isset($admin))? $admin->email:'') }}"/></div>
                          </div>
                          <br>
                          <div class="row">
                            <div class="col-sm-3 text-right">Permissions User :</div>
                            <div class="col-sm-9 text-left">
                                <select class="form-control" name="level">
                                    <option value="0" @if(isset($admin)){{ (($admin->level == "0")?'selected':'') }}@endif>Webmaster</option>
                                    <option value="1" @if(isset($admin)){{ (($admin->level == "2")?'selected':'') }}@endif>Admin1</option>
                                    <option value="2" @if(isset($admin)){{ (($admin->level == "2")?'selected':'') }}@endif>Admin2</option>
                                    <option value="3" @if(isset($admin)){{ (($admin->level == "2")?'selected':'') }}@endif>Accoun</option>
                                </select>
                            </div>
                          </div>
							<br>

                          

							<div class="row">
								<div class="col-sm-12 text-center"><button class="btn btn-success" >Save</button>&nbsp&nbsp<a href="{{ action('AdminController@index') }}" class="btn btn-default">Back</a></div>
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


</script>
@endpush
