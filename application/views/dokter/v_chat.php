<div class="content-wrapper">
	<section class="content-header">
		<h1>
			Chat
			<small>Chat Konsultasi</small>
		</h1>
	</section>

	<section class="content">

		<div class="row">
			<div class="col-lg-4">
				
				<div class="box box-primary">
					<div class="box-header">
						<h3 class="box-title">Data Pelanggan</h3>
					</div>
					<div class="box-body">

						
						<ul class="list-group">
							<?php foreach($semua as $p){ ?>
								<a href="<?php echo base_url('dokter/chat_detail/'.$p->pelanggan_id) ?>">
									<li class="list-group-item"><?php echo $p->pelanggan_nama ?> 
									<?php 
									$id_dokter = $this->session->userdata('id');
									$id_pelanggan = $p->pelanggan_id;
									$jumlah = $this->db->query("select * from chat where chat_penerima='$id_dokter' and chat_penerima_jenis='dokter' and chat_pengirim='$id_pelanggan' and chat_pengirim_jenis='pelanggan' and chat_status='0'")->num_rows();
									?>
									<span class="badge badge-success"><?php echo $jumlah; ?></span>
								</li>
							</a>
						<?php } ?>
					</ul>

				</div>
			</div>

		</div>



	</div>

</section>

</div>