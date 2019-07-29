@extends('backend.layouts.default')
@section('content')
		<div id="content" class="content">
			<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
				<li><a href="javascript:;">Home</a></li>
				<li class="active">คลิป</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">จัดการ คลิป</h1>
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
                            <h4 class="panel-title">จัดการ คลิป</h4>
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
                            
                          <table id="data-table" class="table table-striped table-bordered"></table>
                            
                        </div>
                    </div>
                    <!-- end panel -->
                </div>
                <!-- end col-12 -->
            </div>
            <!-- end row -->
		</div>

		<div id="myModalReview" class="modal fade" role="dialog">
		  <div class="modal-dialog modal-lg" >

		    <!-- Modal content-->
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal">&times;</button>
		        <h4 class="modal-title">Review</h4>
		      </div>
		      <div class="modal-body" id="review_iframe" style="height: 100%;">

		      </div>
		      <div class="modal-footer">
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
    			url: '{{ action("WritherManageOtherController@datatable_clip") }}',
                method: 'POST'
            },
          columns: [
            {title :'ชื่อตอน',data:'name', className: 'text-center', defaultContent: '-'},
            {title :'ยอดวิว',data:'view', className: 'text-center', defaultContent: '-'},
            {title :'สถานะ',data:'status', className: 'text-center', defaultContent: '-'},
            {title :'ตัวอย่าง',data:'id', className: 'text-center', defaultContent: '-'},
            {title :'Action',data:'status', className: 'text-center', defaultContent: '-'},
          ],
          rowCallback: function(nRow, aData, dataIndex){

            if(aData['status'] == 99){
                
            $('td:last-child',nRow).html(''
                +'<a href="manage_clip/'+aData['id']+'/form"  class="btn btn-xs btn-success">แก้ไข</a>'
                +'<a onclick="delNovel('+aData['id']+');" class="btn btn-xs btn-danger" >ลบข้อมูล</a>'
            );

            }else{

             $('td:last-child',nRow).html(''
                +'<a href="manage_clip/'+aData['id']+'/form"  class="btn btn-xs btn-success">แก้ไข</a>'
                +'<a onclick="closeNovel('+aData['id']+');" class="btn btn-xs btn-warning" >ปิดตอน</a>'
            );

            }

             $('td:eq(1)',nRow).html(''
                +'<p ondblclick="changV(this,'+aData['id']+')" id="v_'+aData['id']+'" data-rating="'+aData['view']+'">'+aData['view']+'</p>'                    
            );

            if(aData['status'] == 0){
                $('td:eq(2)',nRow).html('<p>ยังไม่เปิดให้อ่าน</p>');
            }else if(aData['status'] == 2){
                $('td:eq(2)',nRow).html('<p>บันทึกร่าง</p>');
            }else if(aData['status'] == 1){
                $('td:eq(2)',nRow).html('<p>เปิดให้อ่าน</p>');
            }else if(aData['status'] == 3){
                $('td:eq(2)',nRow).html('<p>ปิดจากadmin</p>');
            }else{
               $('td:eq(2)',nRow).html('<p>ถูกลบโดย User</p>'); 
            }

            $('td:eq(3)',nRow).html(''
            +'<a onclick="review('+aData['id']+');" class="btn btn-sm btn-icon btn-circle btn-primary"><i class="fa fa-search" aria-hidden="true"></i></a>'
            );

            

      }
    });

   
    
});


function review(id){



	$('#myModalReview').modal();
	$('.modal-body').css('overflow-y', 'auto');
    $('.modal-body').css('height', '1000px');
	$('#review_iframe').html("<iframe src='{{ url('../') }}/review-clip/"+id+"/' width='100%' height='100%'></ifram>");

}


function closeNovel(id){

var value = prompt("กรุณา กรอกสาเหตุที่ปิดตอน");

if (value != null) {
   window.location.href="manage_clip/"+id+"/close/"+value;
}

}

function delNovel(id){

    if(confirm("ยืนยันที่จะลบข้อมูล จะไม่สามารถนำกลับมาได้อีก")){
        window.location.href="manage_clip/"+id+"/del";
    }

}



function changV(v,id){

    var view = $(v).data('rating');
    $('#v_'+id).html('<input type="text" class="form-control" onkeypress="editV(this,event);" data-id="'+id+'" value="'+view+'">');
}

function editV(d,e){

    if (e.keyCode == 13) {


    var data = d.value;
    var id = $(d).data('id');

     $.ajax('{{ action("WritherManageOtherController@updateview") }}', {
        type: 'POST',
        data: {
            'id':id,
            'view':data
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
