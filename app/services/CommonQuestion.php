<?php
Class CommonQuestion {

	public static function getAllType(){
		$allType = [];
		foreach (glob(app_path().'/services/questions/*.php') as $key => $value) {
			$class = basename($value, '.php');
			if( class_exists($class) && method_exists($class, 'getTitle')){
				$allType[$class] = $class::getTitle();
			}
		}
		// dd($allType);
		return $allType;
	}

	public static function callServiceByType($slug, $method, $para = null){
		if( !class_exists($slug) | empty($slug) ) return null;
		if( !method_exists($slug, $method) ) return null;
		return call_user_func_array($slug.'::'.$method, $para);
	}
	

	/**
	 * Get config form
	 **/
	public static function getConfigForm($type = null, $config = null){
		if (View::exists('site.questions_form.'.$type)) {
			return View::make('site.questions.'.$type.'.form', ['config' => $config])->render().Form::hidden('question_config[config][]', json_encode($config), ['class' => 'question-config-hidden']);
		}
		return Form::hidden('question_config[empty][]').'<span>Không có cài đặt nào cho dạng bài này.</span>';

		// if( !self::callServiceByType($type, 'getConfigForm', ['', $config]) ){
		// 	return Form::hidden('question_config[empty][]').'<span>Không có cài đặt nào cho dạng bài này.</span>';
		// }
		// return self::callServiceByType($type, 'getConfigForm', ['', $config]);
	}


	/**
	 * Render all of questions in a lession
	 *
	 **/
	public static function renderLession($lession, $history = []){
		$quesions = $lession->question;
		$lession_conf = CommonConfig::get($lession->config);
		$max_question = !empty($lession_conf['number_ques']) ? $lession_conf['number_ques'] : 20;
		$max_score = !empty($lession_conf['max_score']) ? $lession_conf['max_score'] : 100;
		$score = floor($max_score/$max_question);
		$data_history = ['grade_id' => $lession->chapter->subject->grade->id, 'subject_id' => $lession->chapter->subject->id, 'chapter_id' => $lession->chapter->id, 'lession_id' => $lession->id, 'author' => Common::getObject(Auth::user()->get(), 'id')];
		$question_order = [];

		//////// kiem tra thu tu cac cau hoi va sap xep dung vi tri nhu config, 1 cau hoi co the duoc lap lai nhieu lan
		foreach ($lession->question as $key => $question) {
			$lessionQuestionConf = LessionQuestion::where('lession_id', '=' , $lession->id)
			->where('qid', '=' , $question->id)
			->first();
			// ->pluck('config');
			if ($lessionQuestionConf) {
				$lessionQuestionConf = $lessionQuestionConf->config;
				$lessionQuestionConf = $lessionQuestionConf ? (array)json_decode($lessionQuestionConf) : [];
				$question->conf = $lessionQuestionConf;
				if( isset($lessionQuestionConf['question_start'], $lessionQuestionConf['question_end']) && $lessionQuestionConf['question_end'] > $lessionQuestionConf['question_start'] ){
					for( $j = $lessionQuestionConf['question_start']; $j <= $lessionQuestionConf['question_end']; $j++ ){
						$question_order[$j] = $question;
					}
				}
			}
		}

		/// hien thi du 20 cau hoi theo dung thu tu da config hoac tu dong lay random cac cau hoi cho cac vi tri con thieu
		$html = '';
        $current_ques = (!empty($history) && $history->status != 1 && !empty($history->current_question)) ? $history->current_question : 1;
        if( $lession->question->count() ){
			for($i = 1; $i <= $max_question; $i++){
				if( !isset($question_order[$i]) ){
					$rand = rand(0, count($lession->question) - 1);
					$ques = $lession->question[$rand];
				} else{
					$ques = $question_order[$i];
				}
				$html .= '<div id="'. $ques->type .'" class="question-rendered '.( ($current_ques && $current_ques == $i) ? 'active' : 'hide' ).'" data-history=\''. json_encode($data_history) .'\' lession-id ="'.$lession->id.'" qid="'.$ques->id.'" q-order="'.$i.'" score="'.$score.'" max-score="'.$max_score.'">'.self::renderQuestion($ques, $ques->conf, $lession, $i).'</div>';
			}
		} else{
			$html .= 'Không có dữ liệu cho câu hỏi này!';
		}
		return $html;
	}

	/**
	 * Render question by config
	 */
	public static function renderQuestion($question, $config = [], $lession = null, $question_num = 1){
		// $config = json_decode($config);
		if (View::exists('site.questions.'.$question->type.'.display')) {
			return View::make('site.questions.'.$question->type.'.display')->with(compact(['question', 'config', 'lession', 'question_num']));
		}
	}

	public static function getAnswerType(){
		return [
			'input_answer' => 'Điền đáp án',
			'click_object' => 'Click chọn đáp án',
			'select' => 'Trắc nghiệm',
			'true_false' => 'Chọn Đúng/Sai'
		];
	}


	/**
	 * Get random image for render
	 **/
	public static function getRandImg($type){
		$dir = public_path().'/questions/'.$type.'/img';
		$files = Common::scanDir($dir);
		$randomdata = array_map( function($val) {
			return str_replace('\\', '/', str_replace(public_path(), '', $val));
		}, $files);
		return $randomdata;
	}

}
