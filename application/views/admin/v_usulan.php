<!--CONTENT -->

<section class="content">
    <div class="container-fluid">
        <div class="row">

            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="mb-6 card">
                    <div class="card-header">
                        <button type="button" disabled class="btn btn-dark"><i class="fa fa-file"></i> LIST ITEM USULAN</button>
                        <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#modalTambahUsulan"><i class="fa fa-plus"></i> ITEM USULAN BARU</button>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover" id="listDetailUsulan" width="100%" cellspacing="0">
                            <thead>
                                <tr align='center'>
                                    <th class="th-lg no-sort"> NOMOR </th>
                                    <th class="th-lg"> NAMA ITEM </th>
                                    <th class="th-lg"> SPESIFIKASI </th>
                                    <th class="th-lg"> SATUAN </th>
                                    <th class="th-lg"> HARGA SATUAN  </th>
                                    <th class="th-lg"> KODE REKENING </th>
                                    <th class="th-lg"> STATUS </th>
                                    <th class="th-lg"> AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($itemUsulan as $key => $value) { ?>
                                <tr>
                                    <td align="center"> <?php echo $key+1?> </td>
                                    <td><?php echo $value->nama_usulan ?> </td> 
                                    <td><?php echo $value->spesifikasi; ?> </td>
                                    <td align='center'><?php echo $value->satuan ?> </td>
                                    <td align='center'><?php echo $value->harga_satuan ?> </td>
                                    <td align='center'><?php echo $value->kode_rekening ?> </td>
                                    <td align='center'><?php echo $value->status ?> </td>
                                    
                                    <td align='center'>
                                        <a href="#" onclick="showEditUsulan(<?php echo $value->id_usulan?>)">
                                            <button type="button" class="btn mr-2 mb-2 btn-warning">
                                            <i class="metismenu-icon fa fa-edit"></i>
                                            </button>
                                        </a>
                                        <!-- <a href="#" onclick="hapusRincian(<?php echo $value->id_usulan?>)">
                                            <button type="button" class="btn mr-2 mb-2 btn-danger" >
                                            <i class="metismenu-icon fa fa-times"></i>
                                            </button>
                                        </a> -->
                                    </td>
                                </tr>
                                <?php } ?>
                                <tr align='center'>
                                    <th class="th-lg no-sort"> NOMOR </th>
                                    <th class="th-lg"> NAMA ITEM </th>
                                    <th class="th-lg"> SPESIFIKASI </th>
                                    <th class="th-lg"> SATUAN </th>
                                    <th class="th-lg"> HARGA SATUAN  </th>
                                    <th class="th-lg"> KODE REKENING </th>
                                    <th class="th-lg"> STATUS </th>
                                    <th class="th-lg"> AKSI</th>
                                </tr>
                            </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>   
        </div>
    </div>
</section>

