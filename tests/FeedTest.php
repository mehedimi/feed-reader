<?php

use Mehedi\Feed;
use Mehedi\Http\RssResponse;

class FeedTest extends \PHPUnit\Framework\TestCase
{
    protected function getRssRequest($url = 'http://static.userland.com/gems/backend/rssTwoExample2.xml')
    {
        return (new Feed())->rss($url);
    }

    /**
     * @test
     */
    public function it_return_request_object()
    {
        $request = $this->getRssRequest();

        $this->assertInstanceOf(\Mehedi\Http\RssRequest::class, $request);
    }

    /**
     * @test
     */
    public function it_can_return_response_rss()
    {
        $response = $this->getRssRequest()->read();

        $this->assertInstanceOf(RssResponse::class, $response);
    }

    /**
     * @test
     */
    public function it_can_handle_not_found_url()
    {
        $response = $this->getRssRequest('http://not-url.com/rss')->read();

        $this->assertTrue($response->isNotOk());
    }

    /**
     * @test
     */
    public function it_can_save_xml_as_file()
    {
        $response = $this->getRssRequest()->read();

        $response->saveAsXml('./../rss.xml');

        $this->assertXmlStringEqualsXmlFile('./../rss.xml', $response->toXml());
    }

    /**
     * @test
     */
    public function items_can_be_iterable()
    {
        $response = $this->getRssRequest()->read();

        $this->assertIsIterable($response->items());
    }

    function test_basic_auth()
    {
        $response = $this->getRssRequest('https://jigsaw.w3.org/HTTP/Basic/')
            ->basicAuth('guest', 'sfs')
            ->read();

        $this->assertTrue($response->isNotOk());

        $response = $this->getRssRequest('https://jigsaw.w3.org/HTTP/Basic/')
            ->basicAuth('guest', 'guest')
            ->read();

        $this->assertTrue($response->isOk());
    }
}
