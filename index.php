<?php

session_start();


require_once "config.php";

// load classes and functions
include DIR_SYSTEM . "classLoading.php";

d_echo($_SESSION);

$registry = new Registry();

$db = new MySQL(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$registry->db = $db;

$user = new User($db);
$registry->user = $user;

$c = new ControllerFront($registry);
$c->execute();

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
