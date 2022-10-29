<?php 
	session_start();
  include 'db_user1.php';
	// cek apakah yang mengakses halaman ini sudah login
	if($_SESSION['level']==""){
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
            <h3>Edit Data Mempelai</h3>
            <div class="box">
                <p><a href="data_mempelai.php">back</a></p>
                <form action="" method="POST" enctype="multipart/form-data">
                    
                    <input type="text" name="cowo" class="input-control" placeholder="Nama Mempelai Pria" value="<?php echo $m->nama_cowo?>" required>
                    <input type="text" name="cewe" class="input-control" placeholder="Nama Mempelai Wanita" value="<?php echo $m->nama_cewe?>" required>
                    <input type="text" name="tanggal" class="input-control" placeholder="Tanggal Mundur Pernikahan" value="<?php echo $m->tanggal_mundur?>" required>
                    <input type="text" name="code" class="input-control" placeholder="Nama Tamu dijadikan QR Code" value="<?php echo $m->qr_code?>" required>
                    <img src="produk/<?php echo $m->img_mempelai?>" width="100px">
                    <input type="hidden" name="foto" value="<?php echo $m->img_mempelai?>">
                    <input type="file" name="gambar" class="input-control" required>
                    <input type="submit" name="submit" value="Submit" class="btn">
                </form>
                <?php
                    if(isset($_POST['submit'])){
                        //menampung inputan dari form
                        $cowo        = $_POST['cowo'];
                        $cewe        = $_POST['cewe'];
                        $tanggal     = $_POST['tanggal'];
                        $code        = $_POST['code'];
                        $foto        = $_POST['foto'];

                        //menampung data file yang diupload
                        $filename = $_FILES['gambar']['name'];
                        $tmp_name = $_FILES['gambar']['tmp_name'];

                        //jika admin ganti gambar
                        if($filename != ''){

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
                                unlink('./produk/'.$foto);
                                move_uploaded_file($tmp_name, './produk/'.$newname);
                                $namagambar = $newname;
                            }
                          }else{
                            //jika admin tidak ganti gambar
                            $namagambar = $foto;
                            }
                          
                          $update = mysqli_query($conn, "UPDATE tb_mempelai SET 
                                      nama_cowo = '".$cowo."',
                                      nama_cewe = '".$cewe."',
                                      tanggal_mundur = '".$tanggal."',
                                      qr_code = '".$code."',
                                      img_mempelai = '".$namagambar."'
                                      WHERE id_mempelai = '".$m->$id_mempelai."' ");
                          if($update){
                            echo '<script>alert("Edit data berhasil")</script>';
                            echo '<script>window.location="data_mempelai.php"</script>';
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