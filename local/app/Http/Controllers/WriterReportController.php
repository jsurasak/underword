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

class WriterReportController extends Controller
{
    public function index()
    {

        return view('backend.report.index_writer');

    }

    public function check_report(Request $request)
    {
        if(request('type') == 1){

            DB::table('report_Topwriter')->where('id',request('id'))->update(['status' => 1]);

        }else{

            DB::table('report_writer')->where('id', request('id'))->update(['status' => 1]);

        }


    }

    public function datatable()
    {

        $array = new Collection;

        $data = DB::table('report_Topwriter')
                    ->select('*', 'report_Topwriter.status as status_r', 'ck_topic_novel.type as type_w','report_Topwriter.detail as detail_r','report_Topwriter.id as id_r', 'ck_topic_novel.id as id_t')
                    ->leftJoin('ck_topic_novel', 'ck_topic_novel.id','=', 'report_Topwriter.id_book')
                    ->orderBy('status_r','asc')
                    ->get();

        foreach($data as $d){

            $array[] = [
                "type_t" => 1,
                "type_W" => $d->type_w,
                "id_r" => $d->id_r,
                "id_t" => $d->id_t,
                "name_t" => $d->name,
                "chapter" => "-",
                "type_r" => $d->type_r,
                "detail" => $d->detail_r,
                "email_r" => $d->email,
                "status" => $d->status_r
                
            ];

        }

        $data = DB::table('report_writer')
            ->select('*', 'report_writer.status as status_r','ck_topic_novel.type as type_w','report_writer.detail as detail_r', 'report_writer.id as id_r', 'ck_topic_novel.id as id_t')
            ->leftJoin('ck_topic_novel', 'ck_topic_novel.id', '=', 'report_writer.id_book')
            ->orderBy('status_r', 'asc')
            ->get();

        foreach ($data as $d) {

            if($d->type == 1){

                $chap = DB::table('chapter_book')->where('id',$d->id_chapter)->first();

            }else{

                $chap = DB::table('cartoon_book')->where('id', $d->id_chapter)->first();

            }

            $array[] = [
                "type_t" => 2,
                "type_W" => $d->type_w,
                "id_r" => $d->id_r,
                "id_t" => $d->id_t,
                "name_t" => $d->name,
                "chapter" => $chap->chapter_header,
                "type_r" => $d->type_r,
                "detail" => $d->detail_r,
                "email_r" => $d->email,
                "status" => $d->status_r

            ];


        }

            

        return Datatables::of($array)->make(true);

    }
    

    

}
