<?php
Class TimBieuThucCoTongDung extends CommonQuestion{

	protected static $title = 'Tìm biểu thức đúng với tổng cho trước';
	public static function getTitle(){
		return self::$title;
	}
	
	public static function getAnswerType(){
		return [
			'input' => 'Viết biểu thức còn thiếu',
			'choose' => 'Chọn biểu thức đúng',
		];
	}
}
