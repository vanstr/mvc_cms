<?php


$directorys = array(
    DIR_SYSTEM,
    DIR_SYSTEM . 'structures/',
    DIR_MODEL,
    DIR_MODEL . 'news/',
    DIR_CONTROLLER
);

// ADMIN
if(true) $directorys[] = DIR_MODEL . 'admin/';

$files = array();

//scan defined dirs
foreach ($directorys as $directory) {

    //echo $directory;
    // scan files indirs
    $dh = opendir($directory);
    while (false !== ($filename = readdir($dh))) {
        if (!is_dir($directory . $filename)) {
            //echo $directory . $filename . " not dir " . "\n";
            //$files[] = array()
            require_once($directory . $filename);
        } else {
            //echo $filename . " is dir" . "\n";
        }
    }
}
//print_r($files);


?>