<div class="content-wrapper">
	<section class="content-header">
		<h1>
			Pengaturan Halaman Depan
			<small>Update Pengaturan Profil</small>
		</h1>
	</section>

	<section class="content">

		<div class="row">
			<div class="col-lg-6">
				
				<div class="box box-primary">
					<div class="box-header">
						<h3 class="box-title">Pengaturan Halaman Depan</h3>
					</div>
					<div class="box-body">

						<?php 
						if(isset($_GET['alert'])){
							if($_GET['alert'] == "sukses"){
								echo "<div class='alert alert-success'>Pengaturan telah diupdate!</div>";
							}
						}
						?>
						
						<?php foreach($pengaturan as $p){ ?>

							<form method="post" action="<?php echo base_url('dashboard/pengaturan_update') ?>" enctype="multipart/form-data">
								<div class="box-body">
									<div class="form-group">
										<label>Nama Website</label>
										<input type="text" name="nama" class="form-control" placeholder="Masukkan nama website.." value="<?php echo $p->nama; ?>">
										<?php echo form_error('nama'); ?>
									</div>

									<div class="form-group">
										<label>Deskripsi Website</label>
										<input type="text" name="deskripsi" class="form-control" placeholder="Masukkan deskripsi .." value="<?php echo $p->deskripsi; ?>">
										<?php echo form_error('deskripsi'); ?>
									</div>

									<hr>

									<div class="form-group">
										<label>Logo Website</label>
										<input type="file" name="logo">
										<small>Kosongkan jika tidak ingin mengubah logo</small>
									</div>

									<hr>

									<div class="form-group">
										<label>Link Facebook</label>
										<input type="text" name="link_facebook" class="form-control" placeholder="Masukkan link facebook .." value="<?php echo $p->link_facebook; ?>">
										<?php echo form_error('link_facebook'); ?>
									</div>

									<div class="form-group">
										<label>Link Twitter</label>
										<input type="text" name="link_twitter" class="form-control" placeholder="Masukkan link_twitter .." value="<?php echo $p->link_twitter; ?>">
										<?php echo form_error('link_twitter'); ?>
									</div>

									<div class="form-group">
										<label>Link Instagram</label>
										<input type="text" name="link_instagram" class="form-control" placeholder="Masukkan link_instagram .." value="<?php echo $p->link_instagram; ?>">
										<?php echo form_error('link_instagram'); ?>
									</div>
								</div>

								<div class="box-footer">
									<input type="submit" class="btn btn-success" value="Simpan">
								</div>
							</form>

						<?php } ?>

					</div>
				</div>

			</div>


			<div class="col-md-6">
				<div class="box box-primary">
					<div class="box-header">
						<h3 class="box-title">Pengaturan Warna Header & Footer</h3>
					</div>
					<div class="box-body">

						<?php 
						if(isset($_GET['alert2'])){
							if($_GET['alert2'] == "sukses"){
								echo "<div class='alert alert-success'>Pengaturan warna telah diupdate!</div>";
							}
						}
						?>
						
						<?php foreach($warna as $p){ ?>

							<form method="post" action="<?php echo base_url('dashboard/pengaturan_warna_update') ?>" enctype="multipart/form-data">
								<div class="box-body">

									<div class="form-group">
										<label>Warna Menu Header</label>
										<input type="color" id="warna_header" name="warna_header" class="form-control" value="<?php echo $p->warna_header; ?>">
										<?php echo form_error('warna_header'); ?>
									</div>

									<div class="form-group">
										<label>Warna Text Menu Header</label>
										<input type="color" id="warna_header_text" name="warna_header_text" class="form-control" value="<?php echo $p->warna_header_text; ?>">
										<?php echo form_error('warna_header_text'); ?>
									</div>

									<hr>

									<div class="form-group">
										<label>Warna Footer 1</label>
										<input type="color" id="warna_footer1" name="warna_footer1" class="form-control" value="<?php echo $p->warna_footer1; ?>">
										<?php echo form_error('warna_footer1'); ?>
									</div>

									<div class="form-group">
										<label>Warna Footer 2</label>
										<input type="color" id="warna_footer2" name="warna_footer2" class="form-control" value="<?php echo $p->warna_footer2; ?>">
										<?php echo form_error('warna_footer2'); ?>
									</div>

									<div class="form-group">
										<label>Warna Text Footer</label>
										<input type="color" id="warna_footer_text" name="warna_footer_text" class="form-control" value="<?php echo $p->warna_footer_text; ?>">
										<?php echo form_error('warna_footer_text'); ?>
									</div>
		
								</div>

								<div class="box-footer">
									<input type="submit" class="btn btn-success mr-3" value="Simpan">

									<span class="btn btn-primary" id="ubah_default">Ubah Default</span>

								</div>
							</form>

						<?php } ?>

					</div>
				</div>
			</div>


		</div>

	</section>

</div>

