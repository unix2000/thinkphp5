<?php
namespace app\tests\controller;
use think\Controller;
use think\helper\Str;
use think\helper\Time;
use think\helper\Hash;
use think\helper\Arr;
class Tests extends Controller {
	public function index(){
		dump($this->view);
	}
	public function helper(){
		// dump(Str::lower('LIN'));
		// dump(Str::upper('lin'));
		// dump(Str::contains('xiaolin','lin')); //true
		// dump(Str::startsWith('xiaolin','xi')); //true
		// dump(Str::endsWith('xiaolin','lin')); //true
		// dump(strtolower(Str::random(8)));
		// dump(Time::today());
		// dump(Time::yesterday());
		// dump(Time::lastYear());
		// dump(Time::lastMonth());
		// dump(Time::lastWeek());
		// dump(Time::weekToSecond());
		// $str = Hash::make('liner');
		// echo Hash::check('liner.xie',$str) ? 'true' : 'false'; //false
		$arr = ['xie','xiao','lin','liner','liner.xie'];
		//排序反转
		$arr_ = Arr::sortRecursive($arr);
		dump($arr_);
		//可利用laravel的Str和Arr助手函数
	}
	public function event(){

	}
}