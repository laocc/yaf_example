<?php
use laocc\yaf\Controller;
use laocc\plugs\Debug;
use Yaf\Controller_Abstract;

class IndexController extends Controller
{
    public function indexAction()
    {
        Debug::init();

//        $this->title('Yaf Demo');
//        $this->keywords('Yaf Demo');
//        $this->description('Yaf Demo');
        $this->css('css/layout.css');
//
        $this->getView()->assign('value', 'Yaf Plugs');

        $arr = [];
        $arr['cto']['name'] = '老船长';
        $arr['cto']['time'] = '2016-1-1';
        $arr['cto'][] = ['sex' => '男'];
        $arr['cto'][] = ['age' => '40'];
        $arr['cto'][]['tel'] = '18801230456';
        $arr['cfo']['name'] = '科比';
        $arr['cfo']['time'] = '2016-2-1';
        $arr['cfo'][] = ['sex' => '男'];
        $arr['cfo'][] = ['age' => '35'];
        $arr['cfo'][]['tel'] = '18801230789';
        Debug::recode($arr);

//
//        $this->xml('value', $arr);
//        $this->json($arr);
//        $this->html();
//        $this->text($arr);

//        Debug::stop();

    }
}
