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
    <title>Fitur</title>

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


      <!-- content fitur -->

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
            <h3>Fitur</h3>
            <h2>Web Undangan Digital</h2>
            <div class="box">
              <!-- <p><a href="tambah_wud.php">Tambah Data</a></p> -->
              <table border="1" cellspacing="0" class="table">
                <thead>
                  <tr>
                    <th width="60px">No</th>
                    <th>Judul W U D</th>
                    <th>Isi</th>
                    <th>Gambar</th>
                    <th width="150px">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $no = 1;
                    $fitur = mysqli_query($conn, "SELECT * FROM tb_fitur ORDER BY id_fitur DESC");
                    if(mysqli_num_rows($fitur) > 0){
                    while($row = mysqli_fetch_array($fitur)){
                  ?>
                  <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $row['judul_wud'] ?></td>
                    <td><?php echo $row['isi_wud'] ?></td>
                    <td><img src="produk/<?php echo $row['img_wud'] ?>" width="30px"></td>
                    <td>
                      <a href="edit_wud.php?id=<?php echo $row['id_fitur'] ?>">edit</a>
                    </td>
                  </tr>
                  <?php }}else{ ?>
                      <tr>
                        <td colspan="8">Tidak Ada Data</td>
                      </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
            <h2>Buku Tamu Digital</h2>
            <div class="box">
              <!-- <p><a href="tambah_btd.php">Tambah Data</a></p> -->
              <table border="1" cellspacing="0" class="table">
                <thead>
                  <tr>
                    <th width="60px">No</th>
                    <th>Judul B T D</th>
                    <th>Isi</th>
                    <th>Gambar</th>
                    <th width="150px">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $no = 1;
                    $fitur1 = mysqli_query($conn, "SELECT * FROM tb_fitur1 ORDER BY id_fitur1 DESC");
                    if(mysqli_num_rows($fitur1) > 0){
                    while($row = mysqli_fetch_array($fitur1)){
                  ?>
                  <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $row['judul_btd'] ?></td>
                    <td><?php echo $row['isi_btd'] ?></td>
                    <td><img src="produk/<?php echo $row['img_btd'] ?>" width="30px"></td>
                    <td>
                      <a href="edit_btd.php?id=<?php echo $row['id_fitur1'] ?>">edit</a>
                    </td>
                  </tr>
                  <?php }}else{ ?>
                      <tr>
                        <td colspan="8">Tidak Ada Data</td>
                      </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
            <h2>Photobooth</h2>
            <div class="box">
              <!-- <p><a href="tambah_p.php">Tambah Data</a></p> -->
              <table border="1" cellspacing="0" class="table">
                <thead>
                  <tr>
                    <th width="60px">No</th>
                    <th>Judul Photobooth</th>
                    <th>Isi</th>
                    <th>Gambar</th>
                    <th width="150px">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $no = 1;
                    $fitur2 = mysqli_query($conn, "SELECT * FROM tb_fitur2 ORDER BY id_fitur2 DESC");
                    if(mysqli_num_rows($fitur2) > 0){
                    while($row = mysqli_fetch_array($fitur2)){
                  ?>
                  <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $row['judul_p'] ?></td>
                    <td><?php echo $row['isi_p'] ?></td>
                    <td><img src="produk/<?php echo $row['img_p'] ?>" width="30px"></td>
                    <td>
                      <a href="edit_p.php?id=<?php echo $row['id_fitur2'] ?>">edit</a>
                    </td>
                  </tr>
                  <?php }}else{ ?>
                      <tr>
                        <td colspan="8">Tidak Ada Data</td>
                      </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
            <h2>Mesin Pengambil Souvenir</h2>
            <div class="box">
              <!-- <p><a href="tambah_mps.php">Tambah Data</a></p> -->
              <table border="1" cellspacing="0" class="table">
                <thead>
                  <tr>
                    <th width="60px">No</th>
                    <th>Judul M P S</th>
                    <th>Isi</th>
                    <th>Gambar</th>
                    <th width="150px">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $no = 1;
                    $fitur3 = mysqli_query($conn, "SELECT * FROM tb_fitur3 ORDER BY id_fitur3 DESC");
                    if(mysqli_num_rows($fitur3) > 0){
                    while($row = mysqli_fetch_array($fitur3)){
                  ?>
                  <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $row['judul_mps'] ?></td>
                    <td><?php echo $row['isi_mps'] ?></td>
                    <td><img src="produk/<?php echo $row['img_mps'] ?>" width="30px"></td>
                    <td>
                      <a href="edit_mps.php?id=<?php echo $row['id_fitur3'] ?>">edit</a>
                    </td>
                  </tr>
                  <?php }}else{ ?>
                      <tr>
                        <td colspan="8">Tidak Ada Data</td>
                      </tr>
                  <?php } ?>
                </tbody>
              </table>
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