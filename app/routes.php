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

Route::post('/survey/edit', 'SurveyController@postEdit');
Route::get('/survey/edit/{id}', 'SurveyController@getEdit');

Route::get('/survey/delete/{id}', 'SurveyController@getDelete');


Route::get('/survey/participatelist', 'ParticipateSurveyController@getIndex');
Route::get('/survey/participate/{id}', 'ParticipateSurveyController@getParticipate');
Route::post('/survey/participate', 'ParticipateSurveyController@postParticipate');

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


# /app/routes.php
Route::get('/debug', function() {

    echo '<pre>';

    echo '<h1>environment.php</h1>';
    $path   = base_path().'/environment.php';

    try {
        $contents = 'Contents: '.File::getRequire($path);
        $exists = 'Yes';
    }
    catch (Exception $e) {
        $exists = 'No. Defaulting to `production`';
        $contents = '';
    }

    echo "Checking for: ".$path.'<br>';
    echo 'Exists: '.$exists.'<br>';
    echo $contents;
    echo '<br>';

    echo '<h1>Environment</h1>';
    echo App::environment().'</h1>';

    echo '<h1>Debugging?</h1>';
    if(Config::get('app.debug')) echo "Yes"; else echo "No";

    echo '<h1>Database Config</h1>';
    print_r(Config::get('database.connections.mysql'));

    echo '<h1>Test Database Connection</h1>';
    try {
        $results = DB::select('SHOW DATABASES;');
        echo '<strong style="background-color:green; padding:5px;">Connection confirmed</strong>';
        echo "<br><br>Your Databases:<br><br>";
        print_r($results);
    } 
    catch (Exception $e) {
        echo '<strong style="background-color:crimson; padding:5px;">Caught exception: ', $e->getMessage(), "</strong>\n";
    }

    echo '</pre>';

});

?>