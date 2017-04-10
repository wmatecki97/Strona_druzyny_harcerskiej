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
	
	<script type="text/javascript">
		

		function otworz()
			{				
		if((document.querySelector('input[name="input1"]').value!="") && (document.querySelector('input[name="input2"]').value!="") && (document.querySelector('input[name="input3"]').value!="") && (document.querySelector('input[name="input4"]').value!="") && (document.querySelector('input[name="input5"]').value!="") && (document.querySelector('input[name="input6"]').value!="") && (document.querySelector('input[name="input7"]').value!="") && (document.querySelector('input[name="input8"]').value!="") && (document.querySelector('input[name="input9"]').value!="") && (document.querySelector('input[name="input10"]').value!="") && (document.querySelector('input[name="input11"]').value!="") && (document.querySelector('input[name="input12"]').value!="") && (document.querySelector('input[name="input13"]').value!="") && (document.querySelector('input[name="input14"]').value!="") && (document.querySelector('input[name="input15"]').value!="") && (document.querySelector('input[name="input16"]').value!="") && (document.querySelector('input[name="input17"]').value!="") && (document.querySelector('input[name="input18"]').value!="") && (document.querySelector('input[name="input19"]').value!="") && (document.querySelector('input[name="input20"]').value!="") && (document.querySelector('input[name="input21"]').value!="") && (document.querySelector('input[name="input22"]').value!="") && (document.querySelector('input[name="input23"]').value!="") )
		document.getElementById("wyslij").innerHTML ='<input type="submit" style="width:400px; background-color:gray; font-size:50px;  font-family: \'Barrio\', cursive; color:white;" value="WYŚLIJ!" />';
			else 	document.getElementById("wyslij").innerHTML ="WYPEŁNIJ WSZYSTKIE POLA";
				setTimeout("otworz()", 1000);
			}
			
			

	
	</script>	
	
</head>

