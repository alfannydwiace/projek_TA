<div class="content-wrapper">
	<section class="content-header">
		<h1>
			Pelanggan
			<small>Edit Pengajuan</small>
		</h1>
	</section>

	<section class="content">

		<div class="row">
			<div class="col-lg-6">
				<a href="<?php echo base_url().'dashboard/pengajuan'; ?>" class="btn btn-sm btn-primary">Kembali</a>
				
				<br/>
				<br/>

				<div class="box box-primary">
					<div class="box-header">
						<h3 class="box-title">Pengajuan</h3>
					</div>
					<div class="box-body">
						
						<?php foreach($pengajuan as $u){ ?>

							<form method="post" action="<?php echo base_url('dashboard/pengajuan_update') ?>">
								<div class="box-body">
									<div class="form-group">
										<label>Nama</label>
										<input type="hidden" name="id" value="<?php echo $u->pengajuan_id; ?>">
										<input type="text" name="nama" class="form-control" placeholder="Masukkan nama pelanggan .." value="<?php echo $u->pengajuan_nama; ?>" readonly>
									</div>
									<div class="form-group">
										<label>Keterangan</label>
										<input type="text" name="pengajuan_ket" class="form-control" placeholder="Masukkan keterangan pengajuan.." value="<?php echo $u->pengajuan_ket; ?>">
										<?php echo form_error('pengajuan_ket'); ?>
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