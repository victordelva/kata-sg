<?php

namespace App\Exceptions\Lawsuits;

use App\Exceptions\AppException;
use Throwable;

class ContractException extends AppException
{
    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
