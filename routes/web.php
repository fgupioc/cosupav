<?php

use App\Http\Controllers\Admin\AdminController;

use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;

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
})->name("/");

Route::post('login', [LoginController::class, 'login'])->name('login');
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

Route::get('cursos', [CourseController::class, 'list'])->name('courses.list');
Route::get('cursos/{slug}', [CourseController::class, 'detail'])->name('courses.detail');

Route::get("blogs", [BlogController::class, 'index'])->name('blog.index');

Route::prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard');

    Route::prefix('cursos')->group(function () {
        Route::get('/', [CourseController::class, 'index'])->name('courses.index');
    });
});

Auth::routes();

Route::redirect("/home", "/");

///Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
