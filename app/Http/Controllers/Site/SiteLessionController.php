<?php
namespace App\Http\Controllers\Site;
use App\Http\Controllers\Controller;
use App\Models\Grade;
use App\Models\Subject;
use App\Models\Lession;
use Services\Common;
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
		// dd(Common::getObject(Auth::user(), 'id'));
		$grade   = Grade::findBySlug($grade_slug);
		$subject = Subject::findBySlug($subject_slug);
		$lession = Lession::findBySlug($lession_slug);
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
		$lession = Lession::find($id);
		if( !$lession ){
			abort(404);
		}
		$subject = Common::getValueOfObject($lession, 'chapter', 'subject');
		$grade   = Common::getObject($subject, 'grade');

		
		return view('site.lession.index')->with(compact(['grade', 'subject', 'lession']));
	}

}