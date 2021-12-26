<?php

namespace UntitledRestFramework\Collection;

use ArrayIterator;

class HeaderCollection
{
    private array $headers = [];

    private array $normalisedHeaders = [];

    /**
     * @param string $key Key to store the header under
     * @param string $value Value for the header
     * @return void
     */
    public function add(string $key, string $value) : void
    {
        $this->headers[$key] = $value;
        $this->normalisedHeaders[strtoupper($key)] = $value;
    }

    /**
     * @param string $value key=value pair header to append to headers
     * @return void
     */
    public function append(string $value) : void
    {
        $parts = explode('=', $value);
        $key = $parts[0];
        $value = $parts[1];

        $this->headers[$key] = $value;
        $this->normalisedHeaders[strtoupper($key)] = $value;
    }

    /**
     * @param string $key Key to remove from headers array
     * @return void
     */
    public function remove(string $key) : void
    {
        if (array_key_exists($key, $this->headers)) {
            unset($this->headers[$key]);
        }

        if (array_key_exists(strtoupper($key), $this->normalisedHeaders)) {
            unset($this->normalisedHeaders[strtoupper($key)]);
        }
    }

    /**
     * @param string $key Key to determiner existence for
     * @return bool Header exists in array
     */
    public function exists(string $key) : bool
    {
        return array_key_exists($key, $this->headers);
    }

    public function get(string $key) : ?string
    {
        return $this->headers[$key] ?? null;
    }

    /**
     * @return int Number of headers
     */
    public function count(): int
    {
        return count($this->headers);
    }

    /**
     * @return int Number of normalised headers
     */
    public function normalisedCount() : int
    {
        return count($this->normalisedHeaders);
    }

    /**
     * @return array A list of headers as they were originally added
     */
    public function getHeaders() : array
    {
        return $this->headers;
    }

    /**
     * @return array A list of headers normalised with uppercase keys
     */
    public function getNormalisedHeaders() : array
    {
        return $this->normalisedHeaders;
    }
}