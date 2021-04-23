<!-- CONTENT -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="mb-6 card">
                    <div class="card-header">
                        <button type="button" disabled class="btn btn-dark"><i class="fa fa-user"></i> LIST AKUN E-PLANNING RSUD KOTA MALANG</button>
                        <a href="<?php echo site_url()?>/C_Admin/pendaftaran">
                        <button type="button" class="btn btn-primary float-right"><i class="fa fa-user-plus"></i> Tambah Akun</button>
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover" id="listAkun" width="100%" cellspacing="0">
                            <thead>
                                <tr align='center'>
                                    <th>NOMOR</th>
                                    <th>USERNAME</th>
                                    <th>NAMA</th>
                                    <th>LEVEL</th>
                                    <th>RUANGAN</th>
                                    <th>AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($akun as $key => $value) { ?>
                                <tr>
                                    <td><center> <?php echo $key+1?> </center></td>
                                    <td><?php echo $value->username?></td>
                                    <td><?php echo $value->nama?></td>
                                    <td><?php echo $value->level?></td>
                                    <td><?php echo $value->nama_ruangan?></td>
                                    <td align='center'>
                                        <a href="<?php echo site_url()?>/C_Admin/viewEdtAkun/<?php echo $value->id_akun; ?>">
                                            <button type="button" class="btn mr-2 mb-2 btn-warning">
                                            <i class="fa fa-edit"></i> Edit
                                            </button>
                                        </a>
                                        <a href="<?php echo site_url()?>/C_Admin/hapusAkun/<?php echo $value->id_akun; ?>" onclick="return confirm('Anda ingin menghapus akun dengan username <?php echo $value->username; ?>?')">
                                        <button type="button" class="btn mr-2 mb-2 btn-danger" >
                                        <i class="fa fa-user-times"></i> Hapus
                                        </button>
                                        </a>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                            <tfoot>
                                <tr align='center'>
                                    <th>NOMOR</th>
                                    <th>USERNAME</th>
                                    <th>NAMA</th>
                                    <th>LEVEL</th>
                                    <th>RUANGAN</th>
                                    <th>AKSI</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>  
    </div>
</section>

<!-- CONTENT -->