<?php $__env->startSection('content'); ?>
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
                <form id="myform" method="POST" action="<?php echo e(action('DefaultpicController@update')); ?>" enctype="multipart/form-data">
                <?php echo e(csrf_field()); ?>

                <div class="form-group">
                    <label >* รูป จะต้องเป็นนามสกุล .jpg</label>
                    <input type="hidden" id="id" name="id">
                    <input type="file" class="form-control" name="pic" accept=".jpg">
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




<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
$(function() {
  		oTable = $('#data-table').DataTable({

          processing: true,
          serverSide: true,
          ajax: {
    			url: '<?php echo e(action("DefaultpicController@datatable")); ?>',
    			data: function ( d ) {},
                method: 'POST'
            },
          columns: [
            {title :'รูป',data:'picture', className: 'text-center', defaultContent: '-'},
            {title :'คำอธิบาย',data:'detail', className: 'text-center', defaultContent: '-'},
            {title :'Action',data:'id', className: 'text-center', defaultContent: '-'},
          ],
          rowCallback: function(nRow, aData, dataIndex){

             $('td:eq(0)',nRow).html('<img src="<?php echo e(url("../")); ?>/'+aData['picture']+'" width="100" heigth="100">');


             $('td:last-child',nRow).html(''
                +'<a onclick="editPic('+aData['id']+');" class="btn btn-sm btn-success">แก้ไข</a> '  
            );


      }
    });
    
});



function editPic(id){
    $('#id').val(id);
    $('#myModal').modal();

}










</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('backend.layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>