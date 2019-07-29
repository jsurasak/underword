@extends('backend.layouts.default')
@section('content')
        
<div class="main-body">
    <div class="page-wrapper">

        <div class="page-header card">
            <div class="card-block">
                <h5 class="m-b-10">หน้าจัดการ สินค้า</h5>
                <ul class="breadcrumb-title b-t-default p-t-10">
                    <li class="breadcrumb-item">
                        <a href="{{ asset('') }}"> <i class="fa fa-home"></i> </a>
                    </li>
                    <li class="breadcrumb-item">สินค้า</a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <a href="{{ action('ProductsController@create') }}" class="btn btn-primary">เพิ่ม สินค้า</a>
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

@stop

@push('scripts')
<script>
$(function() {
    
        
        
    oTable = $('#data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
  			url: '{{ action("ProductsController@datatable") }}',
  			data: function ( d ) {},
              method: 'POST'
          },
        columns: [
          {title :'ชื่อ',data:'name_th', className: 'text-center', defaultContent: '-'},
          {title :'ราคาขาย',data:'price_th', className: 'text-center', defaultContent: '-'},
          {title :'ต้นทุน',data:'cost_th', className: 'text-center', defaultContent: '-'},
          {title :'จำนวน',data:'count', className: 'text-center', defaultContent: '-'},
          {title :'หมวดหมู่',data:'type', className: 'text-center', defaultContent: '-'},
          {title :'สถานะ',data:'status', className: 'text-center', defaultContent: '-'},
          {title :'Action',data:'id', className: 'text-center', defaultContent: '-'},
        ],
        rowCallback: function(nRow, aData, dataIndex){
  
        if(aData['status'] == 0){
            status = '<span class="btn btn-warning btn-sm" onclick="changestatus('+aData['id']+','+aData['status']+')" style="border-radius: 40px;">ปิดใช้งาน</span>';
        }else{
            status = '<span class="btn btn-success btn-sm" onclick="changestatus('+aData['id']+','+aData['status']+')" style="border-radius: 40px;">เปิดใช้งาน</span>';
        }

        var type = aData['type'].split(',');
        
        var arrayType = '<?php echo json_encode($type); ?>';

        var obj = JSON.parse(arrayType); 
        var type_text = [];


        $.each(type,function(k,v){
            type_text.push(obj[v]);
        });
        
        $('td:eq(4)',nRow).html(type_text.join(','));

        $('td:eq(5)',nRow).html(status);



          $('td:last-child', nRow).html(''
    		+'<a href="{{ action("ProductsController@index") }}/'+aData['id']+'/edit" style="margin:0px 2px;color:#1aff1a"><i class="fas fa-2x fa-edit"></i></a>'
            +'<a onclick="del('+aData['id']+');" class="" style="margin:0px;color:#ff3300"><i class="fas fa-2x fa-trash-alt"></i></a>'
    			);

        }
    });
});

function del(id){

	if(confirm('Are you sure confirm delete')){
			document.location = 'product/'+id+'/delete';
	}

}
function changestatus(id,status){

    if(status == 1){
        var status_send = 0;
    }else{
        var status_send = 1;
    }

    $.get("{{ action('ProductsController@index') }}/"+id+"/status/"+status_send,function( data ) {

        oTable.draw();

    });

}


</script>
@endpush