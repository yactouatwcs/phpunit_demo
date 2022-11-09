<?php

namespace App\Controller;

final class HomeController extends ParentController implements ControllerInterface {

    public function index(): string {
        return $this->twig->render('./Home/index.html.twig');
    }

}



