<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('/master-user', 'masteruser\LoginUserController');
Route::apiResource('/ref-department', 'referensi\DepartmentController');
Route::apiResource('/ref-session', 'referensi\SessiontimeController');

Route::get('/getsummary', 'SummaryController@index')->name('summary');

//list
Route::get('list-department', 'API\ListController@listDepartment');
