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
				<span style="text-align: center; color:#cc3333; font-size: 40px; "> GŁOSOWANIE </span>
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
								if($result = $polaczenie->query("SELECT nr_glosowania FROM glosowanie WHERE status='trwa' ORDER BY nr_glosowania DESC limit 1;")){
									if($result ->num_rows)
										{													
										$rows = $result ->fetch_object();		
					
															//GLOSOWAL - WYSWIETLA AKTUALNE WYNIKI GLOSOWANIA											
														if($result1 = $polaczenie->query(sprintf("SELECT sum(glosy.p1) AS p1, sum(glosy.p2) AS p2, sum(glosy.p3) AS p3, sum(glosy.p4) AS p4, sum(glosy.p5) AS p5, sum(glosy.p6) AS p6, sum(glosy.p7) AS p7, sum(glosy.p8) AS p8, sum(glosy.p9) AS p9, sum(glosy.p10) AS p10, glosowanie.temat AS temat, glosowanie.v1 AS v1, glosowanie.v2 AS v2, glosowanie.v3 AS v3, glosowanie.v4 AS v4, glosowanie.v5 AS v5, glosowanie.v6 AS v6, glosowanie.v7 AS v7, glosowanie.v8 AS v8, glosowanie.v9 AS v9, glosowanie.v10 AS v10 FROM glosy, glosowanie 
														WHERE glosy.nr_glosowania = '%f' and glosy.nr_glosowania = glosowanie.nr_glosowania", $rows->nr_glosowania)))
															if($result1 ->num_rows)
															{
																$rows1 = $result1 ->fetch_object();
																echo '</br><div style="font-size:50px;">'.$rows1->temat.'</div>';
																if($rows1->v1!=null) echo '<div class="wersja"><div class="c3">'.'1. '.$rows1->v1.'</div><div class="c4">'.$rows1->p1.' PKT</div></div>';
																if($rows1->v2!=null) echo '<div class="wersja"><div class="c3">'.'2. '.$rows1->v2.'</div><div class="c4">'.$rows1->p2.' PKT</div></div>';
																if($rows1->v3!=null) echo '<div class="wersja"><div class="c3">'.'3. '.$rows1->v3.'</div><div class="c4">'.$rows1->p3.' PKT</div></div>';
																if($rows1->v4!=null) echo '<div class="wersja"><div class="c3">'.'4. '.$rows1->v4.'</div><div class="c4">'.$rows1->p4.' PKT</div></div>';
																if($rows1->v5!=null) echo '<div class="wersja"><div class="c3">'.'5. '.$rows1->v5.'</div><div class="c4">'.$rows1->p5.' PKT</div></div>';
																if($rows1->v6!=null) echo '<div class="wersja"><div class="c3">'.'6. '.$rows1->v6.'</div><div class="c4">'.$rows1->p6.' PKT</div></div>';
																if($rows1->v7!=null) echo '<div class="wersja"><div class="c3">'.'7. '.$rows1->v7.'</div><div class="c4">'.$rows1->p7.' PKT</div></div>';
																if($rows1->v8!=null) echo '<div class="wersja"><div class="c3">'.'8. '.$rows1->v8.'</div><div class="c4">'.$rows1->p8.' PKT</div></div>';
																if($rows1->v9!=null) echo '<div class="wersja"><div class="c3">'.'9. '.$rows1->v9.'</div><div class="c4">'.$rows1->p9.' PKT</div></div>';
																if($rows1->v10!=null) echo '<div class="wersja"><div class="c3">'.'10. '.$rows1->v10.'</div><div class="c4">'.$rows1->p10.' PKT</div></div>';

																echo '</br><form action="zakoncz_glosowanie.php" method="post"><input type="hidden" name="nr" value="'.$rows->nr_glosowania.'"/><input type="submit" style="width:600px; height:50px; font-size:40px; color:red;"  value="ZAKOŃCZ GŁOSOWANIE"/></form>';
															}		
										}
										else {
											echo '<form action="nowe_glosowanie.php" method="post"></br>TEMAT:</br><input type="text" name="temat" style="width:500px;"/></br></br>MOŻLIWOŚCI:';
											for ($i=1; $i<=10; $i=$i+1)
											{
												echo '</br><div style="height:25px; font-size:25px;">'.$i.'<input type="text" name="a'.$i.'" style="width:500px; margin-top:0px; height:25px;"/></div>';
											}
											echo '</br><input type="submit" style="width:400px; height:50px;" value="DODAJ GŁOSOWANIE" /></form>';
										}
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