@extends('backend.layouts.default')
@section('content')
		<div id="content" class="content">
			<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
				<li><a href="javascript:;">Home</a></li>
				<li class="active">User</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">รายชื่อ User</h1>
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
                            <h4 class="panel-title">รายชื่อ User</h4>
                        </div>

                        <div class="panel-body">
                          <div class="row" style="padding: 0px 2px 0 0;">
            								<div class="col-md-6 text-left" >
            									<div class="pull-left w210">
            									</div>
            								</div>
            								<div class="col-md-6 text-right" >
            									<a href="{{ action('UserController@addForm') }}" class="btn btn-sm btn-success">Create User</a>
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




@stop

@push('scripts')
<script>
$(function() {
  		oTable = $('#data-table').DataTable({
          "order": [[ 6 , "desc" ]],
          processing: true,
          serverSide: true,
          ajax: {
    			url: '{{ action("UserController@datatable") }}',
    			data: function ( d ) {},
                method: 'POST'
            },
          columns: [
            {title :'username',data:'username', className: 'text-center', defaultContent: '-'},
            {title :'ชื่อ-นามสกุล',data:'name', className: 'text-center', defaultContent: '-'},
            {title :'Email',data:'Email', className: 'text-center', defaultContent: '-'},
            {title :'แต้มกระโหลก',data:'point_s', className: 'text-center', defaultContent: '-'},
            {title :'แต้มควาย',data:'point_b', className: 'text-center', defaultContent: '-'},
            {title :'สถานะ',data:'status', className: 'text-center', defaultContent: '-'},
            {title :'Action',data:'id', className: 'text-center', defaultContent: '-'},
          ],
          rowCallback: function(nRow, aData, dataIndex){

             $('td:eq(1)',nRow).html(aData['F_name']+' '+aData['L_name']);


             $('td:eq(3)',nRow).html('<p onclick="add_s('+aData['id']+')">'+aData['point_s']+'</p>');

             $('td:eq(4)',nRow).html('<p onclick="add_b('+aData['id']+')">'+aData['point_b']+'</p>');

             if(aData['level'] == 0){
               $('td:eq(5)',nRow).html('<h5><p class="label label-default">สมาชิกทั่วไป</p></h5>');
             }else if(aData['level'] == 1 || aData['level'] == 2){
               $('td:eq(5)',nRow).html('<h5><p class="label label-primary">นักเขียน</p></h5>');
             }else{
               $('td:eq(5)',nRow).html('<h5><p class="label label-success">นักเขียน VIP</p></h5>');  
             }

             $('td:last-child',nRow).html(''
                +'<button onclick="updateVIP('+aData['id']+');" class="btn btn-sm btn-primary">UP VIP</button> '
                +'<a href="user/'+aData['id']+'/editForm" class="btn btn-sm btn-success">แก้ไข</a> '
                +'<button onclick="del('+aData['id']+');" class="btn btn-sm btn-danger">ลบ</button> '    
            );

            

      }
    });
    
});



function updateVIP(id){

    swal({
	  title: "ยืนยันการอนุมัติให้ user นี้เป็น VIP หรือไม่",
	  type: "warning",
	  showCancelButton: true,
	  confirmButtonClass: "btn-danger",
	  confirmButtonText: "ยืนยัน",
	  closeOnConfirm: false
    },
    
	function(){

        $.ajax('{{ action("UserController@update_vip") }}', {
        type: 'POST',
        data: {
            'id':id
        },
        dataType: 'json',
        success: function(data) {

            swal("Updata Success", "ยันยันการอัพเดท สถานะ user", "success");
            oTable.draw();

        }
        });

	});


}

function del(id){

    swal({
	  title: "ยืนยันการลบ User นี้ ออกจากระบบ ใช่หรือไม่",
	  type: "warning",
	  showCancelButton: true,
	  confirmButtonClass: "btn-danger",
	  confirmButtonText: "ยืนยัน",
	  closeOnConfirm: false
    },
    
	function(){

        window.location.href="user/"+id+"/delete";

	});


}

function add_s(id){

    var point = prompt("ใส่จำนวน แต้ม หัวกะโหลกที่จะทำการเพิ่ม");

    if (point != null) {
    $.ajax('{{ action("UserController@update_pointS") }}', {
        type: 'POST',
        data: {
            id:id,
            point:point
        },
        dataType: 'json',
        success: function(data) {
            oTable.draw();    
        }
    });
}

}

function add_b(id){

    var point = prompt("ใส่จำนวน แต้ม ตุ๊กตาควายที่จะทำการเพิ่ม");

    if (point != null) {
    $.ajax('{{ action("UserController@update_pointB") }}', {
        type: 'POST',
        data: {
            id:id,
            point:point
        },
        dataType: 'json',
        success: function(data) {
            oTable.draw();    
        }
    });
}

}




</script>
@endpush
