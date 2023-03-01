<?php

namespace Azatakmyradov\Routing;

use PHPUnit\Framework\TestCase;

class RouterTest extends TestCase
{
    protected Router $router;

    public function setUp() : void
    {
        $this->router = new Router();
    }

    public function test_router_get_method()
    {
        $this->router->get('/', 'HomeController@index');
        $this->router->get('/users/{id}', 'HomeController@users');

        self::assertTrue(count($this->routes()) === 2);

        self::assertTrue($this->routes()[0]['uri'] === '/');
        self::assertTrue($this->routes()[0]['controller'] === 'HomeController@index');
        self::assertTrue($this->routes()[0]['method'] === 'GET');

        self::assertTrue($this->routes()[1]['uri'] === '/users/{id}');
        self::assertTrue($this->routes()[1]['controller'] === 'HomeController@users');
        self::assertTrue($this->routes()[1]['method'] === 'GET');
    }

    public function test_router_post_method()
    {
        $this->router->post('/', 'HomeController@index');
        $this->router->post('/users/{id}', 'HomeController@users');

        self::assertTrue(count($this->routes()) === 2);

        self::assertTrue($this->routes()[0]['uri'] === '/');
        self::assertTrue($this->routes()[0]['controller'] === 'HomeController@index');
        self::assertTrue($this->routes()[0]['method'] === 'POST');

        self::assertTrue($this->routes()[1]['uri'] === '/users/{id}');
        self::assertTrue($this->routes()[1]['controller'] === 'HomeController@users');
        self::assertTrue($this->routes()[1]['method'] === 'POST');
    }

    public function test_router_delete_method()
    {
        $this->router->delete('/', 'HomeController@index');
        $this->router->delete('/users/{id}', 'HomeController@users');

        self::assertTrue(count($this->routes()) === 2);

        self::assertTrue($this->routes()[0]['uri'] === '/');
        self::assertTrue($this->routes()[0]['controller'] === 'HomeController@index');
        self::assertTrue($this->routes()[0]['method'] === 'DELETE');

        self::assertTrue($this->routes()[1]['uri'] === '/users/{id}');
        self::assertTrue($this->routes()[1]['controller'] === 'HomeController@users');
        self::assertTrue($this->routes()[1]['method'] === 'DELETE');
    }

    public function test_router_patch_method()
    {
        $this->router->patch('/', 'HomeController@index');
        $this->router->patch('/users/{id}', 'HomeController@users');

        self::assertTrue(count($this->routes()) === 2);

        self::assertTrue($this->routes()[0]['uri'] === '/');
        self::assertTrue($this->routes()[0]['controller'] === 'HomeController@index');
        self::assertTrue($this->routes()[0]['method'] === 'PATCH');

        self::assertTrue($this->routes()[1]['uri'] === '/users/{id}');
        self::assertTrue($this->routes()[1]['controller'] === 'HomeController@users');
        self::assertTrue($this->routes()[1]['method'] === 'PATCH');
    }

    public function test_router_put_method()
    {
        $this->router->put('/', 'HomeController@index');
        $this->router->put('/users/{id}', 'HomeController@users');

        self::assertTrue(count($this->routes()) === 2);

        self::assertTrue($this->routes()[0]['uri'] === '/');
        self::assertTrue($this->routes()[0]['controller'] === 'HomeController@index');
        self::assertTrue($this->routes()[0]['method'] === 'PUT');

        self::assertTrue($this->routes()[1]['uri'] === '/users/{id}');
        self::assertTrue($this->routes()[1]['controller'] === 'HomeController@users');
        self::assertTrue($this->routes()[1]['method'] === 'PUT');
    }

    public function routes(): array
    {
        return $this->router->getRoutes();
    }
}