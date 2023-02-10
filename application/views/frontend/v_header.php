<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dinas Peternakan dan Perikanan KAB. Bojonegoro</title>
  
  <meta content="<?php echo $meta_keyword ?>" name="keywords">
  <meta content="<?php echo $meta_description ?>" name="description">

  <!-- Favicons -->
  <link href="<?php echo base_url().'/gambar/website/'.$pengaturan->logo; ?>" rel="icon">
  <link href="<?php echo base_url(); ?>assets_frontend/img/apple-touch-icon.png" rel="apple-touch-icon">
  <link href="	https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css"
  
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,400i,600,700|Raleway:300,400,400i,500,500i,700,800,900" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
  <!-- Vendor CSS Files -->
  <link href="<?php echo base_url();  ?>assets_depan/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url();  ?>assets_depan/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="<?php echo base_url();  ?>assets_depan/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="<?php echo base_url();  ?>assets_depan/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="<?php echo base_url();  ?>assets_depan/vendor/nivo-slider/css/nivo-slider.css" rel="stylesheet">
  <link href="<?php echo base_url();  ?>assets_depan/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="<?php echo base_url();  ?>assets_depan/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="<?php echo base_url();  ?>assets/css/style.css" rel="stylesheet">


  <!-- <link href="<?php echo base_url();  ?>assets/style.css" rel="stylesheet"> -->

  <!-- Template Main CSS File -->
  <link href="<?php echo base_url();  ?>assets_depan/css/style.css" rel="stylesheet">


  <?php 
  // data pengaturan website
  $warna = $this->m_data->get_data('warna')->row();
  ?>
  <style type="text/css">
    #header .nav-menu .nav-link{
      color: <?php echo $warna->warna_header_text; ?>;
      font-weight: 600;
    }

    .footer-area{
      background: <?php echo $warna->warna_footer1 ?>;
      color: <?php echo $warna->warna_footer_text ?>;
    }

    .footer-area-bottom{lihat website
      background: <?php echo $warna->warna_footer2 ?>;
      color: <?php echo $warna->warna_footer_text ?>;
    }

    .footer-area-bottom a,
    .footer-area-bottom p,
    .footer-area-bottom,
    .footer-icons ul li a,
    .footer-area p span,
    .footer-area th,
    .footer-area td,
    .footer-area i,
    .footer-area p,
    .footer-area li,
    .footer-area h4
    {
      border-color: <?php echo $warna->warna_footer_text ?>;
      color: <?php echo $warna->warna_footer_text ?>;
    }

    .back-to-top{
      z-index: 999;
    }

  </style>
</head>

<body data-spy="scroll" data-target="#navbar-example">

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top" style="background: <?php echo $warna->warna_header ?>">
    <div class="container d-flex">

      <div class="logo mr-auto">
        <!-- <img src="<?php echo base_url().'/gambar/website/bestakhlak_LOGO.png' ?>" height="100%"> -->


        <!-- <a class="navbar-brand js-scroll" href="<?php echo base_url(); ?>"><?php echo $pengaturan->nama ?> </a> -->


        <!-- <h1 class="text-light"><a href="<?php echo base_url(); ?>"><?php echo $pengaturan->nama ?></a></h1> -->
        <!-- Uncomment below if you prefer to use an image logo -->
        <a href="<?php echo base_url() ?>"><img src="<?php echo base_url('gambar/website/'.$pengaturan->logo);  ?>" alt="<?php echo $pengaturan->nama ?>" class="img-fluid"></a>
      </div>

      <nav class="nav-menu d-none d-lg-block">

        <?php
          // menu();
        ?>

        <ul>
          <li class="">
            <a class="nav-link js-scroll" href="<?php echo base_url('') ?>">HOME</a>
          </li>

          <li class="">
            <a class="nav-link js-scroll" href="<?php echo base_url('welcome/produk') ?>">PRODUK</a>
          </li>

          <li class="drop-down">
            <a class="nav-link js-scroll" href="#">INFORMASI</a>
            <ul>
              <li class=""><a href="<?php echo base_url('welcome/peternak') ?>">PETERNAK BINAAN</a></li>
              <li class=""><a href="<?php echo base_url('welcome/dokter') ?>">DOKTER HEWAN</a></li>
              <li class=""><a href="<?php echo base_url('welcome/agenda') ?>">AGENDA</a></li>
            </ul>
          </li>

          <li class="drop-down">
            <a class="nav-link js-scroll" href="#">LAYANAN</a>
            <ul>
              <li class=""><a href="<?php echo base_url('welcome/pengajuan') ?>">PENGAJUAN BINAAN</a></li>
            </ul>
          </li>

          <li class="">
            <a class="nav-link js-scroll" href="<?php echo base_url('pusat_unduh') ?>">PUSAT UNDUH</a>
          </li>

          <?php 
          if($this->session->userdata('status') == "pelanggan_login"){ 
            $id = $this->session->userdata('id');
            $pelanggan = $this->db->query("select * from pelanggan where pelanggan_id='$id'")->row();
            ?>
            <li class="drop-down">
              <a class="nav-link js-scroll" href="#">Halo, <?php echo $pelanggan->pelanggan_nama ?></a>
              <ul>
                <li class=""><a href="<?php echo base_url('welcome/logout') ?>">LOGOUT</a></li>
              </ul>
            </li>
            <?php 
          }else{ 
            ?>
            <li class="drop-down">
              <a class="nav-link js-scroll" href="#">REGISTER / LOGIN</a>
              <ul>
                <li class=""><a href="<?php echo base_url('login') ?>">LOGIN ADMIN</a></li>
                <li class=""><a href="<?php echo base_url('welcome/login_peternak') ?>">LOGIN PETERNAK BINAAN</a></li>
                <li class=""><a href="<?php echo base_url('welcome/login_dokter') ?>">LOGIN DOKTER</a></li>
                <li class=""><a href="<?php echo base_url('welcome/login') ?>">LOGIN PELANGGAN</a></li>
                <li class=""><a href="<?php echo base_url('welcome/registrasi') ?>">REGISTER PELANGGAN</a></li>
              </ul>
            </li>
            <?php 
          } 
          ?>

        </ul>

      </nav><!-- .nav-menu -->

    </div>
  </header><!-- End Header -->

