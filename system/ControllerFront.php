<?php
/**
 * Created by PhpStorm.
 * User: vanstr
 * Date: 13.25.12
 * Time: 19:27
 */

class ControllerFront extends Controller{


    public function execute() {

        $controller = $this->getController();

        $controller->processRequests();

        if (!isSilentRequest()) {
            $controller->renderStandart();
        }

        return $controller->response;
    }


    private function getController() {

        $className = $this->getControllerName();
        $controller = new $className($this->registry);

        return $controller;
    }

    private function getControllerName() {

        // TODO -> move to config
        $controllerClassPrefix = 'Controller';
        $defaultControllerName = 'Main'.$controllerClassPrefix;

        if ( isset($_GET['page']) && class_exists(escape($_GET['page']).$controllerClassPrefix) ) {
            $className = escape($_GET['page']).$controllerClassPrefix;
        } else {
            $className = $defaultControllerName;
        }

        return $className;
    }
}

?>