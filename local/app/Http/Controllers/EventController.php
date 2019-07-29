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



class EventController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
    
        return view('backend.content.event_index');
        
    }
    public function formAdd()
    {
        return view('backend.content.event_form');
        
    }
    public function add(Request $request){

        $picture = $request->file('picture')->store('imgContent');
        $data = [
            "time_show" => request('date'),
            "picture" => $picture,
            "heade" => request('heade'),
            "title" => request('title'),
            "detail" => request('detail'),
            "status" => 0,
            "created" => date('Y-m-d'),
        ];

        DB::table('ck_event')->insert($data);

        Alert::success('Success Insert');
        return redirect()->action('EventController@index');

    }
    public function formEdit($id)
    {

        $data = DB::table('ck_event')->where('id',$id)->first();

        return view('backend.content.event_form')->with(['data' => $data]);

    }
    public function edit(Request $request)
    {
        $old = DB::table('ck_event')->where('id',request('id'))->first();

        if ($request->file('picture') != "") {
            Storage::delete($old->picture);
            $picture = $request->file('picture')->store('imgContent');
        } else {
            $picture = $old->picture;
        }

        $data = [
            "time_show" => request('date'),
            "picture" => $picture,
            "heade" => request('heade'),
            "title" => request('title'),
            "detail" => request('detail'),
            "status" => 0,
        ];

        DB::table('ck_event')->where('id',request('id'))->update($data);

        Alert::success('Success Update');
        return redirect()->action('EventController@index');

    }
    public function del($id)
    {

        $data = DB::table('ck_event')->where('id', $id)->update(['status' => 99]);

        Alert::success('Success Delete');
        return redirect()->action('EventController@index');

    }
    public function datatable()
    {

        $data = DB::table('ck_event')->where('status',0)->get();

        return Datatables::of($data)->make(true);

    }
}
