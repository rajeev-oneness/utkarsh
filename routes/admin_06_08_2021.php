<?php

Route::group(['prefix' => 'admin'], function () {

    Route::get('login', 'Admin\LoginController@showLoginForm')->name('admin.login');
    Route::post('login', 'Admin\LoginController@login')->name('admin.login.post');
	Route::get('logout', 'Admin\LoginController@logout')->name('admin.logout');
	
	//admin password reset routes
    Route::post('/password/email','Admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
    Route::get('/password/reset','Admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::post('/password/reset','Admin\ResetPasswordController@reset');
    Route::get('/password/reset/{token}','Admin\ResetPasswordController@showResetForm')->name('admin.password.reset');

	Route::get('/register', 'Admin\RegisterController@showRegistrationForm')->name('admin.register')->middleware('hasInvitation');
	Route::post('/register', 'Admin\RegisterController@register')->name('admin.register.post');

    Route::group(['middleware' => ['auth:admin']], function () {

    	Route::get('/dashboard', 'Admin\LoginController@index')->name('admin.dashboard');

	    // Route::get('/', function () {
	    //     return view('admin.dashboard.index');
	    // })->name('admin.dashboard');

		Route::get('/invite_list', 'Admin\InvitationController@index')->name('admin.invite');
	    Route::get('/invitation', 'Admin\InvitationController@create')->name('admin.invite.create');
		Route::post('/invitation', 'Admin\InvitationController@store')->name('admin.invitation.store');
		Route::get('/adminuser', 'Admin\AdminUserController@index')->name('admin.adminuser');
		Route::post('/adminuser', 'Admin\AdminUserController@updateAdminUser')->name('admin.adminuser.update');
	    Route::get('/settings', 'Admin\SettingController@index')->name('admin.settings');
		Route::post('/settings', 'Admin\SettingController@update')->name('admin.settings.update');
		
		Route::get('/profile', 'Admin\ProfileController@index')->name('admin.profile');
		Route::post('/profile', 'Admin\ProfileController@update')->name('admin.profile.update');
		Route::post('/changepassword', 'Admin\ProfileController@changePassword')->name('admin.profile.changepassword');

		Route::group(['prefix'  =>   'categories'], function() {
			Route::get('/', 'Admin\CategoryController@index')->name('admin.categories.index');
			Route::get('/create', 'Admin\CategoryController@create')->name('admin.categories.create');
			Route::post('/store', 'Admin\CategoryController@store')->name('admin.categories.store');
			Route::get('/{id}/edit', 'Admin\CategoryController@edit')->name('admin.categories.edit');
			Route::post('/update', 'Admin\CategoryController@update')->name('admin.categories.update');
			Route::get('/{id}/delete', 'Admin\CategoryController@delete')->name('admin.categories.delete');
			Route::post('updateStatus', 'Admin\CategoryController@updateStatus')->name('admin.categories.updateStatus');
		});
		
		Route::group(['prefix'  => 'size'], function() {
			Route::get('/', 'Admin\SizeController@index')->name('admin.size.index');
			Route::get('/create', 'Admin\SizeController@create')->name('admin.size.create');
			Route::post('/store', 'Admin\SizeController@store')->name('admin.size.store');
			Route::get('/{id}/edit', 'Admin\SizeController@edit')->name('admin.size.edit');
			Route::post('/update', 'Admin\SizeController@update')->name('admin.size.update');
			Route::get('/{id}/delete', 'Admin\SizeController@delete')->name('admin.size.delete');
			Route::post('updateStatus', 'Admin\SizeController@updateStatus')->name('admin.size.updateStatus');
		});
		
		Route::group(['prefix'  => 'productstock'], function() {
			Route::get('/', 'Admin\ProductStockController@index')->name('admin.productstock.index');
			Route::get('/create', 'Admin\ProductStockController@create')->name('admin.productstock.create');
			Route::post('/store', 'Admin\ProductStockController@store')->name('admin.productstock.store');
			Route::get('/{id}/edit', 'Admin\ProductStockController@edit')->name('admin.productstock.edit');
			Route::post('/update', 'Admin\ProductStockController@update')->name('admin.productstock.update');
			Route::get('/{id}/delete', 'Admin\ProductStockController@delete')->name('admin.productstock.delete');
			Route::get('/sizes/{id}', 'Admin\ProductStockController@sizes')->name('admin.productstock.delete');
		});
		
		Route::group(['prefix'  => 'shippingcharge'], function() {
			Route::get('/', 'Admin\ShippingChargeController@index')->name('admin.shippingcharge.index');
			Route::get('/create', 'Admin\ShippingChargeController@create')->name('admin.shippingcharge.create');
			Route::post('/store', 'Admin\ShippingChargeController@store')->name('admin.shippingcharge.store');
			Route::get('/{id}/edit', 'Admin\ShippingChargeController@edit')->name('admin.shippingcharge.edit');
			Route::post('/update', 'Admin\ShippingChargeController@update')->name('admin.shippingcharge.update');
			Route::get('/{id}/delete', 'Admin\ShippingChargeController@delete')->name('admin.shippingcharge.delete');
			Route::post('updateStatus', 'Admin\ShippingChargeController@updateStatus')->name('admin.shippingcharge.updateStatus');
		});

		Route::group(['prefix'  =>   'level1'], function() {
			Route::get('/', 'Admin\Level1Controller@index')->name('admin.level1.index');
			Route::get('/create', 'Admin\Level1Controller@create')->name('admin.level1.create');
			Route::post('/store', 'Admin\Level1Controller@store')->name('admin.level1.store');
			Route::get('/{id}/edit', 'Admin\Level1Controller@edit')->name('admin.level1.edit');
			Route::post('/update', 'Admin\Level1Controller@update')->name('admin.level1.update');
			Route::get('/{id}/delete', 'Admin\Level1Controller@delete')->name('admin.level1.delete');
			Route::post('updateStatus', 'Admin\Level1Controller@updateStatus')->name('admin.level1.updateStatus');
		});

		Route::group(['prefix'  =>   'level2'], function() {
			Route::get('/', 'Admin\Level2Controller@index')->name('admin.level2.index');
			Route::get('/create', 'Admin\Level2Controller@create')->name('admin.level2.create');
			Route::post('/store', 'Admin\Level2Controller@store')->name('admin.level2.store');
			Route::get('/{id}/edit', 'Admin\Level2Controller@edit')->name('admin.level2.edit');
			Route::post('/update', 'Admin\Level2Controller@update')->name('admin.level2.update');
			Route::get('/{id}/delete', 'Admin\Level2Controller@delete')->name('admin.level2.delete');
			Route::post('updateStatus', 'Admin\Level2Controller@updateStatus')->name('admin.level2.updateStatus');
		});

		Route::group(['prefix'  =>   'level3'], function() {
			Route::get('/', 'Admin\Level3Controller@index')->name('admin.level3.index');
			Route::get('/create', 'Admin\Level3Controller@create')->name('admin.level3.create');
			Route::post('/store', 'Admin\Level3Controller@store')->name('admin.level3.store');
			Route::get('/{id}/edit', 'Admin\Level3Controller@edit')->name('admin.level3.edit');
			Route::post('/update', 'Admin\Level3Controller@update')->name('admin.level3.update');
			Route::get('/{id}/delete', 'Admin\Level3Controller@delete')->name('admin.level3.delete');
			Route::post('updateStatus', 'Admin\Level3Controller@updateStatus')->name('admin.level3.updateStatus');
		});

		Route::group(['prefix'  =>   'level4'], function() {
			Route::get('/', 'Admin\Level4Controller@index')->name('admin.level4.index');
			Route::get('/create', 'Admin\Level4Controller@create')->name('admin.level4.create');
			Route::post('/store', 'Admin\Level4Controller@store')->name('admin.level4.store');
			Route::get('/{id}/edit', 'Admin\Level4Controller@edit')->name('admin.level4.edit');
			Route::post('/update', 'Admin\Level4Controller@update')->name('admin.level4.update');
			Route::get('/{id}/delete', 'Admin\Level4Controller@delete')->name('admin.level4.delete');
			Route::post('updateStatus', 'Admin\Level4Controller@updateStatus')->name('admin.level4.updateStatus');
		});

		Route::group(['prefix'  =>   'level5'], function() {
			Route::get('/', 'Admin\Level5Controller@index')->name('admin.level5.index');
			Route::get('/create', 'Admin\Level5Controller@create')->name('admin.level5.create');
			Route::post('/store', 'Admin\Level5Controller@store')->name('admin.level5.store');
			Route::get('/{id}/edit', 'Admin\Level5Controller@edit')->name('admin.level5.edit');
			Route::post('/update', 'Admin\Level5Controller@update')->name('admin.level5.update');
			Route::get('/{id}/delete', 'Admin\Level5Controller@delete')->name('admin.level5.delete');
			Route::post('updateStatus', 'Admin\Level5Controller@updateStatus')->name('admin.level5.updateStatus');
		});

		Route::group(['prefix'  =>   'products'], function() {
			Route::get('/', 'Admin\ProductsController@index')->name('admin.products.index');
			Route::get('/create', 'Admin\ProductsController@create')->name('admin.products.create');
			Route::post('/store', 'Admin\ProductsController@store')->name('admin.products.store');
			Route::get('/{id}/edit', 'Admin\ProductsController@edit')->name('admin.products.edit');
			Route::post('/update', 'Admin\ProductsController@update')->name('admin.products.update');
			Route::get('/{id}/view', 'Admin\ProductsController@viewDetail')->name('admin.products.detail');
			
			Route::get('/sizes/{id}', 'Admin\ProductsController@sizes')->name('admin.products.categorywisesize');

			Route::get('/{id}/delete', 'Admin\ProductsController@delete')->name('admin.products.delete');
			Route::post('updateStatus', 'Admin\ProductsController@updateStatus')->name('admin.products.updateStatus');
			Route::get('/{id}/{idd}/bestseller', 'Admin\ProductsController@bestseller')->name('admin.products.bestseller');

			Route::get('/{id}/{idd}/todaydeal', 'Admin\ProductsController@todaydeal')->name('admin.products.todaydeal');

			Route::get('/{id}/{idd}/newarrival', 'Admin\ProductsController@newarrival')->name('admin.products.newarrival');

			Route::get('/{id}/{idd}/preorder', 'Admin\ProductsController@preorder')->name('admin.products.preorder');

			Route::get('/{id}/{idd}/stock', 'Admin\ProductsController@stock')->name('admin.products.stock');
			
			Route::get('/{id}/addsize', 'Admin\ProductsController@addsize')->name('admin.products.addsize');
			Route::post('/addsize', 'Admin\ProductsController@addsizestore')->name('admin.products.addsizestore');
			
			Route::get('/{id}/editsize', 'Admin\ProductsController@sizeedit')->name('admin.products.editsize');
			Route::post('/updatesize', 'Admin\ProductsController@updatesize')->name('admin.products.updatesize');

			Route::get('/sizelist/{id}', 'Admin\ProductsController@sizelist')->name('admin.products.sizelist');
			
			Route::get('/sizeDelete/{id}', 'Admin\ProductsController@sizeDelete')->name('admin.products.sizeDelete');
		});
		Route::group(['prefix'  =>   'brands'], function() {
			Route::get('/', 'Admin\BrandController@index')->name('admin.brand.index');
			Route::get('/create', 'Admin\BrandController@create')->name('admin.brand.create');
			Route::post('/store', 'Admin\BrandController@store')->name('admin.brand.store');
			Route::get('/{id}/edit', 'Admin\BrandController@edit')->name('admin.brand.edit');
			Route::post('/update', 'Admin\BrandController@update')->name('admin.brand.update');
			Route::get('/{id}/delete', 'Admin\BrandController@delete')->name('admin.brand.delete');
			Route::post('updateStatus', 'Admin\BrandController@updateStatus')->name('admin.brand.updateStatus');
		});
		Route::group(['prefix'  =>   'testimonial'], function() {
			Route::get('/', 'Admin\TestimonialController@index')->name('admin.testimonial.index');
			Route::get('/create', 'Admin\TestimonialController@create')->name('admin.testimonial.create');
			Route::post('/store', 'Admin\TestimonialController@store')->name('admin.testimonial.store');
			Route::get('/{id}/edit', 'Admin\TestimonialController@edit')->name('admin.testimonial.edit');
			Route::post('/update', 'Admin\TestimonialController@update')->name('admin.testimonial.update');
			Route::get('/{id}/delete', 'Admin\TestimonialController@delete')->name('admin.testimonial.delete');
			Route::post('updateStatus', 'Admin\TestimonialController@updateStatus')->name('admin.testimonial.updateStatus');
		});
		Route::group(['prefix'  =>   'blog'], function() {
			Route::get('/', 'Admin\BlogController@index')->name('admin.blog.index');
			Route::get('/create', 'Admin\BlogController@create')->name('admin.blog.create');
			Route::post('/store', 'Admin\BlogController@store')->name('admin.blog.store');
			Route::get('/{id}/edit', 'Admin\BlogController@edit')->name('admin.blog.edit');
			Route::post('/update', 'Admin\BlogController@update')->name('admin.blog.update');
			Route::get('/{id}/delete', 'Admin\BlogController@delete')->name('admin.blog.delete');
			Route::post('updateStatus', 'Admin\BlogController@updateStatus')->name('admin.blog.updateStatus');
		});
		Route::group(['prefix'  =>   'banner'], function() {
			Route::get('/', 'Admin\BannerController@index')->name('admin.banner.index');
			Route::get('/create', 'Admin\BannerController@create')->name('admin.banner.create');
			Route::post('/store', 'Admin\BannerController@store')->name('admin.banner.store');
			Route::get('/{id}/edit', 'Admin\BannerController@edit')->name('admin.banner.edit');
			Route::post('/update', 'Admin\BannerController@update')->name('admin.banner.update');
			Route::get('/{id}/delete', 'Admin\BannerController@delete')->name('admin.banner.delete');
			Route::post('updateStatus', 'Admin\BannerController@updateStatus')->name('admin.banner.updateStatus');
		});
		Route::group(['prefix'  => 'couriers'], function() {
			Route::get('/', 'Admin\CourierController@index')->name('admin.couriers.index');
			Route::get('/create', 'Admin\CourierController@create')->name('admin.couriers.create');
			Route::post('/store', 'Admin\CourierController@store')->name('admin.couriers.store');
			Route::get('/{id}/edit', 'Admin\CourierController@edit')->name('admin.couriers.edit');
			Route::post('/update', 'Admin\CourierController@update')->name('admin.couriers.update');
			Route::get('/{id}/delete', 'Admin\CourierController@delete')->name('admin.couriers.delete');
			Route::post('updateStatus', 'Admin\CourierController@updateStatus')->name('admin.couriers.updateStatus');
		});

		Route::group(['prefix'  => 'couponcodes'], function() {
			Route::get('/', 'Admin\CouponCodeController@index')->name('admin.couponcode.index');
			Route::get('/create', 'Admin\CouponCodeController@create')->name('admin.couponcode.create');
			Route::post('/store', 'Admin\CouponCodeController@store')->name('admin.couponcode.store');
			Route::get('/{id}/edit', 'Admin\CouponCodeController@edit')->name('admin.couponcode.edit');
			Route::post('/update', 'Admin\CouponCodeController@update')->name('admin.couponcode.update');
			Route::get('/{id}/delete', 'Admin\CouponCodeController@delete')->name('admin.couponcode.delete');
			Route::post('updateStatus', 'Admin\CouponCodeController@updateStatus')->name('admin.couponcode.updateStatus');
		});
		Route::group(['prefix'  =>   'show'], function() {
			Route::get('/', 'Admin\ShowController@index')->name('admin.show.index');
			Route::get('/create', 'Admin\ShowController@create')->name('admin.show.create');
			Route::post('/store', 'Admin\ShowController@store')->name('admin.show.store');
			Route::get('/{id}/edit', 'Admin\ShowController@edit')->name('admin.show.edit');
			Route::post('/update', 'Admin\ShowController@update')->name('admin.show.update');
			Route::get('/{id}/delete', 'Admin\ShowController@delete')->name('admin.show.delete');
			Route::post('updateStatus', 'Admin\ShowController@updateStatus')->name('admin.show.updateStatus');
			Route::get('/pay-per-click-subscriptions', 'Admin\ShowController@getPayPerClickSubscriptions')->name('admin.show.getPayPerClickSubscriptions');
			Route::get('/transaction-list', 'Admin\ShowController@getTransactionsData')->name('admin.show.getTransactionsData');
		});

		
		Route::group(['prefix'  =>   'users'], function() {
			Route::get('/', 'Admin\UserManagementController@index')->name('admin.users.index');
			Route::get('/create', 'Admin\UserManagementController@create')->name('admin.users.create');
			Route::post('/store', 'Admin\UserManagementController@store')->name('admin.users.store');
			Route::get('/{id}/edit', 'Admin\UserManagementController@edit')->name('admin.users.edit');
			Route::post('/update', 'Admin\UserManagementController@update')->name('admin.users.update');
			Route::get('/{id}/delete', 'Admin\UserManagementController@delete')->name('admin.users.delete');
			Route::get('/{id}/view', 'Admin\UserManagementController@viewDetail')->name('admin.users.detail');
			Route::post('updateStatus', 'Admin\UserManagementController@updateStatus')->name('admin.users.updateStatus');
		});
		
		Route::group(['prefix'  =>   'packages'], function() {
			Route::get('/', 'Admin\PackageController@index')->name('admin.packages.index');
			Route::get('/create', 'Admin\PackageController@create')->name('admin.packages.create');
			Route::post('/store', 'Admin\PackageController@store')->name('admin.packages.store');
			Route::get('/{id}/edit', 'Admin\PackageController@edit')->name('admin.packages.edit');
			Route::post('/update', 'Admin\PackageController@update')->name('admin.packages.update');
			Route::get('/{id}/delete', 'Admin\PackageController@delete')->name('admin.packages.delete');
			Route::post('/updateStatus', 'Admin\PackageController@updateStatus')->name('admin.packages.updateStatus');
			Route::get('/all-subscriptions', 'Admin\PackageController@getSubscriptions')->name('admin.packages.getSubscriptions');
		});

		Route::group(['prefix'  =>   'orders'], function() {
			Route::get('/', 'Admin\OrderController@index')->name('admin.orders.index');
			Route::get('/{id}/view', 'Admin\OrderController@viewDetail')->name('admin.orders.detail');
			Route::get('/{id}/delete', 'Admin\OrderController@delete')->name('admin.orders.delete');
			Route::post('/updatecourier/{id}', 'Admin\OrderController@updatecourier')->name('admin.orders.updatecourier');
			Route::get('/{id}/invoice', 'Admin\OrderController@invoice')->name('admin.orders.invoice');
		});
	});

});
?>