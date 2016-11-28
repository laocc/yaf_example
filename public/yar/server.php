<?php

class RegisterApi
{
    /**
     * 测试接口
     * @param int $val 值1
     * @param int $time 时间
     * @return string 结果
     * 说明
     */
    public function login($val, $time)
    {
//        fastcgi_finish_request();
//        sleep(2);
        $value = ['val' => $val, 'register' => $time];
        return json_encode($value);
    }

    /**
     * 测试接口
     * @param int $val 值1
     * @param int $time 时间
     * @return string 结果
     */
    public function register($val, $time)
    {
//        fastcgi_finish_request();
//        sleep(2);
        $value = ['val' => $val, 'register' => $time];
        return json_encode($value);
    }
}

(new Yar_Server(new RegisterApi()))->handle();
