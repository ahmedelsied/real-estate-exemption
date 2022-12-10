<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'core', 'as' => 'core.', 'namespace' => 'Core'], function () {
    Route::get('real-estates/search', 'RealEstateController@search')->name('real-estates.search');
    Route::resource('real-estates', 'RealEstateController');
    Route::resource('tax-exemptions', 'TaxExemptionController');
    Route::resource('duplicate-exemptions', 'DuplicateExemptionController');
    Route::resource('sides', 'SideController');
});
