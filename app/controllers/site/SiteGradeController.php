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
	public function show($gradeSlug)
	{
		$data = Grade::findBySlug($gradeSlug);
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

}
