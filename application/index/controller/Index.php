<?php
namespace app\index\controller;
use think\Config;
class Index
{
    public function index()
    {
        dump(Config::get('database.mongodb'));
    }
}
