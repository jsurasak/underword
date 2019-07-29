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

class NewController extends Controller
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

        return view('backend.new.index');

    }
    public function create(){

        return view('backend.new.form');

    }
    public function add(Request $request){

        $header_th = request('header_th');
        $header_en = request('header_en');
        $header_cn = request('header_cn');
        $detail_th = request('detail_th');
        $detail_en = request('detail_en');
        $detail_cn = request('detail_cn');

        $img = $request->file('picture')->store('image/news');

        $data = [
            "header_th" => $header_th,
            "header_en" => $header_en,
            "header_cn" => $header_cn,
            "detail_th" => $detail_th,
            "detail_en" => $detail_en,
            "detail_cn" => $detail_cn,
            "type" => "",
            "picture" => $img,
            "created" => date('Y-m-d H:i:s')
        ];

        DB::table('news')->insert($data);
        Alert::success('Success Insert');
        return redirect()->action('NewController@index');


    }
    public function edit($id)
    {

        $data = DB::table('news')->where('id', $id )->first();
        return view('backend.new.form')->with(['data' => $data]);

    }
    public function save(Request $request)
    {

        $header_th = request('header_th');
        $header_en = request('header_en');
        $header_cn = request('header_cn');
        $detail_th = request('detail_th');
        $detail_en = request('detail_en');
        $detail_cn = request('detail_cn');

        if ($request->file('picture') != "") {
        Storage::delete(request('oldpicture'));
        $img = $request->file('picture')->store('image/news');
        }else{
        $img = request('oldpicture');    
        }

        $data = [
            "header_th" => $header_th,
            "header_en" => $header_en,
            "header_cn" => $header_cn,
            "detail_th" => $detail_th,
            "detail_en" => $detail_en,
            "detail_cn" => $detail_cn,
            "type" => "",
            "picture" => $img,
            "created" => date('Y-m-d H:i:s')
        ];

        DB::table('news')->where('id',request('id'))->update($data);
        Alert::success('Success Update');
        return redirect()->action('NewController@index');

    }
    public function del($id)
    {

        $data = DB::table('news')->where('id',$id)->first();
        Storage::delete($data->picture);
        DB::table('news')->where('id',$id)->delete();
        Alert::success('Success Delete');
        return redirect()->action('NewController@index');


    }

    public function datatable(){

        $data = DB::table('news')->get();
        return Datatables::of($data)->make(true);

    }
}
