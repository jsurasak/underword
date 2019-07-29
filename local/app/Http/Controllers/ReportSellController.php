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
use PHPExcel;
use PHPExcel_IOFactory;


function selectRound()
{

    if (date('Y-m-d') >= (date('Y') - 1) . '-12-11' && date('Y-m-d') <= (date('Y') - 1) . '-12-25') {
        $round = 1;

    } else if (date('Y-m-d') >= (date('Y') - 1) . '-12-26' && date('Y-m-d') <= date('Y') . '-01-10') {
        $round = 2;

    } else if (date('Y-m-d') >= date('Y') . '-01-11' && date('Y-m-d') <= date('Y') . '-01-25') {
        $round = 3;

    } else if (date('Y-m-d') >= date('Y') . '-01-26' && date('Y-m-d') <= date('Y') . '-02-10') {
        $round = 4;

    } else if (date('Y-m-d') >= date('Y') . '-02-11' && date('Y-m-d') <= date('Y') . '-02-25') {
        $round = 5;

    } else if (date('Y-m-d') >= date('Y') . '-02-26' && date('Y-m-d') <= date('Y') . '-03-10') {
        $round = 6;

    } else if (date('Y-m-d') >= date('Y') . '-03-11' && date('Y-m-d') <= date('Y') . '-03-25') {
        $round = 7;

    } else if (date('Y-m-d') >= date('Y') . '-03-26' && date('Y-m-d') <= date('Y') . '-04-10') {
        $round = 8;

    } else if (date('Y-m-d') >= date('Y') . '-04-11' && date('Y-m-d') <= date('Y') . '-04-25') {
        $round = 9;

    } else if (date('Y-m-d') >= date('Y') . '-04-26' && date('Y-m-d') <= date('Y') . '-05-10') {
        $round = 10;

    } else if (date('Y-m-d') >= date('Y') . '-05-11' && date('Y-m-d') <= date('Y') . '-05-25') {
        $round = 11;

    } else if (date('Y-m-d') >= date('Y') . '-05-26' && date('Y-m-d') <= date('Y') . '-06-10') {
        $round = 12;

    } else if (date('Y-m-d') >= date('Y') . '-06-11' && date('Y-m-d') <= date('Y') . '-06-25') {
        $round = 13;

    } else if (date('Y-m-d') >= date('Y') . '-06-26' && date('Y-m-d') <= date('Y') . '-07-10') {
        $round = 14;

    } else if (date('Y-m-d') >= date('Y') . '-07-11' && date('Y-m-d') <= date('Y') . '-07-25') {
        $round = 15;

    } else if (date('Y-m-d') >= date('Y') . '-07-26' && date('Y-m-d') <= date('Y') . '-08-10') {
        $round = 16;

    } else if (date('Y-m-d') >= date('Y') . '-08-11' && date('Y-m-d') <= date('Y') . '-08-25') {
        $round = 17;

    } else if (date('Y-m-d') >= date('Y') . '-08-26' && date('Y-m-d') <= date('Y') . '-09-10') {
        $round = 18;

    } else if (date('Y-m-d') >= date('Y') . '-09-11' && date('Y-m-d') <= date('Y') . '-09-25') {
        $round = 19;

    } else if (date('Y-m-d') >= date('Y') . '-09-26' && date('Y-m-d') <= date('Y') . '-10-10') {
        $round = 20;

    } else if (date('Y-m-d') >= date('Y') . '-10-11' && date('Y-m-d') <= date('Y') . '-10-25') {
        $round = 21;

    } else if (date('Y-m-d') >= date('Y') . '-10-26' && date('Y-m-d') <= date('Y') . '-11-10') {
        $round = 22;

    } else if (date('Y-m-d') >= date('Y') . '-11-11' && date('Y-m-d') <= date('Y') . '-11-25') {
        $round = 23;

    } else {
        $round = 24;
    }

    return $round - 1;


}

class ReportSellController extends Controller
{

    public function index()
    {


        $round = selectRound();

        $year = DB::table('statement_sell')->select('year')->where('year', '!=', date('Y'))->groupBy('year')->get();


        return view('backend.report.index_reportSell')->with(['round' => $round, 'year' => $year]);
    }
    public function index_bile()
    {

        $round = selectRound();

        $year = DB::table('statement_bile')->select('year')->where('year', '!=', date('Y'))->groupBy('year')->get();


        return view('backend.report.index_bile')->with(['round' => $round, 'year' => $year]);
    }

