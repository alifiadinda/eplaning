<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0 text-dark">Daftar Detail Uraian</h1>
			</div>
		</div>
	</div>
</div>


<div class="card">
	<div class="card-body">
		<div class="row">
			<div class="col-sm-12">
				<!-- <pre>
					<?php print_r($detail) ?>
				</pre> -->
				<form method="POST" action="<?= site_url('c_karu/save_rincian') ?>">
					<a class="btn btn-danger" href="<?= base_url('index.php/c_karu/rka') ?>">Kembali</a>
					<button type="submit" class="btn btn-success">Simpan</button>
					<br><br> 
					<!-- Button trigger modal -->
<button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-xl">
                <i class="fa fa-plus">  Add Rekening </i>
                </button>
					<input type="hidden" name="id_dpa" value="<?= $id_dpa  ?>">
					<input type="hidden" name="alokasi" id="input_alokasi"/>
					<input type="hidden" id="base-url" value="<?= base_url() ?>">
					<br>
					<br>
					<table class="table">
						<thead>
							<tr>
								<th>Aksi</th>
								<th>No Rekening</th>
								<th>Uraian</th>
								<th style="width: 30%">Keterangan</th>
								<th>Koefisien</th>
								<th>Satuan</th>
								<th>Harga</th>
								<th>PPN</th>
								<th>Jumlah</th>
							</tr>
						</thead>
						<tbody id="table-uraian">
							<?php foreach ($detail_table as $key => $d) { ?>
							<tr class="barisRincian<?= $d->id_detail; ?> kode_rekening <?= ($d->parent) ? str_replace('.','_',$d->kode_rekening_parent) : '' ?>" id="<?= str_replace('.','_',$d->kode_rekening) ?>">
								<td>
									<?php if ($d->butuh_rincian==1) { ?>
									<span class="btn btn-success" onclick="tambahRincian(this, '<?= $d->id_detail ?>')"><i class="fa fa-plus"></i></span>
									<?php } ?>
								</td>
								<td ><?= $d->kode_rekening; ?></td>
								<td ><?= $d->uraian; ?></td>
								<td colspan="5">
								</td>
								<td class="text-right <?= (!$d->parent) ? 'alokasi' : '' ?>">0</td>
							</tr>
							<?php foreach ($d->rincian as $key => $rincian) { ?>
							<tr class="barisRincian<?= $d->id_detail; ?> <?= str_replace('.','_',$d->kode_rekening) ?>">
								<td>
									<span class="btn btn-danger" onclick="hapusKolom(this)"><i class="fa fa-trash"></i></span>
								</td>
								<td colspan="2">
									<input name="id_detail[]" type="hidden" value="<?= $d->id_detail ?>" />
								</td>
								<td>
									<textarea class="form-control" name="keterangan[]" placeholder="Keterangan" required><?= $rincian->keterangan; ?></textarea>
								</td>
								<td>
									<input class="form-control" name="koefisien[]" type="text" placeholder="Koefisien" required value="<?= $rincian->koefisien ?>" />
								</td>
								<td>
									<input class="form-control" name="satuan[]" type="text" placeholder="Satuan" required value="<?= $rincian->satuan ?>" />
								</td>
								<td>
									<input class="form-control" name="harga[]" type="text" placeholder="Harga" required value="<?= $rincian->harga ?>" />
								</td>
								<td>
									<input class="form-control" name="ppn[]" type="text" placeholder="PPN" required value="<?= $rincian->PPN ?>" />
								</td>
								<td class="inputRincian">
									<input class="form-control" name="jumlah[]" type="text" onchange="changeAlokasi()" placeholder="Jumlah" required value="<?= $rincian->jumlah ?>" />
								</td>
							</tr>
							<?php } ?>
							<?php } ?>
						</tbody>
					</table>
				</form>
			</div>
		</div>
	</div>
</div>

<!-- Modal -->
	  <div class="modal fade" id="modal-xl">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Kode Rekening</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
            	<th></th>
                <th>Kode rekening</th>
                <th>Uraian</th>
            </tr>
        </thead>
        <tbody>

            <?php foreach ($detail as $key => $d) { ?>
            <tr>
            	<td>
            		<div class="form-check">
                    	<input type="checkbox" class="form-check-input" id="id_detail[]" value="<?php echo $d->id_detail ?>">
                  	</div>
              	</td>
                <td><?php echo $d->kode_rekening ?></td>
                <td><?php echo $d->uraian?></td>
            </tr>
        	<?php }; ?>
            
        </tbody>
    </table>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary" id="tambah" >Save changes</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>

