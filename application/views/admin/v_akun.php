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
                                        <a href="#" onclick="showEditAkun('<?php echo $value->id_akun?>')">
                                            <button type="button" class="btn mr-2 mb-2 btn-info">
                                            <i class="fa fa-edit"></i> Edit Akun
                                            </button>
                                        </a>
                                        <a href="#" onclick="changePass('<?php echo $value->id_akun?>')">
                                            <button type="button" class="btn mr-2 mb-2 btn-warning">
                                            <i class="fa fa-key"></i> Edit Password
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

<!-- FORM REGIS AKUN -->
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
<!-- FORM REGIS AKUN -->

<!-- FORM EDIT AKUN -->
    <form id="editAkun">
        <div class="modal fade" id="modaleditAkun" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document" style="max-width: 50%">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Edit Akun</h4>
                <button class="close" type="button" data-dismiss="modal" aria-hidden="true">&times;</button>
              </div>
              <div class="modal-body">
                <div class="container-fluid">
                  <div class="row">
                    <div class="form-group col-lg-12">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="title">Username</label>
                                <input type="text" class="form-control" name="edt_username" id="edt_username" readonly>
                                <div class="invalid-feedback">Isi Username</div>
                            </div>
                            <div class="col-md-12">
                                <label for="title">Nama</label>
                                <input type="text" class="form-control" name="edt_nama" id="edt_nama" required>
                                <div class="invalid-feedback">Isi Nama</div>
                            </div>
                            <div class="col-md-6">
                                <label for="title">Level</label>
                                <select id="edt_level" name="edt_level" class="form-control select2" required>
                                    <option value="" hidden disabled selected>Pilih Jika Ada Perubahan</option>
                                    <option value="Admin">Admin</option>
                                    <option value="Pengusul">Pengusul</option>
                                    <option value="Perencana">Perencana</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="title">Ruangan</label>
                                <select id="edt_ruangan" name="edt_ruangan" class="form-control select2" required>
                                    <option value="" hidden disabled selected>Pilih Jika Ada Perubahan</option>
                                    <?php foreach ($ruangan as $key => $value) { ?>
                                    <option value="<?php echo $value->kode_ruangan ?>"><?php echo $value->nama_ruangan ?></option>
                                    <?php } ?>
                                </select>
                            </div>

                            <input type="hidden" name="edt_id_akun" id="edt_id_akun">

                        </div>
                    </div>
                  </div>
                  
                </div>      
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary">Update</button>
              </div>
            </div>
          </div>
        </div>
    </form>
<!-- FORM EDIT AKUN -->

<!-- FORM GANTI PASSWORD -->
    <form id="changePass">
        <div class="modal fade" id="modalChangePass" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document" style="max-width: 30%">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Ganti Password</h4>
                <button class="close" type="button" data-dismiss="modal" aria-hidden="true">&times;</button>
              </div>
              <div class="modal-body">
                <div class="container-fluid">
                  <div class="row">
                    <div class="form-group col-lg-12">
                        <div class="form-group">
                            <label for="title">Password Baru</label>
                            <input type="password" class="form-control" name="passnew" id="passnew" required>
                            <div class="invalid-feedback">Isi Password Baru</div>
                        </div>
                        <div class="form-group">
                            <label for="title">Kofirmasi Password</label>
                            <input type="password" class="form-control" name="passnew2" id="passnew2" required>
                            <div class="invalid-feedback">Konfirmasi Password</div>
                        </div>
                        <input type="hidden" name="changePass_id" id="changePass_id">
                    </div>
                  </div>
                  
                </div>      
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary">Update</button>
              </div>
            </div>
          </div>
        </div>
    </form>
<!-- FORM GANTI PASSWORD -->

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
                                        title: 'Pendaftaran Akun Baru Berhasil',
                                        showConfirmButton: true,
                                        // timer: 1500
                                    }).then(function() { location.reload();})
                        } 
                    }
            });
            return false;
        });

        /*EDIT AKUN*/
            $('#editAkun').submit(function(e){
                e.preventDefault();

                var id_akun = $('#edt_id_akun').val();
                var nama    = $('#edt_nama').val();
                var level   = $('#edt_level').val();
                var ruangan = $('#edt_ruangan').val();

                $.ajax({
                    type : 'POST',
                    url  : '<?php echo site_url(); ?>/C_admin/edtAkun',
                    dataType : 'JSON',
                    data : {
                        id_akun:id_akun,
                        nama:nama,
                        level:level,
                        ruangan:ruangan,
                    },

                    success: function(data){
                        if(data.code==2){
                            Swal.fire({
                                        type: 'warning',
                                        title: 'Error Edit Info Akun',
                                        showConfirmButton: true,
                                    })
                        }else{
                            Swal.fire({
                                        type: 'success',
                                        title: 'Informasi Akun Berhasil Diperbarui',
                                        showConfirmButton: true,
                                    }).then(function() { location.reload();})
                        } 
                    }
                });
                return false;
            });
        /*EDIT AKUN*/

        /*CHANGE PASS*/
            $('#changePass').submit(function(e){
                e.preventDefault();

                var changePass_id     = $('#changePass_id').val();
                var passnew     = $('#passnew').val();
                var passnew2    = $('#passnew2').val();

                $.ajax({
                    type : 'POST',
                    url  : '<?php echo site_url(); ?>/C_admin/changePass',
                    dataType : 'JSON',
                    data : {
                        changePass_id:changePass_id,
                        passnew:passnew,
                        passnew2:passnew2,
                    },

                    success: function(data){
                        if(data.code==2){
                            Swal.fire({
                                        type: 'warning',
                                        title: 'Konfirmasi Password Tidak Sama',
                                        showConfirmButton: true,
                                    })
                        }else{
                            Swal.fire({
                                        type: 'success',
                                        title: 'Password Akun Berhasil Diperbarui',
                                        showConfirmButton: true,
                                    }).then(function() { location.reload();})
                        } 
                    }
                });
                return false;
            });
        /*CHANGE PASS*/

    });

    function showEditAkun(id_akun) {
        $.ajax({
            type  : 'POST',
            url   : '<?php echo base_url()?>index.php/C_Admin/viewEdtAkun/'+id_akun,
            async : false,
            dataType : 'json',
            success : function(data){
                $('[name="edt_id_akun"]').val(data['akun'][0].id_akun);
                $('[name="edt_username"]').val(data['akun'][0].username);
                $('[name="edt_password"]').val(data['akun'][0].password);
                $('[name="edt_nama"]').val(data['akun'][0].nama);
                $('[name="edt_level"]').val(data['akun'][0].level);
                $('[name="edt_ruangan"]').val(data['akun'][0].kode_ruangan);
            }
        })

        $('#modaleditAkun').modal('show');
    }

    function changePass(id_akun) {
        $('[name="changePass_id"]').val(id_akun);
        $('#modalChangePass').modal('show');
        
    }

    function hapusAkun(id_akun) {
        // alert(id_akun);
        var r = confirm("Apakah anda yakin ingin menghapus data ini?");
          if (r == true) {
            $.ajax({
                type  : 'POST',
                url   : '<?php echo base_url()?>index.php/C_Admin/hapusAkun/'+id_akun,
                async : false,
                dataType : 'json',
                success : function(data){
                    Swal.fire({
                        type: 'success',
                        title: 'Berhasil Menghapus Akun ',
                        showConfirmButton: false,
                        timer: 1500
                    }).then(function() { location.reload();})
                }
            });
          } 
    }

</script>