<?php
Class TimSoTrenTiaSo extends CommonQuestion{

	protected static $title = 'Bài tập về tia số';
	public static function getTitle(){
		return self::$title;
	}

	public static function getAnswerType(){
		return [
			'input' => 'Tìm số theo điều kiện',
			'input-total' => 'Tính tổng 2 phần tử',
			'inline' => 'Điền số còn thiếu',
		];
	}
	
}
