<?php

	session_start();
	
	if ((!isset($_SESSION['zalogowany'])) || ($_SESSION['rola']=="user")) 
	{
		header('Location: glowna.php');
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

	
				<?PHP								require_once "menu i stopka.php";				echo $menu;				?>
				
	<div id="container" style="font-size: 40px; ">			
	<span style="text-align: center; display:block; padding-top: 30px;	font-family: 'Barrio', cursive; color:#cc3333; font-size: 40px; "> ZARZADZANIE </span>
		</br><div style="font-size:13px;"></br></div>
			
			<a href="dod_glosowanie.php" style="color:white;">GŁOSOWANIE</a></br></br>
			<a href="dod_specjalne.php" style="color:white;">DODAJ ZADANIE SPECJALNE</a></br></br>
			<a href="dod_kontakt.php" style="color:white;">EDYTUJ DANE KONTAKTOWE</a></br></br>
			<a href="historia.php" style="color:white;">HISTORIA DODANYCH PUNKTÓW</a></br></br>
			<a href="zamknij_semestr.php" style="color:white;">ZAMKNIJ SEMESTR</a></br></br>
			<a href="logout.php">WYLOGUJ SIĘ</a>
			
			
	</div>
	
<?PHP		echo $footer;	?>

</body>



</html>