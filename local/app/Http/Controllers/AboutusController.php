<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;
use Alert;
use Illuminate\Support\Collection;

class AboutusController extends Controller
{
    public function index()
    {

        $detail = DB::table('about_qanda')->where('id',1)->first();
        $ad = DB::table('about_qanda')->where('id',2)->first();

        return view('backend.about.index')->with(['detail' => $detail ,'ad' => $ad]);

    }
    public function updatedetail(Request $request){

        DB::table('about_qanda')->where('id',request('id'))->update(['detail' => request('detail')]);

        Alert::success('Success Update');
        return redirect()->action('AboutusController@index');

    
    }
    public function addquestion(Request $request)
    {
        if(request('typeF') == 'add'){

            $data = [
                "question" => request('question'),
                "answer" => request('answer'),
                "type" => 2
            ];

            DB::table('about_qanda')->insert($data);

        }else{

            $data = [
                "question" => request('question'),
                "answer" => request('answer'),
            ];

            DB::table('about_qanda')->where('id', request('id'))->update($data);

        }

    }
    public function editquestion(Request $request){

        $str = DB::table('about_qanda')->where('id',request('id'))->first();
        return json_encode($str);

    }
    public function delete(Request $request)
    {

        DB::table('about_qanda')->where('id',request('id'))->delete();

    }
    public function datatable()
    {

        $data = DB::table('about_qanda')->where('type', 2)->get();

        return Datatables::of($data)->make(true);

    }

}
