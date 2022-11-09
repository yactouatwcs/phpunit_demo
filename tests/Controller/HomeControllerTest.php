<?php declare(strict_types=1);

namespace Tests\Controller;

use App\Controller\HomeController;
use PHPUnit\Framework\TestCase;

final class HomeControllerTest extends TestCase {

    public function testIndexReturnsHomePage() {
        $expected = \file_get_contents('/var/www/tests/mocks/home.html');
        $ctlr = new HomeController();
        $actual = $ctlr->index();
        $this->assertEquals($expected, $actual);
    }

}