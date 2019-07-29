@extends('backend.layouts.default')
@section('content')
		<div id="content" class="content">
			<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
				<li><a href="javascript:;">Home</a></li>
				<li class="active">จัดการรูปภาพ</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">จัดการรูปภาพ</h1>
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
                            <h4 class="panel-title">จัดการรูปภาพ</h4>
                        </div>

                        <div class="panel-body">
                          <div class="row" style="padding: 0px 2px 0 0;">
                                <div class="col-md-6 text-left" >
                                    <div class="pull-left w210">
                                    </div>
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
        
        <div id="myModal" class="modal fade" role="dialog">
		  <div class="modal-dialog modal-lg" >

		    <!-- Modal content-->
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal">&times;</button>
		        <h4 class="modal-title">Picture</h4>
		      </div>
		      <div class="modal-body" style="height: 100%;">
                <form id="myform" method="POST" action="{{ action('GhostgiftController@update')}}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="hidden" name="id" id="id">
                <input type="hidden" name="oldPic" id="oldPic">
                <div class="form-group">
                    <label >* รูป จะต้องเป็นนามสกุล .jpg</label>
                    <input type="file" class="form-control" name="pic" id="pic" accept=".jpg">
                </div>
                <div class="form-group">
                    <label ></label>
                    <img id="pic_show" width="98px" height="139">
                </div>
                <div class="form-group">
                    <label >ชื่อสินค้า</label>
                    <input type="text" class="form-control" id="name" name="name">
                </div>
                <div class="form-group">
                    <label >คำอธิบาย</label>                  
                    <input type="text" class="form-control" id="detail" name="detail">
                </div>
                <div class="form-group">
                    <label >แต้ม ควายธนู</label>
                    <input type="text" class="form-control" id="point" name="point">
                </div>
               
		      </div>
		      <div class="modal-footer">
                <button type="submit" class="btn btn-success" >Submit</button>
             </form>
		        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		      </div>
		    </div>

		  </div>
		</div>




@stop

@push('scripts')
<script>
$(function() {
  		oTable = $('#data-table').DataTable({

          processing: true,
          serverSide: true,
          ajax: {
    			url: '{{ action("GhostgiftController@datatable") }}',
    			data: function ( d ) {},
                method: 'POST'
            },
          columns: [
            {title :'รูป',data:'picture', className: 'text-center', defaultContent: '-'},
            {title :'ชื่อสินค้า',data:'name', className: 'text-center', defaultContent: '-'},
            {title :'คำอธิบาย',data:'detail', className: 'text-center', defaultContent: '-'},
            {title :'แต้มใช้แลก',data:'point', className: 'text-center', defaultContent: '-'},
            {title :'Action',data:'id', className: 'text-center', defaultContent: '-'},
          ],
          rowCallback: function(nRow, aData, dataIndex){

             $('td:eq(0)',nRow).html('<img src="{{ url("../") }}/'+aData['picture']+'" width="100" heigth="100">');


             $('td:last-child',nRow).html(''
                +'<a onclick="editPic(this,'+aData['id']+');" data-picture="'+aData['picture']+'" data-name="'+aData['name']+'" data-detail="'+aData['detail']+'" data-point="'+aData['point']+'" class="btn btn-sm btn-success">แก้ไข</a> '  
            );


      }
    });
    
});



function editPic(data,id){

    var id = id;
    var picture = $(data).data('picture');
    var name = $(data).data('name');
    var detail = $(data).data('detail');
    var point = $(data).data('point');

  

    $('#pic_show').attr('src','{{ url("../") }}' + picture);
    $('#id').val(id);
    $('#oldPic').val(picture);
    $('#name').val(name);
    $('#detail').val(detail);
    $('#point').val(point);

    $('#myModal').modal();



}

$("#pic").change(function(){

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
