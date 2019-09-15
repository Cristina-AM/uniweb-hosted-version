<?php
session_start();

require "connection.php";
	if(isset($_SESSION['username'])&& isset($_SESSION['id_user'])){
		$idUser=$_SESSION['id_user'];
		$sqlUsCon="UPDATE utilizatori SET conectat=0 WHERE id=$idUser";
		mysqli_query($conn, $sqlUsCon) or die("SQL:". $sqlUsCon);
		session_destroy();
		header('Location: deconectat.php');
		exit;
	}

?>
