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

class OrderController extends Controller
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

        return view('backend.order.index');

    }
    public function ems(Request $request){


        if(request('status') == 1){
            $data = [
                "status" => request('status'),
                "ems_code" => request('ems')
            ];
        }else{
            $data = [
                "status" => request('status'),
            ];

        }
        DB::table('orders')->where('id',request('id'))->update($data);
    }

    public function detail(Request $request){

        $data['order'] = DB::table('orders')->where('id',request('id'))->first();
        $data['order_tax'] = DB::table('order_tax')->where('id_order',request('id'))->first();
        $data['items'] = DB::table('order_item')->select('products.name_th', 'products.code_item', 'package.package', 'order_item.count')
                        ->leftJoin('products', 'products.id','=', 'order_item.id_product')
                        ->leftJoin('package', 'package.id', '=', 'order_item.package')
                        ->where('id_order',request('id'))
                        ->get(); 

        return json_encode($data);

    }

    public function datatable(Request $request){

        $data = DB::table('orders');

        if(request('status') == 0){

            $data->orderBy('created_at');

        }else{

            $data->orderBy('status');
        }

        $data->get();

        return Datatables::of($data)->make(true);
    
    }
}
