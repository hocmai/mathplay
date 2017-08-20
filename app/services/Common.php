<?php
class Common {

	public static function getClass()
	{
		$class = GradeModel::orderBy('created', 'desc')->lists('grade_id');
		return $class;
	}
	public static function getValueOfObject($ob, $method, $field)
	{
		if (!($ob->$method)) {
			return null;
		}
		if (!($ob->$method->$field)) {
			return null;
		}
		return $ob->$method->$field;
	}
}