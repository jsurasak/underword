<?php $__env->startSection('content'); ?>
		<div id="content" class="content">
			<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
				<li><a href="javascript:;">Home</a></li>
				<li class="active">โฆษณา</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">โฆษณา</h1>
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
                            <h4 class="panel-title">โฆษณา</h4>
                        </div>

                        <div class="panel-body">
                          <div class="row" style="padding: 0px 2px 0 0;">
                                <div class="col-sm-12 text-center" >
                                    <h4>ฟอร์มจัดการโฆษณา ตำแหน่ง <?php echo e($data->name); ?></h4>
                                </div>

                         </div>
                            <br>
                            <form id="myform" action="<?php echo e(action('AdvertisingController@update')); ?>" class="form-horizontal" method="post" enctype="multipart/form-data">
                            <?php echo e(csrf_field()); ?>

                            <input type="hidden" id="id" name="id" value="<?php echo e($data->id); ?>" >
                            <input type="hidden" id="type" name="type" value="<?php echo e($data->type); ?>" >
                            

                            <?php if($data->type == 1): ?>
                            <div class="form-group">
                            <label class="control-label col-sm-3" >Url Picture 1</label>
                              <div class="col-sm-8">
                                <input type="text" class="form-control" name="url_1"  value="<?php echo e($data->url_1); ?>">
                              </div>
                            </div>

                            <div class="form-group">
                            <label class="control-label col-sm-3" >ประเภทการแสดง</label>
                              <div class="col-sm-2">
                                <input class="form-check-input" type="radio" id="type_show_1" onclick="typeShow(this,1)" name="type_show_1" <?php echo e((($data->type_show_1 == 0)?'checked':'')); ?> value="0"> กำหนดเอง
                              </div>
                              <div class="col-sm-2">
                                <input class="form-check-input" type="radio" id="type_show_1" onclick="typeShow(this,1)" name="type_show_1"  <?php echo e((($data->type_show_1 == 1)?'checked':'')); ?> value="1"> นับจำนวนครั้ง
                              </div>
                              <div class="col-sm-2">
                                <input type="text" class="form-control" id="count_show_1" name="count_show_1" <?php echo e((($data->type_show_1 == 0)?'readonly':'')); ?> value="<?php echo e($data->count_show_1); ?>">
                              </div>
                            </div>

                            <div class="form-group">
                            <label class="control-label col-sm-3" >Picture 1</label>
                              <div class="col-sm-8">
                                <input type="file" class="form-control" name="img_1" id="inputfileimg_1">
                                <input type="hidden" id="oldpic" name="oldpic_1" value="<?php echo e($data->img_1); ?>" >
                              </div>
                            </div>
                            <div class="form-group">
                            <label class="control-label col-sm-3" ></label>
                              <div class="col-sm-8" id="preview_1">
                                  <?php if($data->img_1): ?>
                                  <button class="btn btn-danger" type="button" onclick="delpic(this);" data-id="<?php echo e($data->id); ?>" data-name="<?php echo e($data->img_1); ?>" data-rows="1" style="position:  absolute;"><i class="glyphicon glyphicon-remove"></i></button>
                                  <img src="<?php echo e(url('../')); ?>/<?php echo e($data->img_1); ?>" width="100%" height="200px">
                                  <?php endif; ?>
                              </div>
                            </div>

                            <div class="form-group">
                            <label class="control-label col-sm-3" >Url Picture 2</label>
                              <div class="col-sm-8">
                                <input type="text" class="form-control" name="url_2"  value="<?php echo e($data->url_2); ?>">
                              </div>
                            </div>

                            <div class="form-group">
                            <label class="control-label col-sm-3" >ประเภทการแสดง</label>
                              <div class="col-sm-2">
                                <input class="form-check-input" type="radio" id="type_show_2" onclick="typeShow(this,2)" name="type_show_2" <?php echo e((($data->type_show_2 == 0)?'checked':'')); ?> value="0"> กำหนดเอง
                              </div>
                              <div class="col-sm-2">
                                <input class="form-check-input" type="radio" id="type_show_2" onclick="typeShow(this,2)" name="type_show_2" <?php echo e((($data->type_show_2 == 1)?'checked':'')); ?> value="1"> นับจำนวนครั้ง
                              </div>
                              <div class="col-sm-2">
                                <input type="text" class="form-control" id="count_show_2" name="count_show_2" <?php echo e((($data->type_show_2 == 0)?'readonly':'')); ?> value="<?php echo e($data->count_show_2); ?>">
                              </div>
                            </div>

                            <div class="form-group">
                            <label class="control-label col-sm-3" >Picture 2</label>
                              <div class="col-sm-8">
                                <input type="file" class="form-control" name="img_2" id="inputfileimg_2">
                                <input type="hidden" id="oldpic" name="oldpic_2" value="<?php echo e($data->img_2); ?>" >
                              </div>
                            </div>
                            <div class="form-group">
                            <label class="control-label col-sm-3" ></label>
                              <div class="col-sm-8" id="preview_2">
                                  <?php if($data->img_2): ?>
                                  <button class="btn btn-danger" type="button" onclick="delpic(this);" data-id="<?php echo e($data->id); ?>" data-rows="2" data-name="<?php echo e($data->img_2); ?>" style="position:  absolute;"><i class="glyphicon glyphicon-remove"></i></button>
                                  <img src="<?php echo e(url('../')); ?>/<?php echo e($data->img_2); ?>" width="100%" height="200px">
                                  <?php endif; ?>
                              </div>
                            </div>

                            <div class="form-group">
                            <label class="control-label col-sm-3" >Url Picture 3</label>
                              <div class="col-sm-8">
                                <input type="text" class="form-control" name="url_3"  value="<?php echo e($data->url_3); ?>">
                              </div>
                            </div>

                            <div class="form-group">
                            <label class="control-label col-sm-3" >ประเภทการแสดง</label>
                              <div class="col-sm-2">
                                <input class="form-check-input" type="radio" id="type_show_3" onclick="typeShow(this,3)" name="type_show_3" <?php echo e((($data->type_show_3 == 0)?'checked':'')); ?> value="0"> กำหนดเอง
                              </div>
                              <div class="col-sm-2">
                                <input class="form-check-input" type="radio" id="type_show_3" onclick="typeShow(this,3)" name="type_show_3" <?php echo e((($data->type_show_3 == 1)?'checked':'')); ?> value="1"> นับจำนวนครั้ง
                              </div>
                              <div class="col-sm-2">
                                <input type="text" class="form-control" id="count_show_3" name="count_show_3" <?php echo e((($data->type_show_3 == 0)?'readonly':'')); ?> value="<?php echo e($data->count_show_3); ?>">
                              </div>
                            </div>

                            <div class="form-group">
                            <label class="control-label col-sm-3" >Picture 3</label>
                              <div class="col-sm-8">
                                <input type="file" class="form-control" name="img_3" id="inputfileimg_3">
                                <input type="hidden" id="oldpic" name="oldpic_3" value="<?php echo e($data->img_3); ?>" >
                              </div>
                            </div>
                            <div class="form-group">
                            <label class="control-label col-sm-3" ></label>
                              <div class="col-sm-8" id="preview_3">
                                  <?php if($data->img_3): ?>
                                  <button class="btn btn-danger" type="button" onclick="delpic(this);" data-id="<?php echo e($data->id); ?>" data-rows="3" data-name="<?php echo e($data->img_3); ?>" style="position:  absolute;"><i class="glyphicon glyphicon-remove"></i></button>
                                  <img src="<?php echo e(url('../')); ?>/<?php echo e($data->img_3); ?>" width="100%" height="200px">
                                  <?php endif; ?>
                              </div>
                            </div>
                            <div class="form-group">
                            <label class="control-label col-sm-3" >Url Picture 4</label>
                              <div class="col-sm-8">
                                <input type="text" class="form-control" name="url_4"  value="<?php echo e($data->url_4); ?>">
                              </div>
                            </div>

                            <div class="form-group">
                            <label class="control-label col-sm-3" >ประเภทการแสดง</label>
                              <div class="col-sm-2">
                                <input class="form-check-input" type="radio" id="type_show_4" onclick="typeShow(this,4)" name="type_show_4" <?php echo e((($data->type_show_4 == 0)?'checked':'')); ?> value="0"> กำหนดเอง
                              </div>
                              <div class="col-sm-2">
                                <input class="form-check-input" type="radio" id="type_show_4" onclick="typeShow(this,4)" name="type_show_4" <?php echo e((($data->type_show_4 == 1)?'checked':'')); ?> value="1"> นับจำนวนครั้ง
                              </div>
                              <div class="col-sm-2">
                                <input type="text" class="form-control" id="count_show_4" name="count_show_4" <?php echo e((($data->type_show_4 == 0)?'readonly':'')); ?> value="<?php echo e($data->count_show_4); ?>">
                              </div>
                            </div>


                            <div class="form-group">
                            <label class="control-label col-sm-3" >Picture 4</label>
                              <div class="col-sm-8">
                                <input type="file" class="form-control" name="img_4" id="inputfileimg_4">
                                <input type="hidden" id="oldpic" name="oldpic_4" value="<?php echo e($data->img_4); ?>" >
                              </div>
                            </div>
                            <div class="form-group">
                            <label class="control-label col-sm-3" ></label>
                              <div class="col-sm-8" id="preview_4">
                                  <?php if($data->img_4): ?>
                                  <button class="btn btn-danger" type="button" onclick="delpic(this);" data-id="<?php echo e($data->id); ?>" data-rows="4" data-name="<?php echo e($data->img_4); ?>" style="position:  absolute;"><i class="glyphicon glyphicon-remove"></i></button>
                                  <img src="<?php echo e(url('../')); ?>/<?php echo e($data->img_4); ?>" width="100%" height="200px">
                                  <?php endif; ?>
                              </div>
                            </div>
                            <div class="form-group">
                            <label class="control-label col-sm-3" >Url Picture 5</label>
                              <div class="col-sm-8">
                                <input type="text" class="form-control" name="url_5"  value="<?php echo e($data->url_5); ?>">
                              </div>
                            </div>

                            <div class="form-group">
                            <label class="control-label col-sm-3" >ประเภทการแสดง</label>
                              <div class="col-sm-2">
                                <input class="form-check-input" type="radio" id="type_show_5" onclick="typeShow(this,5)" name="type_show_5" <?php echo e((($data->type_show_5 == 0)?'checked':'')); ?> value="0"> กำหนดเอง
                              </div>
                              <div class="col-sm-2">
                                <input class="form-check-input" type="radio" id="type_show_5" onclick="typeShow(this,5)" name="type_show_5" <?php echo e((($data->type_show_5 == 1)?'checked':'')); ?> value="1"> นับจำนวนครั้ง
                              </div>
                              <div class="col-sm-2">
                                <input type="text" class="form-control" id="count_show_5" name="count_show_5" <?php echo e((($data->type_show_5 == 0)?'readonly':'')); ?> value="<?php echo e($data->count_show_5); ?>">
                              </div>
                            </div>


                            <div class="form-group">
                            <label class="control-label col-sm-3" >Picture 5</label>
                              <div class="col-sm-8">
                                <input type="file" class="form-control" name="img_5" id="inputfileimg_5">
                                <input type="hidden" id="oldpic" name="oldpic_5" value="<?php echo e($data->img_5); ?>" >
                              </div>
                            </div>
                            <div class="form-group">
                            <label class="control-label col-sm-3" ></label>
                              <div class="col-sm-8" id="preview_5">
                                  <?php if($data->img_5): ?>
                                  <button class="btn btn-danger" type="button" onclick="delpic(this);" data-id="<?php echo e($data->id); ?>" data-rows="5" data-name="<?php echo e($data->img_5); ?>" style="position:  absolute;"><i class="glyphicon glyphicon-remove"></i></button>
                                  <img src="<?php echo e(url('../')); ?>/<?php echo e($data->img_5); ?>" width="100%" height="200px">
                                  <?php endif; ?>
                              </div>
                            </div>


                            <div class="form-group">
                            <label class="control-label col-sm-3" >Url Picture 6</label>
                              <div class="col-sm-8">
                                <input type="text" class="form-control" name="url_6"  value="<?php echo e($data->url_6); ?>">
                              </div>
                            </div>

                            <div class="form-group">
                            <label class="control-label col-sm-3" >ประเภทการแสดง</label>
                              <div class="col-sm-2">
                                <input class="form-check-input" type="radio" id="type_show_6" onclick="typeShow(this,6)" name="type_show_6" <?php echo e((($data->type_show_6 == 0)?'checked':'')); ?> value="0"> กำหนดเอง
                              </div>
                              <div class="col-sm-2">
                                <input class="form-check-input" type="radio" id="type_show_6" onclick="typeShow(this,6)" name="type_show_6" <?php echo e((($data->type_show_6 == 1)?'checked':'')); ?> value="1"> นับจำนวนครั้ง
                              </div>
                              <div class="col-sm-2">
                                <input type="text" class="form-control" id="count_show_6" name="count_show_6" <?php echo e((($data->type_show_6 == 0)?'readonly':'')); ?> value="<?php echo e($data->count_show_6); ?>">
                              </div>
                            </div>


                            <div class="form-group">
                            <label class="control-label col-sm-3" >Picture 6</label>
                              <div class="col-sm-8">
                                <input type="file" class="form-control" name="img_6" id="inputfileimg_6">
                                <input type="hidden" id="oldpic" name="oldpic_6" value="<?php echo e($data->img_6); ?>" >
                              </div>
                            </div>
                            <div class="form-group">
                            <label class="control-label col-sm-3" ></label>
                              <div class="col-sm-8" id="preview_6">
                                  <?php if($data->img_6): ?>
                                  <button class="btn btn-danger" type="button" onclick="delpic(this);" data-id="<?php echo e($data->id); ?>" data-rows="6" data-name="<?php echo e($data->img_6); ?>" style="position:  absolute;"><i class="glyphicon glyphicon-remove"></i></button>
                                  <img src="<?php echo e(url('../')); ?>/<?php echo e($data->img_6); ?>" width="100%" height="200px">
                                  <?php endif; ?>
                              </div>
                            </div>

                            <div class="form-group">
                            <label class="control-label col-sm-3" >Url Picture 7</label>
                              <div class="col-sm-8">
                                <input type="text" class="form-control" name="url_7"  value="<?php echo e($data->url_7); ?>">
                              </div>
                            </div>

                            <div class="form-group">
                            <label class="control-label col-sm-3" >ประเภทการแสดง</label>
                              <div class="col-sm-2">
                                <input class="form-check-input" type="radio" id="type_show_7" onclick="typeShow(this,7)" name="type_show_7" <?php echo e((($data->type_show_7 == 0)?'checked':'')); ?> value="0"> กำหนดเอง
                              </div>
                              <div class="col-sm-2">
                                <input class="form-check-input" type="radio" id="type_show_7" onclick="typeShow(this,7)" name="type_show_7" <?php echo e((($data->type_show_7 == 1)?'checked':'')); ?> value="1"> นับจำนวนครั้ง
                              </div>
                              <div class="col-sm-2">
                                <input type="text" class="form-control" id="count_show_7" name="count_show_7" <?php echo e((($data->type_show_7 == 0)?'readonly':'')); ?> value="<?php echo e($data->count_show_7); ?>">
                              </div>
                            </div>



                            <div class="form-group">
                            <label class="control-label col-sm-3" >Picture 7</label>
                              <div class="col-sm-8">
                                <input type="file" class="form-control" name="img_7" id="inputfileimg_7">
                                <input type="hidden" id="oldpic" name="oldpic_7" value="<?php echo e($data->img_7); ?>" >
                              </div>
                            </div>
                            <div class="form-group">
                            <label class="control-label col-sm-3" ></label>
                              <div class="col-sm-8" id="preview_7">
                                  <?php if($data->img_7): ?>
                                  <button class="btn btn-danger" type="button" onclick="delpic(this);" data-id="<?php echo e($data->id); ?>" data-rows="7" data-name="<?php echo e($data->img_7); ?>" style="position:  absolute;"><i class="glyphicon glyphicon-remove"></i></button>
                                  <img src="<?php echo e(url('../')); ?>/<?php echo e($data->img_7); ?>" width="100%" height="200px">
                                  <?php endif; ?>
                              </div>
                            </div>

                            <div class="form-group">
                            <label class="control-label col-sm-3" >Url Picture 8</label>
                              <div class="col-sm-8">
                                <input type="text" class="form-control" name="url_8"  value="<?php echo e($data->url_8); ?>">
                              </div>
                            </div>

                            <div class="form-group">
                            <label class="control-label col-sm-3" >ประเภทการแสดง</label>
                              <div class="col-sm-2">
                                <input class="form-check-input" type="radio" id="type_show_8" onclick="typeShow(this,8)" name="type_show_8" <?php echo e((($data->type_show_8 == 0)?'checked':'')); ?> value="0"> กำหนดเอง
                              </div>
                              <div class="col-sm-2">
                                <input class="form-check-input" type="radio" id="type_show_8" onclick="typeShow(this,8)" name="type_show_8" <?php echo e((($data->type_show_8 == 1)?'checked':'')); ?> value="1"> นับจำนวนครั้ง
                              </div>
                              <div class="col-sm-2">
                                <input type="text" class="form-control" id="count_show_8"  name="count_show_8" <?php echo e((($data->type_show_8 == 0)?'readonly':'')); ?> value="<?php echo e($data->count_show_8); ?>">
                              </div>
                            </div>



                            <div class="form-group">
                            <label class="control-label col-sm-3" >Picture 8</label>
                              <div class="col-sm-8">
                                <input type="file" class="form-control" name="img_8" id="inputfileimg_8">
                                <input type="hidden" id="oldpic" name="oldpic_8" value="<?php echo e($data->img_8); ?>" >
                              </div>
                            </div>
                            <div class="form-group">
                            <label class="control-label col-sm-3" ></label>
                              <div class="col-sm-8" id="preview_8">
                                  <?php if($data->img_8): ?>
                                  <button class="btn btn-danger" type="button" onclick="delpic(this);" data-id="<?php echo e($data->id); ?>" data-rows="8" data-name="<?php echo e($data->img_8); ?>" style="position:  absolute;"><i class="glyphicon glyphicon-remove"></i></button>
                                  <img src="<?php echo e(url('../')); ?>/<?php echo e($data->img_8); ?>" width="100%" height="200px">
                                  <?php endif; ?>
                              </div>
                            </div>
                            
                            <?php elseif($data->type == 2): ?>

                            <div class="form-group">
                            <label class="control-label col-sm-3" >การทำงาน</label>
                              <div class="col-sm-2">
                                <input class="form-check-input" type="radio"  name="active" <?php echo e((($data->active == 0)?'checked':'')); ?> value="0"> แสดง
                              </div>
                              <div class="col-sm-2">
                                <input class="form-check-input" type="radio"  name="active" <?php echo e((($data->active == 1)?'checked':'')); ?> value="1"> ไม่แสดง
                              </div>
                            </div>  

                          <div class="form-group">
                            <label class="control-label col-sm-3" >ประเภท โฆษณา</label>
                              <div class="col-sm-2">
                                <input class="form-check-input" type="radio" id="type_select" onclick="typeSelect(this)" name="type_select" <?php echo e((($data->type_select == 0)?'checked':'')); ?> value="0"> Picture
                              </div>
                              <div class="col-sm-2">
                                <input class="form-check-input" type="radio" id="type_select" onclick="typeSelect(this)" name="type_select" <?php echo e((($data->type_select == 1)?'checked':'')); ?> value="1"> vdo
                              </div>
                            </div>

                            <div id="lighBox_img" style="display:<?php echo e((($data->type_select == 0) ? 'block' : 'none')); ?>">

                            <div class="form-group">
                            <label class="control-label col-sm-3" >Url Picture </label>
                              <div class="col-sm-8">
                                <input type="text" class="form-control" name="url"  value="<?php echo e($data->url); ?>">
                              </div>
                            </div>

                            <!-- <div class="form-group">
                            <label class="control-label col-sm-3" >ประเภทการแสดง</label>
                              <div class="col-sm-2">
                                <input class="form-check-input" type="radio" id="type_show" onclick="typeShow(this,0)" name="type_show" <?php echo e((($data->type_show == 0)?'checked':'')); ?> value="0"> กำหนดเอง
                              </div>
                              <div class="col-sm-2">
                                <input class="form-check-input" type="radio" id="type_show" onclick="typeShow(this,0)" name="type_show" <?php echo e((($data->type_show == 1)?'checked':'')); ?> value="1"> นับจำนวนครั้ง
                              </div>
                              <div class="col-sm-2">
                                <input type="text" class="form-control" id="count_show" name="count_show" <?php echo e((($data->type_show == 0)?'readonly':'')); ?> value="<?php echo e($data->count_show); ?>">
                              </div>
                            </div> -->


                            <div class="form-group">
                            <label class="control-label col-sm-3" >Picture</label>
                              <div class="col-sm-8">
                                <input type="file" class="form-control" name="img" onchange="inputfileimg(0);" id="inputfileimg">
                              </div>
                            </div>
                            <input type="hidden" id="oldpic" name="oldpic" value="<?php echo e($data->img); ?>" >
                            <div class="form-group">
                            <label class="control-label col-sm-3" ></label>
                              <div class="col-sm-8" id="preview">
                                  <?php if($data->img): ?>
                                  <img src="<?php echo e(url('../')); ?>/<?php echo e($data->img); ?>" width="100%" height="200px">
                                  <?php endif; ?>
                              </div>
                            </div>

                            </div>

                            <div id="lighBox_youtube" style="display:<?php echo e((($data->type_select == 1)?'block':'none')); ?>" >

                            <div class="form-group">
                            <label class="control-label col-sm-3" >File VDO</label>
                              <div class="col-sm-8">
                                <input type="file" class="form-control" name="vdo" accept="video/mp4,video/x-m4v,video/*">
                                <input type="hidden" class="form-control" name="old_vdo" value="<?php echo e($data->video); ?>">
                              </div>
                            </div>
                            <div class="form-group">
                            <label class="control-label col-sm-3" ></label>
                              <div class="col-sm-8" id="preview">
                                  <?php if($data->video): ?>
                                  <video width="100%" height="200px" controls>
                                      <source src="<?php echo e(url('../')); ?>/<?php echo e($data->video); ?>" type="video/mp4" >
                                  </video>
                                  <?php endif; ?>
                              </div>
                            </div>

                            </div>

                            <?php else: ?>

                            <div class="form-group">
                            <label class="control-label col-sm-3" >Url Picture </label>
                              <div class="col-sm-8">
                                <input type="text" class="form-control" name="url"  value="<?php echo e($data->url); ?>">
                              </div>
                            </div>

                            <div class="form-group">
                            <label class="control-label col-sm-3" >ประเภทการแสดง</label>
                              <div class="col-sm-2">
                                <input class="form-check-input" type="radio" id="type_show" onclick="typeShow(this,0)" name="type_show" <?php echo e((($data->type_show == 0)?'checked':'')); ?> value="0">กำหนดเอง
                              </div>
                              <div class="col-sm-2">
                                <input class="form-check-input" type="radio" id="type_show" onclick="typeShow(this,0)" name="type_show" <?php echo e((($data->type_show == 1)?'checked':'')); ?> value="1">นับจำนวนครั้ง
                              </div>
                              <div class="col-sm-2">
                                <input type="text" class="form-control" id="count_show" name="count_show" <?php echo e((($data->type_show == 0)?'readonly':'')); ?> value="<?php echo e($data->count_show); ?>">
                              </div>
                            </div>


                            <div class="form-group">
                            <label class="control-label col-sm-3" >Picture</label>
                              <div class="col-sm-8">
                                <input type="file" class="form-control" name="img" onchange="inputfileimg(0);" id="inputfileimg">
                              </div>
                            </div>
                            <input type="hidden" id="oldpic" name="oldpic" value="<?php echo e($data->img); ?>" >
                            <div class="form-group">
                            <label class="control-label col-sm-3" ></label>
                              <div class="col-sm-8" id="preview">
                                  <?php if($data->img): ?>
                                  <img src="<?php echo e(url('../')); ?>/<?php echo e($data->img); ?>" width="100%" height="200px">
                                  <?php endif; ?>
                              </div>
                            </div>
                            
                            <?php endif; ?>


                            <div class="form-group">
                                <div class="col-sm-12 text-center">
                                  <button type="submit" class="btn btn-success" >Submit</button>
                                </div>
                              </div>
                            </form>

                        </div>
                    </div>
                    <!-- end panel -->
                </div>
                <!-- end col-12 -->
            </div>
		</div>




