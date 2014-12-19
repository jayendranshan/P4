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

		return View::make('survey_participate')->with('survey',$survey);
	}


	/**
	* Show the "show a survey's"
	* @return View
	*/
	public function postParticipate() {

		$AnswerID = "";
		$surveys    = Survey::where('lastvaliddate', '>=', new DateTime('today'))->get();;

		if (isset($_POST["Answer"])) 
		{
			$AnswerID = Input::get('Answer');

			$Answer = Answer::find($AnswerID);

			$Vote = $Answer->answerCount;
			
			$Answer->answerCount = $Vote + 1;

			$Answer->save();

	    	//return View::make('user_survey')->with('surveys',$surveys)->with('flash_message', 'Your vote has been recorded.');
	    	return Redirect::to('/survey/participatelist')
	    	->with('surveys',$surveys)->with('flash_message', 'Your vote has been recorded.');
		}
		else
		{
			$survey = Survey::with('question','answer')->findOrFail(Input::get('surveyid'));
			//return View::make('survey_participate')->with('survey',$survey)
			//->with('flash_message', 'Please choose an option to vote.');
			return Redirect::to('/survey/participate/'.Input::get('surveyid'))->
				with('flash_message','Please choose an option to vote.');
		}
		
		
	}


}
?>