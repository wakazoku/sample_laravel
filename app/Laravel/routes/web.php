<?php
use App\Task;
use Illuminate\Http\Request;

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/*
 * 全タスク表示
 */
Route::get('/tasks', 'TaskController@index');

/*
 * 新タスク追加
 */
Route::post('/task', 'TaskController@store');

/*
 * 既存タスク削除
 */
Route::delete('/task/{task}', 'TaskController@destroy');
