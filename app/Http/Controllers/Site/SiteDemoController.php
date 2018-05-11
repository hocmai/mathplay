<?php

namespace App\Http\Controllers\Site;

class SiteDemoController extends \BaseController {
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
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
	public function show($grade_slug)
	{
		////////// lay lop hoc co slug = $grade_slug
		$grade = Grade::findBySlug($grade_slug);
		if( $grade == null ){
			/// neu khong tim thay thi tra ve trang bao loi 404
			abort(404);
		}
		$subjects = $grade->subject->first();
		$chapters = [];
		if( count($subjects) ){
			$chapters = $subjects->chapter()->orderBy('weight', 'asc')->get();
		}
		
		return view('demo.demo')->with(compact('grade', 'subjects', 'chapters'));
		// //// lay mon hoc dau tien cua lop nay
		// $subject = $grade->subject->first();
		// if( $subject ){
		// 	////////// Lay danh sach cac chuong cua mon hoc nay, tra ve 1 mang cac object Model Chapter
		// 	$chapters = $subject->chapter;
			
		// 	$lessions = [];
		// 	/// Lay tat ca lession cua chapter nay
		// 	foreach ($chapters->lession as $lession) {
		// 		$lessions[] = $lession;
		// 	}
			
		// }
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
		//
	}


}
