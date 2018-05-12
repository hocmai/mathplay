<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Services\CommonNormal;
use Services\HocmaiOAuth2;
use Services\CommonConfig;
use Services\Common;
use Services\CommonQuestion;

use App\Models\UserCourse;
use App\Models\StudyHistory;
use App\Models\Grade;
use App\Models\Chapter;
use App\Models\Subject;
use App\Models\Lession;

class AjaxController extends Controller {

    private $HocmaiOAuth;
    protected $request;

    function __construct(HocmaiOAuth2 $HocmaiOAuth, Request $request){
        $this->HocmaiOAuth = $HocmaiOAuth;
        $this->request = $request;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function nodeSort($model)
    {
        try{
            $nodeIds = $this->request->get('node_ids');
            if( count($nodeIds) && !empty($model) ){
                $model = studly_case($model);
                foreach ($nodeIds as $key => $value) {
                    if( isset($value['id'], $value['weight']) ){
                        CommonNormal::update($value['id'], ['weight' => $value['weight']], $model);
                    }
                }
                return response()->json('Thứ tự được sắp xếp thành công');
            }
        }
        catch( Exception $e ){
            return response()->json($e->getMessage());
        }
    }

    /**
     * Save file to tmp
     */
    public function saveTmpFile(){
        try{
            if( !empty($_FILES['file']) ){
                move_uploaded_file( $_FILES['file']['tmp_name'], public_path().'/upload/tmp/'.time().'.wav');
                return response()->json(['data' => '/upload/tmp/'.time().'.wav']);
            }
        }
        catch( Exception $e ){
            return response()->json($e->getMessage());
        }
    }

    public function removeQuestionTypeImgage(){
        try{
            $this->removeFile();
            $path = $this->request->get('path');
            $type = $this->request->get('type');
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
            return response()->json($config['images']);
        }
        catch( Exception $e ){
            return response()->json($e->getMessage());
        }
        // return response()->json(CommonConfig::get('question_type.config.'.$type));
    }

    /**
     * Upload file ajax
     **/
    public function uploadFile(){
        try{
            if( !empty($_FILES['file']) ){
                $name = $_FILES['file']['name'];
                $path = $this->request->get('path') ? $this->request->get('path') : "/uploads/".date('Y').'/'.date('m');
                if ( move_uploaded_file($_FILES['file']['tmp_name'], public_path().$path.'/'.$name) ) {
                    return response()->json(['url' => $path.'/'.$name, 'name' => $name]);
                }
            }
        }
        catch( Exception $e ){
            return response()->json($e->getMessage());
        }
        return response()->json(false);
    }


    /**
     * Remove file ajax
     **/
    public function removeFile($path = ''){
        try{
            if( $this->request->get('path') ){
                return response()->json( File::delete(public_path().$this->request->get('path')) );
            }
        }
        catch( Exception $e ){
            return response()->json($e->getMessage());
        }
        return response()->json(false);
    }


    /**
     * Hoc mai oauthCallback ajax
     **/
    public function oauthCallback(){
        $input = request()->all();
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
                        /*
                        | --------------------------------------------------------------------------
                        | TODO: Lay danh sach khoa hoc tu hoc mai, insert vao bang user_cource
                        | --------------------------------------------------------------------------
                        | @params $input['something']
                        | @autho : dangnv
                        | @suggest: Chay vong lap $input['xxx'] de lay danh sach ma khoa hoc cua hoc mai
                        |           Lay nhung ma khoa hoc cua cac lop 1, 2, 3 (neu co), doi chieu voi cac record
                        |           trong bang grade de insert database
                        */
                        
                        $messages = ['message' => 'Đăng nhập thành công! Tải lại trang...', 'status' => 'success'];
                        $accessToken = $input['access_token'];
                        $packages = (array)$this->HocmaiOAuth->getResource('/me/packages', $accessToken);
                        if( is_array($packages) && count($packages) ){
                            UserCourse::where('user_id', $uid)->delete();
                            foreach ($packages as $value) {
                                $value = (array)$value;
                                if( !empty($value['id']) && !empty($value['name']) ){
                                    if( $value['id'] == 1425 | $value['name'] == 'Mathplay lớp 1' ){
                                        UserCourse::create([
                                            'user_id' => $uid,
                                            'hocmai_course_id' => $value['id'],
                                            'grade_slug' => 'lop-1',
                                        ]);
                                    } else if( $value['id'] == 1423 | $value['name'] == 'Mathplay lớp 2' ){
                                        UserCourse::create([
                                            'user_id' => $uid,
                                            'hocmai_course_id' => $value['id'],
                                            'grade_slug' => 'lop-2',
                                        ]);
                                    } else if( $value['id'] == 1424 | $value['name'] == 'Mathplay lớp 3' ){
                                        UserCourse::create([
                                            'user_id' => $uid,
                                            'hocmai_course_id' => $value['id'],
                                            'grade_slug' => 'lop-3',
                                        ]);
                                    }
                                }
                            }
                        }
                        // return response()->json([$packages, $accessToken]);
                    }
                    // return response()->json($input);
                }else{
                    $messages['message'] = 'Tài khoản đã bị xóa hoặc tạm khóa! Vui lòng liên hệ với Admin để được hỗ trợ.';
                }
            }
        }
        // return '';
        return response()->json($messages);
    }


    /**
     * Delete question of a lession
     */
    public function deleteQuestion(){
        if (Auth::guard('admin')->user()->guest() | !Request::ajax()){
            abort(403);
        }
        $input = request()->all();
        try{
            //////// Xoa quan he n-n
            LessionQuestion::where('lession_id', '=', $input['lession_id'])->where('qid', '=', $input['qid'])->delete();

            //////// Xoa question
            CommonNormal::delete($input['qid'], 'Question');
        } catch (Exception $e) {
            return response()->json($e);
        }

        return response()->json(true);
    }

    /**
     * Get question config form by question type
     */
    public function getQuestionConfigForm()
    {
        $type = $this->request->get('type');
        $id = $this->request->get('id');
        $form = CommonQuestion::getConfigForm($type, null, $id);
        return response()->json($form);
    }

    /**
     * Update study history
     */
    public function updateStudyHistory(Request $request){
        $data = $this->request->get('data');
        if(empty($data)) return response()->json(false);
        $data = json_decode($data, true);
        $lesson = Lession::find($data['lession_id']);
        $lessonConf = Common::getConfigOfLesson($lesson);

        if( Auth::check() ){
            $author = Common::getObject(Auth::user(), 'id');
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
            ///////////// Neu nguoi dung chua dang nhap thi thi luu thong tin lam bai vao session
            $_lessons = Session::has('anonymous_lesson') ? Session::get('anonymous_lesson') : [];
            $_lessons[$data['lession_id']] = $data;
            Session::put('anonymous_lesson', $_lessons);

            $data['score'] = ( $data['score'] >= $lessonConf['max_score'] ) ? $lessonConf['max_score'] : $data['score'];
            $data['star'] = Common::getRuleOfStar($data['score'], $lessonConf);
        }
        return response()->json($data);
    }

}
