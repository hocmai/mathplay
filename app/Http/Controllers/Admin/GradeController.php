<?php
namespace App\Http\Controllers\Admin;
use App\Models\Grade;
use App\Models\Chapter;
use Services\CommonNormal;

class GradeController extends AdminController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$data = Grade::orderBy('weight', 'asc')->paginate(PAGINATE);
		return view('admin.grade.index')->with(compact('data'));
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function search()
	{
		$input = request()->all();
		$data = Chapter::select('grades.*');
		if( !empty($input['title']) ){
			$data = $data->where('grades.title', 'LIKE' , '%'.$input['title'].'%');
		}
		if( isset($input['status']) && $input['status'] != ''){
			$data = $data->where('grades.status', $input['status']);
		}
		if( !empty($input['order_by']) ){
			$data = $data->orderBy('grades.'.$input['order_by'], !empty($input['order']) ? $input['order'] : 'desc');
		} else{
			$data = $data->orderBy('grades.created_at', 'desc');
		}
		$data = $data->paginate(PAGINATE);
		// dd(request()->get('order'));
		return view('admin.grade.index')->with(compact('data'))->with(compact('input'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('admin.grade.create')->with(compact('data'));
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = request()->except('_token');
        $input['author_id'] = Auth::guard('admin')->user()->id;
        // dd($input);
    	$enId = CommonNormal::create($input, 'Grade');
		return redirect()->action('GradeController@index')->with('success', 'Lưu thành công!');
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
		$data = Grade::findOrFail($id);
        return view('admin.grade.edit', array('data'=>$data));
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
		$input = request()->except('_token');
    	CommonNormal::update($id, $input, 'Grade');
		return redirect()->action('GradeController@index')->with('success', 'Lưu thành công!');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Grade::find($id)->delete();
        return redirect()->action('GradeController@index')->with('success', 'Xóa thành công!');
	}


}
