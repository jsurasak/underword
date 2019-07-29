@extends('backend.layouts.default')
@section('content')
        
<div class="main-body">
    <div class="page-wrapper">

        <div class="page-header card">
            <div class="card-block">
                <h5 class="m-b-10">หน้าจัดการ ข่าวสาร</h5>
                <ul class="breadcrumb-title b-t-default p-t-10">
                    <li class="breadcrumb-item">
                        <a href="{{ asset('') }}"> <i class="fa fa-home"></i> </a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ action('NewController@index') }}">News</a>
                    </li>
                    <li class="breadcrumb-item">Form</a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h5>News</h5>
                <span>Form {{  ((isset($data))?'Edit':'New') }}</span>
                <div class="card-header-right">
                    <ul class="list-unstyled card-option">
                        <li><i class="fa fa-chevron-left"></i></li>
                        <li><i class="fa fa-window-maximize full-card"></i></li>
                        <li><i class="fa fa-minus minimize-card"></i></li>
                        <li><i class="fa fa-refresh reload-card"></i></li>
                        <li><i class="fa fa-times close-card"></i></li>
                    </ul>
                </div>
            </div>
            <div class="card-block">
                <form id="myForm" method="post" action="{{ ((isset($data) )? action('NewController@save') : action('NewController@add') ) }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="row">
                    @if(isset($data))
                        <input type="hidden" name="id" value="{{ $data->id }}">
                    @endif

                    <div class="card tabs-card" style="width:100%">
                            <div class="card-block p-0">
                                    <!-- Nav tabs -->
                            <ul class="nav nav-tabs md-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#th" role="tab" aria-expanded="false">ภาษาไทย</a>
                                    <div class="slide"></div>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#en" role="tab" aria-expanded="false">ภาษาอังกฤษ</a>
                                    <div class="slide"></div>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#cn" role="tab" aria-expanded="true">ภาษาจีน</a>
                                    <div class="slide"></div>
                                </li>

                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content card-block">
                                <div class="tab-pane active" id="th" role="tabpanel" >
                                    <div class="form-group col-xs-12">
                                        <label class="col-xs-12">หัวข้อภาษาไทย</label>
                                        <div class="col-sm-12" style="padding:0">
                                            <input type="text" class="form-control" id="header_th" name="header_th" value="{{ ((isset($data))?$data->header_th:'') }}">
                                        </div>
                                        <label class="col-xs-12" style="margin-top:1rem">รายละเอียด</label>
                                        <div class="col-sm-12" style="padding:0">
                                            <textarea class="summernote" name="detail_th">{{  ((isset($data))?$data->detail_th:'') }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane " id="en" role="tabpanel" >
                                    <div class="form-group col-xs-12">
                                        <label class="col-xs-12">หัวข้อภาษาอังกฤษ</label>
                                        <div class="col-sm-12" style="padding:0">
                                            <input type="text" class="form-control" id="header_en" name="header_en" value="{{ ((isset($data))?$data->header_en:'') }}">
                                        </div>
                                        <label class="col-xs-12" style="margin-top:1rem">รายละเอียด</label>
                                        <div class="col-sm-12" style="padding:0">
                                            <textarea class="summernote" name="detail_en">{{  ((isset($data))?$data->detail_en:'') }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane " id="cn" role="tabpanel" >
                                    <div class="form-group col-xs-12">
                                        <label class="col-xs-12">หัวข้อภาษาจีน</label>
                                        <div class="col-sm-12" style="padding:0">
                                            <input type="text" class="form-control" id="header_cn" name="header_cn" value="{{ ((isset($data))?$data->header_cn:'') }}">
                                        </div>
                                        <label class="col-xs-12" style="margin-top:1rem">รายละเอียด</label>
                                        <div class="col-sm-12" style="padding:0">
                                            <textarea class="summernote" name="detail_cn">{{  ((isset($data))?$data->detail_cn:'') }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div>
                    </div>      
                    <div class="form-group col-xs-12 col-lg-12">
                        <label class="col-xs-12">รูปภาพปก</label>
                        <div class="col-sm-12" style="padding:0">
                            <input type="file" class="form-control" id="picture" name="picture">
                            @if(isset($data))
                            <input type="hidden" name="oldpicture" value="{{ $data->picture }}">
                            @endif
                        </div>
                    </div>
                    <div class="form-group col-xs-12 col-lg-4">
                        @if(isset($data))
                        <img id="preview" src="{{ url('../') }}/{{ $data->picture }}" width="100%" height="200px">
                        @else
                        <img id="preview" src="{{ url('../') }}/image/default.jpg" width="100%" height="200px">
                        @endif
                    </div>
                    
                    <div class="form-group col-xs-12 col-lg-12 text-right">
                    <button type="button" class="btn btn-default" style="margin-right:1rem">Back</button>
                    <button type="button" class="btn-submit btn btn-primary">Save</button>
                    </div>
                </form>
                </div>
            </div>
        </div>



    </div>        
</div>

@stop
@push('scripts')
<script>

    $(function(){


        $('.btn-submit').click(function(){

            $('#myForm').submit();  
        
        });

    });

    function upload(id,type){

        $('#modalupload').modal();
        $('#id').val(id);
        $('#type').val(type);

    }

    function readURL(input) {

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
        $('#preview').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
    }

    $("#picture").change(function() {
    readURL(this);
    });




</script>
@endpush