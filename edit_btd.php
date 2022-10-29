<?php
  session_start();
  include 'db.php';
  if($_SESSION['level'] == ""){
    header("location:index.php?pesan=gagal");
  }
  $fitur1 = mysqli_query($conn, "SELECT * FROM tb_fitur1 WHERE id_fitur1 = '".$_GET['id']."' ");
  $f1 = mysqli_fetch_object($fitur1);

  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Buku Tamu Undangan</title>

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
            <h3>Tambah Data Fitur Web Undangan Digital</h3>
            <div class="box">
                <p><a href="fitur.php">back</a></p>
                <form action="" method="POST" enctype="multipart/form-data">
                    
                    <input type="text" name="judul" value="<?php echo $f1->judul_btd ?>" class="input-control" placeholder=Judul required>
                    <input type="text" name="isi" value="<?php echo $f1->isi_btd ?>" class="input-control" placeholder="Isi" required>
                    <img src="produk/<?php echo $f1->img_btd?>" width="100px">
                    <input type="hidden" name="foto" value="<?php echo $f1->img_btd ?>">
                    <input type="file" name="gambar" class="input-control" required>
                    
                    <input type="submit" name="submit" value="Submit" class="btn">
                </form>
                <?php
                    if(isset($_POST['submit'])){
                        // print_r($_FILES['gambar']);
                        //menampung inputan dari form
                        $judul    = $_POST['judul'];
                        $isi      = $_POST['isi'];
                        $foto     = $_POST['foto'];

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
                          move_uploaded_file($tmp_name, './produk/'.$newname);
                          $namagambar = $newname;
                        }
                    }else{
                          //jika admin tidak ganti gambar
                          $namagambar = $foto;
                    }

                          $update = mysqli_query($conn, "UPDATE tb_fitur1 SET 
                                      judul_btd = '".$judul."',
                                      isi_btd = '".$isi."',
                                      img_btd = '".$namagambar."'
                                      WHERE id_fitur1 = '".$f1->id_fitur1."' ");
                          if($update){
                            echo '<script>alert("Tambah data berhasil")</script>';
                            echo '<script>window.location="fitur.php"</script>';
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