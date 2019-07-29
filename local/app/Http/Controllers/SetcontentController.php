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

class SetcontentController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }
  public function index()
  {
      $top5C = DB::table('ck_status_content')->where('id',1)->first();
      $top5V = DB::table('ck_status_content')->where('id',2)->first();
      return view('backend.content.setcontent_index')->with(['top5C' => $top5C,'top5V' => $top5V]);
  }

  public function UpdateStatus(Request $request){

    $data = [
      "id" => request('id'),
      "status" => request('status'),
    ];

    DB::table('ck_status_content')->where('id',request('id'))->update(['status' => request('status')]);

    return $data;

  }
  public function UpdateCheckStatus(Request $request){

    if(request('type')){
      if(request('type') == 2){
        DB::table('ck_content')->update(['Top5View' => 0]);
        foreach (request('topview') as $key => $id) {
          DB::table('ck_content')->where('id',$id)->update(['Top5View' => 1]);
        }
      }else{
        DB::table('ck_content')->update(['Top5Content' => 0]);
        foreach (request('topCom') as $key => $id) {
          DB::table('ck_content')->where('id',$id)->update(['Top5Content' => 1]);
        }
      }
  }

    return 1;

  }

  public function datatableTopView(Request $request){

    $data = DB::table('ck_content')
                  ->orderBy('Top5View','desc')
                  ->orderBy('view','desc')
                  ->get();

    return Datatables::of($data)->make(true);

  }
  public function datatableTop5Content(Request $request){

    $data = DB::table('ck_content')
                ->orderBy('Top5Content','desc')
                ->orderBy('time_set','desc')
                ->get();

    return Datatables::of($data)->make(true);

  }
}
