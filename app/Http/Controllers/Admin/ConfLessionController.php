<?php

namespace App\Http\Controllers\Admin;
use App\Models\Chapter;
use App\Models\ConfigModel;
use Services\CommonConfig;
class ConfLessionController extends AdminController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$data = CommonConfig::collect('lession');
		// dd($data[0]->name);
		return view('admin.lession.config')->with(compact('data'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('admin.lession.add_config');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = request()->except(['_token', '_method']);
		foreach ($input as $key => $value) {
			if( is_string($value) ){
				$input[$key] = trim($value);
			}
		}
		CommonConfig::set('lession', 'lession.config.'.str_slug($input['name'], '_'), $input);
		return redirect()->action('ConfLessionController@index')->with('success', 'Lưu thành công!');
		// dd($input);
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($name)
	{
		$data = ConfigModel::where('name', '=', $name)->get()->first();
		$config = CommonConfig::get($name);
		if(!$config | !$data){
			abort(404);
		}
		// dd($config);
		return view('admin.lession.add_config')->with(compact('config', 'data'));
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$input = request()->except(['_token', '_method']);
		foreach ($input as $key => $value) {
			if( is_string($value) ){
				$input[$key] = trim($value);
			}
		}
		CommonConfig::set('lession', 'lession.config.'.str_slug($input['name'], '_'), $input);
		return redirect()->back()->with('success', 'Cập nhật thành công!');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($name)
	{
		ConfigModel::where('name', '=', $name)->delete();
		return redirect()->action('ConfLessionController@index');
	}


}
