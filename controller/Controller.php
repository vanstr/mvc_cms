<?php

class Controller {

    /** @var Model */
    public $model;

    public $modelActionResult;

    /** @var Registry */
    public $registry;

    public function __construct($registry) {

        $this->registry = $registry;

        $this->initModel();

        $this->initTpl();

        $this->modelDooAction();

    }

    public function initModel(){


        if (!isset($_GET['page'])) {
            $this->model = new News($this->registry);
        } else {
            $modelClass = $_GET['page'];
            //$file = DIR_MODEL . $modelClass . TPL_EXTENSION;

            d_echo(' class: ' . class_exists($modelClass));
            if ( class_exists($modelClass)) {
                $this->model = new $modelClass($this->registry);
            } else {
                $this->model = new News($this->registry);
            }
        }

    }

    public function initTpl(){

        //raintpl::configure("base_url", DIR_APP );
        raintpl::configure("tpl_dir", DIR_RAINTPL_TPL);
        raintpl::configure("cache_dir", DIR_RAINTPL_TMP);
        raintpl::configure("tpl_ext", "php");
        raintpl::configure("path_replace", false);
        raintpl::configure("debug", APP_DEBUG);

        //initialize a Rain TPL object
        $tpl = new RainTPL;

        $tpl->assign("dirSRC", DIR_WEB_VIEW);
        $tpl->assign("title", "Hello World!");
        $tpl->assign("modelHeader","");
        $tpl->assign("modelFooter","");

        // TODO
        $tpl->assign("admin", $this->registry->user->isAdmin());

        //assign to registry objects
        $this->registry->tpl = $tpl;

    }


    public function render() {

        $tpl = $this->registry->tpl;

        $modelNavBar = new NavigationBar($this->registry);
        $navbar = $modelNavBar->render();

        $modelBody = $this->model;
        $body = $modelBody->render();

        $modelFooter = new Footer($this->registry);
        $footer = $modelFooter->render();


        $tpl->assign("navbar", $navbar);
        $tpl->assign("body", $body);
        $tpl->assign("footer", $footer);

        // you can draw the output  $tpl->draw( 'page' );
        // or the template output string by setting $return_string = true:
        return $tpl->draw('html', $return_string = true);

    }


    // TODO refactor
    public function modelDooAction(){
        d_Echo($_POST);
        //d_echo(array_key_exists(strtolower($_POST['action']), $this->model->allowedActions));
        if(    isset($_POST['action'])
            && $_POST['action'] != ''
            && array_key_exists(strtolower($_POST['action']), $this->model->allowedActions)
        ) {

            $action = $this->model->allowedActions[$_POST['action']];
            $res = $this->model->$action();
            $this -> modelActionResult = $res;
        }
        if(    isset($_GET['action'])
            && $_GET['action'] != ''
            && array_key_exists(strtolower($_GET['action']), $this->model->allowedActions)
        ) {

            $action = $this->model->allowedActions[$_GET['action']];
            //$res =
            $this->model->$action();

        }
        //d_echo("nop");
    }

}

?>