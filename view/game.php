<?php
?>

<html>
	<head>
		<title>GAME</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="css/style.css" />
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
		<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  		<script src="//code.jquery.com/jquery-1.10.2.js"></script>
  		<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
		<script type="text/javascript">
			var players = jQuery.parseJSON('<?= System::jsonArray($this->game->players) ?>');
			var ships = jQuery.parseJSON('<?= System::jsonArray($this->game->ships) ?>');
			var map = jQuery.parseJSON('<?= System::jsonArray($_SESSION['map']) ?>');
		</script>
		<style>
		<?php
			foreach ($this->game->ships as $key => $value):; ?>
			.ship-color-<?= $value->get('_name') ?> {background: <?= $value->get('_color') ?>;}
		<?php endforeach ?>
		</style>
	</head>
	<body>
		<div class="nav_top">
			<div class="title_div">
				<a href="#" class="btn btn-danger" onclick="delete_session()">Supprimer la partie</a>
			</div>
		</div>
		<div class="select-menu on-left">
		<div class="select-ship" player-id="<?= $this->game->players[0]->id ?>">
		</div>
		</div>
		<div class="select-menu on-right">
		<div class="select-ship" player-id="<?= $this->game->players[1]->id ?>">
		</div>
		</div>

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
