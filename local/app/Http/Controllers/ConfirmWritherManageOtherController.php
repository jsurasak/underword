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

class ConfirmWritherManageOtherController extends Controller

{

    public function index_book()
    {

        return view('backend.confirmwrithermanage.indexbook');

    }
    public function close_book($id, $detail)
    {


        $u = DB::table('chapter_book')->where('id', $id)->first();
        $w = DB::table('ck_topic_novel')->where('id', $u->id_novel)->first();

        $data = [
            "id_user" => $w->id_user,
            "id_book" => $w->id,
            "id_chap" => $id,
            "type" => $w->type,
            "detail" => $detail
        ];

        $data = DB::table('report_writh_status')->insert($data);


        $data = DB::table('chapter_book')->where('id', $id)->update(['status' => 3]);
        Alert::success('Success Close');
        return redirect()->action('ConfirmWritherManageOtherController@index_book');
    }

    public function confirm_book($id){

        $u = DB::table('chapter_book')->where('id', $id)->first();
        $w = DB::table('ck_topic_novel')->where('id', $u->id_novel)->first();

        $data = [
            "id_user" => $w->id_user,
            "id_book" => $w->id,
            "id_chap" => $id,
            "type" => $w->type,
            "detail" => "อนุมัติการเผยแพร่"
        ];

        $data = DB::table('chapter_book')->where('id', $id)->update(['status' => 1]);
        Alert::success('Success Close');
        return redirect()->action('ConfirmWritherManageOtherController@index_book');

    }

    ###############################################################################################

    public function index_commic()
    {

        return view('backend.confirmwrithermanage.indexcartoon');

    }
    public function close_commic($id,$detail)
    {

        $u = DB::table('cartoon_book')->where('id', $id)->first();
        $w = DB::table('ck_topic_novel')->where('id', $u->id_novel)->first();

        $data = [
            "id_user" => $w->id_user,
            "id_book" => $w->id,
            "id_chap" => $id,
            "type" => $w->type,
            "detail" => $detail
        ];

        $data = DB::table('report_writh_status')->insert($data);


        $data = DB::table('cartoon_book')->where('id', $id)->update(['status' => 3]);
        Alert::success('Success Close');
        return redirect()->action('ConfirmWritherManageOtherController@index_commic');
    }

    public function confirm_commic($id)
    {

        $u = DB::table('cartoon_book')->where('id', $id)->first();
        $w = DB::table('ck_topic_novel')->where('id', $u->id_novel)->first();

        $data = [
            "id_user" => $w->id_user,
            "id_book" => $w->id,
            "id_chap" => $id,
            "type" => $w->type,
            "detail" => "อนุมัติการเผยแพร่"
        ];

        $data = DB::table('cartoon_book')->where('id', $id)->update(['status' => 1]);
        Alert::success('Success Close');
        return redirect()->action('ConfirmWritherManageOtherController@index_book');

    }


    #########################################################################################


    public function index_short()
    {

        return view('backend.confirmwrithermanage.index_short');

    }

    public function closeShort($id,$detail){


        $u = DB::table('ck_topic_novel')->where('id', $id)->first();

        $data = [
            "id_user" => $u->id_user,
            "id_book" => $id,
            "type" => $u->type,
            "detail" => $detail
        ];

        $data = DB::table('report_writh_status')->insert($data);

        $data = DB::table('ck_topic_novel')->where('id', $id)->update(['status' => 3]);
        Alert::success('Success Close');
        return redirect()->action('ConfirmWritherManageOtherController@index_short');

    }

    public function confirm_short($id)
    {

        $u = DB::table('ck_topic_novel')->where('id', $id)->first();

        $data = [
            "id_user" => $u->id_user,
            "id_book" => $id,
            "type" => $u->type,
            "detail" => "อนุมัติการเผยแพร่"
        ];

        $data = DB::table('ck_topic_novel')->where('id', $id)->update(['status' => 1]);
        Alert::success('Success Close');
        return redirect()->action('ConfirmWritherManageOtherController@index_short');

    }

    #########################################################################################

    public function index_story()
    {

        return view('backend.confirmwrithermanage.index_story');

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

        $data = DB::table('report_writh_status')->insert($data);

        $data = DB::table('ck_topic_novel')->where('id', $id)->update(['status' => 3]);
        Alert::success('Success Close');
        return redirect()->action('ConfirmWritherManageOtherController@index_story');

    }

