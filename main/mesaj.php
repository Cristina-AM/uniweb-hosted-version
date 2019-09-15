<?php
	
	session_start();
	if(isset($_SESSION['logat'])){
		require ($_SERVER["DOCUMENT_ROOT"] .'/util/header.php');
		include ($_SERVER["DOCUMENT_ROOT"] .'/util/shortcuts.php');
		}else{
		session_destroy();
		header('location: ../main/index.php');
	}
	
	
	
	if(isset($_GET['idUser']) && isset($_SESSION['id_user'])){
		$destinatar=$_GET['idUser'];
		$expeditor=$_SESSION['id_user'];
		$sqlProfile="SELECT Id, nume, username FROM utilizatori WHERE Id=$destinatar";
		$resultProfile = mysqli_query($conn, $sqlProfile);
		if (mysqli_num_rows($resultProfile) > 0) {
			while($profileRow = mysqli_fetch_assoc($resultProfile)) {
				if($destinatar==$expeditor){ 
			echo "<div class='row'><div class='col-md-5 col-sm-12 text-center mx-auto alert-danger'>Nu iti poti trimite mesaj singur!</div>";
		}else{
			?>
			<div class="container">
				<div class="row">
					<div class="col-md-5 btn-primary text-center mx-auto">
						Mesaj catre: <?php echo $profileRow['username']; echo " ". $profileRow['nume'] ;?>
					</div>
				</div>
				
				<form action="trimiteMesaj.php?catre=<?php echo $destinatar?>&decatre=<?php echo $expeditor;?>" method="post">
					<div class="row">
						<div class="col-md-3 text-center mx-auto">
							<label for="mesaj">Mesaj:</label>
						</div>
					</div>
					<div class="row">
						<div class="col-md-3 text-center mx-auto">
							<input type="text" name="mesaj">
						</div>
					</div>
					<div class="row">
						<div class="col-md-3 text-center mx-auto">
							<input type="submit" name="trimiteMesaj" value="Trimite">
						</div>
					</div>
				</form>
			</div>
			
			<?php
			}
			}
		}
	}
	
	
	?>				