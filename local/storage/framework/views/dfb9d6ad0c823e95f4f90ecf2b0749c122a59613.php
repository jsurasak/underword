<?php $__env->startSection('content'); ?>




		<div id="content" class="content">
			<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
				<li><a href="javascript:;">Home</a></li>
				<li class="active">ข้อมูล นักเขียน</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">รายชื่อ User</h1>
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
                            <h4 class="panel-title">รายชื่อ User</h4>
                        </div>

                        <div class="panel-body">
                          <div class="row" style="padding: 0px 2px 0 0;">
            								<div class="col-sm-12 text-center" >
            									<h4>ฟอร์มจัดการข้อมูลสมาชิก</h4>
            								</div>

            							</div>
            							<br>
                          <form id="myform" action="<?php echo e(((isset($data))?action('UserController@edit'):action('UserController@add'))); ?>" class="form-horizontal" method="post" enctype="multipart/form-data">
                            <?php echo e(csrf_field()); ?>

                            <?php if(isset($data)): ?>
                            <input type="hidden" id="id" name="id" value="<?php echo e($data->id); ?>" >
                            <?php endif; ?>

                             <div class="form-group">
                              <label class="control-label col-sm-3" >User Name:</label>
                              <div class="col-sm-8">
                                <input type="text" class="form-control" name="user" id="user" value="<?php echo e(((isset($data))?$data->username:'')); ?>">
                              </div>
                            </div>

                            <?php if(!isset($data)): ?>

                            <div class="form-group">
                              <label class="control-label col-sm-3" >Password:</label>
                              <div class="col-sm-8">
                                <input type="password" class="form-control" name="password" id="password">
                              </div>
                            </div>

                            <?php endif; ?>


                            <div class="form-group">
                              <label class="control-label col-sm-3" >ชื่อ:</label>
                              <div class="col-sm-8">
                                <input type="text" class="form-control" name="f_name" id="f_name" value="<?php echo e(((isset($data))?$data->F_name:'')); ?>" >
                              </div>
                            </div>

                            <div class="form-group">
                              <label class="control-label col-sm-3" >นามสกุล:</label>
                              <div class="col-sm-8">
                                <input type="text" class="form-control" name="l_name" id="l_name" value="<?php echo e(((isset($data))?$data->L_name:'')); ?>">
                              </div>
                            </div>

                            <div class="form-group">
                              <label class="control-label col-sm-3" >Email:</label>
                              <div class="col-sm-8">
                                <input type="text" class="form-control" name="email" id="email" value="<?php echo e(((isset($data))?$data->Email:'')); ?>">
                              </div>
                            </div>

                           
              

                            <div class="form-group">
                              <label class="control-label col-sm-3" >เพศ :</label>
                              <div class="col-sm-8">
                                <input type="radio" name="sex" <?php if(isset($data)): ?> <?php echo e((($data->sex == "M")?'checked':'')); ?> <?php endif; ?> value="M"> ชาย
                                <input type="radio" name="sex" <?php if(isset($data)): ?> <?php echo e((($data->sex == "F")?'checked':'')); ?> <?php endif; ?> value="F"> หญิง
                              </div>
                            </div>

                            <div class="form-group">
                              <label class="control-label col-sm-3" >วันเกิด</label>
                              <div class="col-sm-8">
                                <input type="text" class="form-control" name="birthday" id="birthday" value="<?php echo e(((isset($data))?$data->birthday:'')); ?>">
                              </div>
                            </div>

                            <div class="form-group">
                              <label class="control-label col-sm-3" >รูปประจำตัว</label>
                              <div class="col-sm-8">
                                <input type="hidden" name="oldpicture" value="<?php echo e(((isset($data))?$data->picture:'')); ?>">
                                <input type="file" name="picture" >
                              </div>
                            </div>

                            <div class="form-group">
                              <label class="control-label col-sm-3" ></label>
                              <div class="col-sm-8">
                              <?php if(isset($data)): ?>
                                <?php if(strpos($data->picture,'https') == 0): ?>
                                <img src="<?php echo e($data->picture); ?>" width="100px" height="100px">
                                <?php else: ?>
                                <img src="<?php echo e(url('../')); ?>/<?php echo e($data->picture); ?>" width="100px" height="100px">
                                <?php endif; ?>
                              <?php endif; ?>
                              </div>
                            </div>

                            <!-- ข้อมูลส่วนนักเขียน -->

                            <div class="form-group">
                              <label class="control-label col-sm-3" ></label>
                              <div class="col-sm-8">
                                <h4>ข้อมูลส่วนนักเขียน</h4>
                              </div>
                            </div>

                            <div class="form-group">
                              <label class="control-label col-sm-3" ></label>
                              <div class="col-sm-8">
                                <input type="radio" name="status_u" <?php if(isset($data)): ?> <?php echo e((($data->status_u == "บุคคล")?'checked':'')); ?> <?php endif; ?> value="บุคคล"> บุคคล
                                <input type="radio" name="status_u" <?php if(isset($data)): ?> <?php echo e((($data->status_u == "นิติบุคคล")?'checked':'')); ?> <?php endif; ?> value="นิติบุคคล"> นิติบุคคล
                              </div>
                            </div>

                            <div class="form-group">
                              <label class="control-label col-sm-3" >นามปาก / สำนักพิมพ์</label>
                              <div class="col-sm-3">
                                <input type="text" class="form-control" name="writher_n1" value="<?php echo e(((isset($nWrith1))?$nWrith1->name:'')); ?>">
                              </div>
                              <div class="col-sm-5">
                                <input type="text" class="form-control" name="writher_statusN1" value="<?php echo e(((isset($nWrith1))?$nWrith1->detail:'')); ?>">
                              </div>
                            </div>

                            <div class="form-group">
                              <label class="control-label col-sm-3" ></label>
                              <div class="col-sm-3">
                                <input type="text" class="form-control" name="writher_n2"  value="<?php echo e(((isset($nWrith2))?$nWrith2->name:'')); ?>">
                              </div>
                              <div class="col-sm-5">
                                <input type="text" class="form-control" name="writher_statusN2"  value="<?php echo e(((isset($nWrith2))?$nWrith2->detail:'')); ?>">
                              </div>
                            </div>

                            <div class="form-group">
                              <label class="control-label col-sm-3" ></label>
                              <div class="col-sm-3">
                                <input type="text" class="form-control" name="writher_n3"  value="<?php echo e(((isset($nWrith3))?$nWrith3->name:'')); ?>">
                              </div>
                              <div class="col-sm-5">
                                <input type="text" class="form-control" name="writher_statusN3"  value="<?php echo e(((isset($nWrith3))?$nWrith3->detail:'')); ?>">
                              </div>
                            </div>

                            <div class="form-group">
                              <label class="control-label col-sm-3" >รหัสประจำตัวประชาชน</label>
                              <div class="col-sm-8">
                                <input type="text" class="form-control" name="user_code" id="user_code" value="<?php echo e(((isset($data))?$data->user_code:'')); ?>">
                              </div>
                            </div>

                            <div class="form-group">
                              <label class="control-label col-sm-3" >รูปประจำตัวประชาชน</label>
                              <div class="col-sm-8">
                              <input type="hidden" name="old_user_code_pic" value="<?php echo e(((isset($data))?$data->user_code_pic:'')); ?>">
                              <input type="file" name="user_code_pic" >
                              </div>
                            </div>

                            <div class="form-group">
                              <label class="control-label col-sm-3" ></label>
                              <div class="col-sm-8">
                              <?php if(isset($data->user_code_pic)): ?>
                                <?php if($data->user_code_pic != ""): ?>
                                <img src="<?php echo e(url('../')); ?>/<?php echo e($data->user_code_pic); ?>" width="100px" height="100px">
                                <?php endif; ?>
                              <?php endif; ?>
                              </div>
                            </div>

                            <div class="form-group">
                              <label class="control-label col-sm-3" >เบอร์โทรศัพท์มือถือ</label>
                              <div class="col-sm-8">
                                <input type="text" class="form-control" name="tel" id="tel" value="<?php echo e(((isset($data))?$data->tel:'')); ?>">
                              </div>
                            </div>

                            <div class="form-group">
                              <label class="control-label col-sm-3" >ที่อยู่ตามบัตรประชาชน</label>
                              <div class="col-sm-8">
                                <input type="text" class="form-control" name="local1" id="local1" value="<?php echo e(((isset($data))?$data->local1:'')); ?>">
                              </div>
                            </div>

                            <div class="form-group">
                              <label class="control-label col-sm-3" >เขต / อำเภอ</label>
                              <div class="col-sm-8">
                                <input type="text" class="form-control" name="local2" id="local2" value="<?php echo e(((isset($data))?$data->local2:'')); ?>">
                              </div>
                            </div>

                            <div class="form-group">
                              <label class="control-label col-sm-3" >จังหวัด</label>
                              <div class="col-sm-8">
                                 <select class="form-control" name="local3">
                                   <?php $__currentLoopData = $arr_province; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                   <option value="<?php echo e($value); ?>" <?php if(isset($data)): ?> <?php echo e((( $data->local3 == $value)?'selected':'')); ?> <?php endif; ?> ><?php echo e($value); ?></option>
                                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                 </select>
                              </div>
                            </div>

                            <div class="form-group">
                              <label class="control-label col-sm-3" >รหัสไปรษณีย์</label>
                              <div class="col-sm-8">
                                <input type="text" class="form-control" name="local_code" id="local_code" value="<?php echo e(((isset($data))?$data->local_code:'')); ?>">
                              </div>
                            </div>

                            <div class="form-group">
                              <label class="control-label col-sm-3" ></label>
                              <div class="col-sm-8">
                                <h4>ข้อมูลส่วน การขาย</h4>
                              </div>
                            </div>

                            <div class="form-group">
                              <label class="control-label col-sm-3" >ที่อยู่</label>
                              <div class="col-sm-8">
                                <input type="text" class="form-control" name="s_local1" id="s_local1" value="<?php echo e(((isset($data))?$data->s_local1:'')); ?>">
                              </div>
                            </div>

                            <div class="form-group">
                              <label class="control-label col-sm-3" >เขต / อำเภอ</label>
                              <div class="col-sm-8">
                                <input type="text" class="form-control" name="s_local2" id="s_local2" value="<?php echo e(((isset($data))?$data->s_local2:'')); ?>">
                              </div>
                            </div>

                            <div class="form-group">
                              <label class="control-label col-sm-3" >จังหวัด</label>
                              <div class="col-sm-8">
                                 <select class="form-control" name="s_local3">
                                   <?php $__currentLoopData = $arr_province; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                   <option value="<?php echo e($value); ?>"  <?php if(isset($data)): ?><?php echo e((( $data->s_local3 == $value)?'selected':'')); ?><?php endif; ?> ><?php echo e($value); ?></option>
                                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                 </select>
                              </div>
                            </div>

                            <div class="form-group">
                              <label class="control-label col-sm-3" >รหัสไปรษณีย์</label>
                              <div class="col-sm-8">
                                <input type="text" class="form-control" name="s_code" id="s_code" value="<?php echo e(((isset($data))?$data->s_code:'')); ?>">
                              </div>
                            </div>

                            <div class="form-group">
                              <label class="control-label col-sm-3" >ธนาคาร</label>
                              <div class="col-sm-8">
                                 <select class="form-control" name="bank_name">
                                   <option value="ธนาคารกสิกรไทย" <?php if(isset($data)): ?> <?php echo e((( $data->bank_name  == "ธนาคารกสิกรไทย") ? 'selected' : '')); ?> <?php endif; ?> >ธนาคารกสิกรไทย</option>
                                  <option value="ธนาคารกรุงเทพ" <?php if(isset($data)): ?> <?php echo e((( $data->bank_name  == "ธนาคารกรุงเทพ") ? 'selected' : '')); ?> <?php endif; ?> >ธนาคารกรุงเทพ</option>
                                  <option value="ธนาคารกรุงไทย" <?php if(isset($data)): ?> <?php echo e((( $data->bank_name  == "ธนาคารกรุงไทย") ? 'selected' : '')); ?> <?php endif; ?> >ธนาคารกรุงไทย</option>
                                  <option value="ธนาคารไทยพาณิชย์" <?php if(isset($data)): ?> <?php echo e((( $data->bank_name  == "ธนาคารไทยพาณิชย์") ? 'selected' : '')); ?> <?php endif; ?> >ธนาคารไทยพาณิชย์</option>
                                  <option value="ธนาคารออมสิน" <?php if(isset($data)): ?> <?php echo e((( $data->bank_name  == "ธนาคารออมสิน") ? 'selected' : '')); ?> <?php endif; ?> >ธนาคารออมสิน</option>
                                  <option value="ธนาคารกรุงศรีอยุธยา" <?php if(isset($data)): ?> <?php echo e((( $data->bank_name  == "ธนาคารกรุงศรีอยุธยา") ? 'selected' : '')); ?> <?php endif; ?> >ธนาคารกรุงศรีอยุธยา</option>
                                  <option value="ธนาคารทหารไทย" <?php if(isset($data)): ?> <?php echo e((( $data->bank_name  == "ธนาคารทหารไทย") ? 'selected' : '')); ?> <?php endif; ?> >ธนาคารทหารไทย</option>
                                 </select>
                              </div>
                            </div>

                            <div class="form-group">
                              <label class="control-label col-sm-3" >หมายเลขบัญชี</label>
                              <div class="col-sm-8">
                                <input type="text" class="form-control" name="bank_number" id="bank_number" value="<?php echo e(((isset($data))?$data->bank_number:'')); ?>">
                              </div>
                            </div>

                            <div class="form-group">
                              <label class="control-label col-sm-3" >ชื่อบัญชี</label>
                              <div class="col-sm-8">
                                <input type="text" class="form-control" name="user_bank" id="user_bank" value="<?php echo e(((isset($data))?$data->user_bank:'')); ?>">
                              </div>
                            </div>


                            <div class="form-group">
                              <label class="control-label col-sm-3" ></label>
                              <div class="col-sm-8">
                                <input type="radio" onchange="bank_T(this);" name="bank_type" <?php if(isset($data)): ?> <?php echo e((($data->bank_type == "ออมทรัพย์")?'checked':'')); ?> <?php endif; ?> value="ออมทรัพย์"> ออมทรัพย์ / สะสมทรัพย์
                                <input type="radio" onchange="bank_T(this);" name="bank_type" <?php if(isset($data)): ?> <?php echo e((($data->bank_type == "กระแสรายวัน")?'checked':'')); ?> <?php endif; ?> value="กระแสรายวัน"> กระแสรายวัน
                                <input type="radio" onchange="bank_T(this);" name="bank_type" <?php if(isset($data)): ?> <?php echo e((($data->bank_type == "ประจำ")?'checked':'')); ?> <?php endif; ?> value="ประจำ"> ประจำ
                                <input type="radio" onchange="bank_T(this);" name="bank_type" <?php if(isset($data)): ?> <?php echo e((($data->bank_type == "0")?'checked':'')); ?> <?php endif; ?> value="0"> อื่นๆ
                                <input type="text" id="other" name="other" <?php if(isset($data)): ?> <?php echo e((($data->bank_type != "0")?'readonly':'')); ?> <?php else: ?> readonly <?php endif; ?> value="<?php echo e(((isset($data))?$data->other:'')); ?>">
                                                                          
                              </div>
                            </div>

                            <div class="form-group">
                              <label class="control-label col-sm-3" >สาขา</label>
                              <div class="col-sm-8">
                                <input type="text" class="form-control" name="bank_branch" id="bank_branch" value="<?php echo e(((isset($data))?$data->bank_branch:'')); ?>">
                              </div>
                            </div>

                            <div class="form-group">
                              <label class="control-label col-sm-3" >จังหวัด</label>
                              <div class="col-sm-8">
                                 <select class="form-control" name="bank_local">
                                   <?php $__currentLoopData = $arr_province; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                   <option value="<?php echo e($value); ?>" <?php if(isset($data)): ?> <?php echo e((( $data->bank_local == $value)?'selected':'')); ?> <?php endif; ?> ><?php echo e($value); ?></option>
                                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                 </select>
                              </div>
                            </div>

                            <div class="form-group">
                              <label class="control-label col-sm-3" >รูปสมุดบัญชี</label>
                              <div class="col-sm-8">
                              <input type="hidden" name="old_bank_file" value="<?php echo e(((isset($data))?$data->bank_file:'')); ?>">
                              <input type="file" name="bank_file" >
                              </div>
                            </div>

                            <div class="form-group">
                              <label class="control-label col-sm-3" ></label>
                              <div class="col-sm-8">
                              <?php if(isset($data->bank_file)): ?>
                                <?php if($data->bank_file != ""): ?>
                                <img src="<?php echo e(url('../')); ?>/<?php echo e($data->bank_file); ?>" width="100px" height="100px">
                                <?php endif; ?>
                              <?php endif; ?>
                              </div>
                            </div>

                            

                            <div class="form-group">
                              <label class="control-label col-sm-3" ></label>
                              <div class="col-sm-8 text-rigth">
                                <button type="submit" class="btn btn-primary">บันทึก</button>
                                <button type="button" class="btn btn-warning">ย้อนกลับ</button>
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

function bank_T(d){

  var data = d.value;
  if(data == 0){
    $('#other').removeAttr('readonly');
  }else{
    $('#other').attr('readonly','true');
  }


}



$('#birthday').datepicker({ dateFormat: 'yy-mm-dd' });

</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('backend.layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>