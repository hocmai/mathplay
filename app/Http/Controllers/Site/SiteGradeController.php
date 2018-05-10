<?php
namespace App\Http\Controllers\Site;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;

class SiteGradeController extends Controller {
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
		$data = \App\Models\Grade::find($id);
		if(!$data){
			App::abort(404);
		}

		if( !Auth::admin()->check() && $data->status == 0 ){
			App::abort(403);
		}

		if( !Cache::has('grade_chapters_list_'.$gradeSlug) ){
			$listChapter = $grade->chapter()->orderBy('weight', 'asc')->get();
			Cache::put('grade_chapters_list_'.$gradeSlug, $listChapter, 60);
		}
		$chapters = Cache::get('grade_chapters_list_'.$gradeSlug);
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
		$grade = \App\Models\Grade::findBySlug($gradeSlug);
		if(!$grade){
			App::abort(404);
		}
		
		$subject = $grade->subject()->first();
		
		if( !Cache::has('grade_chapters_list_'.$gradeSlug) ){
			$listChapter = $grade->chapter()->orderBy('weight', 'asc')->get();
			Cache::put('grade_chapters_list_'.$gradeSlug, $listChapter, 60);
		}
		$chapters = Cache::get('grade_chapters_list_'.$gradeSlug);
		return View::make('site.subject.index')->with(compact(['grade', 'chapters', 'subject']));
	}

}
