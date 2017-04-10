<?php

	session_start();
	
	if (((!isset($_POST['tak'])) && (!isset($_POST['nie']))) || (!isset($_SESSION['zalogowany'])))
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
								if(isset($_POST['tak'])){
									$polaczenie->query(sprintf("UPDATE osoby SET ranga='nowicjusz' WHERE id='%f' ", $_SESSION['nr']));
								}
								if(isset($_POST['nie']))$polaczenie->query(sprintf("DELETE FROM `osoby` WHERE id='%f' ", $_SESSION['nr']));
								unset($_SESSION['nr']);
								$polaczenie->close();	
							}
							header('Location: admin.php');
							
?>

