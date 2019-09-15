<?php
	session_start();
	require ($_SERVER["DOCUMENT_ROOT"] .'/util/connection.php');
	
	global $conn;
	if(isset($_POST["inregistare"])) {
		$nume = $_POST["nume"];
		$prenume =  $_POST["prenume"];
		$username =  $_POST["username"];
		$email =  $_POST["email"];		
		$parola =  $_POST["parola"];
		$cnpUser =  $_POST["cnpUser"];
		$telefon =  $_POST["telefon"];
		$localitate =  $_POST["localitate"];
		$dataN =  $_POST["dataN"];
		$gen =  $_POST["gen"];
		$tipCont=$_POST["cont"];
	
		$sql = "SELECT cnp FROM utilizatori where cnp =$cnpUser";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				echo " <div class='row'>
				<div class='col-md-12 mx-auto text-center alert-danger'>
				Exista deja un cont pentru acest cnp.
				
				</div>
				</div>";
			}
			} else {
			$newUserSQL="INSERT INTO utilizatori ( nume, prenume, username, email, parola, cnp,
			telefon, localitate, data_nasterii, gen, tip_cont) VALUES ( '$nume', '$prenume', '$username', '$email',
			MD5('$parola'), '$cnpUser', '$telefon', '$localitate', '$dataN', '$gen', '$tipCont'
			)";
			$resultUser = $conn->query($newUserSQL); // mysqli_query($conn,$newUserSQL);
			if($resultUser){
				echo "
				<div class='row'>
				<div class='col-md-12 mx-auto text-center alert-success'>
				Cont creat cu succes! Va fi validat de catre un administrator in cel mai scurt timp
				</div>
				</div>
				";
				}else {
				echo "contul nu a fost creat, $newUserSQL ";
			}
		}
	}	
	
?>
<!DOCTYPE html>
<html lang="ro" dir="ltr">
	
	<head>
		<link rel="stylesheet" href="./teme/default_style.css">
		<?php
			require ($_SERVER["DOCUMENT_ROOT"] .'/util/header.php');
		?>
		
	</head>
	<body>
		
		<form action="inregistrare.php" name="reg" method="POST" class="main-form needs-validation" novalidate>
			<div class="row">
				<div class="col-xs-11 mx-auto col-md-11 text-center  text-muted text-center alert-danger" id="message"></div>
				
				<div class="col-xs-12 col-sm-6 col-md-6">
					
					<div class="form-group">
						<label for="nume">Nume</label>
						<input type="text" name="nume" id="nume" class="form-control" required>
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-6">
					<div class="form-group">
						<label for="prenume">Prenume</label>
						<input type="text" name="prenume" id="prenume" class="form-control" required>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-mcol-xs-12 col-sm-6 col-md-6">
					<label for="username">Nume de utilizator</label>
					<input type="text" name="username" id="username" class="form-control" required>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-6">
					<label for="email">Adresa de e-mail</label>
					<input type="email" name="email" id="email" class="form-control" required>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-6 col-md-6">
					<div class="form-group">
						<label for="parola">Parola</label>
						<input type="password" name="parola" id="parola p" class="form-control" required>
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-6">
					<div class="form-group">
						<label for="parolaRep">Repeta parola</label>
						<input type="password" name="parolaRep" id="parolaRep p" class="form-control" required>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-mcol-xs-12 col-sm-6 col-md-6">
					<label for="cnp">CNP</label>
					<input type="number" name="cnpUser" id="cnp" class="form-control" required>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-6">
					<label for="email">Telefon</label>
					<input type="number" name="telefon" id="telefon" class="form-control" required>
				</div>
			</div>
			
			<div class="row">
				<div class="col-xs-12 col-sm-6 col-md-6">
					<div class="form-group">
						<label for="localitate">Localitate</label>
						<input type="text" name="localitate" id="localitate" class="form-control" required>
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-6">
					<div class="form-group">
						<label for="dataN">Data nasterii</label>
						<input type="date" name="dataN" id="dataN" class="form-control" required>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-6 col-md-6">
					<div class="form-group">
						<label for="gen">Gen</label>
						<select name="gen" id="gen" class="form-control">
							<option value="masculin" selected>Masculin</option>
							<option value="feminin">Feminin</option>
						</select>
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-6">
					
					<div class="form-group">
						<label for="cont">Tip cont</label>
						<select name="cont" id="cont" class="form-control">
							<option value="contStudent" selected>Student</option>
							<option value="contCD">Cadru universitar</option>
						</select>
					</div>
				</div>
			</div>
			
			<div class="row">
				<div class="col-xs-12 col-sm-6 col-md-6 text-center mx-auto">
					<input type="submit" onClick="ValidateForm(this.form); passChk(this.form)" name="inregistare" id="inregistrare" class="btn btn-primary" value="Inregistrare">
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-6 col-md-6 text-center mx-auto">
					<a href="../index.php"><img src="../res/home.gif"> Inapoi la pagina principala</a>
					
				</div>
			</div>
		</form>
		
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
		crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
		crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
		crossorigin="anonymous"></script>
		
		<script>
			function passChk(){
				if(form.parolaRep != reg.parola){
					return false;
				}
				return true;
			}
		</script>
		
		<script>
			
			var form = document.querySelector('.needs-validation');
			
			form.addEventListener('submit', function(event) {
				if (form.checkValidity() === false) {
					document.getElementById("message").innerHTML = "Formularul nu este completat corect";
					event.preventDefault();
					event.stopPropagation();
				}
				form.classList.add('was-validated');
			})
		</script>
	</body>
	
	
</html>
<?php
	
	
?>