@extends('backend.layouts.default')
@section('content')
		<div id="content" class="content">
			<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
				<li><a href="javascript:;">Home</a></li>
				<li class="active">จัดการ Report Comment Content</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">จัดการ Report Comment Content</h1>
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
                            <h4 class="panel-title">จัดการ Report Comment Content</h4>
                        </div>

                        <div class="panel-body">
                          <div class="row" style="padding: 0px 2px 0 0;">
                            <div class="col-md-6 text-left" >
                                <div class="pull-left w210">
                                </div>
                            </div>
                            <div class="col-md-6 text-right" >

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
  		oTable = $('#data-table').DataTable({

          processing: true,
          serverSide: true,
          ajax: {
    			url: '{{ action("CommentReportController@datatableContenr") }}',
    			data: function ( d ) {},
                method: 'POST'
            },
          columns: [
            {title :'คอมเม้น',data:'comment', className: 'text-center', defaultContent: '-'},
            {title :'เรื่อง',data:'headerA', className: 'text-center', defaultContent: '-'},
            {title :'user ที่ report',data:'username', className: 'text-center', defaultContent: '-'},
            {title :'email ใช้ติดต่อ',data:'email_r', className: 'text-center', defaultContent: '-'},
            {title :'สาเหตุ',data:'type_r', className: 'text-center', defaultContent: '-'},
            {title :'Action',data:'id_r', className: 'text-center', defaultContent: '-'},
          ],
          rowCallback: function(nRow, aData, dataIndex){

            var detail = aData['type_r'].split(',');
            var text = "";

            detail.forEach(function(e){
                if(e == 1){
                    text += "มีคำหยาบคาย <br>";
                }else if(e == 2){
                    text += "สร้างความเสื่อมเสียให้กับบุคคลอื่น <br>";
                }else if(e == 3){
                    text += "พาดพิงถึงสถาบัน ศาสนา และพระมหากษัตริย์ <br>";
                }else if(e == 4){
                    text += "นำไปสู่การถกเถียงทะเลาะวิวาท <br>";
                }else if(e == 5){
                    text += aData['detail_r'];
                }
            } );          

            $('td:eq(4)',nRow).html(text);

             $('td:last-child',nRow).html(''
                +'<button onclick="del('+aData['id_c']+');" class="btn btn-sm btn-danger">ลบ</button> '    
            );

            

      }
    });
    
});



function del(id){


    var detail = prompt("กรุณากรอกสาเหตุ");

    if(detail != null){
    

        $.ajax('{{ action("CommentReportController@delComment") }}', {
            type: 'POST',
            data:{
                'id':id,
                'type':'content',
                'detail':detail 
                },
            dataType: 'html',
            success: function(data) {
                swal("Delete Success", "Delete Success", "success");
                oTable.draw();
            }
        });

    }


}




</script>
@endpush
