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

class WritherManageNovelController extends Controller
{
    public function index()
    {

        return view('backend.writhermanage.indexnovel');

    }

    public function indexvip()
    {

        return view('backend.writhermanage.index_vipBook');

    }

    public function updaterating(Request $request){

        DB::table('ck_topic_novel')->where('id',request('id'))->update(["rating" => request('rating')]);
        return json_encode(1);

    }

    public function index_chapter($id){

        $book = DB::table('ck_topic_novel')->where('id',$id)->first();

        return view('backend.writhermanage.indexbook')->with(['book' => $book]);

    }
    public function form_chapter($idBook,$id){

        $data = DB::table('chapter_book')->where('id',$id)->first();

        return view('backend.writhermanage.form_chap')->with(['data' => $data]);

    }
    public function updateChapBook(Request $request){

        DB::table('chapter_book')->where('id',request('id'))->update(['detail' => request('detail')]);
        Alert::success('Update Success');
        return redirect()->action('WritherManageNovelController@index_chapter',request('idBook'));

    }
    public function updateview(Request $request){
        DB::table('chapter_book')->where('id', request('id'))->update(["view" => request('view')]);
        return json_encode(1);
    }

    public function datatable()
    {

        $data = DB::table('ck_topic_novel')->where('type',1)->orderBy('TopSelect', 'desc')->get();

        return Datatables::of($data)->make(true);

    }
    public function top_nove(Request $request)
    {

        $data = DB::table('ck_topic_novel')->where('type', 1)->update(['TopSelect' => 0]);

        foreach(request('topCom') as $t){
            $data = DB::table('ck_topic_novel')->where('id',$t)->update(['TopSelect' => 1]);
        }

        return json_encode(1);

    }
    public function top_vipnove(Request $request)
    {

        $data = DB::table('ck_topic_novel')->where('type', 1)->update(['TopSelectVip' => 0]);

        foreach (request('topCom') as $t) {
            $data = DB::table('ck_topic_novel')->where('id', $t)->update(['TopSelectVip' => 1]);
        }

        return json_encode(1);

    }

    public function closeNovel($id,$detail){

        $u = DB::table('ck_topic_novel')->where('id', $id)->first();

        $data = [
            "id_user" => $u->id_user,
            "id_book" => $id,
            "type" => $u->type,
            "detail" => $detail
        ];

        DB::table('report_writh_status')->insert($data);

        DB::table('ck_topic_novel')->where('id',$id)->update(['status' => 3]);

        Alert::success('Success Close');
        return redirect()->action('WritherManageNovelController@index');

    }
    public function delnovel(Request $request){

        $id = request('id');

        DB::table('ck_topic_novel')->where('id',$id)->delete();
        DB::table('chapter_book')->where('id_novel',$id)->delete();

        return json_encode(1);
        
    }
    public function closeBook($id,$chap,$detail){


        $u = DB::table('ck_topic_novel')->where('id', $id)->first();

        $data = [
            "id_user" => $u->id_user,
            "id_book" => $id,
            "id_chap" => $chap,
            "type" => $u->type,
            "detail" => $detail
        ];

        DB::table('report_writh_status')->insert($data);
        DB::table('chapter_book')->where('id',$chap)->update(['status' => 3]);
        
        Alert::success('Success Close');
        return redirect()->action('WritherManageNovelController@index_chapter',$id);
    }
    public function delbook(Request $request){

        $id = request('id');

        DB::table('chapter_book')->where('id',$id)->delete();

        return json_encode(1);
        
    }
    public function datatable_book(Request $request)
    {

        $data = DB::table('chapter_book')->where('id_novel', request('id'))->get();

        return Datatables::of($data)->make(true);

    }
    public function datatable_bookvip(Request $request)
    {

        $data = DB::table('ck_topic_novel')
                            ->select('*', 'ck_topic_novel.id as id_B', 'ck_topic_novel.picture as pic_B', 'ck_topic_novel.status as status_B')
                            ->leftjoin('ck_user', 'ck_user.id','=', 'ck_topic_novel.id_user')
                            ->where('ck_topic_novel.type',1)
                            ->where('ck_user.level',3)
                            ->get();

        return Datatables::of($data)->make(true);

    }
}
