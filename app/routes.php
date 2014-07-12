<?php

Event::listen('Acme.Jobs.JobWasPosted', 'Acme\Listeners\EmailNotifier@whenJobWasPosted');

Route::get('/', function()
{
	return View::make('hello');
});

Route::get('/jobs/create', 'JobsController@create');
Route::post('/jobs', 'JobsController@store');
