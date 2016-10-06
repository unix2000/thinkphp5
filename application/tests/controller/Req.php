<?php
namespace app\tests\controller;

use think\Request;
use think\Cookie;
use think\Session;
// class Req {
class Req extends Base {
	public function index(Request $req)
	{
		// dump($req);
		// $req->isAjax()
		// $req->isPut()
		// $req->isSsl()
		// $req->isPjax()
		//echo $req->host();
		// echo $req->isGet() ? 'is get' : 'is not get';
		dump($_COOKIE);
		//cookie未加密
		dump($this->request->cookie()); //return array
		// dump(Cookie::get('username','think_'));
		// dump(Cookie::get('arr'));

		//dump($_SESSION);
		dump(Session::get());
		dump($this->request->session()); //return array
	}
}
