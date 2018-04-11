<?php

/*
|--------------------------------------------------------------------------
| Application & Route Filters
|--------------------------------------------------------------------------
|
| Below you will find the "before" and "after" events for the application
| which may be used to do any work before or after a request into your
| application. Here you may also register your custom route filters.
|
*/

App::before(function($request)
{
	//
});


App::after(function($request, $response)
{
	//
});

/*
|--------------------------------------------------------------------------
| Authentication Filters
|--------------------------------------------------------------------------
|
| The following filters are used to verify that the user of the current
| session is logged into this application. The "basic" filter easily
| integrates HTTP Basic authentication for quick, simple checking.
|
*/

Route::filter('limit_question', function()
{
	if (!Auth::user()->check()){
		// if( count( Session::get('anonymous_lesson') ) > 3 ){
		// 	return View::make('site.lession.error');
		// }
		return View::make('site.lession.error')->with('logged', false);
	}
	// neu chua dang nhap thi k lam dc bai
	else {

		$user_id = Auth::user()->get()->id ;
		$grade_slug = UserCourse::where('user_id', $user_id)->get()->lists('grade_slug');
		$currentGrade = Request::segment(1);
		
		//da dang nhap nhu  chua mua khoa hoc se lm dc 3 bai dau tien cua moi chuong
		if(!in_array($currentGrade ,$grade_slug )){
			
			$lessons = common::getLessonThereFree();
			$currentLesson = Request::segment(3);
			if(!in_array($currentLesson, $lessons)){
				return View::make('site.lession.error')->with('logged',true);
			}
		}
	}
});

Route::filter('auth', function()
{
	if (Auth::guest())
	{
		if (Request::ajax())
		{
			return Response::make('Unauthorized', 401);
		}
		else
		{
			return Redirect::guest('login');
		}
	}
});

Route::filter('admin', function()
{
	if (Auth::admin()->guest()){
		return Redirect::route('admin.login');
	}
});

Route::filter('auth.basic', function()
{
	return Auth::basic();
});

/*
|--------------------------------------------------------------------------
| Guest Filter
|--------------------------------------------------------------------------
|
| The "guest" filter is the counterpart of the authentication filters as
| it simply checks that the current user is not logged in. A redirect
| response will be issued if they are, which you may freely change.
|
*/

Route::filter('user', function()
{
	if (!Auth::user()->check()){
		return Redirect::action('SiteUserController@loginForm');
	}
});

Route::filter('guest', function()
{
	if (Auth::check()) return Redirect::to('/');
});

/*
|--------------------------------------------------------------------------
| CSRF Protection Filter
|--------------------------------------------------------------------------
|
| The CSRF filter is responsible for protecting your application against
| cross-site request forgery attacks. If this special token in a user
| session does not match the one given in this request, we'll bail.
|
*/

Route::filter('csrf', function()
{
	if (Session::token() != Input::get('_token'))
	{
		throw new Illuminate\Session\TokenMismatchException;
	}
});

Route::filter('owner', function($route)
{
	if (!Auth::user()->check()){
		return Redirect::action('SiteUserController@loginForm');
	}
	$id = $route->parameter('uid');
	if( $id != Auth::user()->get()->id ){
		App::abort(403);
	}
});
