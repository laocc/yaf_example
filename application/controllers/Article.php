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
        $this->assign('value', 'ArticleController');
        $this->css('css/layout.css');

//        $this->static();

    }

    public function yarAction()
    {
        $url = 'http://yaf.kaibuy.top/user/';

        $this->info();

        $client = new \laocc\plugs\Async($url);
        $client->token = 'myToken';
        $client->timeout = 10;

        $val = $client->test(time(), 123);
        var_dump($val);
        $this->text($val);

    }


    public function viewAction()
    {

        $this->title('YafPlugs');
        $this->keywords('这是一个Yaf的扩展插件包');
        $this->description('这是一个Yaf的扩展插件包');
        $this->assign('value', 'View Articles');
        $this->css('css/layout.css');


    }


    public function xmlAction()
    {
        $arr = [];
        $arr['_encoding'] = 'gb2312';
        $arr['_css'] = '/css/xml.css';
        $arr['cto']['name'] = '老船长';
        $arr['cto']['time'] = '2016-1-1';
        $arr['cto'][] = ['sex' => 'man'];
        $arr['cto'][] = ['age' => '40'];
        $arr['cto'][]['tel'] = '18801230456';
        $arr['cfo']['name'] = 'kebi';
        $arr['cfo']['time'] = '2016-2-1';
        $arr['cfo'][] = ['sex' => 'm'];
        $arr['cfo'][] = ['age' => '35'];
        $arr['cfo'][]['tel'] = '18801230789';
        $this->xml('root', $arr, true);
        $this->charset('gb2312');
    }


    public function jsonAction()
    {
        $arr = [];
        $arr['cto']['name'] = '老船长';
        $arr['cto']['time'] = '2016-1-1';
        $arr['cto'][] = ['sex' => 'man'];
        $arr['cto'][] = ['age' => '40'];
        $arr['cto'][]['tel'] = '18801230456';
        $arr['cfo']['name'] = 'kebi';
        $arr['cfo']['time'] = '2016-2-1';
        $arr['cfo'][] = ['sex' => 'm'];
        $arr['cfo'][] = ['age' => '35'];
        $arr['cfo'][]['tel'] = '18801230789';
        $this->json($arr, true);
    }


}
