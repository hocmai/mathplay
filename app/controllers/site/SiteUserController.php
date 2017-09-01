<?php

class SiteUserController extends SiteController {

	

	/**
	 * Show User login form
	 *
	 */
	public function loginForm()
	{
		if( Auth::user()->check() ){
			return Redirect::action('SiteUserController@show', ['id' => Auth::user()->get()->id]);
		} else{
			return View::make('site.user.login');
		}
	}

	/**
	 * Show User login form
	 *
	 */
	public function doLogin()
	{
		$rules = array(
            'username'   => 'required',
            'password'   => 'required',
        );
        $messsages = array(
			'username.required'=>'Tên đăng nhập/Email chưa được nhập',
			'password.required'=>'Mật khẩu không thể bỏ trống',
		);

        $input = Input::except('_token');
        $validator = Validator::make($input, $rules, $messsages);

        if ($validator->fails()) {
            return Redirect::back()
            	->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            if( Auth::user()->attempt($input, true) ) {
        		return Redirect::action('SiteIndexController@index');
            } else {
                return Redirect::back()->withErrors(['failed' => 'Tên đăng nhập hoặc mật khẩu không đúng!']);
            }
        }

	}
	
	/**
	 * Show User register form
	 *
	 */
	public function registerForm()
	{
		return View::make('site.user.register');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//$auth = Auth;
		//dd($auth);
		return View::make('site.user.login');
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

    public function logout()
    {
        Auth::user()->logout();
        Session::flush();
        return Redirect::back();
    }

}