<body onload="otworz()">
	
			<?PHP								require_once "menu i stopka.php";				echo $menu;				?>
	<div id="container">	
		<div id="pole">
				<span style="text-align: center; color:#cc3333; font-size: 40px; "> ĆWIK </span>
		<div style="font-size:13px;"></br></div>

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
								//POBIERA TRESCI ZADAN
								$result1 = $polaczenie->query(sprintf("SELECT zad1 AS t1, zad2 AS t2, zad3 AS t3, zad4 AS t4, zad5 AS t5, zad6 AS t6, zad7 AS t7, zad8 AS t8, zad9 AS t9, zad10 AS t10, zad11 AS t11, zad12 AS t12, zad13 AS t13, zad14 AS t14, zad15 AS t15, zad16 AS t16, zad17 AS t17, zad18 AS t18, zad19 AS t19, zad20 AS t20, zad21 AS t21, zad22 AS t22, zad23 AS t23, zad24 AS t24, zad25 AS t25, zad26 AS t26, zad27 AS t27  FROM proby WHERE status='treść' and realizowany_stopien='ćwik' "));
								$row1 = $result1->fetch_object();
								$result = $polaczenie->query(sprintf("SELECT * FROM proby WHERE '%f'= id  and status = 'trwa' and realizowany_stopien='ćwik' ", $_SESSION['id']));
									if($result ->num_rows)//WYPISUJE ZADANIA Z REALIZOWANEJ PROBY
									{	
										$row = $result ->fetch_object();
										echo '<div style="text-align:center; width:880px; color:#ad8585; padding:30px;  border-top: 2px double gray;">PRACA NAD SOBĄ:</div>';
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
										echo '<div style="text-align:center; width:880px; color:#ad8585; padding:30px;  border-top: 2px double gray;">DOSKONALENIE HARCERSKIE:</div>';
										echo '<div class="zadanie">'.$row1->t14.'</div><div class="zadanie">'.$row->zad14.'</div><div style="clear:both"></div>';
										echo '<div class="zadanie">'.$row1->t15.'</div><div class="zadanie">'.$row->zad15.'</div><div style="clear:both"></div>';
										echo '<div class="zadanie">'.$row1->t16.'</div><div class="zadanie">'.$row->zad16.'</div><div style="clear:both"></div>';
										echo '<div class="zadanie">'.$row1->t17.'</div><div class="zadanie">'.$row->zad17.'</div><div style="clear:both"></div>';
										echo '<div class="zadanie">'.$row1->t18.'</div><div class="zadanie">'.$row->zad18.'</div><div style="clear:both"></div>';
										echo '<div style="text-align:center; width:880px; color:#ad8585; padding:30px;  border-top: 2px double gray;">POSZUKIWANIE PÓL SŁUŻBY:</div>';
										echo '<div class="zadanie">'.$row1->t19.'</div><div class="zadanie">'.$row->zad19.'</div><div style="clear:both"></div>';
										echo '<div class="zadanie">'.$row1->t20.'</div><div class="zadanie">'.$row->zad20.'</div><div style="clear:both"></div>';
										echo '<div class="zadanie">'.$row1->t21.'</div><div class="zadanie">'.$row->zad21.'</div><div style="clear:both"></div>';
										echo '<div class="zadanie">'.$row1->t22.'</div><div class="zadanie">'.$row->zad22.'</div><div style="clear:both"></div>';
										echo '<div class="zadanie">'.$row1->t23.'</div><div class="zadanie">'.$row->zad23.'</div><div style="clear:both"></div>';
										//TUTAJ DUZO WIECEJ TEGO										
									}
									else // ROZPISUJE ZADANIA NA PROBE
									{
										$result = $polaczenie->query(sprintf("SELECT * FROM proby WHERE '%f'= id  and status = 'uwagi' and realizowany_stopien='ćwik' ", $_SESSION['id']));
										if($result ->num_rows)//	wyswietla probe i zadania wraz z uwagami;
										{
															$row = $result ->fetch_object();
															echo '<div style="padding:30px; width:880px; font-size: 50px;">UWAGI:</br>'.$row->uwagi.'</br></div>';
															echo '<div style="text-align:center; width:880px; color:#ad8585; padding:30px;  border-top: 2px double gray;">PRACA NAD SOBĄ:</div>';
															echo '<div class="zadanie">'.$row1->t1.'</div><div class="zadanie"><input type="text" value="'.$row->zad1.'" name="input1" style="width:350px; height:30px; margin-top: 50px;"/></div><div style="clear:both"></div>';
															echo '<div class="zadanie">'.$row1->t2.'</div><div class="zadanie"><input type="text" value="'.$row->zad2.'" name="input2" style="width:350px; height:30px; margin-top: 50px;"/></div><div style="clear:both"></div>';
															echo '<div class="zadanie">'.$row1->t3.'</div><div class="zadanie"><input type="text" value="'.$row->zad3.'" name="input3" style="width:350px; height:30px; margin-top: 50px;"/></div><div style="clear:both"></div>';
															echo '<div class="zadanie">'.$row1->t4.'</div><div class="zadanie"><input type="text" value="'.$row->zad4.'" name="input4" style="width:350px; height:30px; margin-top: 50px;"/></div><div style="clear:both"></div>';
															echo '<div class="zadanie">'.$row1->t5.'</div><div class="zadanie"><input type="text" value="'.$row->zad5.'" name="input5" style="width:350px; height:30px; margin-top: 50px;"/></div><div style="clear:both"></div>';
															echo '<div class="zadanie">'.$row1->t6.'</div><div class="zadanie"><input type="text" value="'.$row->zad6.'" name="input6" style="width:350px; height:30px; margin-top: 50px;"/></div><div style="clear:both"></div>';
															echo '<div class="zadanie">'.$row1->t7.'</div><div class="zadanie"><input type="text" value="'.$row->zad7.'" name="input7" style="width:350px; height:30px; margin-top: 50px;"/></div><div style="clear:both"></div>';
															echo '<div class="zadanie">'.$row1->t8.'</div><div class="zadanie"><input type="text" value="'.$row->zad8.'" name="input8" style="width:350px; height:30px; margin-top: 50px;"/></div><div style="clear:both"></div>';
															echo '<div class="zadanie">'.$row1->t9.'</div><div class="zadanie"><input type="text" value="'.$row->zad9.'" name="input9" style="width:350px; height:30px; margin-top: 50px;"/></div><div style="clear:both"></div>';
															echo '<div class="zadanie">'.$row1->t10.'</div><div class="zadanie"><input type="text" value="'.$row->zad10.'" name="input10" style="width:350px; height:30px; margin-top: 50px;"/></div><div style="clear:both"></div>';
															echo '<div class="zadanie">'.$row1->t11.'</div><div class="zadanie"><input type="text" value="'.$row->zad11.'" name="input11" style="width:350px; height:30px; margin-top: 50px;"/></div><div style="clear:both"></div>';
															echo '<div class="zadanie">'.$row1->t12.'</div><div class="zadanie"><input type="text" value="'.$row->zad12.'" name="input12" style="width:350px; height:30px; margin-top: 50px;"/></div><div style="clear:both"></div>';
															echo '<div class="zadanie">'.$row1->t13.'</div><div class="zadanie"><input type="text" value="'.$row->zad13.'" name="input13" style="width:350px; height:30px; margin-top: 50px;"/></div><div style="clear:both"></div>';
															echo '<div style="text-align:center; width:880px; color:#ad8585; padding:30px;  border-top: 2px double gray;">DOSKONALENIE HARCERSKIE:</div>';
															echo '<div class="zadanie">'.$row1->t14.'</div><div class="zadanie"><input type="text" value="'.$row->zad14.'" name="input14" style="width:350px; height:30px; margin-top: 50px;"/></div><div style="clear:both"></div>';
															echo '<div class="zadanie">'.$row1->t15.'</div><div class="zadanie"><input type="text" value="'.$row->zad15.'" name="input15" style="width:350px; height:30px; margin-top: 50px;"/></div><div style="clear:both"></div>';
															echo '<div class="zadanie">'.$row1->t16.'</div><div class="zadanie"><input type="text" value="'.$row->zad16.'" name="input16" style="width:350px; height:30px; margin-top: 50px;"/></div><div style="clear:both"></div>';
															echo '<div class="zadanie">'.$row1->t17.'</div><div class="zadanie"><input type="text" value="'.$row->zad17.'" name="input17" style="width:350px; height:30px; margin-top: 50px;"/></div><div style="clear:both"></div>';
															echo '<div class="zadanie">'.$row1->t18.'</div><div class="zadanie"><input type="text" value="'.$row->zad18.'" name="input18" style="width:350px; height:30px; margin-top: 50px;"/></div><div style="clear:both"></div>';
															echo '<div style="text-align:center; width:880px; color:#ad8585; padding:30px;  border-top: 2px double gray;">POSZUKIWANIE PÓL SŁUŻBY:</div>';
															echo '<div class="zadanie">'.$row1->t19.'</div><div class="zadanie"><input type="text" value="'.$row->zad19.'" name="input19" style="width:350px; height:30px; margin-top: 50px;"/></div><div style="clear:both"></div>';
															echo '<div class="zadanie">'.$row1->t20.'</div><div class="zadanie"><input type="text" value="'.$row->zad20.'" name="input20" style="width:350px; height:30px; margin-top: 50px;"/></div><div style="clear:both"></div>';
															echo '<div class="zadanie">'.$row1->t21.'</div><div class="zadanie"><input type="text" value="'.$row->zad21.'" name="input21" style="width:350px; height:30px; margin-top: 50px;"/></div><div style="clear:both"></div>';
															echo '<div class="zadanie">'.$row1->t22.'</div><div class="zadanie"><input type="text" value="'.$row->zad22.'" name="input22" style="width:350px; height:30px; margin-top: 50px;"/></div><div style="clear:both"></div>';
															echo '<div class="zadanie">'.$row1->t23.'</div><div class="zadanie"><input type="text" value="'.$row->zad23.'" name="input23" style="width:350px; height:30px; margin-top: 50px;"/></div><div style="clear:both"></div>';
															echo '<div id="wyslij" style="border-top: 2px double gray; width:940px; padding-top:40px;"  ></div>';
										}
										else //WYSWIETLA TRESC ZADAN I FORMULARZ ORAZ PODPOWIEDZI
										{
											if($result = $polaczenie->query(sprintf("SELECT * FROM proby WHERE '%f'= id  and status = 'weryfikacja' and realizowany_stopien='ćwik' ", $_SESSION['id'])))if($result ->num_rows)echo 'WERYFIKACJA W TOKU...';
											else{
													echo '<form action="dod_probe.php" method="post">';
													echo '<div style="text-align:center; width:880px; color:#ad8585; padding:30px;  border-top: 2px double gray;">PRACA NAD SOBĄ:</div>';
													echo '<div class="zadanie">'.$row1->t1.'</div><div class="zadanie"><input type="text" name="input1" style="width:350px; height:30px; margin-top: 50px;"/></div><div style="clear:both"></div><div style="text-align:center; width:880px; color:#b9ccb3; padding:30px;  border-top: 2px double gray;">';
														$result = $polaczenie->query(sprintf("SELECT zad1 FROM proby WHERE  (status='ukonczono' or status = 'trwa') and realizowany_stopien='ćwik' ORDER BY RAND() LIMIT 1"));$row = $result ->fetch_object(); echo 'PRZYKAAD:</br></br>'.$row->zad1.'</div>';
													echo '<div class="zadanie">'.$row1->t2.'</div><div class="zadanie"><input type="text" name="input2" style="width:350px; height:30px; margin-top: 50px;"/></div><div style="clear:both"></div><div style="text-align:center; width:880px; color:#b9ccb3; padding:30px;  border-top: 2px double gray;">';
														$result = $polaczenie->query(sprintf("SELECT zad2 FROM proby WHERE  (status='ukonczono' or status = 'trwa') and realizowany_stopien='ćwik' ORDER BY RAND() LIMIT 1"));$row = $result ->fetch_object(); echo 'PRZYKAAD:</br></br>'.$row->zad2.'</div>';
													echo '<div class="zadanie">'.$row1->t3.'</div><div class="zadanie"><input type="text" name="input3" style="width:350px; height:30px; margin-top: 50px;"/></div><div style="clear:both"></div><div style="text-align:center; width:880px; color:#b9ccb3; padding:30px;  border-top: 2px double gray;">';
														$result = $polaczenie->query(sprintf("SELECT zad3 FROM proby WHERE  (status='ukonczono' or status = 'trwa') and realizowany_stopien='ćwik' ORDER BY RAND() LIMIT 1"));$row = $result ->fetch_object(); echo 'PRZYKAAD:</br></br>'.$row->zad3.'</div>';
													echo '<div class="zadanie">'.$row1->t4.'</div><div class="zadanie"><input type="text" name="input4" style="width:350px; height:30px; margin-top: 50px;"/></div><div style="clear:both"></div><div style="text-align:center; width:880px; color:#b9ccb3; padding:30px;  border-top: 2px double gray;">';
														$result = $polaczenie->query(sprintf("SELECT zad4 FROM proby WHERE  (status='ukonczono' or status = 'trwa') and realizowany_stopien='ćwik' ORDER BY RAND() LIMIT 1"));$row = $result ->fetch_object(); echo 'PRZYKAAD:</br></br>'.$row->zad4.'</div>';
													echo '<div class="zadanie">'.$row1->t5.'</div><div class="zadanie"><input type="text" name="input5" style="width:350px; height:30px; margin-top: 50px;"/></div><div style="clear:both"></div><div style="text-align:center; width:880px; color:#b9ccb3; padding:30px;  border-top: 2px double gray;">';
														$result = $polaczenie->query(sprintf("SELECT zad5 FROM proby WHERE  (status='ukonczono' or status = 'trwa') and realizowany_stopien='ćwik' ORDER BY RAND() LIMIT 1"));$row = $result ->fetch_object(); echo 'PRZYKAAD:</br></br>'.$row->zad5.'</div>';
													echo '<div class="zadanie">'.$row1->t6.'</div><div class="zadanie"><input type="text" name="input6" style="width:350px; height:30px; margin-top: 50px;"/></div><div style="clear:both"></div><div style="text-align:center; width:880px; color:#b9ccb3; padding:30px;  border-top: 2px double gray;">';
														$result = $polaczenie->query(sprintf("SELECT zad6 FROM proby WHERE  (status='ukonczono' or status = 'trwa') and realizowany_stopien='ćwik' ORDER BY RAND() LIMIT 1"));$row = $result ->fetch_object(); echo 'PRZYKAAD:</br></br>'.$row->zad6.'</div>';
													echo '<div class="zadanie">'.$row1->t7.'</div><div class="zadanie"><input type="text" name="input7" style="width:350px; height:30px; margin-top: 50px;"/></div><div style="clear:both"></div><div style="text-align:center; width:880px; color:#b9ccb3; padding:30px;  border-top: 2px double gray;">';
														$result = $polaczenie->query(sprintf("SELECT zad7 FROM proby WHERE  (status='ukonczono' or status = 'trwa') and realizowany_stopien='ćwik' ORDER BY RAND() LIMIT 1"));$row = $result ->fetch_object(); echo 'PRZYKAAD:</br></br>'.$row->zad7.'</div>';
													echo '<div class="zadanie">'.$row1->t8.'</div><div class="zadanie"><input type="text" name="input8" style="width:350px; height:30px; margin-top: 50px;"/></div><div style="clear:both"></div><div style="text-align:center; width:880px; color:#b9ccb3; padding:30px;  border-top: 2px double gray;">';
														$result = $polaczenie->query(sprintf("SELECT zad8 FROM proby WHERE  (status='ukonczono' or status = 'trwa') and realizowany_stopien='ćwik' ORDER BY RAND() LIMIT 1"));$row = $result ->fetch_object(); echo 'PRZYKAAD:</br></br>'.$row->zad8.'</div>';
													echo '<div class="zadanie">'.$row1->t9.'</div><div class="zadanie"><input type="text" name="input9" style="width:350px; height:30px; margin-top: 50px;"/></div><div style="clear:both"></div><div style="text-align:center; width:880px; color:#b9ccb3; padding:30px;  border-top: 2px double gray;">';
														$result = $polaczenie->query(sprintf("SELECT zad9 FROM proby WHERE  (status='ukonczono' or status = 'trwa') and realizowany_stopien='ćwik' ORDER BY RAND() LIMIT 1"));$row = $result ->fetch_object(); echo 'PRZYKAAD:</br></br>'.$row->zad9.'</div>';
													echo '<div class="zadanie">'.$row1->t10.'</div><div class="zadanie"><input type="text" name="input10" style="width:350px; height:30px; margin-top: 50px;"/></div><div style="clear:both"></div><div style="text-align:center; width:880px; color:#b9ccb3; padding:30px;  border-top: 2px double gray;">';
														$result = $polaczenie->query(sprintf("SELECT zad10 FROM proby WHERE  (status='ukonczono' or status = 'trwa') and realizowany_stopien='ćwik' ORDER BY RAND() LIMIT 1"));$row = $result ->fetch_object(); echo 'PRZYKAAD:</br></br>'.$row->zad10.'</div>';
													echo '<div class="zadanie">'.$row1->t11.'</div><div class="zadanie"><input type="text" name="input11" style="width:350px; height:30px; margin-top: 50px;"/></div><div style="clear:both"></div><div style="text-align:center; width:880px; color:#b9ccb3; padding:30px;  border-top: 2px double gray;">';
														$result = $polaczenie->query(sprintf("SELECT zad11 FROM proby WHERE  (status='ukonczono' or status = 'trwa') and realizowany_stopien='ćwik' ORDER BY RAND() LIMIT 1"));$row = $result ->fetch_object(); echo 'PRZYKAAD:</br></br>'.$row->zad11.'</div>';
													echo '<div class="zadanie">'.$row1->t12.'</div><div class="zadanie"><input type="text" name="input12" style="width:350px; height:30px; margin-top: 50px;"/></div><div style="clear:both"></div><div style="text-align:center; width:880px; color:#b9ccb3; padding:30px;  border-top: 2px double gray;">';
														$result = $polaczenie->query(sprintf("SELECT zad12 FROM proby WHERE  (status='ukonczono' or status = 'trwa') and realizowany_stopien='ćwik' ORDER BY RAND() LIMIT 1"));$row = $result ->fetch_object(); echo 'PRZYKAAD:</br></br>'.$row->zad12.'</div>';
													echo '<div class="zadanie">'.$row1->t13.'</div><div class="zadanie"><input type="text" name="input13" style="width:350px; height:30px; margin-top: 50px;"/></div><div style="clear:both"></div><div style="text-align:center; width:880px; color:#b9ccb3; padding:30px;  border-top: 2px double gray;">';
														$result = $polaczenie->query(sprintf("SELECT zad13 FROM proby WHERE  (status='ukonczono' or status = 'trwa') and realizowany_stopien='ćwik' ORDER BY RAND() LIMIT 1"));$row = $result ->fetch_object(); echo 'PRZYKAAD:</br></br>'.$row->zad13.'</div>';
													echo '<div style="text-align:center; width:880px; color:#ad8585; padding:30px;  border-top: 2px double gray;">DOSKONALENIE HARCERSKIE:</div>';
													echo '<div class="zadanie">'.$row1->t14.'</div><div class="zadanie"><input type="text" name="input14" style="width:350px; height:30px; margin-top: 50px;"/></div><div style="clear:both"></div><div style="text-align:center; width:880px; color:#b9ccb3; padding:30px;  border-top: 2px double gray;">';
														$result = $polaczenie->query(sprintf("SELECT zad14 FROM proby WHERE  (status='ukonczono' or status = 'trwa') and realizowany_stopien='ćwik' ORDER BY RAND() LIMIT 1"));$row = $result ->fetch_object(); echo 'PRZYKAAD:</br></br>'.$row->zad14.'</div>';
													echo '<div class="zadanie">'.$row1->t15.'</div><div class="zadanie"><input type="text" name="input15" style="width:350px; height:30px; margin-top: 50px;"/></div><div style="clear:both"></div><div style="text-align:center; width:880px; color:#b9ccb3; padding:30px;  border-top: 2px double gray;">';
														$result = $polaczenie->query(sprintf("SELECT zad15 FROM proby WHERE  (status='ukonczono' or status = 'trwa') and realizowany_stopien='ćwik' ORDER BY RAND() LIMIT 1"));$row = $result ->fetch_object(); echo 'PRZYKAAD:</br></br>'.$row->zad15.'</div>';
													echo '<div class="zadanie">'.$row1->t16.'</div><div class="zadanie"><input type="text" name="input16" style="width:350px; height:30px; margin-top: 50px;"/></div><div style="clear:both"></div><div style="text-align:center; width:880px; color:#b9ccb3; padding:30px;  border-top: 2px double gray;">';
														$result = $polaczenie->query(sprintf("SELECT zad16 FROM proby WHERE  (status='ukonczono' or status = 'trwa') and realizowany_stopien='ćwik' ORDER BY RAND() LIMIT 1"));$row = $result ->fetch_object(); echo 'PRZYKAAD:</br></br>'.$row->zad16.'</div>';
													echo '<div class="zadanie">'.$row1->t17.'</div><div class="zadanie"><input type="text" name="input17" style="width:350px; height:30px; margin-top: 50px;"/></div><div style="clear:both"></div><div style="text-align:center; width:880px; color:#b9ccb3; padding:30px;  border-top: 2px double gray;">';
														$result = $polaczenie->query(sprintf("SELECT zad17 FROM proby WHERE  (status='ukonczono' or status = 'trwa') and realizowany_stopien='ćwik' ORDER BY RAND() LIMIT 1"));$row = $result ->fetch_object(); echo 'PRZYKAAD:</br></br>'.$row->zad17.'</div>';
													echo '<div class="zadanie">'.$row1->t18.'</div><div class="zadanie"><input type="text" name="input18" style="width:350px; height:30px; margin-top: 50px;"/></div><div style="clear:both"></div><div style="text-align:center; width:880px; color:#b9ccb3; padding:30px;  border-top: 2px double gray;">';
														$result = $polaczenie->query(sprintf("SELECT zad18 FROM proby WHERE  (status='ukonczono' or status = 'trwa') and realizowany_stopien='ćwik' ORDER BY RAND() LIMIT 1"));$row = $result ->fetch_object(); echo 'PRZYKAAD:</br></br>'.$row->zad18.'</div>';
													echo '<div style="text-align:center; width:880px; color:#ad8585; padding:30px;  border-top: 2px double gray;">POSZUKIWANIE PÓL SŁUŻBY:</div>';
													echo '<div class="zadanie">'.$row1->t19.'</div><div class="zadanie"><input type="text" name="input19" style="width:350px; height:30px; margin-top: 50px;"/></div><div style="clear:both"></div><div style="text-align:center; width:880px; color:#b9ccb3; padding:30px;  border-top: 2px double gray;">';
														$result = $polaczenie->query(sprintf("SELECT zad19 FROM proby WHERE  (status='ukonczono' or status = 'trwa') and realizowany_stopien='ćwik' ORDER BY RAND() LIMIT 1"));$row = $result ->fetch_object(); echo 'PRZYKAAD:</br></br>'.$row->zad19.'</div>';
													echo '<div class="zadanie">'.$row1->t20.'</div><div class="zadanie"><input type="text" name="input20" style="width:350px; height:30px; margin-top: 50px;"/></div><div style="clear:both"></div><div style="text-align:center; width:880px; color:#b9ccb3; padding:30px;  border-top: 2px double gray;">';
														$result = $polaczenie->query(sprintf("SELECT zad20 FROM proby WHERE  (status='ukonczono' or status = 'trwa') and realizowany_stopien='ćwik' ORDER BY RAND() LIMIT 1"));$row = $result ->fetch_object(); echo 'PRZYKAAD:</br></br>'.$row->zad20.'</div>';
													echo '<div class="zadanie">'.$row1->t21.'</div><div class="zadanie"><input type="text" name="input21" style="width:350px; height:30px; margin-top: 50px;"/></div><div style="clear:both"></div><div style="text-align:center; width:880px; color:#b9ccb3; padding:30px;  border-top: 2px double gray;">';
														$result = $polaczenie->query(sprintf("SELECT zad21 FROM proby WHERE  (status='ukonczono' or status = 'trwa') and realizowany_stopien='ćwik' ORDER BY RAND() LIMIT 1"));$row = $result ->fetch_object(); echo 'PRZYKAAD:</br></br>'.$row->zad21.'</div>';
													echo '<div class="zadanie">'.$row1->t22.'</div><div class="zadanie"><input type="text" name="input22" style="width:350px; height:30px; margin-top: 50px;"/></div><div style="clear:both"></div><div style="text-align:center; width:880px; color:#b9ccb3; padding:30px;  border-top: 2px double gray;">';
														$result = $polaczenie->query(sprintf("SELECT zad22 FROM proby WHERE  (status='ukonczono' or status = 'trwa') and realizowany_stopien='ćwik' ORDER BY RAND() LIMIT 1"));$row = $result ->fetch_object(); echo 'PRZYKAAD:</br></br>'.$row->zad22.'</div>';
													echo '<div class="zadanie">'.$row1->t23.'</div><div class="zadanie"><input type="text" name="input23" style="width:350px; height:30px; margin-top: 50px;"/></div><div style="clear:both"></div><div style="text-align:center; width:880px; color:#b9ccb3; padding:30px;  border-top: 2px double gray;">';
														$result = $polaczenie->query(sprintf("SELECT zad23 FROM proby WHERE  (status='ukonczono' or status = 'trwa') and realizowany_stopien='ćwik' ORDER BY RAND() LIMIT 1"));$row = $result ->fetch_object(); echo 'PRZYKAAD:</br></br>'.$row->zad23.'</div>';									
													echo '<div id="wyslij" style="border-top: 2px double gray; width:940px; padding-top:40px;"  ></div>';
											}
										}
										
									}
								
								$polaczenie->close();	
							}
				?>

		</div>
		</div><div style="clear:both"/>
	</div>
	
<?PHP		echo $footer;	?>
</body>



</html>