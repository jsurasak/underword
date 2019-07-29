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
                    <li class="breadcrumb-item">New Password</a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h5>Admin</h5>
                <span>New Password</span>
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
                <form id="myForm" method="post" action="{{ action('AdminController@savepassword') }}" >
                    {{ csrf_field() }}
                    <input type="hidden" name="id" value="{{ $id }}">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                            <input type="password" name="password" id="password" class="form-control">
                        </div>
                    </div>
                    <div class="form-group text-right">
                    <button type="button" class="btn btn-default" style="margin-right:1rem">Back</button>
                    <button type="submit" class="btn-submit btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>



    </div>        
</div>

@stop
@push('scripts')
<script>


</script>
@endpush