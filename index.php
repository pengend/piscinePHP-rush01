<?php

session_start();
require 'autoload.php';
$app = new App();
$app->handle();