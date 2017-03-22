<?php

namespace API\Http\Middleware;

use API\Http\Exception\UnauthorizedException;
use API\Http\Exception\InvalidRequestException;

class Authenticator
{
    const TOKEN = 'FASDFJASLKDFJLASKD';

    public function __invoke()
    {
        if (!$this->hasToken($_SERVER)) {
            throw new InvalidRequestException("não autorizado");
        }

        if (!$this->isAValidToken($_SERVER['HTTP_TOKEN'])) {
            throw new UnauthorizedException("token inválido");
        }
    }

    private function hasToken($array)
    {
        return isset($array['HTTP_TOKEN']);
    }

    private function isAValidToken($token)
    {
        return $token == self::TOKEN;
    }

    public function createNewToken()
    {
        return self::TOKEN;
    }
}
