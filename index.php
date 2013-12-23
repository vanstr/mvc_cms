<?php

session_start();


require_once "config.php";

// load classes and functions
include DIR_SYSTEM . "classLoading.php";

d_echo($_SESSION);



$controller = new Controller();

if( isset($_POST['silent']) && $_POST['silent'] == true ){
    echo $controller->modelActionResult;
}
else{
    $html = $controller -> render();
    echo $html;
}

//ob_end_clean();
?>
