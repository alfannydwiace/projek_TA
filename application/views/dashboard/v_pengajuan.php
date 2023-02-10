<div class="content-wrapper">
	<section class="content-header">
		<h1>
			Layanan Pengajuan
			<small>Layanan Pengajuan</small>
		</h1>
	</section>

	<section class="content">

		<div class="row">
			<div class="col-lg-12">
				
				
				<div class="box box-primary">
					<div class="box-header">
						<h3 class="box-title"><b>Data Layanan Pengajuan</b></h3>

					</div>
					<div class="box-body">
						<table class="table table-bordered table-datatable">
							<thead>
								<tr>
									<th>Tanggal</th>
									<th>Pelanggan</th>
									<th>Nama</th>
								
									<th>Telepon</th>
									<th>Tipe Ternak</th>
									<th>Tgl.Uji Pantau Lokasi</th>
									<th>File Proposal</th>
									<th>Status</th>
									<th>Keterangan</th>
									<th width="1%">OPSI</th>
									
								</tr>
							</thead>
							<tbody>
								<?php 
								foreach($pengajuan as $u){
									?>
									<tr>
										<td><?php echo date('d-m-Y', strtotime($u->pengajuan_tgl)) ?></td>
										<td><?php echo $u->pelanggan_nama ?></td>
										<td><?php echo $u->pengajuan_nama ?></td>
										
										<td><?php echo $u->pengajuan_telp ?></td>
										<td><?php echo $u->pengajuan_produk ?></td>
										<td><?php echo date('d-m-Y', strtotime($u->pengajuan_lab)) ?></td>
										<td>
											<a target="_blank" href="<?php echo base_url() ?>pengajuan/<?php echo $u->pengajuan_proposal; ?>"> <i class="fa fa-download"></i> Lihat / Unduh</a>
										</td>
										<td>
											<span class="label label-<?php if($u->pengajuan_status == "menunggu"){ echo "warning";}else if($u->pengajuan_status=="diverifikasi"){echo "success";}else{echo "danger";} ?>"><?php echo $u->pengajuan_status; ?></span>

											<br>
											<br>

											<form action="<?php echo base_url('dashboard/pengajuan_status') ?>" method="post" onchange="return this.submit()">
												<input type="hidden" name="id" value="<?php echo $u->pengajuan_id ?>">
												<b>Verifikasi Status</b>

												<select name="status" class="form-control">
													<option <?php if($u->pengajuan_status == "menunggu"){ echo  "selected='selected'";} ?> value="menunggu">Menunggu</option>
													<option <?php if($u->pengajuan_status == "diverifikasi"){ echo  "selected='selected'";} ?> value="diverifikasi">Diverifikasi</option>
													<option <?php if($u->pengajuan_status == "ditolak"){ echo  "selected='selected'";} ?> value="ditolak">Ditolak</option>
												</select>
											</form>

										</td>
										<td><?php echo $u->pengajuan_ket ?></td>
										<td>
											<a href="<?php echo base_url().'dashboard/pengajuan_edit/'.$u->pengajuan_id; ?>" class="btn btn-warning btn-sm"> <i class="fa fa-pencil"></i> </a>
											<a onclick="return confirm('Yakin ingin hapus?')" href="<?php echo base_url().'dashboard/pengajuan_hapus/'.$u->pengajuan_id; ?>" class="btn btn-danger btn-sm"> <i class="fa fa-trash"></i> </a>
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