<?php



Route::prefix('v1')->group(function () {
    Route::get('users',  'Api\UserController@index');
    Route::put('updateSubscription/{user}',  'Api\UserController@updateSubscription');
});