<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>

<script>

$(function(){






    function showThumbnail(files,type){

        if(type == 0){

            $("#preview").html("");

        }else{

            $("#preview_"+type).html("");
            
        }

        
        var num = 1;
        for(var i=0;i<files.length;i++){
            var file = files[i]
            var imageType = /image.*/
            if(!file.type.match(imageType)){

            continue;
            }

            var image = document.createElement("img");
            image.setAttribute("width", "100%");
            image.setAttribute("height", "200");
            image.setAttribute("title","("+num+"/"+files.length+")");

            if(type == 0){

            var thumbnail = document.getElementById("preview");;

            }else{

            var thumbnail = document.getElementById("preview_"+type);

            }
            
            image.file = file;
            thumbnail.appendChild(image)

            var reader = new FileReader()
            reader.onload = (function(aImg){
                return function(e){
            aImg.src = e.target.result;
                };
            }(image))

            var ret = reader.readAsDataURL(file);
            var canvas = document.createElement("canvas");
            ctx = canvas.getContext("2d");
            image.onload= function(){
            ctx.drawImage(image,50,50)
            }
            num++;
       } // end for loop

    } // end showThumbnail



    $('#inputfileimg').on('change', function(e) {
        
        var files = this.files
    
        showThumbnail(files,0);
    });

    $('#inputfileimg_1').on('change', function(e) {
        
        var files = this.files
    
        showThumbnail(files,1);
    });

    $('#inputfileimg_2').on('change', function(e) {
        
        var files = this.files
    
        showThumbnail(files,2);
    });

    $('#inputfileimg_3').on('change', function(e) {
        
        var files = this.files
    
        showThumbnail(files,3);
    });

    $('#inputfileimg_4').on('change', function(e) {
        
        var files = this.files
    
        showThumbnail(files,4);
    });

    $('#inputfileimg_5').on('change', function(e) {
        
        var files = this.files
    
        showThumbnail(files,5);
    });

    $('#inputfileimg_6').on('change', function(e) {
        
        var files = this.files
    
        showThumbnail(files,6);
    });

    $('#inputfileimg_7').on('change', function(e) {
        
        var files = this.files
    
        showThumbnail(files,7);
    });

    $('#inputfileimg_8').on('change', function(e) {
        
        var files = this.files
    
        showThumbnail(files,8);
    });


});

