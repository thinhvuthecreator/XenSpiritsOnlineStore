<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use PHPUnit\Framework\Attributes\Group;
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


Route::get('/', [HomeController::class,'ShowHome']);
Route::get('/size-guide',[HomeController::class,'ShowSizeGuide']);
Route::get('/products',[HomeController::class,'ShowProduct']);
Route::get('/wishlist',[HomeController::class,'ShowWishlist']);
Route::get('/login',[HomeController::class,'ShowLogin']);
Route::post('/login',[LoginController::class,'Login']);
Route::get('/register',[LoginController::class,'ShowRegister']);
Route::post('/register',[RegisterController::class,'Register']);
Route::get('/login',[RegisterController::class,'ShowLogin']);
Route::prefix('/admin')->group(function(){

    Route::get('/',[AdminController::class, 'ShowAdmin']);
    
    Route::prefix('/category')->group(function(){
        
        Route::get('/',[CategoryController::class,'ShowCategory'])->name('foradmin.category');

        Route::get('/add',[CategoryController::class,'AddCategory'])->name('foradmin.category.add');
        Route::post('/add',[CategoryController::class,'AddCategoryData'])->name('foradmin.category.addData');

    });

}
);

