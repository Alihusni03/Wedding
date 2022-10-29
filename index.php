<?php
  include 'db.php';
?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:100,200,300,400,500,600,700,800,900" rel="stylesheet">

    <title>Nikah Indah</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="icon" type="image/png" href="images/icon/phb.png">
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-eduwell-style.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <link rel="stylesheet" href="assets/css/lightbox.css">
<!--

TemplateMo 573 EduWell

https://templatemo.com/tm-573-eduwell

-->
  </head>

<body>


  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky">
      <div class="container">
          <div class="row">
              <div class="col-12">
                  <nav class="main-nav">
                      <!-- ***** Logo Start ***** -->
                      <a href="index.html" class="logo">
                          <img src="assets/images/img-logo.png" alt="">
                      </a>
                      <!-- ***** Logo End ***** -->
                      <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                          <li class="scroll-to-section"><a href="#top" class="active">Home</a></li>
                          <li class="scroll-to-section"><a href="#about">About</a></li>
                          <li class="scroll-to-section"><a href="#produk">Product</a></li>
                          <li class="scroll-to-section"><a href="#fitur">Fitur</a></li> 
                          <li class="scroll-to-section"><a href="#testimonials">Testimonials</a></li> 
                          <li class="scroll-to-section"><a href="#contact-section">Contact Us</a></li> 
                          <li class=""><a href="login.php">Login & Register</a></li></li> 
                      </ul>        
                      <a class='menu-trigger'>
                          <span>Menu</span>
                      </a>
                      <!-- ***** Menu End ***** -->
                  </nav>
              </div>
          </div>
      </div>
  </header>
  <!-- ***** Header Area End ***** -->

  <!-- ***** Main Banner Area Start ***** -->
  <section class="main-banner" id="top">
    <div class="container">
      <div class="row">
      <?php
              $ajakan = mysqli_query($conn, "SELECT *FROM tb_ajakan ORDER BY id_ajakan DESC");
              if(mysqli_num_rows($ajakan) > 0){
                while($a = mysqli_fetch_array($ajakan)){
            ?>
        <div class="col-lg-6 align-self-center">
          <div class="header-text">
            
            <h5>Welcome To</h5>
            <h2>Wedding PHB </h2>
            <h5><?php echo $a['ajakan_deskripsi']?></h5>
            
            <div class="main-button-gradient">
              <div class="scroll-to-section"><a href="#contact-section">Contact Us Now!</a></div>
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="right-image">
          <img src="produk/<?php echo $a['img_ajakan'] ?>">
          </div>
        </div>
        <?php }}else{ ?>
              <p>Ajakan Tidak Ada</p>
            <?php } ?>
      </div>
    </div>
  </section>
  <!-- ***** Main Banner Area End ***** -->

  <section class="page-heading" id="about">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="header-text">
            <h4>More About Us</h4>
            <h1>About <em>Us</em></h1>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="get-info">
    <div class="container">
      <div class="row">
      <?php
              $tentang = mysqli_query($conn, "SELECT *FROM tb_tentang ORDER BY id_tentang DESC");
              if(mysqli_num_rows($tentang) > 0){
                while($te = mysqli_fetch_array($tentang)){
            ?>
        <div class="col-lg-6">
          <div class="left-image">
            <img src="produk/<?php echo $te['img_tentang'] ?>">
          </div>
        </div>
        <div class="col-lg-6 align-self-center">
          <div class="section-heading">
            <h6>Info Us</h6>
            <h4><em><?php echo $te['judul_tentang']?></em></h4>
            <p><?php echo $te['isi_tentang']?></p>
          </div>
        </div>
        <?php }}else{ ?>
              <p>Tentang Tidak Ada</p>
            <?php } ?>
      </div>
    </div>
  </section>


  <section class="services" id="produk">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="section-heading">
            <h6>Our Services</h6>
            <h4>Produk <em>Services</em></h4>
          </div>
        </div>
        <div class="col-lg-12">
          <div class="owl-service-item owl-carousel">
          <?php
              $product = mysqli_query($conn, "SELECT *FROM tb_product ORDER BY product_id DESC");
              if(mysqli_num_rows($product) > 0){
                while($p = mysqli_fetch_array($product)){
            ?>
            <div class="item">
              <div class="service-item">
                <div class="icon">
                  <img src="produk/<?php echo $p['product_image'] ?>">
                </div>
                <h4><?php echo $p['product_name']?></h4>
                <p>Rp. <?php echo number_format($p['product_price']) ?></p>
                <a href="<?php echo $p['product_description']?>"><p>Lihat</p></a>
              </div>
            </div>
            <?php }}else{ ?>
              <p>Tentang Tidak Ada</p>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
  </section>


  <section class="our-courses" id="fitur">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 offset-lg-3">
          <div class="section-heading">
            <!-- <h6>PRODUCT</h6> -->
            <h4>Fitur <em>Us</em> </h4>
            <p></p>
          </div>
        </div>
        <div class="col-lg-12">
          <div class="naccs">
            <div class="tabs">
              <div class="row">
                <div class="col-lg-3">
                  <div class="menu">
                    <div class="active gradient-border"><span>Web Undangan Digital</span></div>
                    <div class="gradient-border"><span>Buku Tamu Digital</span></div>
                    <div class="gradient-border"><span>Photobooth</span></div>
                    <div class="gradient-border"><span>Mesin Pengambilan Souvenir</span></div>
                    <!-- <div class="gradient-border"><span>Mesin Pengambilan Souvenir</span></div> -->
                  </div>
                </div>
                <div class="col-lg-9">
                  <ul class="nacc">
                    <li class="active">
                      <?php
                        $fitur = mysqli_query($conn, "SELECT *FROM tb_fitur ORDER BY id_fitur DESC");
                        if(mysqli_num_rows($fitur) > 0){
                          while($f = mysqli_fetch_array($fitur)){
                      ?>
                        <div class="left-image">
                          <img src="produk/<?php echo $f['img_wud'] ?>" width="160px" height="230px" alt="">
                        </div>
                        <div class="right-content">
                          <h4><?php echo $f['judul_wud']?></h4>
                          <p><?php echo $f['isi_wud']?></p>
                        </div>
                      <?php }}else{ ?>
                        <p>Tentang Tidak Ada</p>
                      <?php } ?>
                    </li>
                    <li>
                    <?php
                        $fitur1 = mysqli_query($conn, "SELECT *FROM tb_fitur1 ORDER BY id_fitur1 DESC");
                        if(mysqli_num_rows($fitur1) > 0){
                          while($f1 = mysqli_fetch_array($fitur1)){
                      ?>
                        <div class="left-image">
                          <img src="produk/<?php echo $f1['img_btd'] ?>" width="160px" height="230px" alt="">
                        </div>
                        <div class="right-content">
                          <h4><?php echo $f1['judul_btd']?></h4>
                          <p><?php echo $f1['isi_btd']?></p>
                        </div>
                      <?php }}else{ ?>
                        <p>Tentang Tidak Ada</p>
                      <?php } ?>
                    </li>
                    <li>
                    <?php
                        $fitur2 = mysqli_query($conn, "SELECT *FROM tb_fitur2 ORDER BY id_fitur2 DESC");
                        if(mysqli_num_rows($fitur2) > 0){
                          while($f2 = mysqli_fetch_array($fitur2)){
                      ?>
                        <div class="left-image">
                          <img src="produk/<?php echo $f2['img_p'] ?>" width="160px" height="230px" alt="">
                        </div>
                        <div class="right-content">
                          <h4><?php echo $f2['judul_p']?></h4>
                          <p><?php echo $f2['isi_p']?></p>
                        </div>
                      <?php }}else{ ?>
                        <p>Tentang Tidak Ada</p>
                      <?php } ?>
                    </li>
                    <li>
                    <?php
                        $fitur3 = mysqli_query($conn, "SELECT *FROM tb_fitur3 ORDER BY id_fitur3 DESC");
                        if(mysqli_num_rows($fitur3) > 0){
                          while($f3 = mysqli_fetch_array($fitur3)){
                      ?>
                        <div class="left-image">
                          <img src="produk/<?php echo $f3['img_mps'] ?>" width="160px" height="230px" alt="">
                        </div>
                        <div class="right-content">
                          <h4><?php echo $f3['judul_mps']?></h4>
                          <p><?php echo $f3['isi_mps']?></p>
                        </div>
                      <?php }}else{ ?>
                        <p>Tentang Tidak Ada</p>
                      <?php } ?>
                      </li>
                    </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>


  <section class="our-team">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 offset-lg-3">
          <div class="section-heading">
            <h6>Team Us</h6>
            <h4>Team <em>Us</em></h4>
          </div>
        </div>
        <div class="col-lg-10 offset-lg-1">
          <div class="naccs">
            <div class="tabs">
              <div class="row">
                <div class="col-lg-12">
                  <div class="menu">
                  <?php
                    $partner = mysqli_query($conn, "SELECT * FROM tb_partner ORDER BY id_partner DESC");
                    if(mysqli_num_rows($partner) > 0){
                      while($pa = mysqli_fetch_array($partner)){
                  ?>
                    <div>
                      <img src="produk/<?php echo $pa['img_partner'] ?>">
                      <h4><?php echo $pa['partner']?></h4>
                      <span><?php echo $pa['detail']?></span>
                    </div>
                    <?php }}else{ ?>
                     <p>partner Tidak Ada</p>
                    <?php } ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>  




  <section class="testimonials" id="testimonials">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="section-heading">
            <h6>Testimonials</h6>
            <h4>What They <em>Think</em></h4>
          </div>
        </div>
        <div class="col-lg-12">
       
          <div class="owl-testimonials owl-carousel" style="position: relative; z-index: 5;">
          <?php
       $testimoni = mysqli_query($conn, "SELECT * FROM tb_testimoni ORDER BY id_testimoni DESC");
        if(mysqli_num_rows($testimoni) > 0){
         while($t = mysqli_fetch_array($testimoni)){
                  ?>
            <div class="item">
              <p><?php echo $t['isi_testimoni']?></p>
                <h4><?php echo $t['nama_testimoni']?></h4>
                <span><?php echo $t['gelar_testimoni']?></span>
                <img src="produk/<?php echo $t['img_testimoni'] ?>">
            </div>
          <?php }}else{ ?>
              <p>Ajakan Tidak Ada</p>
            <?php } ?>
        </div>
        
      </div>
    </div>
  </section>




  <section class="page-heading" id="contact-section">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="header-text">
            <h4></h4>
            <h1>Contact Us</h1>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="contact-us">
    <div class="container">
      <div class="row">
      <?php
       $kontak = mysqli_query($conn, "SELECT * FROM tb_kontak ORDER BY id_kontak DESC");
        if(mysqli_num_rows($kontak) > 0){
         while($ko = mysqli_fetch_array($kontak)){
                  ?>
        <div class="col-lg-8">
          <div id="map">
          
            <!-- You just need to go to Google Maps for your own map point, and copy the embed code from Share -> Embed a map section -->
            <p><?php echo $ko['lokasi']?></p>
            <div class="row">
              <div class="col-lg-4 offset-lg-1">
                <div class="contact-info">
                  <div class="icon">
                    <i class="fa fa-phone"></i>
                  </div>
                  <h4>Phone</h4>
                  <span><?php echo $ko['wa']?></span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-12">
          <ul class="social-icons">
            <li><a href="<?php echo $ko['fb']?>"><i class="fa fa-facebook"></i></a></li>
            <li><a href="<?php echo $ko['twitter']?>"><i class="fa fa-twitter"></i></a></li>
            <li><a href="<?php echo $ko['ig']?>"><i class="fa fa-instagram"></i></a></li>
          </ul>
        </div>
        <?php }}else{ ?>
              <p>Ajakan Tidak Ada</p>
            <?php } ?>
        <div class="col-lg-12">
          <p class="copyright">Copyright © 2022 - Wedding PHB - All Rights Reserved. 
          
          <br>Design: <a rel="sponsored" href="https://templatemo.com" target="_blank">alihusni</a></p>
        </div>
        
      </div>
    </div>
  </section>

  <!-- Scripts -->
  <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="assets/js/isotope.min.js"></script>
    <script src="assets/js/owl-carousel.js"></script>
    <script src="assets/js/lightbox.js"></script>
    <script src="assets/js/tabs.js"></script>
    <script src="assets/js/video.js"></script>
    <script src="assets/js/slick-slider.js"></script>
    <script src="assets/js/custom.js"></script>
    <script>
        //according to loftblog tut
        $('.nav li:first').addClass('active');

        var showSection = function showSection(section, isAnimate) {
          var
          direction = section.replace(/#/, ''),
          reqSection = $('.section').filter('[data-section="' + direction + '"]'),
          reqSectionPos = reqSection.offset().top - 0;

          if (isAnimate) {
            $('body, html').animate({
              scrollTop: reqSectionPos },
            800);
          } else {
            $('body, html').scrollTop(reqSectionPos);
          }

        };

        var checkSection = function checkSection() {
          $('.section').each(function () {
            var
            $this = $(this),
            topEdge = $this.offset().top - 80,
            bottomEdge = topEdge + $this.height(),
            wScroll = $(window).scrollTop();
            if (topEdge < wScroll && bottomEdge > wScroll) {
              var
              currentId = $this.data('section'),
              reqLink = $('a').filter('[href*=\\#' + currentId + ']');
              reqLink.closest('li').addClass('active').
              siblings().removeClass('active');
            }
          });
        };

        $('.main-menu, .responsive-menu, .scroll-to-section').on('click', 'a', function (e) {
          e.preventDefault();
          showSection($(this).attr('href'), true);
        });

        $(window).scroll(function () {
          checkSection();
        });
    </script>

</body>

</html>