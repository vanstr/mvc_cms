<?php

session_start();


require_once "config.php";

// load classes and functions
include DIR_SYSTEM . "classLoading.php";

//d_echo($_SESSION);

$registry = new Registry();

$db = new MySQL(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$registry->db = $db;

$user = new User($db);
$registry->user = $user;

// TODO move configuration to function
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
$tpl->assign("admin", $registry->user->isAdmin());
//assign to registry objects
$registry->tpl = $tpl;


$c = new FrontController($registry);
$response = $c->execute();

echo $response;



/*

$controller = new Controller2($registry);

if( isset($_POST['silent']) && $_POST['silent'] == true ){
    echo $controller->modelActionResult;
}
else{
    $html = $controller -> render();
    echo $html;
}*/

//ob_end_clean();


?>
