<?php $__env->startSection('content'); ?>
		<div id="content" class="content">
			<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
				<li><a href="javascript:;">Home</a></li>
				<li class="active">จัดการรูปภาพ</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">รายงานแลกสินค้า</h1>
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
                            <h4 class="panel-title">รายงานแลกสินค้า</h4>
                        </div>

                        <div class="panel-body">
                          <div class="row" style="padding: 0px 2px 0 0;">
                                <div class="col-md-6 text-left" >
                                    <div class="pull-left w210">
                                        <select class="form-control" id="status">
                                            <option value="99">--all--</option>
                                            <option value="0">--รอการจัดส่ง--</option>
                                            <option value="1">--จัดส่งสำเร็จ--</option>
                                            <option value="2">--ยกเลิกการจัดส่ง--</option>
                                        </select>
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
        
    

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
$(function() {
    
  		oTable = $('#data-table').DataTable({
          processing: true,
          serverSide: true,
          order:[ 5 ,'asc'],
          ajax: {
    			url: '<?php echo e(action("GhostgiftController@datatableReport")); ?>',
    			data: function ( d ) {

                    d.status = $('#status').val();

                },
                method: 'POST'
            },
          columns: [
            {title :'ชื่อสินค้า',data:'name', className: 'text-center', defaultContent: '-'},
            {title :'user',data:'username', className: 'text-center', defaultContent: '-'},
            {title :'สถานที่ส่ง',data:'location', className: 'text-center', defaultContent: '-'},
            {title :'เบอร์ติดต่อ',data:'tel', className: 'text-center', defaultContent: '-'},
            {title :'สถานะ',data:'status', className: 'text-center', defaultContent: '-'},
            {title :'เลข Ems',data:'ems', className: 'text-center', defaultContent: '-'},
            {title :'Action',data:'id', className: 'text-center', defaultContent: '-'},
          ],
          rowCallback: function(nRow, aData, dataIndex){

              $('td:last-child',nRow).html(''
              +'<button class="btn btn-sm btn-success" onclick="addnumber(this,'+aData['id']+','+aData['id_user']+');" data-item="'+aData['name']+'">ใส่หมายเลขแท๊คกิ้ง</button>'
              +'<br><p></p>'
              +'<button class="btn btn-sm btn-danger" onclick="delnumber(this,'+aData['id']+','+aData['id_user']+');" data-item="'+aData['name']+'">ยกเลิกการส่ง</button>');



              if(aData['status'] == 0){
                $('td:eq(4)',nRow).html('รอการจัดส่ง');
              }else if(aData['status'] == 2){
                $('td:eq(4)',nRow).html('ยกเลิกจัดส่ง');
              }else{
                $('td:eq(4)',nRow).html('จัดส่งแล้ว');
              }
            


      }
    });


    $('#status').change(function(){

        oTable.draw(); 
    
    });
    
});


function addnumber(i,id,id_user){

    var number = prompt("ใส่เลข ems");
    var nameitem = $(i).data('item');

    if(number != null){
        $.ajax('<?php echo e(action("GhostgiftController@addEms")); ?>', {
            type: 'POST',
            data: {
                id:id,
                id_user:id_user,
                number:number,
                item:nameitem,
            },
            dataType: 'json',
            success: function(data) {
                oTable.draw();    
            }
        });
    }

}


function delnumber(i,id,id_user){

    var nameitem = $(i).data('item');
    var detail = prompt("กรุณากรอกสาเหตุ");
    if(detail != null){
        $.ajax('<?php echo e(action("GhostgiftController@delEms")); ?>', {
            type: 'POST',
            data: {
                id:id,
                id_user:id_user,
                detail:detail,
                item:nameitem,
            },
            dataType: 'json',
            success: function(data) {
                oTable.draw();    
            }
        });
    }

}














</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('backend.layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>