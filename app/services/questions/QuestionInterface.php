<?php
interface QuestionInterface{
	public static function getAllType();

	public static function getConfigForm($type, $config);

	public static function render($type, $config); 
}