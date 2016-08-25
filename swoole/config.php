<?php 
define('SWOOLE_HTTP_SERVER_HOST', '0.0.0.0');
define('SWOOLE_HTTP_SERVER_PORT', 9501);
define('SWOOLE_HTTP_SERVER_LOG_DIR', '/tmp/swoole_http_server.log');

function swooleHttpServerLog($content, $dir='')
{
    if (empty($dir) && empty(SWOOLE_HTTP_SERVER_LOG_DIR)) {
        return;
    }
    $dir = !empty($dir) ? $dir : SWOOLE_HTTP_SERVER_LOG_DIR;
    if (is_array($content)) {
        $content = var_export($content, true);
    } elseif (!is_string($content)) {
        $content = json_encode($content);
    }
    $dateTime = date('Y-m-d H:i:s');
    file_put_contents($dir, '[' . $dateTime . ']   ' . $content . PHP_EOL, FILE_APPEND);
}

//@see http://wiki.swoole.com/wiki/page/274.html
return array(
    'setting' => array(
        'worker_num' => 1,
        'max_request' => 999,
        'reactor_num' => 2,
    ),
);
