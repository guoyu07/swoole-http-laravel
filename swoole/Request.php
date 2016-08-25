<?php 
namespace SwooleAdapter;

class Request extends \Illuminate\Http\Request {
    
    public static function createWithSwooleRequest($swooleRequest)
    {
        $get     = isset($swooleRequest->get)    ? $swooleRequest->get    : [];
        $post    = isset($swooleRequest->post)   ? $swooleRequest->post   : [];
        $cookie  = isset($swooleRequest->cookie) ? $swooleRequest->cookie : [];
        $server  = isset($swooleRequest->server) ? $swooleRequest->server : [];
        $header  = isset($swooleRequest->header) ? $swooleRequest->header : [];
        $files   = isset($swooleRequest->files)  ? $swooleRequest->files  : [];
        $content = $swooleRequest->rawContent()  ?: null;
        return static::create($server['request_uri'], $server['request_method'], array_merge($get, $post), $cookie, $files, $server, $content);
    }
    
}