<?php
namespace app\tests\model;

use think\Model;

class Items extends Model {
	//或者使用字符串定义
    protected $connection = 'mysql://root:root@127.0.0.1:3306/phalcon2#utf8';
}