    public function confirm_Story($id)
    {

        $u = DB::table('ck_topic_novel')->where('id', $id)->first();

        $data = [
            "id_user" => $u->id_user,
            "id_book" => $id,
            "type" => $u->type,
            "detail" => "อนุมัติการเผยแพร่"
        ];

        $data = DB::table('ck_topic_novel')->where('id', $id)->update(['status' => 1]);
        Alert::success('Success Close');
        return redirect()->action('ConfirmWritherManageOtherController@index_story');

    }

    ######################################################################################################

    public function index_clip()
    {

        return view('backend.confirmwrithermanage.index_clip');

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

        $data = DB::table('report_writh_status')->insert($data);

        $data = DB::table('ck_topic_novel')->where('id', $id)->update(['status' => 3]);
        Alert::success('Success Close');
        return redirect()->action('ConfirmWritherManageOtherController@index_clip');

    }

    public function confirm_Clip($id)
    {

        $u = DB::table('ck_topic_novel')->where('id', $id)->first();

        $data = [
            "id_user" => $u->id_user,
            "id_book" => $id,
            "type" => $u->type,
            "detail" => "อนุมัติการเผยแพร่"
        ];

        $data = DB::table('ck_topic_novel')->where('id', $id)->update(['status' => 1]);
        Alert::success('Success Close');
        return redirect()->action('ConfirmWritherManageOtherController@index_clip');

    }

    ##############################################################################################

    public function datatable_book(){

        $array = new Collection;

        $data = DB::select("SELECT c.id,c.id_novel,c.chapter,c.chapter_header,c.status,(SELECT r.detail FROM report_writh_status r WHERE r.id_chap = c.id ORDER BY r.id DESC LIMIT 1) as detail FROM chapter_book c WHERE status = 4");

        if($data){
            foreach($data as $d){
                $array[] = [
                    "id" => $d->id,
                    "id_novel" => $d->id_novel,
                    "chapter" => $d->chapter,
                    "chapter_header" => $d->chapter_header,
                    "detail" => $d->detail,
                    "status" => $d->status
                ];
            }
        }


        return Datatables::of($array)->make(true);

    }

    public function datatable_commic()
    {

        $array = new Collection;

        $data = DB::select("SELECT c.id,c.id_novel,c.chapter,c.chapter_header,c.status,(SELECT r.detail FROM report_writh_status r WHERE r.id_chap = c.id ORDER BY r.id DESC LIMIT 1) as detail FROM cartoon_book c WHERE status = 4");

        if ($data) {
            foreach ($data as $d) {
                $array[] = [
                    "id" => $d->id,
                    "id_novel" => $d->id_novel,
                    "chapter" => $d->chapter,
                    "chapter_header" => $d->chapter_header,
                    "detail" => $d->detail,
                    "status" => $d->status
                ];
            }
        }


        return Datatables::of($array)->make(true);

    }
    

    public function datatable_short()
    {

        $array = new Collection;

        $data = DB::select("SELECT c.id,c.name,c.status,(SELECT r.detail FROM report_writh_status r WHERE r.type = 3 and r.id_book = c.id ORDER BY r.id DESC LIMIT 1) as detail FROM ck_topic_novel c WHERE c.type = 3 AND status = 4");

        if ($data) {
            foreach ($data as $d) {
                $array[] = [
                    "id" => $d->id,
                    "name" => $d->name,
                    "detail" => $d->detail,
                    "status" => $d->status
                ];
            }
        }

        return Datatables::of($array)->make(true);

    }
    public function datatable_story()
    {

        $array = new Collection;

        $data = DB::select("SELECT c.id,c.name,c.status,(SELECT r.detail FROM report_writh_status r WHERE r.type = 4 and r.id_book = c.id ORDER BY r.id DESC LIMIT 1) as detail FROM ck_topic_novel c WHERE c.type = 4 and status = 4");

        if ($data) {
            foreach ($data as $d) {
                $array[] = [
                    "id" => $d->id,
                    "name" => $d->name,
                    "detail" => $d->detail,
                    "status" => $d->status
                ];
            }
        }

        return Datatables::of($array)->make(true);

    }
    public function datatable_clip()
    {

        $array = new Collection;

        $data = DB::select("SELECT c.id,c.name,c.status,(SELECT r.detail FROM report_writh_status r WHERE r.type = 5 and r.id_book = c.id ORDER BY r.id DESC LIMIT 1) as detail FROM ck_topic_novel c WHERE c.type = 5 AND status = 4");

        if ($data) {
            foreach ($data as $d) {
                $array[] = [
                    "id" => $d->id,
                    "name" => $d->name,
                    "detail" => $d->detail,
                    "status" => $d->status
                ];
            }
        }

        return Datatables::of($array)->make(true);

    }
}
