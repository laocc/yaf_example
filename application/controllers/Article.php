<?php
use laocc\yaf\Controller;

class ArticleController extends Controller
{
    public function indexAction()
    {
//        $this->display_route();

        $this->title('YafPlugs');
        $this->keywords('这是一个Yaf的扩展插件包');
        $this->description('这是一个Yaf的扩展插件包');
        $this->assign('value', 'Yaf Plugs ArticleController');
        $this->css('css/layout.css');

//        $this->static();

    }
}
