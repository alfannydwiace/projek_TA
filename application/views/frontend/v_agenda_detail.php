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
                <h1 class="title2">Detail Agenda</h1>
              </div>
              <div class="layer3 wow zoomInUp" data-wow-duration="2s" data-wow-delay="1s">
                <!-- <h2 class="title3">Semua Artikel Website</h2> -->
                <ol class="breadcrumb d-flex justify-content-center" style="background: transparent;">
                  <li class="breadcrumb-item">
                    <a class="text-white" href="<?php echo base_url(); ?>">Home</a>
                  </li>
                  <li class="breadcrumb-item">
                    <a class="text-white" href="<?php echo base_url('agenda'); ?>">Agenda</a>
                  </li>
                  <li class="breadcrumb-item active text-white font-weight-bold">Detail</li>
                </ol>
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

          <?php if(count($agenda) == 0){ ?>
            <center>
              <h3 class="mt-5">Belum Ada Agenda.</h3>
            </center>
          <?php } ?>

          <div class="row">

            <?php foreach($agenda as $a){ ?>

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="single-blog border-bottom pb-4">
                  <div class="single-blog-img">
                   <?php if($a->agenda_foto != ""){ ?>
                    <a href="<?php echo base_url()."agenda_detail/".$a->agenda_id ?>"><img src="<?php echo base_url(); ?>gambar/agenda/<?php echo $a->agenda_foto ?>" alt="<?php echo $a->agenda_nama ?>" class="img-luid" style="width: 100%;height: 400px"></a>
                  <?php } ?>
                </div>
                <div class="blog-meta">

                  <span class="comments-type">
                    <i class="fa fa-map-pin"></i>
                    Tempat : <a href="#"><?php echo $a->agenda_tempat ?></a>
                  </span>
                  |
                  <span class="date-type">
                    <i class="fa fa-calendar"></i>
                    Tanggal : <a href="#"><?php echo date('d-m-Y', strtotime($a->agenda_tanggal)) ?></a>
                  </span>
                </div>
                <div class="blog-text text-center">
                  <h4>
                    <a href="<?php echo base_url()."agenda_detail/".$a->agenda_id ?>"><?php echo $a->agenda_nama ?></a>
                  </h4>
                </div>

                <?php echo $a->agenda_deskripsi ?>

                <br>
                <hr>
                <span>
                  <a href="<?php echo base_url("agenda") ?>" class="ready-btn btn-block">Agenda Lainnya</a>
                </span>

              </div>
            </div>
            

          <?php } ?>

          
        </div>
      </div>
    </div>
  </div>
</div><!-- End Blog Page -->

</main>
<!-- End #main -->
