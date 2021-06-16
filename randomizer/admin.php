<?php

require_once 'config/config.php';


$theme_default = THEME_PATH . THEME_DEFAULT . '/';
/* init_session(); */
/* 


if (is_admin() !== true) {
    header('Location:index.php');
    exit;
} */


/* $query =  getplaylists(); */

$template = 'admin';
include_once $theme_default . 'layout.phtml';