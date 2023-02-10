<div class="content-wrapper">
	<section class="content-header">
		<h1>
			Agenda
			<small>Edit Agenda</small>
		</h1>
	</section>

	<section class="content">

		<a href="<?php echo base_url().'dashboard/agenda'; ?>" class="btn btn-sm btn-primary">Kembali</a>

		<br/>
		<br/>

		<?php foreach($agenda as $a){ ?>

		<form method="post" action="<?php echo base_url('dashboard/agenda_update') ?>" enctype="multipart/form-data">
			<div class="row">
				<div class="col-lg-9">

					<div class="box box-primary">
						<div class="box-body">


							<div class="box-body">


								<div class="row">
									<div class="col-lg-12">
										<div class="form-group">
											<label>Nama</label>
											<input type="hidden" name="id" value="<?php echo $a->agenda_id; ?>">
											<input type="text" name="nama" class="form-control" placeholder="Masukkan nama agenda.." value="<?php echo $a->agenda_nama; ?>">
											<br/>
											<?php echo form_error('nama'); ?>
										</div>
									</div>
									<div class="col-lg-4">
										<div class="form-group">
											<label>Tempat</label>
											<input type="text" name="tempat" class="form-control" placeholder="Masukkan tempat.." value="<?php echo $a->agenda_tempat; ?>">
											<br/>
											<?php echo form_error('tempat'); ?>
										</div>
									</div>
									<div class="col-lg-4">
										<div class="form-group">
											<label>Tanggal</label>
											<input type="date" name="tanggal" class="form-control" placeholder="Masukkan tanggal.." value="<?php echo set_value('tanggal'); ?>">
											<br/>
											<?php echo form_error('tanggal'); ?>
										</div>
									</div>
									<div class="col-lg-4">
										<div class="form-group">
											<label>Tgl. Berakhir</label>
											<input type="date" name="sampai" class="form-control" placeholder="Masukkan tgl.Berakhir.." value="<?php echo set_value('sampai'); ?>">
											<br/>
											<?php echo form_error('sampai'); ?>
										</div>
									</div>
								</div>

							</div>

							<div class="box-body">
								<div class="form-group">
									<label>Deskripsi</label>
									<?php echo form_error('deskripsi'); ?>
									<br/>
									<textarea class="form-control" id="editor" name="deskripsi"> <?php echo $a->agenda_deskripsi; ?> </textarea>
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
		<?php } ?>

	</section>

</div>