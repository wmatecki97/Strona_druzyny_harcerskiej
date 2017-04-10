<?php

	session_start();
	
	if ((!isset($_SESSION['zalogowany'])) || (!$_SESSION['rola']=="admin")) 
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
	
</head>


<body  >

	
				<?PHP								require_once "menu i stopka.php";				echo $menu;				?>
				
	<div id="container">	
		<div id="pole" style="text-align:center;">
				<span style="text-align: center; color:#cc3333; font-size: 40px; "> ZADANIE SPECJALNE </span>
				</br><div style="font-size:13px;"></br></div>
				
				<?php	
					//POBIERANIE DANYCH TOP 10
								
					require_once "connect.php";

							$polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);
							if ($polaczenie->connect_errno!=0)
							{
								$_SESSION['blad'] = "blad serwera";
								header('Location: index.php');
								exit();
							}							
							else{
								$polaczenie -> query ('SET NAMES utf8');
								$polaczenie -> query ('SET CHARACTER_SET utf8_unicode_ci');
								//WYBIERA TRWAJACE GLOSOWANIA
								if($result = $polaczenie->query("SELECT nr_glosowania FROM glosowanie WHERE status='trwa' ORDER BY nr_glosowania DESC limit 1;"))
									if($result ->num_rows)
									{
											echo '<form action="nowe_specjalne.php" method="post"></br>TREŚĆ:</br><input type="text" name="tresc" style="width:500px;"/></br></br>PUNKTY:';
											
											echo '</br><input type="text" name="a1" style="width:50px; margin-top:0px; height:25px;"/></div>';
											
											echo '</br><input type="submit" style="width:400px; height:50px;" value="DODAJ ZADANIE SPECJALNE" /></form>';
									}
															
								
								
								
							
							
								$polaczenie->close();	
							}
				?>

			</div>
		</div>
	</div>
	<?PHP		echo $footer;	?>

</body>



</html>