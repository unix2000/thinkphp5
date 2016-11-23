<?php
namespace app\tests\controller;
use think\Controller;
use app\tests\model\Items;

class Form extends Controller {
	public function table(){
		$data = Items::limit(50)->select();
		$this->assign('data',$data);
		return $this->fetch();
	}
	public function index(){
		return $this->fetch();
	}
	public function up(){
		// 获取表单上传文件 例如上传了001.jpg
	    $file = request()->file('image');
	    // 移动到框架应用根目录/public/uploads/ 目录下
	    // 并且使用md5规则
		// $file->rule('md5')->move('/home/www/upload/');
		// sha1,date,md5,uniqid
	    $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads');
	    // 获取上传文件的hash散列值
		// echo $info->md5();
		// echo $info->sha1();
		// v5.0.1以上版本可以统一使用hash方法获取文件散列值
		// echo $info->hash('sha1');
		// echo $info->hash('md5');
	    if($info){
	        echo $info->getExtension();
	        echo $info->getSaveName();
	        echo $info->getFilename(); 
	    }else{
	        // 上传失败获取错误信息
	        echo $file->getError();
	    }

	    //多文件
	    // $files = request()->file('image');
	    // foreach($files as $file){
	    //     $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads');
	    //     if($info){
	    //         echo $info->getExtension(); 
	    //         echo $info->getFilename(); 
	    //     }else{
	    //         echo $file->getError();
	    //     }    
	    // }
	}
	public function build(){

	}
}