<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileControler;
use App\Http\Controllers\QuestionnaireController;
use App\Http\Controllers\UserController;
use App\Models\Category;
use App\Models\CategoryDetails;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use PhpParser\Node\Expr\Array_;

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

Route::get('/admin', [App\Http\Controllers\AdminController::class,'index'])->name('admin_dashboard');
Route::resource('users', UserController::class);
Route::resource('questionnaires', QuestionnaireController::class);
Route::resource('profiles',\App\Http\Controllers\ProfileController::class);
Route::get('/', function () {
    return view('welcome');
});

//TODO home page user
Route::get('/home', function () {
    return view('users.home');
})->name('users.home');

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



//TODO form Questionnaire API
Route::get('/category/{id}', [App\Http\Controllers\CategoriesController::class, 'getCategory'])->name('categories');
Route::get('/grandparent/{id}', [App\Http\Controllers\CategoriesController::class, 'grandparent'])->name('grand');
Route::get('/category', [App\Http\Controllers\CategoriesController::class, 'parent'])->name('parent');
Route::post('createproject', [App\Http\Controllers\QuestionnaireController::class, 'store']);
Route::get('/styles/{id}', [App\Http\Controllers\CategoriesController::class, 'styles'])->name('styles');
