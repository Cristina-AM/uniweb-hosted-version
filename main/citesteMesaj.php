<?php
	session_start();
	
	if(isset($_SESSION['logat']) && isset($_GET['dela'])){
		require ($_SERVER["DOCUMENT_ROOT"] .'/util/header.php');
		include "../util/shortcuts.php";
		global $conn;
		$dela=$_GET['dela'];
		$idm=$_GET['idm'];
		$sqlSetRead="UPDATE mesaje SET mesaj_citit=1 WHERE Id_mesaj=$idm";
		$setRead=mysqli_query($conn, $sqlSetRead);
		$sqlgetmess="SELECT * FROM mesaje WHERE Id_expeditor=$dela AND Id_mesaj=$idm";
		$getmesaj = mysqli_query($conn, $sqlgetmess);
		$mesaj2=mysqli_fetch_assoc($getmesaj);
		
		$sql="SELECT Id, nume, username, Id_expeditor FROM utilizatori INNER JOIN mesaje ON utilizatori.Id=mesaje.Id_expeditor WHERE Id_expeditor=$dela";
		$result = mysqli_query($conn, $sql);
		if($result){
			echo "<div class='container' style='margin-top:20px;'>";
			while($values=mysqli_fetch_assoc($result)){
				$nume=$values['nume'];
				$prenume=$values['username'];
			}
			
			
			$sqlGetMes="SELECT Id_mesaj, Id_expeditor, data_expedierii, mesaj from mesaje WHERE Id_expeditor=$dela";
			$resultGetMes = mysqli_query($conn, $sqlGetMes) or die("Bad query: $sqlGetMes");
			if($resultGetMes){
				$valuesGetMes=mysqli_fetch_assoc($resultGetMes);
				$idMesaj=$valuesGetMes['Id_mesaj'];
				$mesaj=$valuesGetMes['mesaj'];
				$dec = base64_decode($mesaj2['mesaj']);
				$sessUser=$_SESSION['id_user'];
				
			?>
			<div class='container'>
				<div class='row'>
					<div class='col-md-5 mx-auto text-center alert-primary'>
						
						<?php
							echo "Mesaj de la $nume $prenume:";
							
						?>
					</div>
				</div>
				<div class='row'>
					<div class='col-md-5 mx-auto text-center'>
						<?php echo "$dec"; ?>
					</div>
				</div>	
				
				<form action='trimiteMesaj.php?catre=<?php echo $dela;?>&decatre=<?php echo $sessUser;?>' method='POST' style='margin-top:15px;'>
					<div class='row'>
						<div class='col-md-5 mx-auto text-center'>
							
						<label for='mesaj'>
						Raspuns
						</label>
						</div>
					</div>
					<div class='row'>
						<div class='col-md-5 mx-auto text-center'>
							
							<input type='text' name='mesaj' required>
							
							<div class='row'>
								<div class='col-md-5 mx-auto text-center'>
									
									<input type='submit' name='trimiteRaspuns'>
								</div>
								
							</div>
							
						</div>
						
					</form>
				</div>
			</div>	
			
			</div>
			<?php
			}
			}else{
			session_destroy();
			header('location: ../main/index.php');
			
			
			}
			}
			?>									