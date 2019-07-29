@extends('backend.layouts.default')
@section('content')
		<div id="content" class="content">
			<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
				<li><a href="javascript:;">Home</a></li>
				<li class="active">Report การขาย</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">Report การขาย</h1>
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
                            <h4 class="panel-title">Report การขาย</h4>
                        </div>


                        <div class="panel-body">
                          <div class="row" style="padding: 0px 2px 0 0;">
                            <div class="col-md-6 text-left" >
                                <div class="form-inline">
                                    <div class="form-group mb-2">
                                        <label for="staticEmail2" class="sr-only">รอบ</label>
                                        <select class="form-control" name="round" id="round">
                                            @for($i = 1;$i<=24;$i++)
                                            <option value="{{ $i }}"  {{ (($i == $round)?'selected':'') }} >{{ $i }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                    <div class="form-group mx-sm-3 mb-2">
                                        <label for="inputPassword2" class="sr-only">ปี</label>
                                        <select class="form-control" name="year" id="year">
                                            @foreach($year as $y)
                                            <option value="{{ $y->year }}" >{{ ($y->year + 543) }}</option>
                                            @endforeach
                                            <option value="{{ date('Y') }}" selected >{{ (date('Y') + 543) }}</option>
                                            <option value="{{ date('Y') + 1 }}" >{{ (date('Y') + 1 + 543) }}</option>
                                        </select>
                                    </div>
                                    <div class="form-group mx-sm-3 mb-2">
                                        <label for="inputPassword2" class="sr-only">ประเภท</label>
                                        <select class="form-control" name="type" id="type">
                                            <option value="1">รอบ ปกติ</option>
                                            <option value="2">รอบ รวมครบ 2000</option>
                                            <option value="3">รอบ รวมเกิน 300 แต่ต่ำกว่า 2000</option>
                                            <option value="4">รอบ ต่ำกว่า 300</option>
                                            <option value="99">แสดงที่แจ้งชำระแล้ว</option>
                                        </select>
                                    </div>
                                    <button type="button" id="seach-btn" class="btn btn-primary mb-2">seach</button>
                                </div>
                            </div>
                            <div class="col-md-6 text-right" >
                                <button type="button" id="sell-btn" class="btn btn-primary mb-2">เลือกวันที่จ่าย</button>
                            </div>
                            </div>
                            <br>
                            <input type="hidden" id="Check_iduser">
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
        
        <!-- modal -->

        <div class="modal fade" id="myModal" width="75%">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">รายงานการขาย
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </h5>
            </div>
            <div class="modal-body">
                <div id="detail"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
        </div>

        <div class="modal fade" id="myModalSell" width="50%">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">จัดการรอบบิล
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </h5>
            </div>
            <div class="modal-body">
                <form id="sellDate" >
                    {{  csrf_field() }}
                    <input type="hidden" name="id" id="idSelect">
                    <div class="form-group">
                        <label >เลือกวันที่ต้องการชำระเงิน</label>
                        <input type="text" name="dateBile" id="dateBile" class="form-control">
                    </div>
                    <div class="form-group">
                        <label >รอบบิล</label>
                        <input type="number" name="round" value="{{ $round }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label >ปี ของรอบบิล</label>
                        <input type="text" name="year" placeholder="20xx" value="{{ date('Y') }}" class="form-control">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" onclick="sellDateSell();">Submit</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
        </div>

        <!-- modal -->

@stop

@push('scripts')
<script>
$(function() {

        $('#dateSelect').datepicker({
            dateFormat:'yy-mm-dd'
        });
        $('#dateBile').datepicker({
            dateFormat:'yy-mm-dd'
        });


  		oTable = $('#data-table').DataTable({

          processing: true,
          serverSide: true,
          order:[ 2, 'asc' ],
          ajax: {
    			url: '{{ action("ReportSellController@datatableUser") }}',
    			data: function ( d ) {
                    d.round = $('#round').val();
                    d.year = $('#year').val();
                    d.type = $('#type').val();
                },
                method: 'POST'
            },
            columnDefs: [ {
            targets: 0,
            orderable: false
            } ],
          columns: [
            {data:'id_s', className: 'text-center', defaultContent: '-'},
            {title :'รอบบิลที่',data:'round', className: 'text-center', defaultContent: '-'},
            {title :'username',data:'username', className: 'text-center', defaultContent: '-'},
            {title :'ธนาคาร',data:'bank_name', className: 'text-center', defaultContent: '-'},
            {title :'เลขบัญชี',data:'bank_number', className: 'text-center', defaultContent: '-'},
            {title :'ชื่อเจ้าของบัญชี',data:'user_bank', className: 'text-center', defaultContent: '-'},
            {title :'รายได้จากการขายทั้งหมด',data:'total', className: 'text-center', defaultContent: '-'},
          ],
          rowCallback: function(nRow, aData, dataIndex){

              $('td:eq(0)',nRow).html('<input type="checkbox" name="rCheck[]" value="'+aData['id_s']+'"  data-user="'+aData['id_user']+'" onchange="rCheck(this);">');

            //   $('td:last-child',nRow).html('<button type="button" onclick="detail('+aData['id_s']+');" class="btn btn-sm btn-success"><i class="fa fa-file-o"></i></button>');            

      }
    });

    $('#seach-btn').click(function(){

        oTable.draw();

    });

    $('#sell-btn').click(function(){

        var data = $('#formCheck').serializeArray();
        var id = [];

        data.forEach(function(e){

            if(e.name == "rCheck[]"){

               id.push(e.value);

            }

        });

        if(id.length == 0){
            alert('กรุณาเลือกรายชื่อที่จะแจ้งกำหนดชำระเงิน');
        }else{

            $('#idSelect').val(id.join(','));
            $('#myModalSell').modal();

        }



    });
    
});

function rCheck(data){

    var id_user = $(data).data('user');

    var cHeck = $('#Check_iduser').val();

    if(cHeck == "" || cHeck == id_user){
       $('#Check_iduser').val(id_user); 
    }else{
        alert('กรุณาเลือกที่ user เดียวกันเท่านั้น');
        $('#Check_iduser').val("");
        oTable.draw();
    }


}


function sellDateSell(){


    if(confirm("ยันยันการชำระเงิน")){

        
        $.ajax('{{ action("ReportSellController@update") }}',{
            type:'POST',
            data:$('#sellDate').serialize(),
            dataType:'html',
            success:function(d){
                $('#myModalSell').modal('toggle');
                oTable.draw();
            }
        });
    }


}


function detail(id){

    var text;
    var total = 0;

    $.ajax('{{ action("ReportSellController@detailReport") }}',{
        type:'POST',
        data:{
            id:id
        },
        dataType:'json',
        success:function(data){
            
            text = '<table class="table-bordered" style="width:100%">'
                    +'<tr>'
                    +'<th>วันที่ขาย</th>'
                    +'<th>เวลา</th>'
                    +'<th>ชื่อหนังสือ</th>' 
                    +'<th>ตอนที่เปิดขาย</th>' 
                    +'<th>ชื่อผู้แต่ง</th>'
                    +'<th>ราคาขาย</th>'
                    +'</tr>'  

            data.forEach(function(d){

            var dArray = d['date_time'].split(' ');

            text +='<tr>'
                    +'<th>'+dArray[0]+'</th>'
                    +'<th>'+dArray[1]+'</th>'
                    +'<th>'+d['name_book']+'</th>' 
                    +'<th>'+d['name_chap']+'</th>' 
                    +'<th>'+d['name_writer']+'</th>'
                    +'<th>'+d['price']+'</th>'
                    +'</tr>'

            total += d['price'];

                
            });

            text += '<tr><td colspan="4" style="text-rigth"></td><td>รวม</td><td>'+total+'</td></tr>'
                    +'</table>';

            $('#detail').html(text);
    
        }


    });


    $('#myModal').modal();
}



</script>
@endpush
