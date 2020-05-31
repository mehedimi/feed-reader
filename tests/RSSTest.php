<?php

use PHPUnit\Framework\TestCase;

class RSSTest extends TestCase
{
    /**
     * @test
     */
    public function it_return_request_object()
    {
        $rss = new \Mehedi\RSS();

        $response = $rss->url('http://static.userland.com/gems/backend/rssTwoExample2.xml');

        $this->assertInstanceOf(\Mehedi\Http\Request::class, $response);
    }

    /**
     * @test
     */
    public function it_can_return_response_rss()
    {
        $rss = new \Mehedi\RSS();

        $response = $rss->url('http://static.userland.com/gems/backend/rssTwoExample2.xml')->read();

        $this->assertInstanceOf(\Mehedi\Http\Response::class, $response);
    }

    /**
     * @test
     */
    public function it_can_handle_not_found_url()
    {
        $rss = new \Mehedi\RSS();

        $response = $rss->url('http://invalid-url.com')->read();

        $this->assertTrue($response->isNotOk());
    }

    /**
     * @test
     */
    public function it_can_save_xml_as_file()
    {
        $rss = new \Mehedi\RSS();

        $response = $rss->url('http://static.userland.com/gems/backend/rssTwoExample2.xml')->read();

//        $response->saveAsXml('./../rss.xml');
        echo $response->toXml();
//        $this->assertXmlStringEqualsXmlFile('./../rss.xml', $response->toXml());
    }
}