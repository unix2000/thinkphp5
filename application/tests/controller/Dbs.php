<?php
namespace app\tests\controller;

use think\Db;
use app\tests\model\Items;
// use app\tests\model\Customer;
use app\tests\model\Types;
use think\Request;
use think\Controller;
use think\Config;
// class Dbs extends Controller {
class Dbs extends MongoBase {
    //前置类似于laravel的中间件拦截
    protected $beforeActionList = [
        'first',
        'second' =>  ['except'=>'index'], //表示这些方法不使用前置方法，
        'three'  =>  ['only'=>'hello,data'], //表示只有这些方法使用前置方法
    ];
    public function _initialize()
    {
        //echo '初始化操作！';
    }
    // public function _empty($name){
    // 	echo 'N===' . $name . '===';
    // }

    protected function first()
    {
        echo 'first<br/>';
        //$this->success('新增成功', 'dbs/hello');
        if(1===1) {
        	//return false;
        	//$this->redirect('dbs/hello');
        	//return false;
        }
        return false;

    }
    protected function second()
    {
        echo 'second<br/>';
    }
    protected function three()
    {
        echo 'three<br/>';
    }

    public function hello()
    {
        return 'hello';
    }

    public function data()
    {
        return 'data';
    }
	public function index(Request $req)
	{
		//db tests
		// dump(Items::find()); //第一条
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
		// $data = Db::name('items')
		// 	// ->fetchClass('\think\Collection') //个别返回
		// 	// ->where('id','>',28)
		// 	// ->limit(18)
		// 	// ->select()
		// 	// ->toArray();
		// 	->paginate(20);

		//Active Record
		$data = Items::paginate(8);
		$page = $data->render();
		$this->assign('page', $page);
		// dump($page);
		$this->assign('data',$data);
		$this->assign('title','Data List');
		//$this->display('index');
		return $this->fetch();
		// dump($data);
	}
	public function mongo(){
		// 'type'  =>  '\think\mongo\Connection',
		// 分开配置
		// $data = Db::name('customer')->find();
		// 测试下来mongodb无法使用Active Record,只能使用Db,yii2无缝封装得更好
		// $mongo = Config::get('database.mongodb');
		// $conn = Db::connect($mongo);
		// dump($conn);
		// $data = $conn->name('customer')->select();
		// $data = Customer::find();
		$data = $this->mongo->name('customer')->select();
		dump($data);
	}
	public function tests(){
		//一对多
		// $types = Types::get(1);
		// dump($types->items()->limit(10)->select());
		// $data = $types->items()->limit(10)->select();
		// foreach ($data as $v) {
		// 	echo $v->name .'=='. $v->email . '==' .$v->address . "<br />";
		// }

		//一对一 belongsTo hasOne
		// $items = Items::get(2);
		// dump($items->types->name);

		//获取sql
		echo Items::fetchSql()->find(1);

		//模型分层
		//默认为model
		// \think\Loader::model('User')

		// Logic类：app\tests\logic\User.php
		// \think\Loader::model('User','logic');

		// Service类：app\tests\service\User.php
		// \think\Loader::model('User','service');

		// $data = Items::scope('tests')->limit(10)->select();
		// $data = Items::scope('ids')->select();
		// $data = Items::scope('tests,ids')->select();
		//动态调用
		// $items = new Items;
		// $data = $items->tests()->ids()->select();
		// dump($data);
	}
}
