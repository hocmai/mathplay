<?php
	use Carbon\Carbon;
	class CommonNormal
{
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
		$name::find($id)->update($input);
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

	public static function findOrCreate($input = [], $modelName = NULL)
	{
		$data = $modelName::orderBy('created_at', 'asc');
		foreach ($input as $key => $value) {
			$data = $data->where($key, $value);
		}
		$data = $data->first();
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
		// if ($name == '') {
		// 	return 'AdminNew';
		// }
		// if($name =='news'){
		// 	return 'AdminNew';
		// }
		// if($name =='newstype'){
		// 	return 'TypeNew';
		// }
		// if ($name == 'manager') {
		// 	return 'Admin';
		// }
		// if ($name == 'introduce') {
		// 	return 'Introduce';
		// }
		// if ($name == 'bottomtext') {
		// 	return 'BottomText';
		// }
		// if ($name == 'contact') {
		// 	return 'Contact';
		// }
		// if ($name == 'slider') {
		// 	return 'AdminSlide';
		// }
		// if ($name == 'type_about_us') {
		// 	return 'TypeAboutUs';
		// }
		// if ($name == 'about_us_company') {
		// 	return 'AboutUs';
		// }
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