<!DOCTYPE html>
<html>
<head>
	<?php 
	// data pengaturan website
	$pengaturan = $this->m_data->get_data('pengaturan')->row();
	?>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php echo $pengaturan->nama ?> | Dashboard</title>
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/Ionicons/css/ionicons.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/skins/_all-skins.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/morris.js/morris.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/jvectormap/jquery-jvectormap.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/bootstrap-daterangepicker/daterangepicker.css">
	
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.css">

	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
	<!-- CSS only -->
	<!--link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">-->
</head>	
<body class="hold-transition skin-blue sidebar-mini">
	<div class="wrapper">

		<header class="main-header">			
			<a target="_blank" href="<?php echo base_url(); ?>" class="logo">
				<span class="logo-mini"><b><?php echo $pengaturan->nama ?></b></span>
				<span class="logo-lg"><?php echo $pengaturan->nama ?></span>
			</a>
			
			<nav class="navbar navbar-static-top">
				
				<a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
					<span class="sr-only">Toggle navigation</span>
				</a>

				<div class="navbar-custom-menu">
					<ul class="nav navbar-nav">
						<li class="">
							<a href="<?php echo base_url() ?>" target="_blank">
							 	<i class="fa fa-globe"></i> LIHAT WEBSITE
							</a>
						</li>
						<li class="dropdown user user-menu">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<img src="<?php echo base_url(); ?>assets/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
								<span class="hidden-xs">HAK AKSES : <b>Admin</b></span>
							</a>
							<ul class="dropdown-menu">
								<li class="user-header">
									<img src="<?php echo base_url(); ?>assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
									<p>
										<?php echo $this->session->userdata('username') ?>
										<small>Hak akses : Admin</small>
									</p>
								</li>
								
								<li class="user-footer">
									<div class="pull-left">
										<a href="<?php echo base_url().'dashboard/profil' ?>" class="btn btn-default btn-flat">Profil</a>
									</div>
									<div class="pull-right">
										<a href="<?php echo base_url().'dashboard/keluar' ?>" class="btn btn-default btn-flat">Keluar</a>
									</div>
								</li>
							</ul>
						</li>
						
					</ul>
				</div>
			</nav>
		</header>
		<aside class="main-sidebar">
			<section class="sidebar">
				<div class="user-panel">
					<div class="pull-left image">
						<img src="<?php echo base_url(); ?>assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
					</div>
					<div class="pull-left info">
						<?php 
						$id_user = $this->session->userdata('id');
						$user = $this->db->query("select * from pengguna where pengguna_id='$id_user'")->row();
						?>
						<p><?php echo $user->pengguna_nama; ?></p>
						<a href="#"><i class="fa fa-circle text-success"></i> Online</a>
					</div>
				</div>
				
				<ul class="sidebar-menu" data-widget="tree">
					<li class="header">MAIN NAVIGATION</li>
					<li>
						<a href="<?php echo base_url().'dashboard' ?>">
							<i class="fa fa-dashboard"></i>
							<span>DASHBOARD</span>
						</a>
					</li>

					<li class="treeview">
						<a href="#">
							<i class="fa fa-cog"></i>
							<span>HALAMAN DEPAN</span>
							<span class="pull-right-container">
								<i class="fa fa-angle-left pull-right"></i>
							</span>
						</a>
						<ul class="treeview-menu">
							<li>
								<a href="<?php echo base_url().'dashboard/pengaturan' ?>">
									<i class="fa fa-edit"></i>
									<span>PROFIL WEB</span>
								</a>
							</li>

							<li>
								<a href="<?php echo base_url().'dashboard/slider' ?>">
									<i class="fa fa-edit"></i>
									<span>PROFIL BANNER</span>
								</a>
							</li>

						</ul>
					</li>

					<li>
						<a href="<?php echo base_url().'dashboard/foto' ?>">
							<i class="fa fa-photo"></i>
							<span>GALERI FOTO</span>
						</a>
					</li>

					<li>
						<a href="<?php echo base_url().'dashboard/pelanggan' ?>">
							<i class="fa fa-users"></i>
							<span>USER PELANGGAN</span>
						</a>
					</li>

					<li>
						<a href="<?php echo base_url().'dashboard/peternak' ?>">
							<i class="fa fa-users"></i>
							<span> USER PETERNAK BINAAN</span>
						</a>
					</li>
					
					<li>
						<a href="<?php echo base_url().'dashboard/dokter' ?>">
							<i class="fa fa-users"></i>
							<span>USER DOKTER HEWAN</span>
						</a>
					</li>

					<li>
						<a href="<?php echo base_url().'dashboard/pengguna' ?>">
							<i class="fa fa-users"></i>
							<span>ADMIN</span>
						</a>
					</li>

					<li>
						<a href="<?php echo base_url().'dashboard/agenda' ?>">
							<i class="fa fa-files-o"></i>
							<span>AGENDA</span>
						</a>
					</li>

					<li>
						<a href="<?php echo base_url().'dashboard/produk' ?>">
							<i class="fa fa-dropbox"></i>
							<span>PRODUK</span>
						</a>
					</li>

					<li>
						<a href="<?php echo base_url().'dashboard/kategori' ?>">
							<i class="fa fa-th"></i>
							<span>KATEGORI PRODUK</span>
						</a>
					</li>

					<li>
						<a href="<?php echo base_url().'dashboard/pengajuan' ?>">
							<i class="fa fa-th"></i>
							<span> LAPORAN PENGAJUAN</span>
						</a>
					</li>

					<li>
						<a href="<?php echo base_url().'dashboard/unduh' ?>">
							<i class="fa fa-files-o"></i>
							<span>PUSAT UNDUH</span>
						</a>
					</li>

					<li>
						<a href="<?php echo base_url().'dashboard/profil' ?>">
							<i class="fa fa-user"></i>
							<span>PROFIL</span>
						</a>
					</li>

					<li>
						<a href="<?php echo base_url().'dashboard/ganti_password' ?>">
							<i class="fa fa-lock"></i>
							<span>GANTI PASSWORD</span>
						</a>
					</li>
					
					<li>
						<a href="<?php echo base_url().'dashboard/keluar' ?>">
							<i class="fa fa-share"></i>
							<span>KELUAR</span>
						</a>
					</li>
				
					
				</ul>
			</section>
		</aside>