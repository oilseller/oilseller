<?php

use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => 'admin',
    'middleware' => config('oilseller.middleware.admin', 'web'),
], function () {
    Route::get('/', 'HomeController@index')->name('oilseller.home.index');
});
