<?php
	
	session_start();
	if(isset($_SESSION['logat'])){
		require ($_SERVER["DOCUMENT_ROOT"] .'/util/header.php');
		include ($_SERVER["DOCUMENT_ROOT"] .'/util/shortcuts.php');
		global $conn;
		}else{
		session_destroy();
		header('location: ../main/index.php');
	}
	
	$sql="SELECT * FROM uploads";
	$result = mysqli_query($conn, $sql);
	if($result){
		echo "<div class='container' style='margin-top:20px;'>";
		while($values=mysqli_fetch_assoc($result)){
			$url=$values['url_upload'];
			$nume=$values['nume_fisier'];
			$adaugatDe=$values['adaugat_de'];
			
			$sqlProfile="SELECT username FROM utilizatori JOIN uploads ON utilizatori.Id=uploads.adaugat_de WHERE Id = $adaugatDe";
			$resultProfile = mysqli_query($conn, $sqlProfile);
			$valuesPro=mysqli_fetch_assoc($resultProfile);
				$adaugat=$valuesPro['username'];
				
				echo "
				<div class='row'>
				<div class='col-md-8 mx-auto text-center'>
				<a href='$url'> $nume </a> | Adaugat de: <a href='profil.php?idUser=$adaugatDe'>$adaugat</a>
				</div>
				</div>
				";
		}
		echo "</div>";
	}
?>
