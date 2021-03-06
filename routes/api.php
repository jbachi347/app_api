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



// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::get('/me', function (Request $request) {
    return (array) $request->user()->getData();
})->middleware('auth:api');


/*
Route::group(['prefix' => 'auth'], function () {
    Route::post('login', 'AuthController@login');
    Route::post('signup', 'AuthController@signup');
  
    Route::group(['middleware' => 'auth:api'], function() {

        Route::resource('client', 'ClientController', ['except' => ['create', 'edit']]);
        Route::resource('project', 'ProjectController', ['except' => ['create', 'edit']]);
        
        Route::get('clients_projects', 'CustomQueryController@clients_projects');
        Route::get('clients_projects/{client_id}', 'CustomQueryController@clients_projects_show');

        Route::get('logout', 'AuthController@logout');
        Route::get('user', 'AuthController@user');
    });
});
*/



