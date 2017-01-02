<?php
namespace app\tests\controller;
use think\Controller;
use app\tests\model\Items;
use think\Request;

class Form extends Controller {
	public function semantic()
	{
		return $this->fetch();
	}
	public function valid()
	{
		return $this->fetch();
	}
	public function datas(Request $req){
		//ajax获取必须返回Pager对象,非ajax获取返回json数组即可
		// {"advanceQueryConditions":[],"advanceQuerySorts":[],"exhibitDatas":[],"exportAllData":false,"exportColumns":[],"exportDataIsProcessed":false,"exportDatas":[],"exportFileName":"","exportType":"","fastQueryParameters":{},"isExport":false,"isSuccess":true,"nowPage":1,"pageCount":20,"pageSize":10,"parameters":{},"recordCount":200,"startRecord":0}
		//dtGrid使用
		if ($req->isAjax()){
			// $data = array();
			$dtpage = $req->post('gridPager'); //传过来是json对象
			$dt_arr = json_decode($dtpage,true);
			$page = $dt_arr['pageSize'];
			$startRecord = $dt_arr['startRecord'];
			// $nowPage = $dt_arr['nowPage'];

			// $callback = $req->post('callback');
			$data['exhibitDatas'] = Items::limit($startRecord,$page)->select();		
			$data['isSuccess'] = true; //此参数ajax分页很重要,要不提示callback错误 很奇怪 因为不是jsonp获取
			//以下三参数必须加入,要不前端出现undefine错误
			$data['recordCount'] = Items::count();
			$data['pageCount'] = (int)(Items::count() / $page);
			$data['pageSize'] = $page;
			$data['startRecord'] = $dt_arr['startRecord'];
			$data['nowPage'] = $dt_arr['nowPage'];
			echo json_encode($data);
			// echo $callback.'('.json_encode($data).')';  
		}
		// $data = Items::select();
		// dump($data);
		
	}
	public function grid(){
		return $this->fetch();
	}
	public function table(){
		$data = Items::limit(12)->select();
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
		$data = Items::limit(20,30)->select();
		dump($data);
	}
}