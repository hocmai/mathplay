<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class GradeController extends AdminController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$data = GradeModel::orderBy('weight', 'asc')->paginate(PAGINATE);
		//dd($data);
		return View::make('admin.grade.index')->with(compact('data'));
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
		$data = GradeModel::findOrFail($id);
        return View::make('admin.grade.edit', array('data'=>$data));
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
		$rules = array();
		$rules = array(
            'title'   => 'required',
            'description'      => 'required',
        );

        $input = Input::except('_token');

		$validator = Validator::make($input,$rules);
		if($validator->fails()) {
			return Redirect::action('ManagerController@edit', $id)
	            ->withErrors($validator)
	            ->withInput();
        } else {
        	CommonNormal::update($id, $input, 'GradeModel');
    		return Redirect::action('GradeController@index');
        }
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		GradeModel::find($id)->delete();
        return Redirect::action('GradeController@index');
	}


}
