<?php
namespace app\tests\controller;
use think\Controller;
use think\helper\Str;
use think\helper\Time;
use think\helper\Hash;
use think\helper\Arr;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Cookie;
use Symfony\Component\Debug\Debug;
use Symfony\Component\Debug\DebugClassLoader;
use Symfony\Component\Debug\ErrorHandler;
use Symfony\Component\Debug\ExceptionHandler;
use Symfony\Component\Finder\Finder;
use think\Request as Req;

class Tests extends Base {
	public function form(Req $req){
		// dump($this->request->isGet());
		dump($this->request->isAjax());
		dump($this->request->isPost());
		dump($req);
	}
	public function symfony(Request $req){
		dump($req);
		// $finder = new Finder();
		// $finder->files()->in(__DIR__);
		// $finder->files()->in("d:\\lua53");
		// foreach ($finder as $file) {
		//     var_dump($file->getRealPath());
		//     var_dump($file->getRelativePath());
		//     var_dump($file->getRelativePathname());
		// }
	}
	public function index(){
		// dump($this->view);
		// Debug::enable();
		// ErrorHandler::register();
		// ExceptionHandler::register();
		$req = Request::createFromGlobals();
		dump($req);
		// $req->isXmlHttpRequest()
		// if ($req->isMethod('GET')) {
		// 	dump($req->get('id'));
		// }
		// dump($req->get('id'));
		// dump($req->getBasePath());
		// dump($req->getUri());

		// $res = new Response(
		//     'Content',
		//     Response::HTTP_OK,
		//     array('content-type' => 'text/html')
		// );
		// $res->headers->setCookie(new Cookie('username', 'liner'));
		// $res->send();
	}
	public function helper(){
		// dump(Str::lower('LIN'));
		// dump(Str::upper('lin'));
		// dump(Str::contains('xiaolin','lin')); //true
		// dump(Str::startsWith('xiaolin','xi')); //true
		// dump(Str::endsWith('xiaolin','lin')); //true
		// dump(strtolower(Str::random(8)));
		// dump(Time::today());
		// dump(Time::yesterday());
		// dump(Time::lastYear());
		// dump(Time::lastMonth());
		// dump(Time::lastWeek());
		// dump(Time::weekToSecond());
		// $str = Hash::make('liner');
		// echo Hash::check('liner.xie',$str) ? 'true' : 'false'; //false
		$arr = ['xie','xiao','lin','liner','liner.xie'];
		//排序反转
		$arr_ = Arr::sortRecursive($arr);
		dump($arr_);
		//可利用laravel的Str和Arr助手函数
	}
	public function event(){

	}
}