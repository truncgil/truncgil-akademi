<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
loginhtdedwqa
*/
Auth::routes();

oturumAc();

if(oturumisset("locale")) {
	App::setLocale(oturum("locale"));
}

Route::get('/clear-cache', function() {

    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('view:clear');
    //Artisan::call('vendor:publish');
    return "Cache is cleared";
});
//Route::get("/storage/app/","files")

Route::get('/artisan-optimize', function() {
    Artisan::call('optimize');
    return "optimized";
});
Route::get('/get-token', function() {

    return csrf_token();
});
Route::get('/cache/{size}/{month}/{day}/{file}',function($size,$month,$day,$file){
    if($size=="large") $size = 1920;
    if($size=="small") $size = 256;
    if($size=="medium") $size = 512;
    yonlendir(url("r.php?w=$size&p=storage/app/files/$month/$day/$file")); 
});
Route::get('/',"ContentsController@index");

Route::get('/logout',"AdminController@logout");
Route::get('/home',"AdminController@default");
Route::get('/ajax/{var?}',"AjaxController@index");
Route::match(['get', 'post'],'/admin-ajax/{var?}',"AdminAjaxController@index");

$hash="admin";
Route::match(['get', 'post'],'/'.$hash,"AdminController@default");
Route::get("/$hash/contents","AdminController@default");
Route::match(['get', 'post'],"/$hash/{id}","AdminController@default");
Route::get("/$hash/new/{type}","AdminController@new");

Route::get("/$hash/export/{tableName}/{fileName?}","AdminController@exportExcel");

Route::post("/$hash/import/{tableName}","AdminController@importExcel");
Route::get("/$hash/truncate/{tableName}","AdminController@truncateTable");
Route::get("/$hash/delete/{tableName}/{id}","AdminController@delete");
Route::post("/$hash/create/{tableName}","AdminController@create");
Route::get("/$hash/autocomplete/{tableName}/{columnName}","AdminController@autocomplete");
Route::get("/$hash/detail/{tableName}/{columnName}","AdminController@rowDetail");


Route::match(['get', 'post'],'/admin/action/{action}/{type}',"AdminController@action2");
Route::match(['get', 'post'],"/$hash/{type}/{id}","AdminController@default");
Route::match(['get', 'post'],"/$hash/{type}/{id}/{action}","AdminController@action");


Route::get('/l-{lang?}/',"ContentsController@default_lang");
Route::get('/l-{lang?}/{slug?}',"ContentsController@default_lang");
Route::get('/l-{lang?}/',"ContentsController@index");

Route::match(['get', 'post'],'/{slug?}',"ContentsController@default");





Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
