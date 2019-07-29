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
            									<a href="{{ action('ContentController@FormAdd',$id) }}" class="btn btn-sm btn-success">Create Content</a>
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

		<div id="myModalReview" class="modal fade" role="dialog">
		  <div class="modal-dialog modal-lg" >

		    <!-- Modal content-->
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal">&times;</button>
		        <h4 class="modal-title">Review</h4>
		      </div>
		      <div class="modal-body" id="review_iframe" style="height: 100%;">

		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		      </div>
		    </div>

		  </div>
		</div>


@stop

@push('scripts')
<script>
$(function() {
  		oTable = $('#data-table').DataTable({

          processing: true,
          serverSide: true,
          ajax: {
    			url: '{{ action("ContentController@datatable") }}',
    			data: function ( d ) {
						d.tContent = $('#tContent').val();
						d.dContent = $('#dContent').val();
					},
                method: 'POST'
            },
						columns: [
	            {title :'Pic A',data:'pic_A', className: 'text-center', defaultContent: '-'},
	            {title :'Pic B',data:'pic_B', className: 'text-center', defaultContent: '-'},
	            {title :'Header',data:'headerA', className: 'text-center', defaultContent: '-'},
							{title :'dateShow',data:'time_set', className: 'text-center', defaultContent: '-'},
	            {title :'View',data:'view', className: 'text-center', defaultContent: '-'},
							{title :'Action',data:'email', className: 'text-center', defaultContent: '-'},
	          ],
	          rowCallback: function(nRow, aData, dataIndex){

							$('td:last-child',nRow).html(''
																+'<a href="content/'+aData['type_content']+'/FormEdit/'+aData['id']+'" class="btn btn-sm btn-icon btn-circle btn-success"><i class="glyphicon glyphicon-pencil"></i></a>'
															  +'<a onclick="del('+aData['id']+','+aData['type_content']+');" class="btn btn-sm btn-icon btn-circle btn-danger"><i class="fa fa-times" aria-hidden="true"></i></a>'
																+'<a onclick="review('+aData['id']+');" class="btn btn-sm btn-icon btn-circle btn-primary"><i class="fa fa-search" aria-hidden="true"></i></a>'
																);

	            $('td:eq(0)',nRow).html('<img src="{{ url("../imgContent") }}/'+aData['pic_A']+'" width="150px" height="100px">');
	            $('td:eq(1)',nRow).html('<img src="{{ url("../imgContent") }}/'+aData['pic_B']+'" width="100px" height="100px">');



      }
    });
});


function review(id){

	$('#myModalReview').modal();
	$('.modal-body').css('overflow-y', 'auto');
  $('.modal-body').css('height', '1000px');
	$('#review_iframe').html("<iframe src='{{ url('../') }}/inside-content/"+id+"/' width='100%' height='100%'></ifram>");

}

function selectD(d){

		var d = d.value;
		$('#dContent').val(d);
		oTable.draw();

}

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
		// alert(id);
		window.location.href = 'content/'+type+'/delete/'+id;
	});



}


</script>
@endpush
