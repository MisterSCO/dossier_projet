<?php

require_once 'model/sessions.php';
init_session();

clean_session();

header ('Location: index.php');