<?php

	session_start();
	
	if ((!isset($_SESSION['zalogowany']))   && (!isset($_POST['nr'])))
	{
		header('Location: index.php');
		exit();
	}
		$_SESSION['nr']=$_POST['nr'];
		
		
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
								$polaczenie->query(sprintf("UPDATE `specjalne`SET id='%f', status='weryfikacja' WHERE nrzadania='%f'", $_SESSION['id'], $_SESSION['nr'] ));						
								$polaczenie->close();	
								unset($_SESSION['nr']);
							}
							header('Location: punkty.php');
							
?>

