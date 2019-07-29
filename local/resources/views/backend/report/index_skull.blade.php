@extends('backend.layouts.default')
@section('content')
<style>
    .daterangepicker .drp-calendar {
    display: none;
    max-width: 100%;
}
</style>
		<div id="content" class="content">
			<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
				<li><a href="javascript:;">Home</a></li>
				<li class="active">Report การขายหัวกระโหลก</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">Report การขายหัวกระโหลก</h1>
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
                            <h4 class="panel-title">Report การขายหัวกระโหลก</h4>
                        </div>


                        <div class="panel-body">
                          <div class="row" style="padding: 0px 2px 0 0;">
                            <div class="col-md-6 text-left" >
                                <div class="form-inline">
                                    <div class="form-group">
                                        <!-- <input type="input" class="form-control" width="100%"> -->
                                        <input type="input" class="form-control" id="roundDate" value="">
                                    </div>
                                </div>
                                
                            </div>
                            <div class="col-md-6 text-right" >
                                <div class="form-inline">
                                    <div class="form-group">
                                        <button class="btn btn-sm btn-primary" onclick="excelReport();"><i class="fa fa-file-excel-o"></i> Excel Report</button>
                                    </div>
                                </div>
                            </div>
                         </div>
                         
                            <br>
                            
                        <div style="overflow-x:auto;">
                          <form id="formCheck">
                          <table id="data-table" class="table table-striped table-bordered ">
                          </table>
                          </form>
                        </div>
                          
                        </div>
                    </div>
                    <!-- end panel -->
                </div>
                <!-- end col-12 -->
            </div>
            <!-- end row -->
        </div>
        
       

@stop

@push('scripts')
<script>
$(function() {

        var d = new Date();
        var curr_year = d.getFullYear();
        var curr_month = d.getMonth() + 1;
        var datsStart =  curr_month + "-01-" + curr_year;
        console.log(datsStart);

        $('#roundDate').daterangepicker({
            startDate:datsStart
        });

        

  		oTable = $('#data-table').DataTable({

          processing: true,
          serverSide: true,
          order:[ 4, 'asc' ],
          ajax: {
    			url: '{{ action("SkullReportController@datatable") }}',
    			data: function ( d ) {       
                    d.roundDate = $('#roundDate').val();                 
                },
                method: 'POST'
            },
            columnDefs: [ {
            targets: 0,
            orderable: false
            } ],
          columns: [
            {title :'username',data:'username', className: 'text-center', defaultContent: '-'},
            {title :'จำนวนที่เติม',data:'point_s', className: 'text-center', defaultContent: '-'},
            {title :'จำนวนที่มีก่อนเดิม',data:'old_point_s', className: 'text-center', defaultContent: '-'},
            {title :'เติมโดย',data:'add_by', className: 'text-center', defaultContent: '-'},
            {title :'ช่วงเวลาที่เติม',data:'created', className: 'text-center', defaultContent: '-'},
          ],
          rowCallback: function(nRow, aData, dataIndex){

            //   $('td:last-child',nRow).html('<button type="button" onclick="detail('+aData['id_s']+');" class="btn btn-sm btn-success"><i class="fa fa-file-o"></i></button>');            

      }
    });

    $('#roundDate').change(function(){



        oTable.draw();

    });

  
    
});


function excelReport(){


    var roundDate = $('#roundDate').val();
    var date = roundDate.split(" - ");
    var start = date[0].split("/");
    var end = date[1].split("/");

    var str = start[2]+"-"+start[0]+"-"+start[1]+"_"+end[2]+"-"+end[0]+"-"+end[1]

    window.location.href="report_skull/"+str+"/excel";



}


</script>
@endpush
