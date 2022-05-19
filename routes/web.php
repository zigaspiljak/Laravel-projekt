<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterUser;
use App\Http\Controllers\LoginUser;
use App\Http\Controllers\LogoutUser;
use App\Http\Controllers\Projects;
use App\Http\Controllers\Users;



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
Route::middleware('auth')->group(function(){
    Route::get('/', [Projects::class, "projectView"] ,function () {
            
    })->name("get.welcome");

    Route::get('/user/{username}', [Projects::class, "projectViewUsers"] ,function () {
            
    })->name("get.user");

    Route::get('/users', [Users::class, "getUsers"] ,function () {
            
    })->name("get.users");

    Route::post('/users_activate', [Users::class, "usersActivate"] ,function () {
            
    })->name("post.users_activate");

    Route::post('/users_lock', [Users::class, "usersLock"] ,function () {
            
    })->name("post.users_lock");

    Route::prefix('/project')->group(function () {
        Route::get('/add', function () {
            return view('add_project');
        })->name("get.add_project");

        Route::post('/add', [Projects::class, "projectAdd"], function () {
            // return view('add_project');
        })->name("post.add_project");

        Route::post('/delete', [Projects::class, "projectDelete"], function () {
            // return view('delete_project');
        })->name("post.delete_project");


        Route::get('/', [Projects::class, "projectView"] ,function () {
            
        })->name("get.project");
    });

    Route::get('/logout', [LogoutUser::class, 'logoutPost'], function () {

    })->name("get.logout");
});

Route::get('/register', function () {
    if(!Auth::check()){
        return view('auth.registration');
    }
    return back();
})->name("get.register");

Route::post('/register',[RegisterUser::class, "registerPost"], function (){

}) ->name("post.register");

Route::get('/login', function () {
    if(!Auth::check()){
        return view('auth.login');
    }
    return back();
})->name("get.login");

Route::post('/login',[LoginUser::class, "loginPost"], function (){

}) ->name("post.login");