@extends('backend.layouts.default')
@section('content')
		<div id="content" class="content">
			<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
				<li><a href="javascript:;">Home</a></li>
				<li class="active">นิยาย</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">จัดการ นิยาย</h1>
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
                            <h4 class="panel-title">จัดการ นิยาย</h4>
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
                        <form id="tCheck">
                          <table id="data-table1" class="table table-striped table-bordered"></table>
                        </form>
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
  		
          oTable = $('#data-table1').DataTable({

          processing: true,
          serverSide: true,
          order:[ 0 ,'desc'],
          ajax: {
    			url: '{{ action("WritherManageNovelController@datatable_bookvip") }}',
    			data: function ( d ) {},
                method: 'POST'
            },
          columns: [
            {title :'แนะนำ 5 อันดับ',data:'TopSelectVip', className: 'text-center', defaultContent: '-'},
            {title :'ชื่อเรื่อง',data:'name', className: 'text-center', defaultContent: '-'},
            {title :'รูปปก',data:'pic_B', className: 'text-center', defaultContent: '-'},
            {title :'ชื่อนักเขียน',data:'name_writer', className: 'text-center', defaultContent: '-'},
            {title :'แรงค์กิ้ง',data:'rating', className: 'text-center', defaultContent: '-'},
            {title :'สถานะ',data:'status', className: 'text-center', defaultContent: '-'},
          ],
          rowCallback: function(nRow, aData, dataIndex){

            if(aData['TopSelectVip'] == 1){
            $('td:eq(0)',nRow).html('<input type="checkbox" name="topCom[]" value="'+aData['id_B']+'" onclick="Check(this);" checked>');
            }else{
            $('td:eq(0)',nRow).html('<input type="checkbox" name="topCom[]" value="'+aData['id_B']+'" onclick="Check(this);" >');
            }


             $('td:eq(4)',nRow).html(''
                +'<p ondblclick="changR(this,'+aData['id_B']+')" id="r_'+aData['id_B']+'" data-rating="'+aData['rating']+'">'+aData['rating']+'</p>'                    
            );

            $('td:eq(2)',nRow).html(''
                +'<img src ="{{ url("../") }}/'+aData['pic_B']+'" width="100px">'                    
            );

            if(aData['status_B'] == 0){
                $('td:eq(5)',nRow).html('<p>ยังไม่เปิดให้อ่าน</p>');
            }else if(aData['status_B'] == 1){
                $('td:eq(5)',nRow).html('<p>เปิดให้อ่าน</p>');
            }else if(aData['status_B'] == 10){
                $('td:eq(5)',nRow).html('<p>ถูกทำให้จบโดย นักเขียน</p>');
            }else if(aData['status_B'] == 99){
                $('td:eq(5)',nRow).html('<p>ถูกลบโดย นักเขียน</p>');
            }else{
                $('td:eq(5)',nRow).html('<p>ปิดจากadmin</p>');
            }

            

      }
    });

   
    
});



function Check(type){

    var myform = $('#tCheck').serializeArray();

    var count = (myform.length)-1;


  if(count > 5){
    swal({
        title: "Warning!!!",
        text: "ไม่สามารถเลือกได้เกิน 5 เรื่อง",
        icon: "warning",
      });
    oTable.draw();
  }else{

     $.ajax('{{ action("WritherManageNovelController@top_vipnove") }}', {
         type: 'POST',
         data:myform,
         dataType: 'json',
         success: function(data) {
           oTablev.draw();
         }
     });

   }

}


function changR(r,id){


    var rating = $(r).data('rating');
    $('#r_'+id).html('<input type="text" class="form-control" onkeypress="editR(this,event);" data-id="'+id+'" value="'+rating+'">');

}

function editR(d,e){

    if (e.keyCode == 13) {

    var data = d.value;
    var id = $(d).data('id');

     $.ajax('{{ action("WritherManageNovelController@updaterating") }}', {
        type: 'POST',
        data: {
            'id':id,
            'rating':data
        },
        dataType: 'json',
        success: function(data) {
            oTable.draw()
        }
    });

    }


}









</script>
@endpush
