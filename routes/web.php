<?php

use App\Http\Controllers\Admin\AdminController;

use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\SectionController;
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
Route::get('cursos/{course:slug}', [CourseController::class, 'detail'])->name('courses.detail');

Route::get("blogs", [BlogController::class, 'index'])->name('blog.index');

Route::prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard');

    Route::prefix('cursos')->group(function () {
        Route::get('/', [CourseController::class, 'index'])->name('courses.index');
        Route::get('{course:slug}/editar', [CourseController::class, 'edit'])->name('courses.edit');
        Route::put('{course:slug}/editar', [CourseController::class, 'update'])->name('courses.update');
        Route::get('registrar', [CourseController::class, 'create'])->name('courses.create');
        Route::post('registrar', [CourseController::class, 'store'])->name('courses.store');
        Route::get('{course:slug}/clases', [CourseController::class, 'createClass'])->name('courses.createClass');
        Route::post('{course:slug}/clases', [CourseController::class, 'storeClass'])->name('courses.storeClass');
        Route::get('{course:slug}/clases/secciones', [SectionController::class, 'index'])->name('section.index');
        Route::post('{course:slug}/clases/secciones', [SectionController::class, 'store'])->name('section.store');
        Route::put('{course:slug}/actualizar-condicion', [CourseController::class, 'updateCondition'])->name('courses.updateCondition');
        Route::put('{lesson:slug}/leccion-actualizar-condicion', [CourseController::class, 'lessonUpdateCondition'])->name('courses.lessonUpdateCondition');
        Route::put('changeOrderLesson', [CourseController::class, 'changeOrderLesson'])->name('courses.changeOrderLesson');
    });

});

Auth::routes();

Route::redirect("/home", "/");

///Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