    public function detailReport(Request $request)
    {

        $str = DB::table('statement_sell_detail')->where('id_statement_sell', request('id'))->get();

        return json_encode($str);

    }
    public function update(Request $request)
    {


        $id = explode(',', request('id'));
        $total = 0;

        foreach ($id as $i) {

            $str = DB::table('statement_sell')->where('id', $i)->first();

            $total += $str->total;
            $round[] = $str->round;
            $id_user = $str->id_user;

            $str2 = DB::table('statement_sell')->where('id', $i)->update(["status" => 1]);
        }

        $dis5 = round((($total * 50) / 100), 2);

        if($dis5 >= 1000){

            $dis3 = round((((($total * 50) / 100) * 3) / 100), 2);
            $total_f = round(((((($total * 50) / 100) * 97) / 100) - 30), 2);
        
        }else{

            $dis3 = 0;
            $total_f = $dis5 - 30; 

        }

        $data = [
            "id_statement_sell" => request('id'),
            "id_user" => $id_user,
            "round" => implode(',', $round),
            "round_bile" => request('round'),
            "year" => request('year'),
            "total_sell" => $total,
            "dis_5" => $dis5,
            "dis_3" => $dis3,
            "des3" => 30,
            "total_true" => $total_f,
            "data_submit" => request('dateBile'),
        ];

        

        DB::table('statement_bile')->insert($data);



    }

