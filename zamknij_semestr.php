<?php

	session_start();
	
	if (!isset($_SESSION['zalogowany'])) 
	{
		header('Location: index.php');
		exit();
	}

	
	if (isset($_POST['haslo']))
	{
			//$haslo = $_POST['haslo'];
			if($_POST['haslo']== $_SESSION['haslo'])
			{	
								
					require_once "connect.php";

							$polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);
							if ($polaczenie->connect_errno!=0)
							{
								$_SESSION['blad'] = "blad serwera";
								header('Location: index.php');
								exit();
							}
							else{
									
								$polaczenie->query("UPDATE osoby SET semestr=0;");
								$polaczenie->close();	
							}
			}
			else $bledne_haslo = true;
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
	<link href="style-boczna.css" rel="stylesheet" type="text/css"/>
	<link href="https://fonts.googleapis.com/css?family=Russo+One" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Barrio" rel="stylesheet">
</head>

<body>

	
				<?PHP
				

				require_once "menu i stopka.php";
				echo $menu;

				?>
				
	<div id="container">	
		<article id="pole">
				<span style="text-align: center; color:#cc3333; font-size: 40px; "> Zamykanie semestru </span>
		</br><div style="font-size:13px;"></br></div>
		
		UWAGA, ZAMKNIĘCIE SEMESTRU OZNACZA NIEODWRACALNE WYZREOWANIE PUNKTÓW WSZYSTKICH OSÓB Z TEGO SEMESTRU</br>
		</br> PODAJ HASŁO ABY POTWIERDZIĆ
		<form action="zamknij_semestr.php" method="post">
		<input type="password" name = "haslo" style="width:100px;"/></br>
		<input type="submit" value = "ZAMKNIJ SEMESTR" ></br>
		<?PHP
			if(isset($bledne_haslo))echo '<div style="color:red;">HASŁO NIEPOPRWANE</div>';
			unset($bledne_haslo);
		?>
		</article>
	</div>
	
<?PHP
		echo $footer;
	?>

</body>



</html>