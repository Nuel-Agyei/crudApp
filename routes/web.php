<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $posts = [];
    if(auth()->check()){
        $posts = auth()->user()->usersPosts()->latest()->get();
    }
    return view('home', ['posts'=> $posts]);
});

Route::post('/register',[UserController::class, 'register'])
;
Route::post('/logout',[UserController::class, 'logout']);
Route::post('/login',[UserController::class, 'login']);
Route::post('/create', [PostController::class, 'create']);
Route::get('/edit/{post}', [PostController::class, 'showEditScreen']);
Route::put('/edit/{post}', [PostController::class, 'postUpdate']);
Route::delete('/delete/{post}', [PostController::class, 'deletePost']);
