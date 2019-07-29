<?php $__env->startSection('content'); ?>
		<div id="content" class="content">
			<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
				<li><a href="javascript:;">Home</a></li>
				<li class="active">Content</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">Top5 Content</h1>
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
                            <h4 class="panel-title">Top 5 View Content</h4>
                        </div>

                        <div class="panel-body">
                          <div class="row" style="padding: 0px 2px 0 0;">
            								<div class="col-md-6 text-left" >
            									<div class="pull-left w210">
                                <?php if($top5V->status == 0): ?>
                                <a id="topV" data-status="1" class="btn btn-sm btn-success" onclick="topstatus(this,2);">Open SetContent Top View</a>
                                <?php else: ?>
                                <a id="topV" data-status="0" class="btn btn-sm btn-warning" onclick="topstatus(this,2);">Close SetContent Top View</a>
                                <?php endif; ?>
            									</div>
            								</div>
            								<div class="col-md-6 text-right" >
            									<a class="btn btn-sm btn-success">Set Content Top View</a>
            								</div>
            							</div>
            							<br>
                          <form id="vCheck">
                          <input type="hidden" name="type" value="2">
                          <table id="data-table_Top5v" class="table table-striped table-bordered"></table>
                          </form>
                        </div>



                    </div>
                    <!-- end panel -->
                </div>
                <!-- end col-12 -->
            </div>
            <!-- end row -->
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
                                  <h4 class="panel-title">Top 5 Content</h4>
                              </div>

                              <div class="panel-body">
                                <div class="row" style="padding: 0px 2px 0 0;">
                  								<div class="col-md-6 text-left" >
                  									<div class="pull-left w210">
                                      <?php if($top5C->status == 0): ?>
                                      <a id="top5" data-status="1" class="btn btn-sm btn-success" onclick="topstatus(this,1);">Open SetContent Top 5</a>
                                      <?php else: ?>
                                      <a id="top5" data-status="0" class="btn btn-sm btn-warning" onclick="topstatus(this,1);">Close SetContent Top 5</a>
                                      <?php endif; ?>
                  									</div>
                  								</div>
                  								<div class="col-md-6 text-right" >
                  									<a class="btn btn-sm btn-success">Set Content Top 5</a>
                  								</div>
                  							</div>
                  							<br>
                                <form id="tCheck">
                                <input type="hidden" name="type" value="1">
                                <table id="data-table_Top5c" class="table table-striped table-bordered"></table>
                                </form>
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
  		oTablev = $('#data-table_Top5v').DataTable({
          bSort: false,
          processing: true,
          serverSide: true,
          ajax: {
    			url: '<?php echo e(action("SetcontentController@datatableTopView")); ?>',
    			data: function ( d ) {},
                method: 'POST'
            },
          columns: [
            {title :'ID',data:'id', className: 'text-center', defaultContent: '-'},
            {title :'Header',data:'headerA', className: 'text-center', defaultContent: '-'},
            {title :'View',data:'view', className: 'text-center', defaultContent: '-'},
          ],
          rowCallback: function(nRow, aData, dataIndex){

            if(aData['Top5View'] == 1){
              $('td:eq(0)',nRow).html('<input type="checkbox" name="topview[]" value="'+aData['id']+'" onclick="Check(2);" checked>');
            }else{
              $('td:eq(0)',nRow).html('<input type="checkbox" name="topview[]" value="'+aData['id']+'" onclick="Check(2);" >');
            }

      }
    });

    oTablec = $('#data-table_Top5c').DataTable({
        bSort: false,
        processing: true,
        serverSide: true,
        ajax: {
        url: '<?php echo e(action("SetcontentController@datatableTop5Content")); ?>',
        data: function ( d ) {},
              method: 'POST'
          },
        columns: [
          {title :'ID',data:'id', className: 'text-center', defaultContent: '-'},
          {title :'Header',data:'headerA', className: 'text-center', defaultContent: '-'},
          {title :'View',data:'view', className: 'text-center', defaultContent: '-'},
        ],
        rowCallback: function(nRow, aData, dataIndex){
          if(aData['Top5Content'] == 1){
            $('td:eq(0)',nRow).html('<input type="checkbox" name="topCom[]" value="'+aData['id']+'" onclick="Check(1);" checked>');
          }else{
            $('td:eq(0)',nRow).html('<input type="checkbox" name="topCom[]" value="'+aData['id']+'" onclick="Check(1);" >');
          }
    }
  });
});

function topstatus(sT,id){

    var status = $(sT).data('status');

      $.ajax('<?php echo e(action("SetcontentController@UpdateStatus")); ?>', {
          type: 'POST',
          data:{'status':status,'id':id},
          dataType: 'json',
          success: function(data) {

          location.reload();

          }
      });
}

function Check(type){
  if(type == 2){
    var myform = $('#vCheck').serializeArray();
  }else{
    var myform = $('#tCheck').serializeArray();
  }

  var count = (myform.length)-2;
  if(count > 5){
    swal({
        title: "Warning!!!",
        text: "ไม่สามารถเลือกได้เกิน 5 content",
        icon: "warning",
      });
    oTablev.draw();
  }else{

    $.ajax('<?php echo e(action("SetcontentController@UpdateCheckStatus")); ?>', {
        type: 'POST',
        data:myform,
        dataType: 'json',
        success: function(data) {
          oTablev.draw();
        }
    });



  }

}




</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('backend.layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>