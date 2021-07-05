<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>E-Planning</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?php echo base_url();?>adminlte/plugins/fontawesome-free/css/all.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<!-- Tempusdominus Bbootstrap 4 -->
	<link rel="stylesheet" href="<?php echo base_url();?>adminlte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
	 <!-- Select2 -->
	  <link rel="stylesheet" href="<?php echo base_url();?>adminlte/plugins/select2/css/select2.min.css">
	  <link rel="stylesheet" href="<?php echo base_url();?>adminlte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
	<!-- iCheck -->
	<link rel="stylesheet" href="<?php echo base_url();?>adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?php echo base_url();?>adminlte/dist/css/adminlte.min.css">
	<!-- overlayScrollbars -->
	<link rel="stylesheet" href="<?php echo base_url();?>adminlte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
	<!-- Daterange picker -->
	<link rel="stylesheet" href="<?php echo base_url();?>adminlte/plugins/daterangepicker/daterangepicker.css">
	<!-- summernote -->
	<link rel="stylesheet" href="<?php echo base_url();?>adminlte/plugins/summernote/summernote-bs4.css">
	<!-- Google Font: Source Sans Pro -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
	<!-- DataTables -->
	<link rel="stylesheet" href="<?php echo base_url();?>adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
	<!-- SweetAlert -->
	<link rel="stylesheet" href="<?php echo base_url();?>adminlte/sa/dist/sweetalert2.min.css">
	<!-- jQuery -->
	<script src="<?= base_url('assets/adminlte/plugins/jquery/jquery.min.js') ?>"></script>
	<script>
		function tampilkan(){
			var kategori=document.getElementById("form1").kategori.value;
			if (kategori=="Program Pemenuhan Upaya Kesehatan Perorangan dan Upaya Kesehatan Masyarakat")
			{
				document.getElementById("kegiatan").innerHTML="<option value='' disabled selected>Pilih Kegiatan</option><option value='Penyedia Layanan Kesehatan Untuk UKM dan UKP Rujukan Tingkat Daerah Kabupaten /Kota (RSUD)'>Penyedia Layanan Kesehatan Untuk UKM dan UKP Rujukan Tingkat Daerah Kabupaten /Kota (RSUD)</option><option value='Penyedia Fasilitas Pelayanan Kesehatan untuk UKM dan UKP Kewenangan Daerah Kabupaten /Kota (RSUD)'>Penyedia Fasilitas Pelayanan Kesehatan untuk UKM dan UKP Kewenangan Daerah Kabupaten /Kota (RSUD)</option><option value='Penerbitan Izin Rumah Sakit kelas C,D dan Fasilitas Pelayanan Kesehatan tingkat Daerah Kabupaten atau kota'>Penerbitan Izin Rumah Sakit kelas C,D dan Fasilitas Pelayanan Kesehatan tingkat Daerah Kabupaten atau kota</option>";
			}
			else if (kategori=="Program Penunjang Urusan Pemerintahan Daerah Kabupaten/Kota")
			{
				document.getElementById("kegiatan").innerHTML="<option value='' disabled selected>Pilih Kegiatan</option><option value='Peningkatan Pelayanan RSUD'>Peningkatan Pelayanan RSUD</option>";
			}
		}
		function tampilkansub(){
			var sub=document.getElementById("form1").kegiatan.value;
			if (sub=="Penyedia Layanan Kesehatan Untuk UKM dan UKP Rujukan Tingkat Daerah Kabupaten /Kota (RSUD)")
			{
				document.getElementById("tampil").innerHTML="<option value='' disabled selected>Pilih Sub</option><option value='Operasional Pelayanan RSUD'>Operasional Pelayanan RSUD</option>";
			}
			else if (sub=="Penyedia Fasilitas Pelayanan Kesehatan untuk UKM dan UKP Kewenangan Daerah Kabupaten /Kota (RSUD)")
			{
				document.getElementById("tampil").innerHTML="<option value='' disabled selected>Pilih Sub</option><option value='Pengadaan Prasarana dan Pendukung Fasilitas Pelayanan Kesehatan(RSUD)'>Pengadaan Prasarana dan Pendukung Fasilitas Pelayanan Kesehatan(RSUD)</option><option value='Pengadaan Alat Kesehatan atau Alat Penunjang Medik Fasilitas Pelayanan Kesehatan'>Pengadaan Alat Kesehatan atau Alat Penunjang Medik Fasilitas Pelayanan Kesehatan</option>";
			}
			else if (sub=="Penerbitan Izin Rumah Sakit kelas C,D dan Fasilitas Pelayanan Kesehatan tingkat Daerah Kabupaten atau kota")
			{
				document.getElementById("tampil").innerHTML="<option value='' disabled selected>Pilih Sub</option><option value='Peningkatan Tata Kelola RSUD dan Fasilitas Pelayanan Kesehatan Tingkat daerah kabupaten/Kota'>Peningkatan Tata Kelola RSUD dan Fasilitas Pelayanan Kesehatan Tingkat daerah kabupaten/Kota</option>";
			}
			else if (sub=="Peningkatan Pelayanan RSUD")
			{
				document.getElementById("tampil").innerHTML="<option value='' disabled selected>Pilih Sub</option><option value='Pelayanan dan Penunjang Pelayanan BLUD'>Pelayanan dan Penunjang Pelayanan BLUD</option>";
			}
		}

	</script>
</head>

<style>
body {
	padding-right: 0 !important;
}
</style>

