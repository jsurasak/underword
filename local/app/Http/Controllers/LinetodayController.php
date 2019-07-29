<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;
use Alert;
use Illuminate\Support\Collection;
use Storage;



class LinetodayController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {

        $dateL = DB::table('lineCheck')->orderBy('created','desc')->first();


        $type = DB::table('ck_type_content')->where('id','!=',8)->get();
        
        return view('backend.content.linetoday')->with(['type' => $type,'dateL' => $dateL]);
        
    }
    public function selectContenr(Request $request){


        $data = DB::table('ck_content')->where('type_content',request('type'))->get();

        return json_encode($data);

    }
    public function addContenr(Request $request){

        $data = [
            "id_content" => request('id'),
            "type" => request('type'),
        ];

        DB::table('linetoday')->insert($data);

        return json_encode(1);

    }

    public function update(){

        $data = [
            "uuid" => 'horrorsim' . date('Y') . date('m') . date('d') . date('H') . date('I') . date('s'),
            "time" => date('Y') . date('m') . date('d') . date('H') . date('I') . date('s'),
            "created" => date('Y-m-d')
        ];

        DB::table('lineCheck')->insert($data);
        Alert::success('Success Update');
        return redirect()->action('LinetodayController@index');


    }

    public function delContenr(Request $request){

        DB::table('linetoday')->where('id',request('id'))->delete();

        return json_encode(1);

    }
    public function datatable(Request $request)
    {

        $data = DB::table('linetoday')->select('linetoday.id','ck_content.headerFull as name')
                                     ->leftJoin('ck_content', 'linetoday.id_content', '=', 'ck_content.id')
                                     ->orderBy('id','desc')
                                     ->get();

        return Datatables::of($data)->make(true);

    }
    
}
