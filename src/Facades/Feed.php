<?php

namespace Mehedi\Facades;

use Illuminate\Support\Facades\Facade;
use Mehedi\Http\AtomRequest;
use Mehedi\Http\RssRequest;

/**
 * @method static RssRequest rss(string $url)
 * @method static AtomRequest atom(string $url)
 *
 * @see \Mehedi\Feed
 */

class Feed extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Mehedi\Feed::class;
    }
}
