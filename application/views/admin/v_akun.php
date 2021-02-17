             <div class="app-main__outer">
                <div class="app-main__inner">   
                    <div class="row">
                        <div class="col-md-12 col-lg-12">
                        <div class="form-group">
                        <div class="mb-6 card">

                                <div class="card-body">
                                  <?php echo anchor('C_Admin/pendaftaran', 'Tambah Akun', array('class' => 'btn btn-primary')); ?>
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr align='center'>
                                                <th>NOMOR</th>
                                                <th>USERNAME</th>
                                                <th>NAMA</th>
                                                <th>LEVEL</th>
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
                                                <td align='center'>
                                                    <a href="<?php echo site_url()?>/C_Admin/viewEdtAkun/<?php echo $value->id_akun; ?>">
                                                        <button type="button" class="btn mr-2 mb-2 btn-warning">
                                                        <i class="metismenu-icon fa fa-edit"></i> Edit
                                                        </button>
                                                    </a>
                                                    <a href="<?php echo site_url()?>/C_Admin/hapusAkun/<?php echo $value->id_akun; ?>" onclick="return confirm('Anda ingin menghapus akun dengan username <?php echo $value->username; ?>?')">
                                                    <button type="button" class="btn mr-2 mb-2 btn-danger" >
                                                    <i class="metismenu-icon fa fa-user-times"></i> Hapus
                                                    </button>
                                                    </a>
                                                </td>
                                            </tr>
                                            <?php } ?>
                                            <tr>
                                                <th>NOMOR</th>
                                                <th>USERNAME</th>
                                                <th>NAMA</th>
                                                <th>LEVEL</th>
                                                <th>AKSI</th>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>


                        </div>
                    </div>            
                </div>
        <!-- CONTENT -->