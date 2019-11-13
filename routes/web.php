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

// Route::get('/', function () {
//     return view('index');
// });

Route::get('/ ', 'PagesController@index');
Route::get('/ ', 'PagesController@index2');




Route::resource('/causes','CauseController');

// Route:get('/', function() {

// })






Route::post('/causes/{id}/like', [
    'uses' => 'CauseController@like',
    'as' => 'causes.like'
]);

Route::post('/causes/{id}/unlike', [
    'uses' => 'CauseController@unlike',
    'as' => 'causes.unlike'
]);

Route::post('/causes/{id}/follow', [
    'uses' => 'CauseController@follow',
    'as' => 'causes.follow'
]);

Route::post('/causes/{id}/unfollow', [
    'uses' => 'CauseController@unfollow',
    'as' => 'causes.unfollow'
]);


Route::get('/explore', function () {
    return view('pages.explore');
});

Auth::routes();

Route::get('/dashboard', 'DashboardController@index');
