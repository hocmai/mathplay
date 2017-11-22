<?php
Class CommonQuestion {


	public static function getImgData($type = ''){
		$config = CommonConfig::get("question_type.config.$type");
        if( $config && !empty($config['images']) ){
            foreach ($config['images'] as $key => $value) {
                $randomdata[$value['image_title']] = $value['image_url'];
            }
        }
        else{
            $files = Common::scanDir( public_path()."/questions/$type/img" );
            $randomdata = array_map( function($val) {
                return str_replace('\\', '/', str_replace(public_path(), '', $val));
            }, $files);
        }
        return $randomdata;
	}


	public static function getAudioPath($text = ''){
		$slug = Str::slug($text, '');
		return Common::getObject( Audio::where('slug', $slug)->first(), 'url' );
	}

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
	public static function getConfigForm($type = null, $config = null, $id = 0){
		if (View::exists('site.questions.'.$type.'.form')) {
			return View::make('site.questions.'.$type.'.form', ['config' => $config, 'id' => $id])->render();
			// .Form::hidden('question_config[config]['.$id.']', json_encode($config), ['class' => 'question-config-hidden']);
		}
		return Form::hidden('question_config[empty]['.$id.']').'<span>Không có cài đặt nào cho dạng bài này.</span>';
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
			return View::make('site.questions.'.$question->type.'.display')->with(compact(['question', 'config', 'lession', 'question_num']))->render();
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

	/**
	 * Read time
	 **/
	public static function readHourMinute($hour = 0, $min = 0){
		if( $min == 0 ){
			return self::readNumber((int)$hour).' đúng';
		}
		else if( $min == 30 ){
			return self::readNumber((int)$hour).' rưỡi';
		}
		else if( $min > 30 ){
			return self::readNumber((int)$hour + 1).' giờ kém '.self::readNumber( 60 - (int)$min );
		}
		else{
			return self::readNumber((int)$hour).' giờ '.self::readNumber((int)$min).' phút';
		}
	}

	/**
	 * Read time
	 **/
	public static function readNumber($num = 0){
		$text = '';
		$text_ = [
			0 => 'không',
			1 => 'một',
			2 => 'hai',
			3 => 'ba',
			4 => 'bốn',
			5 => 'năm',
			6 => 'sáu',
			7 => 'bảy',
			8 => 'tám',
			9 => 'chín',
			10 => 'mười',
		];

		$thousand = floor($num/1000);
		$hundred = floor(($num-($thousand*1000))/100);
		$tens = floor( ($num-($thousand*1000)-($hundred*100))/10 );
		$one = $num-($thousand*1000)-($hundred*100)-($tens*10);
		if( $num >= 1000 ){
			$text .= $text_[$thousand].' nghìn ';
			$text .= $text_[$hundred].' trăm ';
			$text .= ' '.(($tens == 0 && $one > 0 ) ? 'linh ' : '').self::readNumber($num-($thousand*1000)-($hundred*100));
		}
		elseif( $num >= 100 ){
			$text .= $text_[$hundred].' trăm';
			if( $tens > 0 | $one > 0 ){
				$text .= ' '.(($tens == 0 && $one > 0 ) ? 'linh ' : '').self::readNumber($num-($hundred*100));
			}
		}
		else{
			if( $num > 20 ){
				$text_[1] = 'mốt';
			}
			if( $num <= 10 ){
				$text = $text_[$num];
			} elseif( $num > 10 && $num <= 19 ){
				$text = 'mười '.( ($text_[$num%10] == 'năm') ? 'lăm' : $text_[$num%10] );
			} elseif( $num >= 20 && $num%10 == 0 ){
				$text = $text_[$num/10].' mươi';
			} elseif( $num > 20 && $num%10 > 0 ){
				$text = $text_[floor($num/10)].' mươi '.( ($text_[$num%10] == 'năm') ? 'lăm' : $text_[$num%10] );
			}
		}
		return $text;
	}

}
