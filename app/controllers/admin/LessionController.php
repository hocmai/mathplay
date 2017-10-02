<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class LessionController extends AdminController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$data = Lession::orderBy('created_at', 'desc')->paginate(PAGINATE);
		// dd($data);
		return View::make('admin.lession.index')->with(compact('data'));
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function search()
	{
		$input = Input::all();
		$data = Lession::select('lessions.*');
		if( !empty($input['title']) ){
			$data = $data->where('lessions.title', 'LIKE' , '%'.$input['title'].'%');
		}
		$data = $data->join('chapters', 'lessions.chapter_id', '=', 'chapters.id')
			->join('subjects', 'chapters.subject_id', '=', 'subjects.id')
			->join('grades', 'subjects.grade_id', '=', 'grades.id');

		if( !empty($input['chapter']) ){
			$data = $data->where('chapters.id', $input['chapter']);
		}
		if( !empty($input['subject']) ){
			$data = $data->where('subjects.id', $input['subject']);
		}
		if( !empty($input['grade']) ){
			$data = $data->where('grades.id', $input['grade']);
		}
		if( isset($input['status']) && $input['status'] != ''){
			$data = $data->where('lessions.status', $input['status']);
		}
		if( !empty($input['order_by']) ){
			$data = $data->orderBy('lessions.'.$input['order_by'], !empty($input['order']) ? $input['order'] : 'desc');
		} else{
			$data = $data->orderBy('lessions.created_at', 'desc');
		}
		$data = $data->paginate(PAGINATE);
		// dd(Input::get('order'));
		return View::make('admin.lession.index')->with(compact('data'))->with(compact('input'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{	
		return View::make('admin.lession.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        $input = Input::except(['_token']);
        $input['author_id'] = Auth::admin()->get()->id;
        // dd($input);

    	$LessionId = CommonNormal::create(Input::except(['_token', 'question_config', 'question']));

    	//// Get query input to array
		$question_input = [];
        if( !empty($input['question']) ){
    		foreach ($input['question'] as $key => $value) {
    			foreach ($value as $key2 => $value2) {
    				$question_input[$key2][$key] = $value2;
    			}
    		}
        }

        // dd($question_config);
        //// Insert lession_question table
        if(count($question_input)){
        	foreach ($question_input as $key => $value) {
        		//// Create new question
        		$questionId = CommonNormal::create(array_except($value, ['config']), 'Question');

        		/////// Get cònig of question
        		$config = !empty($input['question_config']['config'][$key]) ? (array)json_decode($input['question_config']['config'][$key]) : [];
                $config['question_start'] = $input['question_config']['question_start'][$key];
                $config['question_end'] = $input['question_config']['question_end'][$key];

                /////// Save the question
        		CommonNormal::create([
    				'lession_id' => $LessionId,
    				'qid' => $questionId,
    				'config' => json_encode($config)
    			], 'LessionQuestion');
        	}
        }

		return Redirect::action('LessionController@index')->with('success', 'Lưu thành công!');
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
		$data = Lession::find($id);
        return View::make('admin.lession.edit', array('lession'=>$data));
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
        $input = Input::except('_token');
        // dd($input);
    	CommonNormal::update($id, Input::except(['_token', 'question_config', 'question']));

    	//// Get Question infomations -> fetch array
		$question_input = [];
        if( !empty($input['question']) ){
    		foreach ($input['question'] as $key => $value) {
    			foreach ($value as $key2 => $value2) {
    				$question_input[$key2][$key] = $value2;
    			}
    		}
        }

        ///// Get array of question id after insert question table
        $questions = [];
        if( count($question_input) ){
        	foreach ($question_input as $key => $value) {
        		$questionId = Common::getObject(Lession::find($id)->question->find($value['id']), 'id');

        		///// Tao/Chinh sua cau hoi
        		if( $questionId ){
        			CommonNormal::update($questionId, array_except($value, ['config']), 'Question');
        		} else{
        			$questionId = CommonNormal::create(array_except($value, ['config']), 'Question');
        		}
        		$lessionQuestion = LessionQuestion::where('lession_id', '=', $id)->where('qid', '=', $questionId);

                ///////// Tao/chinh sua config cho tung cau hoi
                $config = !empty($input['question_config']['config'][$key]) ? (array)json_decode($input['question_config']['config'][$key]) : [];
                $config['question_start'] = $input['question_config']['question_start'][$key];
                $config['question_end'] = $input['question_config']['question_end'][$key];

        		if( $lessionQuestion->count() ){
        			$lessionQuestion->update( ['config' => json_encode($config) ] );
        		} else{
        			CommonNormal::create([
	    				'lession_id' => $id,
	    				'qid' => $questionId,
	    				'config' => json_encode($config),
	    			], 'LessionQuestion');
        		}
        	}
        }

		return Redirect::back()->with('success', 'Lưu thành công!');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		CommonNormal::delete($id);
        return Redirect::action('LessionController@index');
	}


}
