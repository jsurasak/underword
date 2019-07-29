@extends('backend.layouts.default')
@section('content')
		<div id="content" class="content">
			<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
				<li><a href="javascript:;">Home</a></li>
				<li class="active">Category</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">จัดการ Category</h1>
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
                            <h4 class="panel-title">จัดการ Category</h4>
                        </div>

                        <div class="panel-body">
                          <div class="row" style="padding: 0px 2px 0 0;">
                            <div class="col-md-6 text-left" >
                                <div class="pull-left w210">
                                </div>
                            </div>
                            <div class="col-md-6 text-right" >
                                <a onclick="add();" class="btn btn-sm btn-success">Create หมวดนิยาย</a>
                            </div>
                            </div>
                            <br>
                          <table id="data-table1" class="table table-striped table-bordered"></table>
                            <br>
                          <table id="data-table2" class="table table-striped table-bordered"></table>
                        </div>
                    </div>
                    <!-- end panel -->
                </div>
                <!-- end col-12 -->
            </div>
            <!-- end row -->
		</div>

<div id="modalForm" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" id="heade"></h4>
      </div>
      <div class="modal-body">
        <div class="row">
            <form id="myform" class="form-horizontal">
                <input type="hidden" name="typeF" id="typeF">
                <input type="hidden" name="id" id="id">
                <div class="form-group">
                    <label class="control-label col-sm-3" >หมวดหมู่:</label>
                    <div class="col-sm-8">
                    <select class="form-control" name="type" id="type">
                        <option value="1">หมวดหลัก</option>
                        <option value="2">หมวดรอง</option>
                    </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-3" >name:</label>
                    <div class="col-sm-8">
                    <input type="text" class="form-control" name="name" id="name">
                    </div>
                </div>
            </form>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" onclick="submit();" class="btn btn-primary" >Submit</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>


@stop

@push('scripts')
<script>
$(function() {
  		oTable1 = $('#data-table1').DataTable({

          processing: true,
          serverSide: true,
          ajax: {
    			url: '{{ action("CategoryController@datatable1") }}',
    			data: function ( d ) {},
                method: 'POST'
            },
          columns: [
            {title :'หมวดหลัก',data:'name', className: 'text-center', defaultContent: '-'},
            {title :'Action',data:'id', className: 'text-center', defaultContent: '-'},
          ],
          rowCallback: function(nRow, aData, dataIndex){


             $('td:last-child',nRow).html(''
                +'<a onclick="edit('+aData['id']+')" class="btn btn-sm btn-success">แก้ไข</a> '
                +'<button onclick="del('+aData['id']+');" class="btn btn-sm btn-danger">ลบ</button> '    
            );

            

      }
    });

    oTable2 = $('#data-table2').DataTable({

          processing: true,
          serverSide: true,
          ajax: {
    			url: '{{ action("CategoryController@datatable2") }}',
    			data: function ( d ) {},
                method: 'POST'
            },
          columns: [
            {title :'หมวดรอง',data:'name', className: 'text-center', defaultContent: '-'},
            {title :'Action',data:'id', className: 'text-center', defaultContent: '-'},
          ],
          rowCallback: function(nRow, aData, dataIndex){


             $('td:last-child',nRow).html(''
                +'<a onclick="edit('+aData['id']+')" class="btn btn-sm btn-success">แก้ไข</a> '
                +'<button onclick="del('+aData['id']+');" class="btn btn-sm btn-danger">ลบ</button> '    
            );

            

      }
    });
    
});

function add(){

    $('#heade').html('Add Data');
    $('#typeF').val('add');   
    $('#modalForm').modal();

}

function edit(id){

        $.ajax('{{ action("CategoryController@edit_select") }}', {
        type: 'POST',
        data: {
            'id':id
        },
        dataType: 'json',
        success: function(data) {
            $('#heade').html('Updat Data');
            $('#typeF').val('update');
            $('#id').val(data['id']);
            $('#name').val(data['name']);
            $('#type').val(data['type']);   
            $('#modalForm').modal();
        }
    });

    

}

function submit(){


    $.ajax('{{ action("CategoryController@update") }}', {
        type: 'POST',
        data:$('#myform').serialize(),
        dataType: 'json',
        success: function(data) {
            $('#modalForm').modal('toggle');
            if($('#typeF').val() == "update"){
            swal("Updata Success", "Update Success", "success");
            }else{
            swal("Updata Success", "Insert Success", "success");
            }
            if(data == 1){
            oTable1.draw();
            }else{
            oTable2.draw();
            }
        }
    });


    
}

function del(id){

    swal({
	  title: "ยืนยันการลบ หมวดนิยาย นี้ ออกจากระบบ ใช่หรือไม่",
	  type: "warning",
	  showCancelButton: true,
	  confirmButtonClass: "btn-danger",
	  confirmButtonText: "ยืนยัน",
	  closeOnConfirm: false
    },
    
	function(){

       $.ajax('{{ action("CategoryController@delete") }}', {
        type: 'POST',
        data:{'id':id },
        dataType: 'json',
        success: function(data) {
            swal("Delete Success", "Delete Success", "success");
            oTable1.draw();
            oTable2.draw();
        }
    });

	});


}




</script>
@endpush
