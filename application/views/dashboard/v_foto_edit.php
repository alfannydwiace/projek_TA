<div class="content-wrapper">
	<section class="content-header">
		<h1>
			Foto
			<small>Data Foto</small>
		</h1>
	</section>

	<section class="content">

		<div class="row">
			<div class="col-lg-6">
				<a href="<?php echo base_url().'dashboard/foto'; ?>" class="btn btn-sm btn-primary">Kembali</a>
				
				<br/>
				<br/>

				<div class="box box-primary">
					<div class="box-header">
						<h3 class="box-title">Edit Foto</h3>
					</div>
					<div class="box-body">

						<?php foreach($foto as $f){ ?>

							<form method="post" action="<?php echo base_url('dashboard/foto_update') ?>" enctype="multipart/form-data">
								<div class="box-body">
									<div class="form-group">
										<label>Nama Foto</label>
										<input type="hidden" name="id" value="<?php echo $f->foto_id ?>">
										<input type="text" name="nama" class="form-control" placeholder="Masukkan nama foto .." value="<?php echo $f->foto_nama ?>">
										<?php echo form_error('nama'); ?>
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
										<i class="text-muted">Kosongkan jika tidak ingin mengganti foto</i>
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