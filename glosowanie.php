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
	<link href="style-glosowanie.css" rel="stylesheet" type="text/css"/>
	<link href="https://fonts.googleapis.com/css?family=Russo+One" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Barrio" rel="stylesheet">
	
	<script type="text/javascript">
		

		function licz_punkty()
			{
				
				var punkty=parseInt('<?php echo $_SESSION['punkty'];?>');
				var rok1=parseInt('<?php echo substr($_SESSION['data_dolaczenia'], 0, 4);?>');
				var miesiac1=parseInt('<?php echo substr($_SESSION['data_dolaczenia'], 5, 2);?>');
				var dzien1=parseInt('<?php echo substr($_SESSION['data_dolaczenia'], 8, 2);?>');
				var rok=parseInt('<?php echo date('Y');?>');
				var miesiac=parseInt('<?php echo date('m');?>');
				var dzien=parseInt('<?php echo date('d');?>');
				if((rok1-rok==0) && (miesiac1-miesiac==0) && (dzien1-dzien<0))punkty*=1;
				if((rok1-rok==0) && (miesiac1-miesiac<0))punkty*=1;
				else if((rok1-rok==1) && (miesiac1-miesiac==0))punkty*=0.63;
				else if((rok1-rok==1) && (miesiac1-miesiac<0) && (dzien1-dzien<0))punkty*=0.63;
				else if((rok1-rok==2) && (miesiac1-miesiac==0))punkty*=0.5;
				else if((rok1-rok==2) && (miesiac1-miesiac<0) && (dzien1-dzien<0))punkty*=0.5;
				else punkty=0; 
				limit=parseInt('<?php echo $_SESSION['glosform']; ?>') ;
		     	if((limit>=1) && (document.querySelector('input[name="glos1"]').value!="")) if(document.querySelector('input[name="glos1"]').value>0)punkty-=parseInt(document.querySelector('input[name="glos1"]').value);else punkty="błędna liczba";
		     	if((limit>=2) && (document.querySelector('input[name="glos2"]').value!="")) if(document.querySelector('input[name="glos2"]').value>0)punkty-=parseInt(document.querySelector('input[name="glos2"]').value);else punkty="błędna liczba";
		     	if((limit>=3) && (document.querySelector('input[name="glos3"]').value!="")) if(document.querySelector('input[name="glos3"]').value>0)punkty-=parseInt(document.querySelector('input[name="glos3"]').value);else punkty="błędna liczba";
		     	if((limit>=4) && (document.querySelector('input[name="glos4"]').value!="")) if(document.querySelector('input[name="glos4"]').value>0)punkty-=parseInt(document.querySelector('input[name="glos4"]').value);else punkty="błędna liczba";
		     	if((limit>=5) && (document.querySelector('input[name="glos5"]').value!="")) if(document.querySelector('input[name="glos5"]').value>0)punkty-=parseInt(document.querySelector('input[name="glos5"]').value);else punkty="błędna liczba";
		     	if((limit>=6) && (document.querySelector('input[name="glos6"]').value!="")) if(document.querySelector('input[name="glos6"]').value>0)punkty-=parseInt(document.querySelector('input[name="glos6"]').value);else punkty="błędna liczba";
		     	if((limit>=7) && (document.querySelector('input[name="glos7"]').value!="")) if(document.querySelector('input[name="glos7"]').value>0)punkty-=parseInt(document.querySelector('input[name="glos7"]').value);else punkty="błędna liczba";
		     	if((limit>=8) && (document.querySelector('input[name="glos8"]').value!="")) if(document.querySelector('input[name="glos8"]').value>0)punkty-=parseInt(document.querySelector('input[name="glos8"]').value);else punkty="błędna liczba";
		     	if((limit>=9) && (document.querySelector('input[name="glos9"]').value!="")) if(document.querySelector('input[name="glos9"]').value>0)punkty-=parseInt(document.querySelector('input[name="glos9"]').value);else punkty="błędna liczba";
		     	if((limit>=10) && (document.querySelector('input[name="glos10"]').value!="")) if(document.querySelector('input[name="glos10"]').value>0)punkty-=parseInt(document.querySelector('input[name="glos10"]').value);else punkty="błędna liczba";
		     	
				
				if(isNaN(punkty))punkty="błędna liczba";
				document.getElementById("punkciki").innerHTML =punkty;
				if(punkty==0)document.getElementById("glosuj").innerHTML ='<input type="submit" style="width:400px; background-color:gray; font-size:50px; font-family: \'Barrio\', cursive; color:white;" value="GŁOSUJ!" />';
				else 	document.getElementById("glosuj").innerHTML ="";
				timer = setTimeout("licz_punkty()", 1000);
			}
			
			

	
	</script>	
	
</head>


