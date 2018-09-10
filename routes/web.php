<?php
    Route::group( ['prefix' => 'admin', 'namespace' => 'Admin'], function() {
        Route::get('/', 'HomeController@index')->name('admin.dashboard');

        // Blog Posts
        Route::resource('posts', 'BlogController', ['as' => 'admin']);

        // Categories
        Route::resource('categories', 'CategoriesController', ['as' => 'admin']);

        // Tags
        Route::resource('tags', 'TagsController', ['as' => 'admin']);
        
        // Roles
        Route::resource('roles', 'RolesController', ['as' => 'admin']);

        /*
        // Clients
        Route::resource('clients', 'ClientsController', ['as' => 'admin']);

        // Team
        Route::resource('team', 'TeamController', ['as' => 'admin']);

        // Portfolio
        Route::resource('portfolio', 'PortfolioController', ['as' => 'admin']);

        // Users
        Route::resource('users', 'UsersController', ['as' => 'admin']);


        // Permissions
        Route::resource('permissions', 'PermissionsController', ['as' => 'admin']);
        */
    });
    

    Auth::routes();
