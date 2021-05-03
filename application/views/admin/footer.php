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

	function hapusUsulan(id_usulan) {
		// console.log(id_usulan);
		var r = confirm("Apakah anda yakin ingin menghapus data ini?");
		  if (r == true) {
			$.ajax({
				type  : 'POST',
				url   : '<?php echo base_url()?>index.php/C_Admin/hapusUsulan/'+id_usulan,
				async : false,
				dataType : 'json',
				success : function(data){
					Swal.fire({
	                    type: 'success',
	                    title: 'Berhasil Menghapus Usulan ',
	                    showConfirmButton: false,
	                    timer: 1500
	                }).then(function() { location.reload();})
				}
			});
		  }	
	}

	function hapusDetailUsulan(id_detail_usulan) {
		// console.log(id_detail_usulan);
		var r = confirm("Apakah anda yakin ingin menghapus data ini?");
		  if (r == true) {
			$.ajax({
				type  : 'POST',
				url   : '<?php echo base_url()?>index.php/C_Admin/hapusDetailUsulan/'+id_detail_usulan,
				async : false,
				dataType : 'json',
				success : function(data){
					Swal.fire({
	                    type: 'success',
	                    title: 'Berhasil Menghapus Detail Usulan ',
	                    showConfirmButton: false,
	                    timer: 1500
	                }).then(function() { location.reload();})
				}
			});
		  }	
	}

	function detailUsulan(id_usulan) {
		// console.log(id_usulan);
		$.ajax({
			type  : 'POST',
			url   : '<?php echo base_url()?>index.php/C_Admin/getDetailUsulan/'+id_usulan,
			async : false,
			dataType : 'json',
			success : function(data){
				var html = '';
				var judul = '';
				var i;
				var harga=0;
				var jumlah=0;
					// console.log(data['getDetailUsulan'].length);
				for(i=0; i<data['getDetailUsulan'].length; i++){
				    var ii = i+1;
				    html += '<tr style="center">'+
				    '<td>'+ii+' </td>'+
				    '<td>'+data['getDetailUsulan'][i].rincian_barang+' </td>'+
				    '<td> <center>'+data['getDetailUsulan'][i].volume+'</center> </td>'+
				    '<td> <center>'+data['getDetailUsulan'][i].satuan+'</center> </td>'+
				    '<td> <center>'+data['getDetailUsulan'][i].harga+'</center></td>'+
				    '<td> <center>'+data['getDetailUsulan'][i].jumlah+'</center></td>'+
				    '<td> <center>'+data['getDetailUsulan'][i].unit_pengusul+'</center></td>'+
				    '<td> <center>'+data['getDetailUsulan'][i].existing+'</center></td>'+
				    '<td> <center>'+data['getDetailUsulan'][i].alasan+'</center></td>'+
				    '<td> <center>'+data['getDetailUsulan'][i].kebutuhan_ideal+'</center></td>'+
				    '<td> <center>'+data['getDetailUsulan'][i].keterangan+'</center></td>'+
				    '</tr>';
				    judul="Detail Usulan " + data['getDetailUsulan'][i].periode;
				    harga=harga+parseInt(data['getDetailUsulan'][i].harga);
				    jumlah=jumlah+parseInt(data['getDetailUsulan'][i].jumlah);
				}

				// console.log(data['getDetailUsulan'][0].total_harga);

				$('#listDetailUsulan').find('tbody').empty();
				$('#showDetailUsulan').html(html);
				document.getElementById("harga").innerHTML = harga;
				document.getElementById("jumlah").innerHTML = jumlah;
				document.getElementById("judul").innerHTML = judul;
                $('#modalDetailUsulan').modal('show');
			}
		});		
	}

	$(document).ready(function() {

	/* DATATABLE */

		$('#dataTable').DataTable({
		  "paging": true,
		  "lengthChange": false,
		  "searching": true,
		  "ordering": true,
		  "info": true,
		  "autoWidth": true,
		});

		$('#listAkun').DataTable({
		  "paging": true,
		  "lengthChange": false,
		  "searching": true,
		  "ordering": true,
		  "info": true,
		  "autoWidth": false,
		});
	/* DATATABLE */

	/* MANAJEMEN AKUN*/
    	$('#formRegis').submit(function(e){
	    	e.preventDefault();
			// memasukkan data inputan ke variabel
			var username 	= $('#username').val();
			var password	= $('#password').val();
			var nama		= $('#nama').val();
			var level		= $('#level').val();
			var ruangan		= $('#ruangan').val();
			// console.log(nama);


			$.ajax({
				type : 'POST',
				url  : '<?php echo site_url(); ?>/C_admin/daftarAkun',
				dataType : 'JSON',
				data : {
					username:username,
					password:password,
					nama:nama,
					level:level,
					ruangan:ruangan,
				},

				success: function(data){
    					if(data.code==2){
    						Swal.fire({
    		                            type: 'warning',
    		                            title: 'Username sudah terdaftar',
    		                            showConfirmButton: true,
    		                            // timer: 1500
    		                        })
    					}else{
    		                Swal.fire({
    		                            type: 'success',
    		                            title: 'Pendaftaran Akun Penyeleksi Baru Selesai Dilakukan',
    		                            showConfirmButton: true,
    		                            // timer: 1500
    		                        }).then(function() { location.reload();})
    					} 
    	            }
	        });
			return false;
		});
	/* MANAJEMEN AKUN*/

	/* USULAN */

		/*TAMBAH USULAN*/
		$('#tambahUsulan').submit(function(e){
	    	e.preventDefault();
			// memasukkan data inputan ke variabel
			var id_usulan 		= $('#id_usulan').val();
			var nama_usulan		= $('#nama_usulan').val();
			var spesifikasi		= $('#spesifikasi').val();
			var satuan			= $('#satuan').val();
			var harga_satuan	= $('#harga_satuan').val();
			var kode_rekening	= $('#kode_rekening').val();
			var koefisien		= $('#koefisien').val();
			var jumlah			= harga_satuan*koefisien;

			alert(id_usulan);

			// $.ajax({
			// 	type : 'POST',
			// 	url  : '<?php echo site_url(); ?>/C_admin/tambahUsulan',
			// 	dataType : 'JSON',
			// 	data : {
			// 		id_usulan:id_usulan,
			// 		nama_usulan:nama_usulan,
			// 		spesifikasi:spesifikasi,
			// 		satuan:satuan,
			// 		harga_satuan:harga_satuan,
			// 		kode_rekening:kode_rekening,
			// 		koefisien:koefisien,
			// 		jumlah:jumlah,
			// 	},

			// 	success: function(data){
			// 		if(data.code==2){
			// 			Swal.fire({
		 //                            type: 'warning',
		 //                            title: 'Tanggal Pembukaan Melebihi Tanggal Penutupan',
		 //                            showConfirmButton: true,
		 //                        })
   //                  }else{
		 //                Swal.fire({
		 //                            type: 'success',
		 //                            title: 'Usulan Baru Berhasil Ditambahkan',
		 //                            showConfirmButton: true,
			// 					}).then(function() { location.reload();})
		 //            } 
	  //           }
	  //       });
			return false;
    	});
		/*TAMBAH USULAN*/

		/*EDIT USULAN*/
    	$('#listUsulan').on('click','.editUsulan',function(){
            // memasukkan data yang dipilih dari tbl list agenda updatean ke variabel 
            var upid_usulan	= $(this).data('id_usulan');
            var uptgl_buka	= $(this).data('tgl_buka');
            var uptgl_tutup	= $(this).data('tgl_tutup');
			// console.log(upid_usulan);
            
            // memasukkan data ke form updatean
            $('[name="edt_id_usulan"]').val(upid_usulan);
            $('[name="edt_tgl_buka"]').val(uptgl_buka);
            $('[name="edt_tgl_tutup"]').val(uptgl_tutup);
            
            $('#modalEditUsulan').modal('show');
        });

    	$('#formEditUsulan').submit(function(e){
            e.preventDefault(); 
            // memasukkan data dari form update ke variabel untuk update db
            var up_id_usulan	= $('#edt_id_usulan').val();
            var up_tgl_buka		= $('#edt_tgl_buka').val();
            var up_tgl_tutup	= $('#edt_tgl_tutup').val();
			// alert(up_email);

            $.ajax({
                type : "POST",
                url  : "<?php echo site_url(); ?>/C_admin/updateUsulan",
                dataType : "JSON",
                data : { 
                    u_id_usulan:up_id_usulan,
                    u_tgl_buka:up_tgl_buka,
                    u_tgl_tutup:up_tgl_tutup,
                },

                success: function(data){
                    if (data.code==2) {
                         Swal.fire({
                                type: 'error',
		                        title: 'Tanggal Pembukaan Melebihi Tanggal Penutupan',
                                text: 'Periksa kembali tanggal yang dimasukkan',
                                showConfirmButton: true,
                            })
                    }else{
                        Swal.fire({
                                type: 'success',
		                        title: 'Periode Usulan Berhasil Diupdate',
                                showConfirmButton: true,
                            }).then(function() { location.reload();})
                    }
                }
            });
            return false;
        });
		/*EDIT USULAN*/

	/* USULAN */

	/* DETAIL USULAN */

		/*TAMBAH DETAIL USULAN*/
		$('#formTambahDetail').submit(function(e){
	    	e.preventDefault();
			// memasukkan data inputan ke variabel
			var rincian_barang	= $('#rincian_barang').val();
			var volume			= $('#volume').val();
			var satuan			= $('#satuan').val();
			var harga			= $('#harga').val();
			var existing		= $('#existing').val();
			var alasan			= $('#alasan').val();
			var jumlah			= volume*harga;
			var id_usulan 		= $('#id_usulan').val();
			// alert(id_usulan);

			$.ajax({
				type : 'POST',
				url  : '<?php echo site_url(); ?>/C_admin/tambahDetailUsulan',
				dataType : 'JSON',
				data : {
					rincian_barang:rincian_barang,
					volume:volume,
					satuan:satuan,
					harga:harga,
					existing:existing,
					alasan:alasan,
					jumlah:jumlah,
					id_usulan:id_usulan,
				},

				success: function(data){
					if(data.code==2){
						Swal.fire({
		                            type: 'warning',
		                            title: 'Tanggal Pembukaan Melebihi Tanggal Penutupan',
		                            showConfirmButton: true,
		                            // timer: 1500
		                        })
                    }else{
		                Swal.fire({
		                            type: 'success',
		                            title: 'Periode Usulan Baru Berhasil Ditambahkan',
		                            showConfirmButton: true,
		                            // timer: 1500
								}).then(function() { location.reload();})
		            } 
	            }
	        });
			return false;
    	});
		/*TAMBAH DETAIL USULAN*/

	})
</script>