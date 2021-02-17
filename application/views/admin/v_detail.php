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
				<form method="POST" action="<?= site_url('c_belanja/save_rincian') ?>">
					<button type="submit" class="btn btn-primary">Simpan</button>
					<input type="hidden" name="id_dpa" value="<?= $id_dpa ?>">
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
						<tbody>
							<?php foreach ($detail as $key => $d) { ?>
							<tr>
								<td>
									<?php if ($d->butuh_rincian==1) { ?>
									<span class="btn btn-success" onclick="tambahRincian(this, '<?= $d->id_detail ?>')"><i class="fa fa-plus"></i></span>
									<?php } ?>
								</td>
								<td ><?= $d->kode_rekening; ?></td>
								<td ><?= $d->uraian; ?></td>
								<td colspan="6">
								</td>
							</tr>
							<?php foreach ($d->rincian as $key => $rincian) { ?>
							<tr>
								<td>
									<span class="btn btn-danger" onclick="hapusKolom(this)"><i class="fa fa-trash"></i></span>
								</td>
								<td colspan="2">
									<input name="id_detail[]" type="hidden" value="<?= $d->id_detail ?>" />
								</td>
								<td>
									<textarea class="form-control" name="keterangan[]" placeholder="Keterangan"><?= $rincian->keterangan; ?></textarea>
								</td>
								<td>
									<input class="form-control" name="koefisien[]" type="text" placeholder="Koefisien" value="<?= $rincian->koefisien ?>" />
								</td>
								<td>
									<input class="form-control" name="satuan[]" type="text" placeholder="Satuan" value="<?= $rincian->satuan ?>" />
								</td>
								<td>
									<input class="form-control" name="harga[]" type="text" placeholder="Harga" value="<?= $rincian->harga ?>" />
								</td>
								<td>
									<input class="form-control" name="ppn[]" type="text" placeholder="PPN" value="<?= $rincian->PPN ?>" />
								</td>
								<td>
									<input class="form-control" name="jumlah[]" type="text" placeholder="Jumlah" value="<?= $rincian->jumlah ?>" />
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
<script type="text/javascript">

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
		barisRincianBaru.addClass('barisRincianBaru')

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
		kolomKet.append('<textarea class="form-control" name="keterangan[]" placeholder="Keterangan"></textarea>')
		kolomKoefisien.append('<input class="form-control" name="koefisien[]" type="text" placeholder="Koefisien" />')
		kolomSatuan.append('<input class="form-control" name="satuan[]" type="text" placeholder="Satuan" />')
		kolomHarga.append('<input class="form-control" name="harga[]" type="text" placeholder="Harga" />')
		kolomPPN.append('<input class="form-control" name="ppn[]" type="text" placeholder="PPN" />')
		kolomJumlah.append('<input class="form-control" name="jumlah[]" type="text" placeholder="Jumlah" />')

		barisRincianBaru.append(kolomHapus)
		barisRincianBaru.append(kolomIdDetail)
		barisRincianBaru.append(kolomKet)
		barisRincianBaru.append(kolomKoefisien)
		barisRincianBaru.append(kolomSatuan)
		barisRincianBaru.append(kolomHarga)
		barisRincianBaru.append(kolomPPN)
		barisRincianBaru.append(kolomJumlah)
		barisUraian.after(barisRincianBaru)
	}

	function hapusKolom(el){
		$(el).closest('tr').remove()
	}

	$(document).ready(()=> {

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