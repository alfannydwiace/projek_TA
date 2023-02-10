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
                <h1 class="title2">Pengajuan Binaan</h1>
              </div>
              <div class="layer3 wow zoomInUp" data-wow-duration="2s" data-wow-delay="1s">
                <ol class="breadcrumb d-flex justify-content-center" style="background: transparent;">
                  <li class="breadcrumb-item">
                    <a class="text-white" href="<?php echo base_url(); ?>">Home</a>
                  </li>
                  <li class="breadcrumb-item">
                    <a class="text-white" href="<?php echo base_url('blog'); ?>">Pengajuan Binaan</a>
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
          if($_GET['alert']=="sukses"){
            echo "<div class='alert alert-success font-weight-bold text-center'>Pengajuan telah dikirim.<br> Silahkan tunggu verifikasi dari admin.</div>";
          }
        } 
        ?>


        <form method="post" action="<?php echo base_url('welcome/pengajuan_act') ?>" enctype="multipart/form-data">
          <div class="form-group">
            <label class="font-weight-bold">Nama Lengkap</label>
            <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama ..">
            <?php echo form_error('nama'); ?>
          </div>

          <div class="form-group">
            <label class="font-weight-bold">Email</label>
            <input type="email" name="email" class="form-control" placeholder="Masukkan Email ..">
            <?php echo form_error('email'); ?>
          </div>
          <div class="form-group">
            <label class="font-weight-bold">No Telepon</label>
            <input type="number" name="telp" class="form-control" placeholder="Masukkan No. Telepon ..">
            <?php echo form_error('telp'); ?>
          </div>
          <div class="form-group">
            <label class="font-weight-bold">Jenis Ternak</label>
            <input type="text" name="produk" class="form-control" placeholder="Masukkan Nama Produk ..">
            <?php echo form_error('produk'); ?>
          </div>

          <div class="form-group">
            <label class="font-weight-bold">Pilih Tanggal uji Pantau Lokasi</label>
            <input type="date" name="lab" class="form-control" placeholder="Masukkan Tgl. Uji Lab ..">
            <?php echo form_error('lab'); ?>
          </div>

          <div class="form-group">
            <label class="font-weight-bold">Upload Proposal</label>
            <input type="file" name="proposal" class="form-control" placeholder="Masukkan proposal ..">
            <br/>
            <?php 
            if(isset($file_error)){
              echo $file_error;
            }
            ?>
            <?php echo form_error('proposal'); ?>
          </div>

          <div class="form-group">
            <input type="submit" name="" class="btn btn-success btn-block" value="DAFTAR">
          </div>

        </form>

      </div>



      <!-- Start single blog -->
      <div class="col-md-3 col-sm-12 col-xs-12">

        <h4>Tata cara pengajuan</h4>

        <ol>
          <li>Membuat proposal pengajuan (contoh proposalnya ada di pusat unduh).</li>
          <li>Mengisi form pengajuan.</li>
          <li>Admin akan menghubungi anda kembali.</li>
    
        </ol>

      </div>
<div class="form-group">
      <!-- Button trigger modal -->
<a href="<?php echo base_url('welcome/pengajuan_s') ?>" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Cek Status Pengajuan
          </a>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Status Pengajuan Proposal Pelanggan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <table class="table">
  <thead>
    <tr>
      <th scope="col">Tanggal</th>
      <th scope="col">Nama</th>
      <th scope="col">Email</th>
      <th scope="col">Telepon</th>
      <th scope="col">Tipe Ternak</th>
      <th scope="col">Tanggal Uji</th>
      <th scope="col">File Proposal</th>
      <th scope="col">Status</th>
      <th scope="col">Keterangan</th>
    </tr>
  </thead>
  <tbody>
    
    <?php
    foreach($pengajuan as $u){
									?>
									<tr>
										<td><?php echo date('d-m-Y', strtotime($u->pengajuan_tgl)) ?></td>
										<td><?php echo $u->pengajuan_nama ?></td>
										<td><?php echo $u->pengajuan_email ?></td>
										<td><?php echo $u->pengajuan_telp ?></td>
										<td><?php echo $u->pengajuan_produk ?></td>
										<td><?php echo date('d-m-Y', strtotime($u->pengajuan_lab)) ?></td>		
                    <td>
											<a target="_blank" href="<?php echo base_url() ?>pengajuan/<?php echo $u->pengajuan_proposal; ?>"> <i class="fa fa-download"></i> Lihat / Unduh</a>
										</td>
                    <td><?php echo $u->pengajuan_status ?></td>
                    <td><?php echo $u->pengajuan_ket ?></td>
    </tr>
<?php } ?>
  </tbody>
</table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

    </div>
  </div>
</div><!-- End Blog Page -->


</main>
<!-- End #main -->

<!-- Button trigger modal -->

