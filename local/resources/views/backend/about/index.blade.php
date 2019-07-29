@extends('backend.layouts.default')
@section('content')
		<div id="content" class="content">
			<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
				<li><a href="javascript:;">Home</a></li>
				<li class="active">AboutUs</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">จัดการ AboutUs</h1>
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
                            <h4 class="panel-title">จัดการ เกี่ยวกับเรา</h4>
                        </div>

                        <div class="panel-body">
                            <form id="myForm1" action="{{ action('AboutusController@updatedetail') }}" method="POST">
                            {{ csrf_field() }}
                            <input type="hidden" name="id" value="1">
                            <textarea class="ckeditor" name="detail" id="detail1" rows="10">{{ $detail->detail }}</textarea>
                            </form>
                            <br>
                            <div class="row" style="padding: 0px 2px 0 0;">
                            <div class="col-md-6 text-left" >
                                <div class="pull-left w210">
                                </div>
                            </div>
                            <div class="col-md-6 text-right" >
                                <a onclick="$('#myForm1').submit();" class="btn btn-sm btn-success">submit</a>
                            </div>
                            </div>
                        </div>
                    </div>
                    <!-- end panel -->
                </div>
                <!-- end col-12 -->
            </div>
            <!-- end row -->
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
                            <h4 class="panel-title">Q & A</h4>
                        </div>

                        <div class="panel-body">
                          <div class="row" style="padding: 0px 2px 0 0;">
                            <div class="col-md-6 text-left" >
                                <div class="pull-left w210">
                                </div>
                            </div>
                            <div class="col-md-6 text-right" >
                                <a id="addModal" class="btn btn-sm btn-success">Create คำถาม & คำตอบ</a>
                            </div>
                            </div>
                            <br>
                          <table id="data-table" class="table table-striped table-bordered"></table>
                        </div>
                    </div>
                    <!-- end panel -->
                </div>
                <!-- end col-12 -->
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
                            <h4 class="panel-title">ติดต่อโฆษณา</h4>
                        </div>

                        <div class="panel-body">
                            <form id="myForm3" action="{{ action('AboutusController@updatedetail') }}" method="POST">
                            {{ csrf_field() }}
                            <input type="hidden" name="id" value="2">
                            <textarea class="ckeditor" name="detail" id="detail2" rows="10">{{ $ad->detail }}</textarea>
                            </form>
                            <br>
                            <div class="row" style="padding: 0px 2px 0 0;">
                            <div class="col-md-6 text-left" >
                                <div class="pull-left w210">
                                </div>
                            </div>
                            <div class="col-md-6 text-right" >
                                <a onclick="$('#myForm3').submit();" class="btn btn-sm btn-success">submit</a>
                            </div>
                            </div>
                        </div>
                    </div>
                    <!-- end panel -->
                </div>
                <!-- end col-12 -->
            </div>
            <!-- end row -->
            </div>
		</div>

<div id="modalForm" class="modal fade" role="dialog">
  <div class="modal-dialog" style="width:75%;">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" id="heade">แบบฟอร์ม</h4>
      </div>
      <div class="modal-body">
        <div class="row">
            <form id="myform" class="form-horizontal">
                <input type="hidden" name="id" id="id">
                <input type="hidden" name="typeF" id="typeF" value="add" > 
                <div class="form-group">
                    <label class="control-label col-sm-3" >คำถาม:</label>
                    <div class="col-sm-8">
                    <textarea class="form-control" name="question" id="question" rows="3"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3" >คำตอบ:</label>
                    <div class="col-sm-8">
                    <textarea class="form-control" name="answer" id="answer" rows="3"></textarea>
                    </div>
                </div>
            </form>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" onclick="submit();" class="btn btn-primary" >Submit</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>


@stop

@push('scripts')
<script>

var myToolBar = [
       
       { name: 'basicstyles', items: [ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'CopyFormatting', 'RemoveFormat' ] },
       { name: 'paragraph', items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', 'CreateDiv', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-', 'BidiLtr', 'BidiRtl', 'Language' ] },
       { name: 'styles', items: [ 'Styles', 'FontSize' ] },
       { name: 'colors', items: [ 'TextColor', 'BGColor' ] },
       { name: 'tools', items: [ 'Maximize', 'ShowBlocks' ] },
       { name: 'insert', items: [ 'Image','Youtube']},
	'/',
       
];

var config = {};
config.toolbar = myToolBar;
config.extraPlugins = 'youtube';
CKEDITOR.replace( 'detail1',config);
CKEDITOR.replace( 'detail2',config);

$(function() {
  		oTable = $('#data-table').DataTable({

          processing: true,
          serverSide: true,
          ajax: {
    			url: '{{ action("AboutusController@datatable") }}',
                method: 'POST'
            },
          columns: [
            {title :'คำถาม',data:'question', className: 'text-center', defaultContent: '-'},
            {title :'คำตอบ',data:'answer', className: 'text-center', defaultContent: '-'},
            {title :'Action',data:'id', className: 'text-center', defaultContent: '-'},
          ],
          rowCallback: function(nRow, aData, dataIndex){


             $('td:last-child',nRow).html(''
                +'<a onclick="edit('+aData['id']+')" class="btn btn-sm btn-success">แก้ไข</a> '
                +'<button onclick="del('+aData['id']+');" class="btn btn-sm btn-danger">ลบ</button> '    
            );

            

      }
    });
    
});


$('#addModal').click(function(){

            $('#modalForm').modal();
            $('#id').val("");
            $('#typeF').val('add');
            $('#question').val("");
            $('#answer').val("");

})

function edit(id){

        $.ajax('{{ action("AboutusController@editquestion") }}', {
        type: 'POST',
        data: {
            'id':id
        },
        dataType: 'json',
        success: function(data) {

            $('#modalForm').modal();
            $('#id').val(id);
            $('#typeF').val('edit');
            $('#question').val(data['question']);
            $('#answer').val(data['answer']);

            
        }
    });

    

}

function submit(){

    
    $.ajax('{{ action("AboutusController@addquestion") }}', {
        type: 'POST',
        data:$('#myform').serialize(),
        dataType: 'html',
        success: function(data) {
            $('#modalForm').modal('toggle');
            if($('#typeF').val() == "update"){
            swal("Updata Success", "Update Success", "success");
            }else{
            swal("Updata Success", "Insert Success", "success");
            }
            oTable.draw();
            
        }
    });


    
}

function del(id){

    if(confirm('ยืนยันการลบข้อมูล')){

        $.ajax('{{ action("AboutusController@delete") }}', {
        type: 'POST',
        data:{'id':id },
        dataType: 'html',
        success: function(data) {
            swal("Delete Success", "Delete Success", "success");
            oTable.draw();
        }
    });

    }
    

}




</script>
@endpush
