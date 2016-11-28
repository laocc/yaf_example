<?php

class api
{

    public function test($val, $time)
    {
//        fastcgi_finish_request();
//        sleep(2);
        $value = ['val' => $val, 'i' => $time];
        return json_encode($value);
    }
}

$sev = new Yar_Server(new api());
$sev->handle();
