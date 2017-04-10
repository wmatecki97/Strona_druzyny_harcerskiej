<?php

	session_start();
	
	if (!isset($_SESSION['zalogowany'])) 
	{
		header('Location: index.php');
		exit();
	}

?>

<!DOCTYPE HTML>
<html lang ="pl">
<head>
	<meta charset="utf-8" />
	<title>Strona Logowania</title>
	<meta name="description" content="Opis strony">
	<meta names="keywords" content="slowa, kluczowe"/>
	<meta http-equiv="X-UA-Compatible" content="IE=ede,chrome=1" />
	<link href="style-glowna.css" rel="stylesheet" type="text/css"/>
	<link href="https://fonts.googleapis.com/css?family=Russo+One" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Barrio" rel="stylesheet">
</head>

<body>
				<?PHP				
				require_once "menu i stopka.php";				echo $menu;
				?>
	<div id="container">			
			<div id="profil">
				<div style="text-align: center; color:#cc3333; font-size: 40px; "> <?php echo $_SESSION['nick']; ?></div>
				</br></br>
				nick: <?PHP 
				echo $_SESSION['nick'];
				?>
				</br></br>
				PUNKTY: <?PHP
				echo $_SESSION['punkty'];
				?>
				</br></br>
				SEMESTR: <?PHP
				echo $_SESSION['semestr'];
				?>
				</br></br>
				STOPIEŃ: <?PHP
				echo $_SESSION['stopien'];
				?>
				</br></br></br>
				
				<a href="logout.php">WYLOGUJ SIĘ</a>
				
			</div>
			<div id="ikona">
			<?php
					if($_SESSION['punkty']<100) echo '<img src="1.png"/>'; else
					if($_SESSION['punkty']<200) echo '<img src="2.png"/>'; else
					if($_SESSION['punkty']<300) echo '<img src="3.png"/>'; else
					if($_SESSION['punkty']<400) echo '<img src="4.png"/>'; else
					if($_SESSION['punkty']<500) echo '<img src="5.png"/>'; else
					if($_SESSION['punkty']<600) echo '<img src="6.png"/>'; else
					if($_SESSION['punkty']<700) echo '<img src="7.png"/>'; else
					if($_SESSION['punkty']<800) echo '<img src="8.png"/>'; else
					if($_SESSION['punkty']<900) echo '<img src="9.png"/>'; else echo '<img src="10.png"/>';
			?>
				
				
			</div>
			<div style="clear:both;"></div>
			<div id="przycisk" style="text-align: center;">
					<a href="zmien_dane.php"><input type="submit" style="width:200px; background-color:gray; font-size:25px; font-family: \'Barrio\', cursive; color:white;" value="EDYTUJ DANE" /></a>
			</div>
	</div>
		<?PHP		echo $footer;	?>
	

</body>



</html>