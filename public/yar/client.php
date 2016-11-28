<?php
$url = 'http://yaf.kaibuy.top/yar/server.php';

$client = new Yar_Client($url);
$client instanceof api and 1;

var_dump($client->test(time(), 123));

async($url, [], function ($val) {
    echo $val;
});
