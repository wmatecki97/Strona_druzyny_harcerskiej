<?php

	session_start();
	
	if (!isset($_SESSION['zalogowany'])) 
	{
		header('Location: index.php');
		exit();
	}

	
?>

<!DOCTYPE HTML>
<html lang ="pl">
<head>
	<meta charset="utf-8" />
	<title>Strona Logowania</title>
	<meta name="description" content="Opis strony">
	<meta names="keywords" content="slowa, kluczowe"/>
	<meta http-equiv="X-UA-Compatible" content="IE=ede,chrome=1" />
	<link href="style-boczna.css" rel="stylesheet" type="text/css"/>
	<link href="https://fonts.googleapis.com/css?family=Russo+One" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Barrio" rel="stylesheet">
	
	<script type="text/javascript">
		

	
	</script>	
	
</head>

<body>
			<?PHP								require_once "menu i stopka.php";				echo $menu;				?>
	<div id="container">	
		<div id="pole">
				<span style="text-align: center; color:#cc3333; font-size: 40px; "> PRÓBY </span>
		<div style="font-size:13px;"></br></div>
			<div style="font-size: 40px;">
					</br>		
					<a href="odkrywca.php" style="color:white; ">ODKRYWCA</a></br></br>
					<a href="cwik.php" style="color:white; ">ĆWIK</a>
					
			</div>
		
		
		</div>
		</div><div style="clear:both"/>
	</div>
	
<?PHP		echo $footer;	?>
</body>



</html>