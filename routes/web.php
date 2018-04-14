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

use App\Event;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/about', function ()
{
    return view('about');
})
		->name('about');

Auth::routes();

Route::middleware('auth')
		->get('/home', 'HomeController@index')
		->name('home');
Route::get('/events', 'EventController@all')
		->name('list.events');
Route::get('/search', 'EventController@lookFor')
		->name('search.event');
Route::get('/event/{id}', 'EventController@view')
		->name('view.event');
Route::middleware('auth')
		->get('/newevent', 'EventController@makeNew')
		->name('new.event');
Route::post('/addevent', 'EventManagmentController@create')
		->name('add.event');
Route::post('/like', 'LikeController@like')
		->name('like.event');
Route::post('/unlike', 'LikeController@unlike')
		->name('unlike.event');
