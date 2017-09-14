<?php
use Carbon\Carbon;
class CommonUpload
{
	/**
	*uploadImage Upload image
	*/

	public static function uploadImage($path, $imageFile, $imageUrl = NULL)
	{
		$destinationPath = public_path().$path;
		if(Input::hasFile($imageFile)){
			$file = Input::file($imageFile);
			$filename = $file->getClientOriginalName();
			$uploadSuccess = $file->move($destinationPath, $filename);
			return $path.'/'.$filename;
		}
		if ($imageUrl) {
			return $imageUrl;
		}
	}

	public static function getNameTypeSlide($type)
	{
		if ($type == SLIDE_TOP) {
			return 'Banner';
		}
		if ($type == SLIDE_BOTTOM) {
			return 'Đối tác';
		}

	}

	/**
	 * Form file element
	 */
	public static function file($name, $default = [], $attributes = [], $options = []){
		return View::make('form_element.field_file')->with(compact('name', 'default', 'attributes', 'options'))->render();
	}


	/**
	 * Upload file ajax
	 **/
	public function uploadFile($file, $path){
		if(Input::hasFile($path)){
			$file = Input::file($imageUrlFile);
		}
		$uploadSuccess = $file->move( public_path().'/'.$path, $file->getClientOriginalName());
		return $file;
	}

}