<?php

namespace App;

use Exception;

final class Routing {

    public function getRoutes(): array {
        return [
            '/' => ['Controller\\HomeController', 'index']
        ];
    }

    public function getClientUri(): string {
        return $_SERVER['REQUEST_URI'] == '' ? '/' : $_SERVER['REQUEST_URI'];
    }

    public function checkIfRouteMatches(string $route): bool {
        $matches = array_key_exists($route, $this->getRoutes());
        if (!$matches) {
            throw new Exception('not found', 1);
        }
        return $matches;
    }

    public function getCtlrInfo(string $route): array {
        return $this->getRoutes()[$route];
    }

}