<?php $__env->startSection('content'); ?>
<div id="content" class="content">
	<!-- begin breadcrumb -->
	<ol class="breadcrumb pull-right">
		<li><a href="javascript:;">Home</a></li>
		<li class="active">Form <?php echo e($name->name_content); ?></li>
	</ol>
	<!-- end breadcrumb -->
	<!-- begin page-header -->
	<h1 class="page-header"><?php echo e($name->name_content); ?></h1>
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
                        <h4 class="panel-title"><?php echo e($name->name_content); ?></h4>
                    </div>

                    <div class="panel-body">
                      <div class="row">
                        <h4 class="text-center">Form <?php echo e($name->name_content); ?></h4><br>
                        <div class="col-sm-offset-2 col-sm-8 text-left">
                          <form class="form-horizontal" method="post" id="myForm" action="<?php echo e(((isset($data)?action('ContentController@edit'):action('ContentController@add')))); ?>" enctype="multipart/form-data">
														<?php echo e(csrf_field()); ?>

														<input type="hidden" class="form-control" name="type" id="type" value="<?php echo e(((isset($data))?$data->type_content:$id)); ?>">
														<input type="hidden" class="form-control" name="id" id="id" value="<?php echo e(((isset($data))?$data->id:"")); ?>">

															<div class="form-group">
																<label class="control-label col-sm-2" >วันที่ลง :</label>
																<div class="col-sm-10">
																	<input type="text" class="form-control" name="date" onchange="dayselect(this);" id="date" value="<?php echo e(((isset($data)?$data->time_set:''))); ?>">
																</div>
															</div>

															<div class="form-group">
                                <label class="control-label col-sm-2">Top Content</label>
                                <div class="col-sm-10">
                                  <input type="checkbox" class="form-control" name="Tcontent" value="1" <?php if(isset($data)): ?><?php echo e((( $data->Tcontent == 1)?'checked':'')); ?><?php endif; ?>><p style="font-size: 9px;color: red;">* สำหรับกรณีต้องการให้แสดงเป็น content หลัก ถ้ามี content ลงเวลาเดียวกัน</p>
                                </div>
                              </div>

															<div class="form-group">
                                <label class="control-label col-sm-2">Day:</label>
                                <div class="col-sm-10">
																	<select class="form-control" id="day" name="day">
																		<option value="Sun" <?php if(isset($data)): ?><?php echo e((( $data->day_content == "Sun")?'selected':'')); ?><?php endif; ?>>วันอาทิตย์</option>
																		<option value="Mon" <?php if(isset($data)): ?><?php echo e((( $data->day_content == "Mon")?'selected':'')); ?><?php endif; ?>>วันจันทร์</option>
																		<option value="Tue" <?php if(isset($data)): ?><?php echo e((( $data->day_content == "Tue")?'selected':'')); ?><?php endif; ?>>วันอังคาร</option>
																		<option value="Wed" <?php if(isset($data)): ?><?php echo e((( $data->day_content == "Wed")?'selected':'')); ?><?php endif; ?>>วันพุธ</option>
																		<option value="Thu" <?php if(isset($data)): ?><?php echo e((( $data->day_content == "Thu")?'selected':'')); ?><?php endif; ?>>วันพฤหัสบดี</option>
																		<option value="Fri" <?php if(isset($data)): ?><?php echo e((( $data->day_content == "Fri")?'selected':'')); ?><?php endif; ?>>วันศุกร์</option>
																		<option value="Sat" <?php if(isset($data)): ?><?php echo e((( $data->day_content == "Sat")?'selected':'')); ?><?php endif; ?>>วันเสาร์</option>
																	</select>
                                </div>
                              </div>

															<div class="form-group" >
                                <label class="control-label col-sm-2" >รูปภาพ A:</label>
                                <div class="col-sm-10">
                                  <input type="file" class="form-control" name="pic_A" id="picA">
                                </div>
                              </div>
															<?php if(isset($data)): ?>
															<div class="form-group" >
																<label class="control-label col-sm-2" ></label>
																<div class="col-sm-10">
																	<img id="pic_A" src="<?php echo e(url('../imgContent')); ?>/<?php echo e($data->pic_A); ?>" width="100%">
																</div>
															</div>
															<?php else: ?>
															<div class="form-group" >
																<label class="control-label col-sm-2" ></label>
																<div class="col-sm-10">
																	<img id="pic_A" width="100%">
																</div>
															</div>
															<?php endif; ?>

															<div class="form-group" >
                                <label class="control-label col-sm-2" >รูปภาพ B</label>
                                <div class="col-sm-10">
                                  <input type="file" class="form-control" name="pic_B" id="picB">
                                </div>
                              </div>
															<?php if(isset($data)): ?>
															<div class="form-group" >
																<label class="control-label col-sm-2" ></label>
																<div class="col-sm-10">
																	<img id="pic_B" src="<?php echo e(url('../imgContent')); ?>/<?php echo e($data->pic_B); ?>" width="100%">
																</div>
															</div>
															<?php else: ?>
															<div class="form-group" >
																<label class="control-label col-sm-2" ></label>
																<div class="col-sm-10">
																	<img id="pic_B" width="100%">
																</div>
															</div>
															<?php endif; ?>

															<!-- startblock1 -->

															<div class="form-group">
                                <label class="control-label col-sm-2">หัวเรื่อง A:</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" id="headerA" name="headerA" onkeyup="headC(this)" data-type="A" maxlength="70" value="<?php echo e(((isset($data))? $data->headerA:'')); ?>" >
																	<p class="text-right" id="header_numA">(<?php echo e(((isset($data))? mb_strlen($data->headerA):0)); ?>/70)</p>
                                </div>
                              </div>

															<div class="form-group">
                                <label class="control-label col-sm-2">คำนำ ตำแหน่ง A:</label>
                                <div class="col-sm-10">
                                  <textarea class="form-control"  id="previewA" name="previewA" onkeyup="preC(this);" data-type="A" rows="5" maxlength="165" ><?php echo e(((isset($data))? $data->previewA:'')); ?></textarea>
																	<p class="text-right" id="preview_numA">(<?php echo e(((isset($data))? mb_strlen($data->previewA):0)); ?>/165)</p>
																</div>
                              </div>

															<div class="form-group">
                                <label class="control-label col-sm-2">หัวเรื่อง B:</label>
                                <div class="col-sm-10">
																	<input type="text" class="form-control" id="headerB" name="headerB" onkeyup="headC(this)" data-type="B" maxlength="67" value="<?php echo e(((isset($data))? $data->headerB:'')); ?>" >
																	<p class="text-right" id="header_numB">(<?php echo e(((isset($data))? mb_strlen($data->headerB):0)); ?>/67)</p>
                                </div>
                              </div>

															<div class="form-group">
                                <label class="control-label col-sm-2">คำนำ ตำแหน่ง B:</label>
                                <div class="col-sm-10">
                                  <textarea class="form-control"  id="previewB" name="previewB" onkeyup="preC(this);" data-type="B" rows="5" maxlength="126" ><?php echo e(((isset($data))? $data->previewB:'')); ?></textarea>
																	<p class="text-right" id="preview_numB">(<?php echo e(((isset($data))? mb_strlen($data->previewB):0)); ?>/126)</p>
																</div>
                              </div>

															<div class="form-group">
                                <label class="control-label col-sm-2">หัวเรื่อง C:</label>
                                <div class="col-sm-10">
																	<input type="text" class="form-control" id="headerC" name="headerC" onkeyup="headC(this)" data-type="C" maxlength="57" value="<?php echo e(((isset($data))? $data->headerC:'')); ?>" >
																	<p class="text-right" id="header_numC">(<?php echo e(((isset($data))? mb_strlen($data->headerC):0)); ?>/57)</p>
                                </div>
                              </div>

															<div class="form-group">
                                <label class="control-label col-sm-2">คำนำ ตำแหน่ง C:</label>
                                <div class="col-sm-10">
                                  <textarea class="form-control"  id="previewC" name="previewC" onkeyup="preC(this);" data-type="C" rows="5" maxlength="166" ><?php echo e(((isset($data))? $data->previewC:'')); ?></textarea>
																	<p class="text-right" id="preview_numC">(<?php echo e(((isset($data))? mb_strlen($data->previewC):0)); ?>/166)</p>
																</div>
                              </div>

															<div class="form-group">
                                <label class="control-label col-sm-2">หัวเรื่อง C home-content:</label>
                                <div class="col-sm-10">
																	<input type="text" class="form-control" id="headerC_home" name="headerC_home" onkeyup="headC(this)" data-type="C_home" maxlength="57" value="<?php echo e(((isset($data))? $data->headerC_home:'')); ?>" >
																	<p class="text-right" id="header_numC_home">(<?php echo e(((isset($data))? mb_strlen($data->headerC_home):0)); ?>/57)</p>
                                </div>
                              </div>

															<div class="form-group">
                                <label class="control-label col-sm-2">คำนำ ตำแหน่ง C home-content:</label>
                                <div class="col-sm-10">
                                  <textarea class="form-control"  id="previewC_home" name="previewC_home" onkeyup="preC(this);" data-type="C_home" rows="5" maxlength="120" ><?php echo e(((isset($data))? $data->previewC_home:'')); ?></textarea>
																	<p class="text-right" id="preview_numC_home">(<?php echo e(((isset($data))? mb_strlen($data->previewC_home):0)); ?>/120)</p>
																</div>
                              </div>

															<div class="form-group">
                                <label class="control-label col-sm-2">หัวเรื่อง D:</label>
                                <div class="col-sm-10">
																	<input type="text" class="form-control" id="headerD" name="headerD" onkeyup="headC(this)" data-type="D" maxlength="35" value="<?php echo e(((isset($data))? $data->headerD:'')); ?>" >
																	<p class="text-right" id="header_numD">(<?php echo e(((isset($data))? mb_strlen($data->headerD):0)); ?>/35)</p>
                                </div>
                              </div>

															<div class="form-group">
                                <label class="control-label col-sm-2">คำนำ ตำแหน่ง D:</label>
                                <div class="col-sm-10">
                                  <textarea class="form-control" id="previewD" name="previewD" onkeyup="preC(this);" data-type="D" rows="5" maxlength="67"><?php echo e(((isset($data))? $data->previewD:'')); ?></textarea>
																	<p class="text-right" id="preview_numD">(<?php echo e(((isset($data))? mb_strlen($data->previewD):0)); ?>/67)</p>
																</div>
                              </div>


															<div class="form-group">
                                <label class="control-label col-sm-2">หัวเรื่อง แบบเต็ม:</label>
                                <div class="col-sm-10">
																	<input type="text" class="form-control" id="headerFull" name="headerFull" value="<?php echo e(((isset($data))? $data->headerFull:'')); ?>" >
                                </div>
                              </div>

															<div class="form-group">
																<div class="col-sm-offset-2 col-sm-10">
																	<div class="radio">
																		<label><input type="radio" name="type_showdetail" value="1"   <?php if(isset($data)): ?> <?php echo e((($data->type_showdetail == 1)?'checked':'')); ?><?php else: ?> checked  <?php endif; ?>>Picture Top</label>
																		&nbsp
																		<label><input type="radio" name="type_showdetail" value="2"   <?php if(isset($data)): ?> <?php echo e((($data->type_showdetail == 2)?'checked':'')); ?><?php endif; ?>>Detail Top</label>
																	</div>
																</div>
															</div>

															<div class="form-group">
                                <label class="control-label col-sm-2" for="pwd">Block 1:</label>
                                <div class="col-sm-10">
                                  <textarea class="ckeditor" name="detail1" id="detail1" rows="5"><?php echo e(((isset($data))?$data->detail1:'')); ?></textarea>

																</div>
                              </div>

															<div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                  <div class="radio">
                                    <label><input type="radio" name="type_media1" value="1" onclick="Media(this,1);"  <?php if(isset($data)): ?> <?php echo e((($data->type_media1 == 1)?'checked':'')); ?><?php endif; ?>>Picture</label>
                                    &nbsp
                                    <label><input type="radio" name="type_media1" value="2" onclick="Media(this,1);"  <?php if(isset($data)): ?> <?php echo e((($data->type_media1 == 2)?'checked':'')); ?><?php endif; ?>>Video</label>
                                  </div>
                                </div>
                              </div>

                              <div class="form-group" id="media1_p" <?php if(isset($data)): ?> <?php if($data->type_media1 == 2): ?> style="display:none" <?php endif; ?> <?php endif; ?>>
                                <label class="control-label col-sm-2" ></label>
                                <div class="col-sm-10">
                                  <input type="file" class="form-control" id="picblock1" name="picblock1[]" multiple>
                                </div>
                              </div>

                              <div class="form-group" id="media1_e" <?php if(isset($data)): ?> <?php if($data->type_media1 == 1): ?> style="display:none" <?php endif; ?> <?php else: ?> style="display:none"  <?php endif; ?>>
                                <label class="control-label col-sm-2" ></label>
                                <div class="col-sm-10">
                                  <textarea class="form-control" name="embed1" id="embed1" rows="2"><?php echo e(((isset($data))?$data->media1:'')); ?></textarea>

																</div>
                              </div>

															<?php if(isset($data)): ?>
																<?php if($data->type_media1 == 1): ?>
																<div class="form-group" >
																	<label class="control-label col-sm-2" ></label>
																	<div class="col-sm-10 imgblock1">
																		<?php if($data->media1): ?>
																			<?php $img = explode('|',$data->media1) ?>
																			<?php $__currentLoopData = $img; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
																			<img id="pic_B" src="<?php echo e(url('../imgContent')); ?>/<?php echo e($i); ?>" width="150px" height="150px">
																			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
																		<?php endif; ?>
																	</div>
																</div>
																<?php endif; ?>
															<?php else: ?>
															<div class="form-group" >
																<label class="control-label col-sm-2" ></label>
																<div class="col-sm-10 imgblock1">
																</div>
															</div>
															<?php endif; ?>

															<div class="form-group">
                                <label class="control-label col-sm-2" for="pwd"></label>
                                <div class="col-sm-10">
                                  <textarea class="ckeditor" name="subdetail1" rows="5"><?php echo e(((isset($data))?$data->subdetail1:'')); ?></textarea>
                                </div>
                              </div>

															<!-- endblock1 -->

															<!-- startblock2 -->


															<div class="form-group">
																<label class="control-label col-sm-2" for="pwd">Block 2:</label>
																<div class="col-sm-10">
																	<textarea class="ckeditor" name="detail2" id="detail2" rows="5"><?php echo e(((isset($data))?$data->detail2:'')); ?></textarea>

																</div>
															</div>

															<div class="form-group">
																<div class="col-sm-offset-2 col-sm-10">
																	<div class="radio">
																		<label><input type="radio" name="type_media2" value="1" onclick="Media(this,2);"  <?php if(isset($data)): ?> <?php echo e((($data->type_media2 == 1)?'checked':'')); ?><?php endif; ?>>Picture</label>
																		&nbsp
																		<label><input type="radio" name="type_media2" value="2" onclick="Media(this,2);"  <?php if(isset($data)): ?> <?php echo e((($data->type_media2 == 2)?'checked':'')); ?><?php endif; ?>>Video</label>
																	</div>
																</div>
															</div>


															<div class="form-group" id="media2_p" <?php if(isset($data)): ?> <?php if($data->type_media2 == 2): ?> style="display:none" <?php endif; ?> <?php endif; ?>>
																<label class="control-label col-sm-2" ></label>
																<div class="col-sm-10">
																	<input type="file" class="form-control" id="picblock2" name="picblock2[]" multiple>
																</div>
															</div>

															<div class="form-group" id="media2_e" <?php if(isset($data)): ?> <?php if($data->type_media2 == 1): ?> style="display:none" <?php endif; ?> <?php else: ?> style="display:none"  <?php endif; ?>>
																<label class="control-label col-sm-2" ></label>
																<div class="col-sm-10">
																	<textarea class="form-control" name="embed2" id="embed2" rows="2"><?php echo e(((isset($data))?$data->media2:'')); ?></textarea>
																</div>
															</div>

															<?php if(isset($data)): ?>
																<?php if($data->type_media2 == 1): ?>
																<div class="form-group" >
																	<label class="control-label col-sm-2" ></label>
																	<div class="col-sm-10 imgblock2">
																		<?php if($data->media2): ?>
																			<?php $img = explode('|',$data->media2) ?>
																			<?php $__currentLoopData = $img; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
																			<img id="pic_B" src="<?php echo e(url('../imgContent')); ?>/<?php echo e($i); ?>" width="150px" height="150px">
																			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
																		<?php endif; ?>
																	</div>
																</div>
																<?php endif; ?>
															<?php else: ?>
															<div class="form-group" >
																<label class="control-label col-sm-2" ></label>
																<div class="col-sm-10 imgblock2">

																</div>
															</div>
															<?php endif; ?>

															<div class="form-group">
																<label class="control-label col-sm-2" for="pwd"></label>
																<div class="col-sm-10">
																	<textarea class="ckeditor" name="subdetail2" rows="5"><?php echo e(((isset($data))?$data->subdetail2:'')); ?></textarea>
																</div>
															</div>

															<!-- endblock2 -->

															<div class="form-group">
                                <label class="control-label col-sm-2" >เรียบเรียงโดย</label>
                                <div class="col-sm-10">
																	<select class="form-control" name="w_by">
																		<option>Select ชื่อนักเขียน</option>
																		<?php $__currentLoopData = $writh; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $w): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
																		<option value="<?php echo e($w->id); ?>" <?php if(isset($data)): ?> <?php echo e((($w->id == $data->w_by)?'selected':'')); ?> <?php endif; ?> ><?php echo e($w->writher_name); ?></option>
																		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
																	</select>
                                </div>
                              </div>
															<div class="form-group">
                                <label class="control-label col-sm-2" >จำนวน ยอดวิว</label>
                                <div class="col-sm-10">
                                  <input type="text" name="view" class="form-control" value="<?php echo e(((isset($data))?$data->view:'')); ?>"/>
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                  <button type="button" class="btn btn-success" id="submitForm">Submit</button>
                                </div>
                              </div>
                            </form>
                        </div>
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
CKEDITOR.replace( 'detail1',config);
CKEDITOR.replace( 'detail2',config);
CKEDITOR.replace( 'subdetail1',config);
CKEDITOR.replace( 'subdetail2',config);