<script type="text/javascript">

	function changeAlokasi(e){
		refreshJumlah()
		refreshAlokasi()
	}

	function buatIdRandom() {
		var result				= '';
		var characters 			= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
		var charactersLength 	= characters.length;
		for (var i = 0; i < 10; i++) {
			result += characters.charAt(Math.floor(Math.random() * charactersLength));
		}
		return result;
	}

	function tambahRincian(el, id_detail) {
		const barisUraian = $(el).closest('tr')
		const barisRincianBaru = $('<tr>')
		barisRincianBaru.addClass('barisRincian'+id_detail)

		const kolomHapus		= $('<td>')
		const kolomIdDetail 	= $('<td>')
		const kolomKet 			= $('<td>')
		const kolomKoefisien 	= $('<td>')
		const kolomSatuan 		= $('<td>')
		const kolomHarga 		= $('<td>')
		const kolomPPN 			= $('<td>')
		const kolomJumlah 		= $('<td>')

		kolomHapus.append('<span class="btn btn-danger" onclick="hapusKolom(this)"><i class="fa fa-trash"></i></span>')
		kolomIdDetail.append(`<input name="id_detail[]" type="hidden" value="${id_detail}" />`)
		kolomIdDetail.prop('colspan', 2)
		kolomKet.append('<textarea class="form-control" name="keterangan[]" placeholder="Keterangan" required></textarea>')
		kolomKoefisien.append('<input class="form-control" name="koefisien[]" type="text" placeholder="Koefisien" required />')
		kolomSatuan.append('<input class="form-control" name="satuan[]" type="text" placeholder="Satuan" required />')
		kolomHarga.append('<input class="form-control" name="harga[]" type="text" placeholder="Harga" required />')
		kolomPPN.append('<input class="form-control" name="ppn[]" type="text" placeholder="PPN" required />')
		kolomJumlah.append('<input class="form-control" name="jumlah[]" type="text" onchange="refreshAlokasi()" placeholder="Jumlah" required />')

		barisRincianBaru.append(kolomHapus)
		barisRincianBaru.append(kolomIdDetail)
		barisRincianBaru.append(kolomKet)
		barisRincianBaru.append(kolomKoefisien)
		barisRincianBaru.append(kolomSatuan)
		barisRincianBaru.append(kolomHarga)
		barisRincianBaru.append(kolomPPN)
		barisRincianBaru.append(kolomJumlah)
		$('.barisRincian'+id_detail).last().after(barisRincianBaru)
		refreshJumlah()
	}

	function hapusKolom(el){
		$(el).closest('tr').remove()
		refreshJumlah()
	}

	function refreshJumlah(){
		const tr_parent = $($('.kode_rekening').get().reverse())

		tr_parent.each((index,item)=>{
			let jumlah = 0
			
			const tr_child = $('.'+item.id)
			tr_child.each((index2,item2)=>{
				const last_col = $(item2).children().last()
				if (last_col.hasClass('inputRincian')) {
					const value =  parseInt(last_col.find('input').val())
					jumlah += value
				} else {
					const value = parseInt(last_col.text().trim())
					jumlah += value
				}
			})
			
			$(item).children().last().text(jumlah)
		})

		refreshAlokasi()

	}

	function refreshAlokasi(){
		let alokasi = 0
		const td_alokasi = $('.alokasi')
		td_alokasi.each((index,item)=>{
			const isi = parseInt($(item).text())
			alokasi += isi
		})

		$('#input_alokasi').val(alokasi)
	}

	$(document).ready(()=> {

		refreshJumlah()
		refreshAlokasi()

		const body = $('#body')

		$('#add_btn').click(()=>{
			const tr = $('<tr>')
			const td1 = $('<td>')
			const td2 = $('<td>')
			const td3 = $('<td>')
			const td4 = $('<td>')
			const td5 = $('<td>')
			const td6 = $('<td>')
			const td7 = $('<td>')
			const td8 = $('<td>')

			td1.append(`<button class="btn btn-danger" onclick="hapusBaris(this)">Hapus</button>`)
			td2.append(`<input class="form-control" type="text" />`)
			td3.append(`<input class="form-control" type="text" />`)
			td4.append(`<input class="form-control" type="text" />`)
			td5.append(`<input class="form-control" type="text" />`)
			td6.append(`<input class="form-control" type="text" />`)
			td7.append(`<input class="form-control" type="text" />`)
			td8.append(`<input class="form-control" type="text" />`)


			tr.append(td1)
			tr.append(td2)
			tr.append(td3)
			tr.append(td4)
			tr.append(td5)
			tr.append(td6)
			tr.append(td7)
			tr.append(td8)

			body.append(tr)
		})

	})

</script>

<script>
	
$(document).ready(function() {
    $('#example').DataTable();
} );

</script>

<script>
	
	$(function(){
      $('#tambah').click(function(){
        $(':checkbox:checked').each(function(i){
      		var dataSend = {
      			id_detail: $(this).val(),
      			id_dpa: window.location.pathname.split("/").pop()
      		}
      		$.ajax({
	            type: "POST",
	            url: $('#base-url').val()+'index.php/C_Belanja/detailsave/',
	            data:dataSend,
	            success: function (response) {
	            	if (response==1) {
	            		$('#modal-xl').modal('hide');
	            		location.reload();
	            	} else {
	            		alert('Gagal Save Data');
	            	}
		        }
		    });
        });
      });
    });

</script>