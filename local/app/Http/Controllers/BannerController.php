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


class BannerController extends Controller
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
    public function index(){

        $data = DB::table('banner')->get();

        return view('backend.banner.index')->with(['data' => $data]);

    }
    public function save(Request $request){
        
        $data = DB::table('banner')->where('id',request('id'))->first();

        if(request('type') == "th"){
            if ($data->name_th != "") {
                Storage::delete($data->name_th);
            }
        }else if(request('type') == "en"){
            if ($data->name_en != "") {
                Storage::delete($data->name_en);
            }
        }else{
            if ($data->name_cn != "") {
                Storage::delete($data->name_cn);
            }
        }
        
        $img = $request->file('picture')->store('image/banner');

        $dataup = [
            "name_".request('type') => $img
        ];

        DB::table('banner')->where('id',request('id'))->update($dataup);
        Alert::success('Success Update');
        return redirect()->action('BannerController@index');


    }
}
