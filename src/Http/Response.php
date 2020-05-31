<?php

namespace Mehedi\Http;

use SimpleXMLElement;

class Response
{
    /**
     * @var SimpleXMLElement $response
     */
    protected $response;

    /**
     * @var $meta
     */
    protected $meta;

    /**
     * Response constructor.
     *
     * @param $response
     * @param $meta
     */
    public function __construct($response, $meta)
    {
        $this->response = new SimpleXMLElement($response);
        $this->meta = $meta;
    }

    /**
     * Is response ok
     *
     * @return bool
     */
    public function isOk()
    {
        return $this->meta['http_code'] === 200;
    }

    public function isNotOk()
    {
        return ! $this->isOk();
    }

    public function dump()
    {
        return $this->response;
    }

    public function saveAsXml($filename)
    {
        return $this->response->asXML($filename);
    }

    public function toXml()
    {
        return $this->response->__toString();
    }
}