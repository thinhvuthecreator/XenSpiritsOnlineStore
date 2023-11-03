<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\WishlistController;
use App\Http\Middleware\AdminAccess;
use App\Models\LoginStatus;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
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


Route::get('', [HomeController::class,'ShowHome'])->name('home');
Route::get('/size-guide',[HomeController::class,'ShowSizeGuide']);
Route::prefix('/products')->group(function(){
    Route::get('/',[ProductController::class,'ShowProductClient'])->name('product_client');
    Route::get('/detail/{id}',[ProductController::class,'ShowProductDetail'])->name('product_detail_client');
    Route::post('/detail/insert.php',[WishlistController::class,'add_to_wishlist']);
});
Route::get('/wishlist',[HomeController::class,'ShowWishlist']);
Route::get('/login',[LoginController::class,'ShowLogin'])->name('showlogin');
Route::post('/login',[LoginController::class,'Login'])->name('login');
Route::get('/register',[LoginController::class,'ShowRegister']);
Route::post('/register',[RegisterController::class,'Register']);

Route::get('/profile',[CustomerController::class,'ShowProfile']);
Route::post('/profile/update-profile',[CustomerController::class,'ChangeProfile'])->name('customer.profile.changeData');
Route::post('/profile/update-password',[CustomerController::class,'ChangePassword'])->name('customer.profile.changepassData');

Route::get('/profile-info', function(){
    return view('forClient.Info');
});
Route::get('/logout',[LoginController::class,'Logout'])->name('logout');
Route::get('/customer-wishlist',[WishlistController::class,'ShowWishlist']);

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
        Route::get('/edit/{id}',[ProductController::class,'EditProduct'])->name('foradmin.product.edit');
        Route::post('/edit/{id}',[ProductController::class,'EditProductData'])->name('foradmin.product.editData');
    });
    Route::prefix('/size')->group(function(){
        
        Route::get('/',[SizeController::class,'ShowSize'])->name('foradmin.size');
        Route::get('/add',[SizeController::class,'AddSize'])->name('foradmin.size.add');
        Route::post('/add',[SizeController::class,'AddSizeData'])->name('foradmin.size.addData');
        Route::get('/edit',[SizeController::class,'EditSize'])->name('foradmin.size.edit');
        Route::post('/edit',[SizeController::class,'EditSizeData'])->name('foradmin.size.editData');
    });

    Route::prefix('/staff')->group(function(){
        
        Route::get('/',[StaffController::class,'ShowStaff'])->name('foradmin.staff');
        Route::get('/add',[StaffController::class,'AddStaff'])->name('foradmin.staff.add');
        Route::post('/add',[StaffController::class,'AddStaffData'])->name('foradmin.staff.addData');
        Route::get('/edit/{id}',[StaffController::class,'EditStaff'])->name('foradmin.staff.edit');
        Route::post('/edit',[StaffController::class,'EditStaffData'])->name('foradmin.staff.editData');
    });

    Route::prefix('/role')->group(function(){
        
        Route::get('/',[RoleController::class,'ShowRole'])->name('foradmin.role');
        Route::get('/add',[RoleController::class,'AddRole'])->name('foradmin.role.add');
        Route::post('/add',[RoleController::class,'AddRoleData'])->name('foradmin.role.addData');
        Route::get('/edit/{id}',[RoleController::class,'EditRole'])->name('foradmin.role.edit');
        Route::post('/edit',[RoleController::class,'EditRoleData'])->name('foradmin.role.editData');
    });

    Route::prefix('/account')->group(function(){
        
        Route::get('/',[AccountController::class,'ShowAccount'])->name('foradmin.account');
        Route::get('/add',[AccountController::class,'AddAccount'])->name('foradmin.account.add');
        Route::post('/add',[AccountController::class,'AddAccountData'])->name('foradmin.account.addData');
        Route::get('/edit/{id}',[AccountController::class,'EditAccount'])->name('foradmin.account.edit');
        Route::post('/edit',[AccountController::class,'EditAccountData'])->name('foradmin.account.editData');
    });

    Route::prefix('/customer')->group(function(){
        
        Route::get('/',[CustomerController::class,'ShowCustomer'])->name('foradmin.customer');

    });

    Route::get('category/delete/{id}',[CategoryController::class,'Delete'])->name('category.delete');
    Route::get('category/edit/{id}',[CategoryController::class,'Edit'])->name('category.edit');
    Route::post('category.edit',[CategoryController::class,'EditCategoryData'])->name('category.editData');

    Route::get('profile',[AdminController::class,'ShowProfile'])->name('foradmin.profile');
}
);

