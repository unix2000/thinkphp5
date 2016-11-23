<?php
namespace app\tests\controller;

class React extends \think\Controller {
	public function index(){
		//react.js
		return $this->fetch('index');
	}
}
