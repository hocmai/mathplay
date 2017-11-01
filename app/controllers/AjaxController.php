<?php

class AjaxController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function sortLession()
	{
		try{
			$nodeIds = Input::get('node_ids');
			if( count($nodeIds) ){
				// return Response::json($nodeIds);
				foreach ($nodeIds as $key => $value) {
					if( isset($value['id'], $value['weight']) ){
						CommonNormal::update($value['id'], ['weight' => $value['weight']], 'Lession');
					}
				}
				return Response::json('Thứ tự được sắp xếp thành công');
			}
		}
		catch( Exception $e ){
			return Response::json($e->getMessage());
		}
	}

	/**
	 * Save file to tmp
	 */
	public function saveTmpFile(){
		try{
			$data = Input::get('file');
			if( !empty($data) ){
				list($type, $data) = explode(';', $data);
				list(, $data)      = explode(',', $data);
				$data = base64_decode($data);
				file_put_contents(public_path().'/upload/tmp/'.time().'.wav', $data);
				// move_uploaded_file( $_FILES['file']['tmp_name'], public_path().'/upload/tmp/'.time().'.wav');
				return Response::json(['data' => '/upload/tmp/'.time().'.wav']);
			}
		}
		catch( Exception $e ){
			return Response::json($e->getMessage());
		}
	}

	public function removeQuestionTypeImgage(){
		try{
			$this->removeFile();
			$path = Input::get('path');
			$type = Input::get('type');
			$config = CommonConfig::get('question_type.config.'.$type);

			if( !empty($config['images']) ){
				foreach ($config['images'] as $key => $value) {
					if( isset($value['image_url']) && $value['image_url'] == $path ){
						unset($config['images'][$key]);
						break;
					}
				}
				CommonConfig::set('question_type', 'question_type.config.'.$type, $config);
			}
			return Response::json($config['images']);
		}
		catch( Exception $e ){
			return Response::json($e->getMessage());
		}
		// return Response::json(CommonConfig::get('question_type.config.'.$type));
	}

	/**
	 * Upload file ajax
	 **/
	public function uploadFile(){
		try{
			if( !empty($_FILES['file']) ){
				$name = $_FILES['file']['name'];
				$path = Input::get('path') ? Input::get('path') : "/uploads/".date('Y').'/'.date('m');
				if ( move_uploaded_file($_FILES['file']['tmp_name'], public_path().$path.'/'.$name) ) {
	                return Response::json(['url' => $path.'/'.$name, 'name' => $name]);
	            }
			}
		}
		catch( Exception $e ){
			return Response::json($e->getMessage());
		}
		return Response::json(false);
	}


	/**
	 * Remove file ajax
	 **/
	public function removeFile($path = ''){
		try{
			if( Input::get('path') ){
				return Response::Json( File::delete(public_path().Input::get('path')) );
			}
		}
		catch( Exception $e ){
			return Response::json($e->getMessage());
		}
		return Response::json(false);
	}


	/**
	 * Hoc mai oauthCallback ajax
	 **/
	public function oauthCallback(){
		$input = Input::all();
		$messages = ['message' => 'Đăng nhập không thành công! Có thể tài khoản đang bị tạm khóa, hãy liên hệ với quản trị viên để được hỗ trợ', 'status' => 'error'];

		if( Auth::user()->check() ){
			$messages = ['message' => 'Đăng nhập thành công! Tải lại trang...', 'status' => 'success'];
		}
		elseif( $input['success'] ){
			if( isset($input['email'], $input['username']) ){
				$checkUserExists =  CommonNormal::findOrCreate([
					'username' => $input['username'],
					'email' => $input['email'],
				], 'User', false);

				if( Common::getObject($checkUserExists, 'deleted_at') == null &&  Common::getObject($checkUserExists, 'status') == 1 ){
					$uid = Common::getObject($checkUserExists, 'id');
					if(Auth::user()->loginUsingId($uid, true)){
						$messages = ['message' => 'Đăng nhập thành công! Tải lại trang...', 'status' => 'success'];
					}
				}else{
					$messages['message'] = 'Tài khoản đã bị xóa hoặc tạm khóa! Vui lòng liên hệ với Admin để được hỗ trợ.';
				}
			}
		}
		// return '';
		return Response::json($messages);
	}


	/**
	 * Delete question of a lession
	 */
	public function deleteQuestion(){
		if (Auth::admin()->guest() | !Request::ajax()){
			App::abort(403);
		}
		$input = Input::all();
		try{
			//////// Xoa quan he n-n
			LessionQuestion::where('lession_id', '=', $input['lession_id'])->where('qid', '=', $input['qid'])->delete();

			//////// Xoa question
			CommonNormal::delete($input['qid'], 'Question');
		} catch (Exception $e) {
			return Response::json($e);
		}

		return Response::json(true);
	}

	/**
	 * Get question config form by question type
	 */
	public function getQuestionConfigForm()
	{
		$type = Input::get('type');
		$form = CommonQuestion::getConfigForm($type);
		return Response::json($form);
	}

	/**
	 * Update study history
	 */
	public function updateStudyHistory(){
		$data = Input::get('data');
		if(empty($data)) return Response::json(false);

		if( Auth::user()->check() ){
			$author = Common::getObject(Auth::user()->get(), 'id');
			$data = (array)json_decode($data);
			$data['author'] = $author;
			$data['status'] = 0;

			$study_history = StudyHistory::firstOrCreate(array_except($data, ['score' , 'current_question', 'completed', 'time_use']));
			if( $data['completed'] == 1 ){
				$data['status'] = 1;
			}
			StudyHistory::find($study_history->id)->update($data);
			return Response::json($study_history);
		}
	}

}
