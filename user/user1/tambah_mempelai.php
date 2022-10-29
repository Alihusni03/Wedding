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
            <img src="sidebar/illustrasi.png" alt="">
          </div>
        </div>
        <div class="main">
          <div class="list-item">
            <a href="data_mempelai.php">
              <img src="sidebar/ajakan.png" width = "15px" class="icon">
              <span class="description-header">Mempelai</span>
            </a>
          </div>
          <div class="list-item">
            <a href="data_profile.php">
              <img src="sidebar/produk.png" width = "15px" class="icon">
              <span class="description-header">Profile</span>
            </a>
          </div>
          <div class="list-item">
            <a href="data_waktu.php">
              <img src="sidebar/testimoni.png" width = "15px" class="icon">
              <span class="description-header">Waktu</span>
            </a>
          </div>
          <div class="list-item">
            <a href="data_lokasi.php">
              <img src="sidebar/partner.png" width = "15px" class="icon">
              <span class="description-header">Lokasi</span>
            </a>
          </div>
          <div class="list-item">
            <a href="data_dalil.php">
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
            <h3>Tambah Data Partner</h3>
            <div class="box">
                <p><a href="partner.php">back</a></p>
                <form action="" method="POST" enctype="multipart/form-data">
                    
                    <input type="text" name="cowo" class="input-control" placeholder="Nama Mempelai Pria" required>
                    <input type="text" name="cewe" class="input-control" placeholder="Nama Mempelai Wanita" required>
                    <input type="text" name="waktu" class="input-control" placeholder="Tanggal Mundur Pernikahan" required>
                    <input type="text" name="qr" class="input-control" placeholder="Nama Tamu dijadikan QR Code" required>
                    <input type="file" name="gambar" class="input-control" required>
                    <input type="submit" name="submit" value="Submit" class="btn">
                </form>
                <?php
                    if(isset($_POST['submit'])){
                        //menampung inputan dari form
                        $cowo    = $_POST['cowo'];
                        $cewe    = $_POST['cewe'];
                        $waktu   = $_POST['waktu'];
                        $qr      = $_POST['qr'];

                        //menampung data file yang diupload
                        $filename = $_FILES['gambar']['name'];
                        $tmp_name = $_FILES['gambar']['tmp_name'];

                        $type1 = explode('.', $filename);
                        $type2 = $type1[1];

                        $newname = 'produk'.time().'.'.$type2;

                        //menampung data format file yang diizinkan
                        $tipe_diizinkan = array('jpg' , 'jpeg' , 'png' , 'gif');

                        //validasi format file
                        if(!in_array($type2, $tipe_diizinkan)){
                          //jika format file tidak ada didalam tipe diizinkan
                          echo '<script>alert("Format file tidak di izinkan")</script>';
                        }else{
                          //jika format file sesuai dengan yang ada didalam array tipe diizinkan
                          //proses upload file dan insert kedatabase
                          move_uploaded_file($tmp_name, './produk/'.$newname);

                          $insert = mysqli_query($conn, "INSERT INTO tb_mempelai VALUES (
                                      null,
                                      '".$cowo."',
                                      '".$cewe."',
                                      '".$waktu."',
                                      '".$qr."',
                                      '".$newname."'
                                          ) ");

                          if($insert){
                            echo '<script>alert("Tambah data berhasil")</script>';
                            echo '<script>window.location="data_mempelai.php"</script>';
                          }else{
                            echo 'gagal'.mysqli_error($conn);
                          }
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