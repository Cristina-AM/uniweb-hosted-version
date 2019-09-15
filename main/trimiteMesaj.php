<?php
	
	
	require "../util/header.php";
	include "../util/shortcuts.php";
	global $conn;
	
	if(isset($_POST['trimiteMesaj']) || isset($_POST['trimiteRaspuns'])){
		$destinatar=$_GET['catre'];
		$expeditor=$_GET['decatre'];
		$mesaj=$_POST['mesaj'];
		$enc = base64_encode ($mesaj);
		
		$trimiteMesaj="INSERT INTO mesaje (Id_expeditor, Id_destinatar, mesaj) VALUES ( '$expeditor', '$destinatar', '$enc' )";
		$resultMesajNow = $conn->query($trimiteMesaj); 
		
		
		if($resultMesajNow){
			echo "<div class='row'><div class='col-md-6 col-sm-12 text-center alert-success mx-auto'>Mesajul a fost trimis cu succes</div></div>";
			} else{ 
			echo "<div class='row'><div class='col-md-5 col-sm-12 text-center mx-auto alert-danger'>Mesajul a fost trimis cu succes</div></div>";			
		}
		
	}
	
	
?>		