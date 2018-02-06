<?php
class Common {

	public static function getLastLessonDo($gradeId){
		if( !Auth::user()->check() ){
			return null;
		}
		$data = StudyHistory::where('grade_id', $gradeId)
			->where('author', Auth::user()->get()->id)
			->orderBy('created_at', 'desc')
			->first();
		return $data;
	}

	public static function getAllStarOfAnUser(){
		if( !Auth::user()->check() ){
			return null;
		}
		$data = StudyHistory::select( DB::raw('SUM(study_history.star) as star') )
			->join(
				DB::raw("(SELECT id, MAX(star) AS MaxStar, lession_id 
				FROM study_history
				WHERE study_history.status = '1'
				GROUP BY lession_id) as groupedtt"), function($join){
					$join->on('study_history.lession_id', '=', 'groupedtt.lession_id')
				  		 ->on('study_history.star', '=', 'groupedtt.MaxStar');
				})
			->where('author', Auth::user()->get()->id)
			->where('status', 1)
			->first();
		return self::getObject($data, 'star');
	}

	public static function getMaxStarOfAnLesson($lessonId){
		if( !Auth::user()->check() ){
			return null;
		}
		$data = StudyHistory::select('study_history.star')
			->join(
				DB::raw("(SELECT id, MAX(star) AS MaxStar, lession_id 
				FROM study_history
				WHERE study_history.lession_id = '$lessonId'
				GROUP BY lession_id) as groupedtt"), function($join){
					$join->on('study_history.lession_id', '=', 'groupedtt.lession_id')
				  		 ->on('study_history.star', '=', 'groupedtt.MaxStar');
				})
			->where('author', Auth::user()->get()->id)
			->where('study_history.lession_id', $lessonId)
			->first();
		return self::getObject($data, 'star');
	}

	public static function checkDoLesson($lessionId){
		if(Auth::user()->check() == false){
			return false;
		}
		$uid = Auth::user()->get()->id;
		$result = StudyHistory::where('author',$uid)->where('lession_id', $lessionId)->count();
		// dd($result);
		if( $result ){
			return true;
		}
		return false;
	}


	//////////// Doi so giay thanh gio - phut - giay
	public static function convertTimeUsed($timeUsed = 0){
        $hours = floor($timeUsed/3600);
        $minutes = floor(($timeUsed - ($hours*3600))/60);
        $seconds = $timeUsed - ($hours*3600) - ($minutes*60);
        return ['hours' => $hours, 'minutes' => $minutes, 'seconds' => $seconds, 'text' => (($hours > 0) ? ' '.$hours.' giờ' : '').(($minutes > 0) ? ' '.$minutes.' phút' : '').(($seconds > 0) ? ' '.$seconds.' giây' : '')];
	}

	public static function getAllGrade(){
		$grades = Grade::all();
		return $grades;
	}

	public static function getLessionTree(){
		$tree = [];
		$gradeList = Grade::orderBy('created_at', 'asc')->get();
		foreach ($gradeList as $key => $grade) {
			$subjectTree = [];
			$subjectList = $grade->subject()->orderBy('created_at', 'asc')->get();
			foreach ($subjectList as $key1 => $subject) {
				$chapterTree = [];
				$chapterList = $subject->chapter()->orderBy('created_at', 'asc')->get();
				foreach ($chapterList as $key2 => $chapter) {
					$lessionTree = [];
					$lessionList = $chapter->lession()->orderBy('created_at', 'asc')->get();
					foreach ($lessionList as $key3 => $lession) {
						$lessionTree[] = [
							'id' => $lession->id,
							'slug' => 'lession_id',
							'name' => 'bài kiểm tra',
							'title' => $lession->title,
						];
					}
					$chapterTree[] = [
						'id' => $chapter->id,
						'slug' => 'chapter_id',
						'name' => 'chuyên đề',
						'title' => $chapter->title,
						'child' => $lessionTree,
					];
				}
				$subjectTree[] = [
					'id' => $subject->id,
					'slug' => 'subject_id',
					'name' => 'môn học',
					'title' => $subject->title,
					'child' => $chapterTree,
				];
			}
			$tree[] = [
				'id' => $grade->id,
				'slug' => 'grade_id',
				'name' => 'lớp học',
				'title' => $grade->title,
				'child' => $subjectTree,
			];
		}

		return self::renderLessionChild($tree);
	}

	public static function renderLessionChild($parent, $parent_name = '', $parent_id = ''){
		$output = $child = '';
		if(count($parent)){
			$output .= '
			<div class="menu-content'.( ($parent[0]['slug'] == 'grade_id') ? ' active' : '' ).' '.$parent[0]['slug'].'" parent-name="'.$parent_name.'" parent-id="'.$parent_id.'">
				<div class="menu-header">'. $parent[0]['name'] .'</div>
				<ul class="select-list '. $parent[0]['slug'] .'">';
					foreach ($parent as $key => $value) {
						$output .= '<li>
							<a href="#" data-key="'. $value['slug'] .'" data-id="'. $value['id'] .'"  class="'.( !empty($value['child']) ? 'has-child' : '' ).'">'. $value['title'] .'</a>
						</li>';
						$child .= !empty($value['child']) ? self::renderLessionChild($value['child'], $value['slug'], $value['id']) : '';
					}
			$output .= '</ul></div>';
			$output .= $child;
		}
		return $output;
	}

	/**
	 * Get max score & max_question in a lesson
	 */
	public static function getConfigOfLesson($lesson)
	{
		return [
			'max_score' => 100,
			'number_ques' => 20,
			'score' => 5
		];
		$config = CommonConfig::get($lesson->config);
		$config['max_score'] = !empty($config['max_score']) ? $config['max_score'] : 100;
        $config['number_ques'] = !empty($config['number_ques']) ? $config['number_ques'] : 20;
        $config['score'] = floor($config['max_score']/$config['number_ques']);
        return $config;
	}

	/**
	 * Lay so sao theo so diem dat duoc
	 */
	public static function getRuleOfStar($score, $config){
		if(empty($score)) $score = 0;
		return self::getStarByPercent( ($score/$config['max_score'])*100 );
	}

	/**
	 * Lay so sao theo so diem dat duoc
	 */
	public static function getStarByPercent($percent){
		$star = 0;
		if( $percent >= 30 && $percent < 60 ){
			$star = 1;
		} else if( $percent >= 60 && $percent < 100 ){
			$star = 2;
		} else if( $percent >= 100 ){
			$star = 3;
		}
		return $star;
	}

	/**
	 * Return object of history belongto an user logged in
	 */
	public static function getLessionHistory($lession){
		if( Auth::user()->check() ){
			$fields = [
				'grade_id' => $lession->chapter->subject->grade->id,
				'subject_id' => $lession->chapter->subject->id,
				'chapter_id' => $lession->chapter->id,
				'lession_id' => $lession->id,
				'author' => Common::getObject(Auth::user()->get(), 'id'),
				'status' => 0
			];

			$data =  CommonNormal::multiWhere(StudyHistory::orderBy('updated_at', 'desc'), $fields)->first();
			if(!$data){
				$data = StudyHistory::create($fields)->first();
			}
			return $data;
		}else{
			return false;
		}
	}

	/**
	 * Return object of history belongto an user logged in
	 */
	public static function getHistory($fields){
		if( Auth::user()->check() ){
			return CommonNormal::multiWhere(StudyHistory::orderBy('updated_at', 'desc'), $fields);
		}else{
			return false;
		}
	}

	public static function getGradeList()
	{
		return Grade::orderBy('created_at', 'desc')->lists('title','id');
	}

	public static function getSubjectList()
	{
		return Subject::orderBy('created_at', 'desc')->lists('title','id');
	}

	public static function getChapterList()
	{
		return Chapter::orderBy('created_at', 'desc')->lists('title','id');
	}

	public static function getChapterSelect($default = '')
	{
		$chapter_group = [];
		$chapterList = DB::table('chapters')
			->orderBy('chapters.created_at', 'desc')
			->join('subjects', 'subjects.id', '=', 'chapters.subject_id')
			->select('chapters.title as chapter_title','chapters.id as chapter_id', 'subjects.id as subject_id', 'subjects.title as subject_title')
			->whereNull('chapters.deleted_at')
			->get();
		foreach ($chapterList as $key => $value) {
			$chapter_group[$value->subject_title][] = $value;
		}
		$chapterOption = '<option value="">-- Chọn --</option>';
		foreach ($chapter_group as $key => $value) {
			$chapterOption .= '<optgroup label="'. $key .'">';
			foreach ($value as $key2 => $chapter) {
				$chapterOption .= '<option'.(  ($default == $chapter->chapter_id) ? ' selected="selected"' : '' ).' data-tokens="'. Str::slug($chapter->chapter_title, ' ').' '.$chapter->chapter_title .'" value="'. $chapter->chapter_id .'">'.$chapter->chapter_title.'</option>';
			}
			$chapterOption .= '</optgroup>';
		}
		return $chapterOption;
	}

	public static function getValueOfObject($ob, $method, $field)
	{
		if (!self::getObject($ob, $method)) {
			return null;
		}
		if (!($ob->$method->$field)) {
			return null;
		}
		return $ob->$method->$field;
	}

	public static function getObject($ob, $method)
	{
		if (!($ob)) {
			return null;
		}
		if (!($ob->$method)) {
			return null;
		}
		return $ob->$method;
	}
	
	public static function getClassByChapter($chapterId)
	{
		$chapter = Chapter::find($chapterId);
		if( isset($chapter)) $subjectId = $chapter->subject_id;
		if( isset($subjectId)) $subject = Subject::find($subjectId);
		if( isset($subject)) $classID = $subject->grade_id;
		if( isset($classID)) $class = Grade::find($classID);
		if( isset($class)) return $class;
		return null;
	}

	public static function scanDir($dir) {
	    $arrfiles = array();
	    if (is_dir($dir)) {
	        if ($handle = opendir($dir)) {
	            chdir($dir);
	            while (false !== ($file = readdir($handle))) { 
	                if ($file != "." && $file != "..") {
	                    if (!is_dir($file)){
	                        $info = pathinfo($dir."\\".$file);
	                        // $extension = str_replace($info['filename'].'.', '', $info['basename']);
	                        $arrfiles[] = $dir."\\".$file;
	                    }
	                }
	            }
	            chdir("../");
	        }
	        closedir($handle);
	    }
	    return $arrfiles;
	}

	/**
	 * Get user name
	 */
	public static function getUserName(){
		if( Auth::user()->check() ){
			return self::getObject(Auth::user()->get(), 'username');
		}
		return 'Kid';
	}

	/**
	 * Get user name
	 */
	public static function getUserAvatar(){
		return asset('frontend/images/avata.jpg');
		if( Auth::user()->check() ){
			return self::getObject(Auth::user()->get(), 'username');
		}
		return 'Kid';
	}
}