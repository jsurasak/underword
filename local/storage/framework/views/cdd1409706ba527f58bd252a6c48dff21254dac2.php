<?php $__env->startSection('content'); ?>
		<div id="content" class="content">
			<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
				<li><a href="javascript:;">Home</a></li>
				<li class="active">จัดการราคา</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">จัดการราคา</h1>
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
                            <h4 class="panel-title">จัดการราคา</h4>
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
    			url: '<?php echo e(action("SkullManageController@datatable")); ?>',
    			data: function ( d ) {},
                method: 'POST'
            },
          columns: [
            {title :'จำนวนกระโหลก',data:'detail', className: 'text-center', defaultContent: '-'},
            {title :'ราคาขาย',data:'price', className: 'text-center', defaultContent: '-'},
          ],
          rowCallback: function(nRow, aData, dataIndex){

             $('td:eq(0)',nRow).html('<p onclick="editD(this);" data-id="'+aData['id']+'" >'+aData['detail']+' <img src="<?php echo e(url("../")); ?>/img/icon/skull.png" width="25" ></p>');

             $('td:eq(1)',nRow).html('<p onclick="editP(this);" data-id="'+aData['id']+'" >'+aData['price']+'</p>');
            


      }
    });
    
});


function editD(d){

    var id = $(d).data('id');
    var detail = prompt('ใส่จำนวนที่ต้องการแก้ไข');

        if (detail != null) {
        $.ajax('<?php echo e(action("SkullManageController@updateD")); ?>', {
            type: 'POST',
            data: {
                id:id,
                detail:detail
            },
            dataType: 'json',
            success: function(data) {
                oTable.draw();    
            }
        });

    }
}

function editP(d){

    var id = $(d).data('id');
    var detail = prompt('ใส่จำนวนที่ต้องการแก้ไข');

        if (detail != null) {
        $.ajax('<?php echo e(action("SkullManageController@updateP")); ?>', {
            type: 'POST',
            data: {
                id:id,
                detail:detail
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