@extends('backend.layouts.default')
@section('content')
        
<div class="main-body">
    <div class="page-wrapper">

        <div class="page-header card">
            <div class="card-block">
                <h5 class="m-b-10">หน้าจัดการ ผู้ดูแลระบบ</h5>
                <ul class="breadcrumb-title b-t-default p-t-10">
                    <li class="breadcrumb-item">
                        <a href="{{ asset('') }}"> <i class="fa fa-home"></i> </a>
                    </li>
                    <li class="breadcrumb-item">Admin</a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <a href="{{ action('AdminController@create') }}" class="btn btn-primary">New User</a>
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
  			url: '{{ action("AdminController@datatable") }}',
  			data: function ( d ) {},
              method: 'POST'
          },
        columns: [
          {title :'UserName',data:'username', className: 'text-center', defaultContent: '-'},
          {title :'Name',data:'name', className: 'text-center', defaultContent: '-'},
          {title :'Email',data:'email', className: 'text-center', defaultContent: '-'},
          {title :'Action',data:'id', className: 'text-center', defaultContent: '-'},
        ],
        rowCallback: function(nRow, aData, dataIndex){
    

          $('td:last-child', nRow).html(''
    		+'<a href="{{ action("AdminController@index") }}/'+aData['id']+'/edit" style="margin:0px 2px;color:#1aff1a"><i class="fas fa-2x fa-edit"></i></a>'
            +'<a href="{{ action("AdminController@index") }}/'+aData['id']+'/password" style="margin:0px;color:#ff9900"><i class="fas fa-2x fa-key"></i></a>'
            +'<a onclick="del('+aData['id']+');" class="" style="margin:0px;color:#ff3300"><i class="fas fa-2x fa-trash-alt"></i></a>'
    			);

        }
    });
});

function del(id){

	if(confirm('Are you sure confirm delete')){
			document.location = 'admin/'+id+'/delete';
	}

}


</script>
@endpush