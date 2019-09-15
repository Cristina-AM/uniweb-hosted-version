<?php
	session_start();
	if(isset($_SESSION['logat'])){
		require ($_SERVER["DOCUMENT_ROOT"] .'/util/header.php');
		include ($_SERVER["DOCUMENT_ROOT"] .'/util/shortcuts.php');
		}else{
		session_destroy();
		header('location: ../main/index.php');
	}
	$sqlProfile="SELECT Id, nume, username FROM utilizatori WHERE conectat=1 AND Id_functie=1";
	$resultProfile = mysqli_query($conn, $sqlProfile);
	
	if (mysqli_num_rows($resultProfile) > 0) {
		while($profileRow = mysqli_fetch_assoc($resultProfile)) {
			$destinatar=$profileRow['Id'];
			
			$_SESSION['destinatar']=$destinatar;
			$numeUserOn=$profileRow['nume'];
			$prennumeUserOn=$profileRow['username'];
		?>	
		<div class="profileForm">
			
			<div class="row">
				<div class="col-xs-9 col-md-3  mx-auto"><?php echo "<a href='profil.php?idUser=$destinatar'>$numeUserOn $prennumeUserOn</a>";?></div>
			</div>
			<div class="row">
				<div class="col-xs-9 col-md-3  mx-auto">
					<button type="submit" name="butonMesaj" method="POST"><a href="mesaj.php?idUser=<?php echo $destinatar?>">Trimite mesaj privat</a></button>
					
					</div>
			</div>
			
		</div>
		
	<?php
		}}?>