<?php
	session_start();
	session_destroy();
	
	session_start();
	
	global $conn;
	
	require ($_SERVER["DOCUMENT_ROOT"] .'/util/connection.php');
	if(isset($_POST["submit"])) {
		$emailU = $_REQUEST["email"];
		$parolaU =  $_REQUEST["parola"];
		
		if (logare($emailU, $parolaU)){
			header('location: ../main/index.php');
		}else
		echo "<div class=\"text-muted text-center alert-danger\">Datele de autentificare sunt incorecte sau contul nu a fost inca validat. Incercati mai tarziu.</div>";
	}
	
?>
<!DOCTYPE html>
<html lang="ro" dir="ltr">
	
	<head>
		<?php			
			require_once "util/header.php";
		?>
		
	</head>
	
	<body>
		<div class="container">
			<div class="row">
				<div class="col-xs-9 text-center mx-auto">
					<?php
						$utilizatoriSql = "SELECT COUNT(Id) AS users from utilizatori";
						$resultU = mysqli_query($conn, $utilizatoriSql) or die("Bad query: $utilizatoriSql");
						$valuesU=mysqli_fetch_assoc($resultU);
						$num_rowsU=$valuesU['users'];
						echo "<div><span style=\"color:#0087ff;\" class=\"glyphicon glyphicon-user\"></span> Utilizatori inregistrati: ".$num_rowsU." </div>";
						
					?>				
				</div>
			</div>
			<form action="index.php" class="needs-validation" method="POST">
				
				<div class="row">
					<div class="col-xs-9 text-center mx-auto">
						<a href="inregistrare.php">Ma inregistrez</a>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-9 text-center mx-auto">
						<div class="loginForm">
							<div class="form-group">
								<label for="email">E-mail: </label>
								<input type="email" name="email" value="" class="loginInput" required>
							</div>
							<div>
								<label for="parola" >Parola: </label>
								<input type="password" name="parola" value="" class="loginInput" required>
							</div>
							<input type="submit" name="submit" value="Logare" class="loginInput">
						</div>
						<img class="hr" src="../res/divider6.png">
						
					</div>
				</div>
			</form>
		</div>
		
		<div class="myHr"></div>
		<script>
			
			var form = document.querySelector('.needs-validation');
			
			form.addEventListener('submit', function(event) {
				if (form.checkValidity() === false) {
					event.preventDefault();
					event.stopPropagation();
				}
				form.classList.add('was-validated');
			})
		</script>
		
		<?php
			function logare($email, $parola){
				$logat = FALSE;
				global $conn;
				$sql = sprintf("SELECT Id, email, parola, username, validat FROM utilizatori WHERE email='%s' AND parola= md5('%s')",
				mysqli_real_escape_string($conn, $email),
				mysqli_real_escape_string($conn, $parola)
				);
				//echo "Query: $sql <br>";
				if (!($result = mysqli_query($conn, $sql))){
					echo('Error: ' . mysqli_error($conn));
				}
				
				if ($row=mysqli_fetch_array($result)){
					$va=$row["validat"];
					if($va=="1" ){
						$logat = TRUE;
						$_SESSION['id_user']=$row['Id'];
						$_SESSION['user'] = $email;
						$_SESSION['logat'] = TRUE;
						$_SESSION['username']=$row['username'];
					}
					
				}
				return $logat;
				echo "logat";
			}
			
			if(isset($_SESSION['username'])&& isset($_SESSION['id_user'])){
				$idUser=$_SESSION['id_user'];
				$user= $_SESSION['username'];
				$sqlUsCon="UPDATE utilizatori SET conectat=1 WHERE id=$idUser";
				mysqli_query($conn, $sqlUsCon);
			}
			
		?>
	</body>
</html>
