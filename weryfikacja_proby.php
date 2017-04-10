<?php

	session_start();
	
	if ( (!isset($_SESSION['zalogowany'])) || (!isset($_SESSION['nr'])))
	{
		header('Location: index.php');
		exit();
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
								if($_POST['uwagi']!=''){
									$polaczenie->query(sprintf("UPDATE proby SET uwagi='%s', status='trwa' WHERE nr_proby='%f' ", $_POST['uwagi'], $_SESSION['nr']));
								}
								else $polaczenie->query(sprintf("UPDATE proby SET status='ukończono' WHERE nr_proby='%f' ", $_SESSION['nr']));
								$polaczenie->close();	
							}
							header('Location: admin.php');
							
?>

