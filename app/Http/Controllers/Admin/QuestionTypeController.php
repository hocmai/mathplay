<?php

namespace App\Http\Controllers\Admin;
use App\Models\ConfigModel;
use App\Models\LessionQuestion;
use Services\CommonQuestion;
use Services\CommonConfig;
use Services\CommonUpload;
use Services\CommonNormal;

class QuestionTypeController extends AdminController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$data = ConfigModel::where('collection', '=', 'question_type')->paginate(50);
		// $data = Lession::orderBy('weight', 'asc')->paginate(15);
		// dd($data);
		return view('admin.lession.question_type')->with(compact('data'));
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function refresh()
	{
		$getType = CommonQuestion::getAllType();
		foreach ($getType as $key => $value) {
			$config = CommonConfig::get('question_type.config.'.$key);
			if(!$config){
				CommonConfig::set('question_type', 'question_type.config.'.$key, [
					'name' => $value,
					'key' => $key,
				]);
			}
		}
		// dd(CommonConfig::collect('question_type'));
		return redirect()->action('QuestionTypeController@index')->with('success', 'Cập nhật thành công!');
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($type)
	{
		$data = ConfigModel::where('collection', '=', 'question_type')
			->where('name', '=', 'question_type.config.'.$type)
			->firstOrFail();
        return view('admin.lession.question_type_edit', array('data'=>$data));
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
	public function update($type)
	{
        $input = request()->except('_token');
        $config = ['description' => $input['description']];
        $config['images'] = [];
        $new_images = request()->get('images_new');
    	// dd($new_images);
        if( !empty($new_images['image_url']) ){
        	foreach ($new_images['image_url'] as $key => $value) {
        		$config['images'][] = [
        			'image_url' => $value,
        			'image_title' => !empty($new_images['image_title'][$key]) ? $new_images['image_title'][$key] : ''
        		];
        	}
        }

        $thumb = request()->file('thumb');
		if( !empty($thumb) ){
			$ext = pathinfo($thumb->getClientOriginalName());
			$config['thumb_url'] = CommonUpload::uploadImage( '/upload/question_type', 'thumb', $type.'.'.$ext['extension'] );
		}
  //      	if (Input::hasFile('images_new')){
  //       	$path = '/questions/'. str_replace('question_type.config.', '', $type).'/img';
  //       	$file = request()->file('image');
		//     $file->move( public_path().$path, $file->getClientOriginalName());
  //       	$config['images'][] = $path.'/'.$file->getClientOriginalName();
		// }

        CommonConfig::set('question_type', $type, $config);
		return redirect()->back()->with('success', 'Cập nhật thành công!');
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{	
		return view('admin.lession.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        $input = request()->except(['_token']);
        $input['author'] = Auth::guard('admin')->user()->id;

		return redirect()->action('QuestionTypeController@index');
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
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		CommonNormal::delete($id);
        return redirect()->action('QuestionTypeController@index');
	}


}
