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
	
		var timer1=0;
		var timer2=0;
		var punkty=0;
		function licz_punkty()
			{

	//			else 	document.getElementById("glosuj").innerHTML ="";
				timer1 = setTimeout("licz_punkty()", 300);
			}
			function pokaz()
			{
				
				if(punkty==0)document.getElementById("glosuj").innerHTML ='<input type="submit" style="width:400px; background-color:gray; font-size:50px; font-family: \'Barrio\', cursive; color:white;" value="GŁOSUJ!" />';
				timer2=setTimeout("pokaz()", 500);
			}
			
			function glos()
			{
				document.getElementById("glosuj").innerHTML ='<input type="submit" style="width:400px; background-color:gray; font-size:50px; font-family: \'Barrio\', cursive; color:white;" value="ZAGLOSOWANO" />';
	//			else 	document.getElementById("glosuj").innerHTML ="";
				clearTimeout(timer1);
				clearTimeout(timer2);
			}
	
	</script>	
	
</head>


<body  onload="licz_punkty(); pokaz()">
		<form action="javascript:glos();">
		<div id="glosuj">
		</div>
		</form>
</body>



</html>