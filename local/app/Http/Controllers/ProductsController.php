<?php

namespace App\Http\Controllers;

use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Alert;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

class ProductsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $type = DB::table('catalogs')->get();

        foreach ($type as $key => $v) {
            $data[$v->id] = $v->name_th;
        }


        return view('backend.product.index')->with(['type' => $data]);

    }
    public function create()
    {
        $type = DB::table('catalogs')->get();

        return view('backend.product.form')->with(['type' => $type]);

    }
    public function add(Request $request){


        $img1 = "";
        $img2 = "";
        $img3 = "";
        $img4 = "";

        if ($request->file('picture_1') != "") {
            $img1 = $request->file('picture_1')->store('image/product');
        }
        if ($request->file('picture_2') != "") {
            $img2 = $request->file('picture_2')->store('image/product');
        }
        if ($request->file('picture_3') != "") {
            $img3 = $request->file('picture_3')->store('image/product');
        }
        if ($request->file('picture_4') != "") {
            $img4 = $request->file('picture_4')->store('image/product');
        }

        $data = [
                "name_th" =>  request('name_th'),
                "color_th" =>  request('color_th'),
                "size_th" =>  request('size_th'),
                "type_package_th" =>  request('type_package_th'),
                "ingredient_th" =>  request('ingredient_th'),
                "featured_th" =>  request('featured_th'),
                "howtouser_th" =>  request('howtouser_th'),
                "warning_th" =>  request('warning_th'),
                "detail_th" =>  request('detail_th'),
                "price_th" =>  request('price_th'),
                "cost_th" =>  request('cost_th'),
                "name_en" => request('name_en'),
                "color_en" => request('color_en'),
                "size_en" => request('size_en'),
                "type_package_en" => request('type_package_en'),
                "ingredient_en" => request('ingredient_en'),
                "featured_en" => request('featured_en'),
                "howtouser_en" => request('howtouser_en'),
                "warning_en" => request('warning_en'),
                "detail_en" => request('detail_en'),
                "price_en" => request('price_en'),
                "cost_en" => request('cost_en'),
                "name_cn" => request('name_cn'),
                "color_cn" => request('color_cn'),
                "size_cn" => request('size_cn'),
                "type_package_cn" => request('type_package_cn'),
                "ingredient_cn" => request('ingredient_cn'),
                "featured_cn" => request('featured_cn'),
                "howtouser_cn" => request('howtouser_cn'),
                "warning_cn" => request('warning_cn'),
                "detail_cn" => request('detail_cn'),
                "price_cn" => request('price_cn'),
                "cost_cn" => request('cost_cn'),
                "code_item" => request('code_item'),
                "count" => request('count'),
                "barcode_item" => request('barcode_item'),
                "barcode_set" => request('barcode_set'),
                "barcode_box" => request('barcode_box'),
                "retail" => request('retail'),
                "product_width" => request('product_width'),
                "product_long" => request('product_long'),
                "product_height" => request('product_height'),
                "product_weight" => request('product_weight'),
                "box_width" => request('box_width'),
                "box_long" => request('box_long'),
                "box_height" => request('box_height'),
                "box_weight" => request('box_weight'),
                "age_product" => request('age_product'),
                "type" =>  implode(',',request('type')),
                "picture_1" => $img1,
                "picture_2" => $img2,
                "picture_3" => $img3,
                "picture_4" => $img4,
                "status" => 1,
                "created_at" => date('Y-m-d H:i:s')
            ];

        $id = DB::table('products')->insertGetId($data);

        foreach(request('package') as $key => $val){

            $package = [
                "id_product" => $id,
                "package" => $val,
                "price" => request('price_package')[$key]
            ];

            DB::table('package')->insert($package);

        }

        Alert::success('Success Insert');
        return redirect()->action('ProductsController@index');


    }
    public function edit($id)
    {
        $type = DB::table('catalogs')->get();
        $data = DB::table('products')->where('id',$id)->first();
        $package = DB::table('package')->where('id_product', $id)->get();
        $type_product = explode(',',$data->type);

        return view('backend.product.form')->with(['data' => $data , 'type_product' => $type_product , 'package' => $package,'type' => $type]);

    }
    public function save(Request $request)
    {
    

        if ($request->file('picture_1') != "") {
            if(request('oldpicture1') != ""){ Storage::delete(request('oldpicture1')); }
            $img1 = $request->file('picture_1')->store('image/product');
        }else{
            $img1 = request('oldpicture1');
        }
        if ($request->file('picture_2') != "") {
            if (request('oldpicture2') != ""){ Storage::delete(request('oldpicture2')); }
            $img2 = $request->file('picture_2')->store('image/product');
        }else{
            $img2 = request('oldpicture2');
        }
        if ($request->file('picture_3') != "") {
            if (request('oldpicture3') != ""){ Storage::delete(request('oldpicture3')); }
            $img3 = $request->file('picture_3')->store('image/product');
        }else{
            $img3 = request('oldpicture3');
        }
        if ($request->file('picture_4') != "") {
            if (request('oldpicture4') != ""){ Storage::delete(request('oldpicture4')); }
            $img4 = $request->file('picture_4')->store('image/product');
        }else{
            $img4 = request('oldpicture4');
        }

        $data = [
            "name_th" => request('name_th'),
            "color_th" => request('color_th'),
            "size_th" => request('size_th'),
            "type_package_th" => request('type_package_th'),
            "ingredient_th" => request('ingredient_th'),
            "featured_th" => request('featured_th'),
            "howtouser_th" => request('howtouser_th'),
            "warning_th" => request('warning_th'),
            "detail_th" => request('detail_th'),
            "price_th" => request('price_th'),
            "cost_th" => request('cost_th'),
            "name_en" => request('name_en'),
            "color_en" => request('color_en'),
            "size_en" => request('size_en'),
            "type_package_en" => request('type_package_en'),
            "ingredient_en" => request('ingredient_en'),
            "featured_en" => request('featured_en'),
            "howtouser_en" => request('howtouser_en'),
            "warning_en" => request('warning_en'),
            "detail_en" => request('detail_en'),
            "price_en" => request('price_en'),
            "cost_en" => request('cost_en'),
            "name_cn" => request('name_cn'),
            "color_cn" => request('color_cn'),
            "size_cn" => request('size_cn'),
            "type_package_cn" => request('type_package_cn'),
            "ingredient_cn" => request('ingredient_cn'),
            "featured_cn" => request('featured_cn'),
            "howtouser_cn" => request('howtouser_cn'),
            "warning_cn" => request('warning_cn'),
            "detail_cn" => request('detail_cn'),
            "price_cn" => request('price_cn'),
            "cost_cn" => request('cost_cn'),
            "code_item" => request('code_item'),
            "count" => request('count'),
            "barcode_item" => request('barcode_item'),
            "barcode_set" => request('barcode_set'),
            "barcode_box" => request('barcode_box'),
            "retail" => request('retail'),
            "product_width" => request('product_width'),
            "product_long" => request('product_long'),
            "product_height" => request('product_height'),
            "product_weight" => request('product_weight'),
            "box_width" => request('box_width'),
            "box_long" => request('box_long'),
            "box_height" => request('box_height'),
            "box_weight" => request('box_weight'),
            "age_product" => request('age_product'),
            "type" => implode(',', request('type')),
            "picture_1" => $img1,
            "picture_2" => $img2,
            "picture_3" => $img3,
            "picture_4" => $img4
        ];

        DB::table('package')->where('id_product',request('id'))->delete();


        if(request('package')){
            foreach (request('package') as $key =>  $val) {

                $package = [
                    "id_product" => request('id'),
                    "package" => $val,
                    "price" => request('price_package')[$key]
                ];

                DB::table('package')->insert($package);

            }

        }



        DB::table('products')->where('id',request('id'))->update($data);
        Alert::success('Success Insert');
        return redirect()->action('ProductsController@index');


    }
    public function del($id){

        $data = DB::table('products')->where('id',$id)->first();

        if ($data->picture_1 != "") {
            Storage::delete(request('picture_1'));
        }
        if ($data->picture_2 != "") {
            Storage::delete(request('picture_2'));
        }
        if ($data->picture_3 != "") {
            Storage::delete(request('picture_3'));
        }
        if ($data->picture_4 != "") {
            Storage::delete(request('picture_4'));
        }

        DB::table('package')->where('id_product', $id)->delete();
        DB::table('products')->where('id',$id)->delete();
        Alert::success('Success Delete');
        return redirect()->action('ProductsController@index');



    }
    public function statsu($id,$status){

        DB::table('products')->where('id',$id)->update(['status' => $status]);

    }
    public function datatable()
    {
        $data = DB::table('products')->get();
        return Datatables::of($data)->make(true);
    }
}
