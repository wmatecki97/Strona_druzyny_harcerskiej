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
	<div id="container" style="text-align:center; font-family: 'Barrio', cursive; font-size: 30px;	color: #fcfcfc;">	

				<span style="text-align: center; display:block; padding-top: 30px;	font-family: 'Barrio', cursive; color:#cc3333; font-size: 40px; "> PUNKTY </span>
		</br><div style="font-size:13px;"></br></div>
		<div class="prostokat">
				</br>
				TWOJE PUNKTY:</br>
				<?php echo '<div style="font-size: 130px;">'.$_SESSION['punkty'].'</div>'; ?>
		</div>
		
		<div class="prostokat">
				</br>
				OSTATNIO ZDOBYTE PUNKTY:</br></br>
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
								if($result = $polaczenie->query(sprintf("SELECT ile, za_co, data FROM punkty WHERE '%f'= id  and status = 'zatwierdzono' ORDER BY data DESC LIMIT 1", $_SESSION['id']))){
									if($result ->num_rows)
									{	
										while($rows = $result ->fetch_object()){
											echo $rows->ile.'PKT '.$rows->za_co.' dnia '.$rows->data.'</br><div style="font-size:8px;"></br></div>';
										}										
									}									
								}
								$polaczenie -> query ('SET NAMES utf8');
								$polaczenie -> query ('SET CHARACTER_SET utf8_unicode_ci');
								if($result = $polaczenie->query(sprintf("SELECT ile FROM punkty WHERE ('%f'= id)  and (status = 'weryfikacja') and (za_co='%s') ", $_SESSION['id'], "obecność na zbiórce"))){
								if($result ->num_rows)  $_SESSION['czybyl']=true;
								}

								$polaczenie->close();	
							}
				?>

		</div>
		<div style="clear:both;"></div>
		<div style="margin: 70px; text-align: center;">
		<?php
				if(!$_SESSION['czybyl']) {$_SESSION['dod_punkty_ile']=10; $_SESSION['dod_punkty_zaco']="obecność na zbiórce"; 
				echo '	
									<form action="dod_punkty.php" method="post">
									 <input type="submit" style=" width:800px;  background-color:#807687; height:50px; font-size:30px; color: white;"value="DODAJ OBECNOŚĆ NA ZBIÓRCE"/>
				</form>';}
				else echo "OCZEKIWANIE NA POTWIERDZENIE OBECNOŚCI...";
		?>
		</div>
		<div style="text-align: center;">
			DODATKOWE PUNKTY
			</div >
			
				<div style="text-align:center; margin:70px; padding-bottom: 70px;">
				<form action="dod_punkty.php" id="formularz" method="post">				
				<div style="display:block; float:left;width: 600px; margin-right: 50px;">			ZA CO: <br/><input type="text" style="width: 600px;" name="zaco"/></br></div>
				<div style="display:block; float:left; width:50px;">				ILE:<br/><input type="text" style="width:50px;" name="ile"/></div>
				</br><input type="submit" style="width:70px;font-family: 'Barrio', cursive; font-size:20px;" value="Wyślij"/>	
				</form>		
				
			</div>
		
		
		</div>
	<?PHP		echo $footer;	?>

</body>



</html>