<?php

namespace Mehedi\Http;

use SimpleXMLElement;

class RssResponse extends AbstractResponse
{
    /**
     * Get channel title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->response->channel->title->__toString();
    }

    /**
     * Get channel link
     *
     * @return string
     */
    public function getLink()
    {
        return $this->response->channel->link->__toString();
    }

    /**
     * Get channel description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->response->channel->description->__toString();
    }

    /**
     * Get channel data
     *
     * @return SimpleXMLElement
     */
    public function channel()
    {
        return $this->response->channel;
    }

    /**
     * Return items iterator
     *
     * @return SimpleXMLElement
     */
    public function items()
    {
        return $this->response->channel->item;
    }

    /**
     * Get items as array
     *
     * @return array
     */
    public function itemsAsArray()
    {
        $items = [];

        foreach ($this->items() as $item) {
            array_push($items, iterator_to_array($item));
        }

        return $items;
    }

    /**
     * Return items as JSON
     *
     * @return false|string
     */
    public function itemsAsJSON()
    {
        return json_encode($this->itemsAsArray());
    }

    /**
     * Get items count
     *
     * @return int
     */
    public function itemsCount()
    {
        return count($this->items());
    }
}
