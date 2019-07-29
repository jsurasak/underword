<?php $__env->startSection('content'); ?>
		<div id="content" class="content">
			<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
				<li><a href="javascript:;">Home</a></li>
				<li class="active">ข้อมูล นักเขียน</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">รายชื่อ นักเขียน</h1>
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
                            <h4 class="panel-title">รายชื่อ นักเขียน</h4>
                        </div>

                        <div class="panel-body">
                          <div class="row" style="padding: 0px 2px 0 0;">
            								<div class="col-md-6 text-left" >
            									<div class="pull-left w210">
            									</div>
            								</div>
            								<div class="col-md-6 text-right" >
            									<a onclick="create_w();" class="btn btn-sm btn-success">สร้างข้อมูลนักเขียน</a>
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


    <div id="myModal" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title text-center">จัดการ Content comics</h4>
          </div>
          <div class="modal-body">
            <form id="myform" class="form-horizontal" method="post" enctype="multipart/form-data">
              <?php echo e(csrf_field()); ?>

              <input type="hidden" id="id" name="id" >
              <input type="hidden" id="old" name="old" />
              <div class="form-group">
                <label class="control-label col-sm-2" >ชื่อ-นามสกุล นักเขียน :</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="full_name" id="full_name">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-sm-2" >นามปากกา นักเขียน :</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="writher_name" id="writher_name">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-sm-2" >คำแนะนำตัว นักเขียน :</label>
                <div class="col-sm-10">
                  <textarea rows="3" class="form-control" name="writher_comment" id="writher_comment"></textarea>
                </div>
              </div>

              <div class="form-group" >
                <label class="control-label col-sm-2" >รูปภาพ นักเขียน</label>
                <div class="col-sm-10">
                  <input type="file" class="form-control" name="writher_pic" id="pictureUp">
                </div>
              </div>

              <div class="form-group" >
                <label class="control-label col-sm-2" ></label>
                <div class="col-sm-10">
                  <img id="pictureShow">
                </div>
              </div>

            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" id="submit">Submit</button>
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
          ajax: {
    			url: '<?php echo e(action("WritherController@datatable")); ?>',
    			data: function ( d ) {},
                method: 'POST'
            },
          columns: [
            {title :'รูปนักเขียน',data:'writher_pic', className: 'text-center', defaultContent: '-'},
            {title :'ชื่อ-นามสกุล',data:'full_name', className: 'text-center', defaultContent: '-'},
            {title :'นามปากกา',data:'writher_name', className: 'text-center', defaultContent: '-'},
            {title :'คำแนะนำตัว',data:'writher_comment', className: 'text-center', defaultContent: '-'},
            {title :'Action',data:'id', className: 'text-center', defaultContent: '-'},
          ],
          rowCallback: function(nRow, aData, dataIndex){

            $('td:eq(0)',nRow).html('<img src="<?php echo e(url("../imgContent")); ?>/'+aData['writher_pic']+'" width="100px" height="100px">');
            $('td:last-child',nRow).html(''
              +'<button onclick="edit_W('+aData['id']+');"  class="btn btn-sm btn-icon btn-circle btn-success"><i class="glyphicon glyphicon-pencil"></i></button>'
              +'<a onclick="del(this,'+aData['id']+');" data-pic="'+aData['writher_pic']+'" class="btn btn-sm btn-icon btn-circle btn-danger"><i class="fa fa-times" aria-hidden="true"></i></a>'
              );

      }
    });
});

$("#pictureUp").change(function(){

		if (this.files && this.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#pictureShow').attr('src', e.target.result);
            $('#pictureShow').attr('width','250px').attr('height','250px');
        }

        reader.readAsDataURL(this.files[0]);
    }

});

function create_w(){

  $('#myModal').modal();
  $('#myform').attr('action','<?php echo e(action("WritherController@add")); ?>');

}

function edit_W(id){

  $.ajax('writherEdit',
    {
      type: 'POST',
      data:{
        'id':id
      },
      dataType: 'json',
      success: function(data) {
        $('#id').val(data[0]['id']);
        $('#full_name').val(data[0]['full_name']);
        $('#writher_name').val(data[0]['writher_name']);
        $('#writher_comment').val(data[0]['writher_comment']);
        $('#old').val(data[0]['writher_pic'])
        $('#pictureShow').attr('src','<?php echo e(url("../imgContent")); ?>/'+data[0]['writher_pic']).attr('width','250px').attr('height','250px');
      }
    });

  $('#myModal').modal();
  $('#myform').attr('action','<?php echo e(action("WritherController@edit")); ?>');
}


$('#submit').click(function(){
  $('#myform').submit();
})

function del(bPic,id){

  var pic = $(bPic).data('pic');

	swal({
	  title: "Are you sure?",
	  type: "warning",
	  showCancelButton: true,
	  confirmButtonClass: "btn-danger",
	  confirmButtonText: "Yes, delete it!",
	  closeOnConfirm: false
	},
	function(){
		window.location.href = 'writher/'+id+'/'+pic+'/del';
	});


}



</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('backend.layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>