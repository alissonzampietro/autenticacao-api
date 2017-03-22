<?php

namespace API\Http\Exception;

class InvalidRequestException extends \Exception
{
    public function __construct($message)
    {
        parent::__construct($message, 400);
    }
}
