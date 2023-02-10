<div class="content-wrapper">
	<section class="content-header">
		<h1>
			Dokter Hewan
			<small>Data Dokter Hewan</small>
		</h1>
	</section>

	<section class="content">

		<div class="row">
			<div class="col-lg-12">
				
				<a href="<?php echo base_url().'dashboard/dokter_tambah'; ?>" class="btn btn-sm btn-primary">Buat Dokter Baru</a>

				<br/>
				<br/>

				<div class="box box-primary">
					<div class="box-header">
						<h3 class="box-title">Dokter</h3>
					</div>
					<div class="box-body">
						<table class="table table-bordered table-datatable">
							<thead>
								<tr>
									<th width="1%">NO</th>
									<th>Foto</th>
									<th>Nama Lengkap</th>
									<th>Email</th>
									<th>No Telepon</th>
									<th>Alamat</th>
									<th>Deskripsi</th>
									<th width="10%">OPSI</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								$no = 1;
								foreach($dokter as $k){ 
									?>
									<tr>
										<td><?php echo $no++; ?></td>
										<td>
											<?php if($k->dokter_foto){ ?>
												<img src="<?php echo base_url().'gambar/dokter/'.$k->dokter_foto ?>" width="100px">
											<?php } ?>
										</td>
										<td><?php echo $k->dokter_nama; ?></td>
										<td><?php echo $k->dokter_email; ?></td>
										<td><?php echo $k->dokter_telp; ?></td>
										<td><?php echo $k->dokter_alamat; ?></td>
										<td><?php echo $k->dokter_deskripsi; ?></td>
										<td>
											<a href="<?php echo base_url().'dashboard/dokter_edit/'.$k->dokter_id; ?>" class="btn btn-warning btn-sm"> <i class="fa fa-pencil"></i> </a>
											<a onclick="return confirm('Yakin ingin hapus?')" href="<?php echo base_url().'dashboard/dokter_hapus/'.$k->dokter_id; ?>" class="btn btn-danger btn-sm"> <i class="fa fa-trash"></i> </a>
										</td>
									</tr>
								<?php } ?>
							</tbody>
						</table>
						

					</div>
				</div>

			</div>
		</div>

	</section>

</div>