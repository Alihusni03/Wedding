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
            <h3>Data Waktu</h3>
            <h4>Akad Nikah</h4>
            <div class="box">
              <p><a href="tambah_akad.php">Tambah Data</a></p>
              <table border="1" cellspacing="0" class="table">
                <thead>
                  <tr>
                    <th width="60px">No</th>
                    <th>Mulai Pukul</th>
                    <th>Selesai Pukul</th>
                    <th>Hari & Tanggal</th>
                    <th>Bulan & Tahun</th>
                    <th>Lokasi</th>
                    <th width="150px">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $no = 1;
                    $waktu = mysqli_query($conn, "SELECT * FROM tb_waktu ORDER BY id_waktu DESC");
                    if(mysqli_num_rows($waktu) > 0){
                    while($row = mysqli_fetch_array($waktu)){
                  ?>
                  <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $row['mulai'] ?></td>
                    <td><?php echo $row['selesai'] ?></td>
                    <td><?php echo $row['hari'] ?></td>
                    <td><?php echo $row['bulan'] ?></td>
                    <td><?php echo $row['lokasi'] ?></td>
                    <td>
                      <a href="edit_waktu.php?id=<?php echo $row['id_waktu'] ?>">edit</a> || <a href="proses_hapus.php?idwa=<?php echo $row['id_waktu'] ?>" onclick="return confirm('Yakin ingin Hapus ?')">hapus</a>
                    </td>
                  </tr>
                  <?php }}else{ ?>
                      <tr>
                        <td colspan="4">Tidak Ada Data</td>
                      </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
            <h4>Resepsi</h4>
            <div class="box">
              <p><a href="tambah_resepsi.php">Tambah Data</a></p>
              <table border="1" cellspacing="0" class="table">
                <thead>
                  <tr>
                    <th width="60px">No</th>
                    <th>Mulai Pukul</th>
                    <th>Selesai Pukul</th>
                    <th>Hari & Tanggal</th>
                    <th>Bulan & Tahun</th>
                    <th>Lokasi</th>
                    <th width="150px">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $no = 1;
                    $waktu1 = mysqli_query($conn, "SELECT * FROM tb_waktu1 ORDER BY id_waktu1 DESC");
                    if(mysqli_num_rows($waktu1) > 0){
                    while($row = mysqli_fetch_array($waktu1)){
                  ?>
                  <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $row['mulai'] ?></td>
                    <td><?php echo $row['selesai'] ?></td>
                    <td><?php echo $row['hari'] ?></td>
                    <td><?php echo $row['bulan'] ?></td>
                    <td><?php echo $row['lokasi'] ?></td>
                    <td>
                      <a href="edit_waktu.php?id=<?php echo $row['id_waktu1'] ?>">edit</a> || <a href="proses_hapus.php?idwr=<?php echo $row['id_waktu1'] ?>" onclick="return confirm('Yakin ingin Hapus ?')">hapus</a>
                    </td>
                  </tr>
                  <?php }}else{ ?>
                      <tr>
                        <td colspan="4">Tidak Ada Data</td>
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