<body class="sidebar-mini sidebar-collapse layout-fixed">
	<div class="wrapper">

		<!-- Navbar -->
		<nav class="main-header navbar navbar-expand navbar-white navbar-light">
			<!-- Left navbar links -->
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
				</li>
				<li class="nav-item d-none d-sm-inline-block">
					<a href="<?php echo site_url();?>index.php/C_Admin" class="nav-link">Home</a>
				</li>
			</ul>

			<!-- Right navbar links -->
			<ul class="navbar-nav ml-auto">
				<!-- Notifications Dropdown Menu -->
				<li class="nav-item dropdown">
					<a class="nav-link" data-toggle="dropdown" href="#">
						<i class="far fa-user"></i>
					</a>
					<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
						<span class="dropdown-item dropdown-header"><?php echo $this->session->username; ?> | <?php echo $this->session->nama_ruangan; ?></span>
						<div class="dropdown-divider"></div>
						<!-- <a href="#" class="dropdown-item" data-toggle="modal" data-target="#changePass">
							<i class="fas fa-key mr-2"></i> Ganti Password
						</a> -->
						<div class="dropdown-divider"></div>
						<a href="<?php echo base_url();?>index.php/C_login/logout" class="dropdown-item">
							<i class="fas fa-sign-out-alt mr-2"></i> Logout
						</a>
					</div>
				</li>
			</ul>
		</nav>

		<!-- Main Sidebar Container -->
		<aside class="main-sidebar sidebar-dark-primary elevation-4">
			<!-- Brand Logo -->
			<!-- <a href="index3.html" class="brand-link">
				<img src="<?php echo base_url();?>assets/adminlte/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
				style="opacity: .8">
				<span class="brand-text font-weight-light">AdminLTE 3</span>
			</a> -->

			<!-- Sidebar -->
			<div class="sidebar">
				<!-- Sidebar user panel (optional) -->
				<div class="user-panel mt-3 pb-3 mb-3 d-flex">
					<div class="image">
						<img src="<?php echo base_url();?>assets/login/images/rsud.png" class="img-circle elevation-2" alt="User Image">
					</div>
					<div class="info">
						<a href="#" class="d-block"><?php echo $this->session->username; ?></a>
					</div>
				</div>

				<!-- Sidebar Menu -->
				<nav class="mt-2">
					<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
						<!-- Add icons to the links using the .nav-icon class
						with font-awesome or any other icon font library -->
						<li class="nav-item">
							<a href="<?php echo site_url();?>/C_admin" class="nav-link">
								<i class="nav-icon fas fa-archive"></i>
								<p>
									Dashboard
								</p>
							</a>
						</li>


						<li class="nav-item">
							<a href="<?php echo site_url();?>/C_admin/viewAkun" class="nav-link" >
								<i class="nav-icon fas fa-users"></i>
								<p>
									List Akun
								</p>
							</a>
						</li>

						<li class="nav-item has-treeview">
							<a href="<?php echo site_url('C_Belanja')?>" class="nav-link">
								<i class="nav-icon fas fa-tasks"></i>
								<p>
									Sub Kegiatan Belanja
									<i class="fas fa-angle-left right"></i>
								</p>
							</a>
							<ul class="nav nav-treeview">
								<li class="nav-item">
									<a href="<?php echo site_url('C_Belanja')?>" class="nav-link">
										<i class="far fa-circle nav-icon"></i>
										<p>SK Belanja</p>
									</a>
								</li>
							</ul>
							<ul class="nav nav-treeview">
								<li class="nav-item">
									<a href="<?php echo site_url();?>/C_admin/RKA" class="nav-link">
										<i class="far fa-circle nav-icon"></i>
										<p>RKA</p>
									</a>
								</li>
							</ul>
						</li>

						<li class="nav-item">
							<a href="<?php echo site_url();?>/C_Admin/getDetailUsulanUnit/<?php echo $this->session->nama_ruangan; ?>" class="nav-link" >
								<i class="nav-icon fas fa-key"></i>
								<p>
									Usulan
								</p>
							</a>
						</li>

						<li class="nav-item has-treeview">
							<a href="#" class="nav-link">
								<i class="nav-icon fas fa-list"></i>
								<p>
									Master Data
									<i class="fas fa-angle-left right"></i>
								</p>
							</a>
							<ul class="nav nav-treeview">
								<li class="nav-item">
									<a href="<?= site_url('c_admin/detail_belanja');?>" class="nav-link">
										<i class="far fa-circle nav-icon"></i>
										<p>Nomor Rekening</p>
									</a>
								</li>
							</ul>
							<ul class="nav nav-treeview">	
								<li class="nav-item">
									<a href="<?php echo site_url();?>/C_admin/getItemUsulan" class="nav-link">
										<i class="far fa-circle nav-icon"></i>
										<p>Item Usulan</p>
									</a>
								</li>
							</ul>
						</li>

					</ul>
				</nav>
			</div>
		</aside>

		<div class="content-wrapper">
			<!-- <div class="modal fade" id="changePass" tabindex="-1" role="dialog" aria-labelledby="changePassLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="changePassLabel">Ganti Password</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form action="<?php echo site_url();?>/C_UpdateAkun/changePass" method="post">
								<div class="form-group">
									<label for="title">Password Lama</label>
									<input type="password" class="form-control" name="passold" required>
									<div class="invalid-feedback">Isi Password Lama</div>
								</div>
								<div class="form-group">
									<label for="title">Password Baru</label>
									<input type="password" class="form-control" name="passnew" required>
									<div class="invalid-feedback">Isi Password Baru</div>
								</div>
								<div class="form-group">
									<label for="title">Konfirmasi Password</label>
									<input type="password" class="form-control" name="passconf" required>
									<div class="invalid-feedback">Isi Konfirmasi Password Baru</div>
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
								<button type="submit" class="btn btn-primary">Simpan Perubahan</button>
							</div>
						</form>
					</div>
				</div>
			</div> -->