<div class="content-wrapper">
	<section class="content-header">
		<h1>
			Peternak Binaan
			<small>Peternak Binaan</small>
		</h1>
	</section>

	<section class="content">

		<div class="row">
			<div class="col-lg-12">
				
				<a href="<?php echo base_url().'dashboard/peternak_tambah'; ?>" class="btn btn-sm btn-primary">Tambah peternak baru</a>

				<br/>
				<br/>

				<div class="box box-primary">
					<div class="box-header">
						<h3 class="box-title">Data peternak</h3>
					</div>
					<div class="box-body">
						<table class="table table-bordered table-datatable">
							<thead>
								<tr>
									<th width="1%">NO</th>
									<th>Foto</th>
									<th>Nama</th>
									<th>Email</th>
									<th>No.Telp</th>
									<th>Jenis Ternak</th>
									<th>Lokasi Kandang</th>
									<th width="10%">OPSI</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								$no = 1;
								foreach($peternak as $p){ 
									?>
									<tr>
										<td><?php echo $no++; ?></td>
										<td>
											<center>
												<img src="<?php echo base_url('gambar/peternak/'.$p->peternak_foto) ?>" width="60px">
											</center>
										</td>
										<td><?php echo $p->peternak_nama; ?></td>
										<td><?php echo $p->peternak_email; ?></td>
										<td><?php echo $p->peternak_telp; ?></td>
										<td><?php echo $p->peternak_alamat; ?></td>
										<td><?php echo $p->peternak_link; ?></td>
										<td>
											<a href="<?php echo base_url().'dashboard/peternak_edit/'.$p->peternak_id; ?>" class="btn btn-warning btn-sm"> <i class="fa fa-pencil"></i> </a>
											<a onclick="return confirm('Yakin ingin hapus?')" href="<?php echo base_url().'dashboard/peternak_hapus/'.$p->peternak_id; ?>" class="btn btn-danger btn-sm"> <i class="fa fa-trash"></i> </a>
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