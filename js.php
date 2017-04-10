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
	<link href="style-glosowanie.css" rel="stylesheet" type="text/css"/>
	<link href="https://fonts.googleapis.com/css?family=Russo+One" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Barrio" rel="stylesheet">
	
	<script type="text/javascript">
	
		function licz_punkty()
			{
				var b=0;
				
				document.getElementById("glosuj").innerHTML =<?php echo $_SESSION['a']?>
	//			else 	document.getElementById("glosuj").innerHTML ="";
				timer = setTimeout("licz_punkty()", 350);
			
			}
			
	
	</script>	
	
</head>


<body onload="licz_punkty()">

	
				<div id="header">
						<a href="glowna.php"><span style="color: #c34f4f;">B</span><span style="color: white;">ER</span><span style="color: #c34f4f;">S</span><span style="color: white;">ER</span><span style="color: #c34f4f;">K</span><span style="color: white;">ER</span></a>
					<div style="clear:both;"></div>
				</div>
				<div id="menu">
				<ol>
					<li><a href="top10.php">TOP10</a></li>
					<li><a href="semestr.php">SEMESTR</a></li>
					<li><a href="punkty.php">PUNKTY</a></li>
					<li><a href="glosowanie.php">GŁOSOWANIE</a></li>
					<li><a href="proby.php">PRÓBY</a></li>
					<li><a href="semestralna.php">RYWALIZACJA</a></li>
					<li><a href="specjalne.php">SPECJALNE</a></li>
				</ol>
				</div>
				
	<div id="container"  >	
		<form action="dod_glos.php" method="post">
		<input type="text" id="formularz" name="glos1" value="1" style="width:80px; margin:10px; height:25px;" />
		<input type="text" name="Imie" id="Imie" value="" />
		</form>
		<?php $_SESSION['a']=2;?>
		<div id="glosuj">
		
		
		</div>
	</div>
	
	<div id="footer">
				Strona Poznańskiej Drużyny Starszo Harcerskiej Berserk
	</div>

</body>



</html>