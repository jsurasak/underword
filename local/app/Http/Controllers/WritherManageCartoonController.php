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

class WritherManageCartoonController extends Controller
{
    public function index()
    {

        return view('backend.writhermanage.indexcomics');

    }
    public function updaterating(Request $request)
    {

        DB::table('ck_topic_novel')->where('id', request('id'))->update(["rating" => request('rating')]);
        return json_encode(1);

    }
    public function top_nove(Request $request)
    {

        $data = DB::table('ck_topic_novel')->where('type', 2)->update(['TopSelect' => 0]);

        foreach (request('topCom') as $t) {
            $data = DB::table('ck_topic_novel')->where('id', $t)->update(['TopSelect' => 1]);
        }


        return json_encode(1);

    }

    public function closeComics($id,$detail){

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
        return redirect()->action('WritherManageCartoonController@index');

    }
    public function delComics(Request $request)
    {
        DB::table('ck_topic_novel')->where('id', request('id'))->delete();
        return json_encode(1);
    }

    public function index_chapter($id){

        $book = DB::table('ck_topic_novel')->where('id', $id)->first();

        return view('backend.writhermanage.indexcartoon')->with(['book' => $book]);

    }
    public function updateview(Request $request)
    {
        DB::table('cartoon_book')->where('id', request('id'))->update(["view" => request('view')]);
        return json_encode(1);
    }

    public function closeBook($id, $chap, $detail)
    {

        $u = DB::table('ck_topic_novel')->where('id',$id)->first();

        $data = [
            "id_user" => $u->id_user,
            "id_book" => $id,
            "id_chap" => $chap,
            "type" => $u->type,
            "detail" => $detail
        ];

        DB::table('report_writh_status')->insert($data);
        DB::table('cartoon_book')->where('id', $chap)->update(['status' => 3]);
        Alert::success('Success Close');
        return redirect()->action('WritherManageCartoonController@index_chapter', $id);
    }
    public function delBook(Request $request)
    {
        DB::table('ck_topic_novel')->where('id', request('id'))->delete();
        DB::table('cartoon_book')->where('id_novel', request('id'))->delete();
        return json_encode(1);
    }

    public function datatable()
    {

        $data = DB::table('ck_topic_novel')->where('type', 2)->orderBy('TopSelect', 'desc')->get();

        return Datatables::of($data)->make(true);

    }
    public function datatable_book(Request $request)
    {

        $data = DB::table('cartoon_book')->where('id_novel', request('id'))->get();

        return Datatables::of($data)->make(true);

    }
}
