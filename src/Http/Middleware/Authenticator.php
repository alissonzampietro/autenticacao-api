<?php

namespace API\Http\Middleware;

use API\Http\Exception\UnauthorizedException;

class Authenticator
{
    const TOKEN = 'FASDFJASLKDFJLASKD';

    public function __invoke()
    {
        if (!$this->hasToken($_SERVER)) {
            throw new \Exception("não autorizado");
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
