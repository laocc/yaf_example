<?php

use Yaf\Dispatcher;
use Yaf\Config\Ini;
use laocc\yaf\Router;
use laocc\yaf\View;
use laocc\yaf\Cache;
use laocc\yaf\Mistake;

class Bootstrap extends \Yaf\Bootstrap_Abstract
{

    public function _initRoutes(Dispatcher $dispatcher)
    {
        /**
         * _ROOT：指向程序根目录
         */
        $conf = new Ini(_ROOT . 'config/plugs.ini');

        if (!\Yaf\Loader::import(_ROOT . 'vendor/autoload.php')) {
            exit('本程序依赖composer加载，请先运行[composer install]');
        }

        /**
         * 如果使用redis/memcache，则需要指定连接信息，这些可以在plugs.ini中指定，也可以在这里另行设置
         */
        $redis = ['host' => '127.0.0.1', 'port' => 6379, 'db=2'];

        $cache = new Cache($dispatcher, $conf['cache'], $conf['static'], $redis);

        $dispatcher->registerPlugin(new Router($dispatcher, $conf['route'], $cache));

        $dispatcher->registerPlugin(new View($dispatcher, $conf['view'], $cache));


        /**
         * 出错时的回调，一般用于发送管理信息，发短信或发邮件等
         * @param array $str 关于错误信息的一个数组
         */
        $callback = function ($array) {
            //print_r($array);
        };

        $dispatcher->registerPlugin(new Mistake($dispatcher, $conf['error'], $callback));

    }

}