<?php

namespace Mehedi\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static \Mehedi\Feed rss(string $url)
 * @method static \Mehedi\Feed atom(string $url)
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
