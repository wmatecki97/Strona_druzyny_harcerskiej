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
</head>

<body>

	
				<div id="header">
					<span style="color: #c34f4f">B</span>ER<span style="color: #c34f4f">S</span>ER<span style="color: #c34f4f">K</span>ER
					<div style="clear:both;"></div>
				</div>
				<div id="menu">
				<ol>
					<li><a href="top10.php">TOP10</a></li>
					<li><a href="punkty.php">PUNKTY</a></li>
					<li><a href="glosowanie.php">GŁOSOWANIE</a></li>
					<li><a href="proby.php">PRÓBY</a></li>
					<li><a href="semestralna.php">RYWALIZACJA</a></li>
					<li><a href="specjalne.php">SPECJALNE</a></li>
				</ol>
				</div>
	<div id="container">			
				


	</div>

</body>



</html>