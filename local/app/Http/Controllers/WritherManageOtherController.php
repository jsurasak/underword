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

class WritherManageOtherController extends Controller

{

    public function edit_Book($id){

        $book = DB::table('ck_topic_novel')->where('id',$id)->first();

        $name_user = DB::table('name_writer')->where('id_user',$book->id_user)->get();

        $c1 = DB::table('ck_category')->where('type',1)->get();
        $c2 = DB::table('ck_category')->where('type',2)->get();


        return view('backend.writhermanage.form_book')->with(['book' => $book, 'name_user' => $name_user,'c1' => $c1,'c2' => $c2]);

    }
    public function updateBook(Request $request){

        if ($request->file('picture') != "") {
            $picture = $request->file('picture')->store('imgUser/imgWriter');
        } else {
            $picture = request('oldpicture');
        }

        $name_w = DB::table('name_writer')->where('id',request('id_w'))->first();
        $data = [
            "name" =>request('name'),
            "titel" =>request('titel'),
            "picture" => $picture,
            "category" =>request('category'),
            "category2" =>request('category2'),
            "id_w" =>request('id_w'),
            "name_writer" => $name_w->name,
            "age" =>request('age'),
            "detail" =>request('detail'),
        ];

        DB::table('ck_topic_novel')->where('id',request('id'))->update($data);

        if(request('type') == 1){
            return redirect()->action('WritherManageNovelController@index');
        }else{
            return redirect()->action('WritherManageCartoonController@index');
        }


    }

    public function index_short()
    {

        return view('backend.writhermanage.index_short');

    }
    public function edit_short($id){

        $data = DB::table('ck_topic_novel')->where('id',$id)->first();

        return view('backend.writhermanage.form_other')->with(['data' => $data]);

    }

    public function closeShort($id,$detail){


        $u = DB::table('ck_topic_novel')->where('id', $id)->first();

        $data = [
            "id_user" => $u->id_user,
            "id_book" => $id,
            "type" => $u->type,
            "detail" => $detail
        ];

        DB::table('report_writh_status')->insert($data);
        DB::table('ck_topic_novel')->where('id', $id)->update(['status' => 3]);
        Alert::success('Success Close');
        return redirect()->action('WritherManageOtherController@index_short');

    }

    public function delShort($id){

        $data = DB::table('ck_topic_novel')->where('id', $id)->delete();
        Alert::success('Success Delete');
        return redirect()->action('WritherManageOtherController@index_short');

    }

    public function index_story()
    {

        return view('backend.writhermanage.index_story');

    }
    public function edit_story($id)
    {

        $data = DB::table('ck_topic_novel')->where('id', $id)->first();

        return view('backend.writhermanage.form_other')->with(['data' => $data]);

    }

    public function top_Story(Request $request){

        $data = DB::table('ck_topic_novel')->where('type', 4)->update(['TopSelect' => 0]);

        foreach (request('topCom') as $t) {
            $data = DB::table('ck_topic_novel')->where('id', $t)->update(['TopSelect' => 1]);
        }

        return json_encode(1);


    }

    public function closeStory($id, $detail)
    {

        $u = DB::table('ck_topic_novel')->where('id', $id)->first();

        $data = [
            "id_user" => $u->id_user,
            "id_book" => $id,
            "type" => $u->type,
            "detail" => $detail
        ];

        DB::table('report_writh_status')->insert($data);

        DB::table('ck_topic_novel')->where('id', $id)->update(['status' => 3]);
        Alert::success('Success Close');
        return redirect()->action('WritherManageOtherController@index_story');

    }
    public function delStory($id)
    {

        $data = DB::table('ck_topic_novel')->where('id', $id)->delete();
        Alert::success('Success Delete');
        return redirect()->action('WritherManageOtherController@index_story');

    }
    public function index_clip()
    {

        return view('backend.writhermanage.index_clip');

    }
    public function edit_clip($id)
    {

        $data = DB::table('ck_topic_novel')->where('id', $id)->first();

        return view('backend.writhermanage.form_other')->with(['data' => $data]);

    }
    public function closeClip($id, $detail)
    {

        $u = DB::table('ck_topic_novel')->where('id', $id)->first();

        $data = [
            "id_user" => $u->id_user,
            "id_book" => $id,
            "type" => $u->type,
            "detail" => $detail
        ];

        DB::table('report_writh_status')->insert($data);
        DB::table('ck_topic_novel')->where('id', $id)->update(['status' => 3]);
        Alert::success('Success Close');
        return redirect()->action('WritherManageOtherController@index_clip');

    }
    public function delClip($id)
    {

        $data = DB::table('ck_topic_novel')->where('id', $id)->delete();
        Alert::success('Success Delete');
        return redirect()->action('WritherManageOtherController@index_clip');

    }

    public function updateview(Request $request)
    {
        DB::table('ck_topic_novel')->where('id', request('id'))->update(["view" => request('view')]);
        return json_encode(1);
    }

    public function updateother(Request $request){

        DB::table('ck_topic_novel')->where('id', request('id'))->update(["detail" => request('detail')]);
        Alert::success('Success Update');
        if(request('type') == 3){
            return redirect()->action('WritherManageOtherController@index_short');
        }else if (request('type') == 4){
            return redirect()->action('WritherManageOtherController@index_story');
        }else{
            return redirect()->action('WritherManageOtherController@index_clip');
        }

    }
    


    public function datatable_short()
    {

        $data = DB::table('ck_topic_novel')->where('type','3')->get();

        return Datatables::of($data)->make(true);

    }
    public function datatable_story()
    {

        $data = DB::table('ck_topic_novel')->where('type','4')->get();

        return Datatables::of($data)->make(true);

    }
    public function datatable_clip()
    {

        $data = DB::table('ck_topic_novel')->where('type','5')->get();

        return Datatables::of($data)->make(true);

    }
}
