<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('v1/notebook', 'App\Http\Controllers\Note\NoteController@notebook');
Route::post('v1/notebook', 'App\Http\Controllers\Note\NoteController@addNote');
Route::get('v1/notebook/{id}', 'App\Http\Controllers\Note\NoteController@notebookById');
Route::post('v1/notebook/{id}', 'App\Http\Controllers\Note\NoteController@notebookEdit');
Route::delete('v1/notebook/{id}', 'App\Http\Controllers\Note\NoteController@notebookDelete');

