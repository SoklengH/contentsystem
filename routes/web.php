<?php

Route::get('/test', function(){
        return App\Profile::find(1)->user;
    // return App\Post::find(5)->category;
});     

Route::get('/', [
       'uses' =>'FrontEndController@index',
       'as'   =>'index'
]); 

Route::get('/post/{slug}', [
       'uses' => 'FrontEndController@singlePost',
       'as'   => 'post.single'
]);

Auth::routes();


Route::group(['prefix'=>'admin', 'middleware'=>'auth'], function()
{

    Route::get('/home', 'HomeController@index')->name('home');
    //we can use as buttom for routing to home page
    // Route::get('/home', function(){
    // 	'uses'=>'HomeController@index',
    // 	'as' => 'home'
    // });

    Route::get('/post/create', [
		 'uses'=>'PostsController@create',
		//call thing method
		 'as'  =>'post.create'
	]);


	Route::post('/post/store', [
		 'uses'=>'PostsController@store',
		//call thing method
		 'as'   =>'post.store'
    ]);

    Route::get('/category/create', [
        'uses' => 'CategoriesController@create',
        'as'   => 'category.create'
    ]);

    Route::get('/categories', [
        'uses' => 'CategoriesController@index',
        'as'   => 'categories'
    ]);

    Route::post('/category/store', [
        'uses' => 'CategoriesController@store',
        'as'   => 'category.store'
    ]);

    Route::get('/category/edit/{id}', [
        'uses' => 'CategoriesController@edit',
        'as'   => 'category.edit'
    ]);

    Route::get('/category/delete/{id}', [
        'uses' => 'CategoriesController@destroy',
        'as'   => 'category.delete'
    ]);

    Route::post('/category/update/{id}', [
        'uses' => 'CategoriesController@update',
        'as'   => 'category.update'
    ]);

    Route::get('/posts', [
        'uses' => 'PostsController@index',
        'as'   => 'posts'
    ]);

    Route::get('/post/delete/{id}', [
        'uses' => 'PostsController@destroy',
        'as'   => 'post.delete'
    ]);

    Route::get('/posts/trashed', [
        'uses' => 'PostsController@trashed',
        'as'   => 'posts.trashed'
    ]);

    Route::get('/posts/permanent/{id}', [
        'uses' => 'PostsController@permanent',
        'as'   => 'post.permanent'
    ]);

    Route::get('/posts/restore/{id}', [
        'uses' => 'PostsController@restore',
        'as'   => 'post.restore'
    ]);

    Route::get('/posts/edit/{id}', [
        'uses' => 'PostsController@edit',
        'as'   => 'post.edit'
    ]);

    Route::post('/post/update/{id}', [
        'uses' => 'PostsController@update',
        'as'   => 'post.update'
    ]);

    Route::get('/tags', [
        'uses' => 'TagsController@index',
        'as'   => 'tags'
    ]);

    Route::get('/tag/edit/{id}', [
        'uses' => 'TagsController@edit',
        'as'   => 'tag.edit'
    ]);

    Route::post('/tag/update/{id}', [
        'uses' => 'TagsController@update',
        'as'   => 'tag.update'
    ]);

    Route::get('/tag/delete/{id}', [
        'uses' => 'TagsController@destroy',
        'as'   => 'tag.delete'
    ]);

    Route::get('/tag/create', [
        'uses' => 'TagsController@create',
        'as'   => 'tag.create'
    ]);

    Route::post('/tag/store', [
        'uses' => 'TagsController@store',
        'as'   => 'tag.store'
    ]);

    Route::get('/users',[
        'uses' => 'UsersController@index',
        'as'   => 'users'
    ]);

    Route::get('/user/create',[
        'uses' => 'UsersController@create',
        'as'   => 'user.create'
    ]);

    Route::post('/user/store',[
        'uses' => 'UsersController@store',
        'as'   => 'user.store'
    ]);

    Route::get('user/admin/{id}', [
        'uses' => 'UsersController@admin',
        'as'   => 'user.admin'
    ]);

    Route::get('user/not-admin/{id}', [
        'uses' => 'UsersController@not_admin',
        'as'   => 'user.not.admin'
    ]);

    Route::get('user/profile', [
        'uses' => 'ProfilesController@index',
        'as'   => 'user.profile'
    ]);

    Route::post('user/profile/update', [
        'uses' => 'ProfilesController@update',
        'as'   => 'user.profile.update'
    ]);

    Route::get('user/delete/{id}', [
        'uses' => 'UsersController@destroy',
        'as'   => 'user.delete'
    ]);

    Route::get('/settings',[
        'uses' => 'SettingsController@index',
        'as'   => 'settings'
    ]);

    Route::post('/settings/update',[
        'uses' => 'SettingsController@update',
        'as'   => 'settings.update'
    ]);

    Route::get('/category_type', [
        'uses' => 'CategoryTypeController@index',
        'as'   => 'type'
    ]); 
    Route::get('/category_type/edit/{id}', [
        'uses' => 'CategoryTypeController@edit',
        'as'   => 'type.edit'
    ]);

    Route::post('/category_type/update/{id}', [
        'uses' => 'CategoryTypeController@update',
        'as'   => 'type.update'
    ]);

    Route::get('/category_type/delete/{id}', [
        'uses' => 'CategoryTypeController@destroy',
        'as'   => 'type.delete'
    ]);

    Route::get('/category_type/create', [
        'uses' => 'CategoryTypeController@create',
        'as'   => 'type.create'
    ]);

    Route::post('/category_type/store', [
        'uses' => 'CategoryTypeController@store',
        'as'   => 'type.store'
    ]);

    Route::get('/event/create', [
        'uses' => 'EventsController@create',
        'as'   => 'event.create'
    ]);

    Route::get('/events', [
        'uses' => 'EventsController@index',
        'as'   => 'events'
    ]);

    Route::post('/event/store', [
        'uses' => 'EventsController@store',
        'as'   => 'event.store'
    ]);

    Route::get('/event/edit/{id}', [
        'uses' => 'EventsController@edit',
        'as'   => 'event.edit'
    ]);

    Route::get('/event/delete/{id}', [
        'uses' => 'EventsController@destroy',
        'as'   => 'event.delete'
    ]);

    Route::post('/event/update/{id}', [
        'uses' => 'EventsController@update',
        'as'   => 'event.update'
    ]);

    Route::get('/supplier/create', [
        'uses' => 'SuppliersController@create',
        'as'   => 'supplier.create'
    ]);

    Route::get('/suppliers', [
        'uses' => 'SuppliersController@index',
        'as'   => 'suppliers'
    ]);

    Route::post('/supplier/store', [
        'uses' => 'SuppliersController@store',
        'as'   => 'supplier.store'
    ]);

    Route::get('/supplier/edit/{id}', [
        'uses' => 'SuppliersController@edit',
        'as'   => 'supplier.edit'
    ]);

    Route::get('/supplier/delete/{id}', [
        'uses' => 'SuppliersController@destroy',
        'as'   => 'supplier.delete'
    ]);

    Route::post('/supplier/update/{id}', [
        'uses' => 'SuppliersController@update',
        'as'   => 'supplier.update'
    ]);
}); 