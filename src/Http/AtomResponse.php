<?php

namespace Mehedi\Http;

use DateTime;
use Exception;

class AtomResponse extends AbstractResponse
{
    /**
     * Get feed title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->response->title->__toString();
    }

    /**
     * Get feed ID
     *
     * @return string
     */
    public function getID()
    {
        return $this->response->id->__toString();
    }

    /**
     * Get feed updated time
     *
     * @return DateTime
     * @throws Exception
     */
    public function getUpdated()
    {
        return new DateTime($this->response->updated->__toString());
    }

    /**
     * Get feed
     *
     * @return \SimpleXMLElement
     */
    public function feed()
    {
        return $this->response;
    }

    /**
     * Get feed entries
     *
     * @return \SimpleXMLElement
     */
    public function entries()
    {
        return $this->feed()->entry;
    }

    /**
     * Get entries as array
     *
     * @return array
     */
    public function entriesAsArray()
    {
        $entries = [];

        foreach ($this->entries() as $entry) {
            array_push($entries, iterator_to_array($entry));
        }

        return $entries;
    }

    /**
     * Return entries as JSON
     *
     * @return false|string
     */
    public function entriesAsJSON()
    {
        return json_encode($this->entries());
    }

    /**
     * Get entries count
     *
     * @return int
     */
    public function entriesCount()
    {
        return count($this->entries());
    }
}
