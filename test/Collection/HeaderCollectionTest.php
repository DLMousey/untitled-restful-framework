<?php

namespace Collection;

use PHPUnit\Framework\TestCase;
use UntitledRestFramework\Collection\HeaderCollection;

class HeaderCollectionTest extends TestCase
{
    protected HeaderCollection $collection;

    public function setUp(): void
    {
        $this->collection = new HeaderCollection();
    }

    public function testHeaderIsAddedSuccessfully()
    {
        $this->collection->add("foo", "bar");
        $headers = $this->collection->getHeaders();
        $normalisedHeaders = $this->collection->getNormalisedHeaders();

        // Assert header collection
        $this->assertCount(1, $headers);
        $this->assertArrayHasKey("foo", $headers);
        $this->assertEquals("bar", $headers['foo']);

        // Assert normalised header collection
        $this->assertCount(1, $normalisedHeaders);
        $this->assertArrayHasKey("FOO", $normalisedHeaders);
        $this->assertEquals("bar", $normalisedHeaders['FOO']);
    }

    public function testHeaderIsAppendedSuccessfully()
    {
        $this->collection->append("foo=bar");
        $headers = $this->collection->getHeaders();
        $normalisedHeaders = $this->collection->getNormalisedHeaders();

        // Assert header collection
        $this->assertCount(1, $headers);
        $this->assertArrayHasKey("foo", $headers);
        $this->assertEquals("bar", $headers['foo']);

        // Assert normalised header collection
        $this->assertCount(1, $normalisedHeaders);
        $this->assertArrayHasKey("FOO", $normalisedHeaders);
        $this->assertEquals("bar", $normalisedHeaders['FOO']);
    }

    public function testHeaderIsRemovedSuccessfully()
    {
        $this->collection->add('foo', 'bar');
        $this->collection->remove("foo");

        $headers = $this->collection->getHeaders();
        $normalisedHeaders = $this->collection->getNormalisedHeaders();

        // Assert header collection
        $this->assertCount(0, $headers);
        $this->assertArrayNotHasKey("foo", $headers);

        // Assert normalised header collection
        $this->assertCount(0, $normalisedHeaders);
        $this->assertArrayNotHasKey("FOO", $normalisedHeaders);
    }
}