    public function exportReport($round, $year)
    {

        $data = "";


        $str = DB::table('statement_bile')->where('round_bile', $round)->where('year', $year)->get();
        foreach ($str as $s) {

            $statement_id = explode(',', $s->id_statement_sell);

            foreach ($statement_id as $idS) {

                $subStatem = DB::table('statement_sell_detail')->where('id_statement_sell', $idS)->get();
                foreach ($subStatem as $ss) {

                    list($day, $time) = explode(' ', $ss->date_time);

                    $data[$s->id_user][] = [
                        "day" => $day,
                        "time" => $time,
                        "name_book" => $ss->name_book,
                        "name_chap" => $ss->name_chap,
                        "name_writer" => $ss->name_writer,
                        "price" => $ss->price,
                    ];


                }

            }

        }









        $objPHPExcel = new PHPExcel();


        $objPHPExcel->getProperties()->setCreator("Maarten Balliauw")
            ->setLastModifiedBy("Maarten Balliauw")
            ->setTitle("Office 2007 XLSX Test Document")
            ->setSubject("Office 2007 XLSX Test Document")
            ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
            ->setKeywords("office 2007 openxml php")
            ->setCategory("Test result file");

        $objWorkSheet = $objPHPExcel->getActiveSheet();

        $objWorkSheet = $objPHPExcel->createSheet(0);

        // $objPHPExcel->getActiveSheet(0)
        //     ->getColumnDimension('A')
        //     ->setWidth(30);
        // $objPHPExcel->getActiveSheet(0)
        //     ->getColumnDimension('B')
        //     ->setWidth(45);
        // $objPHPExcel->getActiveSheet(0)
        //     ->getColumnDimension('C')
        //     ->setWidth(15);
        // $objPHPExcel->getActiveSheet(0)
        //     ->getColumnDimension('D')
        //     ->setWidth(5);
        // $objPHPExcel->getActiveSheet(0)
        //     ->getColumnDimension('E')
        //     ->setWidth(10);
        // $objPHPExcel->getActiveSheet(0)
        //     ->getColumnDimension('F')
        //     ->setWidth(10);

        $objPHPExcel->getActiveSheet(0)->mergeCells('A1:F1');
        $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A3', 'รอบบิลที่')
            ->setCellValue('B3', 'username')
            ->setCellValue('C3', 'ธนาคาร')
            ->setCellValue('D3', 'เลขบัญชี')
            ->setCellValue('E3', 'ชื่อบัญชี')
            ->setCellValue('F3', 'รายได้จากการขาย')
            ->setCellValue('G3', 'รายได้สุทธิ (หลังหักค่าบริการ)')
            ->setCellValue('H3', 'หักภาษี ณ ที่จ่าย')
            ->setCellValue('I3', 'หักค่าบริการ')
            ->setCellValue('J3', 'คงเหลือยอดโอน')
            ->setCellValue('K3', 'กำหนดชำระเงิน');

        $num = 4;

        $str = DB::table('statement_bile')->leftJoin('ck_user', 'statement_bile.id_user', '=', 'ck_user.id')->where('round_bile', $round)->where('year', $year)->get();

        foreach ($str as $s) {


            $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue('A' . $num, $s->round)
                ->setCellValue('B' . $num, $s->username)
                ->setCellValue('C' . $num, $s->bank_name)
                ->setCellValue('D' . $num, $s->bank_number)
                ->setCellValue('E' . $num, $s->user_bank)
                ->setCellValue('F' . $num, $s->total_sell)
                ->setCellValue('G' . $num, $s->dis_5)
                ->setCellValue('H' . $num, $s->dis_3)
                ->setCellValue('I' . $num, $s->des3)
                ->setCellValue('J' . $num, $s->total_true)
                ->setCellValue('K' . $num, $s->data_submit);


            $num++;


        }

        $objPHPExcel->getActiveSheet(0)->setTitle("Sale Report");

        $objWorkSheet = $objPHPExcel->createSheet(1);

        $num = 1;

        foreach ($data as $key => $detail) {



            $u = DB::table('ck_user')->where('id', $key)->first();


            $objPHPExcel->getActiveSheet(1)->mergeCells('A' . $num . ':H' . $num);
            $objPHPExcel->setActiveSheetIndex(1)
                ->setCellValue('A' . $num, $u->username);

            $num++;

            $objPHPExcel->setActiveSheetIndex(1)
                ->setCellValue('A' . $num, 'วันที่ขาย')
                ->setCellValue('B' . $num, 'เวลา')
                ->setCellValue('C' . $num, 'ชื่อหนังสือ')
                ->setCellValue('D' . $num, 'ตอนที่เปิดขาย')
                ->setCellValue('E' . $num, 'ชื่อผู้แต่ง')
                ->setCellValue('F' . $num, 'ราคาขาย')
                ->setCellValue('G' . $num, 'จำนวน')
                ->setCellValue('H' . $num, 'รายรับจริง');

            $num++;

            $total_b = 0;
            $total_p = 0;

            foreach ($detail as $d) {



                $objPHPExcel->setActiveSheetIndex(1)
                    ->setCellValue('A' . $num, $d['day'])
                    ->setCellValue('B' . $num, $d['time'])
                    ->setCellValue('C' . $num, $d['name_book'])
                    ->setCellValue('D' . $num, $d['name_chap'])
                    ->setCellValue('E' . $num, $d['name_writer'])
                    ->setCellValue('F' . $num, $d['price'])
                    ->setCellValue('G' . $num, 1)
                    ->setCellValue('H' . $num, $d['price']);
                $total_b++;
                $total_p += $d['price'];
                $num++;


            }

            $objPHPExcel->getActiveSheet(1)->mergeCells('A' . $num . ':F' . $num);
            $objPHPExcel->setActiveSheetIndex(1)
                ->setCellValue('G' . $num, 'จำนวน')
                ->setCellValue('H' . $num, 'รายรับจริง');
            $num++;
            $objPHPExcel->getActiveSheet(1)->mergeCells('A' . $num . ':F' . $num);
            $objPHPExcel->setActiveSheetIndex(1)
                ->setCellValue('A' . $num, 'รวม')
                ->setCellValue('G' . $num, $total_b)
                ->setCellValue('H' . $num, $total_p);
            $num++;

        }


        $objPHPExcel->getActiveSheet(1)->setTitle("Sale Report All");



        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="report_sell_' . date('d_m_Y') . '.xlsx"');
        header('Cache-Control: max-age=0');
           // If you're serving to IE 9, then the following may be needed
        header('Cache-Control: max-age=1');

           // If you're serving to IE over SSL, then the following may be needed
        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
        header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
        header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
        header('Pragma: public');


        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $objWriter->save('php://output');

    }


