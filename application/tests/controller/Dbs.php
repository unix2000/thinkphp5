<?php
namespace app\tests\controller;

use think\Db;
use app\tests\model\Items;
use think\Request;
class Dbs {
	public function index(Request $req)
	{
		//db tests
		// dump(Items::get(1));
		// $data = Db::table('items')
		// 	// ->where('id',1)
		// 	->limit(10)
		// 	->select();

		//laravel 写法
		// Db::table('items')
		// 	->select('id,name,email')
		// 	->where('id',$id)
		// 	->get();
		// Db::insert()
		// Db::delete()
		// Db::select(); thinkphp5不是这么用
		// Db::update();

		// $data = Db::query('select * from items where id = ?', [1]);

		// tests/dbs/index?id=10
		//构造器Db::table('')->where()->limit()->select()
		// $id = $req->isGet() ? $req->get('id') : 1;
		// $data = Db::table('items')
		// 	->field('id,name,email,address')
		// 	->where('id','>',$id)
		// 	->limit(10)
		// 	->select();
		//原生sql
		// $data = Db::query("select * from items where id < 10");

		//集合 'resultset_type' => 'collection' 默认为array
		// 返回的数据集对象是think\Collection，提供了和数组无差别用法，并且另外封装了一些额外的方法。
		$data = Db::name('items')
			->fetchClass('\think\Collection') //个别返回
			->where('id','>',10)
			->limit(10)
			->select();
			// ->toArray();
		dump($data);
	}
}
