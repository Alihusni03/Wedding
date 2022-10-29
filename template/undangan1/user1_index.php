<?php
  include 'db_user1.php';
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
									$mempelai = mysqli_query($conn, "SELECT *FROM tb_mempelai ORDER BY id_mempelai DESC");
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
									<!--<div class="simply-countdown simply-countdown-one"></div>-->
									<p><a href="#acara" class="btn btn-default btn-sm"><?php echo $m['qr_code']?></a></p>
								<?php }}else{ ?>
									<p>Mempelai Tidak Ada</p>
								<?php } ?>
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
				$profile2 = mysqli_query($conn, "SELECT *FROM tb_profile2 ORDER BY id_profile2 DESC");
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
					$profile = mysqli_query($conn, "SELECT *FROM tb_profile ORDER BY id_profile DESC");
					if(mysqli_num_rows($profile) > 0){
						while($p = mysqli_fetch_array($profile)){
				?>
					<div class="groom">
						<img src="images/pengantin/pria.jpeg" alt="groom" class="img-responsive">
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
					$profile1 = mysqli_query($conn, "SELECT *FROM tb_profile1 ORDER BY id_profile1 DESC");
					if(mysqli_num_rows($profile1) > 0){
						while($p1 = mysqli_fetch_array($profile1)){
				?>
					<div class="bride">
						<img src="images/pengantin/wanita1.jpeg" alt="groom" class="img-responsive">
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
									$waktu = mysqli_query($conn, "SELECT *FROM tb_waktu ORDER BY id_waktu DESC");
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
									<p>Mempelai Tidak Ada</p>
								<?php } ?>
								</div>
							</div>
							<div class="col-md-6 col-sm-6 text-center">
							<?php
									$waktu1 = mysqli_query($conn, "SELECT *FROM tb_waktu1 ORDER BY id_waktu1 DESC");
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
									$lokasi = mysqli_query($conn, "SELECT *FROM tb_lokasi ORDER BY id_lokasi DESC");
									if(mysqli_num_rows($lokasi) > 0){
									while($l = mysqli_fetch_array($lokasi)){
								?>
					<div class="col-md-8 col-md-offset-2 text-center fh5co-heading animate-box">
						<h2>Denah Akad Nikah</h2>
						<iframe src="<?php echo $l['denah_akad']?>"
		 			width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
					</div>
					<div class="col-md-8 col-md-offset-2 text-center fh5co-heading animate-box">
						<h2>Denah Resepsi</h2>
						<iframe src="<?php echo $l['denah_resepsi']?>"
		 			width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
					</div>
					<?php }}else{ ?>
									<p>Mempelai Tidak Ada</p>
								<?php } ?>
				</div>
				<div class="row">
					<div id='maps-view-absen' style='width: 100%; height:500px;'></div>
				</div>
			</div>
		</div>
	</div>
	
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
									$dalil = mysqli_query($conn, "SELECT *FROM tb_dalil ORDER BY id_dalil DESC");
									if(mysqli_num_rows($dalil) > 0){
									while($d = mysqli_fetch_array($dalil)){
								?>
								<div class="item">
									<div class="testimony-slide active text-center">
										<figure>
											<img src="images/nikah.png" alt="user">
										</figure>
										<span>Allah Berfirman:</span>
										<blockquote>
											<p><?php echo $d['dalil']?></p>
										</blockquote>
									</div>
								</div>
							<!--<div class="item">
									<div class="testimony-slide active text-center">
										<figure>
											<img src="images/nikah.png" alt="user">
										</figure>
										<span>Rasulullah SAW bersabda:</span>
										<blockquote>
											<p>“Siapa yang ingin bertemu Allah dalam keadaan suci dan disucikan, maka menikahlah dengan perempuan-perempuan merdeka.” (HR Ibnu Majah)</p>
										</blockquote>
									</div>
								</div>
								<div class="item">
									<div class="testimony-slide active text-center">
										<figure>
											<img src="images/nikah.png" alt="user">
										</figure>
										<span>Rasulullah SAW bersabda:</span>
										<blockquote>
											<p> “Siapa yang menikah maka sungguh ia telah diberi setengahnya ibadah.” (HR Abu Ya’la)</p>
										</blockquote>
									</div>
								</div> -->
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
			
				
			
	<!--<script>
	    if (document.getElementById("maps-view-absen")) {
	        var map = L.map('maps-view-absen').setView([-7.014095473315701, 112.27404963692445], 15);

	        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
	            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> Djazuli Ahmad'
	        }).addTo(map);

	        L.marker([-7.014095473315701, 112.27404963692445]).addTo(map);
	    }
	</script>-->
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

