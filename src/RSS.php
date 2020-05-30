<?php

namespace Mehedi;

class RSS implements ReaderInterface
{
    /**
     * Need to authenticate or not
     *
     * @var bool $useAuth
     */
    protected $useAuth = false;

    /**
     * Username
     *
     * @var $username
     */
    protected $username;

    /**
     * Password
     *
     * @var $password
     */
    protected $password;


    public function read($url)
    {

    }

    /**
     * Authentication
     *
     * @param $username
     * @param $password
     * @return $this
     */
    public function auth($username, $password)
    {
        $this->useAuth = true;
        $this->username = $username;
        $this->password = $password;

        return $this;
    }
}