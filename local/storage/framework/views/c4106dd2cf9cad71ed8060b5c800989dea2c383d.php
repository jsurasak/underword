<?php $__env->startSection('content'); ?>
		<div id="content" class="content">
			<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
				<li><a href="javascript:;">Home</a></li>
				<li class="active">ฟอร์มจัดการงานเขียน</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">ฟอร์มจัดการงานเขียน</h1>
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
                            <h4 class="panel-title">ฟอร์มจัดการงานเขียน</h4>
                        </div>

                        <div class="panel-body">
                            <div class="row" style="padding: 0px 2px 0 0;">
                                <div class="col-sm-12 text-center" >
                                    <h4><?php echo e($data->name); ?></h4>
                                </div>
                            </div>
                          <form id="myform" action="<?php echo e(action('WritherManageOtherController@updateother')); ?>" method="POST" enctype="multipart/form-data" class="form-horizontal">
                              <?php echo e(csrf_field()); ?>

                            <input type="hidden" name="id" value="<?php echo e($data->id); ?>">
                            <input type="hidden" name="type" value="<?php echo e($data->type); ?>">
                            
                            <div class="form-group">
                              <label class="control-label col-sm-3" >เนื้อหา</label>
                              <div class="col-sm-8">
                                <textarea class="ckeditor" name="detail"><?php echo e($data->detail); ?></textarea>
                              </div>
                            </div>

                            <div class="form-group">
                              <label class="control-label col-sm-3" ></label>
                              <div class="col-sm-8 text-rigth">
                                <button type="submit" class="btn btn-primary">บันทึก</button>
                                <button type="button" onclick="window.history.back();" class="btn btn-warning">ย้อนกลับ</button>
                              </div>
                            </div>

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

var myToolBar = [
       { name: 'document', items : [ 'Source','-','Save','NewPage','DocProps','Preview','Print','-','Templates' ] },
       { name: 'basicstyles', items: [ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'CopyFormatting', 'RemoveFormat' ] },
       { name: 'paragraph', items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', 'CreateDiv', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-', 'BidiLtr', 'BidiRtl', 'Language' ] },
       { name: 'styles', items: [ 'Styles', 'FontSize' ] },
			 { name: 'links', items: [ 'Link', 'Unlink', 'Anchor' ] },
       { name: 'colors', items: [ 'TextColor', 'BGColor' ] },
       { name: 'tools', items: [ 'Maximize', 'ShowBlocks' ] },
       { name: 'insert', items: [ 'Image','Youtube']},
	'/',
       
];

var config = {};
config.toolbar = myToolBar;
config.allowedContent = true;
   config.extraPlugins = 'youtube,wordcount';
   config.wordcount = {
       showCharCount: true,
   };
CKEDITOR.replace('detail',config);



</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('backend.layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>