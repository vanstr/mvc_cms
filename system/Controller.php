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

    public function doAction(){

    }

    public function index(){
        //$this->registry->
        d_echo("Contoller:". get_class ($this));
    }

} 