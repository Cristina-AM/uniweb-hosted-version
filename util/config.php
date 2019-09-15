<!DOCTYPE html>
<html lang="ro" dir="ltr">
	<head>
		<meta charset="UTF-8">
		<meta name="description" content="Dezvoltarea unui site de socializare">
		<meta name="keywords" content="HTML, CSS, Bootstrap, PHP, JavaScript">
		<meta name="author" content="Cristina Ana-Maria Mociu">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link href="bootstrap.min.css" rel="stylesheet">
		<?php
			session_start();
			if(isset($_SESSION['logat'])){
				echo "<meta http-equiv=\"refresh\" content=\"120\">";
			}
		?>
		<link rel="icon" type="image/x-icon" href="../res/uni.ico">
		<link rel="stylesheet" href="../teme/default_style.css">
		<!--<link rel="stylesheet" href="../teme/night_style.css">-->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	</head>

<?php
 require ($_SERVER["DOCUMENT_ROOT"] .'/util/connection.php');
	date_default_timezone_set("Europe/Bucharest");
	setlocale(LC_ALL, 'ro', 'ro_RO');
	$date_string = utf8_encode(ucwords(strftime("%H:%M, %A, %d %B %Y")));
?>
