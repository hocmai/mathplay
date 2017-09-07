<?php
Class CommonQuestion implements QuestionInterface{

	public static function getAllType(){
		return [
			SOSANH => 'So sánh 2 hình ảnh', // test
			'DemSoTrongKhung10' => 'Đếm số trong khung 10 ô', // dang 1,2,4
			'DienSoHangChucVaDonVi' => 'Điền số hàng chục và đơn vị', //dang 3
			'DemHangChuc' => 'Đếm số theo hàng chục', //dang 5
			'DemSoLonNhoVoiDonVi' => 'Đếm số ngược xuôi cộng/trừ 1-2-5-10',// dang 6,
			'TimSoTrenTiaSo' => 'Bài tập về tia số', // dang 7,15
			'DienSoConThieu100' => 'Tìm số trong dãy 100 số', //dang 8,9
			'TimSoTheoQuyLuat' => 'Tìm số theo quy luật (tự sinh)', // dang 10
			'TimSoTrongDaySoCoQuyLuat' => 'Điền số trong dãy số có quy luật cộng dồn ngẫu nhiên', // Dang 11
			'ChonMauSacPhuHop' => 'Chọn màu đúng với ô chỉ định (tự sinh)', // dang 12
			'Cong2HinhAnh' => 'Phép cộng với hình ảnh', // dang 13
			'DienBieuThuc' => 'Biểu thức với phép cộng hình ảnh', // dang 14
			'TinhTongDonGian' => 'Tính Tổng (dạng cơ bản)', // dang 16
			'TimBieuThucCoTongDung' => 'Tìm biểu thức đúng với tổng cho trước', // dang 17, 18
			'SoHangConThieu' => 'Tìm số hạng còn thiếu trong phép cộng', // dang 19
			'TimDapSoDungVoiCauHoi' => 'Tìm đáp án cho câu hỏi được nhập ngẫu nhiên', // dang 20
		];
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
		if( !self::callServiceByType($type, 'getConfigForm', ['', $config]) ){
			return Form::hidden('question_config[empty][]').'<span>Không có cài đặt nào cho dạng bài này.</span>';
		}
		return self::callServiceByType($type, 'getConfigForm', ['', $config]);
	}


	/**
	 * Render all of questions in a lession
	 *
	 **/
	public static function renderLession($lession, $history = []){
		$quesions = $lession->question;
		$lession_conf = (array) json_decode($lession->config);
		$max_question = !empty($lession_conf['num_question']) ? $lession_conf['num_question'] : 20;
		$max_score = !empty($lession_conf['max_score']) ? $lession_conf['max_score'] : 100;
		$score = floor($max_score/20);
		$data_history = ['grade_id' => $lession->chapter->subject->grade->id, 'subject_id' => $lession->chapter->subject->id, 'chapter_id' => $lession->chapter->id, 'lession_id' => $lession->id, 'author' => Common::getObject(Auth::user()->get(), 'id')];

		$question_order = [];
		foreach ($lession->question as $key => $question) {
			$lessionQuestionConf = LessionQuestion::where('lession_id', '=' , $lession->id)
			->where('qid', '=' , $question->id)
			->first();
			// ->pluck('config');
			if ($lessionQuestionConf) {
				$lessionQuestionConf = $lessionQuestionConf->config;
				$lessionQuestionConf = $lessionQuestionConf ? (array)json_decode($lessionQuestionConf) : [];
				$question->conf = $lessionQuestionConf;
				if( $lessionQuestionConf['question_start'] && $lessionQuestionConf['question_end'] && $lessionQuestionConf['question_end'] > $lessionQuestionConf['question_start'] ){
					for( $j = $lessionQuestionConf['question_start']; $j <= $lessionQuestionConf['question_end']; $j++ ){
						$question_order[$j] = $question;
					}
				}
			}


			//////// kiem tra thu tu cac cau hoi va sap xep dung vi tri nhu config, 1 cau hoi co the duoc lap lai nhieu lan
			
		}

		/// hien thi du 20 cau hoi theo dung thu tu da config hoac tu dong lay random cac cau hoi cho cac vi tri con thieu
		$html = '';
        $current_ques = (!empty($history) && $history->status != 1 && !empty($history->current_question)) ? $history->current_question : 1;

		for($i = 1; $i <= $max_question; $i++){
			if( !isset($question_order[$i]) ){
				$rand = rand(0, count($lession->question) - 1);
				$ques = $lession->question[$rand];
			} else{
				$ques = $question_order[$i];
			}
			$html .= '<div class="question-rendered '.( ($current_ques && $current_ques == $i) ? 'active' : 'hide' ).'" data-history=\''. json_encode($data_history) .'\' lession-id ="'.$lession->id.'" qid="'.$ques->id.'" q-order="'.$i.'" score="'.$score.'" max-score="'.$max_score.'">'.self::renderQuestion($ques, $ques->conf, $lession, $i).'</div>';
		}
		return $html;
	}

	public static function view_exists($view){
		return View::exists($view);
	}

	/**
	 * Render question by config
	 */
	public static function renderQuestion($question, $config = [], $lession = null, $question_num = 1){
		// $config = json_decode($config);
		if (View::exists('site.questions.'.$question->type)) {
			return View::make('site.questions.'.$question->type)->with(compact(['question', 'config', 'lession', 'question_num']));
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

	public static function getRandomData(){
		
	}
	
	public static function render($type, $config){

	}
}
