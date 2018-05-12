<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Session;
use App\Models\Audio;
use Services\CommonUpload;
use Services\CommonNormal;

class AudioController extends AdminController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function saveConfirm(){
		$data = Session::get('data');
		return view('admin.audio.confirm');
		dd($data);
	}


	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$data = Audio::orderBy('created_at', 'desc')->paginate(PAGINATE);
		return view('admin.audio.index')->with(compact('data'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('admin.audio.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$title = request()->get('title');
		$slug = str_slug($title, '');
		$url = '';
		// dd(request()->all());

		if( request()->get('use-record') ){
			/// record sound
			$tmp_record = request()->get('tmp_record');
			if( !empty($tmp_record) ){
				$url = '/upload/studio/'.$slug.'.wav';
				@rename( public_path().$tmp_record, public_path().$url );
				@unlink(public_path().$tmp_record);
			}
		} else{
			//// upload file
			$file = request()->file('sound');
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
		return redirect()->action('AudioController@edit', ['id' => $id])->with('success', 'Lưu thành công!');
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
			return abort(404);
		}
		return view('admin.audio.create')->with(compact('data'));
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$data = Audio::find($id);
		$title = request()->get('title');
		$slug = str_slug($title, '');

		// if( Common::getObject($data, 'slug') != $slug ){
		// 	//// Slug & title changed
		// 	$checkExists = Audio::where('slug', $slug)->whereNotIn('id', [$id])->count();
		// 	if( $checkExists > 0 ){
		// 		/// Neu da ton tai 1 ban ghi trung ten
		// 		return redirect()->action('AudioController@saveConfirm')->with(['data' => request()->all()]);
		// 	}
		// }
		$url = request()->get('url');
		// dd(request()->all());

		if( request()->get('use-record') ){
			/// record sound
			$tmp_record = request()->get('tmp_record');
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
			$file = request()->file('sound');
			if( !empty($file) ){
				if( !empty($url) ){
					///// Remove old file
					@unlink(public_path().$url);
				}
				$url = '/upload/studio/'.$slug.'.wav';
				CommonUpload::uploadImage('/upload/studio/', 'sound', $slug.'.wav');
			}
		}
		$data->update([
			'title' => $title,
			'slug' => $slug,
			'url' => $url,
		]);

		return redirect()->back()->with('success', 'Lưu thành công!');
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
		return redirect()->action('AudioController@index')->with('success', 'Xóa thành công!');
	}


}
