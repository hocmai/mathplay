<?php
namespace Services;
use App\Models\ConfigModel;
use Services\Common;

class CommonConfig
{
	/**
	 * @var Eloquent
	 */
	private static $collection;

	/**
	 * @var Eloquent
	 */
	protected $dataJson;

	// protected $dataJson;

	public function __construct(){}

	public static function collect($name = ''){
		if( empty($name) ) return [];
		$collection = ConfigModel::where('collection', '=', $name)->get();
		$config = $collection;
		foreach ($collection as $key => $value) {
			$data = Common::getObject($value, 'data');
			$config[$key]->data = !empty($data) ? json_decode($data, true) : [];
		}
		return $config;
	}

	public static function getConfigLession(){
		$data = self::collect('lession');
		$array = [];
		foreach ($data as $key => $value) {
			$array[$value->name] = !empty(self::get($value->name)['name']) ? self::get($value->name)['name'] : '';
		}
		return $array;
	}

	/**
	* {@inheritdoc}
	* Get Data object
	*/
	public static function get($name = null){
		if( empty($name) ) return null;
		$config = ConfigModel::where('name', '=', $name)->first();
		$data = Common::getObject($config, 'data');
		return $data ? json_decode($data, true) : null;
	}

	/**
	* {@inheritdoc}
	* Set data for config by name
	*/
	public static function set($collection = '', $name, $value = []){
		$data = self::get($name);
		if( !empty($data) ){
			///// Update if exists
			foreach ($value as $key => $item) {
				$data[$key] = $item;
			}
			ConfigModel::where('name', '=', $name)->where('collection', '=', $collection)->update(['data' => json_encode($data, JSON_UNESCAPED_UNICODE )]);
		} else{
			///// Create if no exists
			ConfigModel::create(['name' => $name, 'collection' => $collection, 'data' => json_encode($value, JSON_UNESCAPED_UNICODE )]);
		}
	}

	/**
	* {@inheritdoc}
	* Set data for config by name
	*/
	public static function delete($collection = '', $name){
		ConfigModel::where('collection', '=', $collection)
			->where('name', '=', $name)
			->delete();
	}

}