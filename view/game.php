<html>
	<head>
		<title>GAME</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="css/style.css" />
		<script type="text/javascript">
			var ships = jQuery.parseJson('<?= json_encode() ?>')
		</script>
		<style>
			.st_td			{position: relative; border: 1px solid;}
			.st_table		{border: 1px; width: 85vmin; height: 85vmin; margin-left: auto; margin-right: auto; margin-top: 1vh;}
			.st_txt			{font-size: 0.2em; text-align: center;}
			.dice_result	{color: white; font-size: 1.2em; padding-top: 5px}

			.left			{width: 30vmin; height: 10vmin; background: #2B303B; position: absolute; border: 5px solid silver; margin-left: 1vw; display: none;}

			.coucou			{left: 20px; font-size: 5em; line-height: 10px; position: absolute}
			.coucou:hover + .left { display: block; }

			.st_red_0		{background-color: #7F2626;}
			.st_red_1		{background-color: #FF4C4C;}
			.st_blue_0		{background-color: #426FFF;}
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
		<!-- <a class="coucou">_<br>_<br>_</a> -->


		<?php
			echo "<table class='st_table'>";
			$i = 0;
			while ($i < 15000)
			{
				echo ($i % 150 == 0 || $i == 0) ? "<tr>" : "";
				if ($_SESSION['map'][$i] == 'A')
					echo "<td class='st_td st_none st_txt st_red_0'></td>";
				else if ($_SESSION['map'][$i] == 'S')
					echo "<td class='st_td st_none st_txt st_red_1'></td>";
				else if ($_SESSION['map'][$i] == 'Hunter')
					echo "<td class='st_td st_none st_txt st_blue_0'></td>";
				else
					echo "<td class='st_td st_none st_txt'></td>";
				$i++;
				echo $i % 150 == 0 ? "</tr>" : "";
			}
			echo "</table'>";
		?>
	</body>
</html>
