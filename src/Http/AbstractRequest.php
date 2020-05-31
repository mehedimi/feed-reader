<?php

namespace Mehedi\Http;

abstract class AbstractRequest
{
    /**
     * @var false|resource $curl
     */
    protected $curl;

    /**
     * Request constructor.
     * @param $url
     */
    public function __construct($url)
    {
        $this->curl = curl_init($url);
        curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($this->curl, CURLOPT_FOLLOWLOCATION, true);
    }

    abstract public function read();

    /**
     * Use basic authentication
     *
     * @param $username
     * @param $password
     * @return $this
     */
    public function basicAuth($username, $password)
    {
        curl_setopt($this->curl, CURLOPT_USERPWD, "{$username}:{$password}");
        return $this;
    }
}
