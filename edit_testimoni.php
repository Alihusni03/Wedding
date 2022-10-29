<?php
  session_start();
  include 'db.php';
  if($_SESSION['level'] == ""){
    header("location:index.php?pesan=gagal");
  }
  $testimoni = mysqli_query($conn, "SELECT * FROM tb_testimoni WHERE id_testimoni = '".$_GET['id']."' ");
  $t = mysqli_fetch_object($testimoni);
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Testimoni</title>

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
            <h3>Edit Data Testimonni</h3>
            <div class="box">
                <p><a href="testimoni.php">back</a></p>
                <form action="" method="POST" enctype="multipart/form-data">
                    
                    <input type="text" name="isi" class="input-control" placeholder="Isi" value="<?php echo $t->isi_testimoni?>" required>
                    <input type="text" name="nama" class="input-control" placeholder="Nama" value="<?php echo $t->nama_testimoni?>" required>
                    <input type="text" name="gelar" class="input-control" placeholder="Gelar" value="<?php echo $t->gelar_testimoni?>" required>
                    <img src="produk/<?php echo $t->img_testimoni?>" width="100px">
                    <input type="hidden" name="foto" class="input-control" value="<?php echo $t->img_testimoni?>" >
                    <input type="file" name="gambar" class="input-control" required>
                    
                    <input type="submit" name="submit" value="Submit" class="btn">
                </form>
                <?php
                    if(isset($_POST['submit'])){
                        // print_r($_FILES['gambar']);
                        //menampung inputan dari form
                        $isi    = $_POST['isi'];
                        $nama      = $_POST['nama'];
                        $gelar      = $_POST['gelar'];
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
                            unlink('./produk/'.$foto);
                            move_uploaded_file($tmp_name, './produk/'.$newname);
                            $namagambar = $newname;
                            }

                        }else{
                            //jika admin tidak ganti gambar
                            $namagambar = $foto;

                        }

                          $update = mysqli_query($conn, "UPDATE tb_testimoni SET 
                                      isi_testimoni = '".$isi."',
                                      nama_testimoni = '".$nama."',
                                      gelar_testimoni = '".$gelar."',
                                      img_testimoni = '".$namagambar."'
                                      WHERE id_testimoni = '".$t->id_testimoni."' ");
                          if($update){
                            echo '<script>alert("Edit data berhasil")</script>';
                            echo '<script>window.location="testimoni.php"</script>';
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