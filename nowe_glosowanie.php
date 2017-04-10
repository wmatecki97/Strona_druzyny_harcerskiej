<?php

	session_start();
	
	if (!isset($_POST['temat']))
	{
		header('Location: index.php');
		exit();
	}
		$_SESSION['temat']=$_POST['temat'];
		$_SESSION['a1']=$_POST['a1'];
		$_SESSION['a2']=$_POST['a2'];
		$_SESSION['a3']=$_POST['a3'];
		$_SESSION['a4']=$_POST['a4'];
		$_SESSION['a5']=$_POST['a5'];
		$_SESSION['a6']=$_POST['a6'];
		$_SESSION['a7']=$_POST['a7'];
		$_SESSION['a8']=$_POST['a8'];
		$_SESSION['a9']=$_POST['a9'];
		$_SESSION['a10']=$_POST['a10'];
		
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
								
								$polaczenie->query(sprintf("INSERT INTO `glosowanie`(`nr_glosowania`, `temat`, `status`, `v1`, `v2`, `v3`, `v4`, `v5`, `v6`, `v7`, `v8`, `v9`, `v10`) VALUES (NULL, '%s', 'trwa', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s')", 
								$_SESSION['temat'],
								$_SESSION['a1'],
								$_SESSION['a2'],
								$_SESSION['a3'],
								$_SESSION['a4'],
								$_SESSION['a5'],
								$_SESSION['a6'],
								$_SESSION['a7'],
								$_SESSION['a8'],
								$_SESSION['a9'],
								$_SESSION['a10']
								));
								
								$polaczenie->close();	
							}
							
							unset($_SESSION['a1']);
							unset($_SESSION['a2']);
							unset($_SESSION['a3']);
							unset($_SESSION['a4']);
							unset($_SESSION['a5']);
							unset($_SESSION['a6']);
							unset($_SESSION['a7']);
							unset($_SESSION['a8']);
							unset($_SESSION['a9']);
							unset($_SESSION['a10']);
							header('Location: admin.php');
							
?>

