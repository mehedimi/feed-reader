<?php

namespace Mehedi\Http;

use Exception;
use SimpleXMLElement;

abstract class AbstractResponse
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
        $this->meta = $meta;

        if ($this->isOk()) {
            try {
                $this->response = new SimpleXMLElement($response);
            } catch (Exception $exception) {
                //
            }
        }
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

    /**
     * Is response is not ok
     *
     * @return bool
     */
    public function isNotOk()
    {
        return ! $this->isOk();
    }

    /**
     * Dump response
     *
     * @return array
     */
    public function dump()
    {
        return dump($this->response);
    }

    /**
     * Save response as XML
     *
     * @param $filename
     * @return mixed
     */
    public function saveAsXml($filename)
    {
        return $this->response->asXML($filename);
    }

    /**
     * Return response as xml
     *
     * @return mixed
     */
    public function toXml()
    {
        return $this->response->asXML();
    }

    /**
     * Get response meta data
     *
     * @param null $key
     * @return mixed
     */
    public function meta($key = null)
    {
        if (is_null($key)) {
            return $this->meta;
        }

        return $this->meta[$key];
    }

    /**
     * Get response status code
     *
     * @return mixed
     */
    public function statusCode()
    {
        return $this->meta['http_code'];
    }
}
