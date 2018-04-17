<?php
use \HocmaiOAuth2;
class AjaxController extends BaseController {

    private $HocmaiOAuth;
    function __construct(HocmaiOAuth2 $HocmaiOAuth){
        $this->HocmaiOAuth = $HocmaiOAuth;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function nodeSort($model)
    {
        try{
            $nodeIds = Input::get('node_ids');
            if( count($nodeIds) && !empty($model) ){
                $model = studly_case($model);
                foreach ($nodeIds as $key => $value) {
                    if( isset($value['id'], $value['weight']) ){
                        CommonNormal::update($value['id'], ['weight' => $value['weight']], $model);
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
            if( !empty($_FILES['file']) ){
                move_uploaded_file( $_FILES['file']['tmp_name'], public_path().'/upload/tmp/'.time().'.wav');
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
                $checkUserExists = User::where('username', $input['username'])
                    ->where('email', $input['email'])->first();
                
                $exists = true;
                $uid = Common::getObject($checkUserExists, 'id');
                if( empty($uid) ){
                    $uid = CommonNormal::create([
                        'username' => $input['username'],
                        'email' => $input['email'],
                    ], 'User');
                    $exists = false;
                }

                // if( Common::getObject($checkUserExists, 'id') )
                // $checkUserExists =  CommonNormal::findOrCreate([
                //  'username' => $input['username'],
                //  'email' => $input['email'],
                // ], 'User', false);

                if( !$exists | (Common::getObject($checkUserExists, 'deleted_at') == null &&  Common::getObject($checkUserExists, 'status') == 1) ){
                    // $uid = Common::getObject($checkUserExists, 'id');
                    if(Auth::user()->loginUsingId($uid, true)){
                        $messages = ['message' => 'Đăng nhập thành công! Tải lại trang...', 'status' => 'success'];
                        $accessToken = $input['access_token'];
                        $packages = $this->HocmaiOAuth->getResource('/me/packages');
                        return Response::json([$packages, $messages, $input]);
                    }
                    return Response::json($input);
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
        $id = Input::get('id');
        $form = CommonQuestion::getConfigForm($type, null, $id);
        return Response::json($form);
    }

    /**
     * Update study history
     */
    public function updateStudyHistory(){
        $data = Input::get('data');
        if(empty($data)) return Response::json(false);
        $data = json_decode($data, true);
        $lesson = Lession::find($data['lession_id']);
        $lessonConf = Common::getConfigOfLesson($lesson);

        if( Auth::user()->check() ){
            $author = Common::getObject(Auth::user()->get(), 'id');
            $data['author'] = $author;
            $data['status'] = $data['completed'] = 0;

            $study_history = StudyHistory::firstOrCreate(array_except($data, ['score' , 'current_question', 'completed', 'time_use']));
            if( empty($data['current_question']) ){
                $data['current_question'] = ($study_history->current_question > 0) ? $study_history->current_question + 1 : 1;
            }

            if( $data['current_question'] > $lessonConf['number_ques'] ){
                $data['completed'] = $data['status'] = 1;
                $data['current_question'] = $lessonConf['number_ques'];
            }
            if( empty($data['score']) ){
                $data['score'] = $study_history->score + $lessonConf['score'];
            }
            $data['score'] = ($data['score'] >= $lessonConf['max_score'] ) ? $lessonConf['max_score'] : $data['score'];
            $data['star'] = Common::getRuleOfStar($data['score'], $lessonConf);
            StudyHistory::find($study_history->id)->update($data);
        }
        else{
            $data['score'] = ( $data['score'] >= $lessonConf['max_score'] ) ? $lessonConf['max_score'] : $data['score'];
            $data['star'] = Common::getRuleOfStar($data['score'], $lessonConf);
        }
        return Response::json($data);
    }

}
