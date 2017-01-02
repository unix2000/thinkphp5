<?php
namespace app\tests\controller;
use think\Controller;
use think\Request;

class Base extends Controller {
	protected $request;
	protected $response;
	public function _initialize(){
		//'Base controller init';
		$this->request = Request::instance();
	}
}