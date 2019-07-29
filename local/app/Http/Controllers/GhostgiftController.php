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

class GhostgiftController extends Controller
{
    public function index()
    {

        return view('backend.manage.index_gift');

    }
    public function report(){

        return view('backend.manage.report_gift');
        

    }
    public function update(Request $request){

        if ($request->file('pic') != "") {
            Storage::delete(request('oldPic'));
            $pic = $request->file('pic')->store('imgUser/imgGift');
        }else{
            $pic = request('oldPic');
        }

        $data = [
            "picture" => $pic,
            "name" => request('name'),
            "detail" => request('detail'),
            "point" => request('point'),
        ];

        DB::table('ghostgift')->where('id', request('id'))->update($data);


        Alert::success('Success Update');
        return redirect()->action('GhostgiftController@index');

    }

    public function addEms(Request $request)
    {

        $data = [
            "ems" => request('number'),
            "status" => 1
        ];

        DB::table('ghostgiftReport')->where('id', request('id'))->update($data);
        
        $data2 = [
            "id_user" => request('id_user'),
            "type" => 11,
            "detail" => "สินค้าของคุณ  ".request('item')." ได้รับการ จัดส่งเรียบร้อยแล้ว tracking number คือ ". request('number')
        ];

        DB::table('report_writh_status')->insert($data2);
        return json_encode(1);
        // Alert::success('Success Update');
        // return redirect()->action('GhostgiftController@report');


    }

    public function delEms(Request $request)
    {

        $data = [
            "ems" => request('detail'),
            "status" => 2
        ];

        DB::table('ghostgiftReport')->where('id', request('id'))->update($data);

        $data2 = [
            "id_user" => request('id_user'),
            "type" => 11,
            "detail" => "สินค้าของคุณ " . request('item') . " ถูกยกเลิก การจัดส่ง สาเหตุคือ " . request('detail')
        ];

        DB::table('report_writh_status')->insert($data2);
        return json_encode(1);
        // Alert::success('Success Update');
        // return redirect()->action('GhostgiftController@report');


    }

    public function datatable()
    {

        $array = DB::table('ghostgift')->get();

        return Datatables::of($array)->make(true);

    }
    public function datatableReport(Request $request)
    {

        $data = DB::table('ghostgiftReport')
                    ->select('ghostgiftReport.status','ghostgiftReport.ems','ghostgiftReport.id', 'ghostgiftReport.location', 'ghostgiftReport.tel', 'ghostgift.name', 'ck_user.username', 'ghostgiftReport.id_user')
                    ->leftjoin('ghostgift', 'ghostgiftReport.id_gift','=', 'ghostgift.id')
                    ->leftjoin('ck_user', 'ghostgiftReport.id_user', '=', 'ck_user.id');
                    if(request('status') != 99){
                        $data->where('ghostgiftReport.status',request('status'));
                    }                  
                    $data->get();

        return Datatables::of($data)->make(true);

    }



}
