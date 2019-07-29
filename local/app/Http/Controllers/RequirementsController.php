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

class RequirementsController extends Controller
{
    public function index()
    {

        return view('backend.requirements.index');

    }
    public function edit($id){

        $data = DB::table('requirements')->where('id',$id)->first();

        return view('backend.requirements.form')->with(['data' => $data]);

    }
    public function update(Request $request){

        if(request('type') == 1){

            if ($request->file('picture') != "") {

                $img = $request->file('picture')->store('imgContent/request');
                if(request('oldpic')){
                Storage::delete('imgContent/request/'.request('oldpic'));
                }

            }else{

                $img = request('oldpic');

            }


            $data = [
                "detail" => request('detail'),
                "img" => $img,
                "url" => request('url')
            ];

        }else{

            $data = [
                "detail" => request('detail'),
            ];

        }


        DB::table('requirements')->where('id',request('id'))->update($data);
        Alert::success('Success Update');
        return redirect()->action('RequirementsController@index');
        
    }
    public function datatable()
    {

        $data = DB::table('requirements')->orderBy('id','asc')->get();

        return Datatables::of($data)->make(true);

    }

}
