<div class="content-wrapper">
	<section class="content-header">
		<h1>
			Produk Saya
			<small>Data Produk Saya</small>
		</h1>
	</section>

	<section class="content">

		<div class="row">
			<div class="col-lg-12">
				
				
				<br/>
				<br/>

				<div class="box box-primary">
					<div class="box-header">
						<h3 class="box-title">Produk</h3>
					</div>
					<div class="box-body">
						<table class="table table-bordered table-datatable">
							<thead>
								<tr>
									<th width="1%">NO</th>
									<th width="10%">Foto</th>
									<th>Nama Produk</th>
									<th>Kategori</th>
									<th>Link Pembelian</th>
									<th>Harga</th>
									<th>Status</th>
									<th width="10%">OPSI</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								$no = 1;
								foreach($produk as $a){ 
									?>
									<tr>
										<td><?php echo $no++; ?></td>
										<td>
											<img src="../gambar/produk/<?php echo $a->produk_foto; ?>" style="width:100%">
										</td>
										<td><?php echo $a->produk_nama; ?></td>
										<td><?php echo $a->kategori_nama; ?></td>
										<td><?php echo $a->produk_link; ?></td>
										<td><?php echo "Rp.".number_format($a->produk_harga).",-"; ?></td>
										<td>
											<span class="label label-<?php if($a->produk_status == "menunggu"){ echo "warning";}else if($a->produk_status=="diverifikasi"){echo "success";}else{echo "danger";} ?>"><?php echo $a->produk_status; ?></span>

											<br>
											<br>

											<form action="<?php echo base_url('dashboard/produk_status') ?>" method="post" onchange="return this.submit()">
												<input type="hidden" name="id" value="<?php echo $a->produk_id ?>">
												<b>Verifikasi Status</b>

												<select name="status" class="form-control">
													<option <?php if($a->produk_status == "menunggu"){ echo  "selected='selected'";} ?> value="menunggu">Menunggu</option>
													<option <?php if($a->produk_status == "diverifikasi"){ echo  "selected='selected'";} ?> value="diverifikasi">Diverifikasi</option>
													<option <?php if($a->produk_status == "ditolak"){ echo  "selected='selected'";} ?> value="ditolak">Ditolak</option>
												</select>
											</form>

										</td>
										<td>
											<a href="<?php echo base_url().'dashboard/produk_edit/'.$a->produk_id; ?>" class="btn btn-warning btn-sm"> <i class="fa fa-pencil"></i> </a>
											<a onclick="return confirm('Yakin ingin hapus?')" href="<?php echo base_url().'dashboard/produk_hapus/'.$a->produk_id; ?>" class="btn btn-danger btn-sm"> <i class="fa fa-trash"></i> </a>
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