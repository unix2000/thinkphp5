<?php
namespace app\tests\model;

use think\Model;

class Items extends Model {
	//模型类支持如下事件
	//before_delete、after_delete
	//before_write、after_write 
	//before_update、after_update
	//before_insert、after_insert
	
	//或者使用字符串定义
    // protected $connection = 'mysql://root:root@127.0.0.1:3306/phalcon2#utf8';
    public function types(){
    	return $this->belongsTo('Types','types_id');
    }

    //scope
    protected function scopeTests($q){
    	$q->where('email','liner.xie@qq.com')->field('id,name,email,address');
    }
    public function scopeIds($q){
    	$q->where('id','>','99')->limit(100);
    }
}
