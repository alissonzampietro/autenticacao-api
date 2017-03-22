<?php

namespace API\Http\Exception;

class UnauthorizedException extends \Exception
{
    public function __construct($message) {
        parent::__construct($message, 401);
    }
}
