<?php
  include 'db_user1.php';
  error_reporting(1);
?>

<!DOCTYPE html>
<html class="no-js">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>PHB 1 </title>

		<link href='https://fonts.googleapis.com/css?family=Work+Sans:400,300,600,400italic,700' rel='stylesheet' type='text/css'>
		<link href="https://fonts.googleapis.com/css?family=Sacramento" rel="stylesheet">
		<link rel="icon" type="image/png" href="images/icon/phb.png">
		<!-- Animate.css -->
		<link rel="stylesheet" href="css/animate.css">
		<!-- Icomoon Icon Fonts-->
		<link rel="stylesheet" href="css/icomoon.css">
		<!-- Bootstrap  -->
		<link rel="stylesheet" href="css/bootstrap.css">
		<link rel="stylesheet" href="js/leaflet/leaflet.css">
		<!-- Magnific Popup -->
		<link rel="stylesheet" href="css/magnific-popup.css">

		<!-- Owl Carousel  -->
		<link rel="stylesheet" href="css/owl.carousel.min.css">
		<link rel="stylesheet" href="css/owl.theme.default.min.css">

		<!-- Theme style  -->
		<link rel="stylesheet" href="css/user1_index.css">

		<!-- Modernizr JS -->
		<script src="js/modernizr-2.6.2.min.js"></script>
	

	</head>
	<body>
		<div id="page">
			<header id="fh5co-header" class="fh5co-cover" role="banner" style="background-image:url(images/bgatas.jpeg); background-size: cover;" data-stellar-background-ratio="0.5">
				<div class="overlay"></div>
				<div class="container" id="beranda">
					<div class="row">
						<div class="col-md-8 col-md-offset-2 text-center">
							<div class="display-t">
								<div class="display-tc animate-box" data-animate-effect="fadeIn">
								<?php
								$id_mempelai = $_GET['undangan'];
									$mempelai = mysqli_query($conn, "SELECT *FROM tb_mempelai where id_mempelai='$id_mempelai' ORDER BY id_mempelai DESC");
									if(mysqli_num_rows($mempelai) > 0){
										while($m = mysqli_fetch_array($mempelai)){
								?>
									<h1><?php echo $m['nama_cowo']?></h1>
									<img src="images/icon/love.png" alt=""> 
									<h1><?php echo $m['nama_cewe']?></h1>
									<h2>Kami Akan Menikah Pada</h2>
									<p id="demo"></p>
									<!--Section Countdown-->
										<div class="countdown">
											<script>
												// Mengatur waktu akhir perhitungan mundur
												var countDownDate = new Date("<?php echo $m['tanggal_mundur']?>").getTime();

												// Memperbarui hitungan mundur setiap 1 detik
												var x = setInterval(function() {

												// Untuk mendapatkan tanggal dan waktu hari ini
												var now = new Date().getTime();
											
												// Temukan jarak antara sekarang dan tanggal hitung mundur
												var distance = countDownDate - now;
											
												// Perhitungan waktu untuk hari, jam, menit dan detik
												var days = Math.floor(distance / (1000 * 60 * 60 * 24));
												var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
												var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
												var seconds = Math.floor((distance % (1000 * 60)) / 1000);
											
												// Keluarkan hasil dalam elemen dengan id = "demo"
												document.getElementById("demo").innerHTML = days + "d " + hours + "h "
												+ minutes + "m " + seconds + "s ";
											
												// Jika hitungan mundur selesai, tulis beberapa teks 
												if (distance < 0) {
												clearInterval(x);
												document.getElementById("demo").innerHTML = "Acara Sedang Dimulai";
													}
												}, 1000);
											</script>
										</div>
										<?php }}else{ ?>
											<p>Mempelai Tidak Ada</p>
										<?php } ?>
									<!--<div class="simply-countdown simply-countdown-one"></div>-->
									
									<div style="display:flex; flex-direction: column; align-items: center">
										<p><canvas width = "100" height = "100" style="border: 2px solid black" id="canvas"></canvas></p>
										<!-- <label><small><i>Nama yang akan dijadikan QR Code</i></small></label> -->
										<input type="hidden" value="<?php echo ($_GET['code'])?>" id="qrInput" onchange="generateQR()" class="input-control" placeholder="QR Code" required>
										</div>
									<script src="node_modules/qrcode/build/qrcode.js"></script>
									<script>
										generateQR();
										function generateQR() {
											let canvas = document.getElementById("canvas")
											let qrInput = document.getElementById("qrInput")
											QRCode.toCanvas(canvas, qrInput.value, (err) =>{
											if(err) console.error(err)
											console.log('Scan Berhasil')
											})
										}
									</script>
								</div>
							</div>
						</div>
					</div>
				</div>
			</header>
			

	<div id="fh5co-couple">
		<div class="container">
			<div class="row">
			<?php
				$id_mempelai = $_GET['undangan'];
				$profile2 = mysqli_query($conn, "SELECT *FROM tb_profile2 where id_mempelai='$id_mempelai' ORDER BY id_profile2 DESC");
				if(mysqli_num_rows($profile2) > 0){
					while($p2 = mysqli_fetch_array($profile2)){
			?>
				<div class="col-md-8 col-md-offset-2 text-center fh5co-heading animate-box">
					<h2>Assalamualaikum!</h2>
					<h3><?php echo $p2['tanggal_menikah']?></h3>
					<p>Akad Nikah Kami</p>
				</div>
			<?php }}else{ ?>
				<p>Mempelai Tidak Ada</p>
			<?php } ?>
			</div>
			<div class="couple-wrap animate-box">
				<div class="couple-half">
				<?php
				$id_mempelai = $_GET['undangan'];
					$profile = mysqli_query($conn, "SELECT *FROM tb_profile where id_mempelai='$id_mempelai' ORDER BY id_profile DESC");
					if(mysqli_num_rows($profile) > 0){
						while($p = mysqli_fetch_array($profile)){
				?>
					<div class="groom">
						<img src="produk/<?php echo $p['img_profile'] ?>" alt="groom" class="img-responsive">
					</div>
					<div class="desc-groom">
						<h3><?php echo $p['nama_lengkap_pria']?></h3>
						<p>Putra dari Bapak <?php echo $p['nama_lengkap_ayah']?> & Ibu <?php echo $p['nama_lengkap_ibu']?></p>
					</div>
				<?php }}else{ ?>
					<p>Mempelai Tidak Ada</p>
				<?php } ?>
				</div>
				<p class="heart text-center"><i class="icon-heart2"></i></p>
				<div class="couple-half">
				<?php
				$id_mempelai = $_GET['undangan'];
					$profile1 = mysqli_query($conn, "SELECT *FROM tb_profile1 where id_mempelai='$id_mempelai' ORDER BY id_profile1 DESC");
					if(mysqli_num_rows($profile1) > 0){
						while($p1 = mysqli_fetch_array($profile1)){
				?>
					<div class="bride">
						<img src="produk/<?php echo $p1['img_profile'] ?>" alt="groom" class="img-responsive">
					</div>
					<div class="desc-bride">
						<h3><?php echo $p1['nama_lengkap_wanita']?></h3>
						<p>Putri dari Bapak <?php echo $p1['nama_lengkap_ayah']?> & Ibu <?php echo $p1['nama_lengkap_ibu']?></p>
					</div>
				<?php }}else{ ?>
					<p>Mempelai Tidak Ada</p>
				<?php } ?>
				</div>
			</div>
		</div>
	</div>

	<div id="fh5co-event" class="fh5co-bg" style="background-image:url(images/img_bg_9.jpg);">
		<div class="overlay"></div>
		<div class="container" id="acara">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center fh5co-heading animate-box">
					<span>Acara Spesial Kami</span>
					<h2>Acara Pernikahan</h2>
				</div>
			</div>
			<div class="row">
				<div class="display-t">
					<div class="display-tc">
						<div class="col-md-10 col-md-offset-1">
							<div class="col-md-6 col-sm-6 text-center">
								<div class="event-wrap animate-box">
								<?php
								$id_mempelai = $_GET['undangan'];
									$waktu = mysqli_query($conn, "SELECT *FROM tb_waktu where id_mempelai='$id_mempelai' ORDER BY id_waktu DESC");
									if(mysqli_num_rows($waktu) > 0){
									while($wa = mysqli_fetch_array($waktu)){
								?>
									<h3>AKAD NIKAH</h3>
									<div class="event-col">
										<i class="icon-clock"></i>
										<span><?php echo $wa['mulai']?></span>
										<span><?php echo $wa['selesai']?></span>
									</div>
									<div class="event-col">
										<i class="icon-calendar"></i>
										<span><?php echo $wa['hari']?></span>
										<span><?php echo $wa['bulan']?></span>
									</div>
									<p><?php echo $wa['lokasi']?></p>
								<?php }}else{ ?>
									<p>Waktu Tidak Ada</p>
								<?php } ?>
								</div>
							</div>
							<div class="col-md-6 col-sm-6 text-center">
							<?php
							$id_mempelai = $_GET['undangan'];
									$waktu1 = mysqli_query($conn, "SELECT *FROM tb_waktu1 where id_mempelai='$id_mempelai' ORDER BY id_waktu1 DESC");
									if(mysqli_num_rows($waktu1) > 0){
									while($wr = mysqli_fetch_array($waktu1)){
								?>
								<div class="event-wrap animate-box">
									<h3>RESEPSI</h3>
									<div class="event-col">
										<i class="icon-clock"></i>
										<span><?php echo $wr['mulai']?></span>
										<span><?php echo $wr['selesai']?></span>
									</div>
									<div class="event-col">
										<i class="icon-calendar"></i>
										<span><?php echo $wr['hari']?></span>
										<span><?php echo $wr['bulan']?></span>
									</div>
									<p><?php echo $wr['lokasi']?></p>
									<?php }}else{ ?>
									<p>Mempelai Tidak Ada</p>
								<?php } ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="denahlokasi">
		<div id="fh5co-couple-story">
			<div class="container" id="denahlokasi">
				<div class="row">
				<?php
				$id_mempelai = $_GET['undangan'];
					$lokasi = mysqli_query($conn, "SELECT *FROM tb_lokasi where id_mempelai='$id_mempelai' ORDER BY id_lokasi DESC");
						if(mysqli_num_rows($lokasi) > 0){
							while($l = mysqli_fetch_array($lokasi)){
				?>
					<div class="col-md-8 col-md-offset-2 text-center fh5co-heading animate-box">
						<h2>Denah Akad Nikah</h2>
						<p><?php echo $l['denah_akad']?></p>
					</div>
					<div class="col-md-8 col-md-offset-2 text-center fh5co-heading animate-box">
						<h2>Denah Resepsi</h2>
						<p><?php echo $l['denah_resepsi']?></p>
					</div>
					<?php }}else{ ?>
						<p>Lokasi Tidak Ada</p>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-8 col-md-offset-2 text-center fh5co-heading animate-box">
			<h2>Pesan Untuk Pengantin</h2>
			<form action="action_pesan.php" method="POST" enctype="multipart/form-data">
				<textarea name="nama" id="" cols="80" rows="1" class="input-control" placeholder="Nama Pengirim"></textarea><br>
				<textarea name="pesan" id="" cols="80" rows="5" class="input-control" placeholder="Pesan Kesan"></textarea><br>
				<input type="hidden" name="id_mempelai" value="<?= $id_mempelai;?>">
				<input type="submit" name="submit" value="Submit" class="btn">
			</form>
			<?php
				if(isset($_POST['submit'])){
					//menampung inputan dari form
					$nama = $_POST['nama'];
					$pesan = $_POST['pesan'];

						$insert = mysqli_query($conn, "INSERT INTO tb_pesan VALUES (
									null,
									'".$nama."',
									'".$pesan."'
												) ");

							if($insert){
								// echo '<script>alert("Tambah data berhasil")</script>';
								echo '<script>window.location="user1_index.php"</script>';
							}else{
								echo 'gagal'.mysqli_error($conn);
							}
						}
			?><br><br><br>
			<div class="row">
				<div class="col-md-12 animate-box">
					<div class="wrap-testimony">
						<div class="owl-carousel-fullwidth">
							<?php
							$id_mempelai = $_GET['undangan'];
								$pesan = mysqli_query($conn, "SELECT *FROM tb_pesan where id_mempelai='$id_mempelai' ORDER BY id_pesan DESC");
									if(mysqli_num_rows($pesan) > 0){
										while($pe = mysqli_fetch_array($pesan)){
							?>
							<div class="item">
								<div class="testimony-slide active text-center">
									<span><?php echo $pe['nama']?>:</span>
									<blockquote>
										<p><?php echo $pe['pesan']?></p>
									</blockquote>
								</div>
							</div>
							<?php }}else{ ?>
								<p>Mempelai Tidak Ada</p>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- <div class="row">
		<div class="col-md-8 col-md-offset-2 text-center fh5co-heading animate-box">
			<h2>Gallery Pernikahan</h2>
			<img src="images/1.png" alt="">
			<img src="images/1.png" alt="">
			<img src="images/1.png" alt="">
			<img src="images/1.png" alt="">
		</div>
		<div class="col-md-8 col-md-offset-2 text-center fh5co-heading animate-box">
			<img src="images/1.png" alt="">
			<img src="images/1.png" alt="">
			<img src="images/1.png" alt="">
			<img src="images/1.png" alt="">
		</div>
	</div> -->
	
	<div id="fh5co-testimonial">
		<div class="container" id="keutamaan">
			<div class="row">
				<div class="row animate-box">
					<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
						<span>Dalil Pernikahan</span>
						<h2>Keutamaan Menikah</h2>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 animate-box">
						<div class="wrap-testimony">
							<div class="owl-carousel-fullwidth">
							<?php
							$id_mempelai = $_GET['undangan'];
									$dalil = mysqli_query($conn, "SELECT * FROM tb_dalil where id_mempelai='$id_mempelai' ORDER BY id_dalil DESC");
									$jumlah=mysqli_num_rows($dalil);
									if($jumlah > 0){
									while($d = mysqli_fetch_array($dalil)){
								?>
								<div class="item active">
									<div class="testimony-slide active text-center">
										<figure>
											<img src="images/nikah.png" alt="user">
										</figure>
										<span><?php echo $d['judul']?></span>
										<blockquote>
											<p><?php echo $d['dalil']?></p>
										</blockquote>
									</div>
								</div>
								<?php
								if($jumlah<2){
								?>
								<div class="item active">
									<div class="testimony-slide active text-center">
										<figure>
											<img src="images/nikah.png" alt="user">
										</figure>
										<span><?php echo $d['judul']?></span>
										<blockquote>
											<p><?php echo $d['dalil']?></p>
										</blockquote>
									</div>
								</div>

									<?php
								}
								?>

								
								<?php }}else{ ?>
									<p>Dalil Tidak Ada</p>
								<?php } ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<footer id="fh5co-footer" role="contentinfo">
		<div class="container">

			<div class="row copyright">
				<div class="col-md-12 text-center">
					<p>
						<small class="block">&copy; PHB WO<a href="#">2022</a>.</small> 
					</p>
				</div>
			</div>

		</div>
	</footer>
	</div>
	<audio autoplay="true" loop="true" controls>
		<source src="audio.mp3" type="audio/mpeg">
	</audio>
	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
	</div>
	
	<!-- jQuery -->
	<script src="js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="js/jquery.waypoints.min.js"></script>
	<!-- Carousel -->
	<script src="js/owl.carousel.min.js"></script>
	<!-- countTo -->
	<script src="js/jquery.countTo.js"></script>

	<!-- Stellar -->
	<script src="js/jquery.stellar.min.js"></script>
	<!-- Magnific Popup -->
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/magnific-popup-options.js"></script>

	<!-- // <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/0.0.1/prism.min.js"></script> -->
	<script src="js/simplyCountdown.js"></script>
	<!-- Main -->
	<script src="js/main.js"></script>
	<script src="js/leaflet/leaflet.js"></script>

	<script>
    var d = new Date(new Date().getTime() + 200 * 120 * 120 * 700);

    // default example
    simplyCountdown('.simply-countdown-one', {
        year: d.getFullYear(),
        month: d.getMonth() + 1,
        day: d.getDate()
    });

    //jQuery example
    $('#simply-countdown-losange').simplyCountdown({
        year: d.getFullYear(),
        month: d.getMonth() + 1,
        day: d.getDate(),
        enableUtc: false
    });
</script>
		
	</body>
</html>

