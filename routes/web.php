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
*/

/*Route::get('/users/{name}/{id}',function($name,$id){
    return 'Name is '.$name.' with id '.$id;
});
*/

Route::get('/', 'PagesController@index');
Route::get('lang/{locale}','LanguageController'); 


Route::get('/about', 'PagesController@about');
Route::get('/services', 'PagesController@services');

Route::resource('items', 'ItemsController');
Route::resource('user', 'UserController');
Auth::routes();

Route::get('/dashboard', 'DashboardController@index');
Route::post('/items/{item}/comments', 'CommentController@store');


//Route::resource('comment', 'CommentController',['only' => ['update','destroy']]);
//Route::post()('comment/create/{item}', 'ItemsController@storeComment')->name('itemcomment.store');



//Route::get('/{lang?}', function ($lang=null) {
    //App::setLocale($lang);
    //Route::get('/', 'PagesController@index');
    //$title= 'ENGLISH';
    //return view('pages.index')->with('title', $title);

    //
    //$locale = App::getLocale();

//if (App::isLocale('en')) {
    //
//}
//});
