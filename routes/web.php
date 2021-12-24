<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ContactController;
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

//admin routes
Route::group(['prefix'=>'admin'],function(){

    Route::get('/',[AdminController::class,'dashboard']);

    //slider
    Route::get('/sliders', [AdminController::class,'sliders']);
    Route::get('/addslider', [AdminController::class,'addslider']);
    Route::post('/saveslider', [AdminController::class,'saveslider']);
    Route::get('/edit_slider/{id}', [AdminController::class,'edit_slider']);
    Route::post('/updateslider', [AdminController::class,'updateslider']);
    Route::get('/delete_slider/{id}', [AdminController::class,'delete_slider']);
    Route::get('/unactivate_slider/{id}', [AdminController::class,'unactivate_slider']);
    Route::get('/activate_slider/{id}', [AdminController::class,'activate_slider']);

    //category
    Route::get('/addcategory', [AdminController::class,'addcategory']);
    Route::post('/savecategory',[AdminController::class,'savecategory']);
    Route::get('/categories', [AdminController::class,'categories']);
    Route::get('/edit_category/{id}', [AdminController::class,'edit']);
    Route::post('/updatecategory', [AdminController::class,'updatecategory']);
    Route::get('/delete/{id}', [AdminController::class,'delete']);
    

    //gallery
    Route::get('/products', [AdminController::class,'products']);
    Route::get('/addproduct', [AdminController::class,'addproduct']);
    Route::post('/saveproduct', [AdminController::class,'saveproduct']);
    Route::get('/edit_product/{id}', [AdminController::class,'editproduct']);
    Route::post('/updateproduct', [AdminController::class,'updateproduct']);
    Route::get('/delete_product/{id}', [AdminController::class,'delete_product']);
    Route::get('/activate_product/{id}', [AdminController::class,'activate_product']);
    Route::get('/unactivate_product/{id}', [AdminController::class,'unactivate_product']);
 
    //subscribers
    Route::get('/subscribers', [AdminController::class,'subscribers']);
    Route::get('/delete_subscriber/{id}', [AdminController::class,'delete_subscriber']);

    //clients
    Route::get('/clients', [AdminController::class,'clients']);
    Route::get('/delete_client/{id}', [AdminController::class,'delete_client']);
});


//client routes 
Route::group(['prefix'=> LaravelLocalization::setLocale(), 
              'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ] ],function(){
    Route::get('/', [ClientController::class,'home'])->name('home');
    Route::get('/about', [ClientController::class,'about'])->name('about');
    Route::get('/contact', [ClientController::class,'contact'])->name('contact');
    Route::get('/gallery', [ClientController::class,'gallery'])->name('gallery');
    Route::get('/category', [ClientController::class,'category'])->name('category');
    Route::get('/services', [ClientController::class,'services'])->name('services');
    Route::get('/view_by_cat/{name}', [ClientController::class,'view_by_cat']);
});

   Route::post('/subscribe', [ClientController::class,'subscribe'])->name('subscribe');
   
   Route::get('/create', [ContactController::class,'create']);
   Route::post('/store', [ContactController::class,'store']);


