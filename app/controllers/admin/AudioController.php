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
		$slug = Str::slug($title, '');
		$url = '';
		// dd(Input::all());

		if( Input::get('use-record') ){
			/// record sound
			$tmp_record = Input::get('tmp_record');
			if( !empty($tmp_record) ){
				$url = '/upload/studio/'.$slug.'.wav';
				@rename( public_path().$tmp_record, public_path().$url );
				@unlink(public_path().$tmp_record);
			}
		} else{
			//// upload file
			$file = Input::file('sound');
			if( !empty($file) ){
				$url = '/upload/studio/'.$slug.'.wav';
				CommonUpload::uploadImage('/upload/studio/', 'sound', $slug.'.wav');
			}
		}

		$id = CommonNormal::create([
			'title' => $title,
			'slug' => $slug,
			'url' => $url,
		], 'Audio');
		return Redirect::action('AudioController@edit', ['id' => $id])->with('success', 'Lưu thành công!');
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
		$data = Audio::find($id);
		if( !($data) ){
			return App::abort(404);
		}
		return View::make('admin.audio.create')->with(compact('data'));
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$title = Input::get('title');
		$slug = Str::slug($title, '');
		$url = Input::get('url');
		// dd(Input::all());

		if( Input::get('use-record') ){
			/// record sound
			$tmp_record = Input::get('tmp_record');
			if( !empty($tmp_record) ){
				if( !empty($url) ){
					///// Remove old file
					@unlink(public_path().$url);
				}
				$url = '/upload/studio/'.$slug.'.wav';
				@rename( public_path().$tmp_record, public_path().$url );
				// @unlink(public_path().$tmp_record);
			}
		} else{
			//// upload file
			$file = Input::file('sound');
			if( !empty($file) ){
				if( !empty($url) ){
					///// Remove old file
					@unlink(public_path().$url);
				}
				$url = '/upload/studio/'.$slug.'.wav';
				CommonUpload::uploadImage('/upload/studio/', 'sound', $slug.'.wav');
			}
		}

		CommonNormal::update($id ,[
			'title' => $title,
			'slug' => $slug,
			'url' => $url,
		], 'Audio');

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
		CommonNormal::delete($id, 'Audio');
		return Redirect::action('AudioController@index')->with('success', 'Xóa thành công!');
	}


}
