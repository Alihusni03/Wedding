<?php 
	session_start();
  include 'db_user1.php';
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
                <img src="sidebar/mempelai.png" width = "15px" class="icon">
                <span class="description-header">Mempelai</span>
              </a>
            </div>
            <div class="list-item">
              <a href="user1_data_profile.php">
                <img src="sidebar/profile.png" width = "15px" class="icon">
                <span class="description-header">Profile</span>
              </a>
            </div>
            <div class="list-item">
              <a href="user1_data_waktu.php">
                <img src="sidebar/waktu.png" width = "15px" class="icon">
                <span class="description-header">Waktu</span>
              </a>
            </div>
            <div class="list-item">
              <a href="user1_data_lokasi.php">
                <img src="sidebar/lokasi1.png" width = "15px" class="icon">
                <span class="description-header">Lokasi</span>
              </a>
            </div>
            <div class="list-item">
              <a href="user1_data_dalil.php">
                <img src="sidebar/dalil.png" width = "15px" class="icon">
                <span class="description-header">Dalil</span>
              </a>
            </div>
            <div class="list-item">
              <a href="user1_data_pesan.php">
                <img src="sidebar/pesan.png" width = "15px" class="icon">
                <span class="description-header">Pesan</span>
              </a>
            </div>
            <div class="list-item">
              <a href="user1_data_absen.php">
                <img src="sidebar/daftar.png" width = "15px" class="icon">
                <span class="description-header">Daftar Hadir</span>
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
            <h3>Tambah Data Lokasi</h3>
            <div class="box">
                <p><a href="user1_data_lokasi.php">back</a></p>
                <form action="" method="POST" enctype="multipart/form-data">   
                    <input type="text" name="lokasi1" class="input-control" placeholder="Link Denah Akad Anda" required>
                    <input type="text" name="lokasi2" class="input-control" placeholder="Link Denah Resepsi Anda" required>
                    <select class="input-control"name="status" required>
                      <option value="">---pilih---</option>
                      <?php
                        $mempelai = mysqli_query($conn, "SELECT * FROM tb_mempelai ORDER BY id_mempelai DESC");
                        while($m = mysqli_fetch_array($mempelai)){
                      ?>
                      <option value="<?php echo $m['id_mempelai'] ?>"><?php echo $m['status']?></option>
                      <?php } ?>
                    </select>
                    <input type="submit" name="submit" value="Submit" class="btn">
                </form>
                
                <?php
                    if(isset($_POST['submit'])){
                        //menampung inputan dari form
                        $lokasi1     = $_POST['lokasi1'];
                        $lokasi2     = $_POST['lokasi2'];
                        $status = $_POST['status'];

                          $insert = mysqli_query($conn, "INSERT INTO tb_lokasi VALUES (
                                      null,
                                      '".$lokasi1."',
                                      '".$lokasi2."',
                                      '".$status."'
                                          ) ");

                          if($insert){
                            echo '<script>alert("Tambah data berhasil")</script>';
                            echo '<script>window.location="user1_data_lokasi.php"</script>';
                          }else{
                            echo 'gagal'.mysqli_error($conn);
                          }
                        }
                      
                    
                ?>
            </div>   
            <label><small><i><b>* Cara Isi :</b></i></small></label>   <br> 
            <label><small>1. Buka link (<i><b> https://www.google.com/maps </b></i>)</small></label>    <br>
            <label><small>2. <i><b>Cari Lokasi</b></i>  Resepsi/Akad Anda</small></label>   <br> 
            <label><small>3. Setelah itu Klik <i><b>Bagikan</b></i> akan keluar pop up</b></i></small></label>   <br> 
            <label><small>4. Setelah itu pilih <i><b>Sematkan Peta</b></i> </b></i></small></label>   <br> 
            <label><small>5. Setelah itu <b>Salin Html</b></small></label>   <br> 
            <label><small>6. Tempelkan yang tadi di <b>copy</b> ke dalam <b>Form</b></small></label>   <br> 

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