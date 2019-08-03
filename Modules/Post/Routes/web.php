<?php

Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']], function () {

    Route::group(['prefix' => 'admin', 'middleware' => ['admin:admin']], function () {

        Route::resource('posts', 'PostsController');

		Route::delete('/post/delete-album', 'PostAlbumsController@destroy')->name('delete-album-post');
		Route::resource('posts.post-albums', 'PostAlbumsController');
		Route::post('/ajax/post/edit','PostsController@ajax_edit')->name('ajax_edit');

		Route::resource('plans','PlansController');
    });

});
