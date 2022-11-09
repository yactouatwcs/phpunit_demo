<?php declare(strict_types=1);

namespace Tests;

use App\Controller\HomeController;
use App\WebApp;
use PHPUnit\Framework\TestCase;

final class WebAppTest extends TestCase {

    protected function setUp(): void {
        $this->webApp = new WebApp();
    }

    public function testGetControllerInfoInstanciatesTheCorrectController() {
        $expected = HomeController::class;
        $this->webApp->setControllerFromInfo(
            ['Controller\\HomeController', 'index']
        );
        $actual = $this->webApp->getControllerInfo();
        $this->assertInstanceOf($expected, $actual);
    }

    public function testOutputResponseOutputsTheResponse() {
        $expected = \file_get_contents('/var/www/tests/mocks/home.html');
        $this->webApp->setControllerFromInfo(
            ['Controller\\HomeController', 'index']
        );
        $this->webApp->outputResponse();
        $this->expectOutputString($expected);
    }

}