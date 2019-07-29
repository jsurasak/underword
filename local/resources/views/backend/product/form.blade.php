@extends('backend.layouts.default')
@section('content')      
<div class="main-body">
    <div class="page-wrapper">

        <div class="page-header card">
            <div class="card-block">
                <h5 class="m-b-10">หน้าจัดการ สินค้า</h5>
                <ul class="breadcrumb-title b-t-default p-t-10">
                    <li class="breadcrumb-item">
                        <a href="{{ asset('') }}"> <i class="fa fa-home"></i> </a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ action('NewController@index') }}">Products</a>
                    </li>
                    <li class="breadcrumb-item">Form</a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h5>Products</h5>
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
                <form id="myForm" method="post" action="{{ ((isset($data) )? action('ProductsController@save') : action('ProductsController@add') ) }}" enctype="multipart/form-data">
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

                                    <div class="form-group col-xs-12 col-lg-12">
                                        <label class="col-xs-12">หัวข้อภาษาไทย</label>
                                        <div class="col-sm-12" style="padding:0">
                                            <input type="text" class="form-control" id="name_th" name="name_th" value="{{ ((isset($data))?$data->name_th:'') }}">
                                        </div>
                                        <label class="col-xs-12">สีภาษาไทย</label>
                                        <div class="col-sm-12" style="padding:0">
                                            <input type="text" class="form-control" id="color_th" name="color_th" value="{{ ((isset($data))?$data->color_th:'') }}">
                                        </div>
                                        <label class="col-xs-12">ขนาดภาษาไทย</label>
                                        <div class="col-sm-12" style="padding:0">
                                            <input type="text" class="form-control" id="size_th" name="size_th" value="{{ ((isset($data))?$data->size_th:'') }}">
                                        </div>
                                        <label class="col-xs-12">ประเภทบรรจุภาษาไทย</label>
                                        <div class="col-sm-12" style="padding:0">
                                            <input type="text" class="form-control" id="type_package_th" name="type_package_th" value="{{ ((isset($data))?$data->type_package_th:'') }}">
                                        </div>
                                        <label class="col-xs-12">ส่วนประกอบภาษาไทย</label>
                                        <div class="col-sm-12" style="padding:0">
                                            <input type="text" class="form-control" id="ingredient_th" name="ingredient_th" value="{{ ((isset($data))?$data->ingredient_th:'') }}">
                                        </div>
                                        <label class="col-xs-12">รายละเอียดทั้งหมด/จุดเด่น/ของสินค้า ภาษาไทย</label>
                                        <div class="col-sm-12" style="padding:0">
                                            <input type="text" class="form-control" id="featured_th" name="featured_th" value="{{ ((isset($data))?$data->featured_th:'') }}">
                                        </div>
                                        <label class="col-xs-12">วิธีใช้/ขั้นตอนการปรุง/วิธีรับประทาน ภาษาไทย</label>
                                        <div class="col-sm-12" style="padding:0">
                                            <input type="text" class="form-control" id="howtouser_th" name="howtouser_th" value="{{ ((isset($data))?$data->howtouser_th:'') }}">
                                        </div>
                                        <label class="col-xs-12">ข้อควรระวัง/การเก็บรักษา ภาษาไทย</label>
                                        <div class="col-sm-12" style="padding:0">
                                            <input type="text" class="form-control" id="warning_th" name="warning_th" value="{{ ((isset($data))?$data->warning_th:'') }}">
                                        </div>
                                        <label class="col-xs-12" style="margin-top:1rem">รายละเอียด</label>
                                        <div class="col-sm-12" style="padding:0">
                                            <textarea class="summernote" name="detail_th">{{  ((isset($data))?$data->detail_th:'') }}</textarea>
                                        </div>
                                        <label class="col-xs-12">ราคาขายภาษาไทย</label>
                                        <div class="col-sm-12" style="padding:0">
                                            <input type="text" class="form-control" id="price_th" name="price_th" value="{{ ((isset($data))?$data->price_th:'') }}">
                                        </div>
                                        <label class="col-xs-12">ต้นทุนภาษาไทย</label>
                                        <div class="col-sm-12" style="padding:0">
                                            <input type="text" class="form-control" id="cost_th" name="cost_th" value="{{ ((isset($data))?$data->cost_th:'') }}">
                                        </div>
                                    </div>

                                </div> 
                                <div class="tab-pane" id="en" role="tabpanel" > 
                                    
                                    <div class="form-group col-xs-12 col-lg-12">
                                        <label class="col-xs-12">หัวข้อภาษาอังกฤษ</label>
                                        <div class="col-sm-12" style="padding:0">
                                            <input type="text" class="form-control" id="name_en" name="name_en" value="{{ ((isset($data))?$data->name_en:'') }}">
                                        </div>
                                        <label class="col-xs-12">สีภาษาอังกฤษ</label>
                                        <div class="col-sm-12" style="padding:0">
                                            <input type="text" class="form-control" id="color_en" name="color_en" value="{{ ((isset($data))?$data->color_en:'') }}">
                                        </div>
                                        <label class="col-xs-12">ขนาดภาษาอังกฤษ</label>
                                        <div class="col-sm-12" style="padding:0">
                                            <input type="text" class="form-control" id="size_en" name="size_en" value="{{ ((isset($data))?$data->size_en:'') }}">
                                        </div>
                                        <label class="col-xs-12">ประเภทบรรจุภาษาอังกฤษ</label>
                                        <div class="col-sm-12" style="padding:0">
                                            <input type="text" class="form-control" id="type_package_en" name="type_package_en" value="{{ ((isset($data))?$data->type_package_en:'') }}">
                                        </div>
                                        <label class="col-xs-12">ส่วนประกอบภาษาอังกฤษ</label>
                                        <div class="col-sm-12" style="padding:0">
                                            <input type="text" class="form-control" id="ingredient_en" name="ingredient_en" value="{{ ((isset($data))?$data->ingredient_en:'') }}">
                                        </div>
                                        <label class="col-xs-12">รายละเอียดทั้งหมด/จุดเด่น/ของสินค้า ภาษาอังกฤษ</label>
                                        <div class="col-sm-12" style="padding:0">
                                            <input type="text" class="form-control" id="featured_en" name="featured_en" value="{{ ((isset($data))?$data->featured_en:'') }}">
                                        </div>
                                        <label class="col-xs-12">วิธีใช้/ขั้นตอนการปรุง/วิธีรับประทาน ภาษาอังกฤษ</label>
                                        <div class="col-sm-12" style="padding:0">
                                            <input type="text" class="form-control" id="howtouser_en" name="howtouser_en" value="{{ ((isset($data))?$data->howtouser_en:'') }}">
                                        </div>
                                        <label class="col-xs-12">ข้อควรระวัง/การเก็บรักษา ภาษาอังกฤษ</label>
                                        <div class="col-sm-12" style="padding:0">
                                            <input type="text" class="form-control" id="warning_th" name="warning_en" value="{{ ((isset($data))?$data->warning_en:'') }}">
                                        </div>
                                        <label class="col-xs-12" style="margin-top:1rem">รายละเอียด</label>
                                        <div class="col-sm-12" style="padding:0">
                                            <textarea class="summernote" name="detail_en">{{  ((isset($data))?$data->detail_en:'') }}</textarea>
                                        </div>
                                        <label class="col-xs-12">ราคาขายภาษาอังกฤษ</label>
                                        <div class="col-sm-12" style="padding:0">
                                            <input type="text" class="form-control" id="price_en" name="price_en" value="{{ ((isset($data))?$data->price_en:'') }}">
                                        </div>
                                        <label class="col-xs-12">ต้นทุนภาษาอังกฤษ</label>
                                        <div class="col-sm-12" style="padding:0">
                                            <input type="text" class="form-control" id="cost_en" name="cost_en" value="{{ ((isset($data))?$data->cost_en:'') }}">
                                        </div>
                                    </div>
                                
                                </div>
                                <div class="tab-pane" id="cn" role="tabpanel" >   

                                    <div class="form-group col-xs-12 col-lg-12">
                                        <label class="col-xs-12">หัวข้อภาษาจีน</label>
                                        <div class="col-sm-12" style="padding:0">
                                            <input type="text" class="form-control" id="name_cn" name="name_cn" value="{{ ((isset($data))?$data->name_cn:'') }}">
                                        </div>
                                        <label class="col-xs-12">สีภาษาจีน</label>
                                        <div class="col-sm-12" style="padding:0">
                                            <input type="text" class="form-control" id="color_cn" name="color_cn" value="{{ ((isset($data))?$data->color_cn:'') }}">
                                        </div>
                                        <label class="col-xs-12">ขนาดภาษาจีน</label>
                                        <div class="col-sm-12" style="padding:0">
                                            <input type="text" class="form-control" id="size_cn" name="size_cn" value="{{ ((isset($data))?$data->size_cn:'') }}">
                                        </div>
                                        <label class="col-xs-12">ประเภทบรรจุภาษาจีน</label>
                                        <div class="col-sm-12" style="padding:0">
                                            <input type="text" class="form-control" id="type_package_cn" name="type_package_cn" value="{{ ((isset($data))?$data->type_package_cn:'') }}">
                                        </div>
                                        <label class="col-xs-12">ส่วนประกอบภาษาจีน</label>
                                        <div class="col-sm-12" style="padding:0">
                                            <input type="text" class="form-control" id="ingredient_cn" name="ingredient_cn" value="{{ ((isset($data))?$data->ingredient_cn:'') }}">
                                        </div>
                                        <label class="col-xs-12">รายละเอียดทั้งหมด/จุดเด่น/ของสินค้า ภาษาจีน</label>
                                        <div class="col-sm-12" style="padding:0">
                                            <input type="text" class="form-control" id="featured_cn" name="featured_cn" value="{{ ((isset($data))?$data->featured_cn:'') }}">
                                        </div>
                                        <label class="col-xs-12">วิธีใช้/ขั้นตอนการปรุง/วิธีรับประทาน ภาษาจีน</label>
                                        <div class="col-sm-12" style="padding:0">
                                            <input type="text" class="form-control" id="howtouser_cn" name="howtouser_cn" value="{{ ((isset($data))?$data->howtouser_cn:'') }}">
                                        </div>
                                        <label class="col-xs-12">ข้อควรระวัง/การเก็บรักษา ภาษาจีน</label>
                                        <div class="col-sm-12" style="padding:0">
                                            <input type="text" class="form-control" id="warning_cn" name="warning_cn" value="{{ ((isset($data))?$data->warning_cn:'') }}">
                                        </div>
                                        <label class="col-xs-12" style="margin-top:1rem">รายละเอียด</label>
                                        <div class="col-sm-12" style="padding:0">
                                            <textarea class="summernote" name="detail_cn">{{  ((isset($data))?$data->detail_cn:'') }}</textarea>
                                        </div>
                                        <label class="col-xs-12">ราคาขายภาษาจีน</label>
                                        <div class="col-sm-12" style="padding:0">
                                            <input type="text" class="form-control" id="price_cn" name="price_cn" value="{{ ((isset($data))?$data->price_cn:'') }}">
                                        </div>
                                        <label class="col-xs-12">ต้นทุนภาษาจีน</label>
                                        <div class="col-sm-12" style="padding:0">
                                            <input type="text" class="form-control" id="cost_cn" name="cost_cn" value="{{ ((isset($data))?$data->cost_cn:'') }}">
                                        </div>
                                    </div>

                                </div>
                            </div>

                            </div>

                        </div>


                    
                    
                  
                    
                
                    <div class="form-group col-xs-12 col-lg-12">
                        <label class="col-xs-12">รหัสสินค้า</label>
                        <div class="col-sm-12" style="padding:0">
                            <input type="text" class="form-control" id="code_item" name="code_item" value="{{ ((isset($data))?$data->code_item:'') }}">
                        </div>
                        <label class="col-xs-12">จำนวน</label>
                        <div class="col-sm-12" style="padding:0">
                            <input type="text" class="form-control" id="count" name="count" value="{{ ((isset($data))?$data->count:'') }}">
                        </div>
                        <label class="col-xs-12">บาร์โค้ดต่อชิ้น</label>
                        <div class="col-sm-12" style="padding:0">
                            <input type="text" class="form-control" id="barcode_item" name="barcode_item" value="{{ ((isset($data))?$data->barcode_item:'') }}">
                        </div>
                        <label class="col-xs-12">บาร์โค้ดต่อชุด</label>
                        <div class="col-sm-12" style="padding:0">
                            <input type="text" class="form-control" id="barcode_set" name="barcode_set" value="{{ ((isset($data))?$data->barcode_set:'') }}">
                        </div>
                        <label class="col-xs-12">บาร์โค้ดต่อลัง</label>
                        <div class="col-sm-12" style="padding:0">
                            <input type="text" class="form-control" id="barcode_box" name="barcode_box" value="{{ ((isset($data))?$data->barcode_box:'') }}">
                        </div>
                        <label class="col-xs-12">ราคาขายปลีก</label>
                        <div class="col-sm-12" style="padding:0">
                            <input type="text" class="form-control" id="retail" name="retail" value="{{ ((isset($data))?$data->retail:'') }}">
                        </div>
                        <label class="col-xs-12">ขนาดสินค้าด้านกว้าง</label>
                        <div class="col-sm-12" style="padding:0">
                            <input type="text" class="form-control" id="product_width" name="product_width" value="{{ ((isset($data))?$data->product_width:'') }}">
                        </div>
                        <label class="col-xs-12">ขนาดสินค้าด้านยาว</label>
                        <div class="col-sm-12" style="padding:0">
                            <input type="text" class="form-control" id="product_long" name="product_long" value="{{ ((isset($data))?$data->product_long:'') }}">
                        </div>
                        <label class="col-xs-12">ขนาดสินค้าด้านสูง</label>
                        <div class="col-sm-12" style="padding:0">
                            <input type="text" class="form-control" id="product_height" name="product_height" value="{{ ((isset($data))?$data->product_height:'') }}">
                        </div>
                        <label class="col-xs-12">น้ำหนักสินค้า</label>
                        <div class="col-sm-12" style="padding:0">
                            <input type="text" class="form-control" id="product_weight" name="product_weight" value="{{ ((isset($data))?$data->product_weight:'') }}">
                        </div>
                        <label class="col-xs-12">ขนาดกล่องด้านกว้าง</label>
                        <div class="col-sm-12" style="padding:0">
                            <input type="text" class="form-control" id="box_width" name="box_width" value="{{ ((isset($data))?$data->box_width:'') }}">
                        </div>
                        <label class="col-xs-12">ขนาดกล้องด้านยาว</label>
                        <div class="col-sm-12" style="padding:0">
                            <input type="text" class="form-control" id="box_long" name="box_long" value="{{ ((isset($data))?$data->box_long:'') }}">
                        </div>
                        <label class="col-xs-12">ขนาดกล้องด้านสูง</label>
                        <div class="col-sm-12" style="padding:0">
                            <input type="text" class="form-control" id="box_height" name="box_height" value="{{ ((isset($data))?$data->box_height:'') }}">
                        </div>
                        <label class="col-xs-12">น้ำหนักกล่อง</label>
                        <div class="col-sm-12" style="padding:0">
                            <input type="text" class="form-control" id="box_weight" name="box_weight" value="{{ ((isset($data))?$data->box_weight:'') }}">
                        </div>
                        <label class="col-xs-12">อายุสินค้า</label>
                        <div class="col-sm-12" style="padding:0">
                            <input type="text" class="form-control" id="age_product" name="age_product" value="{{ ((isset($data))?$data->age_product:'') }}">
                        </div>

                        <label class="col-xs-12">ประเภทสินค้า</label>
                        <div class="col-sm-12" style="padding:0">
                            <select class="select2 form-control" id="type" name="type[]" multiple>
                                @foreach($type as $t)
                                <option value="{{ $t->id }}" {{  ((isset($type_product))?((in_array($t->id,$type_product))?'selected':''):'')  }} >{{ $t->name_th }}</option>
                                @endforeach
                            </select>    
                        </div>

                        </div>

                        <div class="form-group col-xs-12 col-lg-12">
                            <label class="col-xs-12">Package</label>
                        </div>
                        <div class="form-group col-xs-12 col-lg-12">
                        <div class="package">
                            @if(!isset($package))
                            <div class="form-inline">
                                <div class="col-xs-6 col-lg-8">
                                        <div class="input-group">
                                        <span class="input-group-addon addpackage" style="margin-top: 0;" ><i class="fas fa-plus"></i></span>
                                        <input type="text" class="form-control"  name="package[]" value="">
                                        </div>
                                </div>
                                <div class="col-xs-6 col-lg-4">
                                    <div class="input-group">
                                        <span class="input-group-addon addpackage" style="margin-top: 0;" ><i class="fas fa-dollar-sign"></i></span>
                                        <input type="text" class="form-control"  name="price_package[]" value="" placeholder="00.00">
                                    </div>
                                </div>
                            </div>
                            
                            @else
                            <?php $i = 0; ?>
                            @foreach($package as $val)
                            <div class="form-inline boxpackage">
                                <div class="col-xs-6 col-lg-8">
                                    <div class="input-group">
                                    @if($i == 0)
                                    <span class="input-group-addon addpackage" style="margin-top: 0;" ><i class="fas fa-plus"></i></span>
                                    @else
                                    <span class="input-group-addon" onclick="delpackage(this);" style="margin-top: 0;    background-color:#FF5370;" ><i class="fas fa-minus"></i></span>
                                    @endif
                                    <input type="text" class="form-control"  name="package[]" value="{{ $val->package }}">
                                    </div>
                                </div>
                                <div class="col-xs-6 col-lg-4">
                                    <div class="input-group">
                                        <span class="input-group-addon addpackage" style="margin-top: 0;" ><i class="fas fa-dollar-sign"></i></span>
                                        <input type="text" class="form-control"  name="price_package[]" value="{{ $val->price }}" placeholder="00.00">
                                    </div>
                                </div>
                            </div>
                            <?php $i++; ?>
                            @endforeach
                            @endif
                        </div>
                        </div>




                
                    <div class="form-group col-xs-12 col-lg-3">
                        @if(isset($data) && $data->picture_1 != "")
                        <img id="preview_1" src="{{ url('../') }}/{{ $data->picture_1 }}" width="100%" height="200px">
                        <input type="hidden" name="oldpicture1" value="{{ $data->picture_1 }}">
                        @else
                        <img id="preview_1" src="{{ url('../') }}/image/default.jpg" width="100%" height="200px">
                        @endif
                        <input type="file" name="picture_1" onchange="prview(this,1);">
                    </div>

                    <div class="form-group col-xs-12 col-lg-3">
                        @if(isset($data) && $data->picture_2 != "")
                        <img id="preview_2" src="{{ url('../') }}/{{ $data->picture_2 }}" width="100%" height="200px">
                        <input type="hidden" name="oldpicture2" value="{{ $data->picture_2 }}">
                        @else
                        <img id="preview_2" src="{{ url('../') }}/image/default.jpg" width="100%" height="200px">
                        @endif
                        <input type="file" name="picture_2" onchange="prview(this,2);">
                    </div>

                    <div class="form-group col-xs-12 col-lg-3">
                        @if(isset($data) && $data->picture_3 != "")
                        <img id="preview_3" src="{{ url('../') }}/{{ $data->picture_3 }}" width="100%" height="200px">
                        <input type="hidden" name="oldpicture3" value="{{ $data->picture_3}}">
                        @else
                        <img id="preview_3" src="{{ url('../') }}/image/default.jpg" width="100%" height="200px">
                        @endif
                        <input type="file" name="picture_3" onchange="prview(this,3);">
                    </div>

                    <div class="form-group col-xs-12 col-lg-3">
                        @if(isset($data) && $data->picture_4 != "" )
                        <img id="preview_4" src="{{ url('../') }}/{{ $data->picture_4 }}" width="100%" height="200px">
                        <input type="hidden" name="oldpicture4" value="{{ $data->picture_4 }}">
                        @else
                        <img id="preview_4" src="{{ url('../') }}/image/default.jpg" width="100%" height="200px">
                        @endif
                        <input type="file" name="picture_4" onchange="prview(this,4);">
                    </div>
                    
                    <div class="form-group col-xs-12 col-lg-12 text-right">
                    <button type="button" class="btn btn-default" style="margin-right:1rem">Back</button>
                    <button type="button" class="btn-submit btn btn-primary">Save</button>
                    </div>
                </div>
                </div>
            </div>
        </div>



    </div>        
