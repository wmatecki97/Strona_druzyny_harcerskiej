<?php

	session_start();
	
	if ((!isset($_SESSION['zalogowany'])) || ($_SESSION['rola']=="user")) 
	{
		header('Location: index.php');
		exit();
	}
	
	if(isset($_POST['nr']) )//obsluga przyslanej edycji
	{
		$_SESSION['nr'] = $_POST['nr'];
		if(isset($_POST['funkcja']))$_SESSION['funkcja'] = $_POST['funkcja'];else $_SESSION['funkcja'] = "";
		if(isset($_POST['imie']))$_SESSION['imie'] = $_POST['imie'];else $_SESSION['imie'] = "";
		if(isset($_POST['nazwisko']))$_SESSION['nazwisko'] = $_POST['nazwisko'];else $_SESSION['nazwisko'] = "";
		if(isset($_POST['email']))$_SESSION['email'] = $_POST['email'];else $_SESSION['email'] = "";
		if(isset($_POST['telefon']))$_SESSION['telefon'] = $_POST['telefon'];else $_SESSION['telefon'] = "";
		if(isset($_POST['dodatkowe']))$_SESSION['dodatkowe'] = $_POST['dodatkowe']; else $_SESSION['dodatkowe'] = "";
		if($_POST['imie']!="")echo'dupa';
		require_once "connect.php";

							$polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);
							if ($polaczenie->connect_errno!=0)
							{
								$_SESSION['blad'] = "blad serwera";
								header('Location: index.php');
								exit();
							}
							else{
								if($_SESSION['nr']!="" && $_SESSION['imie']=="" && $_SESSION['nazwisko']=="" && $_SESSION['funkcja']=="")
								$result = $polaczenie->query(sprintf("DELETE FROM kontakt WHERE kolejnosc='%d';", $_SESSION['nr']));
								else{
										$polaczenie -> query ('SET NAMES utf8');
										$polaczenie -> query ('SET CHARACTER_SET utf8_unicode_ci');
										$result = $polaczenie->query(sprintf("SELECT * FROM kontakt WHERE kolejnosc='%d';", $_SESSION['nr']));
										if($result->num_rows)
										$result = $polaczenie->query(sprintf("UPDATE kontakt SET funkcja='%s', imie='%s', email='%s', telefon='%s', nazwisko='%s', dodatkowe='%s' WHERE kolejnosc='%f'", 
										$_SESSION['funkcja'],
										$_SESSION['imie'],
										$_SESSION['email'],
										$_SESSION['telefon'],
										$_SESSION['nazwisko'],
										$_SESSION['dodatkowe'],
										$_SESSION['nr']
										));
										else{ $result = $polaczenie->query(sprintf("INSERT INTO `kontakt`(`kolejnosc`, `funkcja`, `imie`, `nazwisko`, `email`, `telefon`, `dodatkowe`) VALUES ('%d', '%s', '%s', '%s', '%s', '%s', '%s' );", 
										$_SESSION['nr'],
										$_SESSION['funkcja'],
										$_SESSION['imie'],
										$_SESSION['nazwisko'],
										$_SESSION['email'],
										$_SESSION['telefon'],
										$_SESSION['dodatkowe']));
										}
								}
								$polaczenie->close();	
							}
							unset($_SESSION['nr']);
							unset($_SESSION['imie']);
							unset($_SESSION['nazwisko']);
							unset($_SESSION['email']);
							unset($_SESSION['funkcja']);
							unset($_SESSION['telefon']);
							unset($_SESSION['dodatkowe']);
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

	
<div id="header">
					<a href="admin.php"><span style="color: #c34f4f;">B</span><span style="color: white;">ER</span><span style="color: #c34f4f;">S</span><span style="color: white;">ER</span><span style="color: #c34f4f;">K</span><span style="color: white;">ER</span></a>
					<div style="clear:both;"></div>
				</div>
				<div id="menu">
				<ol>
					<li><a href="zarzadzanie.php">GŁÓWNA</a></li>
					<li><a href="top10.php">TOP10</a></li>
					<li><a href="semestr.php">SEMESTR</a></li>
					<li><a href="punkty.php">PUNKTY</a></li>
					<li><a href="glosowanie.php"> GŁOSOWANIE </a></li>
					<li><a href="proby.php">PRÓBY</a></li>					
					<li><a href="specjalne.php">SPECJALNE</a></li>
					<li><a href="kontakt.php">KONTAKT</a></li>
				</ol>
				</div>
				
	<div id="container">	
		<div id="pole" style="text-align:center;">
				<span style="text-align: center; color:#cc3333; font-size: 40px; "> KONTAKT - EDYCJA </span>
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
								if($result = $polaczenie->query("SELECT kolejnosc, imie, nazwisko FROM kontakt;")){
									if($result ->num_rows)
										{				
											while($rows = $result ->fetch_object())
											{
													echo $rows->kolejnosc.'. '.$rows->imie.' '.$rows->nazwisko.'</br>';
													
											}															
										}
									}			
								$polaczenie->close();	
							}
				?>

			</div>
			
			
			<form method="post" action="dod_kontakt.php">
			NR DO EDYCJI:<input name="nr" type="text"/></br>
			FUNKCJA: <input name="funkcja" type="text"/></br>
			IMIE:<input name="imie" type="text">  NAZWISKO: <input name="nazwisko" type="text"/> </br>
			E-MAIL: <input name="email" type="text"/> TELEFON: <input name="telefon" type="text"/>
			DODATKOWE INFORMACJE: <input name="info" type="text"/></br>
			<input type="submit" value="ZAPISZ" style="width:200px; height:50px; font-size:20px; margin-top:20px;">

			
		</div>
	</div>
	
	
	<div id="footer">
				Strona Poznańskiej Drużyny Starszo Harcerskiej Berserk
	</div>

</body>



</html>