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
            <h3>Tambah Data Absen</h3>
            <div class="box">
                <p><a href="user1_data_absen.php">back</a></p>
                <form action="" method="POST" enctype="multipart/form-data">

                    <video id="previewKamera" style="width: 300px;height: 300px;"></video>
                    <br>
                    <select id="pilihKamera" style="max-width:400px">
                    </select>
                    <br>
                    <input type="text" id="hasilscan" name="nama" class="input-control" placeholder="Nama" required>
                    
                    <!-- library -->
                    <script type="text/javascript" src="https://unpkg.com/@zxing/library@latest"></script>
                    <!-- library jquery -->
                    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
                    
                    <!-- variable yg digunakan -->
                    <script>
                        let selectedDeviceId = null;
                        const codeReader = new ZXing.BrowserMultiFormatReader();
                        const sourceSelect = $("#pilihKamera");
                
                        $(document).on('change','#pilihKamera',function(){
                            selectedDeviceId = $(this).val();
                            if(codeReader){
                                codeReader.reset()
                                initScanner()
                            }
                        })
                
                        
                        function initScanner() { 
                            codeReader
                            .listVideoInputDevices()
                            .then(videoInputDevices => {
                                videoInputDevices.forEach(device =>
                                    console.log(`${device.label}, ${device.deviceId}`)
                                );
                
                                if(videoInputDevices.length > 0){
                                    
                                    if(selectedDeviceId == null){
                                        if(videoInputDevices.length > 1){
                                            selectedDeviceId = videoInputDevices[1].deviceId
                                        } else {
                                            selectedDeviceId = videoInputDevices[0].deviceId
                                        }
                                    }
                                    
                                    
                                    if (videoInputDevices.length >= 1) {
                                        sourceSelect.html('');
                                        videoInputDevices.forEach((element) => {
                                            const sourceOption = document.createElement('option')
                                            sourceOption.text = element.label
                                            sourceOption.value = element.deviceId
                                            if(element.deviceId == selectedDeviceId){
                                                sourceOption.selected = 'selected';
                                            }
                                            sourceSelect.append(sourceOption)
                                        })
                                
                                    }
                
                                    codeReader
                                        .decodeOnceFromVideoDevice(selectedDeviceId, 'previewKamera')
                                        .then(result => {
                
                                                //hasil scan
                                                console.log(result.text)
                                                $("#hasilscan").val(result.text);
                                            
                                                if(codeReader){
                                                    codeReader.reset()
                                                }
                                        })
                                        .catch(err => console.error(err));
                                    
                                } else {
                                    alert("Camera not found!")
                                }
                            })
                            .catch(err => console.error(err));
                        }
                
                
                        if (navigator.mediaDevices) {
                            
                
                            initScanner()
                            
                
                        } else {
                            alert('Cannot access camera.');
                        }
                      
                    </script>
                    <label><small><i>Dari Mempelai Pria/Wanita</i></small></label>
                    <input type="text" name="mempelai" class="input-control" placeholder="Contoh : Pria" required>
                    <select class="input-control" name="status" required>
                      <option value="">---pilih---</option>
                      <?php
                        $mempelai = mysqli_query($conn, "SELECT * FROM tb_mempelai ORDER BY id_mempelai DESC");
                        while($m = mysqli_fetch_array($mempelai)){
                      ?>
                      <option value="<?php echo $m['id_mempelai'] ?>"><?php echo $m['status']?></option>
                      <?php } ?>
                    </select>
                    <input type="submit" name="submit" value="Submit" class="btn">
                </form>
                <?php
                    if(isset($_POST['submit'])){
                        //menampung inputan dari form
                        $nama  = $_POST['nama'];
                        $mempelai = $_POST['mempelai'];
                        $status = $_POST['status'];

                          $insert = mysqli_query($conn, "INSERT INTO tb_absen VALUES (
                                      null,
                                      '".$nama."',
                                      '".$mempelai."',
                                      '".$status."'
                                      ) ");

                          if($insert){
                            echo '<script>alert("Tambah data berhasil")</script>';
                            echo '<script>window.location="user1_data_absen.php"</script>';
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