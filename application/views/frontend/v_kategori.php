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
                <h1 class="title2">Kategori</h1>
              </div>
              <div class="layer3 wow zoomInUp" data-wow-duration="2s" data-wow-delay="1s">
                <!-- <h2 class="title3">Semua Artikel Website</h2> -->
                <ol class="breadcrumb d-flex justify-content-center" style="background: transparent;">
                  <li class="breadcrumb-item">
                    <a class="text-white" href="<?php echo base_url(); ?>">Home</a>
                  </li>
                  <li class="breadcrumb-item">
                    <a class="text-white" href="<?php echo base_url('blog'); ?>">Blog</a>
                  </li>
                  <li class="breadcrumb-item">
                    <a class="text-white" href="<?php echo base_url('blog'); ?>">Kategori</a>
                  </li>
                  <li class="breadcrumb-item active text-white font-weight-bold"><?php echo strip_tags($this->uri->segment('2')) ?></li>
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
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
         <?php $this->load->view('frontend/v_sidebar'); ?>
       </div>
       <!-- End left sidebar -->


       <!-- Start single blog -->
       <div class="col-md-8 col-sm-8 col-xs-12">

         <?php if(count($artikel) == 0){ ?>
          <center>
            <h3 class="mt-5">Belum Ada Artikel Pada Kategori Ini.</h3>
          </center>
        <?php } ?>

        <div class="row">

          
          <?php foreach($artikel as $a){ ?>

            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="single-blog">
                <div class="single-blog-img">
                  <a href="blog-details.html">
                   <?php if($a->artikel_sampul != ""){ ?>
                     <img src="<?php echo base_url(); ?>gambar/artikel/<?php echo $a->artikel_sampul ?>" alt="<?php echo $a->artikel_judul ?>">
                   <?php } ?>
                 </a>
               </div>
               <div class="blog-meta">

                 <span class="comments-type">
                  <i class="fa fa-user-o"></i>
                  <a href="#"><?php echo $a->pengguna_nama ?></a>
                </span>
                |
                <span class="comments-type">
                  <i class="fa fa-comment-o"></i>
                  <a href="#"><?php echo $a->kategori_nama ?></a>
                </span>
                |
                <span class="date-type">
                  <i class="fa fa-calendar"></i><?php echo date('d-m-Y', strtotime($a->artikel_tanggal)) ?>
                </span>
                |
                <span class="date-type">
                  <i class="fa fa-eye"></i><?php echo $a->artikel_dilihat ?>
                </span>
              </div>
              <div class="blog-text">
                <h4>
                  <a href="<?php echo base_url().$a->artikel_slug ?>"><?php echo $a->artikel_judul ?></a>
                </h4>

                <?php echo strip_tags(substr($a->artikel_konten, 0,200)) ?> ..

              </div>
              <span>
                <a href="<?php echo base_url().$a->artikel_slug ?>" class="ready-btn">Read more</a>
              </span>
            </div>
          </div>

        <?php } ?>

        <!-- End single blog -->
        <div class="blog-pagination">

         <?php echo $this->pagination->create_links(); ?>

       </div>
     </div>
   </div>
 </div>
</div>
</div><!-- End Blog Page -->

</main>
<!-- End #main -->
