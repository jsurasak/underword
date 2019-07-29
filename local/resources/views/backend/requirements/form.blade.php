@extends('backend.layouts.default')
@section('content')
		<div id="content" class="content">
			<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
				<li><a href="javascript:;">Home</a></li>
				<li class="active">ข้อกำหนด การใช้งาน</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">จัดการ ข้อกำหนด การใช้งาน</h1>
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
                            <h4 class="panel-title">ข้อกำหนด การใช้งาน</h4>
                        </div>

                        <div class="panel-body">
                          <div class="row" style="padding: 0px 2px 0 0;">
                                <div class="col-sm-12 text-center" >
                                    <h4>ฟอร์มจัดการข้อมูลสมาชิก</h4>
                                </div>

                         </div>
                            <br>
                            <form id="myform" action="{{ action('RequirementsController@update') }}" class="form-horizontal" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <input type="hidden" id="id" name="id" value="{{ $data->id }}" >
                            <input type="hidden" id="type" name="type" value="{{ $data->type }}" >
                            <input type="hidden" id="oldpic" name="oldpic" value="{{ $data->img }}" >
                            
                            <div class="form-group">
                            <label class="control-label col-sm-3" >Heade</label>
                              <div class="col-sm-8">
                                <input type="text" class="form-control" name="header" readonly  value="{{ $data->head }}">
                              </div>
                            </div>

                            <div class="form-group">
                            <label class="control-label col-sm-3" >Url Link Header Picture</label>
                              <div class="col-sm-8">
                                <input type="text" class="form-control" name="url"  value="{{ $data->url }}">
                              </div>
                            </div>

                            @if($data->type == 1)
                            <div class="form-group">
                            <label class="control-label col-sm-3" >Header Picture</label>
                              <div class="col-sm-8">
                                <input type="file" class="form-control" name="picture" id="inputfileimg">
                              </div>
                            </div>
                            <div class="form-group">
                            <label class="control-label col-sm-3" ></label>
                              <div class="col-sm-8" id="preview">
                                  @if($data->img)
                                  <img src="{{ url('../') }}/{{ $data->img }}" width="100%" height="200px">
                                  @endif
                              </div>
                            </div>
                            @endif


                            <div class="form-group">
                            <label class="control-label col-sm-3" >Detail</label>
                              <div class="col-sm-8">
                                <textarea class="ckeditor" name="detail">{{ $data->detail }}</textarea>
                              </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-12 text-center">
                                  <button type="submit" class="btn btn-success" >Submit</button>
                                  <a href="{{ action('RequirementsController@index')}}" type="button" class="btn btn-default" >Back</a>
                                </div>
                              </div>
                            </form>

                        </div>
                    </div>
                    <!-- end panel -->
                </div>
                <!-- end col-12 -->
            </div>
		</div>




@stop

@push('scripts')

<script>

$(function(){

    function showThumbnail(files){

        $("#preview").html("");
        var num = 1;
        for(var i=0;i<files.length;i++){
            var file = files[i]
            var imageType = /image.*/
            if(!file.type.match(imageType)){

            continue;
            }

            var image = document.createElement("img");
            image.setAttribute("width", "100%");
            image.setAttribute("height", "200");
            image.setAttribute("title","("+num+"/"+files.length+")");
            var thumbnail = document.getElementById("preview");
            image.file = file;
            thumbnail.appendChild(image)

            var reader = new FileReader()
            reader.onload = (function(aImg){
                return function(e){
            aImg.src = e.target.result;
                };
            }(image))

            var ret = reader.readAsDataURL(file);
            var canvas = document.createElement("canvas");
            ctx = canvas.getContext("2d");
            image.onload= function(){
            ctx.drawImage(image,50,50)
            }
            num++;
       } // end for loop

    } // end showThumbnail

    $('#inputfileimg').on('change', function(e) {
        
    
        $('#preview').empty();

        var files = this.files
        var countFile = files.length;
        var b64img = [];

    
        showThumbnail(files);
        
        
        

    });


});

</script>


@endpush
