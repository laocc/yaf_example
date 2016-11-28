<?php
$url = 'http://yaf.kaibuy.top/yar/server.php';

$client = new Yar_Client($url);
$client instanceof RegisterApi and 1;

var_dump($client->login(time(), 123));
