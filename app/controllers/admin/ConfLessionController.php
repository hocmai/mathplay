<?php
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
		return View::make('admin.lession.config')->with(compact('data'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('admin.lession.add_config');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::except(['_token', '_method']);
		foreach ($input as $key => $value) {
			if( is_string($value) ){
				$input[$key] = trim($value);
			}
		}
		CommonConfig::set('lession', 'lession.config.'.Str::slug($input['name'], '_'), $input);
		return Redirect::action('ConfLessionController@index');
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
			App::abort(404);
		}
		// dd($config);
		return View::make('admin.lession.add_config')->with(compact('config', 'data'));
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$input = Input::except(['_token', '_method']);
		foreach ($input as $key => $value) {
			if( is_string($value) ){
				$input[$key] = trim($value);
			}
		}
		CommonConfig::set('lession', 'lession.config.'.Str::slug($input['name'], '_'), $input);
		return Redirect::action('ConfLessionController@index');
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
		return Redirect::action('ConfLessionController@index');
	}


}
