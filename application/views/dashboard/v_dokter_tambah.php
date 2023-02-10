<div class="content-wrapper">
	<section class="content-header">
		<h1>
			Dokter Hewan
			<small>Data Dokter Hewan</small>
		</h1>
	</section>

	<section class="content">

		<div class="row">
			<div class="col-lg-6">
				<a href="<?php echo base_url().'dashboard/dokter'; ?>" class="btn btn-sm btn-primary">Kembali</a>
				
				<br/>
				<br/>

				<div class="box box-primary">
					<div class="box-header">
						<h3 class="box-title">Tambah dokter</h3>
					</div>
					<div class="box-body">
						
						
						<form method="post" action="<?php echo base_url('dashboard/dokter_aksi') ?>" enctype="multipart/form-data">
							<div class="box-body">
								<div class="form-group">
									<label>Nama dokter</label>
									<input type="text" name="nama" class="form-control" placeholder="Masukkan nama ..">
									<?php echo form_error('nama'); ?>
								</div>
								<div class="form-group">
									<label>Email</label>
									<input type="email" name="email" class="form-control" placeholder="Masukkan email dokter ..">
									<?php echo form_error('email'); ?>
								</div>
								<div class="form-group">
									<label>No.Telepon</label>
									<input type="number" name="telp" class="form-control" placeholder="Masukkan telp dokter ..">
									<?php echo form_error('telp'); ?>
								</div>
								<div class="form-group">
									<label>Alamat</label>
									<input type="text" name="alamat" class="form-control" placeholder="Masukkan alamat dokter ..">
									<?php echo form_error('alamat'); ?>
								</div>
								<div class="form-group">
									<label>Deskripsi</label>
									<textarea name="deskripsi" class="form-control" placeholder="Masukkan deskripsi dokter .."></textarea>
									<?php echo form_error('deskripsi'); ?>
								</div>
								
								<div class="form-group">
									<label>Upload Foto</label>

									<input type="file" name="foto">

									<br/>
									<?php 
									if(isset($gambar_error)){
										echo $gambar_error;
									}
									?>
									<?php echo form_error('foto'); ?>
								</div>
							</div>
							<div class="form-group">
									<label>Password</label>
									<input type="password" name="password" class="form-control" placeholder="Masukkan password dokter..">
									<?php echo form_error('password'); ?>
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