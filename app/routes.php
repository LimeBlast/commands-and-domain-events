<?php

Route::get('/', function () {
	return View::make('hello');
});

Route::get('/jobs/create', 'JobsController@create');
Route::post('/jobs', 'JobsController@store');
Route::get('/jobs/delete/{id}', 'JobsController@delete');