<body  onload="licz_punkty()">

	
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
												//CZY GLOSOWAL
													if($result2 = $polaczenie->query(sprintf("SELECT glosowanie.temat AS temat FROM glosowanie, glosy WHERE glosy.id='%f' and glosy.nr_glosowania = '%f' and glosy.nr_glosowania = glosowanie.nr_glosowania", $_SESSION['id'], $rows->nr_glosowania)))
														
													if($result2 ->num_rows)
													{
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

																
															}
													}
															
															else{//NIE GLOSOWAL - WYSWIETLA OPCJE I MOZLIWOSC ROZDZIELENIA PUNKTOW
																	 if($result1 = $polaczenie->query(sprintf("SELECT glosowanie.temat AS temat, glosowanie.v1 AS v1, glosowanie.v2 AS v2, glosowanie.v3 AS v3, glosowanie.v4 AS v4, glosowanie.v5 AS v5, glosowanie.v6 AS v6, glosowanie.v7 AS v7, glosowanie.v8 AS v8, glosowanie.v9 AS v9, glosowanie.v10 AS v10 FROM glosowanie 
																	 WHERE glosowanie.nr_glosowania = '%f' ;", $rows->nr_glosowania))){	
																	 $rows1 = $result1 ->fetch_object();
																		echo '<div style="float:right; margin-top:30px; margin-bottom:0px; margin-right: 100px;">POZOSTAŁE PUNKTY:</br><div id="punkciki" style="font-size:50px;"></div></div><div style="clear:both"/>';
																		echo '<div style="font-size:50px;">'.$rows1->temat.'</div>';
																		echo '<form action="dod_glos.php" method="post">';
																		$_SESSION['glosform']=0; $_SESSION['nr']=$rows->nr_glosowania;
																		if($rows1->v1!=null){$_SESSION['glosform']=1; echo '<div class="wersja"><div class="c1">'.'1. '.$rows1->v1.'</div><div class="c2"><input type="text" id="formularz" name="glos1" style="width:80px; margin:10px; height:25px;" /></div></div><span style="clear:both;"/>';}
																		if($rows1->v2!=null){$_SESSION['glosform']=2;  echo '<div class="wersja"><div class="c1">'.'2. '.$rows1->v2.'</div><div class="c2"><input type="text" id="formularz" name="glos2" style="width:80px; margin:10px; height:25px;" /></div></div><span style="clear:both;"/>';}
																		if($rows1->v3!=null){$_SESSION['glosform']=3;  echo '<div class="wersja"><div class="c1">'.'3. '.$rows1->v3.'</div><div class="c2"><input type="text" id="formularz" name="glos3" style="width:80px; margin:10px; height:25px;" /></div></div><span style="clear:both;"/>';}
																		if($rows1->v4!=null){$_SESSION['glosform']=4;  echo '<div class="wersja"><div class="c1">'.'4. '.$rows1->v4.'</div><div class="c2"><input type="text" id="formularz" name="glos4" style="width:80px; margin:10px; height:25px;" /></div></div><span style="clear:both;"/>';}
																		if($rows1->v5!=null){$_SESSION['glosform']=5;  echo '<div class="wersja"><div class="c1">'.'5. '.$rows1->v5.'</div><div class="c2"><input type="text" id="formularz" name="glos5" style="width:80px; margin:10px; height:25px;" /></div></div><span style="clear:both;"/>';}
																		if($rows1->v6!=null){$_SESSION['glosform']=6;  echo '<div class="wersja"><div class="c1">'.'6. '.$rows1->v6.'</div><div class="c2"><input type="text" id="formularz" name="glos6" style="width:80px; margin:10px; height:25px;" /></div></div><span style="clear:both;"/>';}
																		if($rows1->v7!=null){$_SESSION['glosform']=7;  echo '<div class="wersja"><div class="c1">'.'7. '.$rows1->v7.'</div><div class="c2"><input type="text" id="formularz" name="glos7" style="width:80px; margin:10px; height:25px;" /></div></div><span style="clear:both;"/>';}
																		if($rows1->v7!=null){$_SESSION['glosform']=8;  echo '<div class="wersja" ><div class="c1">'.'8. '.$rows1->v8.'</div><div class="c2"><input type="text" id="formularz" name="glos8" style="width:80px; margin:10px; height:25px;" /></div></div><span style="clear:both;"/>';}
																		if($rows1->v9!=null){$_SESSION['glosform']=9;  echo '<div class="wersja"><div class="c1">'.'9. '.$rows1->v9.'</div><div class="c2"><input type="text" id="formularz" name="glos9" style="width:80px; margin:10px; height:25px;" /></div></div><span style="clear:both;"/>';}
																		if($rows1->v10!=null){$_SESSION['glosform']=10;  echo '<div class="wersja"><div class="c1">'.'10. '.$rows1->v10.'</div><div class="c2"><input type="text" id="formularz" name="glos10" style="width:80px; margin:10px; height:25px;" /></div></div><span style="clear:both;"/>';}
																		
																		echo '<div id="glosuj">	</div>';
																		echo '</form>';
																	}
															
															}
													    //END CZY GLOSOWAL
									}	
									else if($result1 = $polaczenie->query(sprintf("SELECT sum(glosy.p1) AS p1, sum(glosy.p2) AS p2, sum(glosy.p3) AS p3, sum(glosy.p4) AS p4, sum(glosy.p5) AS p5, sum(glosy.p6) AS p6, sum(glosy.p7) AS p7, sum(glosy.p8) AS p8, sum(glosy.p9) AS p9, sum(glosy.p10) AS p10, glosowanie.temat AS temat, glosowanie.v1 AS v1, glosowanie.v2 AS v2, glosowanie.v3 AS v3, glosowanie.v4 AS v4, glosowanie.v5 AS v5, glosowanie.v6 AS v6, glosowanie.v7 AS v7, glosowanie.v8 AS v8, glosowanie.v9 AS v9, glosowanie.v10 AS v10 FROM glosy, glosowanie 
														WHERE glosy.nr_glosowania = glosowanie.nr_glosowania ORDER BY glosy.nr_glosowania LIMIT 1")))
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

																
														}
									else echo "AKTUALNIE NIE TRWA ŻADNE GŁOSOWANIE";									
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