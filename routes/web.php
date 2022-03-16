<?php



use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\ProductDetailController;
use App\Http\Controllers\Frontend\CategoryController;
use App\Http\Controllers\Frontend\OrderController;
use App\Http\Controllers\Backend\LoginController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\CategoryController as BackendCategoryController;
use App\Http\Controllers\Backend\CustomerController as BackendCustomerController;
use App\Http\Controllers\Backend\OrderController    as BackendOrderController;
use App\Http\Controllers\Backend\OrderDetailController as BackendOrderDetailController;
use App\Http\Controllers\Backend\UserController     as BackendUserController;
use App\Http\Controllers\Backend\SliderControler    as BackendSliderControler;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\Frontend\BuyNowController;
use App\Http\Controllers\Frontend\DiscountPriceController;
use App\Http\Controllers\Frontend\NotificationController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\LoginMiddleware;
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

Route::middleware([LoginMiddleware::class])->prefix('/admin')->group(function () {

    Route::get('/products', [ProductController::class, 'index'])->name("products.index");
    Route::get('/products/create', [ProductController::class, 'create'])->name("products.create");
    Route::post('/products', [ProductController::class, 'store'])->name("products.store");
    Route::get('/products/{id}', [ProductController::class, 'show'])->name("products.show");
    Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name("products.edit");
    Route::put('/products/{id}', [ProductController::class, 'update'])->name("products.update");
    Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name("products.destroy");

    Route::get('/categories', [BackendCategoryController::class, 'index'])->name("categories.index");
    Route::get('/categories/create', [BackendCategoryController::class, 'create'])->name("categories.create");
    Route::post('/categories', [BackendCategoryController::class, 'store'])->name("categories.store");
    Route::get('/categories/{id}', [BackendCategoryController::class, 'show'])->name("categories.show");
    Route::get('/categories/{id}/edit', [BackendCategoryController::class, 'edit'])->name("categories.edit");
    Route::put('/categories/{id}', [BackendCategoryController::class, 'update'])->name("categories.update");
    Route::delete('/categories/{id}', [BackendCategoryController::class, 'destroy'])->name("categories.destroy");

    Route::get('/customers', [BackendCustomerController::class, 'index'])->name("customers.index");
    Route::get('/customers/create', [BackendCustomerController::class, 'create'])->name("customers.create");
    Route::post('/customers', [BackendCustomerController::class, 'store'])->name("customers.store");
    Route::get('/customers/{id}', [BackendCustomerController::class, 'show'])->name("customers.show");
    Route::get('/customers/{id}/edit', [BackendCustomerController::class, 'edit'])->name("customers.edit");
    Route::put('/customers/{id}', [BackendCustomerController::class, 'update'])->name("customers.update");
    Route::delete('/customers/{id}', [BackendCustomerController::class, 'destroy'])->name("customers.destroy");

    Route::get('/orders', [BackendOrderController::class, 'index'])->name("orders.index");
    Route::get('/orders/create', [BackendOrderController::class, 'create'])->name("orders.create");
    Route::post('/orders', [BackendOrderController::class, 'store'])->name("orders.store");
    Route::get('/orders/{id}', [BackendOrderController::class, 'show'])->name("orders.show");
    Route::get('/orders/{id}/edit', [BackendOrderController::class, 'edit'])->name("orders.edit");
    Route::put('/orders/{id}', [BackendOrderController::class, 'update'])->name("orders.update");
    Route::delete('/orders/{id}', [BackendOrderController::class, 'destroy'])->name("orders.destroy");

    Route::get('/orderdetails', [BackendOrderDetailController::class, 'index'])->name("orderdetails.index");
    Route::get('/orderdetails/create', [BackendOrderDetailController::class, 'create'])->name("orderdetails.create");
    Route::post('/orderdetails', [BackendOrderDetailController::class, 'store'])->name("orderdetails.store");
    Route::get('/orderdetails/{id}', [BackendOrderDetailController::class, 'show'])->name("orderdetails.show");
    Route::get('/orderdetails/{id}/edit', [BackendOrderDetailController::class, 'edit'])->name("orderdetails.edit");
    Route::put('/orderdetails/{id}', [BackendOrderDetailController::class, 'update'])->name("orderdetails.update");
    Route::delete('/orderdetails/{id}', [BackendOrderDetailController::class, 'destroy'])->name("orderdetails.destroy");

    Route::get('/sliders', [BackendSliderControler::class, 'index'])->name("sliders.index");
    Route::get('/sliders/create', [BackendSliderControler::class, 'create'])->name("sliders.create");
    Route::post('/sliders', [BackendSliderControler::class, 'store'])->name("sliders.store");
    Route::get('/sliders/{id}', [BackendSliderControler::class, 'show'])->name("sliders.show");
    Route::get('/sliders/{id}/edit', [BackendSliderControler::class, 'edit'])->name("sliders.edit");
    Route::put('/sliders/{id}', [BackendSliderControler::class, 'update'])->name("sliders.update");
    Route::delete('/sliders/{id}', [BackendSliderControler::class, 'destroy'])->name("sliders.destroy");

    Route::get('/users', [BackendUserController::class, 'index'])->name("users.index");
    Route::get('/users/create', [BackendUserController::class, 'create'])->name("users.create")->middleware(AdminMiddleware::class);
    Route::post('/users', [BackendUserController::class, 'store'])->name("users.store")->middleware(AdminMiddleware::class);
    Route::get('/users/{id}', [BackendUserController::class, 'show'])->name("users.show");
    Route::get('/users/{id}/edit', [BackendUserController::class, 'edit'])->name("users.edit")->middleware(AdminMiddleware::class);
    Route::put('/users/{id}', [BackendUserController::class, 'update'])->name("users.update")->middleware(AdminMiddleware::class);
    Route::delete('/users/{id}', [BackendUserController::class, 'destroy'])->name("users.destroy")->middleware(AdminMiddleware::class);

    Route::get('logout',[LoginController::class,'logout'])->name("logout");

    
});

