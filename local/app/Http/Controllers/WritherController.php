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

class WritherController extends Controller
{
    public function index(){

        return view('backend.user.writher_index');

    }

    public function add(Request $request){

      $picture = $request->file('writher_pic')->store('imgContent');
      list($a,$pic) = explode('/',$picture);

      $data = [
        "writher_name" => request('writher_name'),
        "full_name" => request('full_name'),
        "writher_comment" => request('writher_comment'),
        "writher_pic" => $pic,
      ];

      DB::table('ck_writher')->insert($data);

      Alert::success('Success Insert');
      return redirect()->action('WritherController@index');

    }
    public function seachData(Request $request){

     $data = DB::table('ck_writher')->where('id',request('id'))->get();
     return $data;

    }
    public function edit(Request $request){

      if($request->file('writher_pic') != ""){
      Storage::delete('imgContent/'.request('old'));
      $picture = $request->file('writher_pic')->store('imgContent');
      list($a,$pic) = explode('/',$picture);
      }else{
        $pic = request('old');
      }
      $data = [
        "writher_name" => request('writher_name'),
        "full_name" => request('full_name'),
        "writher_comment" => request('writher_comment'),
        "writher_pic" => $pic,
      ];

      DB::table('ck_writher')->where('id',request('id'))->update($data);
      Alert::success('Success Update');
      return redirect()->action('WritherController@index');


    }
    public function del($id,$pic){

      Storage::delete('imgContent/'.$pic);
      DB::table('ck_writher')->where('id',$id)->delete();
      Alert::success('Success Delete');
      return redirect()->action('WritherController@index');

    }

    public function datatable(){

      $data = DB::table('ck_writher')->get();

      return Datatables::of($data)->make(true);

    }
}
