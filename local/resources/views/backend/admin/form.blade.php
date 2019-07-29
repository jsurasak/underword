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
                    <li class="breadcrumb-item">
                        <a href="{{ action('AdminController@index') }}">Admin</a>
                    </li>
                    <li class="breadcrumb-item">Form</a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h5>Admin</h5>
                <span>Form {{  ((isset($data))?'Edit':'New') }}</span>
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
            <div class="card-block">
                <form id="myForm" method="post" action="{{ ((isset($data) )? action('AdminController@save') : action('AdminController@add') ) }}" >
                    {{ csrf_field() }}

                    @if(isset($data))
                        <input type="hidden" name="id" value="{{ $data->id }}">
                    @endif
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">User Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="username" name="username" value="{{ ((isset($data))?$data->username:'') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="name" name="name" value="{{ ((isset($data))?$data->name:'') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="email" name="email" value="{{ ((isset($data))?$data->email:'') }}" >
                        </div>
                    </div>
                    @if(!isset($data))
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                            <input type="password" name="password" id="password" class="form-control">
                        </div>
                    </div>
                    @endif
                    <div class="form-group text-right">
                    <button type="button" class="btn btn-default" style="margin-right:1rem">Back</button>
                    <button type="button" class="btn-submit btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>



    </div>        
</div>

@stop
@push('scripts')
<script>

    $(function(){

        $('.btn-submit').click(function(){

            var username = $('#username').val();
            var name = $('#name').val();
            var email = $('#email').val();
            
            $('#username').addClass('form-control-danger');
            $('#name').addClass('form-control-danger');
            $('#email').addClass('form-control-danger');

            if($('#username').val() != "")$('#username').removeClass('form-control-danger').addClass('form-control-success');
            if($('#name').val() != "")$('#username').removeClass('form-control-danger').addClass('form-control-success');
            if($('#email').val() != "")$('#username').removeClass('form-control-danger').addClass('form-control-success');

            if(username == ""){

                $('#username').focus();

            }else if(name == ""){

                $('#name').focus();

            }else if(email == ""){

                $('#email').focus();

            }else{

                $('#myForm').submit();  
                  

            }
        
        
        });

    });




</script>
@endpush