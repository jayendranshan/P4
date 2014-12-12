<?php
class QuestionController extends BaseController {
	/**
	*
	*/
	public function __construct() {
		# Make sure BaseController construct gets called
		parent::__construct();
	}


	/**
	* Show the "Add a question form"
	* @return View
	*/
	public function getCreate() {
    	return View::make('question_add');
	}
	/**
	* Process the "Add a question form"
	* @return Redirect
	*/
	public function postCreate() {
		# Instantiate the survey model
		$question = new Question();
		//$survey->fill(Input::all());

		$newsurveyCollection = Survey::all();

		$newsurvey = $newsurveyCollection->last();

		$question->questiontext = Input::get('question');
		$question->survey_id = $newsurvey['id'];
		$question->save();

		return Redirect::action('AnswerController@getCreate')->with('flash_message','Question for the survey has been added');
	}

}

?>