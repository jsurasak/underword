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

class NovelTodayController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        
        $user = DB::table('ck_user')->where('level',3)->get();

        foreach($user as $u){

            $book = DB::table('ck_topic_novel')->where('type',1)->where('id_user',$u->id)->get();

            foreach($book as $b){
                $data[] = [
                    "id" => $b->id,
                    "name" => $b->name
                ];
            }

        }

        return view('backend.writhermanage.todaynovel')->with(['book' => $data]);
    }
    public function update(Request $request){


        DB::table('todaynovel')->where('id_day',request('id'))->update(['id_novel' => request('book')]);

        return 1;

    }

    public function datatable(Request $request)
    {

        $data = DB::table('todaynovel')->leftJoin('ck_topic_novel','todaynovel.id_novel','=', 'ck_topic_novel.id')->orderBy('id_day','asc')->get();

        return Datatables::of($data)->make(true);

    }
}
