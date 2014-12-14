<?php
class ParticipateSurveyController extends BaseController {
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
		    $surveys  = Survey::all();
		//}
    	return View::make('user_survey')->with('surveys',$surveys);
	}

	/**
	* Show the "show a survey's"
	* @return View
	*/
	public function getParticipate($survey_id) {

		try {
			$question = Question::where('survey_id', '=', $survey_id)->get();

			$questionObject = Question::find($question['id']);

			print_r($questionObject);
		}
		catch(Exception $e) {
			$questionObject = Question::find($question->id);
			print_r($questionObject);
			return Redirect::to('/survey/participatelist')->with('flash_message', 'Question not found');
		}

		try {
			$answers = Answer::where('survey_id', '=', $survey_id)->get();

			$answersObject = Question::findOrFail($answers['id']);
		}
		catch(Exception $e) {
			return Redirect::to('/survey/participatelist')->with('flash_message', 'Answer not found');
		}
		return View::make('survey_participate')->with('question', $questionObject)
		->with('answers', $answersObject);
	}


	/**
	* Show the "show a survey's"
	* @return View
	*/
	public function postParticipate() {

		//try {
		    $surveys    = Survey::all();
		//}
    	return View::make('survey_Edit')->with('surveys',$surveys);
	}


}
?>