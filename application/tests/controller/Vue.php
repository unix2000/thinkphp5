<?php
namespace app\tests\controller;

class Vue extends Base {
	public function index(){
		//echo '<script>alert();</script>';
		return $this->fetch();
	}
}
