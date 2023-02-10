<div class="content-wrapper">
	<section class="content-header">
		<h1>
			Agenda
			<small>Data Agenda</small>
		</h1>
	</section>

	<section class="content">

		<div class="row">
			<div class="col-lg-12">
				
				<a href="<?php echo base_url().'dashboard/agenda_tambah'; ?>" class="btn btn-sm btn-primary">Buat agenda baru</a>

				<br/>
				<br/>

				<div class="box box-primary">
					<div class="box-header">
						<h3 class="box-title">Agenda</h3>
					</div>
					<div class="box-body">
						<table class="table table-bordered table-datatable">
							<thead>
								<tr>
									<th width="1%">NO</th>
									<th width="10%">Foto</th>
									<th>Nama Agenda</th>
									<th>Tempat</th>
									<th>Tanggal</th>
									<th width="15%">OPSI</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								$no = 1;
								foreach($agenda as $a){ 
									?>
									<tr>
										<td><?php echo $no++; ?></td>
										<td>
											<img src="../gambar/agenda/<?php echo $a->agenda_foto; ?>" style="width:100%">
										</td>
										<td><?php echo $a->agenda_nama; ?></td>
										<td><?php echo $a->agenda_tempat; ?></td>
										<td><?php echo $a->agenda_tanggal; ?></td>
										<td>
											<a href="<?php echo base_url().'dashboard/agenda_edit/'.$a->agenda_id; ?>" class="btn btn-warning btn-sm"> <i class="fa fa-pencil"></i> </a>
											<a  onclick="return confirm('Yakin ingin hapus?')"  href="<?php echo base_url().'dashboard/agenda_hapus/'.$a->agenda_id; ?>" class="btn btn-danger btn-sm"> <i class="fa fa-trash"></i> </a>
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