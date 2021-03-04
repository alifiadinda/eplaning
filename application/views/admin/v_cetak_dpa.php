<!DOCTYPE html>
<html>
<head>
	<title>Cetak DRAFT DPA</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
	<div>
			<table class="table table-bordered">
			<thead class="text-center">
				<tr>
					<th colspan="2">DOKUMEN PELAKSANAAN ANGGARAN SATUAN KERJA PERANGKAT DAERAH</th>
					<th rowspan="2" style="vertical-align: middle;">Formulir <br> <?php echo $DPA->status?></th>
				</tr>
				<tr>
					<th>Pemerintahan Kota Malang Tahun Anggaran 2021</th>
				</tr>
			</thead>
		</table>

		<table class="table table-bordered">
			<thead class="text-center">
				<tr>
					<th colspan="2">Indikator &amp; Tolok Ukur</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<th>Program</th>
					<td colspan="2"><?php echo $DPA->program?></td>
				</tr>
				<tr>
					<th>Kegiatan</th>
					<td colspan="2"><?php echo $DPA->kegiatan?></td>
				</tr>
				<tr>
					<th>Sub Kegiatan</th>
					<td colspan="2"><?php echo $DPA->subkegiatan?></td>
				</tr>
				<tr>
					<th>Indikator</th>
					<td colspan="2"><?php echo $DPA->indikator?></td>
				</tr>
				<tr>
					<th>Target</th>
					<td colspan="2"><?php echo $DPA->target?></td>
				</tr>
				<tr>
					<th>Alokasi Tahun 2021</th>
					<td colspan="2" id="alokasi"></td>
				</tr>
			</tbody>
		</table>

		<table class="table table-bordered">
			<thead class="text-center">
				<tr>
					<th rowspan="2" style="vertical-align: middle;">Kode Rekening</th>
					<th rowspan="2" style="vertical-align: middle;">Uraian</th>
					<th colspan="4">Rincian Perhitungan</th>
					<th rowspan="2" style="vertical-align: middle;">Jumlah</th>
				</tr>
				<tr>
					<th>Koefisien</th>
					<th>Satuan</th>
					<th>Harga</th>
					<th>PPN</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($detail as $ke_d => $d) { ?>
				<tr class="barisRincian<?= $d->id_detail; ?> kode_rekening <?= ($d->parent) ? str_replace('.','_',$d->kode_rekening_parent) : '' ?>" id="<?= str_replace('.','_',$d->kode_rekening) ?>">
					<td class="font-weight-bold"><?= $d->kode_rekening; ?></td>
					<td class="font-weight-bold"colspan="5"><?= $d->uraian; ?></td>
					<td class="font-weight-bold text-right jumlah <?= (!$d->parent) ? 'alokasi' : '' ?>">0</td>
				</tr>
				<?php foreach ($d->rincian as $key_r => $r) { ?>
				<tr class="barisRincian<?= $d->id_detail; ?> <?= str_replace('.','_',$d->kode_rekening) ?>">
					<td></td>
					<td><?= $r->keterangan; ?></td>
					<td><?= $r->koefisien; ?></td>
					<td><?= $r->satuan; ?></td>
					<td class="text-right harga"><?= $r->harga; ?></td>
					<td><?= $r->PPN; ?></td>
					<td class="text-right jumlah"><?= $r->jumlah; ?></td>
				</tr>
				<?php } ?>

				<?php } ?>
			</tbody>
		</table>
	</div>

	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

	<script type="text/javascript">
		function refreshJumlah(){
			const tr_parent = $($('.kode_rekening').get().reverse())

			tr_parent.each((index,item)=>{
				let jumlah = 0

				const tr_child = $('.'+item.id)
				tr_child.each((index2,item2)=>{
					const last_col = $(item2).children().last()
					const value = parseInt(last_col.text().trim())
					jumlah += value
				})

				$(item).children().last().text(jumlah)
			})
		}

		function refreshAlokasi(){
			let alokasi = 0
			const td_alokasi = $('.alokasi')
			td_alokasi.each((index,item)=>{
				const isi = parseInt($(item).text())
				alokasi += isi
			})
			$('#alokasi').text(rupiah(alokasi.toString(), 'Rp. '))

		}


		function formatRupiah(){
			// cara mengambil view pakai jquery
			const td_jumlah = $('.jumlah')
			td_jumlah.each((index,item)=>{
				const jumlah = $(item).html()
				$(item).html(rupiah(jumlah, 'Rp.'))
			})

			const td_harga = $('.harga')
			td_harga.each((index,item)=>{
				const harga = $(item).html()
				$(item).html(rupiah(harga))
			})
		}

		function rupiah(angka, prefix){
			var number_string = angka.replace(/[^,\d]/g, '').toString(),
			split   = number_string.split(','),
			sisa     = split[0].length % 3,
			rupiah     = split[0].substr(0, sisa),
			ribuan     = split[0].substr(sisa).match(/\d{3}/gi);

			if(ribuan){
				separator = sisa ? '.' : '';
				rupiah += separator + ribuan.join('.');
			}

			rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
			return prefix == undefined ? rupiah : (rupiah ? prefix + rupiah : '');
		}

		$(document).ready(()=>{
			refreshJumlah()
			refreshAlokasi()
			formatRupiah()
		})

	</script>

</body>
</html>