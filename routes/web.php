<?php

use Illuminate\Support\Facades\Route;

use App\Mail\MailtrapExample;
use Illuminate\Support\Facades\Mail;

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

//Route::get('/', 'ArticlesController@index');  // root sẽ là danh sách bài viết

/*
Route::get('articles', 'ArticlesController@index');


// goi form them article
Route::get('articles/create', 'ArticlesController@create');

Route::get('articles/{id}', 'ArticlesController@show');
// ...
// Thêm
Route::post('articles', 'ArticlesController@store');

//sua
Route::get('articles/{id}/edit', 'ArticlesController@edit');  // new
Route::patch('articles/{id}', 'ArticlesController@update');  // new

//xoa
Route::delete('articles/{id}', 'ArticlesController@destroy');
*/

//đã chuyển sang đặt tên cho các Route
/*Route::get('articles', ['as' => 'articles.index', 'uses' => 'ArticlesController@index']);
Route::get('articles/create', ['as' => 'articles.create', 'uses' => 'ArticlesController@create']);
Route::get('articles/{id}', ['as' => 'articles.show', 'uses' => 'ArticlesController@show']);
Route::post('articles', ['as' => 'articles.store', 'uses' => 'ArticlesController@store']);
Route::get('articles/{id}/edit', ['as' => 'articles.edit', 'uses' => 'ArticlesController@edit']);
Route::patch('articles/{id}', ['as' => 'articles.update', 'uses' => 'ArticlesController@update']);
Route::delete('articles/{id}', ['as' => 'articles.destroy', 'uses' => 'ArticlesController@destroy']);*/
 //ngắn gọn
Route::resource('articles', 'ArticlesController');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


