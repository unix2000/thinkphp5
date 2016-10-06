<?php
namespace app\tests\controller;

use think\Controller;
use think\Config;
use think\Db;
class MongoBase extends Controller {
	//thinkphp5与yii2的mongodb扩展冲突,使用版本不一样,奇怪
	protected $mongo;
	public function __construct(){
		//必须继承
		parent::__construct();
		//默认为type为mysql 
		$conn = Config::get('database.mongodb');
		$this->mongo =  Db::connect($conn);
	}
}
