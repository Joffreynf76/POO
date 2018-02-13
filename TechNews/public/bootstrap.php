<?php
define('PATH_ROOT',dirname(__DIR__));
define('PATH_PUBLIC','/POO/TechNews/public');
define('PATH_APPLICATION',PATH_ROOT.'/Application');
define('PATH_LAYOUT',PATH_APPLICATION.'/Layout');
define('PATH_VIEWS',PATH_APPLICATION.'/Views');
define('PATH_HEADER',PATH_LAYOUT.'/header.inc.php');
define('PATH_FOOTER',PATH_LAYOUT.'/footer.inc.php');

# Chargement de l'autoload
require_once 'autoloader.php';
Autoloader::register();