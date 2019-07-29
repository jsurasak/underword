@extends('backend.layouts.default')
@section('content')
        
<div class="main-body">
    <div class="page-wrapper">

        <div class="page-header card">
            <div class="card-block">
                <h5 class="m-b-10">หน้าจัดการ รายการสั่งซื้อ</h5>
                <ul class="breadcrumb-title b-t-default p-t-10">
                    <li class="breadcrumb-item">
                        <a href="{{ asset('') }}"> <i class="fa fa-home"></i> </a>
                    </li>
                    <li class="breadcrumb-item">รายการสั่งซื้อ</a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <select id="seach_status">
                    <option value="0">เรียงตามวันที่</option>
                    <option value="1" selected>เรียงตามที่ยังไม่จัดการ</option>
                </select>
                <input type="hidden" value="1" id="seach_status_input">
                <!-- <span>use class <code>table</code> inside table element</span> -->
                <div class="card-header-right">
                    <ul class="list-unstyled card-option">
                        <li><i class="fa fa-chevron-left"></i></li>
                        <li><i class="fa fa-window-maximize full-card"></i></li>
                        <li><i class="fa fa-minus minimize-card"></i></li>
                        <li><i class="fa fa-refresh reload-card"></i></li>
                        <li><i class="fa fa-times close-card"></i></li>
                    </ul>
                </div>
            </div>
            <div class="card-block table-border-style">
                <div class="table-responsive">
                    <table id="data-table" class="table table-striped table-bordered nowrap dataTable">
                        
                    </table>
                </div>
            </div>
        </div>



    </div>        
</div>

<div id="modal_detail" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Order Detail</h4>  
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body" id="detail">
        
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
  			url: '{{ action("OrderController@datatable") }}',
  			data: function ( d ) {
                  d.seach = $('#seach_status_input').val();
              },
              method: 'POST'
          },
        columns: [
          {title :'หมายเลข Order',data:'order_code', className: 'text-center', defaultContent: '-'},
          {title :'วันที่สั่ง',data:'created_at', className: 'text-center', defaultContent: '-'},
          {title :'ชื่อผู้สั่ง',data:'name', className: 'text-center', defaultContent: '-'},
          {title :'เบอรฺ์โทรศํพท์',data:'tel', className: 'text-center', defaultContent: '-'},
          {title :'สถานะ',data:'status', className: 'text-center', defaultContent: '-'},
          {title :'ดูรายละเอียด',data:'id', className: 'text-center', defaultContent: '-'},
        ],
        rowCallback: function(nRow, aData, dataIndex){

          $('td:eq(0)',nRow).html('#'+aData['order_code']);

          $('td:eq(2)',nRow).html(aData['name']+' '+aData['lastname']);  
    
          $('td:eq(4)',nRow).html(''
            +'<select onchange="orderchange(this,'+aData["id"]+')" class="form-control">'
            +'<option value="0" '+((aData['status'] == 0)?"selected":"")+'>รอการยืนยัน</option>'
            +'<option value="1" '+((aData['status'] == 1)?"selected":"")+'>ยืนยันการส่ง</option>'
            +'<option value="2" '+((aData['status'] == 2)?"selected":"")+'>ยกเลิกorder</option>'
            +'<select>'
            );

          $('td:last-child', nRow).html(''
            +'<a onclick="detail('+aData['id']+');" class="" style="margin:0px;"><i class="fas fa-2x fa-info-circle"></i></a>'
    			);

        }
    });
});


function orderchange(d,id){

    var status = $(d).val();
    var ems = "";

    if(status == 1){

        var ems = prompt("ใส่รหัสเลข ems");

    }

    $.ajax({
        url: '{{ action("OrderController@ems") }}',
        method:'POST',
        data:{
            id:id,
            ems:ems,
            status:status,
        },
        dataType:'json',
        success:function(data){

            oTable.draw();

        }

    });


};


$('#seach_status').change(function(){

    var select = $(this).val();
    $('#seach_status_input').val(select);
    oTable.draw();

});

function detail(id){


    $.ajax({
        url:'{{ action("OrderController@detail") }}',
        method:'post',
        data:{
            id:id
        },
        dataType:'json',
        success:function(d){


        var html = "<table class='table' width='100%'>"
                  +"<tr><td>อีเมล</td><td colspan='2'>"+d['order']['email']+"</td></tr>"
                  +"<tr><td>ที่อยู่</td><td colspan='2'>"+d['order']['location']+"</td></tr>"
                  +"<tr><td>เมือง</td><td colspan='2'>"+d['order']['city']+"</t></tr>"
                  +"<tr><td>รหัสไปรษณีย์</td><td colspan='2'>"+d['order']['zipcode']+"</td></tr>"
                  +"<tr><td>ประเภทการส่ง</td><td colspan='2'>"+d['order']['ems']+"</td></tr>"
                  +"<tr><td>EMS</td><td colspan='2'>"+d['order']['ems_code']+"</td></tr>"
                  +"<tr><td>ราคา order</td><td colspan='2'>"+d['order']['total']+"</td></tr>";

            if(d['order_tax']){

            html += "<tr class='text-center'><td colspan='3'>ข้อมูลที่อยู่สำหรับใบเสร็จ / ใบกำกับภาษี</td></tr>"
                    +"<tr><td>ชื่อ</td><td colspan='2'>"+d['order_tax']['name']+" "+d['order_tax']['last_name']+"</td></tr>"
                    +"<tr><td>อีเมล์</td><td colspan='2'>"+d['order_tax']['email']+"</t></tr>"
                    +"<tr><td>เบอร์โทร</td><td colspan='2'>"+d['order_tax']['tel']+"</td></tr>"
                    +"<tr><td>ที่อยู่</td><td colspan='2'>"+d['order_tax']['location']+"</td></tr>"
                    +"<tr><td>เมือง</td><td colspan='2'>"+d['order_tax']['city']+"</t></tr>"
                    +"<tr><td>รหัสไปรษณีย์</td><td colspan='2'>"+d['order_tax']['zipcode']+"</td></tr>";
                

            }

            html +="<tr class='text-center'><td colspan='3'>รายการสั่งซื้อ</td></tr>"
                  +"<tr class='text-center'><td>สินค้า</td><td>รหัส</td><td>package</td><td>จำนวน</td></tr>";

        $.each(d['items'],function(k,v){

            html += "<tr class='text-center'><td>"+v['name_th']+"</td><td>"+v['code_item']+"</td><td>"+v['package']+"</td><td>"+v['count']+"</td></tr>";

        });

        html += "</table>";
                  
        $('#detail').html(html);

        $('#modal_detail').modal();
        
        }

        
    
    });


}


</script>
@endpush