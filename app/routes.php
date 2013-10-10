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

Route::group(array('before' => 'auth'), function () { 
	Route::get('/projects/{id}', 'ProjectTasksController@index')->where('id', '\d+');
	Route::resource('projects', 'ProjectsController');
	Route::resource('projects.tasks', 'ProjectTasksController');
	Route::resource('invoices', 'InvoicesController');
	Route::resource('worktypes', 'WorktypesController');
	Route::post('/projects/{id}/timelog', array(
		'as' => 'projects.timelog',
		'uses' => 'TimelogsController@store'
	));
	Route::get('/completed', array('before' => 'auth', function() {

		$projects = Project::whereCompleted(1)->orderby('updated_at', 'desc')->get();
		
		return View::make('projects.completed')
			->with('projects', $projects);
	}));

	Route::resource('users', 'UsersController');
});


Route::get('/', function() {
	return View::make('home');
});

Route::post('/', function() {
	
	$credentials = array(
		'email' => Input::get('email'),
		'password' => Input::get('password')
	);

	if (Auth::attempt($credentials)) {
		return Redirect::action('ProjectsController@index');
	} else {
		return View::make('home');
	}

});

Route::get('logout', function() {
	Auth::logout();
	return 'You are logged out';
});

Route::get('residential-movers', function() {
	return 'Residential Movers Page';
});