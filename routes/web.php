<?php

use App\Http\Controllers\admin\auth\RolePermissionController;
use App\Http\Controllers\admin\auth\UserRoleController;
use App\Http\Controllers\admin\category\CategoryController;
use App\Http\Controllers\admin\product\ProductController;
use App\Http\Controllers\auth\AuthController;
use App\Http\Controllers\auth\PermissionController;
use App\Http\Controllers\auth\RoleController;
use App\Http\Controllers\client\cart\CartController;
use App\Http\Controllers\client\home\HomeController;
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

//admin

Route::prefix('dashboard')->group(function () {
    //dashboard
    Route::get('/', function () {
        return view('admin.pages.Dashboard');
    });
    //category
    Route::get('/category', [CategoryController::class, 'index'])->name('admin.category.index')->middleware('permission:list_category');
    Route::get('/category/create', [CategoryController::class, 'create'])->name('admin.category.create')->middleware('permission:create_category');
    Route::post('/category/store', [CategoryController::class, 'store'])->name('admin.category.store')->middleware('permission:create_category');
    Route::delete('/category/{id}', [CategoryController::class, 'destroy'])->name('admin.category.destroy')->middleware('permission:delete_category');
    Route::get('/category/edit/{id}', [CategoryController::class, 'edit'])->name('admin.category.edit')->middleware('permission:update_category');
    Route::put('/category/update/{id}', [CategoryController::class, 'update'])->name('admin.category.update')->middleware('permission:update_category');
    //role
    Route::get('/role', [RoleController::class, 'index'])->name('admin.role.index');
    Route::get('/role/create', [RoleController::class, 'create'])->name('admin.role.create');
    Route::post('/role/store', [RoleController::class, 'store'])->name('admin.role.store');
    Route::delete('/role/{id}', [RoleController::class, 'destroy'])->name('admin.role.destroy');
    Route::get('/role/edit/{id}', [RoleController::class, 'edit'])->name('admin.role.edit');
    Route::put('/role/update/{id}', [RoleController::class, 'update'])->name('admin.role.update');
    //permistion
    Route::get('/permission', [PermissionController::class, 'index'])->name('admin.permission.index');
    Route::get('/permission/create', [PermissionController::class, 'create'])->name('admin.permission.create');
    Route::post('/permission/store', [PermissionController::class, 'store'])->name('admin.permission.store');
    Route::delete('/permission/{id}', [PermissionController::class, 'destroy'])->name('admin.permission.destroy');
    Route::get('/permission/edit/{id}', [PermissionController::class, 'edit'])->name('admin.permission.edit');
    Route::put('/permission/update/{id}', [PermissionController::class, 'update'])->name('admin.permission.update');
    //user
    Route::get('/user', [AuthController::class, 'listUser'])->name('admin.user.index');
    Route::get('/user/create', [AuthController::class, 'create'])->name('admin.user.create');
    Route::post('/user/store', [AuthController::class, 'register'])->name('admin.user.store');
    //authorize
    Route::get('/role-user', [UserRoleController::class, 'index'])->name('admin.user-role.index');
    Route::get('/role-user/create', [UserRoleController::class, 'create'])->name('admin.user-role.create');
    Route::post('/role-user/store', [UserRoleController::class, 'store'])->name('admin.user-role.store');
    Route::delete('/role-user/delete/{id}', [UserRoleController::class, 'destroy'])->name('admin.user-role.destroy');
    Route::get('/role-user/edit/{id}', [UserRoleController::class, 'edit'])->name('admin.user-role.edit');
    Route::put('/role-user/update/{id}', [UserRoleController::class, 'update'])->name('admin.user-role.update');
    //
    Route::get('/perrmission-role', [RolePermissionController::class, 'index'])->name('admin.perrmission-role.index');
    Route::get('/perrmission-role/create', [RolePermissionController::class, 'create'])->name('admin.perrmission-role.create');
    Route::post('/perrmission-role/store', [RolePermissionController::class, 'store'])->name('admin.perrmission-role.store');
    Route::delete('/perrmission-role/delete/{id}', [RolePermissionController::class, 'destroy'])->name('admin.perrmission-role.destroy');
    Route::get('/perrmission-role/edit/{id}', [RolePermissionController::class, 'edit'])->name('admin.perrmission-role.edit');
    Route::put('/perrmission-role/update/{id}', [RolePermissionController::class, 'update'])->name('admin.perrmission-role.update');
    //
    Route::get('/product', [ProductController::class, 'index'])->name('admin.product.index');
    Route::get('/product/create', [ProductController::class, 'create'])->name('admin.product.create');
    Route::post('/product/store', [ProductController::class, 'store'])->name('admin.product.store');
    Route::get('/product/edit/{id}', [ProductController::class, 'edit'])->name('admin.product.edit');
    Route::delete('/product/{id}', [ProductController::class, 'destroy'])->name('admin.product.destroy');
    //get attribute cho variant
    Route::get('/get-attribute-values/{id}', [ProductController::class, 'attributeValueData'])->name('get-attribute-value');
});
//auth
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/login', [AuthController::class, 'login'])->name('login');
//client
Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/cart', [CartController::class, 'Cart'])->name('cart');
Route::delete('/remove-cart/{id}', [CartController::class, 'RemoveCart'])->name('remove-cart');
Route::get('product-detail/{id}', [HomeController::class, 'detail'])->name('detail');
Route::get('/checkout', function () {
    return view('client.pages.checkout');
});
Route::get('/login', function () {
    return view('client.pages.login');
});
Route::get('/register', function () {
    return view('client.pages.register');
});
//ajax
Route::post('/add-to-cart', [CartController::class, 'addToCart'])->name('add-to-cart');
