<?php 
	session_start();
 
	// cek apakah yang mengakses halaman ini sudah login
	if($_SESSION['level']==""){
		header("location:index.php?pesan=gagal");
	}
 
	?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <!-- font google -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Imbue:opsz@10..100&family=Imperial+Script&family=Italianno&family=Quicksand&family=Ubuntu:wght@400;500;700&family=Viga&display=swap" rel="stylesheet">

    <!-- my style -->
    <link rel="stylesheet" href="css/ali.css">

</head>
<body>
    <div class="container">
      
    <div class="sidebar">
        <div class="header">
          <div class="list-item">
            <a href="user1_dashboard.php">
              <img src="sidebar/dashboard.png" width = "15px" class="icon">
              <span class="description-header">DASHBOARD</span>
            </a>
          </div>
          <div class="illustration">
            <img src="sidebar/illustrasi.png" alt="">
          </div>
        </div>
        <div class="main">
          <div class="list-item">
            <a href="user1_data_mempelai.php">
              <img src="sidebar/ajakan.png" width = "15px" class="icon">
              <span class="description-header">Mempelai</span>
            </a>
          </div>
          <div class="list-item">
            <a href="user1_data_profile.php">
              <img src="sidebar/produk.png" width = "15px" class="icon">
              <span class="description-header">Profile</span>
            </a>
          </div>
          <div class="list-item">
            <a href="user1_data_waktu.php">
              <img src="sidebar/testimoni.png" width = "15px" class="icon">
              <span class="description-header">Waktu</span>
            </a>
          </div>
          <div class="list-item">
            <a href="user1_data_lokasi.php">
              <img src="sidebar/partner.png" width = "15px" class="icon">
              <span class="description-header">Lokasi</span>
            </a>
          </div>
          <div class="list-item">
            <a href="user1_data_dalil.php">
              <img src="sidebar/kontak.png" width = "15px" class="icon">
              <span class="description-header">Dalil</span>
            </a>
          </div>
          <div class="list-item">
            <a href="logout.php">
              <img src="sidebar/logout.png" width = "15px" class="icon">
              <span class="description-header">Logout</span>
            </a>
          </div>
        </div>
      </div>

      <!-- content -->
      <div class="main-content">
        <div id="menu-button">
          <input type="checkbox" id="menu-checkbox">
          <label for="menu-checkbox" id="menu-label">
            <div id="hamburger"></div>
          </label>
        </div>
        <br>
        <div class="section">
          <div class="dashboard-box">
            <h3>Dashboard</h3>
            <div class="box">
              <h4>Selamat Datang <?php echo $_SESSION['username']; ?> di Halaman <?php echo $_SESSION['level']; ?></h4>
            </div>
          </div>
        </div>
        <!-- footer -->
        <footer>
          <div class="footer">
            <small>Copyright &copy; 2022 - Inovindo Digital Media</small>
          </div>
        </footer>
        <!-- akhir footer -->
      </div>
      <!-- Akhir content -->
    </div>

    <script src="javascript/script.js"></script>

</body>
</html>