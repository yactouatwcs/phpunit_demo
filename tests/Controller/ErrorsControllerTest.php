<?php declare(strict_types=1);

namespace Tests\Controller;

use App\Controller\ErrorsController;
use PHPUnit\Framework\TestCase;

final class ErrorsControllerTest extends TestCase {

    public function testIndexReturnsNotFoundPage() {
        $expected = \file_get_contents('/var/www/tests/mocks/not-found.html');
        $ctlr = new ErrorsController();
        $actual = $ctlr->index();
        $this->assertEquals($expected, $actual);
    }

}