<div class="content-wrapper">
	<section class="content-header">
		<h1>
			Galeri Foto
			<small>Galeri Foto</small>
		</h1>
	</section>

	<section class="content">

		<div class="row">
			<div class="col-lg-12">
				
				<a href="<?php echo base_url().'dashboard/foto_tambah'; ?>" class="btn btn-sm btn-success">Tambah Foto baru</a>

				<br/>
				<br/>

				<div class="box box-primary">
					<div class="box-header">
						<h3 class="box-title"><b>Galeri Foto</b></h3>

					</div>
					<div class="box-body">
						<table class="table table-bordered table-datatable">
							<thead>
								<tr>
									<th width="20%">Foto</th>
									<th>Nama</th>
									<th width="18%">OPSI</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								$foto = $this->db->query("select * from foto")->result();
								foreach($foto as $f){
									?>
									<tr>
										<td>
											<img style="width: 100%" src="<?php echo base_url()."gambar/foto/".$f->foto_link; ?>">
										</td>
										<td>
											<?php echo $f->foto_nama; ?>
											
										</td>
										<td>
											<a href="<?php echo base_url().'dashboard/foto_edit/'.$f->foto_id; ?>" class="btn btn-warning btn-sm"> <i class="fa fa-pencil"></i> </a>
											<a  onclick="return confirm('Yakin ingin hapus?')"  href="<?php echo base_url().'dashboard/foto_hapus/'.$f->foto_id; ?>" class="btn btn-danger btn-sm"> <i class="fa fa-trash"></i> </a>
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