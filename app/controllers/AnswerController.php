<?php
class AnswerController extends BaseController {
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
    	return View::make('answer_add');
	}
	/**
	* Process the "Add a question form"
	* @return Redirect
	*/
	public function postCreate() {
		# Instantiate the survey model
		$answer1 = new Answer();
		$answer2 = new Answer();
		$answer3 = new Answer();
		//$survey->fill(Input::all());

		$newsurveyCollection = Survey::all();
		$newquestionCollection = Question::all();

		$newsurvey = $newsurveyCollection->last();
		$newquestion = $newquestionCollection->last();

		//Saving answer option1
		$answer1->answertext = Input::get('answer1');
		$answer1->survey_id = $newsurvey['id'];
		$answer1->question_id = $newquestion['id'];
		$answer1->save();

		//Saving answer option2
		$answer2->answertext = Input::get('answer2');
		$answer2->survey_id = $newsurvey['id'];
		$answer2->question_id = $newquestion['id'];
		$answer2->save();

		//Saving answer option3
		$answer3->answertext = Input::get('answer3');
		$answer3->survey_id = $newsurvey['id'];
		$answer3->question_id = $newquestion['id'];
		$answer3->save();

		return Redirect::action('SurveyController@getCreate')
		->with('flash_message','Options for the survey has been added. Please click Go to Home Page link at the top to see all
			the surveys or please create another survey below.');
	}

}

?>