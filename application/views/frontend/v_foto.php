<main id="main">

  <!-- ======= Blog Header ======= -->
  <div class="header-bg page-area">
    <div class="home-overly"></div>
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="slider-content text-center" style="padding-top: 13%;padding-bottom: 6%">
            <div class="header-bottom">
              <div class="layer2 wow zoomIn" data-wow-duration="1s" data-wow-delay=".4s">
                <h1 class="title2">
                  <?php if($album != ""){ ?>
                    Album : <?php echo $album->album_nama ?>
                  <?php }else{ ?>
                    Tidak Ada Foto
                  <?php } ?>

                </h1>
              </div>
              <div class="layer3 wow zoomInUp" data-wow-duration="2s" data-wow-delay="1s">
                <!-- <h2 class="title3">Semua Artikel Website</h2> -->
                <ol class="breadcrumb d-flex justify-content-center" style="background: transparent;">
                  <li class="breadcrumb-item">
                    <a class="text-white" href="<?php echo base_url(); ?>">Home</a>
                  </li>
                  <li class="breadcrumb-item">
                    <a class="text-white" href="<?php echo base_url('playlist'); ?>">Album Foto</a>
                  </li>
                  <li class="breadcrumb-item active text-white font-weight-bold">Kumpulan Foto dalam album</li>
                </ol>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End Blog Header -->


  <!-- ======= Portfolio Section ======= -->
  <div id="portfolio" class="portfolio-area area-padding fix">
    <div class="container">

       <?php if(count($foto) == 0){ ?>
          <center>
            <h3 class="mt-5">Belum Ada Foto.</h3>
          </center>
        <?php } ?>

      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="section-headline text-center">
            <h2>Daftar Foto</h2>
          </div>
        </div>
      </div>
    
      <div class="row awesome-project-content">

        <?php foreach($foto as $a){ ?>

         <!-- single-awesome-project start -->
         <div class="col-md-4 col-sm-4 col-xs-12 design photo">
          <div class="single-awesome-project" style="height: 200px">
            <div class="awesome-img">
              <a href="#"><img src="<?php echo base_url() ?>gambar/foto/<?php echo $a->foto_link ?>" alt="" /></a>
              <div class="add-actions text-center">
                <div class="project-dec">
                  <a class="venobox mt-5" data-gall="myGallery" href="<?php echo base_url() ?>gambar/foto/<?php echo $a->foto_link ?>">
                    <span><?php echo $a->foto_nama ?></span>
                    <br>
                    <span><?php echo $a->foto_tanggal ?></span>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- single-awesome-project end -->
      <?php } ?>




    </div>

    <br>
     <!-- membuat tombol halaman pagination -->
    <?php echo $this->pagination->create_links(); ?>

  </div>
</div><!-- End Portfolio Section -->


</main>
<!-- End #main -->
