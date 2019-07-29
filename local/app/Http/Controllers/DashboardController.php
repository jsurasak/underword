<?php

namespace App\Http\Controllers;

use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Alert;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data['order_in'] = DB::table('orders')->where('status','0')->count();
        $data['order_success'] = DB::table('orders')->where('status', '1')->count();
        $data['total_product'] = DB::table('products')->count();
        $data['total_sell_inmonth'] = DB::table('orders')
                                        ->where('status','1')
                                        ->where('created_at','>=',date('Y').'-'.date('m').'-01')
                                        ->where('created_at', '<', date('Y-m-d', strtotime("+1 month", strtotime(date('Y') . '-' . date('m') . '-01'))))
                                        ->count();
        $data['total_sell'] = DB::table('orders')->where('status', '1')->count();

        return view('backend.index')->with([ 'data' => $data ]);

    }
    public function month(Request $request){

        list($y,$m) = explode('-',request('time'));

        $count = cal_days_in_month(CAL_GREGORIAN, $m, $y);

        for($i=1;$i<=$count;$i++){

            $time = date('Y').'-'. sprintf('%02d', $m) .'-'.sprintf('%02d', $i);
            $data['date'][] = sprintf('%02d', $i).'/'. sprintf('%02d', $m).'/'. date('Y');
            $data['total'][] = DB::table('orders')->where('created_at','LIKE','%'.$time.'%')->sum('total');
        }

        return json_encode($data);

    }
    public function years(Request $request){

        for ($i = 1; $i <= 12; $i++) {

            $time = request('time') . '-' . sprintf('%02d', $i);
            $data['date'][] = month($i);
            $data['total'][] = DB::table('orders')->where('created_at', 'LIKE', '%' . $time . '%')->sum('total');
        }

        return json_encode($data);
    }
}


function month($number){

    $thaimonth = array("","มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", "กรกฎาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม"); 

    return $thaimonth[$number];

}