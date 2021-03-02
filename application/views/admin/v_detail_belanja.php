<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0 text-dark">Daftar Detail Uraian</h1>
			</div>
		</div>
	</div>
</div>

<section class="content">
	<div class="card">
		<div class="card-body">
			<div class="row">
				<div class="col-sm-4 col-md-4 col-lg-4">
					<form method="post" action="<?= site_url('c_detailbelanja/save') ?>">
						<div class="form-group">
							<input type="hidden" class="form-control" name="id_detail" placeholder="Masukkan ID" value="<?= isset($edit) ? $edit->id_detail : ''; ?>">
						</div>
						<div class="form-group">
							<label for="kode_rekening">Kode Rekening</label>
							<input type="text" class="form-control" name="kode_rekening" placeholder="Masukkan Kode" value="<?= isset($edit) ? $edit->kode_rekening : ''; ?>">
						</div>
						<div class="form-group">
							<label for="uraian">Uraian</label>
							<textarea type="text" class="form-control" name="uraian" placeholder="Masukkan Uraian"><?= isset($edit) ? $edit->uraian : ''; ?></textarea>
						</div>
						<div class="form-group">
							<label for="parent">Parent</label>
							<select class="form-control" name="parent">
								<option value="">Pilih parent</option>
								<?php foreach ($detail as $keyy => $dd) { ?>
									<option value="<?= $dd->id_detail ?>" <?= (isset($edit) && $edit->parent==$dd->id_detail) ? 'selected' : ''; ?> ><?= $dd->kode_rekening.' '.$dd->uraian ?></option>
								<?php } ?>
							</select>
						</div>
						<div class="form-group form-check">
							<input type="checkbox" class="form-check-input" id="butuh_rincian" name="butuh_rincian" value="1" <?= isset($edit) ? $edit->butuh_rincian : ''; ?> />
							<label class="form-check-label" for="butuh_rincian">Butuh Rincian</label>
						</div>
						<?php if(isset($edit)) { ?>
						<a href="<?= site_url('c_admin/detail_belanja/') ?>" class="btn btn-success">Batal
						</a>
						<?php } ?>
						<button type="submit" class="btn btn-primary">Simpan</button>
					</form>
				</div>
				<div class="col-sm-8 col-md-8 col-lg-8">
					<!-- <?= true ? 'iya' : 'tidak'; ?> -->
					<table class="table" id="table">
						<thead>
							<tr>
								<th>#</th>
								<th>Kode Rekening</th>
								<th>Uraian</th>
								<th>Butuh Rincian</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($detail as $key => $d) { ?>
							<tr>
								<td><?= $key+1; ?></td>
								<td><?= $d->kode_rekening; ?></td>
								<td><?= $d->uraian; ?></td>
								<td><?= $d->butuh_rincian==1 ? 'Iya' : 'Tidak'; ?></td>
								<td>
									<div class="btn-group" role="group" aria-label="Basic example">
										<a type="button" class="btn btn-warning" href="<?= site_url('c_admin/detail_belanja/'.$d->id_detail) ?>"><i class="fa fa-edit"></i></a>
										<a type="button" class="btn btn-danger" onclick="return deleteRow('<?= $d->id_detail; ?>')" href="<?= site_url('c_detailbelanja/delete/'.$d->id_detail) ?>"><i class="fa fa-trash"></i></a>
									</div>
								</td>
							</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</section>

<script type="text/javascript">

	function deleteRow($id) {
		return confirm('Anda yakin ingin menghapus data ini?');
		
	}

	$(document).ready( function () {
		$('#table').DataTable();
	} );
</script>