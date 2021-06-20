<?php

use Entity\God;

require_once 'config/config.php';
require_once 'model/functions.php';
require_once 'model/sessions.php';
require_once '_bootstrap.php';



$theme_default = THEME_PATH . THEME_DEFAULT . '/';
init_session();



if (is_logged() !== true) {
    header('Location:index.php');
    exit;
}


$query_god = God::getAllGod();


$template = 'admin_god';
include_once $theme_default . 'layout.phtml';