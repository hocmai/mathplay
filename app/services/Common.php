<?php
class Common {

	public static function getGrade()
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
		if (!$ob->$method) {
			return null;
		}
		return $ob->$method;
	}
	public static function getClassByChapter($chapterId)
	{
		$chapter = Chapter::find($chapterId);
		$subjectId = $chapter->subject_id;
		$subject = Subject::find($subjectId);
		$classID = $subject->grade_id;
		$class = Grade::find($classID);
		return $class;
	}
}