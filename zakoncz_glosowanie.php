<?php

	session_start();
	
	if (!isset($_POST['nr']))
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
								
								$polaczenie->query(sprintf("UPDATE glosowanie SET status='zakończono' WHERE nr_glosowania='%f' ", $_SESSION['nr']));
								
								$polaczenie->close();	
							}
							header('Location: admin.php');
							
?>

