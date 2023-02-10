<main id="main">

  <!-- ======= Blog Header ======= -->
  <div class="header-b bg-primary page-area">
    <div class="home-overly"></div>
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="slider-content text-center" style="padding-top: 12%;padding-bottom: 3%">
            <div class="header-bottom">
              <div class="layer2 wow zoomIn" data-wow-duration="1s" data-wow-delay=".4s">
                <h1 class="title2">Login</h1>
              </div>
              <div class="layer3 wow zoomInUp" data-wow-duration="2s" data-wow-delay="1s">
                <ol class="breadcrumb d-flex justify-content-center" style="background: transparent;">
                  <li class="breadcrumb-item">
                    <a class="text-white" href="<?php echo base_url(); ?>">Home</a>
                  </li>
                  <li class="breadcrumb-item">
                    <a class="text-white" href="<?php echo base_url('blog'); ?>">Login Pelanggan</a>
                  </li>
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
      <div class="row justify-content-center">

       <!-- Start single blog -->
       <div class="col-md-5 col-sm-12 col-xs-12">
        <?php 
        if(isset($_GET['alert'])){
          if($_GET['alert']=="gagal"){
            echo "<div class='alert alert-danger font-weight-bold text-center'>Maaf! Username & Password Salah.</div>";
          }else if($_GET['alert']=="belum_login"){
            echo "<div class='alert alert-danger font-weight-bold text-center'>Anda Harus Login Terlebih Dulu!</div>";
          }else if($_GET['alert']=="logout"){
            echo "<div class='alert alert-success font-weight-bold text-center'>Anda Telah Logout!</div>";
          }else if($_GET['alert']=="registrasi"){
            echo "<div class='alert alert-success font-weight-bold text-center'>Registrasi Berhasil. Silahkan login!</div>";
          }
        } 
        ?>

        <form method="post" action="<?php echo base_url('welcome/login_act') ?>">
          <div class="form-group">
            <label class="font-weight-bold">Email</label>
            <input type="email" name="email" class="form-control" placeholder="Masukkan Email ..">
            <?php echo form_error('email'); ?>
          </div>
          <div class="form-group">
            <label class="font-weight-bold">Password</label>
            <input type="password" name="password" class="form-control" placeholder="Masukkan Password ..">
            <?php echo form_error('password'); ?>
          </div>

          <div class="form-group">
            <input type="submit" name="" class="btn btn-success btn-block" value="LOGIN">
          </div>

          <center>
            <p>Belum punya akun? <a href="<?php echo base_url('welcome/registrasi') ?>">Registrasi</a></p>
          </center>
        </form>

      </div>

    </div>
  </div>
</div><!-- End Blog Page -->

</main>
<!-- End #main -->
