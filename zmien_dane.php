<?php

	session_start();
	
	if (isset($_POST['email']))
	{
		//Udana walidacja? Załóżmy, że tak!
		$wszystko_OK=true;
		
		//Sprawdź poprawność nickname'a
		$imie = $_POST['imie'];
		$nazwisko = $_POST['nazwisko'];
		//Sprawdź poprawność rocznika
		$rocznik = $_POST['rocznik'];
		if ($rocznik<2000 || $rocznik >2200)
		{
			$wszystko_OK=false;
			$_SESSION['e_rocznik']="Podaj prawidłowy rok urodzenia np. 2007";
		}
		
		
		// Sprawdź poprawność adresu email
		$email = $_POST['email'];
		$emailB = filter_var($email, FILTER_SANITIZE_EMAIL);
		
		if ((filter_var($emailB, FILTER_VALIDATE_EMAIL)==false) || ($emailB!=$email))
		{
			$wszystko_OK=false;
			$_SESSION['e_email']="Podaj poprawny adres e-mail!";
		}
		
		//Sprawdź poprawność hasła
		$haslo1 = $_POST['haslo1'];
		$haslo2 = $_POST['haslo2'];
		
		if ((strlen($haslo1)<8) || (strlen($haslo1)>20))
		{
			$wszystko_OK=false;
			$_SESSION['e_haslo']="Hasło musi posiadać od 8 do 20 znaków!";
		}
		
		if ($haslo1!=$haslo2)
		{
			$wszystko_OK=false;
			$_SESSION['e_haslo']="Podane hasła nie są identyczne!";
		}	

		$haslo_hash = password_hash($haslo1, PASSWORD_DEFAULT);
		
		//Czy zaakceptowano regulamin?
/*		if (!isset($_POST['regulamin']))
		{
			$wszystko_OK=false;
			$_SESSION['e_regulamin']="Potwierdź akceptację regulaminu!";
		}				
		
		//Bot or not? Oto jest pytanie!
		$sekret = "PODAJ WŁASNY SEKRET!";
		
		$sprawdz = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$sekret.'&response='.$_POST['g-recaptcha-response']);
		
		$odpowiedz = json_decode($sprawdz);
		
		if ($odpowiedz->success==false)
		{
			$wszystko_OK=false;
			$_SESSION['e_bot']="Potwierdź, że nie jesteś botem!";
		}		
	*/	
		$_SESSION['fr_imie'] = $imie;
		$_SESSION['fr_nazwisko'] = $nazwisko;		
		$_SESSION['fr_email'] = $email;
		$_SESSION['fr_haslo1'] = $haslo1;
		$_SESSION['fr_haslo2'] = $haslo2;
		$_SESSION['fr_rocznik'] = $rocznik;
//		if (isset($_POST['regulamin'])) $_SESSION['fr_regulamin'] = true;
		
		require_once "connect.php";
		mysqli_report(MYSQLI_REPORT_STRICT);
		// ZACZYNAMY!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
		try 
		{
			$polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
			if ($polaczenie->connect_errno!=0)
			{
				throw new Exception(mysqli_connect_errno());
			}
			else
			{
				//Czy email już istnieje?
			if($email != $_SESSION['email'])
			{
				$rezultat = $polaczenie->query(sprintf("SELECT id FROM osoby WHERE email='$email'") );
				
				if (!$rezultat) throw new Exception($polaczenie->error);
				
				$ile_takich_maili = $rezultat->num_rows;
				if($ile_takich_maili>0)
				{
					$wszystko_OK=false;
					$_SESSION['e_email']="Istnieje już konto przypisane do tego adresu e-mail!";
				}
			}
				
				if ($wszystko_OK==true)
				{
					//Hurra, wszystkie testy zaliczone, dodajemy gracza do bazy
					
					if ($polaczenie->query(sprintf("INSERT INTO`osoby`
					(`imie`, `nazwisko`, `rocznik`, `email`)VALUES 
					('%s','%s','%s', '%s');", $imie, $nazwisko, $rocznik, $email)))
					{
						$_SESSION['udanarejestracja']=true;
						header('Location: index.php');
					}
					else
					{
						throw new Exception($polaczenie->error);
					}
					
				}
				
				$polaczenie->close();
			}
			
		}
		catch(Exception $e)
		{
			echo '<span style="color:red;">Błąd serwera! Przepraszamy za niedogodności i prosimy o rejestrację w innym terminie!</span>';
		}
		
	}
	
	
?>

<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>BERSERKER - załóż konto!</title>
	<script src='https://www.google.com/recaptcha/api.js'></script>
	<link href="style-index.css" rel="stylesheet" type="text/css"/>
	
	<style>
		.error
		{
			color:red;
			margin-top: 10px;
			margin-bottom: 10px;
		}
	</style>
</head>

<body>

	<div id="container">
	<div id="header">
					<span style="color: #c34f4f">B</span>ER<span style="color: #c34f4f">S</span>ER<span style="color: #c34f4f">K</span>ER
	</div>
	<div  style="width:200px; margin-left:150px;">
			<form method="post">	
				Imie: <br /> <input type="text" style="width:180px;" value="<?php
					if (isset($_SESSION['imie']))
					{
						echo $_SESSION['imie'];
					}
				?>" name="imie" /><br />
				
				Nazwisko: <br /> <input type="text" style="width:180px;"  value="<?php
					if (isset($_SESSION['nazwisko']))
					{
						echo $_SESSION['nazwisko'];
					}
				?>" name="nazwisko" /><br />
				
				Rok urodzenia: <br /> <input type="text" style="width:180px;" value="<?php
					if (isset($_SESSION['rocznik']))
					{
						echo $_SESSION['rocznik'];
					}
				?>" name="rocznik" /><br />
				
				<?php
					if (isset($_SESSION['e_rocznik']))
					{
						echo '<div class="error">'.$_SESSION['e_rocznik'].'</div>';
						unset($_SESSION['e_rocznik']);
					}
				?>
				
				
				E-mail: <br /> <input type="text" style="width:180px;" value="<?php
					if (isset($_SESSION['email']))
					{
						echo $_SESSION['email'];
					}
				?>" name="email" /><br />
				
				<?php
					if (isset($_SESSION['e_email']))
					{
						echo '<div class="error">'.$_SESSION['e_email'].'</div>';
						unset($_SESSION['e_email']);
					}
				?>
				
				Twoje hasło: <br /> <input type="password"  style="width:180px;" value="<?php
					if (isset($_SESSION['fr_haslo1']))
					{
						echo $_SESSION['fr_haslo1'];
						unset($_SESSION['fr_haslo1']);
					}
				?>" name="haslo1" /><br />
				
				<?php
					if (isset($_SESSION['e_haslo']))
					{
						echo '<div class="error">'.$_SESSION['e_haslo'].'</div>';
						unset($_SESSION['e_haslo']);
					}
				?>		
				
				Powtórz hasło: <br /> <input type="password" style="width:180px;"  value="<?php
					if (isset($_SESSION['fr_haslo2']))
					{
						echo $_SESSION['fr_haslo2'];
						unset($_SESSION['fr_haslo2']);
					}
				?>" name="haslo2" /><br />
				
				
				<br />
				
				<input type="submit" style="width:100px;"  value="Zapisz Zmiany" />
				
			</form>
	
</div>
</div>
</body>
</html>