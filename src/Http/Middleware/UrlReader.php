<?php
namespace API\Http\Middleware;

class UrlReader
{
    private $url;
    
    private $parameter;
    
    public function __construct()
    {
        $this->url = $_SERVER['REQUEST_URI'];
        $this->parameter = file_get_contents($this->url);
        var_dump($this->parameter);
    }
}