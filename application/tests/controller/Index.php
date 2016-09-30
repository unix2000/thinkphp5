<?php
namespace app\tests\controller;
use think\View;
use think\Controller;
//如果controller继承\think\Controller,view无需实例化,直接$this->fetch()调用
class Index {
// class Index extends Controller {
	public function index()
	{
		$data = ['name'=>'thinkphp','url'=>'thinkphp.cn'];
        return ['data'=>$data,'code'=>1,'message'=>'操作完成'];
        // return json(['data'=>$data,'code'=>1,'message'=>'操作完成']);
        // return xml(['data'=>$data,'code'=>1,'message'=>'操作完成']);
        // 输出格式为<think><data></data></think>
        //xml格式自定义
	}
	public function views()
	{
		// dump(request());
		// 不建议直接实例化View类进行操作
		$view = new View();
		//打开layout
		// $view->engine->layout(true);
		//指定布局文件,默认载入,不需要头文件{layout name="layout" /}
		//如果打开这个,模板里面的extend指令以及template配置全部失效
		//模板继承不同于模板布局,使用模板继承就关闭模板布局
		// $view->engine->layout('layout/main');
		//模板相对来说比较麻烦不够合理
		//使用布局用{__CONTENT__}替换模板内容
		//使用继承则使用{block name="main"}{/block}替换所继承文件里面自定义的block块
		// $view->email = 'linux8000@qq.com';
		$view->assign('email','linux8000@qq.com');
		$view->assign('title','thinkphp5');
		return $view->fetch();
		// return $view->display('views');
	}
}
