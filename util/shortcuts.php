<?php	
	
	if(isset($_SESSION['username']) && isset($_SESSION['id_user'])){
		$username=$_SESSION['username'];
		$user=$_SESSION['id_user'];
	}
?>


<div class="shortcuts"><a href="#" onClick="window.location.href=window.location.href"><span style="font-size:20px; padding:5px;" class="glyphicon glyphicon-refresh"></span></a></div>
<div class="shortcuts"><a href="index.php">Acasa</a></div>
<div class="shortcuts"><a href="upload.php">Upload</a></div>
<div class="shortcuts"><a href="cautare.php">Cautare user</a></div>
<div class="shortcuts"><a href="descarcari.php">Descarcari</a></div>
<div class="shortcuts"><a href='profil.php?idUser=<?php echo $user?>'>Profilul meu</a></div>
<div class="shortcuts"><a href="../util/exit.php">Deconectare</a></div>