<?php

use Yaf\Dispatcher;
use Yaf\Config\Ini;
use laocc\yaf\Router;
use laocc\yaf\View;
use laocc\yaf\Cache;
use laocc\yaf\Mistake;

class Bootstrap extends \Yaf\Bootstrap_Abstract
{

    public function _initPlugs(Dispatcher $dispatcher)
    {
        /**
         * _ROOT：指向程序根目录
         */
        $conf = new Ini(_ROOT . 'config/plugs.ini');

        if (!\Yaf\Loader::import(_ROOT . 'vendor/autoload.php')) {
            exit('本程序依赖composer加载，请先运行[composer install]');
        }

        new Mistake($dispatcher, $conf['error'], function ($array) {
            //出错时的回调，一般用于发送管理信息，发短信或发邮件等
            //print_r($array);
        });

        /**
         * 如果使用redis/memcache，则需要指定连接信息，这些可以在plugs.ini中指定，也可以在这里另行设置
         */
        $redis = ['host' => '127.0.0.1', 'port' => 6379, 'db=2'];

        //开启缓存模块
        $cache = new Cache($dispatcher, $conf['cache'], $conf['static'], $redis);

        //注册路由插件
        $dispatcher->registerPlugin(new Router($dispatcher, $conf['route'], $cache));

        //注册视图插件
        $dispatcher->registerPlugin(new View($dispatcher, $conf['view'], $cache));


    }

}