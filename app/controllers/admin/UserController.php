<?php

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
		return View::make('admin.user.index')->with(compact('data'));
	}

	// search user
	public function search()
	{
		$input = Input::all();
		if (!$input['keyword'] && !$input['username'] && $input['start_date'] && $input['end_date']) {
			return Redirect::action('UserController@index');
		}
		$data = AdminManager::searchUserOperation($input);
		return View::make('admin.user.index')->with(compact('data'));
	}

	/**
	 * Show the form for creating a new resource.
	 * Method GET
	 * @return Response
	 */
	public function create()
	{
		return View::make('admin.user.create');
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
		$input = Input::all();
		$validator = Validator::make($input,$rules);
		// dd($input);

		if($validator->fails()) {
			return Redirect::action('UserController@create')
	            ->withErrors($validator)
	            ->withInput(Input::except('password'));
        } else {
        	$input['password'] = Hash::make($input['password']);
        	$id = User::create($input)->id;
        	if($id) {
        		return Redirect::action('UserController@index')->with('message', 'Người dùng <ins>'.$input['username'].'<ins> được tạo thành công!');
        	} else {
        		return Redirect::back()->with('error', 'Lưu thất bại!');
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
        return View::make('admin.user.edit', array('data'=>$data));
	}


	/**
	 * Update the specified resource in storage.
	 * Method PUT
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$input = Input::except('_token');
    	CommonNormal::update($id, $input, 'User');
		return Redirect::action('UserController@index')->with('success', 'Lưu thành công!');
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
		return Redirect::action('UserController@index')->with('success', 'Tài khoản đã bị xóa!');;
	}


	/**
	 * Change password
	 * Method GET
	 * @param int $id
	 **/
	public function changePassword($id){
		$currentUserId = Auth::admin()->get()->id;
		$currentRoleId = Auth::admin()->get()->role_id;
		if($currentRoleId <> ADMIN) {
			dd('error permission');
		}

		$data = User::find($id);
        return View::make('admin.user.changepassword')->with(compact('data'));
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
		$input = Input::except('_token');
		$validator = Validator::make($input,$rules);
		if($validator->fails()) {
			return Redirect::action('UserController@changePassword',$id)
	            ->withErrors($validator)
	            ->withInput(Input::except('password'));
        } else {
    		$inputPass['password'] = Hash::make($input['password']);
    		CommonNormal::update($id, $inputPass, 'User');
        }
        return Redirect::action('UserController@changePassword', $id)->with('success', 'Đổi mật khẩu thành công!');
	}


}
