<?php

namespace App;

use App\Controller\ControllerInterface;

final class WebApp {

    private array $ctlrInfo;

    public function getControllerInfo(): ControllerInterface {
        return new ('App\\' . $this->ctlrInfo[0])();
    }

    // fluent setter
    public function setControllerFromInfo(array $ctlrInfo): self {
        $this->ctlrInfo = $ctlrInfo;
        return $this;
    }

    public function outputResponse(): void {
        echo $this->getControllerInfo()->{$this->ctlrInfo[1]}();
    }
}