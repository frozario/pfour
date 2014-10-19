<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
	{
		return View::make('landing');
	});

	
Route::get('/textgen', function()
	{

  	  return View::make('loremform');

	});

Route::post('/textgen', function()
	{
		$data = Input::all();
		return View::make('loremresult', $data);
	});

Route::get('/usergen', function()
	{

    	return View::make('userform');

	});

Route::post('/usergen', function()
	{
		$data = Input::all();
		return View::make('userresult', $data);
	});