$(document).ready(function() {
		$('#date').datetimepicker({ format:'YYYY-MM-DD HH:mm:ss' });

		var imagesPreview = function(input, placeToInsertImagePreview) {

        if (input.files) {
            var filesAmount = input.files.length;

            for (i = 0; i < filesAmount; i++) {
                var reader = new FileReader();

                reader.onload = function(event) {
                    $($.parseHTML('<img>')).attr('src', event.target.result).css('width','150px').css('height','150px').appendTo(placeToInsertImagePreview);
                }

                reader.readAsDataURL(input.files[i]);
            }
        }

    };

    $('#picblock1').on('change', function() {
        imagesPreview(this, 'div.imgblock1');
    });
		$('#picblock2').on('change', function() {
        imagesPreview(this, 'div.imgblock2');
    });

});

$('#date').on('dp.change', function(e){
	var str = e.date._d;
	var day = str.toString().split(" ");
  // console.log(day);
	$('#day option[value='+day[0]+']').attr('selected', 'selected');

});




function preC(data){

	var text = data.value;
	var type = $(data).data('type');
	switch(type) {
		case 'A':
    $('#preview_num'+type).html('('+text.length+'/165)');
		break;
		case 'B':
    $('#preview_num'+type).html('('+text.length+'/126)');
		break;
		case 'C':
    $('#preview_num'+type).html('('+text.length+'/166)');
		break;
		case 'C_home':
		$('#preview_num'+type).html('('+text.length+'/120)');
		break;
		case 'D':
    $('#preview_num'+type).html('('+text.length+'/67)');
		break;
	}


}

