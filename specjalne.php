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
	<div id="container" style="text-align:center; font-family: 'Barrio', cursive; font-size: 30px; 	color: #fcfcfc;">	

				<span style="text-align: center; display:block; padding-top: 30px;	font-family: 'Barrio', cursive; color:#cc3333; font-size: 40px; "> ZADANIA </span>
		</br><div style="font-size:13px;"></br></div>
		
		
	
				</br>
				SPIS DOSTĘPNYCH ZADAŃ:</br></br>
				<?php	
					//POBIERANIE DANYCH O PUNKTACH
						
					$_SESSION['czybyl']=false;	
						
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
								if($result = $polaczenie->query(sprintf("SELECT * FROM specjalne WHERE status = 'oczekiwanie' ORDER BY data DESC "))){
									if($result ->num_rows)
									{	
										while($rows=$result ->fetch_object())										
											echo '<form action="wybierzspecjalne.php" method="post"> 
										<div class="zadanie">'.$rows->tresc.'</div>
										<div class="zadanie">
										<input type="hidden" name="nr" value='.$rows->nrzadania.'/>
										<div style="width: 190px; margin-right: 30px; float:left; ">punkty: '.$rows->punkty.'</div>
										<div style="float:left"> <input type="submit" style="width:190px; height:30px;" value="WYBIERZ ZADANIE"/></div>
										<div style="clear:both"></div>
										</div>
										<div style="text-align:center; width:880px; color:#b9ccb3; padding:30px;  border-top: 2px double gray;"></div>
										<div style="clear:both;"></div></form>';
									}	
										else echo'<div style="text-align:center; width:880px; color:#b9ccb3; padding:30px;  border-top: 2px double gray;"></div>AKTUALNIE NIE MA ŻADNYCH ZADAŃ</BR></BR>';
										
											
									}
																	
								

								$polaczenie->close();	
							}
				?>

		
		<div style="clear:both;"></div>
		
		
			
				
		
		
		</div>
	<?PHP		echo $footer;	?>

</body>



</html>