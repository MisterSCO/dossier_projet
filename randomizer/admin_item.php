<?php

require_once 'config/config.php';
require_once 'model/functions.php';
require_once 'model/sessions.php';



$theme_default = THEME_PATH . THEME_DEFAULT . '/';
init_session();



if (is_logged() !== true) {
    header('Location:index.php');
    exit;
}


/* $query =  getplaylists(); */

$template = 'admin_item';
include_once $theme_default . 'layout.phtml';