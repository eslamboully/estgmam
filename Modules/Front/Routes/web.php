<?php

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

Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']], function () {

//Route::prefix('front')->group(function() {
//<<<<<<< HEAD
//=======
//	Route::get('/', 'FrontController@index')->name('front_index');
//	Route::get('/login', 'FrontController@login_get')->name('user.login');
//	Route::post('/login', 'FrontController@login_post')->name('user.login.post');
//
//	Route::get('/forgot/password', 'FrontController@forgot_password')->name('forgot_password');
//
//	Route::post('/forgot/password', 'FrontController@do_forgot_password')->name('forgot_password');
//
//	Route::get('/reset/password/{token}', 'FrontController@reset_password')->name('reset_password');
//
//	Route::post('/reset/password/{token}', 'FrontController@do_reset_password')->name('reset_password');
//
//	Route::middleware('guest')->group(function () {
//		Route::get('/create/post', 'FrontController@createOfPost')->name('create_front_post');
//		Route::get('/create/trip', 'FrontController@createOfTrip')->name('create_front_trip');
//		Route::get('/profile', 'FrontController@profile')->name('profile');
//		Route::get('/my/offers', 'FrontController@myOffers')->name('my_offers_trip');
//		Route::get('/my/trips/{id}', 'FrontController@myTrip')->name('my_trips_trip');
//		Route::put('/my/trips/{id}', 'FrontController@updateMyTrips')->name('my_trips_update');
//		Route::get('/my/info', 'FrontController@showMyInfo')->name('my_info');
//		Route::post('/my/info', 'FrontController@editMyInfo')->name('my_info_post');
//		Route::get('/my/language', 'FrontController@myLanguage')->name('my_language');
//	});
//	Route::get('/all/categories', 'FrontController@allcats')->name('all_cats');
//	Route::get('/category/{id}', 'FrontController@singleCat')->name('single_cat_khot');
//	Route::get('/trip/{title}', 'FrontController@single_trip')->name('single_trip');
//	Route::get('personal/{id}', 'FrontController@personal_page')->name('personal_page');
//>>>>>>> 6bc4d40d192900f65a98f86d0cd10f7bcb2ee9a5

    Route::get('/', 'FrontController@index')->name('front_index');
    Route::get('/login','FrontController@login_get')->name('user.login');
    Route::post('/login','FrontController@login_post')->name('user.login.post');
    	Route::get('/forgot/password', 'FrontController@forgot_password')->name('forgot_password');

	Route::post('/forgot/password', 'FrontController@do_forgot_password')->name('forgot_password');

	Route::get('/reset/password/{token}', 'FrontController@reset_password')->name('reset_password');

	Route::post('/reset/password/{token}', 'FrontController@do_reset_password')->name('reset_password');
    Route::middleware('guest')->group(function (){
        Route::get('/create/post','FrontController@createOfPost')->name('create_front_post');
        Route::get('/create/trip','FrontController@createOfTrip')->name('create_front_trip');
        Route::get('/profile','FrontController@profile')->name('profile');
        Route::get('/my/offers','FrontController@myOffers')->name('my_offers_trip');
        Route::get('/my/trips/{id}','FrontController@myTrip')->name('my_trips_trip');
        Route::put('/my/trips/{id}','FrontController@updateMyTrips')->name('my_trips_update');
        Route::get('/my/info','FrontController@showMyInfo')->name('my_info');
        Route::post('/my/info','FrontController@editMyInfo')->name('my_info_post');
        Route::get('/my/language','FrontController@myLanguage')->name('my_language');
        Route::get('/personal/{id}','FrontController@personal_page')->name('personal_page');
        Route::get('/user/logout','FrontController@logout')->name('user_logout');
        Route::post('/create/photo','FrontController@create_photo')->name('create_photo');
        Route::get('/my/gallery','FrontController@gallery')->name('gallery');
        Route::get('/add/video','FrontController@view_video')->name('view_video');
        Route::post('/add/video','FrontController@create_video')->name('create_video');
        Route::post('/add/comment','FrontController@add_comment')->name('add_comment');
        Route::get('add/ads','FrontController@add_ads')->name('add_ads');
        Route::get('edit/ads/{id}','FrontController@edit_ads')->name('edit_ads');
        Route::put('edit/ads/{id}','FrontController@update_ads')->name('update_ads_post');
        Route::post('add/ads','FrontController@add_ads_post')->name('add_ads_post');
        Route::get('show/my/ads','FrontController@show_ads')->name('show_ads');
    });
        Route::get('/all/categories','FrontController@allcats')->name('all_cats');
        Route::get('/show/ads/{id}','FrontController@show_ads_gettto')->name('show_ads_gettto');
        Route::get('/show/new/ad/{id}','FrontController@final_show_ad')->name('final_show_ad');
        Route::get('/category/{id}','FrontController@singleCat')->name('single_cat_khot');
        Route::get('/trip/{title}','FrontController@single_trip')->name('single_trip');
        Route::get('/register/user','FrontController@register')->name('user_register');
        Route::post('/register/user','FrontController@register_post')->name('user.register.post');
        Route::get('personal/{id}', 'FrontController@personal_page')->name('personal_page');
        Route::post('/follow-user/{id}', 'FrontController@followUser')->name('follow_user');
        Route::post('/remove-follow/{id}', 'FrontController@removeFollow')->name('remove_follow');
        Route::get('/all/our/gallery','FrontController@all_gallery')->name('all_gallery');
        Route::get('/all/video','FrontController@all_video')->name('all_video');
        Route::get('/commission','FrontController@commission')->name('commission');
        Route::get('/install/advertising','FrontController@install_advertising')->name('install_advertising');
        Route::get('/laws','FrontController@laws')->name('laws');
        Route::get('/why/banned','FrontController@why_banned')->name('why_banned');
        Route::get('/what/i/do','FrontController@what_i_do')->name('what_i_do');
        Route::get('/contact', 'FrontController@contact')->name('contact');
        Route::post('/contact', 'FrontController@contact_post')->name('contact_post');

    //    Route::get('/good',function (\Illuminate\Support\Facades\Request $request){
	//        dd($request->all());
	//    });
});
