@extends('backend.layouts.default')
@section('content')
		<div id="content" class="content">
			<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
				<li><a href="javascript:;">Home</a></li>
				<li class="active">{{ $name->name_content }}</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">{{ $name->name_content }}</h1>
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
                            <h4 class="panel-title">{{ $name->name_content }}</h4>
                        </div>

                        <div class="panel-body">
                          <div class="row" style="padding: 0px 2px 0 0;">
            								<div class="col-md-6 text-left" >
            									<div class="pull-left w210">
																<select class="form-control" onchange="selectD(this);">
																	<option value="Sun" {{ ((date('D')== "Sun")?'selected':'') }}>วันอาทิตย์</option>
																	<option value="Mon" {{ ((date('D')== "Mon")?'selected':'') }}>วันจันทร์</option>
																	<option value="Tue" {{ ((date('D')== "Tue")?'selected':'') }}>วันอังคาร</option>
																	<option value="Wed" {{ ((date('D')== "Wed")?'selected':'') }}>วันพุธ</option>
																	<option value="Thu" {{ ((date('D')== "Thu")?'selected':'') }}>วันพฤหัสบดี</option>
																	<option value="Fri" {{ ((date('D')== "Fri")?'selected':'') }}>วันศุกร์</option>
																	<option value="Sat" {{ ((date('D')== "Sat")?'selected':'') }}>วันเสาร์</option>
																</select>
            									</div>
            								</div>
            								<div class="col-md-6 text-right" >
            									<a onclick="eventModal(1);" class="btn btn-sm btn-success">Create Comice</a>
            								</div>
            							</div>
            							<br>
                          <table id="data-table" class="table table-striped table-bordered"></table>
                        </div>
												<form>
													<input type="hidden" id="tContent" name="tContent" value="{{ $id }}">
													<input type="hidden" id="dContent" name="dContent" value="{{ date('D') }}">
												</form>
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
              {{ csrf_field() }}
              <input type="hidden" id="id" name="id" >
              <input type="hidden" id="type" name="type" value="{{ $id }}" >
              <input type="hidden" id="old" name="old" />
              <div class="form-group">
                <label class="control-label col-sm-2" >เวลาวันที่ลง :</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="date" id="date">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-sm-2">วันที่กำหนด:</label>
                <div class="col-sm-10">
                  <select class="form-control" id="day" name="day">
                    <option value="Sun" >วันอาทิตย์</option>
                    <option value="Mon" >วันจันทร์</option>
                    <option value="Tue" >วันอังคาร</option>
                    <option value="Wed" >วันพุธ</option>
                    <option value="Thu" >วันพฤหัสบดี</option>
                    <option value="Fri" >วันศุกร์</option>
                    <option value="Sat" >วันเสาร์</option>
                  </select>
                </div>
              </div>

              <div class="form-group" >
                <label class="control-label col-sm-2" >รูปภาพ</label>
                <div class="col-sm-10">
                  <input type="file" class="form-control" name="picture" id="pictureUp">
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




@stop

@push('scripts')
<script>

  
$(function() {

      $('#date').datetimepicker({ format:'YYYY-MM-DD HH:mm:ss' });

  		oTable = $('#data-table').DataTable({

          processing: true,
          serverSide: true,
          ajax: {
    			url: '{{ action("ContentController@datatable_comice") }}',
    			data: function ( d ) {
						d.tContent = $('#tContent').val();
						d.dContent = $('#dContent').val();
					},
                method: 'POST'
            },
          columns: [
            {title :'Picture',data:'picture', className: 'text-center', defaultContent: '-'},
						{title :'Action',data:'id', className: 'text-center', defaultContent: '-'},
          ],
          rowCallback: function(nRow, aData, dataIndex){

						$('td:last-child',nRow).html(''
															+'<a onclick="eventModal(2,'+aData['id']+')"  class="btn btn-sm btn-icon btn-circle btn-success"><i class="glyphicon glyphicon-pencil"></i></a>'
														  +'<a onclick="del('+aData['id']+',8);" class="btn btn-sm btn-icon btn-circle btn-danger"><i class="fa fa-times" aria-hidden="true"></i></a>'
															);

            $('td:eq(0)',nRow).html('<img src="{{ url("../imgContent") }}/'+aData['picture']+'" width="200px" height="200px">');

      }
    });

});

$('#date').on('dp.change', function(e){
	var str = e.date._d;
	var day = str.toString().split(" ");
  // console.log(day);
	$('#day option[value='+day[0]+']').attr('selected', 'selected');

});

function selectD(d){

		var d = d.value;
		$('#dContent').val(d);
		oTable.draw();

}
$('#submit').click(function(){
    $('#myform').submit();
});

function eventModal(type,id){
  if(type == 1){
    $('#myModal').modal();
    $('#myform').attr('action','content_comice/add');
  }else{
    $.ajax('modalC',
      {
        type: 'POST',
        data:{
          'id':id
        },
        dataType: 'json',
        success: function(data) {
          $('#id').val(data[0]['id']);
          $('#date').val(data[0]['time_set']);
          $('#day').val(data[0]['day_content']);
          $('#old').val(data[0]['picture']);
          $('#pictureShow').attr('src','{{ url("../imgContent") }}/'+data[0]['picture']);
        }
      });
    $('#myModal').modal();
    $('#myform').attr('action','content_comice/edit');
  }
}

$("#pictureUp").change(function(){

		if (this.files && this.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#pictureShow').attr('src', e.target.result);
        }

        reader.readAsDataURL(this.files[0]);
    }

});

function del(id,type){

	swal({
	  title: "Are you sure?",
	  type: "warning",
	  showCancelButton: true,
	  confirmButtonClass: "btn-danger",
	  confirmButtonText: "Yes, delete it!",
	  closeOnConfirm: false
	},
	function(){
		window.location.href = 'content_comice/'+type+'/delete/'+id;
	});



}


</script>
@endpush
