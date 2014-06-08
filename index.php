<?php

session_start();

require_once "config.php";

// load classes and functions
include DIR_SYSTEM . "classLoading.php";


$db = new MySQL(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$user = new User($db);
$tpl = getConfiguredRainTpl($user->isAdmin());

//assign objects to registry
$registry = new Registry();
$registry->tpl = $tpl;
$registry->user = $user;
$registry->db = $db;


$c = new FrontController($registry);
$response = $c->execute();

echo $response;


//ob_end_clean();


?>
