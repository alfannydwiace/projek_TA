<div class="content-wrapper">
	<section class="content-header">
		<h1>
			Dashboard
			<small>Control panel</small>
		</h1>
	</section>

	<section class="content">

		<div class="row">

			<div class="col-lg-3 col-xs-6">
				<div class="small-box bg-green">
					<div class="inner">
						<h3><?php echo $jumlah_produk_diverifikasi ?></h3>

						<p>Produk Yang Diverifikasi</p>
					</div>
					<div class="icon">
						<i class="ion ion-android-list"></i>
					</div>
				</div>
			</div>
			
			<div class="col-lg-3 col-xs-6">
				<div class="small-box bg-yellow">
					<div class="inner">
						<h3><?php echo $jumlah_produk_menunggu ?></h3>

						<p>Produk Menunggu Verifikasi</p>
					</div>
					<div class="icon">
						<i class="ion ion-pie-graph"></i>
					</div>
				</div>
			</div>

			<div class="col-lg-3 col-xs-6">
				<div class="small-box bg-red">
					<div class="inner">
						<h3><?php echo $jumlah_produk_ditolak ?></h3>

						<p>Produk Ditolak</p>
					</div>
					<div class="icon">
						<i class="ion ion-pie-graph"></i>
					</div>
				</div>
			</div>
			
		</div>

		<div class="row">
			<div class="col-lg-6">
				
				<div class="box box-primary">
					<div class="box-header">
						<h3 class="box-title">Dashboard</h3>
					</div>
					<div class="box-body">
						<h3>Selamat Datang !</h3>

						<div class="table-responsive">
							<table class="table table-bordered table-hover">
								<tr>
									<th width="%">NAMA</th>
									<th width="1px">:</th>
									<td>
										<?php 
										$id_user = $this->session->userdata('id');
										$user = $this->db->query("select * from peternak where peternak_id='$id_user'")->row();
										?>
										<p><?php echo $user->peternak_nama; ?></p>
									</td>
								</tr>
								<tr>
									<th width="30%">LOGIN SEBAGAI</th>
									<th width="1px">:</th>
									<td>PETERNAK BINAAN</td>
								</tr>
							</table>
						</div>
					</div>
				</div>

			</div>

			<div class="col-lg-6">
				
			

			</div>

		</div>

	</section>

</div>