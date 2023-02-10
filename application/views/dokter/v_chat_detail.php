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

		<div class="col-lg-8">
			
			<div class="box box-primary direct-chat direct-chat-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Percakapan : <?php echo $pelanggan->pelanggan_nama ?></h3>
					

					<div class="box-body">
						<hr>
						<div class="direct-chat-messages" id="history" style="height: 500px;overflow: scroll;">


							<?php   
							foreach($chat as $c){ 
								if($c->chat_pengirim_jenis=='pelanggan'){

									?>

									<div class="direct-chat-msg">
										<div class="direct-chat-info clearfix">
											<span class="direct-chat-name pull-left"><?php echo $pelanggan->pelanggan_nama ?></span>
											<span class="direct-chat-timestamp pull-right"><?php echo date('H:i:s d-m-Y', strtotime($c->chat_waktu)) ?></span>
										</div>

										<img class="direct-chat-img" src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Message User Image">
										<div class="direct-chat-text">
											<?php echo $c->chat_isi ?>
										</div>

									</div>
									<br>


									<?php 
								}else{
									?>
									<div class="direct-chat-msg right">
										<div class="direct-chat-info clearfix">
											<span class="direct-chat-name pull-left"><?php echo $dokter->dokter_nama ?></span>
											<span class="direct-chat-timestamp pull-right"><?php if($c->chat_status == "0"){ echo "belum dibaca";}else{echo "dibaca";} ?> | <?php echo date('H:i:s d-m-Y', strtotime($c->chat_waktu)) ?></span>
										</div>

										<?php if($dokter->dokter_foto == ""){ ?>
											<img class="direct-chat-img" src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Message User Image">
										<?php }else{ ?>
											<img class="direct-chat-img" src="<?php echo base_url() ?>gambar/dokter/<?php echo $dokter->dokter_foto ?>" alt="Message User Image">
										<?php } ?>
										
										<div class="direct-chat-text">
											<?php echo $c->chat_isi ?>
										</div>

									</div>
									<br>
									<?php
								} 
							}
							?>

							<div id="terakhir"></div>

						</div>


					</div>

					<div class="box-footer">

						<form method="post" action="<?php echo base_url('dokter/chat_aksi') ?>">
							<div class="input-group">
								<input type="hidden" name="penerima" value="<?php echo $pelanggan->pelanggan_id ?>">
								<!-- <input type="hidden" name="penerima_jenis" value="dokter"> -->
								<input type="text" name="pesan" class="form-control" placeholder="Enter text here..." autocomplete="off" required="required">                
								<span class="input-group-btn">
									<button type="submit" class="btn btn-primary btn-flat">Send</button>
								</span>
							</div>
						</form>


					</div>

				</div>

			</div>

		</div>

	</section>

</div>


<script type="text/javascript">
	var elem = document.getElementById('history');
	elem.scrollTop = elem.scrollHeight;
</script>