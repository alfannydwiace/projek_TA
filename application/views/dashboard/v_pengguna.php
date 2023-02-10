<div class="content-wrapper">
	<section class="content-header">
		<h1>
			Pengguna
			<small>Pengguna Website</small>
		</h1>
	</section>

	<section class="content">

		<div class="row">
			<div class="col-lg-12">
				
				<a href="<?php echo base_url().'dashboard/pengguna_tambah'; ?>" class="btn btn-sm btn-primary">Buat pengguna baru</a>

				<br/>
				<br/>

				<div class="box box-primary">
					<div class="box-header">
						<h3 class="box-title">Pengguna</h3>
					</div>
					<div class="box-body">
						<table class="table table-bordered table-datatable">
							<thead>
								<tr>
									<th width="1%">NO</th>
									<th>Nama</th>
									<th>Email</th>
									<th>Username</th>
									<th width="10%">OPSI</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								$no = 1;
								foreach($pengguna as $p){ 
									?>
									<tr>
										<td><?php echo $no++; ?></td>
										<td><?php echo $p->pengguna_nama; ?></td>
										<td><?php echo $p->pengguna_email; ?></td>
										<td><?php echo $p->pengguna_username; ?></td>
										<td>
											<?php if($p->pengguna_id != 1){ ?>
												<a href="<?php echo base_url().'dashboard/pengguna_edit/'.$p->pengguna_id; ?>" class="btn btn-warning btn-sm"> <i class="fa fa-pencil"></i> </a>
												<a onclick="return confirm('hapus?')" href="<?php echo base_url().'dashboard/pengguna_hapus/'.$p->pengguna_id; ?>" class="btn btn-danger btn-sm"> <i class="fa fa-trash"></i> </a>
											<?php } ?>
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