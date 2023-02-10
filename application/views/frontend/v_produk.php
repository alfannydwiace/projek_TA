<main id="main">

  <!-- ======= Blog Header ======= -->
  <div class="header-g bg-primary page-area">
    <div class="home-overly"></div>
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="slider-content text-center" style="padding-top: 13%;padding-bottom: 6%">
            <div class="header-bottom">
              <div class="layer2 wow zoomIn" data-wow-duration="1s" data-wow-delay=".4s">
                <h1 class="title2">Produk Peternak Binaan & Dokter Hewan</h1>
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
    <div class="container py-5">
      
      <!-- Start single blog -->
      
      <div class="row">
        <?php foreach($produk as $a){ ?>
          <div class="col-sm-4">

            <a class="text-dark" href="<?php echo base_url() ?>gambar/produk/<?php echo $a->produk_foto ?>" target="_blank">
              <div class="card">

                <img src="<?php echo base_url() ?>gambar/produk/<?php echo $a->produk_foto ?>" alt="" />

                <div class="card-body">

                  <center>
                    <br>
                    <h5 class="my-2"><b><a href="<?php echo base_url('welcome/produk_detail/'.$a->produk_id) ?>" class="text-dark"><?php echo $a->produk_nama ?></a></b></h5>

                    <b><?php echo $a->kategori_nama; ?> </b>
                    <br>
                    <b class="text-danger"><?php echo "Rp.".number_format($a->produk_harga).",-"; ?></b>
                    <br>
                    <br>
                    <a href="<?php echo base_url('welcome/produk_detail/'.$a->produk_id) ?>" class="btn btn-sm btn-primary">Lihat Detail</a>
                    
                  </center> 

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
