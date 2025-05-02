<?php

use App\Http\Controllers\admin\attribute\AttributeController;
use App\Http\Controllers\admin\attribute_value\AttributeValueController;
use App\Http\Controllers\admin\auth\RolePermissionController;
use App\Http\Controllers\admin\auth\UserRoleController;
use App\Http\Controllers\admin\brand\BrandController;
use App\Http\Controllers\admin\banner\BannerController;
use App\Http\Controllers\admin\category\CategoryController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\Admin\order\OrderController as OrderOrderController;
use App\Http\Controllers\admin\post\PostCategoryController;
use App\Http\Controllers\admin\post\PostController;
use App\Http\Controllers\admin\voucher\VoucherController;
use App\Http\Controllers\admin\product\ProductController;
use App\Http\Controllers\admin\review\ProductReviewController;
use App\Http\Controllers\AI\GeminiAIController;
use App\Http\Controllers\auth\AuthController;
use App\Http\Controllers\auth\RoleController;
use App\Http\Controllers\Client\Blog\BlogController;
use App\Http\Controllers\auth\PermissionController;
use App\Http\Controllers\client\address\AddressController;
use App\Http\Controllers\client\cart\CartController;
use App\Http\Controllers\client\home\HomeController;
use App\Http\Controllers\client\profile\ProfileController;
use App\Http\Controllers\client\shop\ShopController;
use App\Http\Controllers\client\checkout\CheckoutController;
use App\Http\Controllers\client\profile\UpdateProfileController;
use App\Http\Controllers\client\cart\OrderController as CartOrderController;
use App\Http\Controllers\Momo\MomoController;
use App\Http\Controllers\VNPay\VNPayController;
use App\Http\Controllers\OrderController;
use App\Models\Cart;
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
    Route::get('/', [DashboardController::class, 'dashboard'])->middleware('permission:dashboard')->name('admin.dashboard');
    //order management
    Route::get('/orders', [App\Http\Controllers\Admin\order\OrderController::class, 'index'])->middleware('permission:order_view')->name('admin.order.index');
    Route::get('/orders/{id}', [App\Http\Controllers\Admin\order\OrderController::class, 'show'])->middleware('permission:order_show')->name('admin.order.show');
    Route::get('/orders-status', [App\Http\Controllers\Admin\order\OrderController::class, 'update'])->name('admin.order.update');
    //category
    Route::get('/category', [CategoryController::class, 'index'])->middleware('permission:list_category')->name('admin.category.index');
    Route::get('/category/create', [CategoryController::class, 'create'])->middleware('permission:create_category')->name('admin.category.create');
    Route::post('/category/store', [CategoryController::class, 'store'])->middleware('permission:create_category')->name('admin.category.store');
    Route::delete('/category/{id}', [CategoryController::class, 'destroy'])->middleware('permission:delete_category')->name('admin.category.destroy');
    Route::get('/category/edit/{id}', [CategoryController::class, 'edit'])->middleware('permission:update_category')->name('admin.category.edit');
    Route::put('/category/update/{id}', [CategoryController::class, 'update'])->middleware('permission:update_category')->name('admin.category.update');
    //voucher
    Route::get('/voucher', [VoucherController::class, 'index']) ->middleware('permission:voucher_view')->name('admin.voucher.index');
    Route::get('/voucher/create', [VoucherController::class, 'create'])->middleware('permission:voucher_create')->name('admin.voucher.create');
    Route::post('/voucher/store', [VoucherController::class, 'store'])->name('admin.voucher.store');
    Route::delete('/voucher/{id}', [VoucherController::class, 'destroy'])->middleware('permission:voucher_delete')->name('admin.voucher.destroy');
    Route::get('/voucher/edit/{id}', [VoucherController::class, 'edit'])->middleware('permission:voucher_edit')->name('admin.voucher.edit');
    Route::put('/voucher/update/{id}', [VoucherController::class, 'update'])->middleware('permission:voucher_edit')->name('admin.voucher.update');
   
    //attribute
    Route::get('/attribute', [AttributeController::class, 'index']) ->middleware('permission:attribute_view')->name('admin.attribute.index');
    Route::get('/attribute/create', [AttributeController::class, 'create'])->middleware('permission:attribute_create')->name('admin.attribute.create');
    Route::post('/attribute/store', [AttributeController::class, 'store'])->name('admin.attribute.store');
    Route::delete('/attribute/{id}', [AttributeController::class, 'destroy'])->middleware('permission:attribute_delete')->name('admin.attribute.destroy');
    Route::get('/attribute/edit/{id}', [AttributeController::class, 'edit'])->middleware('permission:attribute_edit')->name('admin.attribute.edit');
    Route::put('/attribute/update/{id}', [AttributeController::class, 'update'])->middleware('permission:attribute_edit')->name('admin.attribute.update');
    //attribute_value
    Route::get('/attribute_value', [AttributeValueController::class, 'index']) ->middleware('permission:attribute_value_view')->name('admin.attribute_value.index');
    Route::get('/attribute_value/create', [AttributeValueController::class, 'create'])->middleware('permission:attribute_value_create')->name('admin.attribute_value.create');
    Route::post('/attribute_value/store', [AttributeValueController::class, 'store'])->name('admin.attribute_value.store');
    Route::delete('/attribute_value/{id}', [AttributeValueController::class, 'destroy'])->middleware('permission:attribute_value_delete')->name('admin.attribute_value.destroy');
    Route::get('/attribute_value/edit/{id}', [AttributeValueController::class, 'edit'])->middleware('permission:attribute_value_edit')->name('admin.attribute_value.edit');
    Route::put('/attribute_value/update/{id}', [AttributeValueController::class, 'update'])->middleware('permission:attribute_value_edit')->name('admin.attribute_value.update');


    //role

    // banner
    // Route::get('/banner', [BannerController::class, 'index'])->name('admin.banner.index');
    // Route::get('/banner/create', [BannerController::class, 'create'])->name('admin.banner.create');
    // Route::post('/banner/store', [BannerController::class, 'store'])->name('admin.banner.store');
    Route::resource('banner', BannerController::class);
    Route::get('/banner/{id}/edit', [BannerController::class, 'edit'])->name('banner.edit');
    Route::put('/banner/{banner}', [BannerController::class, 'update'])->name('banner.update');

    Route::prefix('admin')->name('admin.')->group(function () {
        Route::resource('posts', PostController::class);
        Route::resource('post-categories', PostCategoryController::class);
    });
   

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
    Route::get('/brand', [BrandController::class, 'index']) ->middleware('permission:brand_view')->name('admin.brand.index');
    Route::get('/brand/create', [BrandController::class, 'create'])->middleware('permission:brand_create')->name('admin.brand.create');
    Route::post('/brand/store', [BrandController::class, 'store'])->name('admin.brand.store');
    Route::delete('/brand/{id}', [BrandController::class, 'destroy'])->middleware('permission:brand_delete')->name('admin.brand.destroy');
    Route::get('/brand/edit/{id}', [BrandController::class, 'edit'])->middleware('permission:brand_edit')->name('admin.brand.edit');
    Route::put('/brand/update/{id}', [BrandController::class, 'update'])->middleware('permission:brand_edit')->name('admin.brand.update');

    //product
    Route::get('/product', [ProductController::class, 'index'])->middleware('permission:product_view')->name('admin.product.index');
    Route::get('/product/create', [ProductController::class, 'create'])->middleware('permission:product_create')->name('admin.product.create');
    Route::post('/product/store', [ProductController::class, 'store'])->name('admin.product.store');
    Route::get('/product/edit/{id}', [ProductController::class, 'edit'])->middleware('permission:product_update')->name('admin.product.edit');
    Route::delete('/product/{id}', [ProductController::class, 'destroy'])->middleware('permission:product_delete')->name('admin.product.destroy');
    Route::put('/product/{id}', [ProductController::class, 'update'])->middleware('permission:product_update')->name('admin.product.update');
    Route::get('/product/update-status', [ProductController::class, 'updateStatus'])->name('admin.product.active');
    //get attribute cho variant
    Route::get('/get-attribute-values/{id}', [ProductController::class, 'attributeValueData'])->name('get-attribute-value');
    Route::get('/get-attribute-values', [DashboardController::class, 'getRevenue'])->name('admin.revenue.filter');
    Route::get('/order-admin-detail/{id}',[OrderOrderController::class, 'show'])->name('admin.order.detail');
});
    
    // quản lý đánh giá sản phẩm
    Route::prefix('admin')->group(function () {
    Route::get('reviews', [ProductReviewController::class, 'index'])->name('admin.reviews.index');
    Route::delete('reviews/{id}', [ProductReviewController::class, 'destroy'])->name('admin.reviews.destroy');
    Route::patch('reviews/{id}/toggle', [ProductReviewController::class, 'toggle'])->name('admin.reviews.toggle');
    });

