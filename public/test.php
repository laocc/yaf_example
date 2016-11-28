<?php

function debug($val)
{
    print_r($val);
}

$debug = function ($val) {
    print_r($val);
};
$obj = new test($debug);
$obj->debug();

class test
{
    private $fun;

    public function __construct($fun)
    {
        $this->fun = $fun;
    }

    public function debug()
    {
        $fun = $this->fun;
        if (is_callable($fun))
        $fun('aaa');

//        $this->fun('bbb');
    }

}