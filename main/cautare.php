<?php
	include_once("../util/header.php");
	include_once("../util/shortcuts.php");
	
	if (isset($_POST['username']))
	{
		$username = mysqli_real_escape_string($conn,$_POST['username']);
		
		$sql = "SELECT * FROM utilizatori WHERE username='$username'";
		
		$result = $conn->query($sql);
		
		if ($result->num_rows > 0) {
			echo "<div class='container'>";
			while($row = $result->fetch_assoc()) {
			?>
			<div class="row">
				<div class="col-md-5 mx-auto text-center">
					<?php
						$id=$row['Id'];
						$nume=$row['nume'];
						$username=$row['username'];
						
						echo "$id | <a href='profil.php?idUser=$id'>$nume $username</a>";
						
					?>
				</div>
			</div>
			<?php
			}
			echo "</div>";
		}
		else {
			echo "<div class='col-md-5 mx-auto text-center alert-danger'> Nu am gasit niciun utilizator cu acest nume</div>";
		}
	}
	
?>
<div class="container">
	<div class="row">
		<div class="col-md-5 mx-auto text-center" style="margin-top:15px;">
			
			<form action="cautare.php" method="post">
				Username:  <input type="text" name="username" size="20">
				<input type="submit" value="Search" name="submit">
			</form>
		</div>
	</div>
</div>