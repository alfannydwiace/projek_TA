<div class="content-wrapper">
	<section class="content-header">
		<h1>
			Pusat Unduh
			<small>Data Pusat Unduh</small>
		</h1>
	</section>

	<section class="content">

		<div class="row">
			<div class="col-lg-6">
				<a href="<?php echo base_url().'dashboard/unduh'; ?>" class="btn btn-sm btn-primary">Kembali</a>
				
				<br/>
				<br/>

				<div class="box box-primary">
					<div class="box-header">
						<h3 class="box-title">Edit File</h3>
					</div>
					<div class="box-body">

						<?php foreach($unduh as $f){ ?>

							<form method="post" action="<?php echo base_url('dashboard/unduh_update') ?>" enctype="multipart/form-data">
								<div class="box-body">
									<div class="form-group">
										<label>Nama file</label>
										<input type="hidden" name="id" value="<?php echo $f->unduh_id ?>">
										<input type="text" name="nama" class="form-control" placeholder="Masukkan nama file .." value="<?php echo $f->unduh_nama ?>">
										<?php echo form_error('nama'); ?>
									</div>

									<div class="form-group">
										<label>Upload file</label>

										<input type="file" name="file">

										<br/>
										<?php 
										if(isset($gambar_error)){
											echo $gambar_error;
										}
										?>
										<?php echo form_error('file'); ?>
										<i class="text-muted">Kosongkan jika tidak ingin mengganti file</i>
									</div>

								</div>

								<div class="box-footer">
									<input type="submit" class="btn btn-success" value="Simpan">
								</div>
							</form>

							<?php 
						}
						?>

					</div>
				</div>

			</div>
		</div>

	</section>

</div>