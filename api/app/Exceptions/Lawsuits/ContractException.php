<?php

namespace App\Exceptions\Lawsuits;

use Exception;
use Throwable;

class ContractException extends Exception
{
    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
