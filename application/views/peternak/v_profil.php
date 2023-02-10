<div class="content-wrapper">
	<section class="content-header">
		<h1>
			Profil
			<small>Update Profil Pengguna</small>
		</h1>
	</section>

	<section class="content">

		<div class="row">
			<div class="col-lg-6">
				
				<div class="box box-primary">
					<div class="box-header">
						<h3 class="box-title">Update Profil</h3>
					</div>
					<div class="box-body">

						<?php 
						if(isset($_GET['alert'])){
							if($_GET['alert'] == "sukses"){
								echo "<div class='alert alert-success'>Profil telah diupdate!</div>";
							}
						}
						?>
						
						<?php foreach($profil as $p){ ?>

							<form method="post" action="<?php echo base_url('peternak/profil_update') ?>" enctype="multipart/form-data">
								<div class="box-body">
									<div class="form-group">
										<label>Nama</label>
										<input type="hidden" name="id" value="<?php echo $p->peternak_id; ?>">
										<input type="text" name="nama" class="form-control" placeholder="Masukkan nama peternak .." value="<?php echo $p->peternak_nama; ?>">
										<?php echo form_error('nama'); ?>
									</div>
									<div class="form-group">
										<label>Email</label>
										<input type="email" name="email" class="form-control" placeholder="Masukkan email peternak .." value="<?php echo $p->peternak_email; ?>">
										<?php echo form_error('email'); ?>
									</div>
									<div class="form-group">
										<label>No.Telepon</label>
										<input type="number" name="telp" class="form-control" placeholder="Masukkan No.telepon peternak .." value="<?php echo $p->peternak_telp; ?>">
										<?php echo form_error('telp'); ?>
									</div>
									<div class="form-group">
										<label>Jenis Ternak</label>
										<input type="text" name="alamat" class="form-control" placeholder="Masukkan jenis ternak .." value="<?php echo $p->peternak_alamat; ?>">
										<?php echo form_error('alamat'); ?>
									</div>

									<div class="form-group">
										<label>Link Lokasi Kandang</label>
										<input type="text" name="link" class="form-control" placeholder="Masukkan Link gmaps .." value="<?php echo $p->peternak_link; ?>">
										<?php echo form_error('link'); ?>
									</div>

									<div class="form-group">
										<label>Foto Peternak</label>
										<input type="file" name="foto" class="form-control">

										<br/>
										<?php 
										if(isset($gambar_error)){
											echo $gambar_error;
										}
										?>
										<?php echo form_error('foto'); ?>
										<small>Kosongkan jika tidak ingin mengubah foto</small>
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
		</div>

	</section>

</div>