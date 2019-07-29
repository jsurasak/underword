@extends('backend.layouts.default')
@section('content')
<div id="content" class="content">
	<!-- begin breadcrumb -->
	<ol class="breadcrumb pull-right">
		<li><a href="javascript:;">Home</a></li>
		<li class="active"></li>
	</ol>
	<!-- end breadcrumb -->
	<!-- begin page-header -->
	<h1 class="page-header"></h1>
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
                        <h4 class="panel-title">Form Event</h4>
                    </div>

                    <div class="panel-body">
                      <div class="row">
                        <h4 class="text-center"></h4><br>
                        <div class="col-sm-offset-1 col-sm-11 text-left">
                          <form class="form-horizontal" method="post" id="myForm" action="{{ ((isset($data)?action('EventController@edit'):action('EventController@add'))) }}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                                <input type="hidden" name="id" value="{{ ((isset($data)?$data->id:'')) }}">
                                <div class="form-group">
                                    <label class="control-label col-sm-2" >วันที่ลง :</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="date" id="date" value="{{ ((isset($data)?$data->time_show:'')) }}">
                                    </div>
                                </div>

							  <div class="form-group" >
                                <label class="control-label col-sm-2" >รูปปก</label>
                                <div class="col-sm-10">
                                  <input type="file" class="form-control" name="picture" id="picture">
                                </div>
                              </div>

                              @if(isset($data))
                                <div class="form-group" >
                                    <label class="control-label col-sm-2" ></label>
                                    <div class="col-sm-10">
                                        <img id="pic_show" src="{{ url('../') }}/{{ $data->picture }}" width="100%">
                                    </div>
                                </div>
                                @else
                                <div class="form-group" >
                                    <label class="control-label col-sm-2" ></label>
                                    <div class="col-sm-10">
                                        <img id="pic_show" width="100%">
                                    </div>
                                </div>
                                @endif

                              <div class="form-group">
                                    <label class="control-label col-sm-2" >หัวข้อ</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="heade" id="heade" value="{{ ((isset($data)?$data->heade:'')) }}">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-2" >คำโปรย</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="title" id="title" value="{{ ((isset($data)?$data->title:'')) }}">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-2" >รายละเอียด</label>
                                    <div class="col-sm-10">
                                        <textarea class="ckeditor" name="detail" id="detail" >{{ ((isset($data)?$data->detail:'')) }}</textarea>
                                    </div>
                                </div>
							
							  
                              <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                  <button type="submit" class="btn btn-success" id="submitForm">Submit</button>
                                </div>
                              </div>
                            </form>
                        </div>
                      </div>

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
    $('#date').datetimepicker({ format:'YYYY-MM-DD HH:mm:ss' });
});


$("#picture").change(function(){

		if (this.files && this.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#pic_show').attr('src', e.target.result);
        }

        reader.readAsDataURL(this.files[0]);
    }

});


</script>
@endpush
