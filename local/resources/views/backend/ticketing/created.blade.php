@extends('backend.layouts.default')
<style>
    .table > tbody > tr > td{
        vertical-align: middle;
    }
    .table-box {
        table-layout: fixed;
    }
</style>
@section('content')
<div class="main-body">
    <div class="page-wrapper">

        <div class="page-header card">
            <div class="card-block">
                <h5 class="m-b-10">หน้าจัดการ Banner</h5>
                <ul class="breadcrumb-title b-t-default p-t-10">
                    <li class="breadcrumb-item">
                        <a href="{{ asset('') }}"> <i class="fa fa-home"></i> </a>
                    </li>
                    <li class="breadcrumb-item">Banner</a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="row">
            
            <div class="col-md-6 col-sm-12"> 
                <div class="card tabs-card" >
                    <div class="card-block p-0">  
                        <div class="tab-content card-block ">
                            <div class="col-xs-12">      
                            <table class="table table-borderless"  class="my-3">
                                <tr>
                                    <td>Event</td>
                                    <td>
                                        <select class="form-control">
                                            <option>--select--</option>
                                        </select>
                                    </td>
                                    <td>Date</td>
                                    <td>
                                    <input type="date" class="form-control" id="exampleInputEmail2" >
                                    </td>
                                </tr>
                            </table>
                            <table class="table table-box table-borderless" class="my-3">
                                <tr>
                                    <td width="10%">Group</td>
                                    <td>Ticket Type</td>
                                    <td>Price</td>
                                    <td>Quantity</td>
                                    <td>Total</td>
                                    <td rowspan="5"><button class="btn" type="button">Add</button></td>
                                </tr>
                                <tr>
                                    <td rowspan="4" class="text-center">Regular <br> Rate</td>
                                    <td>Thai Adult</td>
                                    <td><button type="button" class="btn">250</button></td>
                                    <td><input type="text" class="form-control"></td>
                                    <td><input type="text" class="form-control"></td>
                                </tr>
                                <tr>
                                    <td>Thai Child</td>
                                    <td><button type="button" class="btn">150</button></td>
                                    <td><input type="text" class="form-control"></td>
                                    <td><input type="text" class="form-control"></td>
                                </tr>
                                <tr>
                                    <td>Foreigner Adult</td>
                                    <td><button type="button" class="btn">500</button></td>
                                    <td><input type="text" class="form-control"></td>
                                    <td><input type="text" class="form-control"></td>
                                </tr>
                                <tr>
                                    <td>Foreigner Child</td>
                                    <td><button type="button" class="btn">300</button></td>
                                    <td><input type="text" class="form-control"></td>
                                    <td><input type="text" class="form-control"></td>
                                </tr>
                            </table>                 
                            <table class="table table-box table-borderless"  class="my-3">
                                <tr>
                                    <td>Group</td>
                                    <td>Ticket Type</td>
                                    <td>Price</td>
                                    <td>Quantity</td>
                                    <td>Total</td>
                                    <td>Discount</td>
                                    <td>Net</td>
                                    <td rowspan="6"><button class="btn" type="button">Add</button></td>
                                </tr>
                                <tr>
                                    <td rowspan="5" class="text-center">Regular <br> Rate</td>
                                    <td>Thai Adult</td>
                                    <td><input type="text" class="form-control"></td>
                                    <td><input type="text" class="form-control"></td>
                                    <td><input type="text" class="form-control"></td>
                                    <td><input type="text" class="form-control"></td>
                                    <td><input type="text" class="form-control"></td>
                                </tr>
                                <tr>
                                    <td>Thai Child</td>
                                    <td><input type="text" class="form-control"></td>
                                    <td><input type="text" class="form-control"></td>
                                    <td><input type="text" class="form-control"></td>
                                    <td><input type="text" class="form-control"></td>
                                    <td><input type="text" class="form-control"></td>
                                </tr>
                                <tr>
                                    <td>Foreigner Adult</td>
                                    <td><input type="text" class="form-control"></td>
                                    <td><input type="text" class="form-control"></td>
                                    <td><input type="text" class="form-control"></td>
                                    <td><input type="text" class="form-control"></td>
                                    <td><input type="text" class="form-control"></td>
                                </tr>
                                <tr>
                                    <td>Foreigner Child</td>
                                    <td><input type="text" class="form-control"></td>
                                    <td><input type="text" class="form-control"></td>
                                    <td><input type="text" class="form-control"></td>
                                    <td><input type="text" class="form-control"></td>
                                    <td><input type="text" class="form-control"></td>
                                </tr>
                            </table>
                            <table class="table table-box table-borderless"  class="my-3">
                                <tr>
                                    <td><button class="btn">1</button></td>
                                    <td><button class="btn">2</button></td>
                                    <td><button class="btn">3</button></td>
                                    <td><button class="btn">4</button></td>
                                    <td><button class="btn">5</button></td>
                                    <td rowspan="2"><button class="btn">C</button></td>
                                </tr>
                                <tr>
                                    <td><button class="btn">6</button></td>
                                    <td><button class="btn">7</button></td>
                                    <td><button class="btn">8</button></td>
                                    <td><button class="btn">9</button></td>
                                    <td><button class="btn">0</button></td>
                                </tr>
                            </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-sm-12">
                <div class="card tabs-card" >
                    <div class="card-block p-0">  
                        <div class="tab-content card-block ">
                            <table width="100%">
                                <thead>
                                    <th>Void</th>
                                    <th>No</th>
                                    <th>Event</th>
                                    <th>Type</th>
                                    <th>Price</th>
                                    <th>Qty</th>
                                    <th>Total</th>
                                    <th>Disc</th>
                                    <th>Net</th>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>


    </div>        
</div>


<div id="modalupload" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Uploade Picture</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
    <form  method="POST" enctype="multipart/form-data">
      {{ csrf_field() }}
      <div class="modal-body">
        <input type="hidden" id="id" name="id">
        <input type="hidden" id="type" name="type">
        <div class="col-xs-12" style="margin-bottom:1rem">
            <img id="preview" src="{{ url('../') }}/image/default.jpg" width="100%">    
        </div>
        <input type="file" name="picture" id="picture">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success">Save</button>
      </div>
    </form>
    </div>

  </div>
</div>

@stop

@push('scripts')
<script>


    function upload(id,type){

        $('#modalupload').modal();
        $('#id').val(id);
        $('#type').val(type);

    }

    function readURL(input) {

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
        $('#preview').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
    }

    $("#picture").change(function() {
    readURL(this);
    });

</script>
@endpush