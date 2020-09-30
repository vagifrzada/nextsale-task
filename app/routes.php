<?php

use App\Services\UserService;
use App\Controllers\UsersController;
use function FastRoute\simpleDispatcher;
use FastRoute\{Dispatcher, RouteCollector};
use App\Repositories\{UserRepository, UserCsvRepository};

$dispatcher = simpleDispatcher(function (RouteCollector $r) {
    $r->addRoute('GET', '/users', [UsersController::class, 'index']);
    $r->addRoute('POST', '/users', [UsersController::class, 'store']);
});

$routeInfo = $dispatcher->dispatch(
    $_SERVER['REQUEST_METHOD'],
    rawurldecode($_SERVER['REQUEST_URI'])
);

switch ($routeInfo[0]) {
    case Dispatcher::NOT_FOUND:
        dd('Not found !');
        break;
    case Dispatcher::FOUND:
        $controller = $routeInfo[1][0];
        $method = $routeInfo[1][1];
        // Simulating DIC. Passing repository to controller.
        // Swap out dependency without touching code in controller.
        // !! Available data sources {UserRepository, UserCsvRepository}
        call_user_func([new $controller(new UserCsvRepository(), new UserService(new UserCsvRepository())), $method]);
        break;
}

