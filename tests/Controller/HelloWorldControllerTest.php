<?php

namespace App\Tests\Controller;

use App\Controller\HelloWorldController;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpFoundation\JsonResponse;

class HelloWorldControllerTest extends TestCase
{
    public function testHelloWorld()
    {
        $controller = new HelloWorldController();
        $response = $controller->index(567);

        $this->assertInstanceOf(JsonResponse::class, $response);
        $this->assertEquals(
            '{"value":"567","metadata":{"foo":"bar","baz":true}}',
            $response->getContent()
        );
    }
}
