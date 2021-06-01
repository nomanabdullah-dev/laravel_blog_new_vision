<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BaseController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
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
});

Route::get('/home', [BaseController::class, 'home'])->name('home');
Route::get('/services', [BaseController::class, 'services'])->name('services');
Route::get('/company', [BaseController::class, 'company'])->name('company');
Route::get('/contact_us', [BaseController::class, 'contact_us'])->name('contact');
Route::post('/contact_us', [ContactController::class, 'contact_store'])->name('contact.store');

//Admin
Route::get('/admin', [AdminController::class, 'index'])->name('login');
Route::post('/admin', [AdminController::class, 'makeLogin']);
//Middleware
Route::group(['middleware'=>'auth:admin'],function(){
    Route::get('/dashboard', [AdminController::class, 'dashboard']);
    Route::get('/page-add', [PageController::class, 'addPage'])->name('page-add');
    Route::post('/page-create', [PageController::class, 'pageCreate'])->name('page-create');
    Route::get('/company-page-add', [PageController::class, 'ourcompany'])->name('company.page.add');
    Route::get('/services-page-add', [PageController::class, 'services'])->name('services.page.add');
    Route::get('/contact-page-add', [PageController::class, 'contact'])->name('contact.page.add');

    //Post Route
    Route::get('/post-show',[PostController::class,'show'])->name('post-show');
    Route::get('/post-add',[PostController::class,'create'])->name('post-add');
    Route::get('/post-edit/{post_id?}',[PostController::class,'create'])->name('post-edit');
    Route::post('/post-add/{post_id?}',[PostController::class,'store'])->name('post-store');
    Route::post('/post-delete',[PostController::class,'delete'])->name('post-delete');

    Route::get('/contact-show',[ContactController::class,'show'])->name('admin.contact.show');
    Route::post('/contact-destroy/{id}',[ContactController::class,'destory'])->name('admin.contact.destroy');

    Route::get('logout',[AdminController::class,'logout'])->name('logout');
});
