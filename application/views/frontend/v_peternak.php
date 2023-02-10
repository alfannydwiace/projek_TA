<main id="main">

  <!-- ======= Blog Header ======= -->
  <div class="header-b bg-primary page-area">
    <div class="home-overly"></div>
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="slider-content text-center" style="padding-top: 13%;padding-bottom: 6%">
            <div class="header-bottom">
              <div class="layer2 wow zoomIn" data-wow-duration="1s" data-wow-delay=".4s">
                <h1 class="title2">Peternak Binaan</h1>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End Blog Header -->

  <!-- ======= Blog Page ======= -->
  <div class="blog-page area-padding">
    <div class="container">
      <div class="row justify-content-center">


        <!-- Start single blog -->


        <?php foreach($peternak as $a){ ?>
          <div class="col-md-3 col-sm-12 col-xs-12">

            <a class="text-dark" href="#">
              <div class="card">

                <img src="<?php echo base_url() ?>gambar/peternak/<?php echo $a->peternak_foto ?>" alt="" />

                <div class="card-body p-2">

                    <h6>Nama Peternak: <?php echo $a->peternak_nama ?> </h6>
                    <h6>Email: <?php echo $a->peternak_email ?> </h6>
                    <h6>No. Telepon/WA: <?php echo $a->peternak_telp ?> </h6>
                    <h6>Jenis Ternak:  <?php echo $a->peternak_alamat ?></h6>
                    <a href="<?php echo $a->peternak_link ?>" target="_blank" class="btn btn-primary font-weight-bold px-3"> &nbsp; Lihat Lokasi Kandang</a>
                    <br>
                  


                </div>
              </div>
            </a>
          </div>

        <?php } ?>




      </div>

      <br>
      <br>
      <!-- End single blog -->
      <div class="blog-pagination">

        <?php echo $this->pagination->create_links(); ?>

      </div>

    </div>
  </div><!-- End Blog Page -->

</main>
<!-- End #main -->
