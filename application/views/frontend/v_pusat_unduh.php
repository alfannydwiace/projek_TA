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
                <h1 class="title2">Pusat Unduh</h1>
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
      <div class="row">


        <!-- Start single blog -->
        <div class="col-md-8 col-sm-12 col-xs-12 offset-md-2">

          <?php if(count($unduh) == 0){ ?>
            <center>
              <h3 class="mt-5">Belum Ada File.</h3>
            </center>
          <?php } ?>

          <ul class="list-group">
           <?php foreach($unduh as $u){ ?>
            <li class="list-group-item">
              <i class="fa fa-file"></i> &nbsp; <?php echo $u->unduh_nama ?>
              <br>
              &nbsp; &nbsp; &nbsp;
              <!-- <a target="_blank" href="<?php echo base_url('unduh/'.$u->unduh_link) ?>">Lihat</a> -->
              <!-- | -->
              <a target="_blank" href="<?php echo base_url('unduh/'.$u->unduh_link) ?>">Lihat / Unduh File</a>
            </li>
           <?php } ?>
         </ul>

         <br>
         <br>
         <br>
         <br>


       </div>
     </div>
   </div>
 </div><!-- End Blog Page -->

</main>
<!-- End #main -->
