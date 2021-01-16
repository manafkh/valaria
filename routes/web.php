<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileControler;
use App\Http\Controllers\QuestionnaireController;
use App\Http\Controllers\UserController;
use App\Models\Category;
use App\Models\CategoryDetails;
use App\Models\Team;
use App\Models\ThreeDModel;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
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

Route::get('/admin', [\App\Http\Controllers\AdminController::class,'index'])->name('admin_dashboard');
Route::resource('users', UserController::class);
Route::resource('questionnaires', QuestionnaireController::class);
Route::resource('profiles',\App\Http\Controllers\ProfileController::class);
Route::resource('designers',\App\Http\Controllers\DesignerController::class);
Route::resource('teams',\App\Http\Controllers\TeamController::class);
Route::resource('contacts',\App\Http\Controllers\ContactController::class);
Route::resource('model',\App\Http\Controllers\ThreeDModelController::class);
Route::resource('projects',\App\Http\Controllers\ProjectController::class);


//TODO home page user

Route::get('/', function () {

    $categories = Category::where('parent_id',1)->get();
    $models = ThreeDModel::paginate(6);
    $teams = Team::all();
    return view('users.home',compact(['categories','teams','models']));
})->name('users.home');

Route::get('lang/{locale}', function ($locale) {
    Session()->put('locale',$locale);
    return redirect()->back();
});

//Route::get('/ee', function () {
//  $dir = public_path('issue');
//    $dirs = glob('1\*',GLOB_ONLYDIR);
//    print_r($dirs);
//});
//
//Route::get('dir/{dir}',function ($dir){
//    $dirs = glob($dir.'/*',GLOB_ONLYDIR|GLOB_NOSORT);
//    dd($dirs);
//    return view('dir');
//});



Route::get('payment/{id}', [\App\Http\Controllers\PayPalController::class,'payment'])->name('payment');
Route::get('download/{id}', [\App\Http\Controllers\PayPalController::class,'download'])->name('download');

Auth::routes();
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//TODO form Questionnaire API
Route::get('/category/{id}', [\App\Http\Controllers\CategoriesController::class, 'getCategory'])->name('categories');
Route::get('/grandparent/{id}', [\App\Http\Controllers\CategoriesController::class, 'grandparent'])->name('grand');
Route::get('category', [\App\Http\Controllers\CategoriesController::class, 'parent'])->name('parent');
Route::post('createproject', [\App\Http\Controllers\QuestionnaireController::class, 'store']);
Route::get('/styles/{id}', [\App\Http\Controllers\CategoriesController::class, 'styles'])->name('styles');
