<?php

namespace UntitledRestFramework;

use Exception;

class Protocol
{
    /**
     * @var string The protocol name
     */
    private string $protocol;

    /**
     * @var bool Whether this protocol is secure or not
     */
    private bool $secure;

    /**
     * @var string The version of this protocol in use
     */
    private string $version;

    public function __construct(string $protocol)
    {
        if (strpos($protocol, '/')) {
            $this->buildFromSuperglobal($protocol);
        } else {
            throw new Exception('Protocol must be from $_SERVER superglobal');
        }
    }

    /**
     * @throws Exception
     */
    private function buildFromSuperglobal(string $protocol)
    {
        $parts = explode('/', strtoupper($protocol));

        switch($parts[0]) {
            case "HTTP":
                $this->setProtocol("HTTP")
                    ->setSecure(false);
                break;
            case "HTTPS":
                $this->setProtocol("HTTPS")
                    ->setSecure(true);
                break;
            default:
                throw new Exception("Unsupported request protocol!");
        }

        $this->setVersion($parts[1]);
    }

    /**
     * @return mixed
     */
    public function getProtocol() : string
    {
        return $this->protocol;
    }

    /**
     * @param mixed $protocol
     * @return Protocol
     */
    public function setProtocol($protocol) : self
    {
        $this->protocol = $protocol;
        return $this;
    }

    /**
     * @return bool
     */
    public function getSecure() : bool
    {
        return $this->secure;
    }

    /**
     * @param bool $secure
     * @return Protocol
     */
    public function setSecure(bool $secure) : self
    {
        $this->secure = $secure;
        return $this;
    }

    /**
     * @return float
     */
    public function getVersion() : float
    {
        return $this->version;
    }

    /**
     * @param float $version
     * @return Protocol
     */
    public function setVersion(float $version) : self
    {
        $this->version = $version;
        return $this;
    }

    public function __toString() : string
    {
        return $this->getProtocol();
    }
}