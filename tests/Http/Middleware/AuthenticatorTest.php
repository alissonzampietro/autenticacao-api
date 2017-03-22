<?php

namespace API\Http\Middleware;

use PHPUnit\Framework\TestCase;

class AuthenticatorTest extends TestCase
{
    private $auth;

    public function setUp()
    {
        $this->auth = new Authenticator();
    }

    /**
     * @test
     * @expectedException \Exception
     */
    public function mustThrowExceptionWhenHasNoToken()
    {
        $_SERVER = [];
        $this->auth->__invoke();
    }

    /**
     * @test
     * @expectedException \API\Http\Exception\UnauthorizedException
     */
    public function mustThrowExceptionWhenTokenIsntValid()
    {
        $_SERVER['HTTP_TOKEN'] = 'ASIUASUIHAISUASUH';
        $this->auth->__invoke();
    }

    /**
     * @test
     */
    public function mustAuthenticateRequisition()
    {
        $_SERVER['HTTP_TOKEN'] = Authenticator::TOKEN;
        $this->auth->__invoke();
    }

    /**
     * @test
     */
    public function mustCreateNewToken()
    {
        $token = $this->auth->createNewToken();
        $this->assertEquals(Authenticator::TOKEN, $token);
    }
}
