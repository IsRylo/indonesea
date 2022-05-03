<?php

if( !session_id() ) session_start();
$_SESSION['id'] = 1;

require_once '../app/init.php';

$app = new app;