</div>

@stop
@push('scripts')
<script>

    $(function(){

        $('.select2').select2();


        $('.btn-submit').click(function(){

            if($('#type').val() == ""){
                $('#type').focus();
            }else{
            $('#myForm').submit();  
            }
        
        });

    });

    function upload(id,type){

        $('#modalupload').modal();
        $('#id').val(id);
        $('#type').val(type);

    }

    function readURL(input,type) {

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
        $('#preview_'+type).attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
    }

    function prview(data,type){

        readURL(data,type);

    }

    $('.addpackage').click(function(){

    
        var html = '<div class="form-inline boxpackage">'
                        +'<div class="col-xs-6 col-lg-8">'
                                +'<div class="input-group">'
                                +'<span class="input-group-addon" onclick="delpackage(this);" style="margin-top: 0;    background-color:#FF5370;" ><i class="fas fa-minus"></i></span>'
                                +'<input type="text" class="form-control"  name="package[]" value="">'
                                +'</div>'
                        +'</div>'
                        +'<div class="col-xs-6 col-lg-4">'
                            +'<div class="input-group">'
                                +'<span class="input-group-addon addpackage" style="margin-top: 0;" ><i class="fas fa-dollar-sign"></i></span>'
                                +'<input type="text" class="form-control"  name="price_package[]" value="" placeholder="00.00">'
                            +'</div>'
                        +'</div>'
                    +'</div>';

        $('.package').append(html);
    
    });

    function delpackage(d){

        $(d).closest('.boxpackage').remove();

    }

</script>
@endpush