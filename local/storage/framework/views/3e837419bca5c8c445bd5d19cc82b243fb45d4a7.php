<?php $__env->startSection('content'); ?>
		<div id="content" class="content">
			<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
				<li><a href="javascript:;">Home</a></li>
				<li class="active">นิยายประจำวัน</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">จัดการ นิยายประจำวัน</h1>
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
                            <h4 class="panel-title">จัดการ นิยายประจำวัน</h4>
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

		<div id="myModalBook" class="modal fade" role="dialog">
		  <div class="modal-dialog modal-lg" >

		    <!-- Modal content-->
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal">&times;</button>
		        <h4 class="modal-title">นิยายประจำวัน</h4>
		      </div>
		      <div class="modal-body">
                <input type="hidden" id="id" name="id" >
                <select id="book" name="book" class="form-control">
                    <?php $__currentLoopData = $book; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $b): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($b['id']); ?>"><?php echo e($b['name']); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
		      </div>
		      <div class="modal-footer">
                <button type="button" class="btn btn-success" id="saveBook" >Submit</button>
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
          order:[[4,'asc']],
          ajax: {
    			url: '<?php echo e(action("NovelTodayController@datatable")); ?>',
                method: 'POST'
            },
          columns: [
            {title :'วัน',data:'day', className: 'text-center', defaultContent: '-'},
            {title :'ปกนิยาย',data:'picture', className: 'text-center', defaultContent: '-'},
            {title :'ชื่อนิยาย',data:'name', className: 'text-center', defaultContent: '-'},
            {title :'คนเขียน',data:'name_writer', className: 'text-center', defaultContent: '-'},
            {title :'Action',data:'id_day', className: 'text-center', defaultContent: '-'},
          ],
          rowCallback: function(nRow, aData, dataIndex){


             $('td:last-child',nRow).html(''
                +'<a onclick="changBook('+aData['id_day']+','+aData['id_novel']+');" class="btn btn-warning" >แก้ไขหนังสือ</a>'
            );

             $('td:eq(1)',nRow).html(''
                +'<img src="<?php echo e(url("../")); ?>/'+aData['picture']+'" width="100" heigth="150">'                    
            );

            

            

      }
    });

   
    
});



function changBook(id,id_b){

    $('#id').val(id);
    $('#book').val(id_b);
    $('#myModalBook').modal();

}

$('#saveBook').click(function(){

    $.ajax('<?php echo e(action("NovelTodayController@update")); ?>', {
        type: 'POST',
        data: {
            id:$('#id').val(),
            book:$('#book').val(),
        },
        dataType: 'html',
        success: function(data) {
                oTable.draw();
                $('#myModalBook').modal("toggle")
        }
    });

});







</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('backend.layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>