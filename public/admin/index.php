<?php
define('ROOT', dirname(dirname(__DIR__)) . DIRECTORY_SEPARATOR);
define('APP', ROOT . app . DIRECTORY_SEPARATOR);
define('CLIENT', ROOT . 'public' . DIRECTORY_SEPARATOR);
define('Auth' , true);

require APP . 'config/config.php';
require APP . 'libs/Image.php';
require APP . 'framework/route.php';
require APP . 'framework/controller.php';
require APP . 'framework/model.php';
var_dump(PROTOCOL,DOMAIN,SUB_FOLDER);
exit();
$route = new Route();
?>