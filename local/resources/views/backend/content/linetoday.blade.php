@extends('backend.layouts.default')
@section('content')
		<div id="content" class="content">
			<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
				<li><a href="javascript:;">Home</a></li>
				<li class="active">จัดการ api content</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">จัดการ api content</h1>
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
                            <h4 class="panel-title">จัดการ api content</h4>
                        </div>

                        <div class="panel-body">
                          <div class="row" style="padding: 0px 2px 0 0;">
            								
                                <div class="col-md-12 text-right" >
                                    <a onclick="$('#myModalCreated').modal();" class="btn btn-sm btn-success">Add Content</a>
                                    <a href="{{ action('LinetodayController@update') }}" class="btn btn-sm btn-success">@if($dateL->created == date('Y-m-d'))Lastupdate Now @else Lastupdate {{ $dateL->created }}@endif</a>
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

		<div id="myModalCreated" class="modal fade" role="dialog">
		  <div class="modal-dialog modal-lg" >

		    <!-- Modal content-->
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal">&times;</button>
		        <h4 class="modal-title">เลือก Contentที่จะแสดง</h4>
		      </div>
		      <div class="modal-body" style="height: 100%;">
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">ประเภท Content</label>
                        <select class="form-control" name="typeContent" id="typeContent">
                        <option value="">--select--</option>
                        @foreach($type as $t)
                        <option value="{{ $t->id }}">{{ $t->name_content }}</option>
                        @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Content ที่เลือก</label>
                        <select class="form-control" name="contentSelect" id="contentSelect" readonly="true">
                        <option value="">--select--</option>
                        </select>
                    </div>

		      </div>
		      <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		        <button type="button" class="btn btn-success" onclick="addContent();">Submit</button>
                
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
    			url: '{{ action("LinetodayController@datatable") }}',
                method: 'POST'
            },
						columns: [
	            {title :'name',data:'name', className: 'text-center', defaultContent: '-'},
				{title :' ',data:'id', className: 'text-center', defaultContent: '-'},
	          ],
	          rowCallback: function(nRow, aData, dataIndex){

                $('td:last-child',nRow).html(''
                +'<a onclick="del('+aData['id']+');" class="btn btn-sm btn-icon btn-circle btn-danger"><i class="fa fa-times" aria-hidden="true"></i></a>'
                );


      }
    });


    $('#typeContent').change(function(){

        $.ajax({
            url:'{{ action("LinetodayController@selectContenr") }}',
            method:'POST',
            data:{
                type:$('#typeContent').val()
            },
            dataType:'json',
            success:function(d){

                var html = "";

                $.each(d,function(key,val){
                    html += '<option value="'+val['id']+'">'+val['headerFull']+'</option>';
                })

                $('#contentSelect').attr("readonly", false);
                $('#contentSelect').html(html); 



            }

        });
    
    
    
    });


});


function addContent(){

    var type = $('#typeContent').val()
    var id = $('#contentSelect').val();


    if(id){

        $.ajax({
            url:'{{ action("LinetodayController@addContenr") }}',
            method:'post',
            data:{
                type:type,
                id:id
            },
            dataType:'json',
            success:function(d){
                // location.reload();
                oTable.draw();
                $('#myModalCreated').close();

            }
        
        });

    }

}




function del(id){

	swal({
	  title: "Are you sure?",
	  type: "warning",
	  showCancelButton: true,
	  confirmButtonClass: "btn-danger",
	  confirmButtonText: "Yes, delete it!",
	  closeOnConfirm: false
	},
	function(){

        $.ajax({
            url:'{{ action("LinetodayController@delContenr") }}',
            method:'POST',
            data:{
                id:id
            },
            dataType:'json',
            success:function(d){

                swal("Delete Succress"," ", "success");
                oTable.draw();

            }

        });
	});



}


</script>
@endpush