//auth
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
//client
Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/cart', [CartController::class, 'Cart'])->name('cart');
Route::delete('/remove-cart/{id}', [CartController::class, 'RemoveCart'])->name('remove-cart');
Route::post('/update-cart', [CartController::class, 'updateQuantity'])->name('update-cart');
Route::get('product-detail/{id}', [HomeController::class, 'detail'])->name('detail');
Route::get('shop', [ShopController::class, 'index'])->name('shop');
Route::post('/products/{product}/reviews', [ProductReviewController::class, 'store'])->name('products.reviews.store');

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

Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [UpdateProfileController::class, 'index'])->name('profile.index');
    Route::post('/profile/update', [UpdateProfileController::class, 'update'])->name('profile.update');
    // Order routes
    Route::prefix('client/orders')->group(function () {
        Route::get('', [\App\Http\Controllers\client\order\OrderController::class, 'index'])->name('client.orders.index');
        Route::get('/{order}', [\App\Http\Controllers\client\order\OrderController::class, 'show'])->name('client.orders.show');
        Route::post('/{order}/cancel', [\App\Http\Controllers\client\order\OrderController::class, 'cancel'])->name('client.orders.cancel');
    });
});


Route::get('/contact', function () {
    return view('client.pages.contact');
})->name('contact');
Route::get('/other', function () {
    return view('client.pages.other');
})->name('other');
//vnpay return
Route::get('/vnpay/payment/{amount}', [VNPayController::class, 'VNpay_Payment'])->name('vnpay.payment');
Route::get('/checkout-fatal-vnpay', [VNPayController::class, 'handleReturn'])->name('vnpay.return');
//gemini
Route::post('/chat', [GeminiAIController::class, 'chat'])->name('gemini.ai');
//
Route::get('/blog', [BlogController::class, 'index'])->name('client.blog.pages.index');
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('client.blog.pages.show');

Route::post('/address', [AddressController::class, 'store'])->name('address.store');
Route::delete('/address/{id}', [AddressController::class, 'destroy'])->name('address.delete');
