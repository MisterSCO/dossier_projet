<?php

require_once 'config/sessions.php';
init_session();

clean_session();

header ('Location: ./');