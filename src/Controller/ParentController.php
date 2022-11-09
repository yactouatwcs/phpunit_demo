<?php

namespace App\Controller;

abstract class ParentController {

    protected \Twig\Environment $twig;

    public function __construct() {
        $loader = new \Twig\Loader\FilesystemLoader('/var/www/src/View');
        $this->twig = new \Twig\Environment($loader, [
            'cache' => false
        ]);
    }

}