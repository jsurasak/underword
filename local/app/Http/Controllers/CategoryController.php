<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;
use Alert;
use Illuminate\Support\Collection;

class CategoryController extends Controller
{
    public function index()
    {

        return view('backend.category.index');

    }

    public function datatable1()
    {

        $data = DB::table('ck_category')->where('type',1)->get();

        return Datatables::of($data)->make(true);

    }

    public function edit_select(Request $request){

        $data = DB::table('ck_category')->where('id',request('id'))->first();

        return json_encode($data);
    
    }

    public function update(Request $request){

        if(request('typeF') == "add"){

            $data = [
                "name" => request("name"),
                "type" => request("type"),
            ];

            DB::table('ck_category')->insert($data);

            return json_encode(request("type"));

        }else{

            $data = [
                "name" => request("name"),
                "type" => request("type"),
            ];

            DB::table('ck_category')->where('id',request('id'))->update($data);

            return json_encode(request("type"));

        }

    }

    public function delete(Request $request){

        DB::table('ck_category')->where('id', request('id'))->delete();

        return json_encode(1);

    }

    public function datatable2()
    {

        $data = DB::table('ck_category')->where('type', 2)->get();

        return Datatables::of($data)->make(true);

    }
}
