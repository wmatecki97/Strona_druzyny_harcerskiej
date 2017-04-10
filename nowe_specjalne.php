<?php

	session_start();
	
	if (!isset($_POST['tresc']) || (!isset($_POST['a1'])))
	{
		header('Location: index.php');
		exit();
	}
		$_SESSION['tresc']=$_POST['tresc'];
		$_SESSION['a1']=$_POST['a1'];
		
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
								
								$polaczenie->query(sprintf("INSERT INTO `specjalne`( `tresc`, `data`, `punkty`, `status`) VALUES ('%s','%s','%s','oczekiwanie');",
								$_SESSION['tresc'],
								date('Y-m-d'),
								$_SESSION['a1']
								
								));
								
								$polaczenie->close();	
							}
							
							unset($_SESSION['a1']);
							unset($_SESSION['temat']);
							header('Location: admin.php');
							
?>

