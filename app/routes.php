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

Route::get('test', function() {
	$client =  Client::find(1);
	return $client->contacts;
});

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


Route::get('/', ['as' => 'home', function() {
	return View::make('home');
}]);

Route::get('login', 'SessionsController@create');
Route::get('logout', 'SessionsController@destroy');
Route::resource('sessions', 'SessionsController', ['only' => ['create', 'store', 'destroy']]);
Route::resource('clients', 'ClientsController');
Route::resource('contacts', 'ContactsController');