function headC(data){
	var text = data.value;
	var type = $(data).data('type');
	switch(type) {
		case 'A':
    $('#header_num'+type).html('('+text.length+'/70)');
		break;
		case 'B':
    $('#header_num'+type).html('('+text.length+'/67)');
		break;
		case 'C':
    $('#header_num'+type).html('('+text.length+'/57)');
		break;
		case 'C_home':
		$('#header_num'+type).html('('+text.length+'/57)');
		break;
		case 'D':
    $('#header_num'+type).html('('+text.length+'/35)');
		break;
	}

}


function Media(d,id){

  var d = d.value;

  if(d == 1){
    $('#media'+id+'_p').css('display','block');
    $('#media'+id+'_e').css('display','none');
  }else{
    $('#media'+id+'_p').css('display','none');
    $('#media'+id+'_e').css('display','block');
  }

}


$("#picA").change(function(){

		if (this.files && this.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#pic_A').attr('src', e.target.result);
        }

        reader.readAsDataURL(this.files[0]);
    }

});

$("#picB").change(function(){

		if (this.files && this.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#pic_B').attr('src', e.target.result);
        }

        reader.readAsDataURL(this.files[0]);
    }

});

$('#submitForm').click(function(){
	var headerA = $('#headerA').val();
	var previewA = $('#previewA').val();
	var headerB = $('#headerB').val();
	var previewB = $('#previewB').val();
	var headerC = $('#headerC').val();
	var previewC = $('#previewC').val();
	var headerC_home = $('#headerC_home').val();
	var previewC_home = $('#previewC_home').val();
	var headerD = $('#headerD').val();
	var previewD = $('#previewD').val();
	// console.log(previewA.length);
	if(headerA.length > 70){
		alert("จำนวน character หัวเรื่อง A มีมากกว่า 70 character กรุณาลดจำนวน character ลง");
		$('#header_numA').html('('+headerA.length+'/70)');
		$('#header_numA').focus();
	}else if(previewA.length > 165){
		alert("จำนวน character คำนำ ตำแหน่ง A มีมากกว่า 165 character กรุณาลดจำนวน character ลง");
		$('#preview_numA').html('('+previewA.length+'/165)');
		$('#preview_numA').focus();
	}else if(headerB.length > 67){
		alert("จำนวน character หัวเรื่อง B มีมากกว่า 67 character กรุณาลดจำนวน character ลง");
		$('#header_numB').html('('+headerA.length+'/67)');
		$('#header_numB').focus();
	}else if(previewB.length > 126){
		alert("จำนวน character คำนำ ตำแหน่ง B มีมากกว่า 126 character กรุณาลดจำนวน character ลง");
		$('#preview_numB').html('('+previewA.length+'/126)');
		$('#preview_numB').focus();
	}else if(headerC.length > 57){
		alert("จำนวน character หัวเรื่อง C มีมากกว่า 57 character กรุณาลดจำนวน character ลง");
		$('#header_numC').html('('+headerA.length+'/57)');
		$('#header_numC').focus();
	}else if(previewC.length > 166){
		alert("จำนวน character คำนำ ตำแหน่ง C มีมากกว่า 166 character กรุณาลดจำนวน character ลง");
		$('#preview_numC').html('('+previewA.length+'/166)');
		$('#preview_numC').focus();
	}else if(headerC_home.length > 57){
		alert("จำนวน character หัวเรื่อง C home-content มีมากกว่า 57 character กรุณาลดจำนวน character ลง");
		$('#header_numC_home').html('('+headerC_home.length+'/57)');
		$('#header_numC_home').focus();
	}else if(previewC_home.length > 120){
		alert("จำนวน character คำนำ ตำแหน่ง C home-content มีมากกว่า 120 character กรุณาลดจำนวน character ลง");
		$('#preview_numC_home').html('('+previewC_home.length+'/120)');
		$('#preview_numC_home').focus();
	}else if(headerD.length > 35){
		alert("จำนวน character หัวเรื่อง D มีมากกว่า 35 character กรุณาลดจำนวน character ลง");
		$('#header_numD').html('('+headerA.length+'/35)');
		$('#header_numD').focus();
	}else if(previewD.length > 67){
		alert("จำนวน character คำนำ ตำแหน่ง D มีมากกว่า 67 character กรุณาลดจำนวน character ลง");
		$('#preview_numD').html('('+previewA.length+'/67)');
		$('#preview_numD').focus();
	}else{
		$('#myForm').submit();
	}
});


</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('backend.layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>