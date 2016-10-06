<?php
namespace app\tests\model;

use think\Model;

class Customer extends Model {
	// mongodb这么设置connection没有效果
    // protected $connection = 'mongodb://liner:123456@localhost:27017/mydatabase';
}
