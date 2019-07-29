<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;
use Alert;
use Illuminate\Support\Collection;

class UserController extends Controller
{
    public function index(){

      return view('backend.user.index');

    }

  public function addForm(){

    $arr_province = [
      "กระบี่", "กรุงเทพมหานคร", "กาญจนบุรี", "กาฬสินธุ์", "กำแพงเพชร", "ขอนแก่น", "จันทบุรี",
      "ฉะเชิงเทรา", "ชลบุรี", "ชัยนาท", "ชัยภูมิ", "ชุมพร", "เชียงราย", "เชียงใหม่", "ตรัง", "ตราด", "ตาก", "นครนายก",
      "นครปฐม", "นครพนม", "นครราชสีมา", "นครศรีธรรมราช", "นครสวรรค์", "นนทบุรี", "นราธิวาส", "น่าน", "บุรีรัมย์", "ปทุมธานี",
      "ประจวบคีรีขันธ์", "ปราจีนบุรี", "ปัตตานี", "พะเยา", "พังงา", "พัทลุง", "พิจิตร", "พิษณุโลก", "เพชรบุรี", "เพชรบูรณ์",
      "แพร่", "ภูเก็ต", "มหาสารคาม", "มุกดาหาร", "แม่ฮ่องสอน", "ยโสธร", "ยะลา", "ร้อยเอ็ด",
      "ระนอง", "ระยอง", "ราชบุรี", "ลพบุรี", "ลำปาง", "ลำพูน", "เลย", "ศรีสะเกษ", "สกลนคร",
      "สงขลา", "สตูล", "สมุทรปราการ", "สมุทรสงคราม", "สมุทรสาคร", "สระแก้ว", "สระบุรี",
      "สิงห์บุรี", "สุโขทัย", "สุพรรณบุรี", "สุราษฎร์ธานี", "สุรินทร์", "หนองคาย", "หนองบัวลำภู",
      "อยุธยา", "อ่างทอง", "อำนาจเจริญ", "อุดรธานี", "อุตรดิตถ์", "อุทัยธานี", "อุบลราชธานี" ];


      return view('backend.user.form_user')->with(['arr_province' => $arr_province]);

  }

  public function add(Request $request){


    if ($request->file('picture') != "") {
      $picture = $request->file('picture')->store('imgUser');
    } else {
      $picture = 'imgUser/imgDefault/user-login.jpg';
    }
    if ($request->file('user_code_pic') != "") {
      $user_code_pic = $request->file('user_code_pic')->store('imgUser');
    } else {
      $user_code_pic = "";
    }
    if ($request->file('bank_file') != "") {
      $bank_file = $request->file('bank_file')->store('imgUser');
    } else {
      $bank_file = "";
    }

    

    $data = [
      "username" => request('user'),
      "F_name" => request('f_name'),
      "L_name" => request('l_name'),
      "Email" => request('email'),
      "sex" => request('sex'),
      "password" => md5(request('password')),
      "birthday" => request('birthday'),
      "status_u" => request('status_u'),
      "user_code" => request('user_code'),
      "tel" => request('tel'),
      "local1" => request('local1'),
      "local2" => request('local2'),
      "local3" => request('local3'),
      "local_code" => request('local_code'),
      "s_local1" => request('s_local1'),
      "s_local2" => request('s_local2'),
      "s_local3" => request('s_local3'),
      "s_code" => request('s_code'),
      "bank_name" => request('bank_name'),
      "bank_number" => request('bank_number'),
      "user_bank" => request('user_bank'),
      "bank_type" => request('bank_type'),
      "other" => request('other'),
      "bank_branch" => request('bank_branch'),
      "bank_local" => request('bank_local'),
      "picture" => $picture,
      "user_code_pic" => $user_code_pic,
      "bank_file" => $bank_file,
    ];
    
      
    $id = DB::table('ck_user')->insertGetId($data);

    DB::table('name_writer')->insert(['id_user' => $id,'number' => 1,'name' => request('writher_n1'),'detail' => request('writher_statusN1'),'created' => date('Y-m-d H:i:s')]);
    DB::table('name_writer')->insert(['id_user' => $id, 'number' => 2, 'name' => request('writher_n2'), 'detail' => request('writher_statusN2'), 'created' => date('Y-m-d H:i:s')]);
    DB::table('name_writer')->insert(['id_user' => $id, 'number' => 3, 'name' => request('writher_n3'), 'detail' => request('writher_statusN3'), 'created' => date('Y-m-d H:i:s')]);

    Alert::success('Success Message', 'Insert Success');
    return redirect()->action('UserController@index');

  }

