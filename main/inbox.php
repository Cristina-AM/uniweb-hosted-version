<?php
	session_start();
	if(isset($_SESSION['logat'])){
		require ($_SERVER["DOCUMENT_ROOT"] .'/util/header.php');
		}else{
		session_destroy();
		header('location: ../main/index.php');
		
	}
?>	
<head><meta http-equiv="refresh" content="60"></head>
<?php 
	include "../util/shortcuts.php";
	if(isset($_GET['destinatar'])){
		$destinatarMes=$_GET['destinatar'];
	}
	$sqlMesajePr="SELECT * FROM mesaje WHERE id_destinatar=$destinatarMes";
	$resultMesPr = mysqli_query($conn, $sqlMesajePr) or die("Bad query: $sqlMesajePr");
	$valuesMesPr=mysqli_fetch_assoc($resultMesPr);
	
	$exp=$valuesMesPr['Id_expeditor'];
	$sql="SELECT Id, nume, username, Id_expeditor, Id_mesaj FROM utilizatori INNER JOIN mesaje ON utilizatori.Id=mesaje.Id_expeditor WHERE Id_destinatar=$destinatarMes && mesaj_citit=0  ORDER BY Id_mesaj DESC";
	$result = mysqli_query($conn, $sql);
	if(!$values){
		echo "
		<div class='row'>
		<div class='col-md-5 mx-auto text-center alert-primary'>
			Nu aveti mesaje noi	
		</div>
		</div>";
		
	}
	if($result){
		echo "<div class='container' style='margin-top:20px;'>";
		while($values=mysqli_fetch_assoc($result)){
			$nume=$values['nume'];
			$prenume=$values['username'];
			$exp2=$values['Id_expeditor'];
			$idm=$values['Id_mesaj'];
			echo "
			<div class='row'>
			<div class='col-md-5 mx-auto text-center'>
			Mesaj de la: <a href=citesteMesaj.php?dela=$exp2&idm=$idm> $nume $prenume </a><br>
			</div>
			</div>
			";
		}
		echo "</div>";
		
	} 
	
?>
