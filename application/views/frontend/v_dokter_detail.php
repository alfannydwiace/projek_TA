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
                <h1 class="title2">Dokter Hewan</h1>
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
      <?php foreach($dokter as $a){ ?>
        <div class="row justify-content-center">

          <div class="col-md-10 col-sm-12 col-xs-12">

            <a href="<?php echo base_url('welcome/dokter') ?>" class="btn btn-sm btn-primary">KEMBALI</a>
            <br>
            <br>

            <a class="text-dark" href="<?php echo base_url() ?>gambar/dokter/<?php echo $a->dokter_foto ?>" target="_blank">
              <div class="card">

                <div class="card-body p-2">

                  <div class="row">
                    <div class="col-lg-4">
                     <img src="<?php echo base_url() ?>gambar/dokter/<?php echo $a->dokter_foto ?>" alt="" />
                   </div>
                   <div class="col-lg-8">
                      
                      <b>Nama : </b> <?php echo $a->dokter_nama ?>
                      <br>
                      <b>Deskripsi : </b> <br> <?php echo $a->dokter_deskripsi ?>

                  </div>
                </div>


              </div>
            </div>
          </a>
        </div>

      </div>
    <?php } ?>
  </div>
</div><!-- End Blog Page -->

</main>
<!-- End #main -->
