<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class SubjectController extends AdminController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$data = Subject::orderBy('weight', 'asc')->paginate(PAGINATE);
		// dd($data);
		return view('admin.subject.index')->with(compact('data'));
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function search()
	{
		$input = Input::all();
		$data = Chapter::select('subjects.*');
		if( !empty($input['title']) ){
			$data = $data->where('subjects.title', 'LIKE' , '%'.$input['title'].'%');
		}
		$data = $data->join('grades', 'subjects.grade_id', '=', 'grades.id');

		if( !empty($input['grade']) ){
			$data = $data->where('grades.id', $input['grade']);
		}
		if( isset($input['status']) && $input['status'] != ''){
			$data = $data->where('subjects.status', $input['status']);
		}
		if( !empty($input['order_by']) ){
			$data = $data->orderBy('subjects.'.$input['order_by'], !empty($input['order']) ? $input['order'] : 'desc');
		} else{
			$data = $data->orderBy('subjects.created_at', 'desc');
		}
		$data = $data->paginate(PAGINATE);
		// dd(Input::get('order'));
		return view('admin.subject.index')->with(compact('data'))->with(compact('input'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{	
		return view('admin.subject.create');
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
		return Redirect::action('SubjectController@index')->with('success', 'Lưu thành công!');
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
		$data = Subject::find($id);
        return view('admin.subject.edit', array('data'=>$data));
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
    	CommonNormal::update($id, $input, 'Subject');
		return Redirect::action('SubjectController@index')->with('success', 'Lưu thành công!');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Subject::find($id)->delete();
        return Redirect::action('SubjectController@index')->with('success', 'Xóa thành công!');
	}


}
