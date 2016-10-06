<?php
namespace app\tests\controller;
use think\Cookie;
use think\Session;
class Res extends Base
{
	public function index() {

	}
	public function session() {
		Session::set('username','liner.xie');
		if (Session::has('username')) {
			echo 'session is has';
		}
	}
	public function cookie() {
		// Cookie::clear('arr');
		// Cookie::clear('think_');
		// 备注'secure' => true https有效 
		Cookie::set('username','liner',['prefix'=>'think_','expire'=>3600]);
		Cookie::set('arr',['liner','liner.xie']);
		if (Cookie::has('arr')) {
			echo 'is has';
		}
	}
}