<!-- FORM TAMBAH USULAN (TABEL RINCIAN) -->
    <form id="tambahUsulan">
        <div class="modal fade" id="modalTambahUsulan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document" style="max-width: 50%">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Usulan Baru</h4>
                <button class="close" type="button" data-dismiss="modal" aria-hidden="true">&times;</button>
              </div>
              <div class="modal-body">
                <div class="container-fluid">
                  <div class="row">
                    <div class="form-group col-lg-12">
                      <div class="row">

                      <div class="col-md-6">
                        <label>Nama Usulan</label>
                        <input type="text" id="nama_usulan" name="nama_usulan" class="form-control" style="width: 100%"  placeholder="Nama Usulan" required >
                      </div>

                      <div class="col-md-6">
                        <label>Spesifikasi</label>
                        <input type="text" id="spesifikasi" name="spesifikasi" class="form-control" placeholder="Spesifikasi" style="width: 100%" >
                      </div>

                      <div class="col-md-6">
                        <label>satuan</label>
                        <input type="text" id="satuan" name="satuan" class="form-control" placeholder="Satuan" style="width: 100%" required>
                      </div>

                      <div class="col-md-6">
                        <label>Harga Satuan</label>
                        <input type="number" id="harga_satuan" name="harga_satuan" class="form-control" placeholder="Harga Satuan" min="0" style="width: 100%" required>
                      </div>

                      <div class="col-md-12">
                        <label for="title">Kode Rekening</label>
                        <select id="kode_rekening" name="kode_rekening" class="form-control select2" required>
                            <option value="" hidden disabled selected>Pilih Kode Rekening</option>
                            <?php foreach ($detail as $key => $value) { ?>
                            <option value="<?php echo $value->kode_rekening ?>"><?php echo $value->kode_rekening ?> - <?php echo $value->uraian ?></option>
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
                <button type="submit" class="btn btn-primary">Tambah</button>
              </div>
            </div>
          </div>
        </div>
    </form>
<!-- FORM TAMBAH USULAN (TABEL RINCIAN) -->

<!-- FORM EDIT USULAN -->
    <form id="editItemUsulan">
        <div class="modal fade" id="modaleditItemUsulan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document" style="max-width: 50%">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Edit Usulan</h4>
                <button class="close" type="button" data-dismiss="modal" aria-hidden="true">&times;</button>
              </div>
              <div class="modal-body">
                <div class="container-fluid">
                  <div class="row">
                    <div class="form-group col-lg-12">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Nama Usulan</label>
                                <input type="text" id="edt_nama_usulan" name="edt_nama_usulan" class="form-control" style="width: 100%"  placeholder="Nama Usulan" required >
                            </div>

                            <div class="col-md-6">
                                <label>Spesifikasi</label>
                                <input type="text" id="edt_spesifikasi" name="edt_spesifikasi" class="form-control" placeholder="Spesifikasi" style="width: 100%" >
                            </div>

                            <div class="col-md-6">
                                <label>satuan</label>
                                <input type="text" id="edt_satuan" name="edt_satuan" class="form-control" placeholder="Satuan" style="width: 100%" required>
                            </div>

                            <div class="col-md-6">
                                <label>Harga Satuan</label>
                                <input type="number" id="edt_harga_satuan" name="edt_harga_satuan" class="form-control" placeholder="Harga Satuan" min="0" style="width: 100%" required>
                            </div>

                            <div class="col-md-12">
                                <label for="title">Kode Rekening</label>
                                <select id="edt_kode_rekening" name="edt_kode_rekening" class="form-control select2" required>
                                    <option value="" hidden disabled selected>Pilih Kode Rekening Jika Ada Perubahan</option>
                                    <?php foreach ($detail as $key => $value) { ?>
                                    <option value="<?php echo $value->kode_rekening ?>"><?php echo $value->kode_rekening ?> - <?php echo $value->uraian ?></option>
                                    <?php } ?>
                                </select>
                            </div>

                            <div class="col-md-12">
                                <label for="title">Status</label>
                                <select id="edt_status" name="edt_status" class="form-control select2" required>
                                    <option value="" hidden disabled selected>Pilih Status</option>
                                    <option value="aktif">Aktif</option>
                                    <option value="nonaktif">NonAktif</option>
                                </select>
                            </div>

                            <input type="hidden" name="edt_id_usulan" id="edt_id_usulan">

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
<!-- FORM EDIT USULAN -->

<!-- CONTENT -->
<script>

    $(document).ready( function () {
        $('.table').DataTable({ "info": false,});

        /*TAMBAH USULAN*/
            $('#tambahUsulan').submit(function(e){
                e.preventDefault();
                // memasukkan data inputan ke variabel
                var nama_usulan     = $('#nama_usulan').val();
                var spesifikasi     = $('#spesifikasi').val();
                var satuan          = $('#satuan').val();
                var harga_satuan    = $('#harga_satuan').val();
                var kode_rekening   = $('#kode_rekening').val();

                $.ajax({
                    type : 'POST',
                    url  : '<?php echo site_url(); ?>/C_admin/tambahUsulan',
                    dataType : 'JSON',
                    data : {
                        nama_usulan:nama_usulan,
                        spesifikasi:spesifikasi,
                        satuan:satuan,
                        harga_satuan:harga_satuan,
                        kode_rekening:kode_rekening,
                    },

                    success: function(data){
                        if(data.code==2){
                            Swal.fire({
                                        type: 'warning',
                                        title: 'Error Input Usulan Baru',
                                        showConfirmButton: true,
                                    })
                        }else{
                            Swal.fire({
                                        type: 'success',
                                        title: 'Usulan Baru Berhasil Ditambahkan',
                                        showConfirmButton: true,
                                    }).then(function() { location.reload();})
                        } 
                    }
                });
                return false;
            });
        /*TAMBAH USULAN*/

        /*EDIT USULAN*/
            $('#editItemUsulan').submit(function(e){
                e.preventDefault();

                var id_usulan       = $('#edt_id_usulan').val();
                var nama_usulan     = $('#edt_nama_usulan').val();
                var spesifikasi     = $('#edt_spesifikasi').val();
                var satuan          = $('#edt_satuan').val();
                var harga_satuan    = $('#edt_harga_satuan').val();
                var kode_rekening   = $('#edt_kode_rekening').val();
                var status          = $('#edt_status').val();

                $.ajax({
                    type : 'POST',
                    url  : '<?php echo site_url(); ?>/C_admin/editUsulan',
                    dataType : 'JSON',
                    data : {
                        id_usulan:id_usulan,
                        nama_usulan:nama_usulan,
                        spesifikasi:spesifikasi,
                        satuan:satuan,
                        harga_satuan:harga_satuan,
                        kode_rekening:kode_rekening,
                        status:status,
                    },

                    success: function(data){
                        if(data.code==2){
                            Swal.fire({
                                        type: 'warning',
                                        title: 'Error Edit Info Usulan',
                                        showConfirmButton: true,
                                    })
                        }else{
                            Swal.fire({
                                        type: 'success',
                                        title: 'Informasi Usulan Berhasil Diperbarui',
                                        showConfirmButton: true,
                                    }).then(function() { location.reload();})
                        } 
                    }
                });
                return false;
            });
        /*EDIT USULAN*/
    });

    function showEditUsulan(id_usulan) {
        // alert(id_usulan);
        $.ajax({
            type  : 'POST',
            url   : '<?php echo base_url()?>index.php/C_Admin/getDetailUsulan/'+id_usulan,
            async : false,
            dataType : 'json',
            success : function(data){
                $('[name="edt_id_usulan"]').val(data['getDetailUsulan'][0].id_usulan);
                $('[name="edt_nama_usulan"]').val(data['getDetailUsulan'][0].nama_usulan);
                $('[name="edt_spesifikasi"]').val(data['getDetailUsulan'][0].spesifikasi);
                $('[name="edt_satuan"]').val(data['getDetailUsulan'][0].satuan);
                $('[name="edt_harga_satuan"]').val(data['getDetailUsulan'][0].harga_satuan);
                $('[name="edt_kode_rekening"]').val(data['getDetailUsulan'][0].kode_rekening);
                $('[name="edt_status"]').val(data['getDetailUsulan'][0].status);
            }
        })

        $('#modaleditItemUsulan').modal('show');
    }

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

</script>