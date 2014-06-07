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



    public function __construct($registry){
        $this->registry = $registry;
    }

    public function validate(){

    }

    /**
     * process POST GET requests
     */
    public function processRequests(){

        d_echo("Class:".get_class($this));
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

    public function renderStandart(){
        d_echo("Contoller:". get_class ($this));


        $footer = (new Footer($this->registry))->render();
        $navBar = (new NavigationBar($this->registry))->render();
        $body = "";

        $tpl = $this->registry->tpl;
        $tpl->assign("navbar", $navBar);
        $tpl->assign("body", $body);
        $tpl->assign("footer", $footer);

        // specific rendering
        $this->render();

    }

    public function render(){

    }


} 