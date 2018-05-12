<?php
namespace App\Http\Controllers\Site;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\RedirectResponse;
use Validator;
use Services\HocmaiOAuth2;

class SiteUserController extends Controller {

	/**
	 * Hoc mai OAuth2
	 */
	public function hocmaiOAuth2(){
    	$messsages = [];
		$ssoLib = new HocmaiOAuth2();

		// get access token from authorize code
		$authCode = $ssoLib->getAuthorizeCode();

		if (!$authCode) {
		    $messsages['error'] = 'Không thể đăng nhập. Sai mã định danh!';
		} else {
		    $accessToken = $ssoLib->getAccessToken();
		    if ($accessToken) {   
		        $messsages = (array)$ssoLib->getResource($accessToken);
		        $messsages['success'] = 'Đăng nhập thành công';
		        $messsages['access_token'] = $accessToken;
		    }
		}
		return '
			<script>
				var messages = \''.json_encode($messsages).'\';
				window.opener.hocmaiOAuth.oauthCallback(messages);
	    		window.close();
    		</script>';
	}

	/**
	 * Show User login form
	 *
	 */
	public function loginForm()
	{	
		if( Auth::check() ){
			// return redirect()->action('SiteUserController@show', ['id' => Auth::user()->id]);
			// return Redirect::to('/');
			return redirect()->action('Site\SiteIndexController@home');
			// return redirect()->back()->with('success', 'Đăng nhập thành công!');
		} else{
			return view('site.user.login');
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
        $input = $this->request->except(['_token', 'remember']);
        $validator = Validator::make($input, $rules, $messsages);
        if ($validator->fails()) {
            return redirect()->back()
            	->withErrors($validator)
                ->withInput(request()->except('password'));
        } else {
        	$remember = $this->request->get('remember');
            if( Auth::attempt($input, !empty($remember) ? true : false ) ) {
        		return redirect()->to('/');
            } else {
                return redirect()->back()->withErrors(['failed' => 'Tên đăng nhập hoặc mật khẩu không đúng!']);
            }
        }
	}
	
	/**
	 * Show User register form
	 *
	 */
	public function registerForm()
	{
		return view('site.user.register');
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
		return view('site.user.login');
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
        Auth::logout();
        Session::flush();
        return redirect()->back();
    }

}
