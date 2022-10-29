<?php 
	session_start();
  include 'db.php';
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
    <title>Tambah Kategori</title>

    <!-- font google -->
    <link rel="icon" type="image/png" href="images/icon/phb.png">
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
            <a href="dashboard.php">
              <img src="sidebar/dashboard.png" width = "15px" class="icon">
              <span class="description-header">DASHBOARD</span>
            </a>
          </div>
          <div class="illustration">
            <img src="img/illustrasi.png" alt="">
          </div>
        </div>
        <div class="main">
          <!-- <div class="list-item">
            <a href="profile.php">
              <img src="sidebar/profile.png" width = "15px" class="icon">
              <span class="description-header">Profile</span>
            </a>
          </div> -->
          <div class="list-item">
            <a href="ajakan.php">
              <img src="sidebar/ajakan.png" width = "15px" class="icon">
              <span class="description-header">Ajakan</span>
            </a>
          </div>
          <div class="list-item">
            <a href="category.php">
              <img src="sidebar/category.png" width = "15px" class="icon">
              <span class="description-header">Category</span>
            </a>
          </div>
          <div class="list-item">
            <a href="product.php">
              <img src="sidebar/produk.png" width = "15px" class="icon">
              <span class="description-header">Produk</span>
            </a>
          </div>
          <div class="list-item">
            <a href="testimoni.php">
              <img src="sidebar/testimoni.png" width = "15px" class="icon">
              <span class="description-header">Testimoni</span>
            </a>
          </div>
          <div class="list-item">
            <a href="partner.php">
              <img src="sidebar/partner.png" width = "15px" class="icon">
              <span class="description-header">Partner</span>
            </a>
          </div>
          <div class="list-item">
            <a href="kontak.php">
              <img src="sidebar/kontak.png" width = "15px" class="icon">
              <span class="description-header">Kontak</span>
            </a>
          </div>
          <div class="list-item">
            <a href="fitur.php">
              <img src="sidebar/fitur.png" width = "15px" class="icon">
              <span class="description-header">Fitur</span>
            </a>
          </div>
          <div class="list-item">
            <a href="tentang.php">
              <img src="sidebar/tentang.png" width = "15px" class="icon">
              <span class="description-header">Tentang</span>
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
            <h3>Tambah Data Kategori</h3>
            <div class="box">
                <p><a href="category.php">back</a></p>
                <form action="" method="POST">
                    <input type="text" name="nama" placeholder="Nama Kategori" class="input-control" required>
                    <input type="submit" name="submit" value="Submit" class="btn">
                </form>
                <?php
                    if(isset($_POST['submit'])){
                        $nama = ucwords($_POST['nama']);
                        $insert = mysqli_query($conn, "INSERT INTO tb_category VALUES (
                            null,
                            '".$nama."') ");
                        if($insert){
                            echo '<script>alert("Tambah data berhasil")</script>';
                            echo '<script>window.location="category.php"</script>';
                        }else{
                            echo 'gagal' .mysqli_error($conn);
                        }
                    }
                ?>
            </div>           
          </div>
        </div>
        <footer>
          <div class="footer">
            <small>Copyright &copy; 2022 - Inovindo Digital Media</small>
          </div>
        </footer>
      </div>
      <!-- Akhir content -->
    </div>

    <script src="javascript/script.js"></script>

</body>
</html>