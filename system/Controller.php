<?php
/**
 * Created by PhpStorm.
 * User: vanstr
 * Date: 13.25.12
 * Time: 13:37
 */

class Controller {

    public $response = '';


    /** @var Registry */
    public $registry;


    public function validate(){

    }

    /**
     * process POST GET requests
     */
    public function processRequests(){

        d_echo(get_class_methods(get_class ($this)));

        if( isset($_GET['action']) ){
            $methodName = "actionGet".ucfirst(strtolower(escape($_GET['action'])));
            if( method_exists($this, $methodName) ){
                $this->$methodName();
            }
        }

        if( isset($_POST['action']) ){
            $methodName = "actionGet".ucfirst(strtolower(escape($_POST['action'])));
            if( method_exists($this, $methodName) ){
                $this->$methodName();
            }
        }

    }

    public function render(){
        //$this->registry->
        d_echo("Contoller:". get_class ($this));
    }

} 