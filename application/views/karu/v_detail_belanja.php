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
				<div class="col-sm-12 col-md-12 col-lg-12">
					<!-- <?= true ? 'iya' : 'tidak'; ?> -->
					<table class="table" id="table">
						<thead>
							<tr>
								<th>#</th>
								<th>Kode Rekening</th>
								<th>Uraian</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($detail as $key => $d) { ?>
							<tr>
								<td><?= $key+1; ?></td>
								<td><?= $d->kode_rekening; ?></td>
								<td><?= $d->uraian; ?></td>
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