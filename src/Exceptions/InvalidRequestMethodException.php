<?php

namespace UntitledRestFramework\Exceptions;

use Exception;
use Throwable;
use UntitledRestFramework\Validators\RequestMethod;

class InvalidRequestMethodException extends Exception
{
    public function __construct($code = 0, Throwable $previous = null)
    {
        $message = "Invalid request method provided, valid request methods are ";
        $message .= implode(', ', RequestMethod::$methods);

        parent::__construct($message, $code, $previous);
    }
}