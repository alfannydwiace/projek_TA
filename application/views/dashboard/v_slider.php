<div class="content-wrapper">
	<section class="content-header">
		<h1>
			Banner
			<small>Manajemen Banner</small>
		</h1>
	</section>

	<section class="content">

		<div class="row">
			<div class="col-lg-12">
				
				<a href="<?php echo base_url().'dashboard/slider_tambah'; ?>" class="btn btn-sm btn-primary">Buat Banner baru</a>

				<br/>
				<br/>

				<div class="box box-primary">
					<div class="box-header">
						<h3 class="box-title">Banner</h3>
					</div>
					<div class="box-body">

						<div class="table-responsive">
							<table class="table table-bordered">
								<thead>
									<tr>
										<th width="1%">NO</th>
										<th>Judul 1</th>
										<th>Judul 2</th>
										<th>Text Tombol 1</th>
										<th>Linl Tombol 1</th>
										<th>Text Tombol 2</th>
										<th>Linl Tombol 2</th>
										<th width="10%">Gambar</th>
										<th width="10%">OPSI</th>
									</tr>
								</thead>
								<tbody>
									<?php 
									$no = 1;
									foreach($slider as $s){ 
										?>
										<tr>
											<td><?php echo $no++; ?></td>
											<td><?php echo $s->slider_text1; ?></td>
											<td><?php echo $s->slider_text2; ?></td>
											<td><?php echo $s->slider_tombol_text1; ?></td>
											<td><?php echo $s->slider_tombol_link1; ?></td>
											<td><?php echo $s->slider_tombol_text2; ?></td>
											<td><?php echo $s->slider_tombol_link2; ?></td>
											<td><img width="100%" class="img-responsive" src="<?php echo base_url().'/gambar/slider/'.$s->slider_gambar; ?>"></td>
											<td>
												<a href="<?php echo base_url().'dashboard/slider_edit/'.$s->slider_id; ?>" class="btn btn-warning btn-sm"> <i class="fa fa-pencil"></i> </a>
												<a  onclick="return confirm('Yakin ingin hapus?')"  href="<?php echo base_url().'dashboard/slider_hapus/'.$s->slider_id; ?>" class="btn btn-danger btn-sm"> <i class="fa fa-trash"></i> </a>
											</td>
										</tr>
									<?php } ?>
								</tbody>
							</table>
						</div>

					</div>
				</div>

			</div>
		</div>

	</section>

</div>