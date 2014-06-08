<?php

define('APP_DEBUG', true);
// DIR
define('REDIRECT', '/project/');
define('DIR_WEB_VIEW', '/project/view/');
define('DIR_APP', str_replace('\'', '/', realpath(dirname(__FILE__))) . '/' );
define('DIR_SYSTEM', DIR_APP . 'system/');
define('DIR_RAINTPL_TMP', DIR_SYSTEM . 'tmp/');
define('DIR_MODEL', DIR_APP . 'model/');
define('DIR_CONTROLLER', DIR_APP . 'controller/');
define('DIR_VIEW', DIR_APP . 'view/');
define('DIR_RAINTPL_TPL', 'view/tpl/');

define('TPL_EXTENSION', '.php');

//
define('MODEL_CLASS_SUFFIX', 'Model');
define('DEFAULT_CONTENT_MODEL', 'NewsModel');


// DB
define('DB_HOSTNAME', 'localhost');
define('DB_USERNAME', 'web');
define('DB_PASSWORD', '123');
define('DB_DATABASE', 'portfolio');


?>