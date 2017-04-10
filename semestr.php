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

	
				<?PHP
				

				require_once "menu i stopka.php";
				echo $menu;

				?>
				
	<div id="container">	
		<article id="pole">
				<span style="text-align: center; color:#cc3333; font-size: 40px; "> RANKING SEMESTRALNY </span>
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
									
								if($result = $polaczenie->query("SELECT nick, semestr, stopien, ranga, punkty, imie, nazwisko FROM osoby where rola='user' ORDER BY semestr desc ;")){
									if($result ->num_rows)
									{	
										$count = 1;
										while($rows = $result ->fetch_object()){		
											if($rows->punkty > 100)
											echo $count.'. '.$rows->nick.' '.$rows->imie.' '.$rows->nazwisko.' '.$rows->stopien.' '.$rows->semestr.'</br><div style="font-size:8px;"></br></div>';
											else echo $count.'. '.$rows->imie.' '.$rows->nazwisko.' '.$rows->stopien.' '.$rows->semestr.'</br><div style="font-size:8px;"></br></div>';
											$count++;
										}
										
									}
									
								}
								$polaczenie->close();	
							}
				?>

		</article>
	</div>
	
<?PHP
		echo $footer;
	?>

</body>



</html>