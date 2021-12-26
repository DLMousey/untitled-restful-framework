<?php

namespace UntitledRestFramework\Exceptions;

use Exception;
use Throwable;

class NotImplementedException extends Exception
{
    public function __construct(string $method, $code = 0, Throwable $previous = null)
    {
        $message = "The called method: \"$method\", has not been implemented yet";

        parent::__construct($message, $code, $previous);
    }
}