<?php

use Xcholars\Support\Proxies\Route;

use Xcholars\Support\Proxies\RouteGroup as Group;

use Xcholars\Http\Request;

use Xcholars\Http\Response;

Route::get('/', 'HomeController@show');

Route::get('/home/{id?}', 'HomeController@show');

Route::view('/about', 'customer/about');

Route::view('/contact', 'customer/contact');

Group::middleware('auth')->members(function ()
{
    //signup
    Route::view('/signup', 'auth/signup');

    Route::post('/signup', 'SignupController@create');

    //signin
    Route::view('/signin', 'auth/signin');

    Route::post('/signin', 'LoginController@authenticate');

    //forgotPassword
    Route::view('/forgotPassword', 'auth/forgotPassword');

    Route::post('/forgotPassword', 'forgotPasswordController@verify');

    //resetCode
    Route::view('/confirmResetCode', 'auth/confirmResetCode');

    Route::post('/confirmResetCode', 'ResetPasswordController@verifyResetCode');

    //resetPassword
    Route::view('/resetPassword', 'auth/resetPassword');

    Route::post('/resetPassword', 'ResetPasswordController@reset');
});

Group::middleware('guest')->members(function ()
{
    Route::get('/profile', 'ProfileController@show');

    // sign Out
    Route::get('/logout', 'LogoutController@logout');

    Route::post('/logout', 'LogoutController@logout');

    // FOR ADMIN ONLY //
    Group::middleware('admin')->members(function ()
    {
       // users
        Route::get('/users', 'ProfileController@show');

        Route::view('/add_user', 'admin/add_user');

        Route::post('/add_user', 'ProfileController@create');

        Route::get('/edit_user/{id}', 'ProfileController@edit');

        Route::post('/update_user', 'ProfileController@update');

        Route::get('/delete_user/{id}', 'ProfileController@delete');
    });

    // FOR CHEF ONLY //
    Group::middleware('chef')->members(function ()
    {
        // Recipes
        Route::view('/add_recipe', 'chef/add_recipe');

        Route::post('/add_recipe', 'RecipeController@create');

        Route::get('/edit_recipe/{id}', 'RecipeController@edit');

        Route::post('/update_recipe', 'RecipeController@update');

        Route::get('/delete_recipe/{id}', 'RecipeController@delete');

        // categories
        Route::get('/categories', 'categoriesController@show');

        Route::view('/add_category', 'chef/add_category');

        Route::post('/add_category', 'categoriesController@create');

        Route::get('/edit_category/{id}', 'categoriesController@edit');

        Route::post('/update_category', 'categoriesController@update');

        Route::get('/delete_category/{id}', 'categoriesController@delete');

    });

    // FOR deliverer ONLY //
    Group::middleware('deliverer')->members(function ()
    {
        Route::get('/delivery_areas', 'DelivariesController@show');

        Route::view('/add_delivery_area', 'deliverer/add_delivery_area');

        Route::post('/add_delivery_area', 'DelivariesController@create');

        Route::get('/delete_delivery_area/{id}', 'DelivariesController@delete');

    });

    // FOR Customer ONLY //
    Group::middleware('customer')->members(function ()
    {
        Route::get('/cart', 'CartController@show');

        Route::post('/add_to_cart', 'CartController@create');

        Route::post('/save_cart_changes', 'CartController@save');

        Route::get('/remove_from_cart/{id}', 'CartController@delete');

        Route::get('/checkout/{cart_id}', 'OrdersController@checkout');

        Route::post('/order', 'OrdersController@create');

    });

    Route::get('/recipes', 'RecipeController@show');

    Route::get('/orders', 'OrdersController@show');

    Route::get('/view_order_items/{cart_id}', 'OrdersController@show_items');

    Route::get('/confirm_order/{id}', 'OrdersController@confirm');


});

Route::fallback(function (Response $response)
{
    return $response->withView('404');
});
