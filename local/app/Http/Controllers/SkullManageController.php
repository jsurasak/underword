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


class SkullManageController extends Controller
{

    public function index()
    {
        return view('backend.manage.index_skull');
    }

    public function updateD(Request $request){

        DB::table('skull_price')->where('id',request('id'))->update(['detail' => request('detail')]);
        return 1;

    }
    public function updateP(Request $request){

        DB::table('skull_price')->where('id',request('id'))->update(['price' => request('detail')]);
        return 1;

    }

    public function datatable()
    {

        $data = DB::table('skull_price')->get();

        return Datatables::of($data)->make(true);

    }
}
