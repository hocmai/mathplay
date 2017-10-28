<?php

class AudioController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$data = Audio::orderBy('created_at', 'desc')->paginate(PAGINATE);
		return View::make('admin.audio.index')->with(compact('data'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('admin.audio.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$title = Input::get('title');
		$tmp_record = Input::get('tmp_record');
		$slug = Str::slug($title, '');
		$url = '';
		// dd($tmp_record);
		if( !empty($tmp_record) ){
			$url = '/upload/studio/'.$slug.'.wav';
			copy( public_path().$tmp_record, public_path().$url );
			// $file = move_uploaded_file( $tmp_record, public_path().$url);
		}

		// dd($url, $tmp_record);
		CommonNormal::create([
			'title' => $title,
			'slug' => $slug,
			'url' => $url,
		], 'Audio');
		return Redirect::action('AudioController@index')->with('success', 'Lưu thành công!');
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
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		CommonNormal::delete($id, 'Audio');
		return Redirect::action('AudioController@index')->with('success', 'Xóa thành công!');
	}


}
