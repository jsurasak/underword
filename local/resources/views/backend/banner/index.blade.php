@extends('backend.layouts.default')
@section('content')
        
<div class="main-body">
    <div class="page-wrapper">

        <div class="page-header card">
            <div class="card-block">
                <h5 class="m-b-10">หน้าจัดการ Banner</h5>
                <ul class="breadcrumb-title b-t-default p-t-10">
                    <li class="breadcrumb-item">
                        <a href="{{ asset('') }}"> <i class="fa fa-home"></i> </a>
                    </li>
                    <li class="breadcrumb-item">Banner</a>
                    </li>
                </ul>
            </div>
        </div>

       

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
                                    @foreach($data as $d) 
                                        <div class="col-xs-12">
                                            <div class="card">
                                                <div class="card-header">
                                                    <p>อัพโหลดรูปภาพสินค่า (ขนาดแนะนำ 960 x 960)</p>
                                                    <p>TH</p>
                                                </div>
                                                <div class="card-block text-center" >
                                                    <div class="col-xs-12" style="margin-bottom:1rem">      
                                                    @if($d->name_th != "")
                                                    <img src="{{ url('../') }}/{{ $d->name_th }}" width="100%" height="200px">
                                                    @else
                                                    <img src="{{ url('../') }}/image/default.jpg" width="100%" height="200px">
                                                    @endif
                                                </div>
                                                <button onclick="upload( {{ $d->id }},'th');" class="btn btn-success btn-sm btn-round">Upload</button>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="tab-pane " id="en" role="tabpanel" >

                                    @foreach($data as $d) 

                                    <div class="col-xs-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <p>อัพโหลดรูปภาพสินค่า (ขนาดแนะนำ 960 x 960)</p>
                                                <p>EN</p>
                                            </div>
                                            <div class="card-block text-center" >
                                                <div class="col-xs-12" style="margin-bottom:1rem">      
                                                @if($d->name_en != "")
                                                <img src="{{ url('../') }}/{{ $d->name_en }}" width="100%" height="200px">
                                                @else
                                                <img src="{{ url('../') }}/image/default.jpg" width="100%" height="200px">
                                                @endif
                                            </div>
                                            <button onclick="upload( {{ $d->id }},'en');" class="btn btn-success btn-sm btn-round">Upload</button>
                                            </div>
                                        </div>
                                    </div>

                                    @endforeach

                                </div>
                                <div class="tab-pane " id="cn" role="tabpanel" >

                                    @foreach($data as $d) 

                                    <div class="col-xs-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <p>อัพโหลดรูปภาพสินค่า (ขนาดแนะนำ 960 x 960)</p>
                                                <p>CN</p>
                                            </div>
                                            <div class="card-block text-center" >
                                                <div class="col-xs-12" style="margin-bottom:1rem">      
                                                @if($d->name_cn != "")
                                                <img src="{{ url('../') }}/{{ $d->name_cn }}" width="100%" height="200px">
                                                @else
                                                <img src="{{ url('../') }}/image/default.jpg" width="100%" height="200px">
                                                @endif
                                            </div>
                                            <button  onclick="upload( {{ $d->id }},'cn');" class="btn btn-success btn-sm btn-round">Upload</button>
                                            </div>
                                        </div>
                                    </div>

                                    @endforeach

                                </div>
                            </div>

                            </div>
                </div>


    </div>        
</div>


<div id="modalupload" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Uploade Picture</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
    <form action="{{ action('BannerController@save') }}" method="POST" enctype="multipart/form-data">
      {{ csrf_field() }}
      <div class="modal-body">
        <input type="hidden" id="id" name="id">
        <input type="hidden" id="type" name="type">
        <div class="col-xs-12" style="margin-bottom:1rem">
            <img id="preview" src="{{ url('../') }}/image/default.jpg" width="100%">    
        </div>
        <input type="file" name="picture" id="picture">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success">Save</button>
      </div>
    </form>
    </div>

  </div>
</div>

@stop

@push('scripts')
<script>


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