function typeShow(val,id){

  var data = $(val).val();

  if(id == 0){

    if(data == 1){
      $('#count_show').removeAttr('readonly');
    }else{
      $('#count_show').attr('readonly',true);
      $('#count_show').val(0);
    }

  }else{

    if(data == 1){
      $('#count_show_'+id).removeAttr('readonly');
    }else{
      $('#count_show_'+id).attr('readonly',true);
      $('#count_show_'+id).val(0);
    }

  }


}

function typeSelect(val){

  var data = $(val).val();

    if(data == 0){

      $('#lighBox_img').css('display','block');
      $('#lighBox_youtube').css('display','none');

    }else{

      $('#lighBox_img').css('display','none');
      $('#lighBox_youtube').css('display','block');
    
    }

}


function delpic(d){

  var id = $(d).data('id');
  var rows = $(d).data('rows');
  var name = $(d).data('name');


  if(confirm(" ยืนยัน ที่จะลบข้อมูล ")){

  
  $.ajax('<?php echo e(action("AdvertisingController@delpic")); ?>',{
      type:'POST',
      data:{
        'id':id,
        'rows':rows,
        'name':name
      },
      dataType:'json',
      success:function(data){
        location.reload();
      }
  });

  }

}


</script>


<?php $__env->stopPush(); ?>

<?php echo $__env->make('backend.layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>