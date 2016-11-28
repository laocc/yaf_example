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


//
//        $this->xml('value', $arr);
//        $this->json($arr);
//        $this->html();
//        $this->text($arr);

//        Debug::stop();

    }
}
