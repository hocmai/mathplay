<?php

class SiteLessionController extends BaseController {
	public function __construct() {
        // $this->beforeFilter('user', array('only'=>['show']));
        $this->beforeFilter('limit_question', ['only' => 'show']);
    }


	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return 'test';
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($grade_slug, $subject_slug, $lession_slug)
	{
		// dd(Common::getObject(Auth::user()->get(), 'id'));
		$grade   = Grade::findBySlug($grade_slug);
		$subject = Subject::findBySlug($subject_slug);
		$lession = Lession::findBySlug($lession_slug);

		if( !$grade | !$subject | !$lession ){
			App::abort(404);
		}
		return View::make('site.lession.index')->with(compact(['grade', 'subject', 'lession']));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function detail($id)
	{
		$lession = Lession::find($id);
		if( !$lession ){
			App::abort(404);
		}
		$subject = Common::getValueOfObject($lession, 'chapter', 'subject');
		$grade   = Common::getObject($subject, 'grade');

		
		return View::make('site.lession.index')->with(compact(['grade', 'subject', 'lession']));
	}

}