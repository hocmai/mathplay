<?php

class SiteGradeController extends SiteController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('site.grade.default');
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function detail($id)
	{
		$data = Grade::find($id);
		if(!$data){
			App::abort(404);
		}

		if( !Auth::admin()->check() && $data->status == 0 ){
			App::abort(403);
		}

		$chapters = [];
		if( $data->subject()->count() && $data->subject()->first()->chapter()->count() ){
			$chapters = $data->subject()->first()->chapter()->orderBy('weight', 'asc')->get();
		}
		return View::make('site.grade.default')->with(compact(['data', 'chapters']));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($gradeSlug)
	{
		$grade = Grade::findBySlug($gradeSlug);
		if(!$grade){
			App::abort(404);
		}
		
		$subject = $grade->subject()->first();
		
		$chapters = [];
		if( $grade->subject()->count() && $grade->subject()->first()->chapter()->count() ){
			$chapters = $grade->subject()->first()->chapter()->orderBy('weight', 'asc')->get();
		}
		return View::make('site.subject.index')->with(compact(['grade', 'chapters', 'subject']));
	}

}
