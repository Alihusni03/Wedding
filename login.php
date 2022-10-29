<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="icon" type="image/png" href="images/icon/phb.png">
	<link rel="stylesheet" href="css/login.css">
</head>
<body>
 
	<!-- <h1>Membuat Login Multi User Level Dengan PHP dan MySQLi <br/> www.malasngoding.com</h1> -->
 
	<?php 
	if(isset($_GET['pesan'])){
		if($_GET['pesan']=="gagal"){
			echo "<div class='alert'>Kontak Admin terlebih dahulu untuk pesan Paket, Baru Login !</div>";
		}
	}
	?>
 
	<div class="kotak_login">
		<p class="tulisan_login">Silahkan login</p>
 
		<form action="cek_login.php" method="post">
			<label>Username</label>
			<input type="text" name="username" class="form_login" placeholder="Username .." required="required">
 
			<label>Password</label>
			<input type="password" name="password" class="form_login" placeholder="Password .." required="required">
 
			<input type="submit" class="tombol_login" value="LOGIN">
 
			<br/>
			<br/>
			<center>
				<a class="tombol_login" href="index.php">kembali</a>
			</center>
		</form>
		
	</div>
 
 
</body>
</html>