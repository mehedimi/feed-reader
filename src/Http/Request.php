<?php

namespace Mehedi\Http;

class Request
{
    protected $curl;

    public function __construct($url)
    {
        $this->curl = curl_init($url);
        curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, 1);
    }

    public function auth($username, $password)
    {

    }

    public function read()
    {
        return new Response(curl_exec($this->curl), curl_getinfo($this->curl));
    }

    public function __destruct()
    {
        curl_close($this->curl);
    }
}