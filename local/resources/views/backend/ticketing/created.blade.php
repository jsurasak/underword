@extends('backend.layouts.default')
<style>
    .table > tbody > tr > td{
        vertical-align: middle;
        font-size:13px;
        text-align: center;
        
    }
    .table-input > tbody > tr > td{
        border: solid 1px #ccc !important;
    }
    .table-box {
        table-layout: fixed;
    }
    .table-number > tbody > tr > td {
        padding: 20px;
        background-color: #ccc;
        border: solid 10px #fff !important;
    }
    .table-button-total > tbody > tr > td  {
        padding: 20px;
        border: solid 5px #ccc !important;
    }

</style>
@section('content')
<div class="main-body">
    <div class="page-wrapper">

        <div class="page-header card">
            <div class="card-block">
                <h5 class="m-b-10">หน้าจัดการ ticketing</h5>
                <ul class="breadcrumb-title b-t-default p-t-10">
                    <li class="breadcrumb-item">
                        <a href="{{ asset('') }}"> <i class="fa fa-home"></i> </a>
                    </li>
                    <li class="breadcrumb-item">ระบบออกตั๋ว</a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="row">
            
            <div class="col-md-5 col-sm-12"> 
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
                            <table class="table table-box table-borderless table-input" class="my-3">
                                <tr style="background-color: #929292;">
                                    <td width="10%">Group</td>
                                    <td>Ticket Type</td>
                                    <td>Price</td>
                                    <td>Quantity</td>
                                    <td>Total</td>
                                    <td rowspan="5" style="background-color: #f94040;color: #fff;"><h4>Add</h4></td>
                                </tr>
                                <tr>
                                    <td rowspan="4" class="text-center" style="background-color: #408af99e;color: #fff;">Regular <br> Rate</td>
                                    <td>Thai Adult</td>
                                    <td><h4>250</h4></td>
                                    <td><input type="text" class="form-control"></td>
                                    <td><input type="text" class="form-control"></td>
                                </tr>
                                <tr>
                                    <td>Thai Child</td>
                                    <td><h4>150</h4></td>
                                    <td><input type="text" class="form-control"></td>
                                    <td><input type="text" class="form-control"></td>
                                </tr>
                                <tr>
                                    <td>Foreigner Adult</td>
                                    <td><h4>500</h4></td>
                                    <td><input type="text" class="form-control"></td>
                                    <td><input type="text" class="form-control"></td>
                                </tr>
                                <tr>
                                    <td>Foreigner Child</td>
                                    <td><h4>300</h4></td>
                                    <td><input type="text" class="form-control"></td>
                                    <td><input type="text" class="form-control"></td>
                                </tr>
                            </table>                 
                            <table class="table table-box table-borderless table-input"  class="my-3">
                                <tr style="background-color: #929292;">
                                    <td>Group</td>
                                    <td>Ticket Type</td>
                                    <td>Price</td>
                                    <td>Quantity</td>
                                    <td>Total</td>
                                    <td>Discount</td>
                                    <td>Net</td>
                                    <td rowspan="6" style="background-color: #f94040;color: #fff;"><h4>Add</h4></td>
                                </tr>
                                <tr>
                                    <td rowspan="5" class="text-center" style="background-color: #f94040;color: #fff;">Regular <br> Rate</td>
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
                                    <td>Foreigner <br> Adult</td>
                                    <td><input type="text" class="form-control"></td>
                                    <td><input type="text" class="form-control"></td>
                                    <td><input type="text" class="form-control"></td>
                                    <td><input type="text" class="form-control"></td>
                                    <td><input type="text" class="form-control"></td>
                                </tr>
                                <tr>
                                    <td>Foreigner <br> Child</td>
                                    <td><input type="text" class="form-control"></td>
                                    <td><input type="text" class="form-control"></td>
                                    <td><input type="text" class="form-control"></td>
                                    <td><input type="text" class="form-control"></td>
                                    <td><input type="text" class="form-control"></td>
                                </tr>
                            </table>
                            <table class="table table-box table-borderless table-number"  class="my-3">
                                <tr>
                                    <td><h4>1</h4></td>
                                    <td><h4>2</h4></td>
                                    <td><h4>3</h4></td>
                                    <td><h4>4</h4></td>
                                    <td><h4>5</h4></td>
                                    <td rowspan="2"><h4>C</h4></td>
                                </tr>
                                <tr>
                                    <td><h4>6</h4></td>
                                    <td><h4>7</h4></td>
                                    <td><h4>8</h4></td>
                                    <td><h4>9</h4></td>
                                    <td><h4>0</h4></td>
                                </tr>
                            </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-7 col-sm-12">
                <div class="card tabs-card" >
                    <div class="card-block p-0" style="height: 564px;">  
                        <div class="tab-content card-block ">
                            <table width="100%" class="table table-striped">
                                <thead >
                                    <th class="text-center">Void</th>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Event</th>
                                    <th class="text-center">Type</th>
                                    <th class="text-center">Price</th>
                                    <th class="text-center">Qty</th>
                                    <th class="text-center">Total</th>
                                    <th class="text-center">Disc</th>
                                    <th class="text-center">Net</th>
                                </thead>
                                <tbody>
                                    <?php for($i=0;$i<10;$i++): ?>
                                        <tr>
                                            <td>#</td>
                                            <td>#</td>
                                            <td>####</td>
                                            <td>##</td>
                                            <td>#####</td>
                                            <td>###</td>
                                            <td>#####</td>
                                            <td>##</td>
                                            <td>####</td>
                                        <tr>
                                    <?php endfor ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    </div>
                    <div class="card tabs-card" >
                    <div class="card-block p-0">
                    <div class="tab-content card-block p-0 ">
                            <table width="100%" class="table-button-total">
                               <tr>
                                <td colspan="5" class="text-center"><h5>Total</h5></td>
                               <tr>
                               <tr>
                                <td rowspan="2" class="text-center" style="background-color: #f94040;color: #fff;">
                                    <h4>Delete</h4>
                                </td>
                                <td>Thai Adult : 0</td>
                                <td>Thai Child : 0</td>
                                <td>Free : 0</td>
                                <td rowspan="4" class="text-center" style="background-color: #24b72f;color: #fff;"><h3>Payment</h3></td>
                               </tr>
                               <tr>
                                <td>Foreigner Adult : 0</td>
                                <td colspan="2">Foreigner Child : 0</td>
                               <tr>
                               <tr>
                                <td>Note</td>
                                <td colspan="3">
                                    <textarea rows="3" class="form-control"></textarea>
                                </td>
                               </tr>
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