@extends('backend.layouts.default')
@section('content')
		<div id="content" class="content">
			<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
				<li><a href="javascript:;">Home</a></li>
				<li class="active">ฟอร์มจัดการข้อมูลหนังสือ</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">ฟอร์มจัดการข้อมูลหนังสือ</h1>
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
                            <h4 class="panel-title">ฟอร์มจัดการข้อมูลหนังสือ</h4>
                        </div>

                        <div class="panel-body">
                            <div class="row" style="padding: 0px 2px 0 0;">
                                <div class="col-sm-12 text-center" >
                                    <h4>{{ $book->name }}</h4>
                                </div>
                            </div>
                          <form id="myform" action="{{ action('WritherManageOtherController@updateBook') }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                              {{ csrf_field() }}
                            <input type="hidden" name="type" value="{{ $book->type }}">
                            <input type="hidden" name="id" value="{{ $book->id }}">
                            <div class="form-group">
                              <label class="control-label col-sm-3" >รูปปก</label>
                              <div class="col-sm-8">
                                <input type="hidden" class="form-control" name="oldpicture" id="oldpicture" value="{{ $book->picture }}">
                                <input type="file" class="form-control" name="picture" id="picture">
                              </div>
                            </div>

                            <div class="form-group">
                              <label class="control-label col-sm-3" ></label>
                              <div class="col-sm-8 imgP">
                                  <img src="{{ url('../') }}/{{ $book->picture }}" width="100" height="150">
                              </div>
                            </div>


                            <div class="form-group">
                              <label class="control-label col-sm-3" >ชื่อเรื่อง</label>
                              <div class="col-sm-8">
                                <input type="text" class="form-control" name="name" id="name" value="{{ $book->name }}">
                              </div>
                            </div>

                            <div class="form-group">
                              <label class="control-label col-sm-3" >คำโปรย</label>
                              <div class="col-sm-8">
                                <input type="text" class="form-control" name="titel" id="titel" value="{{ $book->titel }}">
                              </div>
                            </div>

                            <div class="form-group">
                              <label class="control-label col-sm-3" >หมวดหลัก</label>
                              <div class="col-sm-8">
                                <select class="form-control" name="category">
                                @foreach($c1 as $c_1)
                                    <option value="{{ $c_1->name }}" {{ (($book->category == $c_1->name)?'selected':'') }}>{{ $c_1->name }}</option>
                                @endforeach
                                <select>
                              </div>
                            </div>

                            <div class="form-group">
                              <label class="control-label col-sm-3" >หมวดรอง</label>
                              <div class="col-sm-8">
                                <select class="form-control" name="category2">
                                @foreach($c2 as $c_2)
                                    <option value="{{ $c_2->name }}" {{ (($book->category2 == $c_2->name)?'selected':'') }} >{{ $c_2->name }}</option>
                                @endforeach
                                </select>
                              </div>
                            </div>

                            <div class="form-group">
                              <label class="control-label col-sm-3" >นามปากกา</label>
                              <div class="col-sm-8">
                                <select class="form-control" name="id_w">
                                    @foreach($name_user as $n)
                                    @if($n->name != "")
                                    <option value="{{ $n->id }}" {{  (($book->id_w == $n->id)?'selected':'') }}>{{ $n->name }}</option>
                                    @endif
                                    @endforeach
                                </select>
                              </div>
                            </div>


                            <div class="form-group">
                              <label class="control-label col-sm-3" >ระดับของเนื้อหา</label>
                              <div class="col-sm-8">
                                <input type="radio" name="age" {{ (($book->age == "15+")?'checked':'') }} value="15+"> 15+
                                <input type="radio" name="age" {{ (($book->age == "18+")?'checked':'') }} value="18+"> 18+
                                <input type="radio" name="age" {{ (($book->age == "20+")?'checked':'') }} value="20+"> 20+
                              </div>
                            </div>

                            <div class="form-group">
                              <label class="control-label col-sm-3" >แนะนำเรื่อง</label>
                              <div class="col-sm-8">
                                <textarea class="ckeditor" name="detail">{{ $book->detail }}</textarea>
                              </div>
                            </div>

                            <div class="form-group">
                              <label class="control-label col-sm-3" ></label>
                              <div class="col-sm-8 text-rigth">
                                <button type="submit" class="btn btn-primary">บันทึก</button>
                                <button type="button" onclick="window.history.back();" class="btn btn-warning">ย้อนกลับ</button>
                              </div>
                            </div>

                          </form>
                         
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

var imagesPreview = function(input, placeToInsertImagePreview) {

        if (input.files) {
            var filesAmount = input.files.length;

            for (i = 0; i < filesAmount; i++) {
                var reader = new FileReader();

                reader.onload = function(event) {
                    $($.parseHTML('<img>')).attr('src', event.target.result).css('width','100px').css('height','150px').appendTo(placeToInsertImagePreview);
                }

                reader.readAsDataURL(input.files[i]);
            }
        }

    };

$('#picture').on('change', function() {

    $('.imgP').empty();    
    imagesPreview(this, 'div.imgP');
});

</script>
@endpush
