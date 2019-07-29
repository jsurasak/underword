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

class CatalogsController extends Controller
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

        return view('backend.catalogs.index');

    }
    public function create(){

        return view('backend.catalogs.form');

    }
    public function edit($id)
    {
        $data = DB::table('catalogs')->where('id',$id)->first();

        return view('backend.catalogs.form')->with(['data' => $data]);

    }
    public function add(Request $request){

        $data = [
            "name_th" => request('name_th'),
            "name_en" => request('name_en'),
            "name_cn" => request('name_cn'),
            "detail_th" => request('detail_th'),
            "detail_en" => request('detail_en'),
            "detail_cn" => request('detail_cn'),
            "created" => date('Y-m-d H:i:s')      
        ];
        DB::table('catalogs')->insert($data);
        Alert::success('Success Insert');
        return redirect()->action('CatalogsController@index');

    }
    public function save(Request $request)
    {
        $data = [
            "name_th" => request('name_th'),
            "name_en" => request('name_en'),
            "name_cn" => request('name_cn'),
            "detail_th" => request('detail_th'),
            "detail_en" => request('detail_en'),
            "detail_cn" => request('detail_cn'),
            "created" => date('Y-m-d H:i:s')
        ];
        DB::table('catalogs')->where('id',request('id'))->update($data);
        Alert::success('Success Update');
        return redirect()->action('CatalogsController@index');

    }
    public function del($id){

        DB::table('catalogs')->where('id',$id)->delete();
        Alert::success('Success Delete');
        return redirect()->action('CatalogsController@index');

    }
    public function datatable(){

        $data = DB::table('catalogs')->get();
        return Datatables::of($data)->make(true);
    }
}
