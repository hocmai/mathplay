<?php
class TimBieuThucGiaoHoan extends CommonQuestion {

	protected static $title = 'Tìm biểu thức giao hoán';
	public static function getTitle(){
		return self::$title;
	}

	public static function getAnswerType(){
		return [
			'giao-hoan' => 'Chọn đáp án đúng',
			'giao-hoan-2' => 'Nhập biểu thức',
		];
	}
}