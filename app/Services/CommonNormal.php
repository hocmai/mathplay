<?php
namespace Services;

	use Carbon\Carbon;
	class CommonNormal
{
	public static function multiWhere($object, $fields){
		foreach ($fields as $key => $value) {
			$object = $object->where($key, $value);
		}
		return $object;
	}

	public static function delete($id, $modelName = NULL)
	{
		$name = self::commonName();
		if($modelName) {
			$name = $modelName;
		}
		$name::find($id)->delete();
	}

	public static function update($id, $input, $modelName = NULL)
	{
		$name = self::commonName();
		if($modelName) {
			$name = $modelName;
		}
		return $name::find($id)->update($input);
	}

	public static function create($input, $modelName = NULL)
	{
		$name = self::commonName($modelName);
		if($modelName) {
			$name = $modelName;
		}
		$id = $name::create($input)->id;
		return $id;
	}

	public static function findOrCreate($input = [], $modelName = NULL, $withTrashed = true)
	{
		if( $withTrashed ){
			$query = $modelName::withTrashed()->orderBy('created_at', 'desc');
		}else{
			$query = $modelName::orderBy('created_at', 'desc');
		}
		$data = self::multiWhere($query, $input)->first();
		if(!$data){
			$data = $modelName::create($input)->first();
		}
		return $data;
	}

	public static function commonName($name = NULL)
	{
		if ($name == NULL) {
			$name = Request::segment(3);
		}
		if ($name == 'user') {
			return 'User';
		}
		if ($name == 'grade') {
			return 'Grade';
		}
		if ($name == 'subject') {
			return 'Subject';
		}
		if ($name == 'chapter') {
			return 'Chapter';
		}
		if ($name == 'lession') {
			return 'Lession';
		}
		if ($name == 'question') {
			return 'Question';
		}
	}
}