<?php
  session_start();
  include 'db_user1.php';
  if($_SESSION['level'] == ""){
    header("location:index.php?pesan=gagal");
  }
  $mempelai = mysqli_query($conn, "SELECT * FROM tb_mempelai WHERE id_mempelai = '".$_GET['id']."' ");
  $m = mysqli_fetch_object($mempelai);

  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Mempelai</title>

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
            <h3>Edit Data Mempelai</h3>
            <div class="box">
                <p><a href="user1_data_mempelai.php">back</a></p>
                <form action="" method="POST" enctype="multipart/form-data">
                    <input type="text" name="cowo" value="<?php echo $m->nama_cowo ?>" class="input-control" placeholder="Nama Cowo" required>
                    <input type="text" name="cewe" value="<?php echo $m->nama_cewe ?>" class="input-control" placeholder="Nama Cewe" required>
                    <label><small><i>* Format harus sesuai contoh : <b>( Bulan ) ( Tanggal ), ( Tahun ) ( Jam ):( Menit ):( Detik )</b></i></small></label>
                    <input type="text" name="tanggal" value="<?php echo $m->tanggal_mundur ?>" class="input-control" placeholder="Contoh : Nov 29, 2022 15:37:25 " required>
                    <label><small><i>* Format harus sesuai contoh : <b>( Pria ) & ( Wanita )</b></i></small></label>
                    <input type="text" name="status" value="<?php echo $m->status ?>" class="input-control" placeholder="Contoh : Adit & Wulan" required>
                    <input type="submit" name="submit" value="Submit" class="btn">
                </form>
                <?php
                    if(isset($_POST['submit'])){
                        // print_r($_FILES['gambar']);
                        //menampung inputan dari form
                        $status      = $_POST['status'];
                        $cowo      = $_POST['cowo'];
                        $cewe      = $_POST['cewe'];
                        $tanggal   = $_POST['tanggal'];

                          $update = mysqli_query($conn, "UPDATE tb_mempelai SET 
                                      status = '".$status."',
                                      nama_cowo = '".$cowo."',
                                      nama_cewe = '".$cewe."',
                                      tanggal_mundur = '".$tanggal."'
                                      WHERE id_mempelai = '".$m->id_mempelai."' ");
                          if($update){
                            echo '<script>alert("Edit data berhasil")</script>';
                            echo '<script>window.location="user1_data_mempelai.php"</script>';
                          }else{
                            echo 'gagal'.mysqli_error($conn);
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