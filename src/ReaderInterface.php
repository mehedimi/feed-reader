<?php

namespace Mehedi;

interface ReaderInterface
{
    /**
     * Read rss feed
     *
     * @param $url
     * @return mixed
     */
    public function rss($url);

    /**
     * Read atom feed
     *
     * @param $url
     * @return mixed
     */
    public function atom($url);
}
