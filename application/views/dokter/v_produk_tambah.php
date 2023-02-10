<div class="content-wrapper">
	<section class="content-header">
		<h1>
			Produk
			<small>Tambah Produk Baru</small>
		</h1>
	</section>

	<section class="content">

		<a href="<?php echo base_url().'dashboard/produk'; ?>" class="btn btn-sm btn-primary">Kembali</a>

		<br/>
		<br/>

		<form method="post" action="<?php echo base_url('dokter/produk_aksi') ?>" enctype="multipart/form-data">
			<div class="row">
				<div class="col-lg-9">

					<div class="box box-primary">
						<div class="box-body">


							<div class="box-body">
								<div class="row">
									<div class="col-lg-12">
										<div class="form-group">
											<label>Nama</label>
											<input type="text" name="nama" class="form-control" placeholder="Masukkan nama produk.." value="<?php echo set_value('nama'); ?>">
											<br/>
											<?php echo form_error('nama'); ?>
										</div>
									</div>
									<div class="col-lg-3">
										<div class="form-group">
											<label>Kategori</label>
											<select name="kategori" class="form-control">
												<option value="">-Pilih-</option>
												<?php foreach($kategori as $k){ ?>
													<option value="<?php echo $k->kategori_id ?>"><?php echo $k->kategori_nama ?></option>
												<?php } ?>
											</select>
											<br/>
											<?php echo form_error('kategori'); ?>
										</div>
									</div>
									<div class="col-lg-3">
										<div class="form-group">
											<label>Harga</label>
											<input type="number" name="harga" class="form-control" placeholder="Masukkan harga.." value="<?php echo set_value('harga'); ?>">
											<br/>
											<?php echo form_error('harga'); ?>
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group">
											<label>Link Pembelian</label>
											<input type="text" name="link" class="form-control" placeholder="Masukkan link pembelian.." value="<?php echo set_value('link'); ?>">
											<br/>
											<?php echo form_error('link'); ?>
										</div>
									</div>
								</div>
								
							</div>

							<div class="box-body">
								<div class="form-group">
									<label>Deskripsi</label>
									<?php echo form_error('deskripsi'); ?>
									<br/>
									<textarea class="form-control" id="editor" name="deskripsi"> <?php echo set_value('deskripsi'); ?> </textarea>
								</div>
							</div>


						</div>
					</div>

				</div>

				<div class="col-lg-3">
					<div class="box box-primary">
						<div class="box-body">

							<div class="form-group">
								<label>Gambar Foto</label>

								<input type="file" name="foto">

								<br/>
								<?php 
								if(isset($gambar_error)){
									echo $gambar_error;
								}
								?>
								<?php echo form_error('foto'); ?>
							</div>

							<br/><br/>

							<input type="submit" name="status" value="Simpan" class="btn btn-success btn-block">

						</div>
					</div>

				</div>
			</div>
		</form>

	</section>

</div>