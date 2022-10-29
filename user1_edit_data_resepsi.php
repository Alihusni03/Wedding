<?php
  session_start();
  include 'db_user1.php';
  if($_SESSION['level'] == ""){
    header("location:index.php?pesan=gagal");
  }
  $waktu1 = mysqli_query($conn, "SELECT * FROM tb_waktu1 WHERE id_waktu1 = '".$_GET['id']."' ");
  $w1 = mysqli_fetch_object($waktu1);

  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Resepsi</title>

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
            <h3>Edit Data Resepsi</h3>
            <div class="box">
                <p><a href="user1_data_waktu.php">back</a></p>
                <form action="" method="POST" enctype="multipart/form-data">
                    
                    <input type="text" name="mulai" value="<?php echo $w1->mulai ?>" class="input-control" placeholder="mulai" required>
                    <input type="text" name="selesai" value="<?php echo $w1->selesai ?>" class="input-control" placeholder="selesai Pukul" required>
                    <input type="text" name="hari" value="<?php echo $w1->hari ?>" class="input-control" placeholder="hari" required>
                    <input type="text" name="bulan" value="<?php echo $w1->bulan?>" class="input-control" placeholder="Bulan" required>
                    <input type="text" name="lokasi" value="<?php echo $w1->lokasi?>" class="input-control" placeholder="lokasi" required>       
                    <select class="input-control"name="status" required>
                      <option value="">---pilih---</option>
                      <?php
                        $mempelai = mysqli_query($conn, "SELECT * FROM tb_mempelai ORDER BY id_mempelai DESC");
                        while($m = mysqli_fetch_array($mempelai)){
                      ?>
                      <option value="<?php echo $m['id_mempelai'] ?>"><?php  echo $m['status']?></option>
                      <?php } ?>
                    </select>      
                    <input type="submit" name="submit" value="Submit" class="btn">
                </form>
                <?php
                    if(isset($_POST['submit'])){
                        // print_r($_FILES['gambar']);
                        //menampung inputan dari form
                        $mulai       = $_POST['mulai'];
                        $selesai     = $_POST['selesai'];
                        $hari        = $_POST['hari'];
                        $bulan       = $_POST['bulan'];
                        $lokasi      = $_POST['lokasi'];
                        $status      = $_POST['status'];


                        

                          $update = mysqli_query($conn, "UPDATE tb_waktu1 SET 
                                      mulai = '".$mulai."',
                                      selesai = '".$selesai."',
                                      hari = '".$hari."',
                                      bulan = '".$bulan."',
                                      lokasi = '".$lokasi."',
                                      id_mempelai = '".$status."'
                                      WHERE id_waktu1 = '".$w1->id_waktu1."' ");
                          if($update){
                            echo '<script>alert("Edit data berhasil")</script>';
                            echo '<script>window.location="user1_data_waktu.php"</script>';
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