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
    public function rss($url);
}
