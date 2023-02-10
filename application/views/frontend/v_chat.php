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
                <h1 class="title2">Chat Dokter</h1>
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
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />

    <div class="container">
      <div class="row clearfix">
        <div class="col-lg-8 offset-lg-2">
          <div class="card chat-app">
            <div class="chat">
              <div class="chat-header clearfix">
                <div class="row">
                  <div class="col-lg-12">
                    <a href="javascript:void(0);" data-toggle="modal" data-target="#view_info">
                      <img src="<?php echo base_url() ?>gambar/dokter/<?php echo $dokter->dokter_foto ?>" alt="avatar">
                    </a>
                    <div class="chat-about">
                      <h6 class="mb-0 mt-1"><?php echo $dokter->dokter_nama ?></h6>
                      <small ><?php echo $dokter->dokter_deskripsi ?></small>
                    </div>
                  </div>
                </div>
              </div>

              <div class="chat-history" id="history" style="height: 500px;overflow: scroll;">
                <ul class="mb-0">
                  <?php   
                  foreach($chat as $c){ 
                    if($c->chat_pengirim_jenis=='pelanggan'){

                      ?>



                      <li class="clearfix">

                        <div class="message-data text-right">
                          <span class="message-data-time"><small class="text-muted"><?php if($c->chat_status == "0"){ echo "belum dibaca";}else{echo "dibaca";} ?> |  <?php echo date('H:i:s d-m-Y', strtotime($c->chat_waktu)) ?></small> | <?php echo $pelanggan->pelanggan_nama ?></span>
                          <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="avatar">
                        </div>
                        <div class="message other-message float-right"> <?php echo $c->chat_isi ?></div>

                      </li>

                      <?php 
                    }else{
                      ?>


                      <li class="clearfix">

                        <div class="message-data">
                          <?php if($dokter->dokter_foto == ""){ ?>
                            <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="avatar">
                          <?php }else{ ?>
                            <img src="<?php echo base_url() ?>gambar/dokter/<?php echo $dokter->dokter_foto ?>" alt="avatar">
                          <?php } ?>
                          <span class="message-data-time"><?php echo $dokter->dokter_nama ?> | <small class="text-muted"><?php echo date('H:i:s d-m-Y', strtotime($c->chat_waktu)) ?></small></span>
                        </div>
                        <div class="message my-message"> <?php echo $c->chat_isi ?></div>

                      </li>
                      <?php
                    } 
                  }
                  ?>
                  <li id="terakhir"></li>
                </ul>
              </div>

              <form method="post" action="<?php echo base_url('welcome/chat_aksi') ?>">
                <div class="chat-message clearfix">
                  <div class="input-group mb-0">
                    <div class="input-group-prepend">
                      <button type="submit"  class="input-group-text py-0"><i class="fa fa-send"></i></button>
                    </div>
                    <input type="hidden" name="penerima" value="<?php echo $dokter->dokter_id ?>">
                    <!-- <input type="hidden" name="penerima_jenis" value="dokter"> -->
                    <input type="text" name="pesan" class="form-control" placeholder="Enter text here..." autocomplete="off" required="required">                                    
                  </div>
                </div>

              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div><!-- End Blog Page -->
  
  <!-- <div class="row  g-5">
    <div class="col-md-7">
    <br>
    <form action="{{site_url('post') }}">
    <input class="form-control" id="cari" name="cari" placeholder="cari disini">
    </form>
    <br>
    
  </div> -->

  
</main>
<script type="text/javascript">
  var elem = document.getElementById('history');
  elem.scrollTop = elem.scrollHeight;
</script>

