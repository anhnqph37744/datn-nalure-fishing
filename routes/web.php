<?php

use App\Http\Controllers\admin\attribute\AttributeController;
use App\Http\Controllers\admin\attribute_value\AttributeValueController;
use App\Http\Controllers\admin\auth\RolePermissionController;
use App\Http\Controllers\admin\auth\UserRoleController;
use App\Http\Controllers\admin\brand\BrandController;
use App\Http\Controllers\admin\banner\BannerController;
use App\Http\Controllers\admin\category\CategoryController;
use App\Http\Controllers\admin\voucher\VoucherController;
use App\Http\Controllers\admin\product\ProductController;
use App\Http\Controllers\auth\AuthController;
use App\Http\Controllers\auth\PermissionController;
use App\Http\Controllers\auth\RoleController;
use App\Http\Controllers\client\cart\CartController;
use App\Http\Controllers\client\checkout\CheckoutController;
use App\Http\Controllers\client\cart\OrderController as CartOrderController;
use App\Http\Controllers\client\home\HomeController;
use App\Http\Controllers\client\profile\ProfileController;
use App\Http\Controllers\OrderController;
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
    Route::get('/category', [CategoryController::class, 'index'])->name('admin.category.index');
    Route::get('/category/create', [CategoryController::class, 'create'])->name('admin.category.create');
    Route::post('/category/store', [CategoryController::class, 'store'])->name('admin.category.store');
    Route::delete('/category/{id}', [CategoryController::class, 'destroy'])->name('admin.category.destroy');
    Route::get('/category/edit/{id}', [CategoryController::class, 'edit'])->name('admin.category.edit');
    Route::put('/category/update/{id}', [CategoryController::class, 'update'])->name('admin.category.update');
    //voucher
    Route::get('/voucher', [VoucherController::class, 'index'])->name('admin.voucher.index');
    Route::get('/voucher/create', [VoucherController::class, 'create'])->name('admin.voucher.create');
    Route::post('/voucher/store', [VoucherController::class, 'store'])->name('admin.voucher.store');
    Route::delete('/voucher/{id}', [VoucherController::class, 'destroy'])->name('admin.voucher.destroy');
    Route::get('/voucher/edit/{id}', [VoucherController::class, 'edit'])->name('admin.voucher.edit');
    Route::put('/voucher/update/{id}', [VoucherController::class, 'update'])->name('admin.voucher.update');
   
    //attribute
    Route::get('/attribute', [AttributeController::class, 'index'])->name('admin.attribute.index');
    Route::get('/attribute/create', [AttributeController::class, 'create'])->name('admin.attribute.create');
    Route::post('/attribute/store', [AttributeController::class, 'store'])->name('admin.attribute.store');
    Route::delete('/attribute/{id}', [AttributeController::class, 'destroy'])->name('admin.attribute.destroy');
    Route::get('/attribute/edit/{id}', [AttributeController::class, 'edit'])->name('admin.attribute.edit');
    Route::put('/attribute/update/{id}', [AttributeController::class, 'update'])->name('admin.attribute.update');
    //attribute_value
    Route::get('/attribute_value', [AttributeValueController::class, 'index'])->name('admin.attribute_value.index');
    Route::get('/attribute_value/create', [AttributeValueController::class, 'create'])->name('admin.attribute_value.create');
    Route::post('/attribute_value/store', [AttributeValueController::class, 'store'])->name('admin.attribute_value.store');
    Route::delete('/attribute_value/{id}', [AttributeValueController::class, 'destroy'])->name('admin.attribute_value.destroy');
    Route::get('/attribute_value/edit/{id}', [AttributeValueController::class, 'edit'])->name('admin.attribute_value.edit');
    Route::put('/attribute_value/update/{id}', [AttributeValueController::class, 'update'])->name('admin.attribute_value.update');


    //role
    Route::get('/category', [CategoryController::class, 'index'])->name('admin.category.index');
    Route::get('/category/create', [CategoryController::class, 'create'])->name('admin.category.create');
    Route::post('/category/store', [CategoryController::class, 'store'])->name('admin.category.store');
    Route::delete('/category/{id}', [CategoryController::class, 'destroy'])->name('admin.category.destroy');
    Route::get('/category/edit/{id}', [CategoryController::class, 'edit'])->name('admin.category.edit');
    Route::put('/category/update/{id}', [CategoryController::class, 'update'])->name('admin.category.update');

    // banner
    // Route::get('/banner', [BannerController::class, 'index'])->name('admin.banner.index');
    // Route::get('/banner/create', [BannerController::class, 'create'])->name('admin.banner.create');
    // Route::post('/banner/store', [BannerController::class, 'store'])->name('admin.banner.store');
    Route::resource('banner', BannerController::class);
    Route::get('/banner/{id}/edit', [BannerController::class, 'edit'])->name('banner.edit');
    Route::put('/banner/{banner}', [BannerController::class, 'update'])->name('banner.update');

    Route::get('/role', [RoleController::class, 'index'])->name('admin.role.index');

    Route::get('/role/create', [RoleController::class, 'create'])->name('admin.role.create');//->middleware('permission:create_role');

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

    // Brand
    Route::get('/brand', [BrandController::class, 'index'])->name('admin.brand.index');
    Route::get('/brand/create', [BrandController::class, 'create'])->name('admin.brand.create');
    Route::post('/brand/store', [BrandController::class, 'store'])->name('admin.brand.store');
    Route::delete('/brand/{id}', [BrandController::class, 'destroy'])->name('admin.brand.destroy');
    Route::get('/brand/edit/{id}', [BrandController::class, 'edit'])->name('admin.brand.edit');
    Route::put('/brand/update/{id}', [BrandController::class, 'update'])->name('admin.brand.update');


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


 //profile-user
 Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
 Route::get('/profile/edit/{id}', [ProfileController::class, 'edit'])->name('profile.edit');
 Route::put('/profile/update/{id}', [ProfileController::class, 'update'])->name('profile.update');


 //checkout
 Route::get('/checkout', [CheckoutController::class, 'showCheckoutForm'])->name('checkout.form');
 Route::post('checkout', [CheckoutController::class, 'store'])->name('checkout.store');
Route::get('checkout/success/{order}', [CheckoutController::class, 'success'])->name('checkout.success');

// apply voucher 
Route::post('/apply-voucher', [CartController::class, 'applyDiscount'])->name('voucher.apply');

Route::get('/check-out', [CartController::class, 'checkOut'])->name('check-out');
Route::post('/order', [CartOrderController::class, 'store'])->name('order');

Route::get('/order-success/{id}', [CartOrderController::class, 'success'])->name('order.success');



