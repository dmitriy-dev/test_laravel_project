<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/', 'RandomPrizeController@index')->name('home');
    Route::get('getRandomPrize', 'RandomPrizeController@getRandomPrize')->name('getRandomPrize');
    Route::post('prizeAction/{prize}', 'RandomPrizeController@actionWithPrize')->name('prizeAction');
});
