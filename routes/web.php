<?php

Route::post('login', 'Auth\LoginController@login')->name('login');
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

Route::group(
    [
        'prefix' => 'admin',
        'middleware' => ['auth'],
        'namespace' => 'Admin',
    ],
    function () {
        // prefix => admin makes url admin/
        // namespace => admin makes Admin/DashboardController@index
        Route::get('dashboard', 'DashboardController@index')->name('dashboard');
        Route::put('dashboard/save/{id}', 'DashboardController@update')->name('dashboard.update');

        Route::group([
            'middleware' => ['admin'],
        ], function () {
            Route::get('settings', 'SettingController@index')->name('settings');
            Route::put('settings/save/{id}', 'SettingController@update')->name('settings.update');

            Route::get('get-users-from-branch/{id}', 'Usercontroller@getUserFromBranch')->name('getUserFromBranch');

            /*
            * Resource Full Routes
            */
            Route::resource('designation', 'DesignationController');
            Route::resource('fiscalyear', 'FiscalyearController');
            Route::resource('service', 'ServiceController');
            Route::resource('users', 'Usercontroller');
            Route::resource('branch', 'BrachController');
            Route::resource('daartachalani', 'DaartaChalaniController');
        });
    }
);

Route::group([
    'namespace' => 'Front'
], function () { });
