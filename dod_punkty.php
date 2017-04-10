<?php

	session_start();
	
	if ((!isset($_SESSION['zalogowany'])) || ((!isset($_SESSION['dod_punkty_ile']))  && ((!isset($_POST['ile'])) && (!isset($_POST['zaco'])))))
	{
		header('Location: index.php');
		exit();
	}
		if(isset($_POST['ile'])){
		$_SESSION['dod_punkty_zaco']=$_POST['zaco'];
		$_SESSION['dod_punkty_ile']=$_POST['ile'];
		}
		
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
								$polaczenie->query(sprintf("INSERT INTO `punkty`(`nr`, `id`, `data`, `za_co`, `ile`, `status`) VALUES (NULL,'%f','%s','%s','%f','%s')",
								$_SESSION['id'],
								date('Y-m-d H:i:s'),
								$_SESSION['dod_punkty_zaco'],
								$_SESSION['dod_punkty_ile'],
								"weryfikacja"));																
								$polaczenie->close();	
								unset($_SESSION['dod_punkty_zaco']);
								unset($_SESSION['dod_punkty_ile']);
							}
							header('Location: punkty.php');
							
?>

