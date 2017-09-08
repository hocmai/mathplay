<?php

class AjaxController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	/**
	 * Delete question of a lession
	 */
	public function deleteQuestion(){
		if (Auth::admin()->guest()){
			App::abort(403);
		}
		$input = Input::all();
		return Response::json(Request::ajax());
	}

	/**
	 * Get question config form by question type
	 */
	public function getQuestionConfigForm()
	{
		$type = Input::get('type');
		$form = CommonQuestion::getConfigForm($type);
		return Response::json($form);
	}

	/**
	 * Update study history
	 */
	public function updateStudyHistory(){
		$data = Input::get('data');
		if(empty($data)) return Response::json(false);

		if( Auth::user()->check() ){
			$author = Common::getObject(Auth::user()->get(), 'id');
			$data = (array)json_decode($data);
			$data['author'] = $author;

			$study_history = StudyHistory::firstOrCreate(array_except($data, ['score' , 'current_question', 'status']));
			StudyHistory::find($study_history->id)->update($data);
			return Response::json(true);
		}
	}

}
