<?php
use App\Http\Middleware\Admin;
use App\Http\Middleware\Admin1;
use App\Http\Middleware\Admin2;
use App\Http\Middleware\Accoun;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::group(['middleware' => 'auth'], function () {

    Route::get('/home', function () { return view('backend.index'); });
    Route::get('/', function () { return view('backend.index'); });

  Route::group(['middleware' => [Admin1::class]], function () {

  // จัดการ content

  Route::get('/content/{type}','ContentController@index');
  Route::get('/content/{type}/FormAdd','ContentController@FormAdd');
  Route::get('/content/{type}/FormEdit/{id}','ContentController@FormEdit');
  Route::get('/content/{type}/delete/{id}','ContentController@delete');
  Route::post('/content/add','ContentController@add');
  Route::post('/content/edit','ContentController@edit');
  Route::post('/content_comice/add','ContentController@Comicsadd');
  Route::post('/content_comice/edit','ContentController@Comicsedit');
  Route::get('/content_comice/{type}/delete/{id}','ContentController@deleteComics');
  Route::post('/contentT','ContentController@datatable');
  Route::post('/contentC','ContentController@datatable_comice');
  Route::post('/modalC','ContentController@form_comice');


  Route::get('/event','EventController@index');
  Route::get('/event/FormAdd', 'EventController@formAdd');
  Route::post('/event/add', 'EventController@add');
  Route::get('/event/{id}/FormEdit', 'EventController@formEdit');
  Route::post('/event/edit', 'EventController@edit');
  Route::get('/event/{id}/del', 'EventController@del');
  Route::post('/eventDatatable', 'EventController@datatable');


  // จัดการรายชื่อนักเขียน

  Route::get('/writher', 'WritherController@index');
  Route::post('/writherEdit', 'WritherController@seachData');
  Route::post('/add_writher', 'WritherController@add');
  Route::post('/edit_writher', 'WritherController@edit');
  Route::get('/writher/{id}/{pic}/del', 'WritherController@del');
  Route::post('/datatablewrither', 'WritherController@datatable');

  // set 5top Content  





  });

 
  

  Route::group(['middleware' => [Admin2::class]], function () {

  // จัดการงานเขียน

    Route::get('/manage_novel', 'WritherManageNovelController@index');
    Route::get('/manage_novel_vip', 'WritherManageNovelController@indexvip');
    Route::post('/novel_rating', 'WritherManageNovelController@updaterating');
    Route::post('/novel_table', 'WritherManageNovelController@datatable');
    Route::post('/novel_table_vip', 'WritherManageNovelController@datatable_bookvip');
    Route::post('/book_novel_view', 'WritherManageNovelController@updateview');
    Route::post('/book_novel_top', 'WritherManageNovelController@top_nove');
    Route::post('/book_novel_top_vip', 'WritherManageNovelController@top_vipnove');
    Route::get('/manage_novel/{id}/close/{detail}', 'WritherManageNovelController@closeNovel');
    Route::post('/novel_delete', 'WritherManageNovelController@delnovel');
    Route::get('/manage_novel/{id}/book_novel', 'WritherManageNovelController@index_chapter');
    Route::get('manage_novel/{idBook}/book_novel/{id}/form', 'WritherManageNovelController@form_chapter');
    Route::post('/manage_novel/saveChapter', 'WritherManageNovelController@updateChapBook');
    Route::get('/manage_novel/{id}/book_novel/{chap}/close/{detail}', 'WritherManageNovelController@closeBook');
    Route::post('/book_novel_delete', 'WritherManageNovelController@delbook');
    Route::post('/book_table', 'WritherManageNovelController@datatable_book');

    // Route::get('/manage_comics', 'WritherManageCartoonController@index');
    // Route::post('/comics_rating', 'WritherManageCartoonController@updaterating');
    // Route::post('/comics_novel_top', 'WritherManageCartoonController@top_nove');
    // Route::post('/comics_table', 'WritherManageCartoonController@datatable');
    // Route::post('/book_comics_view', 'WritherManageCartoonController@updateview');
    // Route::get('/manage_comics/{id}/close/{detail}', 'WritherManageCartoonController@closeComics');
    // Route::post('/comics_delete', 'WritherManageCartoonController@delComics');
    // Route::get('/manage_comics/{id}/book_comics', 'WritherManageCartoonController@index_chapter');
    // Route::get('/manage_comics/{id}/book_novel/{chap}/close/{detail}', 'WritherManageCartoonController@closeBook');
    // Route::post('/cartoon_delete', 'WritherManageCartoonController@delBook');
    // Route::post('/cartoon_table', 'WritherManageCartoonController@datatable_book');

    Route::get('/manage_short', 'WritherManageOtherController@index_short');
    Route::get('/manage_short/{id}/form', 'WritherManageOtherController@edit_short');
    Route::get('/manage_short/{id}/close/{detail}', 'WritherManageOtherController@closeShort');
    Route::get('/manage_short/{id}/del', 'WritherManageOtherController@delShort');


    Route::get('/manage_story', 'WritherManageOtherController@index_story');
    Route::get('/manage_story/{id}/form', 'WritherManageOtherController@edit_story');
    Route::get('/manage_story/{id}/close/{detail}', 'WritherManageOtherController@closeStory');
    Route::post('/manage_story/top', 'WritherManageOtherController@top_Story');
    Route::get('/manage_story/{id}/del', 'WritherManageOtherController@delStory');


    Route::get('/manage_clip', 'WritherManageOtherController@index_clip');
    Route::get('/manage_clip/{id}/form', 'WritherManageOtherController@edit_clip');
    Route::get('/manage_clip/{id}/close/{detail}', 'WritherManageOtherController@closeClip');
    Route::get('/manage_clip/{id}/del', 'WritherManageOtherController@delClip');

    Route::post('/other_rating', 'WritherManageOtherController@updateview');
    Route::post('/other_update', 'WritherManageOtherController@updateother');
    Route::get('manage_book/{id}/edit', 'WritherManageOtherController@edit_Book');
    Route::post('manage_book/update', 'WritherManageOtherController@updateBook');
    Route::post('/datatable_short', 'WritherManageOtherController@datatable_short');
    Route::post('/datatable_story', 'WritherManageOtherController@datatable_story');
    Route::post('/datatable_clip', 'WritherManageOtherController@datatable_clip');
###############################################################################

    Route::get('/confirm_chaper_novel', 'ConfirmWritherManageOtherController@index_book');
    Route::get('confirm_chaper_novel/{id}/close/{detail}', 'ConfirmWritherManageOtherController@close_book');
    Route::get('confirm_chaper_novel/{id}/confirm', 'ConfirmWritherManageOtherController@confirm_book');
    Route::post('/confirm_chaper_novel/datatable', 'ConfirmWritherManageOtherController@datatable_book');


    Route::get('/confirm_chaper_commic', 'ConfirmWritherManageOtherController@index_commic');
    Route::get('confirm_chaper_commic/{id}/close/{detail}', 'ConfirmWritherManageOtherController@close_commic');
    Route::get('confirm_chaper_commic/{id}/confirm', 'ConfirmWritherManageOtherController@confirm_commic');
    Route::post('/confirm_chaper_commic/datatable', 'ConfirmWritherManageOtherController@datatable_commic');


    Route::get('/confirm_short', 'ConfirmWritherManageOtherController@index_short');
    Route::get('confirm_short/{id}/close/{detail}', 'ConfirmWritherManageOtherController@close_short');
    Route::get('confirm_short/{id}/confirm', 'ConfirmWritherManageOtherController@confirm_short');
    Route::post('/confirm_short/datatable', 'ConfirmWritherManageOtherController@datatable_short');

    Route::get('/confirm_story', 'ConfirmWritherManageOtherController@index_story');
    Route::get('confirm_story/{id}/close/{detail}', 'ConfirmWritherManageOtherController@close_story');
    Route::get('confirm_story/{id}/confirm', 'ConfirmWritherManageOtherController@confirm_story');
    Route::post('/confirm_story/datatable', 'ConfirmWritherManageOtherController@datatable_story');

    Route::get('/confirm_clip', 'ConfirmWritherManageOtherController@index_clip');
    Route::get('confirm_clip/{id}/close/{detail}', 'ConfirmWritherManageOtherController@close_clip');
    Route::get('confirm_clip/{id}/confirm', 'ConfirmWritherManageOtherController@confirm_clip');
    Route::post('/confirm_clip/datatable', 'ConfirmWritherManageOtherController@datatable_clip');
  
    // จัดการนิยายประจำวัน

    Route::get('/manage_novel_today', 'NovelTodayController@index');
    Route::post('/manage_novel_update', 'NovelTodayController@update');
    Route::post('/manage_novel_today/datatable', 'NovelTodayController@datatable');



  });


Route::group(['middleware' => [Accoun::class]], function () {

  // จัดการรายชื่อ สมาชิก

      Route::get('/user', 'UserController@index');
      Route::get('/user/addForm', 'UserController@addForm');
      Route::post('/user/add/', 'UserController@add');
      Route::get('/user/{id}/editForm', 'UserController@editForm');
      Route::post('/user/edit/', 'UserController@edit');
      Route::get('/user/{id}/delete', 'UserController@delete');
      Route::post('/user_update_vip/', 'UserController@update_vip');
      Route::post('/datatableuser', 'UserController@datatable');
      Route::post('/user_updateS', 'UserController@update_pointS');
      Route::post('/user_updateB', 'UserController@update_pointB');


      Route::get('/report_sell', "ReportSellController@index");
      Route::post('/report_sell/detail', "ReportSellController@detailReport");
      Route::post('/report_sell/update', "ReportSellController@update");
      Route::post('/report_sell/datatableUser', "ReportSellController@datatableUser");

      Route::get('/report_bile', "ReportSellController@index_bile");
      Route::post('/report_bile/datatableBile', "ReportSellController@datatablebile");
      Route::get('/report_bile/{round}/{year}/report', "ReportSellController@exportReport");
      Route::get('report_sell/test', 'ReportSellController@test');

    Route::get('/report_skull', 'SkullReportController@index');
    Route::get('/report_skull/{round}/excel', 'SkullReportController@excel');
    Route::post('/report_skull_datatable', 'SkullReportController@datatable');

});


  Route::get('/change_password/{id}/form', 'AdminController@changePass');
  Route::post('/change_password/save', 'AdminController@newpass');

Route::group(['middleware' => [Admin::class]], function () {

    Route::get('/setcontent', 'SetcontentController@index');
    Route::post('/setcontentTc', 'SetcontentController@datatableTop5Content');
    Route::post('/setcontentTv', 'SetcontentController@datatableTopView');
    Route::post('/status_setcontent', 'SetcontentController@UpdateStatus');
    Route::post('/status_Upsetcontent', 'SetcontentController@UpdateCheckStatus');

// จัดการคอมเม้น Content

    Route::get('/commentContent', 'CommentReportController@indexContenr');
    Route::post('/commentContent/datatable', 'CommentReportController@datatableContenr');
    Route::get('/commentChapter', 'CommentReportController@indexChapter');
    Route::post('/commentContent/del', 'CommentReportController@delComment');

    Route::post('/commentChapter/datatable', 'CommentReportController@datatableChapter');

    Route::get('/reportWriter', 'WriterReportController@index');
    Route::post('/reportWriter/check', 'WriterReportController@check_report');
    Route::post('/reportWriter/datatable', 'WriterReportController@datatable');


    Route::get('/admin', 'AdminController@index');
    Route::get('/admin/create', 'AdminController@create');
    Route::post('/admin/add', 'AdminController@add');
    Route::get('/admin/{id}/edit', 'AdminController@edit');
    Route::post('/admin/save', 'AdminController@save');

    Route::get('/admin/{id}/del', 'AdminController@del');
    Route::post('/adminT', 'AdminController@postDatatable');
  // จัดการข้อกำหนจ
    Route::get('/requirements', 'RequirementsController@index');
    Route::get('/requirements/{id}/form', 'RequirementsController@edit');
    Route::post('/requirements/update', 'RequirementsController@update');
    Route::post('/requirements/datatable', 'RequirementsController@datatable');

// จัดการ หมวดหมู่นิยาย

    Route::get('category', 'CategoryController@index');
    Route::post('category_select', 'CategoryController@edit_select');
    Route::post('category_update', 'CategoryController@update');
    Route::post('category_del', 'CategoryController@delete');
    Route::post('data_category1', 'CategoryController@datatable1');
    Route::post('data_category2', 'CategoryController@datatable2');

// จัดการรูปภาพ

    Route::get('default_picture', 'DefaultpicController@index');
    Route::post('default_update', 'DefaultpicController@update');
    Route::post('default_datatable', 'DefaultpicController@datatable');

// ghost-gift

    Route::get('ghost_gift', 'GhostgiftController@index');
    Route::post('ghost_gift/update', 'GhostgiftController@update');
    Route::post('ghost_gift_datatable', 'GhostgiftController@datatable');

    Route::get('ghostgiftreport', 'GhostgiftController@report');
    Route::post('ghostgiftreport/addEms', 'GhostgiftController@addEms');
    Route::post('ghostgiftreport/delEms', 'GhostgiftController@delEms');
    Route::post('ghost_giftreportdatatable', 'GhostgiftController@datatableReport');
//


// จัดการราคากระโหลก

    Route::get('price_skull', 'SkullManageController@index');
    Route::post('price_skull/updateD', 'SkullManageController@updateD');
    Route::post('price_skull/updateP', 'SkullManageController@updateP');
    Route::post('skull_datatable', 'SkullManageController@datatable');

    Route::get('/about', 'AboutusController@index');
    Route::post('/about_updetail', 'AboutusController@updatedetail');

    Route::post('/about_addquestion', 'AboutusController@addquestion');
    Route::post('/about_editquestion', 'AboutusController@editquestion');
    Route::post('/about/del', 'AboutusController@delete');
    Route::post('/aboutdatatable', 'AboutusController@datatable');

// advertising

// Route::get('/advertising','AdvertisingController@index');
    Route::get('/advertising/{id}/show', 'AdvertisingController@index');
    Route::post('/advertising/update', 'AdvertisingController@update');
    Route::post('/advertising/del', 'AdvertisingController@delpic');
    Route::post('/advertising/datatable', 'AdvertisingController@datatable');

    Route::get('/contentsetapi','LinetodayController@index');
    Route::post('/contentsetapi/selectContenr', 'LinetodayController@selectContenr');
    Route::post('/contentsetapi/addContenr', 'LinetodayController@addContenr');
    Route::get('contentsetapi/updateCheck', 'LinetodayController@update');
    Route::post('/contentsetapi/del', 'LinetodayController@delContenr');
    Route::post('/contentsetapi/datatable', 'LinetodayController@datatable');
    


});

  
  

});
Route::get('/login', 'Auth\LoginController@showLoginForm');
Route::post('login', 'Auth\LoginController@login');
Route::get('logout', 'Auth\LoginController@logout');
