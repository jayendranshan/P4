<?php
class UserController extends BaseController {
	/**
	*
	*/
	public function __construct() {
		# Make sure BaseController construct gets called
		parent::__construct();
        $this->beforeFilter('guest',
        	array(
        		'only' => array('getLogin','getSignup')
        	));
    }
    /**
	* Show the new user signup form
	* @return View
	*/
	public function getSignup() {
		return View::make('user_signup');
	}
	/**
	* Process the new user signup
	* @return Redirect
	*/
	public function postSignup() {
		# Step 1) Define the rules
		$rules = array(
			'email' => 'required|email|unique:users,email',
			'password' => 'required|min:6'
		);
		# Step 2)
		$validator = Validator::make(Input::all(), $rules);
		# Step 3
		if($validator->fails()) {
			return Redirect::to('/signup')
				->with('flash_message', 'Sign up failed; please fix the errors listed below.')
				->withInput()
				->withErrors($validator);
		}
		$user = new User;
		$user->email    = Input::get('email');
		$user->password = Hash::make(Input::get('password'));
		$user->usertype_id = Input::get('user_type');
		//dd($user);
		try {

			$user->save();
		}
		catch (Exception $e) {
			return Redirect::to('/signup')
				->with('flash_message', 'Sign up failed; please try again.')
				->withInput();
		}
		# Log in
		Auth::login($user);
		return Redirect::to('/')->with('flash_message', 'Welcome to JayVey!. Please log in to create the survey/poll.');
	}
	/**
	* Display the login form
	* @return View
	*/
	public function getLogin() {
		return View::make('user_login');
	}
	/**
	* Process the login form
	* @return View
	*/
	public function postLogin() {
		$credentials = Input::only('email', 'password');
		# Note we don't have to hash the password before attempting to auth - Auth::attempt will take care of that for us
		if (Auth::attempt($credentials, $remember = false)) {
			
			$userid = Auth::id();
			$user = User::find($userid);
			if($user->usertype_id == 1)
			{
				return Redirect::action('SurveyController@getIndex')->with('flash_message','Welcome to JayVey. Please create the new survey here.');
			}
			else if($user->usertype_id == 2)
			{
				return Redirect::action('ParticipateSurveyController@getIndex')->
				with('flash_message','Welcome to JayVey. Please take the survey.');
			}
			
		}
		else {
			return Redirect::to('/login')
				->with('flash_message', 'Log in failed; please try again.')
				->withInput();
		}
	}
	/**
	* Logout
	* @return Redirect
	*/
	public function getLogout() {
		# Log out
		Auth::logout();
		# Send them to the homepage
		return Redirect::to('/');
	}
}