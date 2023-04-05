<?php


use Illuminate\Support\Facades\Route;
// use Illuminate\View\View;
use Illuminate\Support\Facades\View;
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

Route::get('/', function () {
    return view('welcome');
});
// Route::get('/hello-world', function(){
//     return view('hello-world');
// });
Route::get('/hello-world/{year}', function($year){
    // echo ('Hello world, ' . $year);
    // return view('hello-world');
    return view('hello-world')->with('hello_str', $year);
})->where(['year'=>'[0-9]{2}']);
// Route::get('/hello-world/{year}/{yourname?}', function($year, $yourname = null){
//     if($yourname == null){
//         echo ('Hello world, ' . $year);
//     }else{
//         echo ('Hello world, ' . $year . '. My name is ' . $yourname);
//     }
//     // return view('hello-world');
// });
// Route::get('/hello-world/{year}/{yourname?}', function($year, $yourname = null){
//     $hello_string = '';
//     if($yourname == null){
//         $hello_string = 'Hello world, ' . $year;
//     }else{
//         $hello_string = 'Hello world, ' . $year . '. My name is ' . $yourname;
//     }
//     return view('hello-world')->with('hello_str', $hello_string);
// });
// Route::get('/dashboard', function () {
//     // Mã xử lý khác viết ở đây
// })->middleware('checkage');
// Route::get('/dashboard', function () {
//     //
// })->middleware('auth', 'checkage');

Route::group(['prefix'=>'Hehe'],function(){
    Route::get('H1',function(){
        echo 'H1';
    });
    Route::get("H2", function(){
        echo 'H2';
    });
    Route::get('H3',function(){
        echo 'H3';
    });
});

Route::get('Route1',['as'=>'MyRoute',function(){
    echo "Xin chao cac ban";
}]);

//Goi controller
Route::get('GoiController','App\Http\Controllers\myController@XinChao');
Route::get('ThamSo/{ten}','App\Http\Controllers\myController@KhoaHoc');

Route::get('MyRequest','App\Http\Controllers\myController@GetURL');

//Gui nhan du lieu voi request
Route::get('getForm',function(){
    return view('postForm');
});

Route::post('postForm',['as'=>'postForm','uses'=>'App\Http\Controllers\myController@postForm']);

//Cookie
Route::get('setCookie','App\Http\Controllers\myController@setCookie');
Route::get('getCookie','App\Http\Controllers\myController@getCookie');

//uploadfile
Route::get('uploadFile',function(){
    return view('postFile');
});

Route::post('postFile',['as'=>'postFile','uses'=>'App\Http\Controllers\myController@postFile']);

Route::get('getJson','App\Http\Controllers\myController@getJson');

Route::get('myView','App\Http\Controllers\myController@myView');

Route::get('Time/{t}','App\Http\Controllers\myController@Time');

View::share('hehe','Laravel');
