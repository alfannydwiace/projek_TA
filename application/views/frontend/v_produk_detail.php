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
                <h1 class="title2">Produk Peternak Binaan</h1>
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
      <a href="<?php echo base_url('welcome/produk') ?>" class="btn btn-sm btn-primary">Kembali</a>
      <br>
      <br>

      <div class="row justify-content-center">

        <!-- Start single blog -->

        <?php foreach($produk as $a){ ?>
          <div class="col-md-5 col-sm-12 col-xs-12">

            <a class="text-dark" href="<?php echo base_url() ?>gambar/produk/<?php echo $a->produk_foto ?>" target="_blank">
              <div class="card">

                <img src="<?php echo base_url() ?>gambar/produk/<?php echo $a->produk_foto ?>" alt="" />

              </div>
            </a>
          </div>

          <div class="col-md-7 col-sm-12 col-xs-12">

            <a class="text-dark" href="<?php echo base_url() ?>gambar/produk/<?php echo $a->produk_foto ?>" target="_blank">
              <div class="card">

                <div class="card-body">

                 <h2 class="my-2"><b><a href="<?php echo base_url('welcome/produk_detail/'.$a->produk_id) ?>" class="text-dark"><?php echo $a->produk_nama ?></a></b></h2>

                 <b><?php echo $a->kategori_nama; ?></b>
                 <br>
                 <br>
                 <h3 class="text-danger"><?php echo "Rp.".number_format($a->produk_harga).",-"; ?></h3>
                 <br>
                 <a href="<?php echo $a->produk_link ?>" target="_blank" class="btn btn-primary font-weight-bold px-3"><i class="fa fa-shopping-cart"></i> &nbsp; BELI PRODUK INI</a>
                 <br>
                 <hr>
                 <h5><b>Deskripsi</b></h5>
                 <?php echo $a->produk_deskripsi ?>

               </div>
             </div>
           </a>
         </div>

       <?php } ?>

     </div>
     <br>

   </div>
 </div><!-- End Blog Page -->

</main>
<!-- End #main -->
