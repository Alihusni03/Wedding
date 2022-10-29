<?php 
// mengaktifkan session pada php
session_start();
 
// menghubungkan php dengan koneksi database
include 'db.php';
 
// menangkap data yang dikirim dari form login
$username = $_POST['username'];
$password = $_POST['password'];
 
 
// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($conn,"SELECT * FROM user WHERE username='$username' AND password='$password'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);
 
// cek apakah username dan password di temukan pada database
if($cek > 0){
 
	$data = mysqli_fetch_assoc($login);
 
	// cek jika user login sebagai admin
	if($data['level']=="admin"){
 
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['level'] = "admin";
		// alihkan ke halaman dashboard admin
		header("location:dashboard.php");

	// cek jika user login sebagai pegawai
	}else if($data['level']=="user1"){
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['level'] = "user1";
		// alihkan ke halaman dashboard pegawai
		header("location:user1_dashboard.php");

	// cek jika user login sebagai pengurus
	}else if($data['level']=="user2"){
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['level'] = "user2";
		// alihkan ke halaman dashboard pengurus
		header("location:user1_dashboard.php");

	// cek jika user login sebagai pengurus
	}else if($data['level']=="user3"){
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['level'] = "user3";
		// alihkan ke halaman dashboard pengurus
		header("location:user/user3/dashboard.php.php");
 
	}else{
 
		// alihkan ke halaman login kembali
		header("location:login.php?pesan=gagal");
	}	
}else{
	header("location:login.php?pesan=gagal");
}
 
?>