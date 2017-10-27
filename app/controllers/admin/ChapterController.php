<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class ChapterController extends AdminController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$data = Chapter::orderBy('created_at', 'desc')->paginate(PAGINATE);
		// dd($data);
		return View::make('admin.chapter.index')->with(compact('data'));
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function search()
	{
		$input = Input::all();
		$data = Chapter::select('chapters.*');
		if( !empty($input['title']) ){
			$data = $data->where('chapters.title', 'LIKE' , '%'.$input['title'].'%');
		}
		$data = $data->join('subjects', 'chapters.subject_id', '=', 'subjects.id')
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
			$data = $data->where('chapters.status', $input['status']);
		}
		if( !empty($input['order_by']) ){
			$data = $data->orderBy('chapters.'.$input['order_by'], !empty($input['order']) ? $input['order'] : 'desc');
		} else{
			$data = $data->orderBy('chapters.created_at', 'desc');
		}
		$data = $data->paginate(PAGINATE);
		// dd(Input::get('order'));
		return View::make('admin.chapter.index')->with(compact('data'))->with(compact('input'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{	
		return View::make('admin.chapter.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        $input = Input::except('_token');
        $input['author_id'] = Auth::admin()->get()->id;
        // dd($input);
    	$enId = CommonNormal::create($input);
		return Redirect::action('ChapterController@index')->with('success', 'Lưu thành công!');
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
		$data = Chapter::find($id);
        return View::make('admin.chapter.edit', array('data'=>$data));
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
		return Redirect::action('ChapterController@index')->with('success', 'Lưu thành công!');
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
        return Redirect::action('ChapterController@index');
	}


}
