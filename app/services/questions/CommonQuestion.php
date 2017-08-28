<?php
Class CommonQuestion implements QuestionInterface{

	public static function getAllType(){
		return [
			'SoSanh2HinhAnh' => 'So sánh 2 hình ảnh',
			'ChonHinhVuongTronTamGiac' => 'Hình vuông, Hình tròn',
		];
	}

	public static function callServiceByType($slug, $method, $para = []){
		if( !class_exists($slug) | empty($slug) ) return null;
		if( !call_user_func_array($slug.'::'.$method, $para) ) return null;
		return call_user_func_array($slug.'::'.$method, $para);
	}
	
	public static function getConfigForm($type, $config){

	}
	
	public static function render($type, $config){

	}


	/**
	 * Render all of questions in a lession
	 *
	 **/
	public static function renderLession($lession){
		$quesions = $lession->question;
		$lession_conf = (array) json_decode($lession->config);
		$max_question = $lession_conf['num_question'] ? $lession_conf['num_question'] : 20;

		$question_order = [];
		foreach ($lession->question as $key => $question) {
			$lessionQuestionConf = LessionQuestion::where('lession_id', '=' , $lession->id)
			->where('qid', '=' , $question->id)
			->pluck('config');

			//////// kiem tra thu tu cac cau hoi va sap xep dung vi tri nhu config, 1 cau hoi co the duoc lap lai nhieu lan
			$lessionQuestionConf = $lessionQuestionConf ? (array)json_decode($lessionQuestionConf) : [];
			$question->conf = $lessionQuestionConf;
			if( $lessionQuestionConf['question_start'] && $lessionQuestionConf['question_end'] && $lessionQuestionConf['question_end'] > $lessionQuestionConf['question_start'] ){
				for( $j = $lessionQuestionConf['question_start']; $j <= $lessionQuestionConf['question_end']; $j++ ){
					$question_order[$j] = $question;
				}
			}
		}

		/// hien thi du 20 cau hoi theo dung thu tu da config hoac tu dong lay random cac cau hoi cho cac vi tri con thieu
		$html = '';
		$current_ques = 1;
		for($i = 1; $i <= $max_question; $i++){
			if( !isset($question_order[$i]) ){
				$rand = rand(0, count($lession->question) - 1);
				$ques = $lession->question[$rand];
			} else{
				$ques = $question_order[$i];
			}
			$html .= '<div class="question-rendered '.( ($current_ques && $current_ques == $i) ? 'active' : 'hide' ).'" qid="'.$ques->id.'" q-order="'.$i.'">'.self::renderQuestion($ques, $ques->conf).'</div>';
		}
		return $html;
	}


	/**
	 * Render question by config
	 */
	public static function renderQuestion($question, $config = []){
		// $config = json_decode($config);
		return View::make('site.questions.'.$question->type)->with(compact(['question', 'config']));
	}

	public static function getAnswerType(){
		return [
			'input_answer' => 'Điền đáp án',
			'click_object' => 'Click chọn đáp án',
			'select' => 'Trắc nghiệm',
			'true_false' => 'Chọn Đúng/Sai'
		];
	}

	public static function getRandomData(){
		
	}
}
