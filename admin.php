<?php

	session_start();
	
	if ((!isset($_SESSION['zalogowany'])) || ($_SESSION['rola']=="user")) 
	{
		header('Location: index.php');
		exit();
	}
	echo$_SESSION['rola'];
	
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
				
	<div id="container" style="text-align:center; font-family: 'Barrio', cursive; font-size: 30px; min-height:400px; color: #fcfcfc;">	

				<span style="text-align: center; display:block; padding-top: 30px;	font-family: 'Barrio', cursive; color:#cc3333; font-size: 40px; "> ADMIN </span>
		</br><div style="font-size:13px;"></div>
		
		
		<div  style=" min-height:150px; width: 1000px;">
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
							else
							{
								$polaczenie -> query ('SET NAMES utf8');
								$polaczenie -> query ('SET CHARACTER_SET utf8_unicode_ci');									
								if($result = $polaczenie->query(sprintf("SELECT nr, ile, za_co, data, imie, nazwisko FROM punkty, osoby  WHERE status = 'weryfikacja' and osoby.id=punkty.id ORDER BY data ASC LIMIT 1;")))
									if($result ->num_rows)
									{	
											$rows = $result ->fetch_object();
											$_SESSION['nr'] = $rows->nr;
											echo '<div style="padding-top:20px;">'.$rows->imie.' '.$rows->nazwisko.' '.$rows->ile.'PKT za </br>'.$rows->za_co.'</br>dnia '.$rows->data.'</div>';
											echo '<form action="obecnosc.php" method="post">';
									}	
									else{
												if($result = $polaczenie->query(sprintf("SELECT id, email, nick, imie, rocznik, nazwisko FROM osoby  WHERE ranga = 'weryfikacja' ORDER BY data_dolaczenia ASC LIMIT 1;")))
														if($result ->num_rows)
														{	
																$rows = $result ->fetch_object();
																$_SESSION['nr'] = $rows->id;
																echo '<div style="padding-top:20px;">'.$rows->imie.' '.$rows->nazwisko.'</br>'.$rows->nick.'</br>'.$rows->email.'</br> '.$rows->rocznik.'</div>';
																echo '<form action="potwierdzenie_rejestracji.php" method="post">';
														}	
														else					
														{
															if($result = $polaczenie->query(sprintf("SELECT * FROM proby, osoby  WHERE status = 'weryfikacja' and osoby.id=proby.id LIMIT 1;")))
																if($result ->num_rows)
																{	
																		$row = $result ->fetch_object();
																		$result1 = $polaczenie->query(sprintf("SELECT zad1 AS t1, zad2 AS t2, zad3 AS t3, zad4 AS t4, zad5 AS t5, zad6 AS t6, zad7 AS t7, zad8 AS t8, zad9 AS t9, zad10 AS t10, zad11 AS t11, zad12 AS t12, zad13 AS t13, zad14 AS t14, zad15 AS t15, zad16 AS t16, zad17 AS t17, zad18 AS t18, zad19 AS t19, zad20 AS t20, zad21 AS t21, zad22 AS t22, zad23 AS t23, zad24 AS t24, zad25 AS t25, zad26 AS t26, zad27 AS t27  FROM proby WHERE status='treść' and realizowany_stopien='%s'; ", $row->realizowany_stopien));
																		$row1 = $result1 ->fetch_object();																		
																		$_SESSION['nr'] = $row ->nr_proby;
																		echo '<div style="padding-top:20px;">'.$row ->imie.' '.$row ->nazwisko.'</br>'.$row ->realizowany_stopien.'</br>'.$row ->otwarcie.'</br></div> ';
																		echo '<div class="zadanie">'.$row1->t1.'</div><div class="zadanie">'.$row->zad1.'</div><div style="clear:both"></div>';
																		echo '<div class="zadanie">'.$row1->t2.'</div><div class="zadanie">'.$row->zad2.'</div><div style="clear:both"></div>';
																		echo '<div class="zadanie">'.$row1->t3.'</div><div class="zadanie">'.$row->zad3.'</div><div style="clear:both"></div>';
																		echo '<div class="zadanie">'.$row1->t4.'</div><div class="zadanie">'.$row->zad4.'</div><div style="clear:both"></div>';
																		echo '<div class="zadanie">'.$row1->t5.'</div><div class="zadanie">'.$row->zad5.'</div><div style="clear:both"></div>';
																		echo '<div class="zadanie">'.$row1->t6.'</div><div class="zadanie">'.$row->zad6.'</div><div style="clear:both"></div>';
																		echo '<div class="zadanie">'.$row1->t7.'</div><div class="zadanie">'.$row->zad7.'</div><div style="clear:both"></div>';
																		echo '<div class="zadanie">'.$row1->t8.'</div><div class="zadanie">'.$row->zad8.'</div><div style="clear:both"></div>';
																		echo '<div class="zadanie">'.$row1->t9.'</div><div class="zadanie">'.$row->zad9.'</div><div style="clear:both"></div>';
																		echo '<div class="zadanie">'.$row1->t10.'</div><div class="zadanie">'.$row->zad10.'</div><div style="clear:both"></div>';
																		echo '<div class="zadanie">'.$row1->t11.'</div><div class="zadanie">'.$row->zad11.'</div><div style="clear:both"></div>';
																		echo '<div class="zadanie">'.$row1->t12.'</div><div class="zadanie">'.$row->zad12.'</div><div style="clear:both"></div>';
																		echo '<div class="zadanie">'.$row1->t13.'</div><div class="zadanie">'.$row->zad13.'</div><div style="clear:both"></div>';
																		echo '<div class="zadanie">'.$row1->t14.'</div><div class="zadanie">'.$row->zad14.'</div><div style="clear:both"></div>';
																		echo '<div class="zadanie">'.$row1->t15.'</div><div class="zadanie">'.$row->zad15.'</div><div style="clear:both"></div>';
																		echo '<div class="zadanie">'.$row1->t16.'</div><div class="zadanie">'.$row->zad16.'</div><div style="clear:both"></div>';
																		echo '<div class="zadanie">'.$row1->t17.'</div><div class="zadanie">'.$row->zad17.'</div><div style="clear:both"></div>';
																		echo '<div class="zadanie">'.$row1->t18.'</div><div class="zadanie">'.$row->zad18.'</div><div style="clear:both"></div>';
																		echo '<div class="zadanie">'.$row1->t19.'</div><div class="zadanie">'.$row->zad19.'</div><div style="clear:both"></div>';
																		echo '<div class="zadanie">'.$row1->t20.'</div><div class="zadanie">'.$row->zad20.'</div><div style="clear:both"></div>';
																		echo '<div class="zadanie">'.$row1->t21.'</div><div class="zadanie">'.$row->zad21.'</div><div style="clear:both"></div>';
																		echo '<div class="zadanie">'.$row1->t22.'</div><div class="zadanie">'.$row->zad22.'</div><div style="clear:both"></div>';
																		echo '<div class="zadanie">'.$row1->t23.'</div><div class="zadanie">'.$row->zad23.'</div><div style="clear:both"></div>';
																		if($row1->t24!="")echo '<div class="zadanie">'.$row1->t24.'</div><div class="zadanie">'.$row->zad24.'</div><div style="clear:both"></div>';
																		if($row1->t24!="")echo '<div class="zadanie">'.$row1->t25.'</div><div class="zadanie">'.$row->zad25.'</div><div style="clear:both"></div>';
																		if($row1->t24!="")echo '<div class="zadanie">'.$row1->t26.'</div><div class="zadanie">'.$row->zad26.'</div><div style="clear:both"></div>';
																		if($row1->t24!="")echo '<div class="zadanie">'.$row1->t27.'</div><div class="zadanie">'.$row->zad27.'</div><div style="clear:both"></div>';
																	
																		
																		echo '<form action="weryfikacja_proby.php" method="post">
																		</br></br>UWAGI:</br><input type="text"; style="width:800px;" name="uwagi"/></br></br>
																		<input type="submit" style="width:400px; background-color:gray; font-size:50px;  font-family: \'Barrio\', cursive; color:white;" value="WYŚLIJ!"><!--';
																		$schowajprzyciski=true;
																}	
																////////////////
																	else if($result = $polaczenie->query(sprintf("SELECT tresc, specjalne.punkty, imie, nazwisko, nrzadania, data FROM specjalne, osoby WHERE status = 'weryfikacja' and osoby.id=specjalne.id ORDER BY data ASC LIMIT 1;")))
																		if($result ->num_rows)
																		{	
																				$rows = $result ->fetch_object();
																				$_SESSION['nr'] = $rows->nrzadania;
																				echo '<div style="padding-top:20px;">'.$rows->imie.' '.$rows->nazwisko.' CHCE ZADANIE SPECJALNE '.$rows->punkty.'PKT za </br>'.$rows->tresc.'</br>dnia '.$rows->data.'</div>';
																				echo '<form action="weryfikacja_specjalne.php" method="post">';
																		}	
																else					header('Location: glowna.php');
														}
									}
								
								$polaczenie->close();	
							}
				?>	
		
		</div>
		<div style="display:block; float:left; margin-left:350px;">
							</br><input type="submit" name="tak" style="width:100px; height:50px; background-color:green; font-size:35px; font-family: 'Barrio', cursive; color:white;" value="TAK"/>	
		</div>
		<div style="display:block; float:left; margin-left:100px;">
							</br><input type="submit" name="nie" style="width:100px; height:50px; background-color:red; font-size:35px; font-family: 'Barrio', cursive; color:white;" value="NIE"/>	
						</form>
		</div>
		<div style="clear:both;"></div>

		
		
	</div>
			<?php
			if(isset($schowajprzyciski)){echo'--><div style="clear:both;"></div>	</div>
	</div>'; unset($schowajprzyciski);}			
		?>
<?PHP		echo $footer;	?>

</body>



</html>