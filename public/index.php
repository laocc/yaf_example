<?php
ini_set('error_reporting', -1);
ini_set('display_errors', true);
ini_set('date.timezone', 'Asia/Shanghai');
define("_ROOT", realpath(__DIR__ . '/../') . '/');


function pre(...$str)
{
    $prev = debug_backtrace(DEBUG_BACKTRACE_PROVIDE_OBJECT | DEBUG_BACKTRACE_IGNORE_ARGS, 1)[0];
    if (isset($prev['file'])) {
        $file = "<i style='color:blue;'>{$prev['file']}</i><i style='color:red;'>[{$prev['line']}]</i>\n";
    } else {
        $file = null;
    }
    echo "<pre style='background:#fff;display:block;'>", $file;
    foreach ($str as $i => &$v) {
        print_r($v);
    }
    echo "</pre>";
}


(new \Yaf\Application(_ROOT . 'config/yaf.ini', 'develop'))
    ->bootstrap()
    ->run();
