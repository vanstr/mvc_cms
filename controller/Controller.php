<?php

class Controller {

    public $model;
    public $url;
    public $tpl;
    public $db;
    public $modelActionResult;
    public $user;

    public function __construct() {


        $this->initDB();

        $this->initModel();

        $this->initTpl();

        $this->modelDooAction();

    }

    public function initDB(){
        $db = new MySQL(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
        $this->db = $db;

        /*
        $sql = "SELECT * FROM messages";
        $query = $db ->query($sql);
        d_echo($query);
        */
    }

    public function initModel(){


        if (!isset($_GET['page'])) {
            $this->model = new News();
        } else {
            $modelClass = $_GET['page'];
            $file = DIR_MODEL . $modelClass . TPL_EXTENSION;

            d_echo(' class: ' . class_exists($modelClass));
            if ( class_exists($modelClass)) {
                $this->model = new $modelClass();
            } else {
                $this->model = new News();
            }
        }

        $this->model->db = $this->db;

        if( isset($_SESSION['user_id']) && $_SESSION['user_id']!= null) $user = new User($this->db,$_SESSION['user_id']);
        else $user = new User();

        $this->model->user = $user;
        $this->user = $user;
        //d_echo($user->isAdmin());
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
        $tpl->assign("admin", $this->user->isAdmin());

        //assign to objects
        $this->tpl=$tpl;
        $this->model->tpl=$tpl;
    }


    public function render() {


        $tpl = $this->tpl;

        $navbar = (new NavigationBar($tpl, $this->db, $this->user))->render();
        $body = $this->model->render();
        $footer = (new Footer($tpl, $this->db, $this->user))->render();


        $tpl->assign("navbar", $navbar);
        $tpl->assign("body", $body);
        $tpl->assign("footer", $footer);

        // you can draw the output  $tpl->draw( 'page' );
        // or the template output string by setting $return_string = true:
        return $tpl->draw('html', $return_string = true);

    }


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
            $res = $this->model->$action();

        }
        //d_echo("nop");
    }

}

?>