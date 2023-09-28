<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\StaffController;
use App\Http\Middleware\AdminAccess;
use App\Models\LoginStatus;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\StatisticController;
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


Route::get('/', [HomeController::class,'ShowHome'])->name('home');
Route::get('/size-guide',[HomeController::class,'ShowSizeGuide']);
Route::get('/products',[ProductController::class,'ShowProductClient']);
Route::get('/wishlist',[HomeController::class,'ShowWishlist']);
Route::get('/login',[LoginController::class,'ShowLogin'])->name('login');
Route::post('/login',[LoginController::class,'Login']);
Route::get('/register',[LoginController::class,'ShowRegister']);
Route::post('/register',[RegisterController::class,'Register']);
Route::prefix('/admin')->group(function(){

    Route::get('/',[AdminController::class, 'ShowAdmin'])->name('foradmin.admin_home')->middleware('admin.access');
    Route::get('/logout',[AdminController::class,'LogOut'])->name('foradmin.admin_logout');
    Route::prefix('/category')->group(function(){
        
        Route::get('/',[CategoryController::class,'ShowCategory'])->name('foradmin.category');
        Route::get('/add',[CategoryController::class,'AddCategory'])->name('foradmin.category.add');
        Route::post('/add',[CategoryController::class,'AddCategoryData'])->name('foradmin.category.addData');

    });

    Route::prefix('/product')->group(function(){
        
        Route::get('/',[ProductController::class,'ShowProduct'])->name('foradmin.product');
        Route::get('/add',[ProductController::class,'AddProduct'])->name('foradmin.product.add');
        Route::post('/add',[ProductController::class,'AddProductData'])->name('foradmin.product.addData');

    });

    Route::prefix('/staff')->group(function(){
        
        Route::get('/',[StaffController::class,'ShowStaff'])->name('foradmin.staff');
        Route::get('/add',[StaffController::class,'AddStaff'])->name('foradmin.staff.add');
        Route::post('/add',[StaffController::class,'AddStaffData'])->name('foradmin.staff.addData');

    });

    Route::prefix('/role')->group(function(){
        
        Route::get('/',[RoleController::class,'ShowRole'])->name('foradmin.role');
        Route::get('/add',[RoleController::class,'AddRole'])->name('foradmin.role.add');
        Route::post('/add',[RoleController::class,'AddRoleData'])->name('foradmin.role.addData');

    });

    Route::prefix('/account')->group(function(){
        
        Route::get('/',[AccountController::class,'ShowAccount'])->name('foradmin.account');
        Route::get('/add',[AccountController::class,'AddAccount'])->name('foradmin.account.add');
        Route::post('/add',[AccountController::class,'AddAccountData'])->name('foradmin.account.addData');

    });

    Route::prefix('/statistic')->group(function(){
        
        Route::get('/',[StatisticController::class,'ShowStatistic'])->name('foradmin.statistic');

    });

     Route::get('category/delete/{id}',[CategoryController::class,'Delete'])->name('category.delete');
     Route::get('category/edit/{id}',[CategoryController::class,'Edit'])->name('category.edit');
     Route::post('category.edit',[CategoryController::class,'EditCategoryData'])->name('category.editData');
}
);

