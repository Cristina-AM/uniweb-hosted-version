<?php
	session_start();
	if(!isset($_SESSION['logat'])){
		$logat=$_SESSION['logat'];
		echo $logat;
		include "header.php";
		echo "
			<div class=\"container\">
				<div class=\"row\">
					<div class=\"col-sm-12 col-md-6 text-center mx-auto\">
						Doconectare efectuata cu succes!
					</div>
				</div>
				<div class=\"row\">
					
					<div class=\"col-sm-12 col-md-6 text-center mx-auto\">
						
						<a href=\"../index.php\"><img src=\"../res/home.gif\"> Inapoi la pagina principala</a>
						
					</div>
				</div>
			</div>
		";
	}
?>

