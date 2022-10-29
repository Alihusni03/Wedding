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
    <title>Dalil</title>

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
            <h3>Data Dalil</h3>
            <div class="box">
              <p><a href="user1_tambah_dalil.php">Tambah Data</a></p>
              <table border="1" cellspacing="0" class="table">
                <thead>
                  <tr>
                    <th width="60px">No</th>
                    <th>judul</th>
                    <th>Dalil</th>
                    <th>status</th>
                    <th width="150px">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $no = 1;
                    $dalil = mysqli_query($conn, "SELECT * FROM tb_dalil LEFT JOIN tb_mempelai USING (id_mempelai) ORDER BY id_dalil DESC");
                    if(mysqli_num_rows($dalil) > 0){
                    while($row = mysqli_fetch_array($dalil)){
                  ?>
                  <tr>
                    <td><?php echo $no++ ?></td> 
                    <td><?php echo $row['judul'] ?></td>
                    <td><?php echo $row['dalil'] ?></td>
                    <td><?php echo $row['status'] ?></td>
                    <td>
                      <a href="user1_edit_data_dalil.php?id=<?php echo $row['id_dalil'] ?>">edit</a> || <a href="user1_proses_hapus.php?idd=<?php echo $row['id_dalil'] ?>" onclick="return confirm('Yakin ingin Hapus ?')">hapus</a>
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