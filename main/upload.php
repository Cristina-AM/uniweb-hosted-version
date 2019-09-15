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
	
	
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title>Upload</title>
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-md-6 mx-auto text-center">
					<form action="upload.php" method="post" enctype="multipart/form-data">
						<input type="file" name="fileToUpload" id="fileToUpload" required>
						<input type="submit" value="Upload File" name="submit">
					</form>
				</div>
			</div>
			
			<?php
				$target_dir = "../uploads/";
				$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
				$numeFisier=basename($_FILES["fileToUpload"]["name"]);
				$url="http://www.uni-web.ro/uploads/";
				$file_url= $url . basename($_FILES["fileToUpload"]["name"]);
				$uploadOk = 1;
				if(isset($_POST["submit"])) {
					if (file_exists($target_file)) {
						echo "<div class='col-md-9 text-center alert-danger'>Fisierul a fost deja incarcat.</div>";
						$uploadOk = 0;
						}else{
						$uploadOk = 1;
						
					}
					if ($uploadOk == 0) {
						echo "<div class='col-md-9 alert-danger text-center mx-auto'>Fisierul nu a putut fi incarcat</div>";
						} else {
						if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
							echo "<div class='row'><div class='col-md-9 text-center alert-success mx-auto '>Fisierul ". basename( $_FILES["fileToUpload"]["name"]). " a fost incarcat.</div></div>";
							$idUser=$_SESSION['id_user'];
							$sqlUploadDb="INSERT INTO uploads (nume_fisier, url_upload, adaugat_de) VALUES ('$numeFisier', '$file_url', '$idUser');";
							$resultDb = $conn->query($sqlUploadDb); 
							if($resultDb){
								echo "<div class='col-md-9 text-center alert-success mx-auto'>Incarcat in baza de date</div>";
							}
						}
					}
					
					
				}
			?>			
		</div>
	</body>
</html>
