<?php
	session_start();
	if ($_POST['submit'] == "OK" && $_POST['dices'] != 0)
	{
		$i = 0;
		while ($_POST['dices'] != $i)
		{
			$results[$i] = rand(1, 6);
			$i++;
		}
		$_SESSION['dice'] = $results;
		header("Location: game.php");
	}
?>
