<?php

namespace UntitledRestFramework;

use Psr\Http\Message\MessageInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\StreamInterface;
use Psr\Http\Message\UriInterface;
use UntitledRestFramework\Exceptions\InvalidRequestMethodException;
use UntitledRestFramework\Exceptions\NotImplementedException;
use UntitledRestFramework\Validators\RequestMethod;

class Request implements MessageInterface
{
    /**
     * @var Protocol The protocol being used to make this request
     */
    private Protocol $protocol;

    /**
     * @var array The headers attached to the request
     */
    private array $headers;

    public function __construct()
    {
        try {
            $this->protocol = new Protocol($_SERVER['SERVER_PROTOCOL']);
        } catch (\Exception $e) {
            die(dump($e));
        }

        die(dump($this->protocol));
    }

    /**
     * @return string
     */
    public function getProtocolVersion() : string
    {
        return $this->protocol->getVersion();
    }

    /**
     * @param string $version
     * @return Request
     */
    public function withProtocolVersion($version) : Request
    {
        $request = clone $this;
        $request->protocol->setVersion($version);

        return $request;
    }

    public function getHeaders() : array
    {
        return $this->headers;
    }

    /**
     * @param string $name Name of the header to check for
     * @return bool Indicates if named header is present on request
     */
    public function hasHeader($name) : bool
    {
        return array_key_exists($name, $this->headers);
    }

    /**
     * @param string $name Name of the header to retrieve
     * @return string|null The value of the header
     */
    public function getHeader($name) : ?string
    {
        return $this->headers[$name] ?? null;
    }

    /**
     * @param string $name Name of the header to retrieve the line for
     * @return string|null The line value of the header
     */
    public function getHeaderLine($name)
    {
        return $this->headers[$name] ?? null;
    }

    /**
     * @param string $name Name of the header to add to the cloned request
     * @param string $value Value of the header to add to the cloned request
     * @return Request
     */
    public function withHeader($name, $value) : Request
    {
        $request = clone $this;
        $request->headers[$name] = $value;

        return $request;
    }

    /**
     * @throws NotImplementedException
     */
    public function withAddedHeader($name, $value)
    {
        throw new NotImplementedException("withAddedHeader");
    }

    /**
     * @param string $name Name of the header to remove from the request
     * @return void
     */
    public function withoutHeader($name) : void
    {
        if (array_key_exists($name, $this->headers)) {
            unset($this->headers[$name]);
        }
    }

    /**
     * @return array The request body as an associative array, regardless of content type
     */
    public function getBody() : array
    {
        if ($this->headers['Content-Type'] == 'application/json') {
            return json_decode(file_get_contents('php://input', true));
        }

        return $_POST;
    }

    /**
     * @throws NotImplementedException
     */
    public function withBody(StreamInterface $body)
    {
        throw new NotImplementedException("withBody");
    }
//
//    /**
//     * @var string The message's request target
//     * @example origin-form, absolute-form, authority-form, asterisk-form
//     * @see https://www.rfc-editor.org/rfc/rfc7230.txt
//     */
//    private string $requestTarget;
//
//    /**
//     * @var string The HTTP Request Method
//     * @example GET, HEAD, POST, PUT, DELETE, CONNECT, OPTIONS, TRACE, PATCH
//     * @see https://tools.ietf.org/html/rfc7231
//     * @see https://tools.ietf.org/html/rfc5789
//     */
//    private string $method;
//
//    /**
//     * @var string The intended URI of the request
//     * @example /foo/bar
//     */
//    private string $uri;
//
//    /**
//     * @param string $requestTarget
//     * @return $this
//     */
//    public function setRequestTarget(string $requestTarget) : self
//    {
//        $this->requestTarget = $requestTarget;
//        return $this;
//    }
//
//    /**
//     * @return string
//     */
//    public function getRequestTarget() : string
//    {
//        return $this->requestTarget;
//    }
//
//    /**
//     * @param string $method
//     * @throws InvalidRequestMethodException
//     * @return $this
//     */
//    public function setMethod(string $method) : self
//    {
//        if (!RequestMethod::Validate($method)) {
//            throw new InvalidRequestMethodException();
//        }
//
//        $this->method = $method;
//        return $this;
//    }
//
//    /**
//     * @return string
//     */
//    public function getMethod() : string
//    {
//        return $this->method;
//    }
//
//    /**
//     * @param string $requestTarget
//     * @return Request
//     */
//    public function withRequestTarget( $requestTarget) : Request
//    {
//        $request = clone $this;
//        $request->setRequestTarget($requestTarget);
//
//        return $request;
//    }
//
//    /**
//     * @param $method
//     * @return Request
//     * @throws InvalidRequestMethodException
//     */
//    public function withMethod($method) : Request
//    {
//        $request = clone $this;
//        $request->setMethod($method);
//
//        return $request;
//    }
//
//    public function getUri()
//    {
//        // TODO: Implement getUri() method.
//    }
//
//    public function setUri(UriInterface $uri) : self
//    {
////        $uri = explode('/', $uri)[2];
////        $this->uri = explode('?', $uri)[0];
//
//        $this->uri = $uri;
//        return $this;
//    }
//
//    public function withUri(UriInterface $uri, $preserveHost = false)
//    {
//        $request = clone $this;
//        $request->setUri($uri);
//
//        return $request;
//    }
//

}