<?php

namespace Mehedi\Http;

class RssRequest extends AbstractRequest
{
    /**
     * Read rss feed
     *
     * @return RssResponse
     */
    public function read()
    {
        $response = new RssResponse(curl_exec($this->curl), curl_getinfo($this->curl));

        curl_close($this->curl);

        return $response;
    }
}
