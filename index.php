<?php
	session_start();
?>

<html>
	<head>
		<title>42_SHOP</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="style.css" />
		<style>
			.st_table{border: 1px; width: 90vw; height: 70vh; margin-left: auto; margin-right: auto; margin-top: 7%;}
			td{height: 5vh; width: 2vw; position: relative; border: 1px solid;}

			/*
			** Cases
			*/
			/*.st_none {background-color: rgba(0, 0, 0, 0); border-color: rgba(0, 0, 0, 0);}*/
			.st_td_green {background-color: #4CAF50; text-align: center; position: relative;}
			.st_td_lgreen {background-color: #8BC34A; text-align: center; position: relative;}
			.st_td_orange {background-color: #FF9800; text-align: center; position: relative;}
			.st_td_brown {background-color: #795548; text-align: center; position: relative;}
			.st_td_pink {background-color: #F06292; text-align: center; position: relative;}
			.st_td_blue {background-color: #1976D2; text-align: center; position: relative;}
			.st_td_lblue {background-color: #29B6F6; text-align: center; position: relative;}
			.st_td_purple {background-color: #673AB7; text-align: center; position: relative;}
			.st_td_red {background-color: #f44336; text-align: center; position: relative;}
			.st_td_grey {background-color: #607D8B; text-align: center; position: relative;}
			.st_td_amber {background-color: #FFC107; text-align: center; position: relative;}

			/*
			** Texts
			*/
			.st_symb {position: relative; font-size: calc(0.75vw + 0.75vh + 0.375vmin); top: 0.5vh; display: inline-block;}
			.st_num {position: absolute; font-size: 0.7vw; float: left; bottom: 2%; left: 2%;}
			.st_weigth {position: absolute; font-size: 0.7vw; float: right; top: 2%; right: 2%;}


		</style>
	</head>

	<div class="nav_top">
		<div class="title_div">
			<h1><a href="index.php" class="title">42_SHOP</a></h1>
			<?php if ($_SESSION['user_level'] == 2) : ?>
				<a href="admin.php" class="access_admin">[Accès au panneau d'administration]</a>
			<?php endif; ?>
		</div>
		<div class='connection'>
			<?php if ($_SESSION['loggued_on_user'] == FALSE) : ?>
				<form method='POST' action='sc_login.php'>
				    Identifiant: <input type='text' name='login' value="<?php echo $_SESSION['login']; ?>" size='16' />
				    Mot de passe: <input type='password' name='passwd' value="<?php echo $_SESSION['passwd']; ?>" size='16' />
				   <input type='submit' name='submit' value='OK' />
				</form>
				</div>
				<div class='account'>Nouveau client ? <a href='create.php' class='create'>Créez un compte !</a></div>
			<?php else : ?>
				Bonjour <?php echo $_SESSION['loggued_on_user']; ?>
				<br /><br />
				<a href='compte.php' class='create'>[Compte]</a>
				<a href='sc_logout.php' class='create'>[Déconnexion]</a> <br />
				</div>
			<?php endif; ?>
	</div>
	<body>

	</body>
</html>
