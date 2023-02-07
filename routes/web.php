<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\AttributeController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\CouponsController;
use App\Http\Controllers\FlashDealsController;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\DeliveryController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\registerController;
use App\Http\Controllers\UserRegisterController;
use App\Http\Controllers\orderController;

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

/*Route::get('/', function () {
    return view('welcome');
});
*/

//web

Route::get('/', [PublicController::class, 'getIndex']);
Route::get('subcategories/{sub_category_id}', [PublicController::class, 'getProductCategory']);
Route::get('getLoginUserId', [PublicController::class, 'getLoginUserId']);
Route::get('details/{product_id}', [PublicController::class, 'getProductDetails']);
Route::get('cart/{new_id}', [PublicController::class, 'getCart']);
Route::post('delete_cart', [PublicController::class,'postDeleteCart']);
Route::post('prod/add_cart', [PublicController::class, 'postAddCart']);  //ajax
Route::post('prod/wishlist', [PublicController::class,'postAddToWishList']);
Route::get('whislist/{user_id}', [PublicController::class, 'getWishList']);
Route::post('delete_wishlist', [PublicController::class,'postDeleteWishList']);
Route::get('checkout', [PublicController::class,'getCheckOut']);  //checkout from cart
Route::post('update/checkout', [PublicController::class,'getUpdateCheckOut']);
Route::post('update/checkout-details', [PublicController::class,'checkoutDetails']);
Route::post('update/shipping_address', [PublicController::class,'shippingAddress']);
Route::get('place_order', [PublicController::class,'getPlaceOrder']);
Route::get('bank_details', [PublicController::class,'getBankDetails']);
//Route::get('checkout-payment/{new_id}', [PublicController::class,'getCheckoutPayment']);
Route::get('checkout-payment/{new_id}', [PublicController::class,'getCheckoutPayment']);
Route::post('checkout-complete', [PublicController::class,'getCheckoutComplete']);
Route::post('payment_details', [PublicController::class,'getPaymentDetails']);

//Route::get('new_shipping_address', [PublicController::class,'getShippingAdress']);
/*Route::get('admin_registration', [registerController::class, 'getRegister']);
*/
Route::resource('user', UserRegisterController::class, [
        'only' => ['index','store','edit','update']]);
Route::get('web/login', [UserRegisterController::class, 'getUserLogin']);

Route::resource('reg', registerController::class, [
        'only' => ['index','store','edit','update']]);
Route::get('web/reg', [registerController::class, 'getRegister']);


Auth::routes();
//Start--- Get all pages
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
Route::get('/dashboard', [PublicController::class, 'getdashboard']);
Route::resource('brand', BrandController::class, [
        'only' => ['index','store','edit','update']
    ]);
Route::get('brand/add', [BrandController::class, 'getAddBrand']);
Route::get('brand/all', [BrandController::class, 'getAlldata']);
Route::get('brand/alldatatable', [BrandController::class, 'getdataTable']);
Route::get('brand/update/{brand_id}', [BrandController::class, 'getEditBrand']);

//Product
Route::resource('product', ProductController::class, [
        'only' => ['index','store','edit','update']]);
Route::get('product/add', [ProductController::class, 'getAddProduct']);
Route::get('product/update/{product_id}', [ProductController::class, 'getEditProduct']);
Route::get('product/all', [ProductController::class, 'getAllProductdata']);
Route::get('product/alldatatable', [ProductController::class, 'getdataTable']);
Route::get('product_stock/all', [ProductController::class, 'getdataTableProductStock']);
Route::get('product_stock/alldatatable', [ProductController::class, 'getAllProductStockDdataTable']);
Route::get('product_stock_limit', [ProductController::class, 'getProductStockLimit']);

//language
Route::resource('language', LanguageController::class, [
        'only' => ['index','store','edit','update']
    ]);
Route::get('lan/add', [LanguageController::class, 'getAddLanguage']);


//category
Route::resource('category',CategoryController::class,['only'=>['index','store','edit','update']]);
Route::get('cat/add', [CategoryController::class, 'getAddCategory']);
Route::get('cat/all', [CategoryController::class, 'getAllData']);
Route::get('cat/alldatatable', [CategoryController::class, 'getAlldataTable']);
Route::get('category/update/{category_id}', [CategoryController::class, 'getEditCategory']);

//subcategory
Route::resource('subcategory',SubCategoryController::class,['only'=>['index','store','edit','update']]);
Route::get('subcategory/add', [SubCategoryController::class, 'getAddSubCategory']);
Route::get('subcategory/all', [SubCategoryController::class, 'getSubcategoryAllData']);
Route::get('subcategory/alldatatable', [SubCategoryController::class, 'getAllSubcategorydataTable']);
Route::get('subcategory/update/{sub_category_id}', [SubCategoryController::class, 'getEditSubcategory']);
Route::post('subcategory/getsubcategory', [SubCategoryController::class, 'getsubcategory']);
//attribute
Route::resource('attribute',AttributeController::class,['only'=>['index','store','edit','update']]);
Route::get('attribute/add', [AttributeController::class, 'getAddAttribute']);
Route::get('attribute/all', [AttributeController::class, 'getAttributeAllData']);
Route::get('attribute/alldatatable', [AttributeController::class, 'getAllAttributedataTable']);
Route::get('attribute/update/{attribute_id}', [AttributeController::class, 'getEditAttribute']);

//banner

Route::resource('banner',BannerController::class,['only'=>['index','store','edit','update']]);
Route::get('banner/add', [BannerController::class, 'getAddBanner']);
Route::get('banner/all', [BannerController::class, 'getAllBanner']);
Route::get('banner/alldatatable', [BannerController::class, 'getAllBannerData']);
Route::get('banner/update/{banner_id}', [BannerController::class, 'getEditBanner']);

//coupons
Route::resource('coupon',CouponsController::class,['only'=>['index','store','edit','update']]);
Route::get('coupon/add', [CouponsController::class, 'getAddCoupon']);
Route::get('coupon/all', [CouponsController::class, 'getAllCoupon']);
Route::get('coupon/alldatatable', [CouponsController::class, 'getAllCouponData']);
Route::get('coupon/update/{coupon_id}', [CouponsController::class, 'getEditCoupon']);

//flashdeals
Route::resource('flashdeals',FlashDealsController::class,['only'=>['index','store','edit','update']]);
Route::get('flashdeals/add', [FlashDealsController::class, 'getAddFlashdeals']);
Route::get('flashdeals/update/{flash_deals_id}', [FlashDealsController::class, 'getEditFlashDeals']);
//seller
Route::resource('sellers',SellerController::class,['only'=>['index','store','edit','update']]);
Route::get('sellers/add', [SellerController::class, 'getAddSeller']);
Route::get('sellers/update/{seller_id}', [SellerController::class, 'getEditSeller']);
Route::get('sellers/all', [SellerController::class, 'getAllSeller']);
Route::get('sellers/alldatatable', [SellerController::class, 'getAllSellerData']);

//delivery
Route::resource('delivery',DeliveryController::class,['only'=>['index','store','edit','update']]);
Route::get('delivery/add', [DeliveryController::class, 'getAddDelivery']);
Route::get('delivery/update/{delivery_men_id}', [DeliveryController::class, 'getAUpdateDelivery']);
Route::get('delivery/all', [DeliveryController::class, 'getAllDelivery']);
Route::get('delivery/alldatatable', [DeliveryController::class, 'getAllDeliveryData']);

//order
Route::resource('order',OrderController::class,['only'=>['index','store','edit','update']]);
Route::get('order/all', [OrderController::class, 'getAallData']);

});






