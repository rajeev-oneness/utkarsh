<?php
use Illuminate\Http\Request;
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

// Auth::routes();
Route::get('command', function () {
	/* php artisan migrate */
    \Artisan::call('migrate:fresh --seed');
    dd("Done");
});


Auth::routes(['verify' => true]);

require 'admin.php';
//Route::view('/admin', 'admin.dashboard.index');

/*=======================web-site============================*/
Route::get('test/','Site\ProductController@shiprocket');
Route::group(['namespace'=> 'Site'], function () {

Route::get('/','HomeController@index')->name('site.home');
Route::get('search','ProductController@SearchProducts')->name('site.searchproducts');
Route::get('/our-customers','CommonController@ourcustomers')->name('site.ourcustomers');
Route::get('/faq','CommonController@faq')->name('site.faq');
Route::get('/terms-conditions','CommonController@terms')->name('site.terms');

Route::get('/returnpolicy','CommonController@replacement')->name('site.replacement');
Route::get('/supportpolicy','CommonController@shipping')->name('site.shipping');

Route::get('/compare','CommonController@comparelist')->name('site.compare');
Route::get('/addcompare/{id}','CommonController@compare')->name('site.add.compare');
Route::get('/reset-compare','CommonController@resetcomparelist')->name('site.deletecomparelist');

Route::get('/contact','CommonController@contact')->name('site.contact');
Route::post('/contact','CommonController@contactsave')->name('site.contact.save');
Route::post('/newsletter','CommonController@newsletter')->name('site.newsletter.save');

Route::post('addcart', 'ProductController@addcart')->name('site.addcart');
route::get('view-cart','ProductController@viewcart')->name('site.viewcart');
route::get('remove-from-cart/{id}','ProductController@removecart')->name('site.remove.cart');
route::post('cart-update','ProductController@updatecart')->name('site.update.cart');

Route::post('buynow', 'ProductController@buynow')->name('site.buynow');
Route::post('checkcoupon/', 'ProductController@checkcoupon')->name('site.check');

Route::get('check-out', 'ProductController@checkout')->name('site.checkout');
Route::post('reviewbooking/{id}', 'ProductController@payment')->name('site.reviewbooking');
Route::post('booking/', 'ProductController@booking')->name('site.booking');
route::get('thankyou/', 'ProductController@thankyou')->name('site.thankyou');


Route::get('/site-login','AuthController@loadlogin')->name('site.login');
Route::get('/register','AuthController@loadregister')->name('site.registration');
Route::post('/login','AuthController@login')->name('site.login.save');
Route::post('/register','AuthController@register')->name('site.registration.save');

Route::get('/password/reset','ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('/password/email','ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::post('/password/reset','ResetPasswordController@reset');
Route::get('/password/reset/{token}','ResetPasswordController@showResetForm')->name('password.reset');

Route::get('/about-us','CommonController@about')->name('site.about');

Route::get('/product-list/{categoryId}/{key}','ProductController@categorywiseproduct')->name('site.categorywise.productlist');
Route::get('/details/{id}/{key}','ProductController@productdetails')->name('site.product.details');

Route::group(['middleware' => ['auth:users']], function () {
    
/*Route::get('check-out', 'ProductController@checkout')->name('site.checkout');
Route::post('reviewbooking/{id}', 'ProductController@payment')->name('site.reviewbooking');
Route::post('booking/', 'ProductController@booking')->name('site.booking');
route::get('thankyou/', 'ProductController@thankyou')->name('site.thankyou');*/
route::get('my-bookings/', 'ProfileController@mybookings')->name('site.mybookings');
    
Route::get('/wishlist','ProfileController@wishlist')->name('site.wishlist');
Route::get('addwistlist/{id}', 'ProfileController@addwishlist')->name('site.addwistlist');
Route::get('/deletewishlist/{id}','ProfileController@deletewishlist')->name('site.wishlist.delete');
Route::get('/profile','ProfileController@profile')->name('site.profile');
route::get('site-logout','AuthController@logout')->name('site.logout');
Route::post('/updateprofile','ProfileController@updateprofile')->name('site.updateprofile');
});
});

