<?php

namespace App\Controller;

final class ErrorsController extends ParentController implements ControllerInterface {

    public function index(): string {
        return $this->twig->render('./Errors/not-found.html.twig');
    }

}



