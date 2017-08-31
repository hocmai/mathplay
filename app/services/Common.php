<?php
class Common {

	public static function getGradeList()
	{
		return Grade::orderBy('created_at', 'asc')->lists('title','id');
	}

	public static function getSubjectList()
	{
		return Subject::orderBy('created_at', 'asc')->lists('title','id');
	}

	public static function getChapterList()
	{
		return Chapter::orderBy('created_at', 'asc')->lists('title','id');
	}

	public static function getValueOfObject($ob, $method, $field)
	{
		if (!$ob) {
			return null;
		}
		if (!($ob->$method)) {
			return null;
		}
		if (!($ob->$method->$field)) {
			return null;
		}
		return $ob->$method->$field;
	}

	public static function getObject($ob, $method)
	{
		if (!$ob) {
			return null;
		}
		if (!$ob->$method) {
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
	                        $extension = str_replace($info['filename'].'.', '', $info['basename']);
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
}