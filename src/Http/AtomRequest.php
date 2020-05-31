<?php

namespace Mehedi\Http;

class AtomRequest extends AbstractRequest
{
    /**
     * Read atom feed
     *
     * @return AtomResponse
     */
    public function read()
    {
        $response = new AtomResponse(curl_exec($this->curl), curl_getinfo($this->curl));

        curl_close($this->curl);

        return $response;
    }
}
