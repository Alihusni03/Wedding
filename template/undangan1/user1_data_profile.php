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
              <img src="sidebar/ajakan.png" width = "15px" class="icon">
              <span class="description-header">Mempelai</span>
            </a>
          </div>
          <div class="list-item">
            <a href="user1_data_profile.php">
              <img src="sidebar/produk.png" width = "15px" class="icon">
              <span class="description-header">Profile</span>
            </a>
          </div>
          <div class="list-item">
            <a href="user1_data_waktu.php">
              <img src="sidebar/testimoni.png" width = "15px" class="icon">
              <span class="description-header">Waktu</span>
            </a>
          </div>
          <div class="list-item">
            <a href="user1_data_lokasi.php">
              <img src="sidebar/partner.png" width = "15px" class="icon">
              <span class="description-header">Lokasi</span>
            </a>
          </div>
          <div class="list-item">
            <a href="user1_data_dalil.php">
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
            <h3>Data Profile</h3>
            <h4>Profile Mempelai Pria</h4>
            <div class="box">
              <p><a href="user1_tambah_profile_pria.php">Tambah Data</a></p>
              <table border="1" cellspacing="0" class="table">
                <thead>
                  <tr>
                    <th width="60px">No</th>
                    <th>Nama Lengkap Cowo</th>
                    <th>Nama Lengkap Ayah</th>
                    <th>Nama Lengkap Ibu</th>
                    <th>Gambar</th>
                    <th width="150px">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $no = 1;
                    $profile = mysqli_query($conn, "SELECT * FROM tb_profile ORDER BY id_profile DESC");
                    if(mysqli_num_rows($profile) > 0){
                    while($row = mysqli_fetch_array($profile)){
                  ?>
                  <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $row['nama_lengkap_pria'] ?></td>
                    <td><?php echo $row['nama_lengkap_ayah'] ?></td>
                    <td><?php echo $row['nama_lengkap_ibu'] ?></td>
                    <td><img src="produk/<?php echo $row['img_profile']?>" width="30px"></td>
                    <td>
                      <a href="edit_profile_pria.php?id=<?php echo $row['id_profile'] ?>">edit</a> || <a href="user1_proses_hapus.php?idp=<?php echo $row['id_profile'] ?>" onclick="return confirm('Yakin ingin Hapus ?')">hapus</a>
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
            <h4>Profile Mempelai Wanita</h4>
            <div class="box">
              <p><a href="user1_tambah_profile_wanita.php">Tambah Data</a></p>
              <table border="1" cellspacing="0" class="table">
                <thead>
                  <tr>
                    <th width="60px">No</th>
                    <th>Nama Lengkap Cewe</th>
                    <th>Nama Lengkap Ayah</th>
                    <th>Nama Lengkap Ibu</th>
                    <th>Gambar</th>
                    <th width="150px">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $no = 1;
                    $profile1 = mysqli_query($conn, "SELECT * FROM tb_profile1 ORDER BY id_profile1 DESC");
                    if(mysqli_num_rows($profile1) > 0){
                    while($row = mysqli_fetch_array($profile1)){
                  ?>
                  <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $row['nama_lengkap_wanita'] ?></td>
                    <td><?php echo $row['nama_lengkap_ayah'] ?></td>
                    <td><?php echo $row['nama_lengkap_ibu'] ?></td>
                    <td><img src="produk/<?php echo $row['img_profile']?>" width="30px"></td>
                    <td>
                      <a href="edit_Profile_wanita.php?id=<?php echo $row['id_profile1'] ?>">edit</a> || <a href="user1_proses_hapus.php?idp1=<?php echo $row['id_profile1'] ?>" onclick="return confirm('Yakin ingin Hapus ?')">hapus</a>
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
            <h4>Tanggal Menikah</h4>
            <div class="box">
              <p><a href="user1_tambah_profile.php">Tambah Data</a></p>
              <table border="1" cellspacing="0" class="table">
                <thead>
                  <tr>
                    <th width="60px">No</th>
                    <th>Tanggal Menikah</th>
                    <th width="150px">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $no = 1;
                    $profile2 = mysqli_query($conn, "SELECT * FROM tb_profile2 ORDER BY id_profile2 DESC");
                    if(mysqli_num_rows($profile2) > 0){
                    while($row = mysqli_fetch_array($profile2)){
                  ?>
                  <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $row['tanggal_menikah'] ?></td>
                    <td>
                      <a href="edit_profile.php?id=<?php echo $row['id_profile2'] ?>">edit</a> || <a href="user1_proses_hapus.php?idp2=<?php echo $row['id_profile2'] ?>" onclick="return confirm('Yakin ingin Hapus ?')">hapus</a>
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