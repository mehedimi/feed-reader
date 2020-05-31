<?php

namespace Mehedi;

use Mehedi\Http\AtomRequest;
use Mehedi\Http\RssRequest;

class Feed implements ReaderInterface
{
    /**
     * Read rss feed
     *
     * @param $url
     * @return RssRequest|mixed
     */
    public function rss($url)
    {
        return new RssRequest($url);
    }

    /**
     * Read atom feed
     *
     * @param $url
     * @return AtomRequest
     */
    public function atom($url)
    {
        return new AtomRequest($url);
    }
}
