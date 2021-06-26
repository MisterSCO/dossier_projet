<?php

require_once 'inc/sessions.php';
init_session();

clean_session();

header ('Location: index.php');