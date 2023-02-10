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
      <div class="row justify-content-center">

        <!-- Start single blog -->
        

        <?php foreach($dokter as $a){ ?>
          <div class="col-md-2 col-sm-12 col-xs-12">

            <a class="text-dark" href="<?php echo base_url() ?>gambar/dokter/<?php echo $a->dokter_foto ?>" target="_blank">
              <div class="card">

                <img src="<?php echo base_url() ?>gambar/dokter/<?php echo $a->dokter_foto ?>" alt="" />

                <div class="card-body p-2">

                  <center>
                    <b><?php echo $a->dokter_nama ?></b>

                    <br>
                    <br>
                    <div class="row">
                    <div class="col-md-2 offset-md-2">
                    <a href="<?php echo base_url('welcome/fitur_chat/'.$a->dokter_id) ?>"  class="btn btn-sm btn-primary " ><i class="bi bi-chat-square-fill"></i></a>
                    </div>
                    <div class="col-md-2 offset-md-2">
                    <a href="<?php echo base_url('welcome/dokter_detail/'.$a->dokter_id) ?>" class="btn btn-sm btn-primary "><i class="bi bi-info-square-fill"></i></a>
                    
                    </div>
                 
                  </center> 


                </div>
              </div>
            </a>
          </div>

        <?php } ?>

      </div>
      <br>
      <br>
      <div class="row justify-content-center">
        <div class="col-md-5">

         <form action="<?= base_url('welcome/dokter')?>" method="post">
            <div class="input-group mb-3">
              <input type="text" class="form-control" placeholder="Search Pesan..." name="keyword" autocomplete="off" autofocus>
              <input class="btn btn-outline-secondary" type="submit" name="submit">
            </div>
          </div>
          </form>

          <table class="table">
  <thead>
    <tr>
      <th scope="col">Pencarian/topik terkini</th>
    </tr>
  </thead>
  <tbody>
    
    <?php
    foreach($chat as $u){
									?>
									<tr>
                    <td><h5><b><?php echo $u->nama ?></b></h5>
                      <small><?php echo $u->chat_waktu ?></small><br>
                      <?php echo $u->chat_isi ?></td>
               
                    
    </tr>
<?php } ?>
  </tbody>
</table>

        </div>
      </div>
      <!-- End single blog -->
      <div class="blog-pagination">

        <?php echo $this->pagination->create_links(); ?>

      </div>
    </div>
  </div><!-- End Blog Page -->

</main>
<!-- End #main -->


<!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
    
    </div>
  </div>
</div>

