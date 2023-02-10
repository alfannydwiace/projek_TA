<div class="content-wrapper">
	<section class="content-header">
		<h1>
			Banner
			<small>Tulis Banner Baru</small>
		</h1>
	</section>

	<section class="content">

		<a href="<?php echo base_url().'dashboard/slider'; ?>" class="btn btn-sm btn-primary">Kembali</a>

		<br/>
		<br/>

		<?php foreach($slider as $s){ ?>

			<form method="post" action="<?php echo base_url('dashboard/slider_update') ?>" enctype="multipart/form-data">
				<div class="row">
					<div class="col-lg-9">

						<div class="box box-primary">
							<div class="box-body">

								<div class="box-body">
									<div class="form-group">
										<label>Judul 1</label>
										<input type="hidden" name="id" value="<?php echo set_value('judul1', $s->slider_id); ?>">
										<input type="text" name="judul1" class="form-control" placeholder="Masukkan judul1 slider.." value="<?php echo set_value('judul1', $s->slider_text1); ?>">
										<small class="text-muted"><i>Kosongkan jika tidak ingin ditampilkan</i></small>
										<?php echo form_error('judul1'); ?>
									</div>

									<div class="form-group">
										<label>Judul 2</label>
										<input type="text" name="judul2" class="form-control" placeholder="Masukkan judul2 slider.." value="<?php echo set_value('judul2', $s->slider_text2); ?>">
										<small class="text-muted"><i>Kosongkan jika tidak ingin ditampilkan</i></small>
										<?php echo form_error('judul2'); ?>
									</div>

									<div class="form-group">
										<label>Gambar Slider</label>

										<img width="50%" class="img-responsive" src="<?php echo base_url('gambar/slider/'.$s->slider_gambar) ?>">

										<br>

										<input type="file" name="gambar">
										<small class="text-muted"><i>Ukuran gambar yang di sarankan (1920 x 930)</i></small>
										<small class="text-muted"><i>Kosongkan jika tidak ingin mengganti gambar</i></small>
										
										<?php 
										if(isset($gambar_error)){
											echo $gambar_error;
										}
										?>
										<?php echo form_error('gambar'); ?>
									</div>

									<hr>

									<div class="form-group">
										<label>Text Tombol 1</label>
										<input type="text" name="tombol_text1" class="form-control" placeholder="Masukkan tombol_text1 slider.." value="<?php echo set_value('tombol_text1', $s->slider_tombol_text1); ?>">
										<small class="text-muted"><i>Kosongkan jika tidak ingin ditampilkan</i></small>
										<?php echo form_error('tombol_text1'); ?>
									</div>


									<div class="form-group">
										<label>Link Tombol 1</label>
										<input type="text" name="tombol_link1" class="form-control" placeholder="Masukkan tombol_link1 slider.." value="<?php echo set_value('tombol_link1', $s->slider_tombol_link1); ?>">
										<?php echo form_error('tombol_link1'); ?>
									</div>

									<hr>

									<div class="form-group">
										<label>Text Tombol 2</label>
										<input type="text" name="tombol_text2" class="form-control" placeholder="Masukkan tombol_text2 slider.." value="<?php echo set_value('tombol_text2', $s->slider_tombol_text2); ?>">
										<small class="text-muted"><i>Kosongkan jika tidak ingin ditampilkan</i></small>
										<?php echo form_error('tombol_text2'); ?>
									</div>


									<div class="form-group">
										<label>Link Tombol 2</label>
										<input type="text" name="tombol_link2" class="form-control" placeholder="Masukkan tombol_link2 slider.." value="<?php echo set_value('tombol_link2', $s->slider_tombol_link2); ?>">
										<?php echo form_error('tombol_link2'); ?>
									</div>
								</div>


								<div class="box-body">
									<input type="submit" name="status" value="SIMPAN" class="btn btn-success btn-block">
								</div>

							</div>
						</div>

					</div>

				</div>
			</form>

		<?php } ?>

	</section>

</div>