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
		    $surveys  = Survey::where('lastvaliddate', '>=', new DateTime('today'))->get();
		//}
    	return View::make('user_survey')->with('surveys',$surveys);
	}

	/**
	* Show the "show a survey's"
	* @return View
	*/
	public function getParticipate($survey_id) {

		try{
			$survey = Survey::with('question','answer')->findOrFail($survey_id);
		}
		catch(Exception $e) {
			return Redirect::to('/survey/participatelist')->with('flash_message', 'survey not found');
		}

		try {
			$question = Question::where('survey_id', '=', $survey_id)->get();
		}
		catch(Exception $e) {
			return Redirect::to('/survey/participatelist')->with('flash_message', 'Question not found');
		}

		try {
			$answers = Answer::where('survey_id', '=', $survey_id)->get();
		}
		catch(Exception $e) {
			return Redirect::to('/survey/participatelist')->with('flash_message', 'Answer not found');
		}
		return View::make('survey_participate')->with('survey',$survey)->with('question', $question)
		->with('answers', $answers);
	}


	/**
	* Show the "show a survey's"
	* @return View
	*/
	public function postParticipate() {


		$surveys    = Survey::where('lastvaliddate', '>=', new DateTime('today'))->get();;

		$AnswerID = Input::get('Answer');
		$Answer = Answer::find($AnswerID);

		$Vote = $Answer->answerCount;
		
		$Answer->answerCount = $Vote + 1;

		$Answer->save();


    	return View::make('user_survey')->with('surveys',$surveys);
	}


}
?>