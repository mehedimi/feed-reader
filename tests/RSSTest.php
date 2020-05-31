<?php

use Mehedi\Feed;
use PHPUnit\Framework\TestCase;

class RSSTest extends TestCase
{
    protected function getRssRequest($url = 'http://static.userland.com/gems/backend/rssTwoExample2.xml')
    {
        return (new Feed())->rss($url);
    }

    /**
     * @test
     */
    function it_can_get_channel_title_data()
    {
        $response = $this->getRssRequest()->read();

        $this->assertEquals('Scripting News', $response->getTitle());
    }


    /**
     * @test
     */
    function it_can_countable_items()
    {
        $response = $this->getRssRequest()->read();

        $this->assertCount(9, $response->items());
    }

    /**
     * @test
     */
    function it_can_access_extra_channel_info()
    {
        $response = $this->getRssRequest()->read();

        $this->assertEquals('40', $response->channel()->ttl);
    }

    /**
     * @test
     */
    function items_as_array()
    {
        $response = $this->getRssRequest()->read();

        $this->assertIsArray($response->itemsAsArray()[0]);
        $this->assertCount(9, $response->itemsAsArray());
        $this->assertIsArray($response->itemsAsArray());
    }

    /**
     * @test
     */
    function items_as_json()
    {
        $response = $this->getRssRequest()->read();

        $this->assertJson($response->itemsAsJSON());
    }

    public function test_count_items()
    {
        $response = $this->getRssRequest()->read();

        $this->assertEquals(9, $response->itemsCount());
    }
}
