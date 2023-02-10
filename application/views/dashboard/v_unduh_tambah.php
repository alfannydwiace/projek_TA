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
						<h3 class="box-title">Tambah File</h3>
					</div>
					<div class="box-body">
						
						
						<form method="post" action="<?php echo base_url('dashboard/unduh_aksi') ?>" enctype="multipart/form-data">
							<div class="box-body">
								<div class="form-group">
									<label>Nama File</label>
									<input type="text" name="nama" class="form-control" placeholder="Masukkan nama file ..">
									<?php echo form_error('nama'); ?>
								</div>

								<div class="form-group">
									<label>Upload File</label>

									<input type="file" name="file">

									<br/>
									<?php 
									if(isset($gambar_error)){
										echo $gambar_error;
									}
									?>
									<?php echo form_error('file'); ?>
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