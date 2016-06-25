<?php
?>

<html>
	<head>
		<title>GAME</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="css/style.css" />
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
		<script   src="https://code.jquery.com/jquery-2.2.4.min.js"   integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="   crossorigin="anonymous"></script>
		<script type="text/javascript">
			var ships = jQuery.parseJSON('<?= System::jsonArray($this->game->ships) ?>');
			console.log(ships);
		</script>
		<style>
			.st_td			{position: relative; border: 1px solid;}
			.st_table		{border: 1px; width: 85vmin; height: 85vmin; margin-left: auto; margin-right: auto;}
			.st_txt			{font-size: 0.2em; text-align: center;}
			.dice_result	{color: white; font-size: 1.2em; padding-top: 5px}

			.left			{width: 30vmin; height: 10vmin; background: #2B303B; position: absolute; border: 5px solid silver; margin-left: 1vw; display: none;}

			.st_red_0		{background-color: #7F2626;}
			.st_red_1		{background-color: #FF4C4C;}
			.Hunter			{background-color: #426FFF;}
		</style>
	</head>

	<body>
		<div class="nav_top">
			<div class="title_div">
				<form method='POST' action='sc_roll_dices.php'>
					<input type='number' name='dices' min='1' max='50' value='1'/>
					<input type='submit' name='submit' value='OK' />
				</form>
				<div class="dice_result">
					<?php
						if ($_SESSION['dice'])
							foreach ($_SESSION['dice'] as $value)
								echo $value." ";
					?>
				</div>
			</div>
		</div>

		<div class="select-menu on-left">
		<div class="select-ship">
		</div>
		</div>
		<div class="select-menu on-right"></div>

		<?php
			echo "<table class='st_table'>";
			$i = 0;
			while ($i < 15000)
			{
				echo ($i % 150 == 0 || $i == 0) ? '<tr>' : '';
				echo '<td class="st_td st_none st_txt" id="case_'.$i.'"></td>';
				$i++;
				echo ($i % 150 == 0) ? '</tr>' : '';
			}
			echo "</table>";
		?>
	<script type="text/javascript" src="js/initMap.js"></script>
	</body>
</html>
