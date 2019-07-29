@extends('backend.layouts.default')
@section('content')

<div class="main-body">
    <div class="page-wrapper">
        <!-- Page-body start -->
        <div class="page-body">
            <div class="row">
                <!-- order-card start -->
                <div class="col-md-6 col-xl-4">
                    <div class="card bg-c-blue order-card">
                        <div class="card-block">
                            <h6 class="m-b-20">Orders in process</h6>
                            <h2 class="text-right"><i class="fas fa-shopping-cart f-left"></i></i><span>{{ $data['order_in'] }}</span></h2>
                            <p class="m-b-0">Completed Orders<span class="f-right">{{ $data['order_success'] }}</span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="card bg-c-green order-card">
                        <div class="card-block">
                            <h6 class="m-b-20">Total Product</h6>
                            <h2 class="text-right"><i class="fas fa-boxes f-left"></i><span>{{ $data['total_product'] }}</span></h2>
                            <p class="m-b-0"><span class="f-right">-</span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="card bg-c-yellow order-card">
                        <div class="card-block">
                            <h6 class="m-b-20">Total Sell In Month</h6>
                            <h2 class="text-right"><i class="fas fa-bookmark f-left"></i><span>{{ $data['total_sell_inmonth'] }}</span></h2>
                            <p class="m-b-0">Total Sell All<span class="f-right">{{ $data['total_sell'] }}</span></p>
                        </div>
                    </div>
                </div>
               
                <!-- order-card end -->

                <!-- statustic and process start -->
                <div class="col-lg-12 col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h5>ยอดสั่งซื้อ รายเดือน</h5>
                            <div class="col-xs-6 col-lg-3" style="margin-top:2rem">
                            <div class="input-group input-group-default">
                                <span class="input-group-addon" style="margin-top: 0;"><i class="fas fa-calendar-alt"></i></span>
                                <input type="text" class="form-control" id="month" value="<?= date('Y-m');?>">
                            </div>
                            
                            </div>
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
                            <canvas id="Chartmonth" width="100%" ></canvas>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12 col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h5>ยอดสั่งซื้อ รายปี</h5>
                            <div class="col-xs-6 col-lg-3" style="margin-top:2rem">
                            <div class="input-group input-group-default">
                                <span class="input-group-addon" style="margin-top: 0;"><i class="fas fa-calendar-alt"></i></span>
                            <input type="text" class="form-control" id="year" value="<?= date('Y'); ?>">
                            </div>
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
                            <canvas id="Chartyear" width="100%" ></canvas>
                        </div>
                    </div>
                </div>


                
                
                <!-- users visite and profile end -->

            </div>
        </div>
        <!-- Page-body end -->
    </div>

		
@stop
@push('scripts')
<script>

$(function(){

    $.ajax({
        url:'{{ action("DashboardController@month") }}',
        method:'post',
        data:{
            time:$('#month').val(),
        },
        dataType:'json',
        success:function(d){

            month(d);

        }
    })

    $.ajax({
        url:'{{ action("DashboardController@years") }}',
        method:'post',
        data:{
            time:$('#year').val(),
        },
        dataType:'json',
        success:function(d){
            year(d);
        }
    })

    // month();
    // year();

    $('#month').datepicker({
        format: "yyyy-mm",
        startView: "months", 
        minViewMode: "months"
    });

    $('#year').datepicker({
        format: "yyyy",
        startView: "years", 
        minViewMode: "years"
    });


    $('#month').change(function(){

    $.ajax({
        url:'{{ action("DashboardController@month") }}',
        method:'post',
        data:{
            time:$('#month').val(),
        },
        dataType:'json',
        success:function(d){

            month(d);

        }
    })


    });

    $('#year').change(function(){

    $.ajax({
        url:'{{ action("DashboardController@years") }}',
        method:'post',
        data:{
            time:$('#year').val(),
        },
        dataType:'json',
        success:function(d){
            year(d);
        }
    })

    });
    

});





function month(data){

        


        var ctx = document.getElementById("Chartmonth").getContext('2d');
    
        var ict_unit = [];
        var efficiency = [];
        var coloR = [];

        var dynamicColors = function() {
        var r = Math.floor(Math.random() * 255);
        var g = Math.floor(Math.random() * 255);
        var b = Math.floor(Math.random() * 255);
        return "rgb(" + r + "," + g + "," + b + ")";
        };

        for (var i in data['date']) {
        ict_unit.push("ICT Unit " + data['date'][i].ict_unit);
        efficiency.push(data['date'][i].efficiency);
        coloR.push(dynamicColors());
        }


        var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: data['date'],
            datasets: [{
                label: '',
                data: data['total'],
                backgroundColor: coloR,
                borderWidth: 1
            }]
        },
        options: {
            legend: {
                display: false
            },
            tooltips: {
                callbacks: {
                label: function(tooltipItem) {
                        return tooltipItem.yLabel;
                }
                }
            }
        }
    });

}

function year(data){


        var ctx = document.getElementById("Chartmonth").getContext('2d');
    
        var ict_unit = [];
        var efficiency = [];
        var coloR = [];

        var dynamicColors = function() {
        var r = Math.floor(Math.random() * 255);
        var g = Math.floor(Math.random() * 255);
        var b = Math.floor(Math.random() * 255);
        return "rgb(" + r + "," + g + "," + b + ")";
        };

        for (var i in data['date']) {
        ict_unit.push("ICT Unit " + data['date'][i].ict_unit);
        efficiency.push(data['date'][i].efficiency);
        coloR.push(dynamicColors());
        }

        var ctx = document.getElementById("Chartyear").getContext('2d');
        var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: data['date'],
            datasets: [{
                label: '',
                data: data['total'],
                backgroundColor: coloR,
                borderWidth: 1
            }]
        },
        options: {
            legend: {
                display: false
            },
            tooltips: {
                callbacks: {
                label: function(tooltipItem) {
                        return tooltipItem.yLabel;
                }
                }
            }
        }
    });

    }


</script>    
@endpush
