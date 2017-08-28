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
		$data = lession::orderBy('weight', 'asc')->paginate(PAGINATE);
		// dd($data);
		return View::make('admin.lession.index')->with(compact('data'));
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
        $input['config'] = json_encode($input['config']);
        $input['author_id'] = Auth::admin()->get()->id;
        // dd($input);

    	$LessionId = CommonNormal::create($input);

    	//// Get query input to array
		$question_input = [];
        if($input['question']){
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
        		$questions[] = CommonNormal::create($value, 'Question');
        	}
        }


    	//// Get question_config input to array
		$question_config = [];
        if($input['question_config']){
    		foreach ($input['question_config'] as $key => $value) {
    			foreach ($value as $key2 => $value2) {
    				$question_config[$key2][$key] = $value2;
    			}
    		}
        }
        // dd($question_config);
        //// Insert lession_question table
        if(count($questions)){
        	foreach ($questions as $key => $questionId) {
        		CommonNormal::create([
    				'lession_id' => $LessionId,
    				'qid' => $questionId,
    				'config' => json_encode($question_config[$key])
    			], 'LessionQuestion');
        	}
        }

		return Redirect::action('LessionController@index');
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
		$data = lession::find($id);
        return View::make('admin.lession.edit', array('data'=>$data));
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
    	CommonNormal::update($id, $input);
		return Redirect::action('LessionController@index');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		lession::find($id)->delete();
        return Redirect::action('LessionController@index');
	}


}
