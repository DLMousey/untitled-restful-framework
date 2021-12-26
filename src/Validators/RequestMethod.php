<?php

namespace UntitledRestFramework\Validators;

class RequestMethod
{
    const METHOD_GET = "GET";
    const METHOD_HEAD = "HEAD";
    const METHOD_POST = "POST";
    const METHOD_PUT = "PUT";
    const METHOD_DELETE = "DELETE";
    const METHOD_CONNECT = "CONNECT";
    const METHOD_OPTIONS = "OPTIONS";
    const METHOD_TRACE = "TRACE";
    const METHOD_PATCH = "PATCH";

    public static array $methods = [
        'GET',
        'HEAD',
        'POST',
        'PUT',
        'DELETE',
        'CONNECT',
        'OPTIONS',
        'TRACE',
        'PATCH',
    ];

    public static function Validate(string $requestMethod) : bool
    {
        return in_array(strtoupper($requestMethod), static::$methods);
    }
}