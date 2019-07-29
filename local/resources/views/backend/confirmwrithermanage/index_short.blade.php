@extends('backend.layouts.default')
@section('content')
		<div id="content" class="content">
			<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
				<li><a href="javascript:;">Home</a></li>
				<li class="active">เรื่องสั้น</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">จัดการ เรื่องสั้น</h1>
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
                            <h4 class="panel-title">จัดการ เรื่องสั้น</h4>
                        </div>
                        
                        <div class="panel-body">
                          <div class="row" style="padding: 0px 2px 0 0;">
                            <div class="col-md-6 text-left" >
                                <div class="pull-left w210">
                                </div>
                            </div>
                            <div class="col-md-6 text-right" >
                                
                            </div>
                            </div>
                            
                          <table id="data-table" class="table table-striped table-bordered"></table>
                            
                        </div>
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
    			url: '{{ action("ConfirmWritherManageOtherController@datatable_short") }}',
                method: 'POST'
            },
          columns: [
            {title :'ชื่อตอน',data:'name', className: 'text-center', defaultContent: '-'},
            {title :'สาเหตุที่ปิดตอน',data:'detail', className: 'text-center', defaultContent: '-'},
            {title :'ตัวอย่าง',data:'id', className: 'text-center', defaultContent: '-'},
            {title :'Action',data:'status', className: 'text-center', defaultContent: '-'},
          ],
          rowCallback: function(nRow, aData, dataIndex){

            

             $('td:last-child',nRow).html(''
                +'<a onclick="closeShort('+aData['id']+');" class="btn btn-sm btn-warning" >ปิดตอน</a>'
                +'<a onclick="confirmShort('+aData['id']+');" class="btn btn-sm btn-success" >อนุมัติ</a>'
            );



            $('td:eq(2)',nRow).html(''
            +'<a onclick="review('+aData['id']+');" class="btn btn-sm btn-icon btn-circle btn-primary"><i class="fa fa-search" aria-hidden="true"></i></a>'
            );

            

      }
    });

   
    
});


function review(id){



	$('#myModalReview').modal();
	$('.modal-body').css('overflow-y', 'auto');
    $('.modal-body').css('height', '1000px');
	$('#review_iframe').html("<iframe src='{{ url('../') }}/review-short/"+id+"/' width='100%' height='100%'></ifram>");

}


function closeShort(id){

var value = prompt("กรุณา กรอกสาเหตุที่ปิดตอน");

if (value != null) {
   window.location.href="confirm_short/"+id+"/close/"+value;
}

}

function confirmShort(id){

    if(confirm("ยืนยัน การอนุมัติ")){

        window.location.href="confirm_short/"+id+"/confirm";

    }

}


</script>
@endpush
