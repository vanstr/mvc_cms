<?php
/**
 * Created by PhpStorm.
 * User: vanstr
 * Date: 13.25.12
 * Time: 13:37
 */

class Controller {

    public $response = "";

    /** @var Registry */
    public $registry;

    public function __construct($registry) {
        $this->registry = $registry;
    }

    public final function process() {
        $this->processRequests();
        if (!isSilentRequest()) {
            $this->processActivity();
        }
    }

    public final function processRequests() {

        d_echo("Class:" . get_class($this));
        d_echo(get_class_methods(get_class($this)));

        if (isset($_GET['action'])) {
            $methodName = "actionGet" . ucfirst(strtolower(escape($_GET['action'])));
            if (method_exists($this, $methodName)) {
                $this->$methodName();
            }
        }

        if (isset($_POST['action'])) {
            $methodName = "actionGet" . ucfirst(strtolower(escape($_POST['action'])));
            if (method_exists($this, $methodName)) {
                $this->$methodName();
            }
        }
    }

    public function processActivity() {

    }

} 