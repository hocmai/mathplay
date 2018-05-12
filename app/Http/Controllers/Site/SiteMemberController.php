<?php
namespace App\Http\Controllers\Site;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User; 
use App\Models\Grade; 
use App\Models\Subject; 
use App\Models\StudyHistory; 
use App\Models\Lession; 
use Services\Common;
use Illuminate\Support\Facades\DB;

class SiteMemberController extends Controller {

    protected $request;

	public function __construct(Request $request) {
        // $this->beforeFilter('owner');
        $this->request = $request;
    }

    public function profile($id){
    	$data= User::findOrFail($id);
    	$class = Grade::lists('title', 'id');
    	return view('site.member.profile')->with(compact('data','class','id'));
    }

    public function saveProfile($id){
    	$input = $this->request->except(['username', 'email']);
    	// dd($input);
    	User::findOrFail($id)->update($input);
    	return redirect()->action( 'Site\SiteMemberController@profile', [$id] )->withMessage('Lưu thành công!');

    }

	/**
	 * Bang diem.
	 *
	 * @return Response
	 */
	public function history()
	{
		$data = [];
		$input = $this->request->get('grade');
		if( !empty($input) ){
			$uid = Auth::user()->id;
			$subject = Subject::where('grade_id', $input)->orderBy('updated_at', 'desc')->first();
			$chapter = Common::getObject($subject, 'chapter');
			// $data = StudyHistory::orderBy('updated_at', 'desc')->where('grade_id', $input)->where('author', $uid)->get();
			$data = StudyHistory::select('study_history.*')
				->join( 
					DB::raw("(SELECT id, MAX(score) AS MaxScore, lession_id 
					FROM study_history
					WHERE grade_id = $input
					GROUP BY lession_id, id) as groupedtt"), function($join){
						$join->on('study_history.lession_id', '=', 'groupedtt.lession_id')
						  ->on('study_history.score', '=', 'groupedtt.MaxScore');
					})
				->where('author', Auth::user()->id)
				->where('grade_id', $input)
				->get();
			// dd($data);
		}
		return view('site.member.history.history-score')->with(compact(['data', 'chapter']));
	}

	/**
	 * Tien trinh hoc.
	 *
	 * @return Response
	 */
	public function historyScore()
	{
		$uid = Auth::user()->id;
		$data = StudyHistory::select('study_history.*', 'grades.title as grade_title', 'chapters.title as chapter_title', 'lessions.title as lession_title')
			->join( 
				DB::raw("(SELECT id, MAX(score) AS MaxScore, lession_id 
				FROM study_history
				WHERE author = $uid
				GROUP BY lession_id, id) as groupedtt"), function($join){
					$join->on('study_history.lession_id', '=', 'groupedtt.lession_id')
					  ->on('study_history.score', '=', 'groupedtt.MaxScore');
				})
			->join('grades', 'study_history.grade_id', '=', 'grades.id')
			->join('chapters', 'study_history.chapter_id', '=', 'chapters.id')
			->join('lessions', 'study_history.lession_id', '=', 'lessions.id')
			->where('author', $uid)
			->orderBy('study_history.updated_at', 'asc')
			->get();
		$dataH = [];
		foreach($data as $key => $value){
			$dataH[$value->grade_id]['title'] = Common::getObject($value, 'grade_title');
			$dataH[$value->grade_id]['chapters'][$value->chapter_id]['title'] = Common::getObject($value, 'chapter_title');
			$dataH[$value->grade_id]['chapters'][$value->chapter_id]['lessions'][$value->lession_id] = $value;
		}
		// dd($data->count());
		return view('site.member.history.history-progress')->with(['data' => $dataH]);
	}

	/**
	 * Lich su lam bai.
	 *
	 * @return Response
	 */
	public function historyQuestion()
	{
		$tree = Common::getLessionTree();		
		$data = [];
		$input = $this->request->get('lession');
		if( !empty($input) ){
			$uid = Auth::user()->id;
			$lession = Common::getObject(Lession::find($input), 'title');
			$data = StudyHistory::orderBy('updated_at', 'desc')->where('lession_id', $input)->where('author', $uid)->get();
		}

		return view('site.member.history.question-log')->with(compact(['tree', 'data', 'lession']));
	}


	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{

	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
