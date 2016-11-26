<?php

use \Yaf\Dispatcher;
use \Yaf\Config\Ini;

use \laocc\yaf\Router;
use \laocc\yaf\View;
use \laocc\yaf\Cache;

class Bootstrap extends \Yaf\Bootstrap_Abstract
{

    /**
     * 注册路由插件
     * @param Dispatcher $dispatcher
     */
    public function _initRoutes(Dispatcher $dispatcher)
    {
        $conf = new Ini(_ROOT . 'config/plugs.ini');

        if (!\Yaf\Loader::import(_ROOT . '/../vendor/autoload.php')) {
            if (!\Yaf\Loader::import(_ROOT . '/../kernel/autoload.php')) {
                exit('本程序依赖composer加载，请先运行[composer install]');
            }
        }

        /**
         * 如果使用redis/memcache，则需要指定连接信息，这些可以在plugs.ini中指定，也可以在这里另行设置
         */
        $redis = ['host' => '127.0.0.1', 'port' => 6379, 'db=2'];

        $cache = new Cache($dispatcher, $conf['cache'], $conf['static'], $redis);

        $dispatcher->registerPlugin(new Router($dispatcher, $conf['route'], $cache));

        $dispatcher->registerPlugin(new View($dispatcher, $conf['view'], $cache));


    }

}