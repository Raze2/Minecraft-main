<?php

Route::view('pay', 'frontend.store.pay');


// Frontend 

Route::get('player/search', 'Frontend\ProfileController@searchIGN')->name('player.IGN');
Route::get('/login', 'Frontend\LoginController@login')->name('frontend.login');
Route::post('/login', 'Frontend\LoginController@doLogin')->name('frontend.login');
Route::post('/logout', 'LoginController@logout')->name('frontend.logout'); 
Route::get('/', 'Frontend\HomeController@index')->name('home');
Route::get('update-and-news',"Frontend\PostsController@index")->name('posts.index');
Route::get('update-and-news/{post}',"Frontend\PostsController@show")->name('posts.show');

Route::get('store/{cat}', 'Frontend\ProductController@index')->name('frontend.store.index');
Route::get('our-games', 'Frontend\GameController@index')->name('frontend.pages.games');

Route::view('staff', 'frontend.pages.staff')->name('frontend.pages.staff');
Route::view('about', 'frontend.pages.about')->name('frontend.pages.about');
Route::view('contact', 'frontend.pages.contact')->name('frontend.pages.contact');
Route::view('privacy-policy', 'frontend.pages.privacy')->name('frontend.pages.privacy');
Route::view('store-terms', 'frontend.pages.store-terms')->name('frontend.pages.store-terms');
Route::view('general-terms', 'frontend.pages.general-terms')->name('frontend.pages.general-terms');
Route::view('rules', 'frontend.pages.rules')->name('frontend.pages.rules');
Route::view('reports', 'frontend.pages.reports')->name('frontend.pages.reports');
Route::view('youtuber-apply', 'frontend.pages.youtuber-apply')->name('frontend.pages.youtuber-apply');


Route::group(['as' => 'frontend.', 'namespace' => 'Frontend', 'middleware' => ['auth', '2fa']], function () {
    Route::get('player', 'ProfileController@getStats')->name('player.stats');
    Route::view('orders', 'frontend.orders')->name('orders');

    Route::get('tickets', 'TicketController@index')->name('tickets.index');
    Route::get('tickets/create', 'TicketController@createTicket')->name('tickets.createTicket');
    Route::post('tickets', 'TicketController@storeTicket')->name('tickets.storeTicket');
    Route::get('tickets/open', 'TicketController@showOpen')->name('tickets.showOpen');
    Route::get('tickets/closed', 'TicketController@showClosed')->name('tickets.showClosed');
    Route::get('tickets/{ticket}', 'TicketController@showMessages')->name('tickets.showMessages');
    Route::post('tickets/{ticket}/reply', 'TicketController@replyToTicket')->name('tickets.reply');
    Route::post('tickets/{ticket}/open', 'TicketController@openTicket')->name('ticket.open');
    Route::post('tickets/{ticket}/close', 'TicketController@closeTicket')->name('ticket.close');

    Route::get('store/pay/{product}', 'ProductController@pay')->name('store.pay');
    Route::post('paypal/order/create',[\App\Http\Controllers\PaypalPaymentController::class,'create']);
    Route::post('paypal/order/capture/',[\App\Http\Controllers\PaypalPaymentController::class,'capture']);   
    Route::post('/order/check-coupon',[\App\Http\Controllers\Frontend\ProductController::class,'checkCoupon']);
    
    
});

// Admin

