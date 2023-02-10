<div class="content-wrapper">
	<section class="content-header">
		<h1>
			Pusat Unduh
			<small>Pusat Unduh</small>
		</h1>
	</section>

	<section class="content">

		<div class="row">
			<div class="col-lg-12">
				
				<a href="<?php echo base_url().'dashboard/unduh_tambah'; ?>" class="btn btn-sm btn-success">Tambah File baru</a>

				<br/>
				<br/>

				<div class="box box-primary">
					<div class="box-header">
						<h3 class="box-title"><b>Pusat Unduh</b></h3>

					</div>
					<div class="box-body">
						<table class="table table-bordered table-datatable">
							<thead>
								<tr>
									<th>Nama</th>
									<th width="18%">OPSI</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								foreach($unduh as $u){
									?>
									<tr>
										<td>
											<i class="fa fa-file"></i> &nbsp; <?php echo $u->unduh_nama; ?>
										</td>
										<td>
											<a target="_blank" href="<?php echo base_url() ?>unduh/<?php echo $u->unduh_link; ?>" class="btn btn-success btn-sm"> <i class="fa fa-download"></i> </a>
											<a href="<?php echo base_url().'dashboard/unduh_edit/'.$u->unduh_id; ?>" class="btn btn-warning btn-sm"> <i class="fa fa-pencil"></i> </a>
											<a onclick="return confirm('yakin ingin hapus?')" href="<?php echo base_url().'dashboard/unduh_hapus/'.$u->unduh_id; ?>" class="btn btn-danger btn-sm"> <i class="fa fa-trash"></i> </a>
										</td>
									</tr>
									<?php 
								}
								?>
							</tbody>
						</table>

					</div>
				</div>
			</div>
		</div>

	</section>

</div>