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


class AdminController extends Controller
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
    public function index()
    {
        return view('backend.admin.index');
    }
    public function create()
    {

        return view('backend.admin.form');

    }
    public function edit($id){

        $data = DB::table('admin')->where('id',$id)->first();

        return view('backend.admin.form')->with(['data' => $data]);

    }
    public function add(Request $request)
    {

        $user = request('username');
        $password = bcrypt(request('password'));
        $name = request('name');
        $email = request('email');


        $data = [
            "username" => $user,
            "password" => $password,
            "name" => $name,
            "email" => $email,

        ];

        DB::table('admin')->insert($data);

        Alert::success('Create Success');

        return redirect()->action('AdminController@index');


    }

    public function save(Request $request)
    {

        $user = request('username');
        $name = request('name');
        $email = request('email');

        $data = [
            "username" => $user,
            "name" => $name,
            "email" => $email,

        ];

        DB::table('admin')->where('id', request('id'))->update($data);

        Alert::success('Update Success');

        return redirect()->action('AdminController@index');


    }

    public function delete($id)
    {

        $data = DB::table('admin')->where('id',$id)->delete();

        Alert::success('Delete Success');

        return redirect()->action('AdminController@index');

    }
    public function password($id)
    {

        return view('backend.admin.password')->with(['id' => $id]);

    }

    public function savepassword(Request $request)
    {

        $password = bcrypt(request('password'));

        $data = [
            "password" => $password,
        ];

        DB::table('admin')->where('id', request('id'))->update($data);

        Alert::success('Update Success');

        return view('backend.admin.index');

    }
    public function datatable(){

        $data = DB::table('admin')->get();

        return Datatables::of($data)->make(true);

    }
    
}
