<?php
namespace app\tests\controller;

use think\Request;
class Req {
	public function index(Request $req)
	{
		// dump($req);
		// $req->isAjax()
		// $req->isPut()
		// $req->isSsl()
		// $req->isPjax()
		//echo $req->host();
		echo $req->isGet() ? 'is get' : 'is not get';
	}
}
