<?php

namespace Mehedi;

interface ReaderInterface
{
    /**
     * Read a resource
     *
     * @param $url
     * @return mixed
     */
    public function read($url);

    /**
     * Authenticating with resource
     *
     * @param $username
     * @param $password
     * @return mixed
     */
    public function auth($username, $password);
}