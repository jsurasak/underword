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
    public function index()
    {

        return view('backend.admin.index');

    }

    public function create()
    {

        return view('backend.admin.form_admin');

    }

    public function edit($id)
    {

        $admin = DB::table('ck_admin')->where('id',$id)->first();

        return view('backend.admin.form_admin')->with(['admin' => $admin]);

    }

    public function changePass($id)
    {

        return view('backend.admin.form_password')->with(['id' => $id]);

    }

    public function newpass(Request $request)
    {

        $password = Hash::make(request('n_password'));

        $data = [
            "password" => $password,
        ];

        DB::table('ck_admin')->where('id', request('id'))->update($data);

        Alert::success('Update Success');

        return view('backend.admin.form_password')->with(['id' => request('id')]);

    }


    public function add(Request $request)
    {

        $user = request('user');
        $password = Hash::make(request('password'));
        $name = request('name');
        $email = request('email');
        $level = request('level');


        $data = [
            "username" => $user,
            "password" => $password,
            "name" => $name,
            "email" => $email,
            "level" => $level,
            "active" => 1,

        ];

        DB::table('ck_admin')->insert($data);

        Alert::success('Create Success');

        return redirect()->action('AdminController@index');


    }

    public function save(Request $request)
    {

        $user = request('user');
        $name = request('name');
        $email = request('email');
        $level = request('level');


        $data = [
            "username" => $user,
            "name" => $name,
            "email" => $email,
            "level" => $level,


        ];

        DB::table('ck_admin')->where('id', request('id'))->update($data);

        Alert::success('Update Success');

        return redirect()->action('AdminController@index');


    }

    public function del($id)
    {

        DB::table('ck_admin')->where('id', $id)->delete();

        Alert::success('Delete Success');

        return redirect()->action('AdminController@index');

    }

    public function postDatatable()
    {

         $data =  DB::table('ck_admin')->get();

        return Datatables::of($data)->make(true);

    }
}