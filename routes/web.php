<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
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
Route::controller(PageController::class)->group(function(){
    Route::get("/","index")->name("page.index");
    Route::get("/detail/{slug}","detail")->name("page.detail");
    Route::get("/categories/{slug}","categorize")->name("page.categorize");
});

Route::resource('comment', CommentController::class)->only(["store","update","destroy"])->middleware(["auth"]);

Auth::routes();

Route::prefix("dashboard")->middleware(["auth"])->group(function () {

    Route::resource("article", ArticleController::class);

    Route::resource("category", CategoryController::class)->middleware("can:viewAny,".Category::class);

    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::get('/users', [HomeController::class, 'users'])->name('users')->middleware("can:admin-only");
});
