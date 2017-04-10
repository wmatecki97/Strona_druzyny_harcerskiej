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
	<meta charset="utf-8">
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
				<span style="text-align: center; color:#cc3333; font-size: 40px; "> KONTAKT </span>
		</br><div style="font-size:13px;"></br></br></div>
			<div style="width:800px; margin-left:auto; margin-right: auto; text-align: left;">
				<?php	
					
								
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
								if($result = $polaczenie->query("SELECT * FROM kontakt ORDER BY kolejnosc ASC;")){
									if($result ->num_rows)
									{	
											while($rows = $result ->fetch_object()){
											echo'</br></br>';											
											if(isset($rows->funkcja) && $rows->funkcja != "") echo  $rows->funkcja.': ';
											if(isset($rows->imie) && $rows->imie != "") echo  $rows->imie.' ';
											if(isset($rows->nazwisko)&& $rows->nazwisko != "") echo  $rows->nazwisko.'</br>';
											if(isset($rows->email)&& $rows->email != "") echo  $rows->email.'</br>';
											if(isset($rows->telefon)&& $rows->telefon != "") echo ' tel. '.$rows->telefon.'</br>';
											if(isset($rows->dodatkowe)&& $rows->dodatkowe != "") echo  $rows->dodatkowe.'</br>';											
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