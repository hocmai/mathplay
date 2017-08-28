<?php
class ChiaCho10 extends CommonQuestion{
	
	function __construct(){
		
	}

	public static function test(){
		return parent::test();
	}

	public static function test2(){
		return $this::test();
	}
}	