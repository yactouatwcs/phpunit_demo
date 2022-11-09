<?php declare(strict_types=1);

namespace Tests;

use App\Routing;
use Exception;
use PHPUnit\Framework\TestCase;

final class RoutingTest extends TestCase {

    protected Routing $routing;

    protected function setUp(): void {
        $_SERVER['REQUEST_URI'] = '';
        $this->routing = new Routing();
    }

    public function testGetRoutesGetCorrectRoutes() {
        // arrange
        $expected = [
            '/' => ['Controller\\HomeController', 'index']
        ];
        // act
        $actual = $this->routing->getRoutes();
        // assert
        $this->assertEquals($expected, $actual);
    }

    public function testGetClientUriReturnsClientUri() {
        $_SERVER['REQUEST_URI'] = '/toto';
        $expected = '/toto';
        $actual = $this->routing->getClientUri();
        $this->assertEquals($expected, $actual);
    }

    public function testGetClientUriWithHomePageReturnsClientUri() {
        $expected = '/';
        $actual = $this->routing->getClientUri();
        $this->assertEquals($expected, $actual);
    }

    public function testCheckIfRouteMatchesReturnsTrueIfRouteExists() {
        $expected = true;
        $actual = $this->routing->checkIfRouteMatches('/');
        $this->assertEquals($expected, $actual);
    }

    public function testCheckIfRouteMatchesThrowsExceptionIfRouteDoesNotExist() {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('not found');
        $actual = $this->routing->checkIfRouteMatches('/toto');
    }

    public function testGetCtlrInfoReturnsCorrectCtlrInfo() {
        $expected = ['Controller\\HomeController', 'index'];
        $actual = $this->routing->getCtlrInfo('/');
        $this->assertEquals($expected, $actual);
    }

}