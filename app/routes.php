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

Route::get('register', array('as' => 'register', 'uses' => 'HomeController@showRegister'));

Route::post('register', array('uses' => 'HomeController@doRegister'));

Route::get('login', array('as' => 'login', 'uses' => 'HomeController@showLogin'));

Route::post('login', array('uses' => 'HomeController@doLogin'));

Route::get('request', array('as' => 'request', 'uses' => 'HomeController@showRequest', 'before' => 'auth'));

Route::post('request', array('uses' => 'HomeController@doRequest'));

Route::get('main', array('as' => 'main', 'uses' => 'HomeController@showMain'));

Route::post('main', array('uses' => 'HomeController@doMain'));

Route::controller('home', 'HomeController');

Route::get('logout', array('uses' => 'HomeController@doLogout'));

Route::get('all_requests', array('as' => 'request', 'uses' => 'AdminController@showAllRequests', 'before' => 'auth|admin'));

Route::get('pending_requests', array('as' => 'request', 'uses' => 'AdminController@showPendingRequests', 'before' => 'auth|admin'));

Route::get('members', array('as' => 'members', 'uses' => 'AdminController@showMembers', 'before' => 'auth|admin'));

Route::get('wards', array('as' => 'wards', 'uses' => 'AdminController@showWards', 'before' => 'auth|admin'));

Route::get('buildings', array('as' => 'buildings', 'uses' => 'AdminController@showBuildings', 'before' => 'auth|admin'));

Route::get('dashboard', array('uses' => 'HomeController@showDashboard', 'before' => 'auth'));

Route::get('admin_dashboard', array('uses' => 'AdminController@showDashboard', 'before' => 'auth|admin'));

//Route::get('editRequest', array('uses' => 'AdminController@editRequest', 'before' => 'auth|admin'));

Route::get('editRequest/{id}', array('as' => 'edit_request', 'uses' => 'AdminController@showEditRequest', 'before' => 'auth|admin'));

Route::get('deleteRequest/{id}', array('as' => 'delete_request', 'uses' => 'AdminController@destroy', 'before' => 'auth|admin'));

//Route::post('editRequest/{id}', array('uses' => 'AdminController@doEditRequest', 'before' => 'auth|admin'));

//Route::controller('admin', 'AdminController');

Route::resource('admin', 'AdminController');

/*Route::group(array('prefix' => 'admin', 'before' => 'auth|admin'), function() {
  Route::get('dashboard', array('as' => 'admin_dashboard', 'uses' => 'AdminController@showDashboard'));

  Route::get('requests', function() {
    return View::make('admin_requests');
  });
});*/




/*Route::get('/', function()
{
	return View::make('hello');
});*/

Route::get('member', function()
{
  $ad = array(
    'first_name' => 'Joe',
    'last_name' => 'Walker',
  );
  $member = new \WardBuilding\Models\Member($ad);
  $member->save();
  return $member->id;
  //if(DB::connection()->getDatabaseName())
 // {
 //   echo "conncted sucessfully to database ".DB::connection()->getDatabaseName();
 // }
 // exit();
});
