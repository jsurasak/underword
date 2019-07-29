<?php $__env->startSection('content'); ?>
		<div id="content" class="content">
			<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
				<li><a href="javascript:;">Home</a></li>
				<li class="active">Event</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">Event</h1>
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
                            <h4 class="panel-title">Event</h4>
                        </div>

                        <div class="panel-body">
                          <div class="row" style="padding: 0px 2px 0 0;">
            								<div class="col-md-6 text-left" >
            									<div class="pull-left w210">
																
            									</div>
            								</div>
            								<div class="col-md-6 text-right" >
            									<a href="<?php echo e(action('EventController@formAdd')); ?>" class="btn btn-sm btn-success">Create Event</a>
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

      $('#date').datetimepicker({ format:'YYYY-MM-DD HH:mm:ss' });

  		oTable = $('#data-table').DataTable({

          processing: true,
          serverSide: true,
          ajax: {
    			url: '<?php echo e(action("EventController@datatable")); ?>',
                method: 'POST'
            },
          columns: [
            {title :'รูปปก',data:'picture', className: 'text-center', defaultContent: '-'},
            {title :'หัวข้อ',data:'heade', className: 'text-center', defaultContent: '-'},
            {title :'วันที่ลง',data:'time_show', className: 'text-center', defaultContent: '-'},
			{title :'Action',data:'id', className: 'text-center', defaultContent: '-'},
          ],
          rowCallback: function(nRow, aData, dataIndex){

            $('td:last-child',nRow).html(''
            +'<a href="event/'+aData['id']+'/FormEdit" class="btn btn-sm btn-icon btn-circle btn-success"><i class="glyphicon glyphicon-pencil"></i></a>'
            +'<a onclick="del('+aData['id']+');" class="btn btn-sm btn-icon btn-circle btn-danger"><i class="fa fa-times" aria-hidden="true"></i></a>');

            $('td:eq(0)',nRow).html('<img src="<?php echo e(url("../")); ?>/'+aData['picture']+'" width="200px" height="200px">');

      }
    });

});


function del(id){

    if(confirm("ยืนยันการลบ")){
        window.location.href="event/"+id+"/del";
    }

}




</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('backend.layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>