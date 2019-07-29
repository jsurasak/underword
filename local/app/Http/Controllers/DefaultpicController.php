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


class DefaultpicController extends Controller
{

    public function index()
    {
        return view('backend.manage.index_pic');
    }
    public function update(Request $request){

        if($request->file('pic') != ""){

            if(request('id') == 1){
                Storage::delete('imgUser/imgDefault/default_book.jpg');
                $request->file('pic')->storeAs('imgUser/imgDefault', 'default_book.jpg');
            }else if(request('id') == 3){
                Storage::delete('imgUser/imgDefault/default_book.jpg');
                $request->file('pic')->storeAs('imgUser/imgDefault', 'default_story.jpg');
            }else{
                Storage::delete('imgUser/imgDefault/user-login.jpg');
                $request->file('pic')->storeAs('imgUser/imgDefault', 'user-login.jpg');
            }

        }

        Alert::success('Success Update');
        return redirect()->action('DefaultpicController@index');

    }

    public function datatable()
    {

        $data = DB::table('default_pic')->get();

        return Datatables::of($data)->make(true);

    }
}
