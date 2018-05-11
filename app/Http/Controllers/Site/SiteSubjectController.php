<?php
namespace App\Http\Controllers\Site;
use App\Http\Controllers\Controller;

class SiteSubjectController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('site.subject.index');
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($gradeSlug, $subjectSlug)
	{
		$subject = \App\Models\Subject::findBySlug($subjectSlug);
		$grade = \App\Models\Grade::findBySlug($gradeSlug);
		if(!$subject | !$grade){
			abort(404);
		} else{
			$chapters = $subject->chapter()->orderBy('weight', 'asc')->get();
			return view('site.subject.index')->with(compact(['grade', 'subject', 'chapters']));
		}
	}

}
