<?php
	session_start();
	
	require "../util/header.php";
	include "../util/shortcuts.php";
	global $conn;
	
	if(isset($_GET['idUser'])){
		$userId=$_GET['idUser'];
		$sqlProfile="SELECT * FROM utilizatori WHERE Id = $userId";
		$resultProfile = mysqli_query($conn, $sqlProfile);
		
		if (mysqli_num_rows($resultProfile) > 0) {
			while($profileRow = mysqli_fetch_assoc($resultProfile)) {
				$linkPhoto=$profileRow['fotografie_profil'];
				
			?>
			
			<div class="profileForm">
				<div class="row">
					<div class="col-xs-9 col-md-3  mx-auto">
						<?php echo "<img width='50px' src='$linkPhoto' alt='ProfilePhoto'>";?>
					<?php echo "Profil " .$profileRow['username']." ". $profileRow['nume'];?></div>
				</div>
				
				<div class="row">
					<div class="col-xs-9 col-md-3  mx-auto"><?php echo "Id: $userId ";?></div>
				</div>
				<div class="row">
					<div class="col-xs-9 col-md-3  mx-auto"><a href="mesaj.php?idUser=<?php echo $userId?>">Trimite mesaj privat</a></div>
				</div>
				<div class="row">
					<div class="col-xs-9 col-md-3  mx-auto"><?php echo "Nume: ".$profileRow["nume"];?></div>
				</div>
				<div class="row">
					<div class="col-xs-9 col-md-3  mx-auto"><?php echo "Prenume: ".$profileRow["prenume"];?></div>
				</div>
				<div class="row">
					<div class="col-xs-9 col-md-3  mx-auto">
						<?php 
							$regDate=strtotime($profileRow["data_inregistrare"]);
							echo "Data inregistrarii: ". date('d.M.Y', $regDate);
						?>
						
					</div>
				</div>
				
				<div class="row">
					<div class="col-xs-9 col-md-3  mx-auto"><?php echo "Gen: ".$profileRow["gen"];?></div>
				</div>
				<div class="row">
					<div class="col-xs-9 col-md-3   mx-auto">
						<?php $dob=strtotime($profileRow["data_nasterii"]);
							echo "Data nasterii " . date("d.M.Y", $dob) ;
						?>
					</div>
				</div>
				
				<div class="row">
					<div class="col-xs-9 col-md-3 mx-auto">
						<?php 
							if($profileRow['id_functie']=1){
								echo "E-mail: ".$profileRow["email"];
							}
						?>
						
					</div>
				</div>
				<div class="row">
					<div class="col-xs-9 col-md-3  mx-auto"><?php echo "Localitate: ".$profileRow["localitate"];?></div>
				</div>
				<div class="row">
					<div class="col-xs-9 align-start col-md-3  mx-auto"><?php echo "Tip cont: ".$profileRow["tip_cont"];?></div>
				</div>
			</div>
			<?php
			}
		}
	} 
	
	
?>										