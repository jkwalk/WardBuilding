<?php

use WardBuilding\Models\Request;
use WardBuilding\Models\Member;

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function showWelcome()
	{
		return View::make('hello');
	}

  public function showMain() {
    return View::make('main');
  }

  public function showLogin() {
    return View::make('login');
  }

  public function doLogin()
  {
    // validate the info, create rules for the inputs
    $rules = array(
      'email'    => 'required|email', // make sure the email is an actual email
      'password' => 'required|alpha_num|min:3'
    );

    // run the validation rules on the inputs from the form
    $validator = Validator::make(Input::all(), $rules);

    // if the validator fails, redirect back to the form
    if ($validator->fails()) {
      return Redirect::to('login')
        ->withErrors($validator) // send back all errors to the login form
        ->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form
    } else {

      // create our user data for the authentication
      $userdata = array(
        'email' 	=> Input::get('email'),
        'password' 	=> Input::get('password')
      );

      // attempt to do the login
      if (Auth::attempt($userdata)) {



        if (Auth::user()->admin_f) { // go to admin site
          //return Redirect::to('admin/');
          return View::make('admin_dashboard');


        } else { // go to normal user site
          //return Redirect::to('dashboard');
          return View::make('dashboard');
        }

      } else {

        // validation not successful, send back to form
        return Redirect::to('login');

      }

    }
  }

  public function doLogout()
  {
    Auth::logout(); // log the user out of our application
    return Redirect::to('main'); // redirect the user to the login screen
  }

  public function showRequest() {
    return View::make('request');
  }

  public function doRequest() {
    $rules = array(
      'title' => 'required',
      'desc' => 'required'
    );

    $validator = Validator::make(Input::all(), $rules);
    if ($validator->fails()) {
      return Redirect::to('request')
        ->withErrors($validator) // send back all errors to the login form
        ->withInput(); // send back the input (not the password) so that we can repopulate the form
    } else {
      $reqData = array(
        'member_id' => Auth::user()->id,
        'title' => Input::get('title'),
        'desc' => Input::get('desc'),
        'status' => 'pending',
        'handled_f' => false
      );

      $request = new Request($reqData);
      $request->save();
      return View::make('dashboard')->with('message', 'Request added.');
    }



  }

  public function showRegister() {
    return View::make('register');
  }

  public function doRegister() {
    $rules = array(
      'first_name' => 'required|alpha',
      'last_name' => 'required|alpha',
      'email' => 'required|email|unique:member,email',
      'password' => 'required|alpha_num|min:3'
    );
    $validator = Validator::make(Input::all(), $rules);
    if ($validator->fails()) {
      return Redirect::to('register')
        ->withErrors($validator) // send back all errors to the login form
        ->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form
    } else {
      $memberData = array(
        'first_name' => Input::get('first_name'),
        'last_name' => Input::get('last_name'),
        'email' => Input::get('email'),
        'password' => Hash::make(Input::get('password')),
        'admin_f' => false,
        'ward_id' => Input::get('ward')
      );

      $member = new Member($memberData);
      $member->save();
      return View::make('login')->with('message', 'Thank you for registering. Please log in.');
    }
  }

  public function showAllRequests() {
    $requests = Request::all();
    return View::make('all_requests')->with('requests', $requests);
  }

  public function showDashboard() {
    return View::make('dashboard');
  }



}
