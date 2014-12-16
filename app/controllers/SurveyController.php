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

		$idCount = 1;
		$idOption=1;
		$idOptionid=1;
		try {
			$question = Question::where('survey_id', '=', $survey_id)->get();
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

		//dd($answers);
		return View::make('survey_edit')->with('question', $question)
		->with('answers', $answers)->with('idCount', $idCount)->with('idOption', $idOption)->with('idOptionid', $idOptionid);
	}


	/**
	* Show the "show a survey's"
	* @return View
	*/
	public function postEdit() {


		$questionid = Input::get('qid');
		$option1id = Input::get('a1');
		$option2id = Input::get('a2');
		$option3id = Input::get('a3');

		$question = Question::find($questionid);

		$option1 = Answer::find($option1id);
		$option2 = Answer::find($option2id);
		$option3 = Answer::find($option3id);

		$question->questiontext = Input::get('qtext');
		$question->save();

		$option1->answertext = Input::get('Answer1');
		$option1->save();

		$option2->answertext = Input::get('Answer2');
		$option2->save();

		$option3->answertext = Input::get('Answer3');
		$option3->save();

		$surveys    = Survey::all();
    	return View::make('survey_list')->with('surveys',$surveys)->with('flash_message','Survey has been updated.');
	}

	/**
	* Show the "show a survey's"
	* @return View
	*/
	public function getDelete($survey_id) {

		try {
	        $survey = Survey::findOrFail($survey_id);
	    }
	    catch(exception $e) {
	        return View::make('survey_list')->with('flash_message', 'Could not delete survey - not found.');
	    }
	    Answer::where('survey_id', '=', $survey_id)->delete();
	    Question::where('survey_id', '=', $survey_id)->delete();
	    Survey::destroy($survey_id);

	    $surveys    = Survey::all();

    	return View::make('survey_list')->with('surveys',$surveys);
	}

}
?>