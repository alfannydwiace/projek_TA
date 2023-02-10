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
						<h3 class="box-title">Pelanggan</h3>
					</div>
					<div class="box-body">
						
						<?php foreach($pelanggan as $p){ ?>

							<form method="post" action="<?php echo base_url('dashboard/pelanggan_update') ?>">
								<div class="box-body">
									<div class="form-group">
										<label>Nama</label>
										<input type="hidden" name="id" value="<?php echo $p->pelanggan_id; ?>">
										<input type="text" name="nama" class="form-control" placeholder="Masukkan nama pelanggan .." value="<?php echo $p->pelanggan_nama; ?>">
										<?php echo form_error('nama'); ?>
									</div>
									<div class="form-group">
										<label>Email</label>
										<input type="email" name="email" class="form-control" placeholder="Masukkan email pelanggan .." value="<?php echo $p->pelanggan_email; ?>">
										<?php echo form_error('email'); ?>
									</div>
									<div class="form-group">
										<label>No.Telepon</label>
										<input type="number" name="telp" class="form-control" placeholder="Masukkan No.telepon pelanggan .." value="<?php echo $p->pelanggan_telp; ?>">
										<?php echo form_error('telp'); ?>
									</div>
									<div class="form-group">
										<label>Pekerjaan</label>
										<input type="text" name="pekerjaan" class="form-control" placeholder="Masukkan pekerjaan pelanggan.." value="<?php echo $p->pelanggan_pekerjaan; ?>">
										<?php echo form_error('pekerjaan'); ?>
									</div>
									<div class="form-group">
										<label>Password</label>
										<input type="password" name="password" class="form-control" placeholder="Masukkan password pelanggan..">
										<?php echo form_error('password'); ?>
										<small>Kosongkan jika tidak ingin mengubah password</small>
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