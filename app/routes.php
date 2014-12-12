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

Route::get('/get-environment',function() {

    echo "Environment: ".App::environment();

});

Route::get('mysql-test', function() {

    # Print environment
    echo 'Environment: '.App::environment().'<br>';

    # Use the DB component to select all the databases
    $results = DB::select('SHOW DATABASES;');

    # If the "Pre" package is not installed, you should output using print_r instead
    //echo Pre::render($results);

    print_r($results);

});

/**
* Index
*/
Route::get('/', 'IndexController@getIndex');

/**
* User
* (Explicit Routing)
*/


Route::get('/signup','UserController@getSignup' );
Route::get('/login', 'UserController@getLogin' );
Route::post('/signup', 'UserController@postSignup' );
Route::post('/login', 'UserController@postLogin' );
Route::get('/logout', 'UserController@getLogout' );


/*
Survey
(Explicit Routing)
*/
Route::get('/survey/list', 'SurveyController@getIndex');
Route::get('/survey/create', 'SurveyController@getCreate');
Route::post('/survey/create', 'SurveyController@postCreate');

Route::get('/survey/edit/{id}', 'SurveyController@getEdit');
Route::post('/survey/edit', 'SurveyController@postEdit');

Route::get('/survey/delete/{id}', 'SurveyController@getDelete');


/*
question
(Explicit Routing)
*/

Route::get('/question/create', 'QuestionController@getCreate');
Route::post('/question/create', 'QuestionController@postCreate');

/*
question
(Explicit Routing)
*/

Route::get('/answer/create', 'AnswerController@getCreate');
Route::post('/answer/create', 'AnswerController@postCreate');

?>