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

						<p>Jumlah Produk Diverifikasi</p>
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

						<p>Jumlah Produk Menunggu</p>
					</div>
					<div class="icon">
						<i class="ion ion-android-list"></i>
					</div>
				</div>
			</div>

			<div class="col-lg-3 col-xs-6">
				<div class="small-box bg-red">
					<div class="inner">
						<h3><?php echo $jumlah_produk_ditolak ?></h3>

						<p>Jumlah Produk Ditolak</p>
					</div>
					<div class="icon">
						<i class="ion ion-android-list"></i>
					</div>
				</div>
			</div>
			
			<div class="col-lg-3 col-xs-6">
				<div class="small-box bg-blue">
					<div class="inner">
						<h3><?php echo $jumlah_pelanggan ?></h3>

						<p>Jumlah Pelanggan</p>
					</div>
					<div class="icon">
						<i class="ion ion-android-list"></i>
					</div>
				</div>
			</div>
			
			<div class="col-lg-3 col-xs-6">
				<div class="small-box bg-purple">
					<div class="inner">
						<h3><?php echo $jumlah_dokter ?></h3>

						<p>Jumlah Dokter</p>
					</div>
					<div class="icon">
						<i class="ion ion-android-list"></i>
					</div>
				</div>
			</div>

			<div class="col-lg-3 col-xs-6">
				<div class="small-box bg-black">
					<div class="inner">
						<h3><?php echo $jumlah_agenda ?></h3>

						<p>Jumlah Agenda</p>
					</div>
					<div class="icon">
						<i class="ion ion-android-list"></i>
					</div>
				</div>
			</div>

			<div class="col-lg-3 col-xs-6">
				<div class="small-box bg-aqua">
					<div class="inner">
						<h3><?php echo $jumlah_unduh ?></h3>

						<p>Jumlah Pusat Unduh</p>
					</div>
					<div class="icon">
						<i class="ion ion-android-list"></i>
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
									<th width="%">Nama</th>
									<th width="1px">:</th>
									<td>
										<?php 
										$id_user = $this->session->userdata('id');
										$user = $this->db->query("select * from pengguna where pengguna_id='$id_user'")->row();
										?>
										<p><?php echo $user->pengguna_nama; ?></p>
									</td>
								</tr>
								<tr>
									<th width="20%">Username</th>
									<th width="1px">:</th>
									<td><?php echo $this->session->userdata('username') ?></td>
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