<?php

Route::get('/','PageController@index')->name('index');
Route::get('contact','PageController@contact')->name('contact');
route::post('contact','PageController@storeContact')->name('contact.store');
Route::get('about','PageController@about')->name('about');

// Ruba, CRUD (BREAD)

//Route::get('rubas', function(){})->name('rubas.index');
//Route::get('rubas/create', function(){})->name('rubas.create');
//Route::post('rubas', function(){})->name('rubas.store');
//Route::get('rubas/{ruba}', function(){})->name('rubas.show');
//Route::get('rubas/{ruba}/edit', function(){})->name('rubas.edit');
//Route::patch('rubas/{ruba}', function(){})->name('rubas.update');
//Route::delete('rubas/{ruba}', function(){})->name('rubas.destroy');

route::get('user/{id}/email/{email?}',function($id,$email=null)
{echo "your id is :". $id ."and email :". $email ;});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('article','controlleArticle');
Route::post('comments/{article}','CommentController@store')->name('comments.store');
