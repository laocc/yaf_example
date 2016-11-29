<?php

use \laocc\yaf\Controller;

class UserController extends Controller
{
    /**
     * index
     */
    public function indexAction()
    {
        $async = new \laocc\plugs\Async($this);
        $async->token = 'myToken';
        $async->action = 'Action';
        $async->password = '';

        $async->listen();
    }

    /**
     * 测试一
     * @param $id
     * @param $name
     * @return mixed
     */
    public function testAction($id, $name = 'fazo')
    {
        return $id;
    }

    /**
     * @param $a
     * @param $b
     */
    private function vvv($a, $b)
    {

    }


    /**
     * 测试二
     * @param $id
     * @param $name
     * @return mixed
     */
    public function test2Action($id, array $name)
    {
        return $id;
    }


}