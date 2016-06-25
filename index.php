<?php

session_start();
require 'autoload.php';
if (isset($_GET['old_pos']))
{
	$map = new World\Map();
	$map_arr = $_SESSION['map'];
	$hunter = new SpaceShip\Hunter(array('name' => $_GET['name']));
	$to_del = $map->remove_ship($hunter, $_GET['old_pos']);
	$to_add = $map->place_ship($hunter, $_GET['new_pos']);

	foreach ($to_del as $key => $value)
		$_SESSION['map'][$key] = $value;
	foreach ($to_add as $key => $value)
	{
		$_SESSION['map'][$key] = $value;
		echo $key."|".$value."\n";
	}
	exit();
}
$app = new App();
$app->handle();
