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


function checkmedia($type,$img,$youtube){

  $text = "";

  if($type == 1){
      if($img){

        foreach($img as $key => $p) {
            $p = $p->store('imgContent');
            list($a,$name) = explode('/',$p);
            $pic[] = $name;
        }

        return implode('|',$pic);
      }else{
        return $text;
      }
  }else{

    return $youtube;

  }

}

function checkmediaEdit($type,$img,$youtube,$old){

  if($type == 1){

      if($img){

        if($old){

          $d_old = explode('|',$old);

          foreach ($d_old as $d) {
            Storage::delete('imgContent/'.$d);
          }

        }

        foreach($img as $key => $p) {
            $p = $p->store('imgContent');
            list($a,$name) = explode('/',$p);
            $pic[] = $name;
        }

        return implode('|',$pic);

      }else{

        return $old;

      }

  }else{

    return $youtube;

  }

}
function delPic($img){

  $d_old = explode('|',$img);

  foreach ($d_old as $d) {
    Storage::delete('imgContent/'.$d);
  }

}


class ContentController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }
  public function index($type)
  {
      $name = DB::table('ck_type_content')->where('id','=',$type)->first();

      if($type == 8){
        return view('backend.content.ghostcomics')->with(['id' => $type,'name' => $name]);
      }else{
        return view('backend.content.content_index')->with(['id' => $type,'name' => $name]);
      }
  }
  public function FormAdd($type){

    $writh = DB::table('ck_writher')->get();

    $name = DB::table('ck_type_content')->where('id','=',$type)->first();

    return view('backend.content.content_form')->with(['id' => $type,'name' => $name,'writh' => $writh]);

  }
  public function FormEdit($type,$id){
    $writh = DB::table('ck_writher')->get();
    $data = DB::table('ck_content')->where('id','=',$id)->first();
    $name = DB::table('ck_type_content')->where('id','=',$type)->first();

    return view('backend.content.content_form')->with(['data' => $data,'name' => $name,'writh' => $writh]);

  }

  public function add(Request $request){

    

    $pic_A = $request->file('pic_A')->store('imgContent');
    list($a,$pic_A) = explode('/',$pic_A);
    $pic_B = $request->file('pic_B')->store('imgContent');
    list($a,$pic_B) = explode('/',$pic_B);


      $data = [
        "type_content" => request('type'),
        "time_set" => request('date'),
        "Tcontent" => request('Tcontent'),
        "day_content" => request('day'),
        "pic_A" => $pic_A,
        "pic_B" => $pic_B,
        "headerA" => request('headerA'),
        "previewA" => request('previewA'),
        "headerB" => request('headerB'),
        "previewB" => request('previewB'),
        "headerC" => request('headerC'),
        "previewC" => request('previewC'),
        "headerC_home" => request('headerC_home'),
        "previewC_home" => request('previewC_home'),
        "headerD" => request('headerD'),
        "previewD" => request('previewD'),
        "headerFull" => request('headerFull'),
        "type_showdetail" => request('type_showdetail'),
        "detail1" => request('detail1'),
        "type_media1" => request('type_media1'),
        "media1" => checkmedia(request('type_media1'),$request->picblock1,request('embed1')),
        "subdetail1" => request('subdetail1'),
        "detail2" => request('detail2'),
        "type_media2" => request('type_media2'),
        "media2" => checkmedia(request('type_media2'),$request->picblock2,request('embed2')),
        "subdetail2" => request('subdetail2'),
        "view" => request('view'),
        "w_by" => request('w_by'),
      ];

      DB::table('ck_content')->insert($data);

      Alert::success('Success Insert');
      return redirect()->action('ContentController@index',request('type'));
  }
  public function edit(Request $request){


    $old = DB::table('ck_content')->where('id',request('id'))->first();

    if($request->file('pic_A') != ""){
    Storage::delete('imgContent/'.$old->pic_A);
    $pic_A = $request->file('pic_A')->store('imgContent');
    list($a,$pic_A) = explode('/',$pic_A);
    }else{
      $pic_A = $old->pic_A;
    }

    if($request->file('pic_B') != ""){
    Storage::delete('imgContent/'.$old->pic_B);
    $pic_B = $request->file('pic_B')->store('imgContent');
    list($a,$pic_B) = explode('/',$pic_B);
    }else{
      $pic_B = $old->pic_B;
    }

    $data = [
      "type_content" => request('type'),
      "time_set" => request('date'),
      "Tcontent" => request('Tcontent'),
      "day_content" => request('day'),
      "pic_A" => $pic_A,
      "pic_B" => $pic_B,
      "headerA" => request('headerA'),
      "previewA" => request('previewA'),
      "headerB" => request('headerB'),
      "previewB" => request('previewB'),
      "headerC" => request('headerC'),
      "previewC" => request('previewC'),
      "headerC_home" => request('headerC_home'),
      "previewC_home" => request('previewC_home'),
      "headerD" => request('headerD'),
      "previewD" => request('previewD'),
      "headerFull" => request('headerFull'),
      "type_showdetail" => request('type_showdetail'),
      "detail1" => request('detail1'),
      "type_media1" => request('type_media1'),
      "media1" => checkmediaEdit(request('type_media1'),$request->picblock1,request('embed1'),$old->media1),
      "subdetail1" => request('subdetail1'),
      "detail2" => request('detail2'),
      "type_media2" => request('type_media2'),
      "media2" => checkmediaEdit(request('type_media2'),$request->picblock2,request('embed2'),$old->media2),
      "subdetail2" => request('subdetail2'),
      "view" => request('view'),
      "w_by" => request('w_by'),
    ];

    DB::table('ck_content')->where('id',request('id'))->update($data);

    // echo '<pre>';
    // print_r($data);
    // exit;

      Alert::success('Success Update');
      return redirect()->action('ContentController@index',request('type'));

  }

  public function Comicsadd(Request $request){

    $picture = $request->file('picture')->store('imgContent');
    list($a,$pic) = explode('/',$picture);

    $data = [
      "day_content" => request('day'),
      "time_set" => request('date'),
      "picture" => $pic
    ];

    DB::table('ck_content_comice')->insert($data);

    Alert::success('Success Insert');
    return redirect()->action('ContentController@index',request('type'));

  }

  public function form_comice(Request $request){

    $data = DB::table('ck_content_comice')->where('id',request('id'))->get();
    return $data;

  }
  public function Comicsedit(Request $request){

    if($request->file('picture') != ""){
      Storage::delete('imgContent/'.request('old'));
      $picture = $request->file('picture')->store('imgContent');
      list($a,$pic) = explode('/',$picture);
    }else{
      $pic = request('old');
    }

    $data = [
      "day_content" => request('day'),
      "time_set" => request('date'),
      "picture" => $pic
    ];

    DB::table('ck_content_comice')->where('id',request('id'))->update($data);
    Alert::success('Success Update');
    return redirect()->action('ContentController@index',request('type'));

  }
  public function delete($type,$id){

    $name = DB::table('ck_content')->where('id',$id)->first();
    // Storage::delete('imgContent/'.$name->pic_A);
    // Storage::delete('imgContent/'.$name->pic_B);

    // if($name->type_media1 == 1){
    //   if($name->media1){
    //     delPic($name->media1);
    //   }
    // }
    // if($name->type_media2 == 1){
    //   if($name->media2){
    //     delPic($name->media2);
    //   }
    // }
   

    DB::table('ck_content')->where('id',$id)->delete();

    Alert::success('Success Delete');
    return redirect()->action('ContentController@index',$type);

  }

  public function deleteComics($type,$id){

    $name = DB::table('ck_content_comice')->where('id',$id)->first();
    Storage::delete('imgContent/'.$name->picture);

    DB::table('ck_content_comice')->where('id',$id)->delete();

    Alert::success('Success Delete');
    return redirect()->action('ContentController@index',$type);
  }


  public function datatable(Request $require){

    $data = DB::table('ck_content')
            ->where('type_content','=',request('tContent'))
            ->where('day_content','LIKE',request('dContent'))->get();

    return Datatables::of($data)->make(true);

  }
  public function datatable_comice(Request $require){

    $data = DB::table('ck_content_comice')
            ->where('day_content','LIKE',request('dContent'))->get();

    return Datatables::of($data)->make(true);

  }
}
