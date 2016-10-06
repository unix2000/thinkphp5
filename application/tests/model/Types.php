<?php 
namespace app\tests\model;
use think\Model;

class Types extends Model {
	public function Items(){
		return $this->hasMany('Items','types_id');
	}
}
