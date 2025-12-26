<!DOCTYPE html>
<html>
<head>
	<title>Login | NexCorp Portal</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
 
	<div class="kotak_login">
		<p class="tulisan_login">NexCorp Login</p>
 
		<?php 
		if(isset($_GET['pesan'])){
			if($_GET['pesan']=="gagal"){
				echo "<div class='alert'>Username dan Password tidak sesuai !</div>";
			}
            if($_GET['pesan']=="belum_login"){
				echo "<div class='alert'>Silahkan login untuk mengakses dashboard</div>";
			}
		}
		?>
 
		<form action="cek_login.php" method="post">
			<input type="text" name="username" class="form_login" placeholder="Username .." required="required">
			<input type="password" name="password" class="form_login" placeholder="Password .." required="required">
 
			<input type="submit" class="tombol_login" value="MASUK">
 
			<br/>
			<br/>
		</form>
		
	</div>
 
</body>
</html>
