<?php

use Illuminate\Routing\Router;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
    'as'            => config('admin.route.prefix') . '.',
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('home');
    // 追加
    $router->resource('blog/articles', ArticleController::class);
    $router->resource('blog/categories', ArticleCategoryController::class);
    $router->resource('contact', ContactController::class);
});
