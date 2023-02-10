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
				
				<a href="<?php echo base_url().'dokter/produk_tambah'; ?>" class="btn btn-sm btn-primary">Tambah Produk Baru</a>

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
										</td>
										<td>
											<a href="<?php echo base_url().'dokter/produk_edit/'.$a->produk_id; ?>" class="btn btn-warning btn-sm"> <i class="fa fa-pencil"></i> </a>
											<a onclick="return confirm('Yakin ingin hapus?')" href="<?php echo base_url().'dokter/produk_hapus/'.$a->produk_id; ?>" class="btn btn-danger btn-sm"> <i class="fa fa-trash"></i> </a>
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