# Simple PHP Router
You can add routes in the
`routes.php`

Basic form of routes accept uri and a closure
```php
<?php
...

$router->get('/', function () {
    echo 'home page';
});
```

You can create routes using controllers
```php
// src/Controllers/HomeController.php

<?php

class HomeController
{
    public function index()
    {
        echo 'home page';
    }
}
```

```php
// routes.php

<?php

...


$router->get('/', 'HomeController@index');
```

You can use wildcards in your URI as follows
```php
<?php

...

$router->get('/users/{id}', function ($id) {
    echo $id;
});
```

Example with using all methods
```php
<?php

...

$router->get($uri, $callback);
$router->post($uri, $callback);
$router->delete($uri, $callback);
$router->patch($uri, $callback);
$router->put($uri, $callback);
```