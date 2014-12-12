<?php
class SurveyController extends BaseController {
	/**
	*
	*/
	public function __construct() {
		# Make sure BaseController construct gets called
		parent::__construct();
	}


	/**
	* Show the "show a survey's"
	* @return View
	*/
	public function getIndex() {

		//try {
		    $surveys    = Survey::all();
		//}
    	return View::make('survey_list')->with('surveys',$surveys);
	}


	/**
	* Show the "Add a survey form"
	* @return View
	*/
	public function getCreate() {
    	return View::make('survey_add');
	}
	/**
	* Process the "Add a survey form"
	* @return Redirect
	*/
	public function postCreate() {
		# Instantiate the survey model
		$survey = new Survey();
		//$survey->fill(Input::all());

		$survey->name = Input::get('name');
		$survey->description = Input::get('description');
		$survey->user_id = Auth::id();
		$survey->lastvaliddate = Input::get('lastvaliddate');
		$survey->save();
		# Magic: Eloquent
		//$book->save();
		
		return Redirect::action('QuestionController@getCreate')->with('flash_message','Your suurvey has been added.');
	}

	/**
	* Show the "show a survey's"
	* @return View
	*/
	public function getEdit($survey_id) {

		try {
			$question = Question::where('survey_id', '=', $survey_id)->get();

			print_r($question);
		}
		catch(Exception $e) {
			return Redirect::to('/survey/list')->with('flash_message', 'Question not found');
		}

		try {
			$answers = Answer::where('survey_id', '=', $survey_id)->get();
		}
		catch(Exception $e) {
			return Redirect::to('/survey/list')->with('flash_message', 'Answer not found');
		}
		return View::make('survey_edit')->with('question', $question)
		->with('answers', $answers);
	}


	/**
	* Show the "show a survey's"
	* @return View
	*/
	public function postEdit() {

		//try {
		    $surveys    = Survey::all();
		//}
    	return View::make('survey_Edit')->with('surveys',$surveys);
	}

	/**
	* Show the "show a survey's"
	* @return View
	*/
	public function getDelete() {

		//try {
		    $surveys    = Survey::all();
		//}
    	return View::make('survey_list')->with('surveys',$surveys);
	}

}
?>