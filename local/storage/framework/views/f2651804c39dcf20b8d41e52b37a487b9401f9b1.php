		<div id="sidebar" class="sidebar">
			<!-- begin sidebar scrollbar -->
			<div data-scrollbar="true" data-height="100%">
				<!-- begin sidebar user -->
				<ul class="nav">
					<li class="nav-profile">
						<div class="image">
							<a href="admin/system/profile/"><img src="assets/img/user-13.jpg" alt="" /></a>
						</div>
						<div class="info">
							Administrator
							<small><b>Backend developer</b></small>
						</div>
					</li>
				</ul>
				<!-- end sidebar user -->
				<!-- begin sidebar nav -->

				<ul class="nav">

					<li class="nav-header"><h5 style="color:white">ระบบจัดการ</h5></li>

					<?php $permission = Auth::user()->level; 
					
					if($permission == 0 || $permission == 1){

					?>

					<li class="has-sub">
							<a href="javascript:;">
									<b class="caret pull-right"></b>
									<i class="fa fa-laptop"></i>
									<span>Content</span>
								</a>
							<ul class="sub-menu">
							<?php

						$type = DB::table('ck_type_content')->get();

						foreach ($type as $key => $t) {
							echo '<li>
												<a href="content/' . $t->id . '"></i><span>' . $t->name_content . '</span></a>
											</li>';
						}


						?>
						<li>
							<a href="event" ></i><span>Event</span></a>
						</li>

						</ul>
					</li>

					


					<li><a href="writher"><i class="fa fa-laptop"></i> <span>จัดการรายชื่อ นักเขียน</span></a></li>



					<?php } 


					if($permission == 0 || $permission == 2){

					?>

					<li class="has-sub">
							<a href="javascript:;">
									<b class="caret pull-right"></b>
									<i class="fa fa-laptop"></i>
									<span>จัดการ ผลงานเขียน</span>
								</a>
							<ul class="sub-menu">
							
							<li>
								<a href="manage_novel" ></i><span>นิยาย</span></a>
							</li>
							<li>
								<a href="manage_novel_vip" ></i><span>นิยายแนะนำ</span></a>
							</li>
							<!-- <li>
								<a href="manage_comics" ></i><span>การ์ตูน</span></a>
							</li> -->
							<li>
								<a href="manage_short" ></i><span>เรื่องสั้น</span></a>
							</li>
							<li>
								<a href="manage_story" ></i><span>เรื่องเล่า / ประสบการณ์</span></a>
							</li>
							<li>
								<a href="manage_clip" ></i><span>คลิป</span></a>
							</li>

							</ul>
					</li>

					<li class="has-sub">
							<a href="javascript:;">
									<b class="caret pull-right"></b>
									<i class="fa fa-laptop"></i>
									<span>อนุมัติงานเขียนที่ถูก report</span>
								</a>
							<ul class="sub-menu">
							
							<li>
								<a href="confirm_chaper_novel" ></i><span>ตอน นิยาย</span></a>
							</li>
							
							<li>
								<a href="confirm_chaper_commic" ></i><span>ตอน การ์ตูน</span></a>
							</li>
							<li>
								<a href="confirm_short" ></i><span>เรื่องสั้น</span></a>
							</li>
							<li>
								<a href="confirm_story" ></i><span>เรื่องเล่า / ประสบการณ์</span></a>
							</li>
							<li>
								<a href="confirm_clip" ></i><span>คลิป</span></a>
							</li> 

							</ul>
						</li>

						<li><a href="manage_novel_today"><i class="fa fa-laptop"></i> <span>จัดการนิยายประจำวัน</span></a></li>
						

						<li class="has-sub">
							<a href="javascript:;">
									<b class="caret pull-right"></b>
									<i class="fa fa-laptop"></i>
									<span>comment ที่ถูก report</span>
								</a>
							<ul class="sub-menu">
							
							
							<li>
								<a href="commentChapter" ></i><span>comment ส่วน งานเขียน</span></a>
							</li>
	

							</ul>
						</li>
						<li><a href="reportWriter"><i class="fa fa-laptop"></i> <span>งานเขียนที่ถูก report</span></a></li>


					<?php }
					
					if ($permission == 0 || $permission == 3) {

					?>

					<li><a href="user"><i class="fa fa-laptop"></i> <span>จัดการรายชื่อ สมาชิก</span></a></li>

					<li class="has-sub">
							<a href="javascript:;">
									<b class="caret pull-right"></b>
									<i class="fa fa-laptop"></i>
									<span>Report การขาย</span>
								</a>
							<ul class="sub-menu">
							
							<li><a href="report_sell"><span>รายงานการขาย</span></a></li>
							<li>
								<a href="report_bile" ></i><span>รอบบิลจ่ายเงิน</span></a>
							</li>

							<li>
								<a href="report_skull" ></i><span>รายงานการขายหัวกระโหลก</span></a>
							</li>
	

							</ul>
					</li>

					


					<?php }

						if ($permission == 0 ) { 
					
					?>
					

						<li><a href="default_picture"><i class="fa fa-laptop"></i> <span>จัดการ รูปภาพ default</span></a></li>
						<li><a href="price_skull"><i class="fa fa-laptop"></i> <span>จัดการ ราคา skull</span></a></li>
						<li><a href="category"><i class="fa fa-laptop"></i> <span>จัดการ หมวดหมู่ นืยาย</span></a></li>
						<li><a href="about"><i class="fa fa-laptop"></i> <span>จัดการส่วนหน้า AboutUS</span></a></li>
						<li><a href="requirements"><i class="fa fa-laptop"></i> <span>จัดการส่วน ข้อกำหนจ</span></a></li>
						<li><a href="setcontent"><i class="fa fa-laptop"></i> <span>Set 5top Content</span></a></li>
						<li><a href="commentContent" ><i class="fa fa-laptop"></i><span>comment ส่วน Content</span></a></li>

						<li class="has-sub">
							<a href="javascript:;">
									<b class="caret pull-right"></b>
									<i class="fa fa-laptop"></i>
									<span>จัดการส่วน ส่วนการโฆษณา</span>
								</a>
							<ul class="sub-menu">
							<?php

						$ad = DB::table('advertising')->get();

						foreach ($ad as $key => $t) {
							echo '<li>
											<a href="advertising/' . $t->id . '/show"></i><span>' . $t->name . '</span></a>
										</li>';
						}


						?>
							<li>
								<a href="event" ></i><span>Event</span></a>
							</li>

							</ul>
						</li>

						<li class="has-sub">
							<a href="javascript:;">
									<b class="caret pull-right"></b>
									<i class="fa fa-laptop"></i>
									<span>Ghost Gift</span>
								</a>
							<ul class="sub-menu">
							
							<li>
								<a href="ghost_gift" ></i><span>จัดการสินค้า</span></a>
							</li>
							<li>
								<a href="ghostgiftreport" ></i><span>ดูรายงานการแลกสินค้า</span></a>
							</li>
	

							</ul>
						</li>

						<li><a href="contentsetapi" ><i class="fa fa-laptop"></i><span>จัดการ Line To day</span></a></li>


						



					<?php } ?>
	

						<li class="nav-header"><h5 style="color:white">Admin</h5></li>
						
						<?php if ($permission == 0){ ?>
						<li><a href="admin"><i class="fa fa-laptop"></i> <span>จัดการ User</span></a></li>
						<?php }
						$idAdmin = Auth::user()->id;
						?>
						<li><a href="change_password/<?php echo $idAdmin; ?>/form"><i class="fa fa-laptop"></i> <span>แก้ไข Password</span></a></li>



					<li><a href="<?php echo e(asset(Config::get('app.admin_path'))); ?>/template/?file=javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify"><i class="fa fa-angle-double-left"></i></a></li>
				</ul>
				<!-- end sidebar nav -->
			</div>
			<!-- end sidebar scrollbar -->
		</div>
		<div class="sidebar-bg"></div>
