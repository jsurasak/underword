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

class AdvertisingController extends Controller
{
    ############################################################################################
    // public function index()
    // {

    //     return view('backend.advertising.index');

    // }
    ############################################################################################
    public function index($id)
    {

        $data = DB::table('advertising')->where('id',$id)->first();
        return view('backend.advertising.form')->with(['data' => $data]);

    }
    ############################################################################################
    public function update(Request $request){

        if(request('type') == 1){

            if ($request->file('img_1') != "") {

                $img1 = $request->file('img_1')->store('imgContent/logoData');
                if(request('oldpic_1')){
                Storage::delete('imgContent/request/'.request('oldpic_1'));
                }

            }else{

                $img1 = request('oldpic_1');

            }

            if ($request->file('img_2') != "") {

                $img2 = $request->file('img_2')->store('imgContent/logoData');
                if(request('oldpic_2')){
                    Storage::delete('imgContent/request/'.request('oldpic_2'));
                }

            }else{

                $img2 = request('oldpic_2');

            }

            if ($request->file('img_3') != "") {

                $img3 = $request->file('img_3')->store('imgContent/logoData');
                if(request('oldpic_3')){
                    Storage::delete('imgContent/request/'.request('oldpic_3'));
                    }

            }else{

                $img3 = request('oldpic_3');

            }

            if ($request->file('img_4') != "") {

                $img4 = $request->file('img_4')->store('imgContent/logoData');
                if(request('oldpic_4')){
                    Storage::delete('imgContent/request/'.request('oldpic_4'));
                    }

            }else{

                $img4 = request('oldpic_4');

            }

            if ($request->file('img_5') != "") {

                $img5 = $request->file('img_5')->store('imgContent/logoData');
                if(request('oldpic_5')){
                    Storage::delete('imgContent/request/'.request('oldpic_5'));
                    }

            }else{

                $img5 = request('oldpic_5');

            }

            if ($request->file('img_6') != "") {

                $img6 = $request->file('img_6')->store('imgContent/logoData');
                if(request('oldpic_6')){
                    Storage::delete('imgContent/request/'.request('oldpic_6'));
                    }

            }else{

                $img6 = request('oldpic_6');

            }

            if ($request->file('img_7') != "") {

                $img7 = $request->file('img_7')->store('imgContent/logoData');
                if(request('oldpic_7')){
                    Storage::delete('imgContent/request/'.request('oldpic_7'));
                    }

            }else{

                $img7 = request('oldpic_7');

            }

            if ($request->file('img_8') != "") {

                $img8 = $request->file('img_8')->store('imgContent/logoData');
                if(request('oldpic_8')){
                    Storage::delete('imgContent/request/'.request('oldpic_8'));
                    }

            }else{

                $img8 = request('oldpic_8');

            }



            $data = [
                "img_1" => $img1,
                "url_1" => request('url_1'),
                "type_show_1" => request('type_show_1'),
                "count_show_1" => request('count_show_1'),
                "img_2" => $img2,
                "url_2" => request('url_2'),
                "type_show_2" => request('type_show_2'),
                "count_show_2" => request('count_show_2'),
                "img_3" => $img3,
                "url_3" => request('url_3'),
                "type_show_3" => request('type_show_3'),
                "count_show_3" => request('count_show_3'),
                "img_4" => $img4,
                "url_4" => request('url_4'),
                "type_show_4" => request('type_show_4'),
                "count_show_4" => request('count_show_4'),
                "img_5" => $img5,
                "url_5" => request('url_5'),
                "type_show_5" => request('type_show_5'),
                "count_show_5" => request('count_show_5'),
                "img_6" => $img6,
                "url_6" => request('url_6'),
                "type_show_6" => request('type_show_6'),
                "count_show_6" => request('count_show_6'),
                "img_7" => $img7,
                "url_7" => request('url_7'),
                "type_show_7" => request('type_show_7'),
                "count_show_7" => request('count_show_7'),
                "img_8" => $img8,
                "url_8" => request('url_8'),
                "type_show_8" => request('type_show_8'),
                "count_show_8" => request('count_show_8')
            ];

        }else if(request('type') == 2){

            if(request('type_select') == 0){

                if ($request->file('img') != "") {

                    $img = $request->file('img')->store('imgContent/logoData');
                    if (request('oldpic')) {
                        Storage::delete('imgContent/request/' . request('oldpic'));
                    }

                } else {

                    $img = request('oldpic');

                }

                $data = [
                    "type_select" => request('type_select'),
                    "img" => $img,
                    "url" => request('url'),
                    "active" => request('active'),
                ];

            }else{

                if ($request->file('vdo') != "") {

                    $vdo = $request->file('vdo')->store('imgContent/logoData');
                    if (request('old_vdo')) {
                        Storage::delete('imgContent/request/' . request('old_vdo'));
                    }

                } else {

                    $vdo = request('old_vdo');

                }

                $data = [
                    "type_select" => request('type_select'),
                    "video" => $vdo
                ];

            }


        }else{

            if ($request->file('img') != "") {

                $img = $request->file('img')->store('imgContent/logoData');
                if(request('oldpic')){
                    Storage::delete('imgContent/request/'.request('oldpic'));
                }

            }else{

                $img = request('oldpic');

            }

            $data = [
                "img" => $img,
                "url" => request('url'),
                "type_show" => request('type_show'),
                "count_show" => request('count_show')
            ];

        }




        DB::table('advertising')->where('id',request('id'))->update($data);
        Alert::success('Success Update');
        return redirect()->action('AdvertisingController@index',request('id'));
        
    }
    ############################################################################################
    public function delpic(Request $request){

        $row = request('rows');

        $data = [
            "img_".$row => "",
            "url_".$row => ""
        ];

        Storage::delete(request('name'));
        DB::table('advertising')->where('id',request('id'))->update($data);

        return json_encode(1);

    }
    ############################################################################################
    public function datatable()
    {

        $data = DB::table('advertising')->orderBy('id','asc')->get();

        return Datatables::of($data)->make(true);

    }

}
