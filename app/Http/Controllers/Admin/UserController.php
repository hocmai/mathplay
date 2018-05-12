<?php

namespace App\Http\Controllers\Admin;
use App\Models\User;
use Services\CommonNormal;
use Services\AdminManager;
use Hash;
class UserController extends AdminController {

	/**
	 * Display a listing of the resource.
	 * Method GET
	 * @return Response
	 */
	public function index()
	{
		$data = User::orderBy('created_at', 'desc')->paginate(PAGINATE);
		// dd(User::all());
		return view('admin.user.index')->with(compact('data'));
	}

	// search user
	public function search()
	{
		$input = request()->all();
		if (!$input['keyword'] && !$input['username'] && $input['start_date'] && $input['end_date']) {
			return redirect()->action('UserController@index');
			// lay tat ca cac du lieu tu cot input ... nếu k tìm thấy các thuộc tinh trên thì trả về index
		}
		$data = AdminManager::searchUserOperation($input);
		return view('admin.user.index')->with(compact('data'));
		
	}

	/**
	 * Show the form for creating a new resource.
	 * Method GET
	 * @return Response
	 */
	public function create()
	{
		return view('admin.user.create');
	}


	/**
	 * Store a newly created resource in storage.
	 * Method POST
	 * @return Response
	 */
	public function store()
	{
		$rules = array(
			'username'   => 'required|unique:users',
            'password'   => 'required|confirmed|min:6',
            'email'      => 'required|email|unique:users',
		);
		$input = request()->all();
		$validator = Validator::make($input,$rules);
		// dd($input);

		if($validator->fails()) {
			return redirect()->action('UserController@create')
	            ->withErrors($validator)
	            ->withInput(request()->except('password'));
        } else {
        	$input['password'] = Hash::make($input['password']);
        	$id = User::create($input)->id;
        	if($id) {
        		return redirect()->action('UserController@index')->with('message', 'Người dùng <ins>'.$input['username'].'<ins> được tạo thành công!');
        	} else {
        		return redirect()->back()->with('error', 'Lưu thất bại!');
        	}
        }
	}


	/**
	 * Display the specified resource.
	 * Method GET
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 * Method GET
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$data = User::findOrFail($id);
        return view('admin.user.edit', array('data'=>$data));
	}


	/**
	 * Update the specified resource in storage.
	 * Method PUT
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$input = request()->except('_token');
    	CommonNormal::update($id, $input, 'User');
		return redirect()->action('UserController@index')->with('success', 'Lưu thành công!');
	}


	/**
	 * Remove the specified resource from storage.
	 * Method DELETE
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		CommonNormal::delete($id, 'User');
		return redirect()->action('UserController@index')->with('success', 'Tài khoản đã bị xóa!');;
	}


	/**
	 * Change password
	 * Method GET
	 * @param int $id
	 **/
	public function changePassword($id){
		$currentUserId = Auth::guard('admin')->user()->id;
		$currentRoleId = Auth::guard('admin')->user()->role_id;
		if($currentRoleId <> ADMIN) {
			dd('error permission');
		}

		$data = User::find($id);
        return view('admin.user.changepassword')->with(compact('data'));
	}


	/**
	 * update password
	 * Method POST
	 * @param int $id
	 **/
	public function updatePassword($id){
		$rules = array(
			'password'   => 'required|min:6|confirmed',
		);
		$input = request()->except('_token');
		$validator = Validator::make($input,$rules);
		if($validator->fails()) {
			return redirect()->action('UserController@changePassword',$id)
	            ->withErrors($validator)
	            ->withInput(request()->except('password'));
        } else {
    		$inputPass['password'] = Hash::make($input['password']);
    		CommonNormal::update($id, $inputPass, 'User');
        }
        return redirect()->action('UserController@changePassword', $id)->with('success', 'Đổi mật khẩu thành công!');
	}


}
