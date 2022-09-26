<?php

use App\Http\Controllers\{CategoryController, FontendController, HomeController, SubcategoryController, ProductController, CartController, CouponController, CheckoutController, CustomerController};
use App\Models\Coupon;
use Illuminate\Support\Facades\{Auth, Route};


// Fontend Route Start

Route::get('/', [FontendController::class, 'index'])->name('index');
Route::get('shop', [FontendController::class, 'shop'])->name('shop');
Route::get('product/details/{slug}', [FontendController::class, 'productdetails'])->name('product.details');
Route::get('category/details/{slug}', [FontendController::class, 'categorydetails'])->name('category.details');
Route::post('/get/size', [FontendController::class, 'getsize'])->name('get.size');
Route::post('/get/stock', [FontendController::class, 'stock'])->name('get.stock');
Route::post('add/to/cart', [FontendController::class, 'addtocart'])->name('add.to.cart');
Route::post('check/coupon', [FontendController::class, 'checkcoupon'])->name('check.coupon');
Route::post('checkout/redirect', [FontendController::class, 'checkoutredirect'])->name('checkout.redirect');

Route::get('customer', [CustomerController::class, 'customer'])->name('customer');
Route::post('customer/register', [CustomerController::class, 'customerRegister'])->name('customer.register');
Route::get('customer/dashboard', [CustomerController::class, 'customerdashboard'])->name('customer.dashboard');

Route::get('customer/dashboard/order/invoice/{order_summery}', [CustomerController::class, 'dashboardOrderInvoice'])->name('dashboard.order.invoice');

Route::get('customer/dashboard/order/invoice/download/{order_summery}', [CustomerController::class, 'dashboardOrderInvoiceDownload'])->name('dashboard.order.invoice.download');

Route::get('reload-captcha', [CustomerController::class, 'reloadcaptcha'])->name('reload.captcha');

// Fontend Route End

Route::get('checkout', [CheckoutController::class, 'checkout'])->name('checkout');
Route::post('checkout/post', [CheckoutController::class, 'checkoutpost'])->name('checkout.post');

Route::get('cart', [CartController::class, 'cart'])->name('cart');
Route::get('cart/remove/{cart}', [CartController::class, 'cartremove'])->name('cart.remove');
Route::get('clear/cart', [CartController::class, 'clearcart'])->name('clear.cart');
Route::post('update/cart', [CartController::class, 'updatecart'])->name('update.cart');

// Route::get('media-center', [FontendController::class, 'media_center'])->name('media-center');
// Route::post('media-center/insert', [FontendController::class, 'media_center_insert'])->name('media-center-insert');
// Route::get('contact', [FontendController::class, 'contact'])->name('contact');
// Route::get('about-us', [FontendController::class, 'about_us'])->name('about');
// Route::get('channel/delete/{channel_id}', [FontendController::class, 'channel_delete'])->name('channel-delete');
// Route::get('channel/delete/soft', [FontendController::class, 'channel_delete_soft'])->name('channel-delete-soft');
// Route::get('channel/edit/{channel_id}', [FontendController::class, 'channel_edit'])->name('channel-edit');
// Route::POST('channel/uodate/{channel_id}', [FontendController::class, 'channel_update'])->name('media-center-update');
// Route::get('channel/restore/{channel_id}', [FontendController::class, 'channel_restore'])->name('channel-restore');
// Route::get('channel/delete/forever/{channel_id}', [FontendController::class, 'channel_delete_forever'])->name('channel-delete-forever');
// Route::get('channel/delete/all/forever', [FontendController::class, 'channel_delete_forever_all'])->name('channel-delete-all');
// Fontend Route End

// Auth Route Start
Auth::routes();
// Auth Route End
Route::middleware(['auth', 'checkrole'])->group(function () {
    // Home Route start
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/profile', [HomeController::class, 'profile'])->name('profile');
    Route::post('/cahage/name', [HomeController::class, 'cahage_name'])->name('cahage.name');
    Route::post('/change/password/', [HomeController::class, 'change_password'])->name('change.password');
    Route::get('shipping', [HomeController::class, 'shipping'])->name('shipping');
    Route::post('shipping/insert', [HomeController::class, 'shippinginsert'])->name('shipping.insert');
    Route::get('shipping/delevary/status/update/{order_id}/{delevary_status}', [HomeController::class, 'delevary_status_update'])->name('delevary.status.update');

    // Home Route End
});

Route::middleware(['auth'])->group(function () {
    Route::delete('category/delete/{category}', [CategoryController::class, 'category_delete'])->name('category.delete');
    Route::resource('category', CategoryController::class);

    Route::resource('subcategory', SubcategoryController::class);

    Route::resource('coupon', CouponController::class);

    Route::resource('product', ProductController::class);
    Route::post('/get/subcategory', [ProductController::class, 'getsubcategory'])->name('get.subcategory');
    Route::get('/color', [ProductController::class, 'color'])->name('product.color');
    Route::get('/size', [ProductController::class, 'size'])->name('product.size');
    Route::post('product/color/store', [ProductController::class, 'colorstore'])->name('poduct.color.store');
    Route::post('product/size/store', [ProductController::class, 'sizestore'])->name('poduct.size.store');
    Route::get('product/inventory/{id}', [ProductController::class, 'addproductinventory'])->name('product.inventory');
    Route::post('product/inventory/{id}', [ProductController::class, 'addproductinventorypost'])->name('product.inventory.post');
    Route::post('get/city', [ProductController::class, 'getcity'])->name('get.city');
    Route::get('order/info', [ProductController::class, 'orderInfo'])->name('order.info');
    Route::get('order/detals/{order}', [ProductController::class, 'orderDetals'])->name('order.detals');
});
