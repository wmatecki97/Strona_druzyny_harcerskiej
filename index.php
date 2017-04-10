<?php

	session_start();
	
	if ((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==true))
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
	<link href="style-index.css" rel="stylesheet" type="text/css"/>
	<link href="https://fonts.googleapis.com/css?family=Russo+One" rel="stylesheet">
</head>

<body>

	<div id="container">
				<div id="header">
					<span style="color: #c34f4f">B</span>ER<span style="color: #c34f4f">S</span>ER<span style="color: #c34f4f">K</span>ER
				</div>
				<div id="panel">
						<form action="zaloguj.php" id="formularz" method="post">
							Login: <br/><input type="text" name="login"/></br>
							Hasło:<br/><input type="password" name="haslo"/>
							</br><input type="submit" value="Zaloguj się"/>	
						</form>
				</div>

				<div id="rejestracja">
						<?php
							if(isset($_SESSION['blad'])) {echo $_SESSION['blad'].'</br>';}
						?>
						<a href="rejestracja.php" title="Nie masz konta? Zarejestruj się!">Nie masz konta? Zarejestruj się!</a>						
				</div>
	</div>

</body>



</html>