Route::group(['prefix' => 'admin'], function (){
    Auth::routes(['register' => false]);
});

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth', '2fa', 'admin']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::post('users/parse-csv-import', 'UsersController@parseCsvImport')->name('users.parseCsvImport');
    Route::post('users/process-csv-import', 'UsersController@processCsvImport')->name('users.processCsvImport');
    Route::resource('users', 'UsersController');

    // Posts
    Route::delete('posts/destroy', 'PostsController@massDestroy')->name('posts.massDestroy');
    Route::post('posts/media', 'PostsController@storeMedia')->name('posts.storeMedia');
    Route::post('posts/ckmedia', 'PostsController@storeCKEditorImages')->name('posts.storeCKEditorImages');
    Route::post('posts/parse-csv-import', 'PostsController@parseCsvImport')->name('posts.parseCsvImport');
    Route::post('posts/process-csv-import', 'PostsController@processCsvImport')->name('posts.processCsvImport');
    Route::resource('posts', 'PostsController');

    // Game
    Route::delete('games/destroy', 'GameController@massDestroy')->name('games.massDestroy');
    Route::post('games/media', 'GameController@storeMedia')->name('games.storeMedia');
    Route::post('games/ckmedia', 'GameController@storeCKEditorImages')->name('games.storeCKEditorImages');
    Route::post('games/parse-csv-import', 'GameController@parseCsvImport')->name('games.parseCsvImport');
    Route::post('games/process-csv-import', 'GameController@processCsvImport')->name('games.processCsvImport');
    Route::resource('games', 'GameController');

    // Content Page
    Route::delete('content-pages/destroy', 'ContentPageController@massDestroy')->name('content-pages.massDestroy');
    Route::post('content-pages/media', 'ContentPageController@storeMedia')->name('content-pages.storeMedia');
    Route::post('content-pages/ckmedia', 'ContentPageController@storeCKEditorImages')->name('content-pages.storeCKEditorImages');
    Route::resource('content-pages', 'ContentPageController');

    // Product
    Route::delete('products/destroy', 'ProductController@massDestroy')->name('products.massDestroy');
    Route::post('products/media', 'ProductController@storeMedia')->name('products.storeMedia');
    Route::post('products/ckmedia', 'ProductController@storeCKEditorImages')->name('products.storeCKEditorImages');
    Route::resource('products', 'ProductController');

    // Coupons
    Route::delete('coupons/destroy', 'CouponsController@massDestroy')->name('coupons.massDestroy');
    Route::post('coupons/parse-csv-import', 'CouponsController@parseCsvImport')->name('coupons.parseCsvImport');
    Route::post('coupons/process-csv-import', 'CouponsController@processCsvImport')->name('coupons.processCsvImport');
    Route::resource('coupons', 'CouponsController');

    Route::resource('orders', 'OrderController', ['except' => ['edit', 'update', 'destroy']]);

    Route::get('global-search', 'GlobalSearchController@search')->name('globalSearch');
    Route::get('tickets', 'TicketController@index')->name('tickets.index');
    Route::get('tickets/create', 'TicketController@createTicket')->name('tickets.createTicket');
    Route::post('tickets', 'TicketController@storeTicket')->name('tickets.storeTicket');
    Route::get('tickets/open', 'TicketController@showOpenAssigned')->name('tickets.showOpen');
    Route::get('tickets/closed', 'TicketController@showClosedAssigned')->name('tickets.showClosed');
    Route::get('tickets/{ticket}', 'TicketController@showMessages')->name('tickets.showMessages');
    Route::delete('tickets/{ticket}', 'TicketController@destroyTicket')->name('tickets.destroyTicket');
    Route::post('tickets/{ticket}/reply', 'TicketController@replyToTicket')->name('tickets.reply');
    Route::get('tickets/{ticket}/reply', 'TicketController@showReply')->name('tickets.showReply');
    Route::post('tickets/{ticket}/open', 'TicketController@openTicket')->name('ticket.open');
    Route::post('tickets/{ticket}/close', 'TicketController@closeTicket')->name('ticket.close');
    Route::post('tickets/{ticket}/permanently-close', 'TicketController@permanentlyCloseTicket')->name('ticket.permanently');


});

Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth', '2fa']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
        Route::post('profile/two-factor', 'ChangePasswordController@toggleTwoFactor')->name('password.toggleTwoFactor');
    }
});
Route::group(['namespace' => 'Auth', 'middleware' => ['auth', '2fa']], function () {
    // Two Factor Authentication
    if (file_exists(app_path('Http/Controllers/Auth/TwoFactorController.php'))) {
        Route::get('two-factor', 'TwoFactorController@show')->name('twoFactor.show');
        Route::post('two-factor', 'TwoFactorController@check')->name('twoFactor.check');
        Route::get('two-factor/resend', 'TwoFactorController@resend')->name('twoFactor.resend');
    }
});
