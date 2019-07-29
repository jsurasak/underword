<?php $__env->startSection('content'); ?>
		<div id="content" class="content">
			<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
				<li><a href="javascript:;">Home</a></li>
				<li class="active">Registration</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">รายชื่อ Admin</h1>
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
                            <h4 class="panel-title">รายชื่อ Admin</h4>
                        </div>

                        <div class="panel-body">
                          <div class="row" style="padding: 0px 2px 0 0;">
            								<div class="col-md-6 text-left" >
            									<div class="pull-left w210">
            									</div>
            								</div>
            								<div class="col-md-6 text-right" >
            									<a href="<?php echo e(action('AdminController@create')); ?>" class="btn btn-sm btn-success">Create User</a>
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
        ajax: {
  			url: '<?php echo e(action("AdminController@postDatatable")); ?>',
  			data: function ( d ) {},
              method: 'POST'
          },
        columns: [
          {title :'UserName',data:'username', className: 'text-center', defaultContent: '-'},
          {title :'Name',data:'name', className: 'text-center', defaultContent: '-'},
          {title :'Email',data:'email', className: 'text-center', defaultContent: '-'},
          {title :'Level',data:'level', className: 'text-center', defaultContent: '-'},
          {title :'Action',data:'id', className: 'text-center', defaultContent: '-'},
        ],
        rowCallback: function(nRow, aData, dataIndex){
        
        var level;

        if(aData['level'] == 1){level = 'admin1';}else if(aData['level'] == 2){level = 'admin2';}else if(aData['level'] == 3){level = 'accoun';}else{level = 'Webmaster';}

        $('td:eq(3)',nRow).html(level);

          $('td:last-child', nRow).html(''
    				+'<a href="<?php echo e(action("AdminController@index")); ?>/'+aData['id']+'/edit" class="btn btn-xs btn-primary" style="margin:0px;"><i class="glyphicon glyphicon-edit"></i></a>'
            +'<a onclick="del('+aData['id']+');" class="btn btn-xs btn-danger" style="margin:0px;"><i class="glyphicon glyphicon-remove"></i></a>'
    			);

    }
});
});

function del(id){

	if(confirm('Are you sure confirm delete')){
			document.location = 'admin/'+id+'/del';
	}

}




</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('backend.layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>