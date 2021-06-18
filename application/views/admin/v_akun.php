<!-- CONTENT -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="mb-6 card">
                    <div class="card-header">
                        <button type="button" disabled class="btn btn-dark"><i class="fa fa-user"></i> LIST AKUN E-PLANNING RSUD KOTA MALANG</button>
                        <!-- <a href="<?php echo site_url()?>/C_Admin/pendaftaran"> -->
                        <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#modalRegis"><i class="fa fa-user-plus"></i> Tambah Akun</button>
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

<!-- FORM REGIS PENYELEKSI -->
  <form id="formRegis">
    <div class="modal fade" id="modalRegis" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document" >
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Daftar Akun Penyeleksi Baru</h4>
            <button class="close" type="button" data-dismiss="modal" aria-hidden="true">&times;</button>
          </div>
          <div class="modal-body">
            <div class="container-fluid">
                <div class="row">
                    <div class="form-group col-lg-12">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="title">Username</label>
                                <input type="text" class="form-control" name="username" id="username" required>
                                <div class="invalid-feedback">Isi Username</div>
                            </div>
                            <div class="col-md-12">
                                <label for="title">Password</label>
                                <input type="password" class="form-control" name="password" id="password" required>
                                <div class="invalid-feedback">Isi Password</div>
                            </div>
                            <div class="col-md-12">
                                <label for="title">Nama</label>
                                <input type="text" class="form-control" name="nama" id="nama" required>
                                <div class="invalid-feedback">Isi Nama</div>
                            </div>
                            <div class="col-md-6">
                                <label for="title">Level</label>
                                <select id="level" name="level" class="form-control select2" required>
                                    <option value="" hidden disabled selected>Pilih Level Akun</option>
                                    <option value="Admin">Admin</option>
                                    <option value="Karu">Karu</option>
                                    <option value="Kasubag">Kasubag</option>
                                    <option value="Pengusul">Pengusul</option>
                                    <option value="Perencana">Perencana</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="title">Ruangan</label>
                                <select id="ruangan" name="ruangan" class="form-control select2" required>
                                    <option value="" hidden disabled selected>Pilih Ruangan</option>
                                    <?php foreach ($ruangan as $key => $value) { ?>
                                    <option value="<?php echo $value->kode_ruangan ?>"><?php echo $value->nama_ruangan ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
              </div>
            </div>      
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-primary">Daftar</button>
          </div>
          
        </div>
        
      </div>
      
    </div>
  </form>
<!-- FORM REGIS PENYELEKSI -->

<script>
    $(document).ready(function() {
        $('.table').DataTable({ "info": false,});

        $('#formRegis').submit(function(e){
            e.preventDefault();
            // memasukkan data inputan ke variabel
            var username    = $('#username').val();
            var password    = $('#password').val();
            var nama        = $('#nama').val();
            var level       = $('#level').val();
            var ruangan     = $('#ruangan').val();

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
    });
        
</script>