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

							<form method="post" action="<?php echo base_url('dokter/profil_update') ?>" enctype="multipart/form-data">
								<div class="box-body">
									<div class="form-group">
										<label>Nama</label>
										<input type="hidden" name="id" value="<?php echo $p->dokter_id; ?>">
										<input type="text" name="nama" class="form-control" placeholder="Masukkan nama dokter .." value="<?php echo $p->dokter_nama; ?>">
										<?php echo form_error('nama'); ?>
									</div>
									<div class="form-group">
										<label>Email</label>
										<input type="email" name="email" class="form-control" placeholder="Masukkan email dokter .." value="<?php echo $p->dokter_email; ?>">
										<?php echo form_error('email'); ?>
									</div>
									<div class="form-group">
										<label>No.Telepon</label>
										<input type="number" name="telp" class="form-control" placeholder="Masukkan No.telepon dokter .." value="<?php echo $p->dokter_telp; ?>">
										<?php echo form_error('telp'); ?>
									</div>
									<div class="form-group">
										<label>Alamat</label>
										<input type="text" name="alamat" class="form-control" placeholder="Masukkan alamat dokter .." value="<?php echo $p->dokter_alamat; ?>">
										<?php echo form_error('alamat'); ?>
									</div>

									<div class="form-group">
										<label>Foto Dokter</label>
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