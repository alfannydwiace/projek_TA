 <!--<main id="main">

  <!-- ======= Blog Header ======= -->
  <!-- <div class="header-b bg-primary page-area">
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
  <!-- <div class="blog-page area-padding">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />

<div class="container">
  <div class="row clearfix">
      <div class="col-lg-12">
          <div class="card chat-app">
              <div class="chat">
                  <div class="chat-header clearfix">
                      <div class="row">
                        <?php foreach($dokter as $a){ ?>
                          <div class="col-lg-12">
                              <a href="javascript:void(0);" data-toggle="modal" data-target="#view_info">
                                  <img src="<?php echo base_url() ?>gambar/dokter/<?php echo $a->dokter_foto ?>" alt="avatar">
                              </a>
                              <div class="chat-about">
                                  <h6 class="m-b-0"><?php echo $a->dokter_nama ?></h6>
                                  <small ><?php echo $a->dokter_deskripsi ?></small>
                              </div>
                          </div>
                        <?php } ?>
                      </div>
                  </div>
                  <div class="chat-history">
                      <ul class="m-b-0">
                          <li class="clearfix">
                              <div class="message-data text-right">
                                  <span class="message-data-time">10:10 AM, Today</span>
                                  <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="avatar">
                              </div>
                              <div class="message other-message float-right"> Hi Aiden, how are you? How is the project coming along? </div>
                          </li>
                          <li class="clearfix">
                              <div class="message-data">
                                  <span class="message-data-time">10:12 AM, Today</span>
                              </div>
                              <div class="message my-message">Are we meeting today?</div>                                    
                          </li>                               
                          <li class="clearfix">
                              <div class="message-data">
                                  <span class="message-data-time">10:15 AM, Today</span>
                              </div>
                              <div class="message my-message">Project has been already finished and I have results to show you.</div>
                          </li>
                      </ul>
                  </div>
                  <div class="chat-message clearfix">
                      <div class="input-group mb-0">
                          <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fa fa-send"></i></span>
                          </div>
                          <input type="text" class="form-control" placeholder="Enter text here...">                                    
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>
  </div><!-- End Blog Page -->

</main>
<!-- End #main -->