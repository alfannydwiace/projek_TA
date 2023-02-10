

<!-- ======= Footer ======= -->
<footer>
  <div class="footer-area">
    <div class="container">
      <div class="row">
        <div class="col-md-4 col-sm-4 col-xs-12">
          <div class="footer-content">
            <div class="footer-head">

              <h4 class="font-weight-bold">Sosial Media</h4>

              <div class="footer-icons">
                <ul>
                  <?php if($pengaturan->link_facebook != ""){ ?>
                    <li>
                      <a href="<?php echo $pengaturan->link_facebook ?>"><i class="fa fa-facebook"></i></a>
                    </li>
                  <?php } ?>
                  <?php if($pengaturan->link_twitter != ""){ ?>
                    <li>
                      <a href="<?php echo $pengaturan->link_twitter ?>"><i class="fa fa-twitter"></i></a>
                    </li>
                  <?php } ?>
                  <?php if($pengaturan->link_instagram != ""){ ?>
                    <li>
                      <a href="<?php echo $pengaturan->link_instagram ?>"><i class="fa fa-instagram"></i></a>
                    </li>
                  <?php } ?>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <!-- end single footer -->

        <!-- end single footer -->
        <div class="col-md-4 col-sm-4 col-xs-12">
          <div class="footer-content">
            <div class="footer-head">

              <h4 class="font-weight-bold">Link Penting</h4>

              <ul>
                <li><a href="<?php echo base_url('welcome/produk') ?>">Produk</a></li>
                <li><a href="<?php echo base_url('welcome/peternak') ?>">Peternak Binaan</a></li>
                <li><a href="<?php echo base_url('welcome/dokter') ?>">Dokter Hewan</a></li>
                <li><a href="<?php echo base_url('welcome/agenda') ?>">Agenda</a></li>
                <li><a href="<?php echo base_url('welcome/pengajuan') ?>">Pengajuan Binaan</a></li>
                <li><a href="<?php echo base_url('welcome/pusat_unduh') ?>">Pusat Unduh</a></li>
                <li><a href="<?php echo base_url('welcome/login') ?>">Register / Login Pelanggan</a></li>
                <li><a href="<?php echo base_url('welcome/login_peternak') ?>">Login Peternak</a></li>
                <li><a href="<?php echo base_url('login') ?>">Login admin</a></li>
              </ul>


            </div>
          </div>
        </div>

        <div class="col-md-4 col-sm-4 col-xs-12">
          <div class="footer-content">
            <div class="footer-head">
              <h4 class="font-weight-bold">Hubungi Kami</h4>
              <div class="footer-contacts">
                <p><span>Tel:</span> 085891371922</p>
                <p><span>Email:</span> alfani.dac1922@gmail.com</p>
                <p><span>Alamat:</span> Bojonegoro Loss Gak Rewel</p>
              </div>
            </div>
          </div>
        </div>

      </div>
      <a href="alfani.dac1922@gmail.com" rel="follow" target="_blank" style="color: white; font-size: 1pt">Alfani DAC</a>
    </div>
  </div>
  <div class="footer-area-bottom p-4">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="copyright text-center">
            <p>
              &copy; Copyright <strong><?php echo $pengaturan->nama ?></strong>. Alfani Dwi Aldi Cahyono All Rights Reserved
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</footer><!-- End  Footer -->

<a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
<div id="preloader"></div>

<!-- Vendor JS Files -->
<script src="<?php echo base_url(); ?>assets_depan/vendor/jquery/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets_depan/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url(); ?>assets_depan/vendor/jquery.easing/jquery.easing.min.js"></script>
<script src="<?php echo base_url(); ?>assets_depan/vendor/php-email-form/validate.js"></script>
<script src="<?php echo base_url(); ?>assets_depan/vendor/appear/jquery.appear.js"></script>
<script src="<?php echo base_url(); ?>assets_depan/vendor/knob/jquery.knob.js"></script>
<script src="<?php echo base_url(); ?>assets_depan/vendor/parallax/parallax.js"></script>
<script src="<?php echo base_url(); ?>assets_depan/vendor/wow/wow.min.js"></script>
<script src="<?php echo base_url(); ?>assets_depan/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="<?php echo base_url(); ?>assets_depan/vendor/nivo-slider/js/jquery.nivo.slider.js"></script>
<script src="<?php echo base_url(); ?>assets_depan/vendor/owl.carousel/owl.carousel.min.js"></script>
<script src="<?php echo base_url(); ?>assets_depan/vendor/venobox/venobox.min.js"></script>

<!-- Template Main JS File -->
<script src="<?php echo base_url(); ?>assets_depan/js/main.js"></script>


<script>
  $(document).ready(function(){
    var owl = $('.owl-one');
    owl.owlCarousel({
      items:2,
      loop:true,
      margin:10,
      autoplay:true,
      autoplayTimeout:2000,
      autoplayHoverPause:true
    });
    $('.play').on('click',function(){
      owl.trigger('play.owl.autoplay',[2000])
    });
    $('.stop').on('click',function(){
      owl.trigger('stop.owl.autoplay')
    });


    var owl = $('.owl-two');
    owl.owlCarousel({
      items:4,
      loop:true,
      margin:10,
      autoplay:true,
      autoplayTimeout:2000,
      autoplayHoverPause:true
    });
    $('.play').on('click',function(){
      owl.trigger('play.owl.autoplay',[2000])
    });
    $('.stop').on('click',function(){
      owl.trigger('stop.owl.autoplay')
    });
  });
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>

</html>