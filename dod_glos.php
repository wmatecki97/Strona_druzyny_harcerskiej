<?php

	session_start();
	
	if ((!isset($_SESSION['zalogowany'])) || ((!isset($_SESSION['nr'])) && ((!isset($_POST['glos1'])) )))
	{
		header('Location: index.php');
		exit();
	}
	if(!isset($_POST['glos1']))$_POST['glos1']=0;
	if(!isset($_POST['glos2']))$_POST['glos2']=0;
	if(!isset($_POST['glos3']))$_POST['glos3']=0;
	if(!isset($_POST['glos4']))$_POST['glos4']=0;
	if(!isset($_POST['glos5']))$_POST['glos5']=0;
	if(!isset($_POST['glos6']))$_POST['glos6']=0;
	if(!isset($_POST['glos7']))$_POST['glos7']=0;
	if(!isset($_POST['glos8']))$_POST['glos8']=0;
	if(!isset($_POST['glos9']))$_POST['glos9']=0;
	if(!isset($_POST['glos10']))$_POST['glos10']=0;
	
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
							if($polaczenie->query(sprintf("INSERT INTO `glosy`(`id`, `nr_glosowania`, `p1`, `p2`, `p3`, `p4`, `p5`, `p6`, `p7`, `p8`, `p9`, `p10`) VALUES  	('%f','%f','%f','%f','%f','%f','%f','%f','%f','%f','%f','%f')",
							$_SESSION['id'],
							$_SESSION['nr'],
							$_POST['glos1'],
							$_POST['glos2'],
							$_POST['glos3'],
							$_POST['glos4'],
							$_POST['glos5'],
							$_POST['glos6'],
							$_POST['glos7'],
							$_POST['glos8'],
							$_POST['glos9'],
							$_POST['glos10']
							)))
							;else header('Location: index.php');
							$polaczenie->close();	
							unset($_SESSION['glosform']);
							unset($_SESSION['nr']);
						}													
						header('Location: glosowanie.php');
?>