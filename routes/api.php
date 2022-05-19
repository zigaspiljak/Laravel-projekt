<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Projects;
use App\Http\Controllers\RegisterUser;


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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('/view', [Projects::class, "apiViewProjects"] ,function () {
            
})->name("api.view");

Route::post('/register',[RegisterUser::class, "apiRegisterPost"], function (){

}) ->name("api.register");