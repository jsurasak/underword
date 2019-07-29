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


class SkullReportController extends Controller
{

    public function index()
    {
        return view('backend.report.index_skull');
    }
    public function excel($round){

        $data = DB::table('statement_buy_S')
            ->select('statement_buy_S.point_s', 'statement_buy_S.old_point_s', 'statement_buy_S.add_by', 'statement_buy_S.created', 'ck_user.username')
            ->leftJoin('ck_user', 'statement_buy_S.id_user', '=', 'ck_user.id');
            list($s, $e) = explode('_', $round);
            $data = $data->where('created', '>=', $s)->where('created', '<=', $e)->orderBy('created', 'asc')->get();


        $start = date('d/m/Y',strtotime($s));
        $end = date('d/m/Y', strtotime($e));



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
        $objPHPExcel->getActiveSheet(0)->mergeCells('A1:D1');
        $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', 'Report การขายหัวกระโหลกประจำวันที่ '. $start .'ถึงวันที่ '.$end )
            ->setCellValue('A2', 'username')
            ->setCellValue('B2', 'จำนวนที่ซื้อ')
            ->setCellValue('C2', 'จำนวนที่มีก่อนซื้อ')
            ->setCellValue('D2', 'ซื้อโดย')
            ->setCellValue('E2', 'เวลาที่ซื้อ');

        $num = 3;

        if($data){
            foreach($data as $d){
                $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('A' . $num, $d->username)
                    ->setCellValue('B' . $num, $d->point_s)
                    ->setCellValue('C' . $num, $d->old_point_s)
                    ->setCellValue('D' . $num, $d->add_by)
                    ->setCellValue('E' . $num, $d->created);

                    $num++;
            }
        }

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="report_skull_' . date('d_m_Y') . '.xlsx"');
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

    public function datatable(Request $request)
    {

        

        $data = DB::table('statement_buy_S')
                            ->select('statement_buy_S.point_s', 'statement_buy_S.old_point_s', 'statement_buy_S.add_by', 'statement_buy_S.created', 'ck_user.username')
                            ->leftJoin('ck_user','statement_buy_S.id_user','=', 'ck_user.id');
        if (request('roundDate')) {
            list($s,$e) = explode('-',request('roundDate'));
            list($sM,$sD,$sY) = explode('/',trim($s));
            list($eM, $eD, $eY) = explode('/', trim($e));
            $start = $sY.'-'.$sM.'-'.$sD;
            $end   = $eY . '-' . $eM . '-' . $eD;
            $data = $data->where('created','>=',$start)->where('created','<=',$end);
        }

        $data =  $data->orderBy('created','asc')->get();

        return Datatables::of($data)->make(true);

    }
}
