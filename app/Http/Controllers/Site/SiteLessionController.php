<?php
namespace App\Http\Controllers\Site;
use App\Http\Controllers\Controller;
class SiteLessionController extends Controller {
	public function __construct() {
        // $this->beforeFilter('user', array('only'=>['show']));
        // $this->beforeFilter('limit_question', ['only' => 'show']);
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
		$grade   = \App\Models\Grade::findBySlug($grade_slug);
		$subject = \App\Models\Subject::findBySlug($subject_slug);
		$lession = \App\Models\Lession::findBySlug($lession_slug);
		if( !$grade | !$subject | !$lession ){
			abort(404);
		}
		return view('site.lession.index')->with(compact(['grade', 'subject', 'lession']));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function detail($id)
	{
		$lession = \App\Models\Lession::find($id);
		if( !$lession ){
			abort(404);
		}
		$subject = Common::getValueOfObject($lession, 'chapter', 'subject');
		$grade   = Common::getObject($subject, 'grade');

		
		return view('site.lession.index')->with(compact(['grade', 'subject', 'lession']));
	}

}