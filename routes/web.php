<?php

Auth::routes();

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

    // Audit Logs
    Route::resource('audit-logs', 'AuditLogsController', ['except' => ['create', 'store', 'edit', 'update', 'destroy']]);

    // User Alerts
    Route::delete('user-alerts/destroy', 'UserAlertsController@massDestroy')->name('user-alerts.massDestroy');
    Route::get('user-alerts/read', 'UserAlertsController@read');
    Route::resource('user-alerts', 'UserAlertsController', ['except' => ['edit', 'update']]);

    // Content Category
    Route::delete('content-categories/destroy', 'ContentCategoryController@massDestroy')->name('content-categories.massDestroy');
    Route::resource('content-categories', 'ContentCategoryController');

    // Content Tag
    Route::delete('content-tags/destroy', 'ContentTagController@massDestroy')->name('content-tags.massDestroy');
    Route::resource('content-tags', 'ContentTagController');

    // Content Page
    Route::delete('content-pages/destroy', 'ContentPageController@massDestroy')->name('content-pages.massDestroy');
    Route::post('content-pages/media', 'ContentPageController@storeMedia')->name('content-pages.storeMedia');
    Route::post('content-pages/ckmedia', 'ContentPageController@storeCKEditorImages')->name('content-pages.storeCKEditorImages');
    Route::resource('content-pages', 'ContentPageController');

    // Posts
    Route::delete('posts/destroy', 'PostsController@massDestroy')->name('posts.massDestroy');
    Route::post('posts/media', 'PostsController@storeMedia')->name('posts.storeMedia');
    Route::post('posts/ckmedia', 'PostsController@storeCKEditorImages')->name('posts.storeCKEditorImages');
    Route::post('posts/parse-csv-import', 'PostsController@parseCsvImport')->name('posts.parseCsvImport');
    Route::post('posts/process-csv-import', 'PostsController@processCsvImport')->name('posts.processCsvImport');
    Route::resource('posts', 'PostsController');

    // Staff
    Route::delete('staff/destroy', 'StaffController@massDestroy')->name('staff.massDestroy');
    Route::post('staff/media', 'StaffController@storeMedia')->name('staff.storeMedia');
    Route::post('staff/ckmedia', 'StaffController@storeCKEditorImages')->name('staff.storeCKEditorImages');
    Route::post('staff/parse-csv-import', 'StaffController@parseCsvImport')->name('staff.parseCsvImport');
    Route::post('staff/process-csv-import', 'StaffController@processCsvImport')->name('staff.processCsvImport');
    Route::resource('staff', 'StaffController');

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

// Frontend 

Route::get('/', 'Frontend\HomeController@index')->name('home');
Route::get('update-and-news',"Frontend\PostsController@index")->name('posts.index');
Route::get('update-and-news/{post}',"Frontend\PostsController@show")->name('posts.show');
Route::view('staff', 'frontend.pages.staff')->name('frontend.pages.staff');
Route::view('about', 'frontend.pages.about')->name('frontend.pages.about');
Route::view('contact', 'frontend.pages.contact')->name('frontend.pages.contact');
Route::view('privacy-policy', 'frontend.pages.privacy')->name('frontend.pages.privacy');
Route::view('store-terms', 'frontend.pages.store-terms')->name('frontend.pages.store-terms');




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
Route::group(['as' => 'frontend.', 'namespace' => 'Frontend', 'middleware' => ['auth', '2fa']], function () {
    Route::get('profile', 'ProfileController@index')->name('profile.index');
    Route::post('frontend/profile', 'ProfileController@update')->name('profile.update');
    Route::post('frontend/profile/destroy', 'ProfileController@destroy')->name('profile.destroy');
    Route::post('frontend/profile/password', 'ProfileController@password')->name('profile.password');
    Route::post('profile/toggle-two-factor', 'ProfileController@toggleTwoFactor')->name('profile.toggle-two-factor');

    Route::view('player', 'frontend.playerStats')->name('player.stats');


    Route::get('tickets', 'TicketController@index')->name('tickets.index');
    Route::get('tickets/create', 'TicketController@createTicket')->name('tickets.createTicket');
    Route::post('tickets', 'TicketController@storeTicket')->name('tickets.storeTicket');
    Route::get('tickets/open', 'TicketController@showOpen')->name('tickets.showOpen');
    Route::get('tickets/closed', 'TicketController@showClosed')->name('tickets.showClosed');
    Route::get('tickets/{ticket}', 'TicketController@showMessages')->name('tickets.showMessages');
    // Route::delete('tickets/{ticket}', 'TicketController@destroyTicket')->name('tickets.destroyTicket');
    Route::post('tickets/{ticket}/reply', 'TicketController@replyToTicket')->name('tickets.reply');
    Route::post('tickets/{ticket}/open', 'TicketController@openTicket')->name('ticket.open');
    Route::post('tickets/{ticket}/close', 'TicketController@closeTicket')->name('ticket.close');
});
Route::group(['namespace' => 'Auth', 'middleware' => ['auth', '2fa']], function () {
    // Two Factor Authentication
    if (file_exists(app_path('Http/Controllers/Auth/TwoFactorController.php'))) {
        Route::get('two-factor', 'TwoFactorController@show')->name('twoFactor.show');
        Route::post('two-factor', 'TwoFactorController@check')->name('twoFactor.check');
        Route::get('two-factor/resend', 'TwoFactorController@resend')->name('twoFactor.resend');
    }
});
