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

class CommentReportController extends Controller
{
    public function indexContenr()
    {

        return view('backend.report.index_content');

    }
    public function indexChapter()
    {

        return view('backend.report.index_chapter');

    }

    public function delComment(Request $request){



        if(request('type') == "content"){

            $str = DB::table('ck_commentContenr')->where('id', request('id'))->first();
            

            $data = [
                "id_user" => $str->id_user,
                "type" => 11,
                "detail" => "การแสดงความคิดเห็นของคุณลบโดย WebMaster สาเหตุจาก". request('detail')
            ];

            $data = DB::table('report_writh_status')->insert($data);

            DB::table('ck_commentContenr')->where('id', request('id'))->update(['comment_status' => '1']);
            

        }else{

            $str = DB::table('ck_commentChapter')->where('id', request('id'))->first();
            

            $data = [
                "id_user" => $str->id_user,
                "type" => 11,
                "detail" => "การแสดงความคิดเห็นของคุณลบโดย WebMaster สาเหตุจาก" . request('detail')
            ];

            $data = DB::table('report_writh_status')->insert($data);

            DB::table('ck_commentChapter')->where('id', request('id'))->update(['comment_status' => '1']);


        }



    }

    public function datatableContenr()
    {


        $data = DB::table('report_commentContent')->select('*','report_commentContent.detail as detail_r','report_commentContent.type as type_r', 'report_commentContent.id as id_r', 'ck_commentContenr.id as id_c', 'report_commentContent.email as email_r')
                        ->leftJoin('ck_commentContenr', 'ck_commentContenr.id','=', 'report_commentContent.id_comment')
                        ->leftJoin('ck_content', 'ck_commentContenr.id_content','=', 'ck_content.id')
                        ->leftJoin('ck_user', 'ck_user.id','=', 'report_commentContent.id_user')
                        ->where('ck_commentContenr.comment_status',0)->orderBy('report_commentContent.created', 'desc')->get();

        return Datatables::of($data)->make(true);

    }

    public function datatableChapter()
    {


        $data = DB::table('report_commentChapter')->select('*', 'report_commentChapter.detail as detail_r', 'report_commentChapter.type as type_r', 'report_commentChapter.id as id_r', 'ck_commentChapter.id as id_c', 'report_commentChapter.email as email_r')
            ->leftJoin('ck_commentChapter', 'ck_commentChapter.id', '=', 'report_commentChapter.id_comment')
            ->leftJoin('ck_topic_novel', 'ck_commentChapter.id_book', '=', 'ck_topic_novel.id')
            ->leftJoin('ck_user', 'ck_user.id', '=', 'report_commentChapter.id_user')
            ->where('ck_commentChapter.comment_status', 0)->orderBy('report_commentChapter.created', 'desc')->get();

        return Datatables::of($data)->make(true);

    }
    
}
