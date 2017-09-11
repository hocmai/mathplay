<?php

class SiteSubjectController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('site.subject.index');
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($gradeSlug, $subjectSlug)
	{
		$subject = Subject::findBySlug($subjectSlug);
		$grade = Grade::findBySlug($gradeSlug);
		if(!$subject | !$grade){
			App::abort(404);
		} else{
			$chapters = $subject->chapter()->orderBy('weight', 'asc')->get();
			return View::make('site.subject.index')->with(compact(['grade', 'subject', 'chapters']));
		}
	}

}
