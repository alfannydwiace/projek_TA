<div class="content-wrapper">
	<section class="content-header">
		<h1>
			Pelanggan
			<small>Tambah Pelanggan</small>
		</h1>
	</section>

	<section class="content">

		<div class="row">
			<div class="col-lg-6">
				<a href="<?php echo base_url().'dashboard/pelanggan'; ?>" class="btn btn-sm btn-primary">Kembali</a>
				
				<br/>
				<br/>

				<div class="box box-primary">
					<div class="box-header">
						<h3 class="box-title">Data Pelanggan</h3>
					</div>
					<div class="box-body">
						
						<form method="post" action="<?php echo base_url('dashboard/pelanggan_aksi') ?>">
							<div class="box-body">
								<div class="form-group">
									<label>Nama</label>
									<input type="text" name="nama" class="form-control" placeholder="Masukkan nama pelanggan ..">
									<?php echo form_error('nama'); ?>
								</div>
								<div class="form-group">
									<label>Email</label>
									<input type="email" name="email" class="form-control" placeholder="Masukkan email pelanggan ..">
									<?php echo form_error('email'); ?>
								</div>
								<div class="form-group">
									<label>No.Telepon</label>
									<input type="number" name="telp" class="form-control" placeholder="Masukkan telp pelanggan ..">
									<?php echo form_error('telp'); ?>
								</div>
								<div class="form-group">
									<label>Pekerjaan</label>
									<input type="text" name="pekerjaan" class="form-control" placeholder="Masukkan pekerjaan pelanggan..">
									<?php echo form_error('pekerjaan'); ?>
								</div>
								<div class="form-group">
									<label>Password</label>
									<input type="password" name="password" class="form-control" placeholder="Masukkan password pelanggan..">
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