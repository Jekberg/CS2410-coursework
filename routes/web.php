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
})
    ->name('welcome');
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
		->get('/newevent', 'EventController@new')
		->name('new.event');
Route::middleware('auth')
		->get('/editevent/{id}', 'EventController@modify')
		->name('edit.event');
Route::middleware('auth')
        ->get('/myevents', 'UserController@events')
        ->name('user.events');
Route::middleware('auth')
        ->post('/newevent', 'EventManagmentController@create')
		->name('add.event');
Route::middleware('auth')
		->post('/editevent/{id}', 'EventManagmentController@update')
		->name('update.event');
Route::middleware('auth')
		->post('/removeevent/{id}', 'EventManagmentController@delete')
		->name('delete.event');
Route::middleware('auth')
        ->post('updateprofile', 'UserController@update')
        ->name('user.update');
Route::post('/like/{id}', 'LikeController@like')
		->name('like.event');
Route::post('/unlike/{id}', 'LikeController@unlike')
		->name('unlike.event');
