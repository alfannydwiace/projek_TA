<!-- ======= Slider Section ======= -->
<div id="home" class="slider-area">
  <div class="bend niceties preview-2">
    <div id="ensign-nivoslider" class="slides">
      <?php 
      $nomor = 1;
      foreach($slider as $s){ 
        ?>
        <img src="<?php echo base_url();  ?>gambar/slider/<?php echo $s->slider_gambar ?>" alt="" title="#slider-direction-<?php echo $nomor++ ?>">
        <?php 
      }
      ?>
    </div>


    <?php 
    
    $nomor = 1;
    foreach($slider as $s){ 
      echo $nomor;
      if($nomor == 1){
        $xxx = "one";
      }else if($nomor == 2){
        $xxx = "two";
      }elseif($nomor == 3){
        $xxx = "three";
      }elseif($nomor == 4){
        $xxx = "four";
      }elseif($nomor == 5){
        $xxx = "five";
      }
      ?>
      <!-- direction 1 -->
      <div id="slider-direction-<?php echo $nomor ?>" class="slider-direction slider-<?php echo $xxx ?>">
        <div class="container">
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="slider-content" style="padding-top: 20%">
                <!-- layer 1 -->
                <div class="layer-1-1 hidden-xs wow animate__slideInDown animate__animated" data-wow-duration="2s" data-wow-delay=".2s">
                  <h2 class="title1"><?php echo $s->slider_text1 ?></h2>
                </div>
                <!-- layer 2 -->
                <div class="layer-1-2 wow animate__fadeIn animate__animated" data-wow-duration="2s" data-wow-delay=".2s">
                  <h1 class="title2"><?php echo $s->slider_text2 ?></h1>
                </div>
                <!-- layer 3 -->
                <div class="layer-1-3 hidden-xs wow animate__slideInUp animate__animated" data-wow-duration="2s" data-wow-delay=".2s">
                  <?php if($s->slider_tombol_text1 != ""){ ?>
                    <a class="ready-btn right-btn page-scroll" href="<?php echo $s->slider_tombol_link1 ?>"><?php echo $s->slider_tombol_text1 ?></a>
                  <?php } ?>
                  <?php if($s->slider_tombol_text2 != ""){ ?>
                    <a class="ready-btn page-scroll" href="<?php echo $s->slider_tombol_link2 ?>"><?php echo $s->slider_tombol_text2 ?></a>
                  <?php } ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>


      <?php 
      $nomor++;
    }
    ?>




  </div>
</div>
<!-- End Slider -->




<main id="main bg-white">

  
  <!--/ Section Portfolio Star /-->
  <div id="work">

    <br>
    <br>
    <br>


    <div class="container"> 
      <div class="row">
        <div class="col-md-12">

          <div>
            <div class="py-1" style="border-bottom: 3px solid #28a745;">
              <span class="bg-success px-3 py-2 text-white"><b>GALERI FOTO</b></span>
            </div>

            <br>
            <div class="owl-carousel owl-two">
              <?php foreach($foto as $a){ ?>

              <a class="text-dark" href="<?php echo base_url() ?>gambar/foto/<?php echo $a->foto_link ?>" target="_blank">
                 <div class="card">
                 
                  <img src="<?php echo base_url() ?>gambar/foto/<?php echo $a->foto_link ?>" alt="" />
                  
                  <div class="card-body p-1">

                   <center>
                      <?php echo $a->foto_nama ?>
                   </center>

                  </div>
                </div>
              </a>

            <?php } ?>
          </div>


        
        </div>

      </div>


    </div>
  </div>


</div>

<!--/ Section Portfolio End /-->
<!-- agenda akan datang  -->
<main id="main bg-white">

  
  <!--/ Section Portfolio Star /-->
  <div id="work" class="mb-5">

    <br>
    <br>
    <br>


    <div class="container"> 
      <div class="row">
        <div class="col-md-12">

          <div>
            <div class="py-1" style="border-bottom: 3px solid #28a745;">
              <span class="bg-success px-3 py-2 text-white"><b>Agenda yang akan datang</b></span>
            </div>

            <br>
            <div class="owl-carousel owl-two">
              <?php foreach($agenda as $a){ ?>

              <a class="text-dark" href="<?php echo base_url() ?>gambar/agenda/<?php echo $a->agenda_foto ?>" target="_blank">
                 <div class="card">
                 
                  <img src="<?php echo base_url() ?>gambar/agenda/<?php echo $a->agenda_foto ?>" alt="" />

                  
                  <div class="card-body p-1">

                   <center>
                      <?php echo $a->agenda_nama ?>
                      <h6><?php echo $a->agenda_tanggal ?></h6>
                   </center>

                  </div>
                </div>
              </a>

            <?php } ?>
          </div>


        
        </div>

      </div>


    </div>
  </div>

  <br>
  <br>
  <br>

</div>
<!-- ======= Suscribe Section ======= -->
<div class="suscribe-area p-5">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs=12">
        <div class="suscribe-text text-center">
          <h3>Selamat Datang di <b><?php echo $pengaturan->nama ?></b></h3>
        </div>
      </div>
    </div>
  </div>
</div><!-- End Suscribe Section -->

<!-- ======= Contact Section ======= -->
<div id="contact" class="contact-area">
  <div class="contact-inner area-padding">
    <div class="contact-overly"></div>
    <div class="container ">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="section-headline text-center">
            <h2>Kontak Kami</h2>
          </div>
        </div>
      </div>
      <div class="row">
        <!-- Start contact icon column -->
        <div class="col-md-4 col-sm-4 col-xs-12">
          <div class="contact-icon text-center">
            <div class="single-icon">
              <i class="fa fa-mobile"></i>
              <p>
                Call: 085891371922<br>
                <span>Senin-Jumat (7am-5pm)</span>
              </p>
            </div>
          </div>
        </div>
        <!-- Start contact icon column -->
        <div class="col-md-4 col-sm-4 col-xs-12">
          <div class="contact-icon text-center">
            <div class="single-icon">
              <i class="fa fa-envelope-o"></i>
              <p>
                Email: alfani.dac1922@gmail.com<br>
                <span>Web: www.disnakkanbjn.com</span>
              </p>
            </div>
          </div>
        </div>
        <!-- Start contact icon column -->
        <div class="col-md-4 col-sm-4 col-xs-12">
          <div class="contact-icon text-center">
            <div class="single-icon">
              <i class="fa fa-map-marker"></i>
              <p>
                Location: Jl. Bojonegoro Loss Gak Rewel<br>
                <span>Kabupaten Bojonegoro, Jawa Timur</span>
              </p>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</div><!-- End Contact Section -->

</main><!-- End #main -->