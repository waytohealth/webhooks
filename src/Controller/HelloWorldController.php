<?php


namespace App\Controller;


use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class HelloWorldController
{

    /**
     * @Route("/helloworld/{id}")
     * @param string $id
     * @return JsonResponse
     */
    public function index(string $id): JsonResponse
    {
        return new JsonResponse([
            'value'    => $id,
            'metadata' => [
                'foo' => 'bar',
                'baz' => true,
            ],
        ]);
    }
}
