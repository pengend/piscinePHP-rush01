<?php
	if (!$_SESSION['map'])
		$_SESSION['map'] = ft_map_generation();
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

		<div class="select-menu on-left"><div class="select-ship"><div class="ship row"><div class="col-lg-3"></div><div class="col-lg-9"></div></div></div></div>
		<div class="select-menu on-right"></div>

		<?php
			echo "<table class='st_table'>";
			$i = 0;
			while ($i < 15000)
			{
				echo ($i % 150 == 0 || $i == 0) ? "<tr>" : "";
				if ($_SESSION['map'][$i] == 'A')
					echo "<td class='st_td st_none st_txt st_red_0' id='$i' onclick='ft_select(".$i.",\"".$_SESSION['map'][$i]."\")'></td>";
				else if ($_SESSION['map'][$i] == 'S')
					echo "<td class='st_td st_none st_txt st_red_1' id='$i' onclick='ft_select(".$i.",\"".$_SESSION['map'][$i]."\")'></td>";
				else if ($_SESSION['map'][$i] == 'Hunter')
					echo "<td class='st_td st_none st_txt Hunter' id='$i' onclick='ft_select(".$i.",\"".$_SESSION['map'][$i]."\")'></td>";
				else
					echo "<td class='st_td st_none st_txt' id='$i' onclick='ft_select(".$i.",\"".$_SESSION['map'][$i]."\")'></td>";
				$i++;
				echo $i % 150 == 0 ? "</tr>" : "";
			}
			echo "</table'>";
		?>
	</body>
	<script>
		var		old_id = -1;
		var		old_content = "E";

		function	ft_select(id, content)
		{
			if (old_id == -1 && content == "Hunter")
			{
				old_id = id;
				old_content = content;
			}
			else if (old_content != "E" && content != "Hunter")
			{
				alert("Let's move " + old_content + " from " + old_id + " to " + id);
				$.ajax({
					url: 'index.php',
					type: 'get',
					data: { "old_pos": old_id, "new_pos": id, "name": old_content},
					success: function (result)
					{
						if (result)
						{
							var lines = result.split('\n');
							for(var i = 0; i < lines.length; i++)
							{
								var parts = lines[i].split('|', 2);
								if (parts[0] || parts[1])
								{
									$("#" + parts[0]).attr("class", "st_td st_none st_txt " + parts[1]);
									$("#" + parts[0]).attr("onclick", "ft_select("+ parts[0] +", '"+ parts[1] +"')");
								}
							}
						}
					}
				});
				old_content = "E";
				old_id = -1
			}
		}
	</script>
</html>
