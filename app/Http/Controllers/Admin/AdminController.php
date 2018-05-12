<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Services\CommonNormal;
use Illuminate\Support\Facades\Auth;
use Validator;

class AdminController extends Controller {
    public function __construct() {
        // $this->beforeFilter('admin', array('except'=>array('login','doLogin')));
    }
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$checkLogin = Auth::guard('admin')->check();
        if($checkLogin) {
    		return view('admin.dashboard');
        } else {
            return view('admin.layout.login');
        }
	}

	/**
	 * Delete or update multi content
	 *
	 */
	public function operation(){
		$model = request()->get('model');
		if( empty($model) ) return redirect()->back()->with('success', 'Xóa thành công!');

		$data = (array)json_decode(request()->get('data'));
		$action = request()->get('action');
		if(count($data) == 0 | empty($action)){
			return redirect()->back()->with('error', 'Không có nội dung nào được chọn.');
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
		return redirect()->back()->with('success', $message);
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
    	$checkLogin = Auth::guard('admin')->check();
        if($checkLogin) {
	    	if (Auth::guard('admin')->user()->status == ACTIVE) {
	    		return view('admin.dashboard');
	    		//return redirect()->route('admin.dashboard');
	    	}else{
	    		return view('admin.layout.login')->with(compact('message','chưa kich hoat'));
	    	}
        } else {
            return view('admin.layout.login');
        }
    }

    public function doLogin()
    {
        $rules = array(
            'username'   => 'required',
            'password'   => 'required',
        );
        $input = request()->except('_token');
        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            return redirect()->route('admin.login')
                ->withErrors($validator)
                ->withInput(request()->except('password'));
        } else {
            $checkLogin = Auth::guard('admin')->attempt($input, true);
            if($checkLogin) {
        		return redirect()->action('Admin\ManagerController@index');
            } else {
                return redirect()->route('admin.login');
            }
        }
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        // Session::flush();
        return redirect()->route('admin.login');
    }
}

