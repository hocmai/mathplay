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
    	// dd($LessionId);
    	//// Get query input to array
		$question_input = [];
        if( !empty($input['question']) ){
    		foreach ($input['question'] as $key => $value) {
    			foreach ($value as $key2 => $value2) {
    				$question_input[$key2][$key] = $value2;
    			}
    		}
        }

        // dd($question_input);
        //// Insert lession_question table
        if(count($question_input)){
        	foreach ($question_input as $key => $value) {
        		//// Create new question
        		$questionId = CommonNormal::create(array_except($value, ['config', 'id']), 'Question');

        		/////// Get config of question
        		$config = !empty($input['question_config']['config'][$key]) ? (array)json_decode($input['question_config']['config'][$key]) : [];
                $config['question_start'] = $input['question_config']['question_start'][$key];
                $config['question_end'] = $input['question_config']['question_end'][$key];

        		///////// Get sound by google translate
        		if( !empty($input['question_config']['get_auto_sound'][$key]) ){
    				$ch = curl_init('https://translate.google.com.vn/translate_tts?ie=UTF-8&q='. str_replace(' ', '%20', $value['title']) .'&tl=vi&client=tw-op');
					curl_setopt($ch, CURLOPT_FRESH_CONNECT, true);
					curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 15);
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
					$data = curl_exec($ch);
					$http = curl_getinfo($ch, CURLINFO_HTTP_CODE);
					if(curl_errno($ch) == 0 && $http == 200 && !empty($data)) {
		        		$sound_path = !empty($config['sound_title']) ? $config['sound_title'] : '/upload/question_sound_'.Str::slug($value['title'],'-').'.mp3';
		        		file_put_contents(public_path().$sound_path, $data);
		        		$config['sound_title'] = $sound_path;
					}
        		}
        		else{
        			$file = Input::file('question_config');
        			if( !empty($file['sound_input'][$key]) ){
        				$fileName = 'question_sound_'.Str::slug($value['title'],'-').'.mp3';
        				$sound = $file['sound_input'][$key];
        				$sound->move(public_path().'/upload', $fileName);
        				$config['sound_title'] = '/upload/'.$fileName;
        			}
        		}

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
		// dd($data->question->toArray());
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
    	CommonNormal::update($id, Input::except(['_token', 'question_config', 'question', 'sound_title']));

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

        		///////// Get sound by google translate
        		if( !empty($input['sound_title'][$key]) ){
        			$config['sound_title'] = $input['sound_title'][$key];
        		}
        		if( !empty($input['question_config']['get_auto_sound'][$key]) ){
    				$ch = curl_init('https://translate.google.com.vn/translate_tts?ie=UTF-8&q='. str_replace(' ', '%20', $value['title']) .'&tl=vi&client=tw-op');
					curl_setopt($ch, CURLOPT_FRESH_CONNECT, true);
					curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 15);
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
					$data = curl_exec($ch);
					$http = curl_getinfo($ch, CURLINFO_HTTP_CODE);
					if(curl_errno($ch) == 0 && $http == 200 && !empty($data)) {
		        		$sound_path = !empty($config['sound_title']) ? $config['sound_title'] : '/upload/question_sound_'.Str::slug($value['title'],'-').'.mp3';
		        		file_put_contents(public_path().$sound_path, $data);
		        		$config['sound_title'] = $sound_path;
					}
        		}
        		else{
        			$file = Input::file('question_config');
        			if( !empty($file['sound_input'][$key]) ){
        				$fileName = 'question_sound_'.Str::slug($value['title'],'-').'.mp3';
        				$sound = $file['sound_input'][$key];
        				$sound->move(public_path().'/upload', $fileName);
        				$config['sound_title'] = '/upload/'.$fileName;
        			}
        		}

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
		$questions = Lession::find($id)->question;
		foreach ($questions as $key => $value) {
			/// Delete in Lession_question and question table
			CommonNormal::delete($value->id, 'Question');
			LessionQuestion::where('lession_id', $id)
				->where('qid', $value->id)
				->delete();
		}
		CommonNormal::delete($id);
        return Redirect::action('LessionController@index');
	}


}
