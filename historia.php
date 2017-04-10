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
	<link href="style-boczna.css" rel="stylesheet" type="text/css"/>
	<link href="https://fonts.googleapis.com/css?family=Russo+One" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Barrio" rel="stylesheet">
</head>

<body>

	<?PHP								require_once "menu i stopka.php";				echo $menu;				?>
	<div id="container">	
		<article id="pole">
				<span style="text-align: center; color:#cc3333; font-size: 40px; "> RANKING SEMESTRALNY </span>
		</br><div style="font-size:23px;"></br>
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
									
								if($result = $polaczenie->query("SELECT * FROM punkty, osoby WHERE status='zatwierdzono' and osoby.id=punkty.id ORDER BY nr desc LIMIT 1000;")){
									if($result ->num_rows)
									{	
										
										while($rows = $result ->fetch_object()){		
											echo $rows->imie.' '.$rows->nazwisko.' '.$rows->ile.'PKT ZA '.$rows->za_co.' '.$rows->data.'</br>';
											
										}
										
									}
									
								}
								$polaczenie->close();	
							}
				?>
				</div>
		</article>
	</div>
	
<?PHP		echo $footer;	?>

</body>



</html>