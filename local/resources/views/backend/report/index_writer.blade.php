@extends('backend.layouts.default')
@section('content')
		<div id="content" class="content">
			<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
				<li><a href="javascript:;">Home</a></li>
				<li class="active">จัดการ Report งานเขียน</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">จัดการ Report งานเขียน</h1>
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
                            <h4 class="panel-title">จัดการ Report งานเขียน</h4>
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


@stop

@push('scripts')
<script>
$(function() {
  		oTable = $('#data-table').DataTable({

          processing: true,
          serverSide: true,
          order:[[5,'asc']],
          ajax: {
    			url: '{{ action("WriterReportController@datatable") }}',
    			data: function ( d ) {},
                method: 'POST'
            },
          columns: [
            {title :'ประเภทงานเขียน',data:'type_W', className: 'text-center', defaultContent: '-'},
            {title :'เรื่องที่ถูก report',data:'name_t', className: 'text-center', defaultContent: '-'},
            {title :'ตอนที่ถูก report',data:'chapter', className: 'text-center', defaultContent: '-'},
            {title :'email ใช้ติดต่อ',data:'email_r', className: 'text-center', defaultContent: '-'},
            {title :'สาเหตุ',data:'type_r', className: 'text-center', defaultContent: '-'},
            {title :'สถานะ',data:'status', className: 'text-center', defaultContent: '-'},
            {title :'Action',data:'id_r', className: 'text-center', defaultContent: '-'},
          ],
          rowCallback: function(nRow, aData, dataIndex){

            var detail = aData['type_r'].split(',');
            var text = "";

            if(aData['type_W'] == 1){
                $('td:eq(0)',nRow).html('นิยาย');
            }else if(aData['type_W'] == 2){
                $('td:eq(0)',nRow).html('การ์ตูน');
            }else if(aData['type_W'] == 3){
                $('td:eq(0)',nRow).html('เรื่องสั้น');
            }else if(aData['type_W'] == 4){
                $('td:eq(0)',nRow).html('เรื่องเล่า / ประสบการ์ณ');
            }else if(aData['type_W'] == 5){
                $('td:eq(0)',nRow).html('คลิป');
            }

            

            detail.forEach(function(e){
                if(e == 1){
                    text += "เป็นงานเขียนที่ลอกเลียนมาจากผลงานของผู้อื่น <br>";
                }else if(e == 2){
                    text += "เป็นงานเขียนที่ติดลิขสิทธิ์ของบุคคลหรือนิติบุคคล อย่างเช่น สำนักพิมพ์ <br>";
                }else if(e == 3){
                    text += "เป็นผลงานเขียนแนว Fan-Fiction ที่ Horrorism ห้ามลง <br>";
                }else if(e == 4){
                    text += "เป็นผลงานเขียนที่สร้างความเสื่อมเสียให้กับบุคคลที่มีตัวตนอยู่จริง <br>";
                }else if(e == 5){
                    text += "ใช้รูปปกหรือภาพประกอบที่ละเมิดลิขสิทธิ์ <br>";
                }else if(e == 6){
                    text += "ใช้รูปปกหรือภาพประกอบที่สื่อไปทางลามกอนาจาร <br>";
                }else{
                    text += aData['detail_r'];
                }
            } );          

            $('td:eq(4)',nRow).html(text);

            if(aData['status'] == 0){
                $('td:eq(5)',nRow).html("ยังไม่ถูกเช็ค");
            }else{
                $('td:eq(5)',nRow).html("ถูกเช็คแล้ว");
            }

             $('td:last-child',nRow).html(''
                +'<button onclick="del('+aData['id_r']+','+aData['type_t']+');" class="btn btn-sm btn-danger">เช็ค</button> '    
            );

            

      }
    });
    
});



function del(id,type){


       $.ajax('{{ action("WriterReportController@check_report") }}', {
        type: 'POST',
        data:{
            'id':id,
            'type':type,
         },
        dataType: 'html',
        success: function(data) {
            oTable.draw();
        }
    });



}




</script>
@endpush