Route::prefix('/home')->group(function () {

Route::get('login',[LoginController::class,'login'])->name("login");

Route::post('/handleLogin',[LoginController::class,'handleLogin'])->name("handleLogin");

});
Route::get('/categories/{id}', [CategoryController::class, 'categories'])->name('categories');
Route::get('/fillterCategories/{id}/{oderBy}', [CategoryController::class, 'fillterCategories'])->name('fillterCategories');

Route::get('/product-detail/{id}', [ProductDetailController::class, 'product_detail'])->name('productDetail');

Route::get('', [HomeController::class, 'home'])->name("home");

Route::post('/addToCart/{id}', [CartController::class, 'addToCart'])->name('addToCart');

Route::post('/editCart', [CartController::class, 'edit_cart'])->name('editcart');

Route::get('home/cart', [CartController::class, 'cart'])->name('cart');

Route::get('home/order',[HomeController::class, 'order'])->name('order');

Route::get('deletecart/{id}',[CartController::class, 'delete'])->name('delete');

Route::get('checkout',[OrderController::class, 'checkout'])->name('checkout');

Route::get('buyNow/{id}',[BuyNowController::class, 'buyNow'])->name('buyNow');
Route::post('payBuyNow/{id}',[BuyNowController::class, 'payBuyNow'])->name('payBuyNow');

Route::post('Orders/add',[OrderController::class, 'create'])->name('create');
Route::get('/Notification/{id}/{customer_id}',[NotificationController::class, 'notification'])->name('notification');

Route::get('filtersProduct/{orderBy}', [HomeController::class, 'filtersProduct'])->name("filtersProduct");

Route::post('/search',[HomeController::class , 'search'])->name('search');
Route::get('/discountPrice/{discountPrice}',[DiscountPriceController::class, "discountPrice"])->name("discountPrice");

Route::get('/fogotPassword',[EmailController::class,'form'])->name('fogotPassword');
Route::post('/fogotPassword',[EmailController::class,'sendEmail'])->name('sendEmail');
Route::get('password/email',[EmailController::class,'passwordreset'])->name('password.reset');
Route::post('password/update',[EmailController::class,'passwordEmail'])->name('password.passwordEmail');
