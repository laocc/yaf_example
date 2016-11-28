<?php

$url = 'http://yaf.kaibuy.top/yar/server.php';


function callback($retval, $callinfo)
{
    if ($retval) print_r($retval);
}

function error_callback($type, $error, $callinfo)
{
//    echo '出错了：';
//    print_r(['type' => $type, 'error' => $error, 'info' => $callinfo]);
}

$v1 = Yar_Concurrent_Client::call($url, 'test', [time(), 'abc' => 2, 'def' => 1]);
$v2 = Yar_Concurrent_Client::call($url, 'test', ['aaa']);
$v3 = Yar_Concurrent_Client::call($url, 'test', ['aaa']);
$v4 = Yar_Concurrent_Client::call($url, 'test', ['aaa']);

//Yar_Concurrent_Client::loop();
Yar_Concurrent_Client::loop('callback', 'error_callback');