<?php
session_start();
if((!isset($_POST['login'])) || (!isset($_POST['haslo'])))
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
	else
	{
		$login = $_POST['login'];
		$haslo = $_POST['haslo'];
		// ZABEZPIECZENIE PRZED WSTRZYKIWANIEM
		$login = htmlentities($login, ENT_QUOTES, "UTF-8");
		$haslo = htmlentities($haslo, ENT_QUOTES, "UTF-8");
				echo '1';
		// LOGOWANIE
		if( $rezultat = @$polaczenie->query(sprintf("SELECT * FROM osoby WHERE login='%s'", 
		mysqli_real_escape_string($polaczenie, $login))))
		{
			$ilu_userow = $rezultat->num_rows;
			if($ilu_userow>0)
			{
				$wiersz = $rezultat->fetch_assoc();				echo '1';
				if(password_verify($haslo, $wiersz['haslo']))
				{
					$_SESSION['zalogowany'] = true;
					$_SESSION['id'] = $wiersz['id'];
					$_SESSION['imie'] = $wiersz['imie'];
					$_SESSION['nazwisko'] = $wiersz['nazwisko'];
					$_SESSION['rocznik'] = $wiersz['rocznik'];
					$_SESSION['data_dolaczenia'] = $wiersz['data_dolaczenia'];
					$_SESSION['nick'] = $wiersz['nick'];
					$_SESSION['punkty'] = $wiersz['punkty'];
					$_SESSION['semestr'] = $wiersz['semestr'];
					$_SESSION['ranga'] = $wiersz['ranga'];
					$_SESSION['stopien'] = $wiersz['stopien'];
					$_SESSION['rola'] = $wiersz['rola'];
					$_SESSION['email'] = $wiersz['email'];					$_SESSION['haslo'] = $haslo;
					
					unset($_SESSION['blad']);
					$rezultat->free_result();
					if($_SESSION['rola'] == 'user')
					{
					header('Location: glowna.php');
					}
					else header('Location: admin.php');//LOGOWANIE ADMINA
				}
				else
				{
					$_SESSION['blad'] = "Nieprawidlowy login lub haslo";
					
					header('Location: index.php');
				}	
			}
			else
			{
			
				$_SESSION['blad'] = "Nieprawidlowy login lub haslo";
		   header('Location: index.php');
		}
		
		}			
			$polaczenie->close();
		
	}


	
	

	
?>