<div class="content-wrapper">
	<section class="content-header">
		<h1>
			Peternak Binaan
			<small>Tambah Peternak Binaan</small>
		</h1>
	</section>

	<section class="content">

		<div class="row">
			<div class="col-lg-6">
				<a href="<?php echo base_url().'dashboard/peternak'; ?>" class="btn btn-sm btn-primary">Kembali</a>
				
				<br/>
				<br/>

				<div class="box box-primary">
					<div class="box-header">
						<h3 class="box-title">Data Peternak</h3>
					</div>
					<div class="box-body">
						
						<form method="post" action="<?php echo base_url('dashboard/peternak_aksi') ?>" enctype="multipart/form-data">
							<div class="box-body">
								<div class="form-group">
									<label>Nama</label>
									<input type="text" name="nama" class="form-control" placeholder="Masukkan nama peternak ..">
									<?php echo form_error('nama'); ?>
								</div>
								<div class="form-group">
									<label>Email</label>
									<input type="email" name="email" class="form-control" placeholder="Masukkan email peternak ..">
									<?php echo form_error('email'); ?>
								</div>
								<div class="form-group">
									<label>No.Telepon</label>
									<input type="number" name="telp" class="form-control" placeholder="Masukkan telp peternak ..">
									<?php echo form_error('telp'); ?>
								</div>
								<div class="form-group">
									<label>Jenis Ternak</label>
									<input type="text" name="alamat" class="form-control" placeholder="Masukkan jenis ternak ..">
									<?php echo form_error('alamat'); ?>
								</div>
								<div class="form-group">
									<label>Lokasi Kandang</label>
									<input type="text" name="link" class="form-control" placeholder="Masukkan link lokasi kandang ..">
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
								</div>
								<div class="form-group">
									<label>Password</label>
									<input type="password" name="password" class="form-control" placeholder="Masukkan password peternak..">
									<?php echo form_error('password'); ?>
								</div>
							</div>

							<div class="box-footer">
								<input type="submit" class="btn btn-success" value="Simpan">
							</div>
						</form>

					</div>
				</div>

			</div>
		</div>

	</section>

</div>