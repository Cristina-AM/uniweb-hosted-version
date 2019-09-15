<?php
	
	
	require "../util/header.php";
	include "../util/shortcuts.php";
	global $conn;
	
	if(isset($_POST['trimiteMesaj'])){
		$destinatar=$_GET['catre'];
		$expeditor=$_GET['decatre'];
		$mesaj=$_POST['mesaj'];
				
		$trimiteMesaj="INSERT INTO mesaje (Id_expeditor, Id_destinatar, mesaj) VALUES ( '$expeditor', '$destinatar', MD5('$mesaj') )";
		$resultMesajNow = $conn->query($trimiteMesaj); 
		if($resultMesajNow){
			
			header("Location: mesajTrimis.php ");
			
			}else{
			echo "error";
		}
		
		
		
	?>	