  public function editForm($id){

    $arr_province = array(
      "กระบี่", "กรุงเทพมหานคร", "กาญจนบุรี", "กาฬสินธุ์", "กำแพงเพชร", "ขอนแก่น", "จันทบุรี",
      "ฉะเชิงเทรา", "ชลบุรี", "ชัยนาท", "ชัยภูมิ", "ชุมพร", "เชียงราย", "เชียงใหม่", "ตรัง", "ตราด", "ตาก", "นครนายก",
      "นครปฐม", "นครพนม", "นครราชสีมา", "นครศรีธรรมราช", "นครสวรรค์", "นนทบุรี", "นราธิวาส", "น่าน", "บุรีรัมย์", "ปทุมธานี",
      "ประจวบคีรีขันธ์", "ปราจีนบุรี", "ปัตตานี", "พะเยา", "พังงา", "พัทลุง", "พิจิตร", "พิษณุโลก", "เพชรบุรี", "เพชรบูรณ์",
      "แพร่", "ภูเก็ต", "มหาสารคาม", "มุกดาหาร", "แม่ฮ่องสอน", "ยโสธร", "ยะลา", "ร้อยเอ็ด",
      "ระนอง", "ระยอง", "ราชบุรี", "ลพบุรี", "ลำปาง", "ลำพูน", "เลย", "ศรีสะเกษ", "สกลนคร",
      "สงขลา", "สตูล", "สมุทรปราการ", "สมุทรสงคราม", "สมุทรสาคร", "สระแก้ว", "สระบุรี",
      "สิงห์บุรี", "สุโขทัย", "สุพรรณบุรี", "สุราษฎร์ธานี", "สุรินทร์", "หนองคาย", "หนองบัวลำภู",
      "อยุธยา", "อ่างทอง", "อำนาจเจริญ", "อุดรธานี", "อุตรดิตถ์", "อุทัยธานี", "อุบลราชธานี"
    );

    
    $data = DB::table('ck_user')->where('id',$id)->first();
    $nWrith1 = DB::table('name_writer')->where('id_user',$id)->where('number','1')->first();
    $nWrith2 = DB::table('name_writer')->where('id_user', $id)->where('number', '2')->first();
    $nWrith3 = DB::table('name_writer')->where('id_user', $id)->where('number', '3')->first();
    return view('backend.user.form_user')->with(['data' => $data, 'nWrith1' => $nWrith1, 'nWrith2' => $nWrith2 , 'nWrith3' => $nWrith3, 'arr_province' => $arr_province]);

  }

  public function edit(Request $request){

    if ($request->file('picture') != "") {
      $picture = $request->file('picture')->store('imgUser');
    } else {
      $picture = request('old_picture');
    }
    if ($request->file('user_code_pic') != "") {
      $user_code_pic = $request->file('user_code_pic')->store('imgUser');
    } else {
      $user_code_pic = request('old_user_code_pic');
    }
    if ($request->file('bank_file') != "") {
      $bank_file = $request->file('bank_file')->store('imgUser');
    } else {
      $bank_file = request('old_bank_file');
    }
    
      
    $data = [
      "username"   => request('user'),
      "F_name"   => request('f_name'),
      "L_name"   => request('l_name'),
      "Email"   => request('email'),
      "sex"   => request('sex'),
      "birthday"   => request('birthday'),
      "status_u" => request('status_u'),
      "user_code" => request('user_code'),
      "tel" => request('tel'),
      "local1" => request('local1'),
      "local2" => request('local2'),
      "local3" => request('local3'),
      "local_code" => request('local_code'),
      "s_local1" => request('s_local1'),
      "s_local2" => request('s_local2'),
      "s_local3" => request('s_local3'),
      "s_code" => request('s_code'),
      "bank_name" => request('bank_name'),
      "bank_number" => request('bank_number'),
      "user_bank" => request('user_bank'),
      "bank_type" => request('bank_type'),
      "other" => request('other'),
      "bank_branch" => request('bank_branch'),
      "bank_local" => request('bank_local'),
      "picture" => $picture,
      "user_code_pic" => $user_code_pic,
      "bank_file" => $bank_file,
    ];

    DB::table('ck_user')->where('id',request('id'))->update($data);
    
    DB::table('name_writer')->where('id_user',request('id'))->where('number',1)
                            ->update(['name' => request('writher_n1'), 'detail' => request('writher_statusN1')]);
    DB::table('name_writer')->where('id_user',request('id'))->where('number',2)
                            ->update(['name' => request('writher_n2'), 'detail' => request('writher_statusN2')]);
    DB::table('name_writer')->where('id_user',request('id'))->where('number',3)
                            ->update(['name' => request('writher_n3'), 'detail' => request('writher_statusN3')]);

    Alert::success('Success Message', 'Update Success');
    return redirect()->action('UserController@index');

  }

    public function update_pointS(Request $request){

      $u = DB::table('ck_user')->where('id',request('id'))->first();

      $total = $u->point_s + request('point');

      DB::table('statement_buy_S')->insert(['id_user' => request('id'),'point_s' => request('point'),'old_point_s' => $u->point_s,'add_by' => 'WebMaster']);
      DB::table('ck_user')->where('id', request('id'))->update(['point_s' => $total]);

      return json_encode(1);


    }
    
    public function  update_pointB(Request $request){

    $u = DB::table('ck_user')->where('id', request('id'))->first();

    $total = $u->point_b + request('point');

    DB::table('statement_buy_B')->insert(['id_user' => request('id'), 'point_b' => request('point'), 'old_point_b' => $u->point_s, 'add_by' => 'WebMaster']);
    DB::table('ck_user')->where('id', request('id'))->update(['point_b' => $total]);

    return json_encode(1);
      
    }


    public function update_vip(Request $request){


      DB::table('ck_user')->where('id', request('id'))->update(['level' => 3]);
      // Alert::success('Success Message', 'Update Success');
      return json_encode(1);

    }

    public function delete($id){

      DB::table('ck_user')->where('id', $id)->delete();

      Alert::success('Success Message', 'Delete Success');
     return redirect()->action('UserController@index');

    }

    public function datatable(){

      $data = DB::table('ck_user')->get();

      return Datatables::of($data)->make(true);

    }
}
