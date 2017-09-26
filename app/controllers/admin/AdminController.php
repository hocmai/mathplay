<?php
class AdminController extends BaseController {
    public function __construct() {
        $this->beforeFilter('admin', array('except'=>array('login','doLogin')));
    }
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$checkLogin = Auth::admin()->check();
        if($checkLogin) {
    		return View::make('admin.dashboard');
        } else {
            return View::make('admin.layout.login');
        }
	}

	/**
	 * Delete or update multi content
	 *
	 */
	public function operation(){
		$model = Input::get('model');
		if( empty($model) ) return Redirect::back()->with('success', 'Xóa thành công!');

		$data = (array)json_decode(Input::get('data'));
		$action = Input::get('action');
		if(count($data) == 0 | empty($action)){
			return Redirect::back()->with('error', 'Không có nội dung nào được chọn.');
		}

		$message = '';
		foreach ($data as $key => $value) {
			if( $action == 'delete' ){
				CommonNormal::delete($value, $model);
				$message = 'Đã xóa thành công '.($key+1).' nội dung';
			}
			else if( $action == 'unpublic' ){
				CommonNormal::update($value, ['status' => 0], $model);
				$message = 'Bỏ công bố '.($key+1).' nội dung';
			}
			else if( $action == 'public' ){
				CommonNormal::update($value, ['status' => 1], $model);
				$message = 'Đã công bố '.($key+1).' nội dung';
			}
		}
		// dd($data);
		return Redirect::back()->with('success', $message);
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

    }
	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{

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

    public function login()
    {
    	$checkLogin = Auth::admin()->check();
        if($checkLogin) {
	    	if (Auth::admin()->get()->status == ACTIVE) {
	    		return View::make('admin.dashboard');
	    		//return Redirect::route('admin.dashboard');
	    	}else{
	    		return View::make('admin.layout.login')->with(compact('message','chưa kich hoat'));
	    	}
        } else {
            return View::make('admin.layout.login');
        }
    }

    public function doLogin()
    {
        $rules = array(
            'username'   => 'required',
            'password'   => 'required',
        );
        $input = Input::except('_token');
        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            return Redirect::route('admin.login')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            $checkLogin = Auth::admin()->attempt($input, true);
            if($checkLogin) {
        		return Redirect::route('admin.dashboard');
            } else {
                return Redirect::route('admin.login');
            }
        }
    }

    public function logout()
    {
        Auth::admin()->logout();
        Session::flush();
        return Redirect::route('admin.login');
    }
}

