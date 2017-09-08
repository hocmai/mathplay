<?php
class CommonConfig
{
	/**
	 * The name that should be returned.
	 *
	 * @var array
	 */
	private static $collection;

	public function __construct(){}

	public static function getCollection($name = ''){
		if( empty($name) ) return [];
		$collecion = DB::table('config')->where('collection', '=', $name)->get();
		$config = [];
		foreach ($collecion as $key => $value) {
			$config[] = Common::getObject($value, 'data');
		}
		return $config;
	}

	/**
	* {@inheritdoc}
	*/
	public static function name($name = ''){
		self::$collection = DB::table('config')->where('collection', '=', $name);
		return new self;
	}

	/**
	* {@inheritdoc}
	*/
	public function get($name = ''){
		if( self::$collection ){
			$config = self::$collection->where('name', $name)->first();
			return Common::getObject($config, 'data');
		}
		return null;
		// return $this->collection;
	}

	/**
	* {@inheritdoc}
	*/
	public static function set($name, $value){

	}
}