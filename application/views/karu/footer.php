<!-- jQuery -->
<script src="<?= base_url('assets/adminlte/plugins/jquery/jquery.min.js') ?>"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?= base_url('assets/adminlte/plugins/jquery-ui/jquery-ui.min.js') ?>"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('assets/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
<!-- ChartJS -->
<script src="<?= base_url('assets/adminlte/plugins/chart.js/Chart.min.js') ?>"></script>
<!-- Sparkline -->
<script src="<?= base_url('assets/adminlte/plugins/sparklines/sparkline.js') ?>"></script>
<!-- JQVMap -->
<!-- <script src="<?php echo base_url();?>assets/adminlte/plugins/jqvmap/jquery.vmap.min.js"></script> -->
<!-- <script src="<?php echo base_url();?>assets/adminlte/plugins/jqvmap/maps/jquery.vmap.usa.js"></script> -->
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url();?>assets/adminlte/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?php echo base_url();?>assets/adminlte/plugins/moment/moment.min.js"></script>
<script src="<?php echo base_url();?>assets/adminlte/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?php echo base_url();?>assets/adminlte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?php echo base_url();?>assets/adminlte/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?php echo base_url();?>assets/adminlte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>assets/adminlte/dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- <script src="<?php echo base_url();?>assets/adminlte/dist/js/pages/dashboard.js"></script> -->
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url();?>assets/adminlte/dist/js/demo.js"></script>
<!--  DataTables -->
<script src="<?php echo base_url();?>assets/adminlte/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?php echo base_url();?>assets/adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<!-- SweetAlert -->
<script src="<?php echo base_url();?>assets/adminlte/plugins/sweetalert2/sweetalert2.all.min.js"></script>
</div>

<script>
	/*TAMBAH USULAN*/
		$('#tambahUsulan').submit(function(e){
	    	e.preventDefault();
			// memasukkan data inputan ke variabel
			var id_usulan 		= $('#id_usulan').val();
			var nama_usulan		= $('#nama_usulan').val();
			var spesifikasi		= $('#spesifikasi').val();
			var satuan			= $('#satuan').val();
			var harga			= $('#harga').val();
			var kode_rekening	= $('#kode_rekening').val();
			var koefisien		= $('#koefisien').val();
			var jumlah			= harga*koefisien;

			// alert(id_usulan);

			$.ajax({
				type : 'POST',
				url  : '<?php echo site_url(); ?>/C_admin/tambahUsulan',
				dataType : 'JSON',
				data : {
					id_usulan:id_usulan,
					nama_usulan:nama_usulan,
					spesifikasi:spesifikasi,
					satuan:satuan,
					harga:harga,
					kode_rekening:kode_rekening,
					koefisien:koefisien,
					jumlah:jumlah,
				},

				success: function(data){
					if(data.code==2){
						Swal.fire({
		                            type: 'success',
		                            title: 'Jumlah Barang Usulan Berhasil Diperbarui',
		                            showConfirmButton: true,
		                        }).then(function() { location.reload();})
                    }else{
		                Swal.fire({
		                            type: 'success',
		                            title: 'Usulan Baru Berhasil Ditambahkan',
		                            showConfirmButton: true,
								}).then(function() { location.reload();})
		            } 
	            }
	        });
			return false;
    	});
		/*TAMBAH USULAN*/
</script>