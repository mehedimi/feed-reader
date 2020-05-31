<?php

use Mehedi\Feed;
use PHPUnit\Framework\TestCase;

class AtomTest extends TestCase
{
    function getAtomRequest()
    {
        return (new Feed())->atom('https://wordpress.org/news/feed/atom');
    }

    function test_response_status_code()
    {
        $response = $this->getAtomRequest()->read();

        $this->assertEquals(200, $response->meta('http_code'));
    }

    function test_is_ok_response()
    {
        $response = $this->getAtomRequest()->read();

        $this->assertTrue($response->isOk());
    }

    public function test_feed_data()
    {
        $response = $this->getAtomRequest()->read();

        $this->assertEquals('News –  – WordPress.org', $response->getTitle());
        $this->assertEquals('https://wordpress.org/news/feed/atom/', $response->getID());
        $this->assertEquals(new DateTime('2020-05-13T11:05:48Z'), $response->getUpdated());
    }

    function test_feed_option_element()
    {
        $response = $this->getAtomRequest()->read();

        $this->assertEquals('WordPress News', $response->feed()->subtitle);
    }

    function test_save_atom_xml()
    {
        $response = $this->getAtomRequest()->read();

        $response->saveAsXml('./../atom.xml');

        $this->assertXmlStringEqualsXmlFile('./../atom.xml', $response->toXml());
    }

    /**
     * @test
     */
    function entries_as_array()
    {
        $response = $this->getAtomRequest()->read();

        $this->assertIsArray($response->entriesAsArray()[0]);
        $this->assertCount(10, $response->entriesAsArray());
        $this->assertIsArray($response->entriesAsArray());
    }

    /**
     * @test
     */
    function entries_as_json()
    {
        $response = $this->getAtomRequest()->read();

        $this->assertJson($response->entriesAsJSON());
    }

    public function test_count_entries()
    {
        $response = $this->getAtomRequest()->read();

        $this->assertEquals(10, $response->entriesCount());
    }

    function test_attribute_of_entry()
    {
        $response = $this->getAtomRequest()->read();

        $this->assertEquals('html', $response->entries()[0]->summary->attributes()->type);
    }
}
