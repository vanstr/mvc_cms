<?php
/**
 * Created by PhpStorm.
 * User: vanstr
 * Date: 13.25.12
 * Time: 19:27
 */

class ControllerFront{

    public function execute(){

        // get controller
        $controllerClass = $this->getControllerClass();

        $controller = new $controllerClass(new Registry());

        if( !isSilentRequest() ){
            d_echo("not silent");
            // render
            $controller -> index();
        }

        return $controller->response;

    }


    public function getControllerClass(){


        // TODO -> move to config
        $controllerClassPrefix = 'Controller';
        $defaultClassName = 'news';

        if ( isset($_GET['page']) && class_exists($_GET['page']) ){
            $className = $_GET['page'];
        }
        else{
            $className = $defaultClassName;
        }

        $className = $controllerClassPrefix.$className;

        d_echo("controller name: ". $className);

        return $className;
    }
}
?>