    public function datatableUser(Request $request)
    {

        $data = new Collection;

        $year = request('year');
        $round = request('round');

        switch ($round) {
            case 1:
                $year = $year - 1;
                $start = $year . '-12-11';
                $end = $year . '-12-25';
                break;
            case 2:
                $start = ($year - 1) . '-12-26';
                $end = $year . '-01-10';
                break;
            case 3:
                $start = $year . '-01-11';
                $end = $year . '-01-25';
                break;
            case 4:
                $start = $year . '-01-26';
                $end = $year . '-02-10';
                break;
            case 5:
                $start = $year . '-02-11';
                $end = $year . '-02-25';
                break;
            case 6:
                $start = $year . '-02-26';
                $end = $year . '-03-10';
                break;
            case 7:
                $start = $year . '-03-11';
                $end = $year . '-03-25';
                break;
            case 8:
                $start = $year . '-03-26';
                $end = $year . '-04-10';
                break;
            case 9:
                $start = $year . '-04-11';
                $end = $year . '-04-25';
                break;
            case 10:
                $start = $year . '-04-26';
                $end = $year . '-05-10';
                break;
            case 11:
                $start = $year . '-05-11';
                $end = $year . '-05-25';
                break;
            case 12:
                $start = $year . '-05-26';
                $end = $year . '-06-10';
                break;
            case 13:
                $start = $year . '-06-11';
                $end = $year . '-06-25';
                break;
            case 14:
                $start = $year . '-06-26';
                $end = $year . '-07-10';
                break;
            case 15:
                $start = $year . '-07-11';
                $end = $year . '-07-25';
                break;
            case 16:
                $start = $year . '-07-26';
                $end = $year . '-08-10';
                break;
            case 17:
                $start = $year . '-08-11';
                $end = $year . '-08-25';
                break;
            case 18:
                $start = $year . '-08-26';
                $end = $year . '-09-10';
                break;
            case 19:
                $start = $year . '-09-11';
                $end = $year . '-09-25';
                break;
            case 20:
                $start = $year . '-09-26';
                $end = $year . '-10-10';
                break;
            case 21:
                $start = $year . '-10-11';
                $end = $year . '-10-25';
                break;
            case 22:
                $start = $year . '-10-26';
                $end = $year . '-11-10';
                break;
            case 23:
                $start = $year . '-11-11';
                $end = $year . '-11-25';
                break;
            case 24:
                $start = $year . '-11-26';
                $end = $year . '-12-10';
                break;
        }

        if ($end < date('Y-m-d')) {

            $str = DB::table('statement_sell')->leftJoin('ck_user', 'ck_user.id', '=', 'statement_sell.id_user')->where('round', request('round'))->where('year', request('year'));
            $check = $str->count();

            if ($check == 0) {

                $user = DB::table('ck_user')->where('level', '>=', 2)->get();

                foreach ($user as $u) {

                    $first = [
                        "id_user" => $u->id,
                        "round" => $round,
                        "year" => $year,
                        "status" => 0,
                        "created" => date('Y-m-d H:i:s'),
                    ];

                    $id = DB::table('statement_sell')->insertGetId($first);

                    $report = "";
                    $total_p = 0;


                    $str = DB::table('statement_book')
                        ->select('*', 'statement_book.price as price_b', 'statement_book.created as time_s', 'statement_book.price as price_b')
                        ->leftJoin('ck_topic_novel', 'statement_book.id_novel', '=', 'ck_topic_novel.id')
                        ->leftJoin('ck_user', 'ck_topic_novel.id_user', '=', 'ck_user.id')
                        ->where('ck_user.id', $u->id)
                        ->whereBetween('statement_book.created', [$start, $end])
                        ->get();


                    foreach ($str as $key => $s) {

                        list($d, $t) = explode(' ', $s->time_s);

                        $report = [
                            "id_statement_sell" => $id,
                            "date_time" => $s->time_s,
                            "name_book" => $s->name,
                            "name_writer" => $s->name_writer,
                            "type" => $s->type,
                            "price" => $s->price_b
                        ];

                        DB::table('statement_sell_detail')->insert($report);

                        $total_p += $s->price_b;

                    }



                    $str2 = DB::table('statement_chapterbook')
                        ->select('*', 'statement_chapterbook.price as price_chap', 'statement_chapterbook.created as time_s', 'statement_chapterbook.price as price_b')
                        ->leftJoin('ck_topic_novel', 'statement_chapterbook.id_novel', '=', 'ck_topic_novel.id')
                        ->leftJoin('ck_user', 'ck_topic_novel.id_user', '=', 'ck_user.id')
                        ->where('ck_user.id', $u->id)
                        ->whereBetween('statement_chapterbook.created', [$start, $end])
                        ->get();


                    foreach ($str2 as $key => $s2) {


                        list($d, $t) = explode(' ', $s2->time_s);

                        if ($s2->type == 1) {
                            $cH = DB::table('chapter_book')->where('id', $s2->id_chap)->first();
                        } else {
                            $cH = DB::table('cartoon_book')->where('id', $s2->id_chap)->first();
                        }

                        list($d, $t) = explode(' ', $s2->time_s);


                        $report = [
                            "id_statement_sell" => $id,
                            "date_time" => $s2->time_s,
                            "name_book" => $s2->name,
                            "name_chap" => 'ตอนที่ ' . $cH->chapter . ' ' . $cH->chapter_header,
                            "name_writer" => $s2->name_writer,
                            "price" => $cH->price,
                            "type" => $s2->type,

                        ];

                        DB::table('statement_sell_detail')->insert($report);

                        $total_p += $cH->price;

                    }


                    DB::table('statement_sell')->where('id', $id)->update(["total" => $total_p]);


                }


            }


            if (request('type') == 99) {

                $str = DB::select("SELECT *,statement_sell.id as id_s,id_user as id2,(SELECT sum(total) FROM statement_sell WHERE round = " . request('round') . " AND id_user = id2 AND status = 1 GROUP BY id_user ) as total2 FROM `statement_sell` LEFT JOIN ck_user ON ck_user.id = statement_sell.id_user WHERE statement_sell.status = 1 AND round = " . request('round') . " AND total > 0");

                $min = 0;
                $max = 99999999;
            
            } else {

                if (request('type') == 1) {

                    $str = DB::select("SELECT *,statement_sell.id as id_s,id_user as id2,total as total2 FROM `statement_sell` LEFT JOIN ck_user ON ck_user.id = statement_sell.id_user WHERE statement_sell.status = 0 AND round = " . request('round') . " AND total > 0");
                    $min = 2000;
                    $max = 9999999;

                } else if (request('type') == 2) {

                    $str = DB::select("SELECT *,statement_sell.id as id_s,id_user as id2,(SELECT sum(total) FROM statement_sell WHERE round <= " . request('round') . " AND id_user = id2 AND status = 0 GROUP BY id_user ) as total2 FROM `statement_sell` LEFT JOIN ck_user ON ck_user.id = statement_sell.id_user WHERE statement_sell.status = 0 AND round <= " . request('round') . " AND total > 0");
                    $min = 2000;
                    $max = 9999999;

                } else if (request('type') == 3) {

                    $str = DB::select("SELECT *,statement_sell.id as id_s,id_user as id2,(SELECT sum(total) FROM statement_sell WHERE round <= " . request('round') . " AND id_user = id2 AND status = 0 GROUP BY id_user ) as total2 FROM `statement_sell` LEFT JOIN ck_user ON ck_user.id = statement_sell.id_user WHERE statement_sell.status = 0 AND round <= " . request('round') . " AND total > 0");
                    $min = 300;
                    $max = 2000;

                } else {

                    $str = DB::select("SELECT *,statement_sell.id as id_s,id_user as id2,(SELECT sum(total) FROM statement_sell WHERE round <= " . request('round') . " AND id_user = id2 AND status = 0 GROUP BY id_user ) as total2 FROM `statement_sell` LEFT JOIN ck_user ON ck_user.id = statement_sell.id_user WHERE statement_sell.status = 0 AND round <= " . request('round') . " AND total > 0");
                    $min = 0;
                    $max = 300;

                }

            }

            foreach ($str as $s) {

                if ($s->total2 > $min && $s->total2 < $max) {

                    $data[] = [
                        "id_s" => $s->id_s,
                        "round" => $s->round,
                        "id_user" => $s->id_user,
                        "username" => $s->username,
                        "bank_number" => $s->bank_number,
                        "bank_name" => $s->bank_name,
                        "bank_type" => $s->bank_type,
                        "user_bank" => $s->user_bank,
                        "total" => $s->total,
                    ];

                }

            }

        }


        $request->session()->put('data', $data);


        return Datatables::of($data)->make(true);

    }

    public function datatablebile(Request $request)
    {


        $data = DB::table('statement_bile')->leftJoin('ck_user', 'statement_bile.id_user', '=', 'ck_user.id')->where('round_bile', request('round'))->where('year', request('year'))->get();
        return Datatables::of($data)->make(true);

    }

}
