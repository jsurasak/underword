<?php $__env->startSection('content'); ?>
		<div id="content" class="content">
			<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
				<li><a href="javascript:;">Home</a></li>
				<li class="active">Report การขาย</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">Report การขาย</h1>
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
                            <h4 class="panel-title">Report การขาย</h4>
                        </div>


                        <div class="panel-body">
                          <div class="row" style="padding: 0px 2px 0 0;">
                            <div class="col-md-6 text-left" >
                                <div class="form-inline">
                                    <div class="form-group mb-2">
                                        <label for="staticEmail2" class="sr-only">รอบ</label>
                                        <select class="form-control" name="round" id="round">
                                            <?php for($i = 1;$i<=24;$i++): ?>
                                            <option value="<?php echo e($i); ?>"  <?php echo e((($i == $round)?'selected':'')); ?> ><?php echo e($i); ?></option>
                                            <?php endfor; ?>
                                        </select>
                                    </div>
                                    <div class="form-group mx-sm-3 mb-2">
                                        <label for="inputPassword2" class="sr-only">ปี</label>
                                        <select class="form-control" name="year" id="year">
                                            <?php $__currentLoopData = $year; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $y): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($y->year); ?>" ><?php echo e(($y->year + 543)); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e(date('Y')); ?>" selected ><?php echo e((date('Y') + 543)); ?></option>
                                            <option value="<?php echo e(date('Y') + 1); ?>" ><?php echo e((date('Y') + 1 + 543)); ?></option>
                                        </select>
                                    </div>
                                    <button type="button" id="seach-btn" class="btn btn-primary mb-2">seach</button>
                                </div>
                            </div>
                            <div class="col-md-6 text-right" >
                                <a id="report" class="btn btn-primary mb-2">ออกรายงาน</a>
                            </div>
                            </div>
                            <br>
                            <input type="hidden" id="Check_iduser">
                        <div style="overflow-x:auto;">
                          <form id="formCheck">
                          <table id="data-table" class="table table-striped table-bordered ">
                          </table>
                          </form>
                        </div>
                          
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

        $('#dateSelect').datepicker({
            dateFormat:'yy-mm-dd'
        });
        $('#dateBile').datepicker({
            dateFormat:'yy-mm-dd'
        });


  		oTable = $('#data-table').DataTable({

          processing: true,
          serverSide: true,
          order:[ 2, 'asc' ],
          ajax: {
    			url: '<?php echo e(action("ReportSellController@datatablebile")); ?>',
    			data: function ( d ) {
                    d.round = $('#round').val();
                    d.year = $('#year').val();
                },
                method: 'POST'
            },
            columnDefs: [ {
            targets: 0,
            orderable: false
            } ],
          columns: [
            // {data:'id_bile', className: 'text-center', defaultContent: '-'},
            {title :'รอบบิลที่',data:'round', className: 'text-center', defaultContent: '-'},
            {title :'username',data:'username', className: 'text-center', defaultContent: '-'},
            {title :'ธนาคาร',data:'bank_name', className: 'text-center', defaultContent: '-'},
            {title :'เลขบัญชี',data:'bank_number', className: 'text-center', defaultContent: '-'},
            {title :'ชื่อเจ้าของบัญชี',data:'user_bank', className: 'text-center', defaultContent: '-'},
            {title :'รายได้สุทธิ(หลังหักค่าบริการ)',data:'total_true', className: 'text-center', defaultContent: '-'},
    
          ],
          rowCallback: function(nRow, aData, dataIndex){


            //   $('td:last-child',nRow).html('<button type="button" onclick="detail('+aData['id_s']+');" class="btn btn-sm btn-success"><i class="fa fa-file-o"></i></button>');            

      }
    });

    $('#seach-btn').click(function(){

        oTable.draw();

    });
    
});


$('#report').click(function(){

    var round = $('#round').val();
    var year = $('#year').val();

    window.location.href="<?php echo e(url('')); ?>/report_bile/"+round+"/"+year+"/report";

});







</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('backend.layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>