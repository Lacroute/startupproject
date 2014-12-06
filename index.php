<?php

$f3=require('lib/base.php');

$f3->config('config/globals.ini');
$f3->config('config/database.ini');
$f3->config('config/routes.ini');

$f3->run();
