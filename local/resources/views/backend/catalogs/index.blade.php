@extends('backend.layouts.default')
@section('content')
        
<div class="main-body">
    <div class="page-wrapper">

        <div class="page-header card">
            <div class="card-block">
                <h5 class="m-b-10">หน้าจัดการ หมวดหมู่สินค้า</h5>
                <ul class="breadcrumb-title b-t-default p-t-10">
                    <li class="breadcrumb-item">
                        <a href="{{ asset('') }}"> <i class="fa fa-home"></i> </a>
                    </li>
                    <li class="breadcrumb-item">หมวดหมู่สินค้า</a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <a href="{{ action('CatalogsController@create') }}" class="btn btn-primary">เพิ่มหมวดหมู่สินค้า</a>
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
  			url: '{{ action("CatalogsController@datatable") }}',
  			data: function ( d ) {},
              method: 'POST'
          },
        columns: [
          {title :'name TH',data:'name_th', className: 'text-center', defaultContent: '-'},
          {title :'name EN',data:'name_en', className: 'text-center', defaultContent: '-'},
          {title :'name CN',data:'name_cn', className: 'text-center', defaultContent: '-'},
          {title :'Action',data:'id', className: 'text-center', defaultContent: '-'},
        ],
        rowCallback: function(nRow, aData, dataIndex){


          $('td:last-child', nRow).html(''
    		+'<a href="{{ action("CatalogsController@index") }}/'+aData['id']+'/edit" style="margin:0px 2px;color:#1aff1a"><i class="fas fa-2x fa-edit"></i></a>'
            +'<a onclick="del('+aData['id']+');" class="" style="margin:0px;color:#ff3300"><i class="fas fa-2x fa-trash-alt"></i></a>'
    			);

        }
    });
});

function del(id){

	if(confirm('Are you sure confirm delete')){
			document.location = 'catalogs/'+id+'/delete';
	}

}


</script>
@endpush