<?php

namespace Mehedi;

use Mehedi\Http\Request;

class RSS implements ReaderInterface
{
    public function url($url)
    {
        return new Request($url);
    }
}