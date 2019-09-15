<?php
	session_start();
	if(isset($_SESSION['logat'])){
		
		require ($_SERVER["DOCUMENT_ROOT"] .'/util/header.php');
		
		}else{
		session_destroy();
		header("Location: ../index.php");
		
	}
	
		if(isset($_SESSION['id_user'])){
			$idDest=	$_SESSION['id_user'];
			$sql = "SELECT COUNT(Id_mesaj) as mesaje_necitite FROM mesaje WHERE Id_destinatar=$idDest AND mesaj_citit=0";
		$result = mysqli_query($conn, $sql);
		$valuesMes=mysqli_fetch_assoc($result);
		$num_rowsMes=$valuesMes['mesaje_necitite'];
	
	}
		
?>

<div class="container">
	<div class="form-group">
		
		
		<div class="row">
			<div class="col-xs-12 col-md-12 text-center mx-autospan">
				<?php
					global $conn;
					$sqlConectati = "SELECT COUNT(conectat)AS c FROM utilizatori WHERE conectat=1";
					$resultCon = mysqli_query($conn, $sqlConectati) or die("Bad query: $sqlConectati");
					$valuesCon=mysqli_fetch_assoc($resultCon);
					$num_rowsCon=$valuesCon['c'];
				?>	
				<span class="glyphicon glyphicon-user"> </span>Conectati
				
			</div>
		</div>
		
		<div class="row">
			<div class="col-xs-12 col-md-12 text-center mx-autospan">
				<?php
					global $conn;
					$sqlAdmConectati = "SELECT COUNT(conectat) AS admC FROM utilizatori WHERE conectat=1 AND id_functie=1";
					$resultAdmCon = mysqli_query($conn, $sqlAdmConectati) or die("Bad query: $sqlAdmConectati");
					$valuesAdmCon=mysqli_fetch_assoc($resultAdmCon);
					$num_rowsAdmCon=$valuesAdmCon['admC'];
				?>	
				<a href="adminOn.php">Administratori( <?php echo $num_rowsAdmCon;?> ) </a>| <a href="userOn.php">Utilizatori ( <?php echo $num_rowsCon;?> )</a>
				
			</div>
		</div>
	</div>
	
</div>
<div class="form-group" style="margin-top:30px;">
	<div class="row">
		<div class="col-xs-9 text-center mx-auto"><?php echo "<a href='inbox.php?destinatar=$idDest'>";?> Mesaje </span><?php if($num_rowsMes>0){ echo "(".$num_rowsMes	.") <span class='glyphicon glyphicon-envelope'></span>";}?> | </a><a href="#" onClick="window.location.href=window.location.href">Refresh <span class="glyphicon glyphicon-refresh"></span></a>	</div>
	</div>
	<div class="row">
		<div class="col-xs-9 text-center mx-auto"><a href="cautare.php">Cautare utilizator</a>		</div>
	</div>
	<div class="row">
		<div class="col-xs-9 text-center mx-auto"><a href="profil.php?idUser=<?php echo $idDest;?>">Profilul meu</a></div>
	</div>
	<div class="row">
		<div class="col-xs-9 text-center mx-auto"><a href="upload.php">Upload</a>		</div>
	</div>
	<div class="row">
		<div class="col-xs-9 text-center mx-auto"><a href="descarcari.php">Downloads</a> 		</div>
	</div>
</div>
</div>


<?php
	require ($_SERVER["DOCUMENT_ROOT"] .'/util/deconectare.php');
?>	
