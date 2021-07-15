<!--CONTENT -->

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                <div class="mb-6 card">
                    <div class="card-header">
                        <button type="button" disabled class="btn btn-dark"><i class="fa fa-plus-square"></i> FORM USULAN UNIT <b><?php echo $this->session->nama_ruangan ?></b> RSUD KOTA MALANG <!-- <b><?php echo $usulan[0]->periode ?></b> --></button>
                    </div>
                    <div class="card-body">

                        <div class="table-responsive">
                            <table class="table table-bordered table-hover dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr align='center'>
                                    <th class="th-lg no-sort"> NOMOR </th>
                                    <th class="th-lg"> NAMA USULAN </th>
                                    <th class="th-lg"> SPESIFIKASI  </th>
                                    <th class="th-lg"> AKSI</th>
                                </tr>
                            </thead>
                            <tbody id='showItemUsulan'>
                                <?php foreach($getItemUsulan as $key => $value) { ?>
                                <tr>
                                    <td align="center"> <?php echo $key+1?> </td>
                                    <td><?php echo $value->nama_usulan ?></td>
                                    <td align='center'><?php echo $value->spesifikasi ?></td>
                                    
                                    <td align='center'>
                                        <a href="#" onclick="tambahUsulan(<?php echo $value->id_usulan?>)">
                                            <button type="button" class="btn mr-2 mb-2 btn-success">
                                            <i class="metismenu-icon fa fa-upload"></i> Usulkan
                                            </button>
                                        </a>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                             <tfoot>
                               <tr align='center'>
                                    <th class="th-lg no-sort"> NOMOR </th>
                                    <th class="th-lg"> NAMA USULAN </th>
                                    <th class="th-lg"> SPESIFIKASI  </th>
                                    <th class="th-lg"> AKSI</th>
                                </tr>
                            </tfoot>
                            </table>
                        </div>
                        
                    </div>
                </div>
            </div> 

            <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                <div class="mb-6 card">
                    <div class="card-header">
                        <button type="button" disabled class="btn btn-dark"><i class="fa fa-file"></i> DAFTAR USULAN UNIT <b><?php echo $this->session->nama_ruangan ?></b> RSUD KOTA MALANG<!--  <b><?php echo $usulan[0]->periode ?></b> --></button>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover dataTable" id="listDetailUsulan" width="100%" cellspacing="0">
                            <thead>
                                <tr align='center'>
                                    <th class="th-lg no-sort"> NOMOR </th>
                                    <th class="th-lg"> RINCIAN BARANG </th>
                                    <th class="th-lg"> JUMLAH PERMINTAAN  </th>
                                    <th class="th-lg"> SATUAN </th>
                                    <th class="th-lg"> TANGGAL DIUSULKAN </th>
                                    <th class="th-lg"> AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($getDetailUsulanUnit as $key => $value) { ?>
                                <tr>
                                    <td align="center"> <?php echo $key+1?> </td>
                                    <td><?php echo $value->nama_usulan ?> <br><b>Spesifikasi</b>: <?php echo $value->spesifikasi; ?></td>
                                    <td align='center'><?php echo $value->koefisien ?></td>
                                    <td align='center'><?php echo $value->satuan ?></td>
                                    <td align='center'><?php echo $value->tgl_diusulkan ?></td>
                                    
                                    <td align='center'>
                                        <a href="#" onclick="editJumlah(<?php echo $value->id_rincian?>)">
                                            <button type="button" class="btn mr-2 mb-2 btn-warning">
                                            <i class="metismenu-icon fa fa-edit"></i>
                                            </button>
                                        </a>
                                        <a href="#" onclick="hapusRincian(<?php echo $value->id_rincian?>)">
                                            <button type="button" class="btn mr-2 mb-2 btn-danger" >
                                            <i class="metismenu-icon fa fa-times"></i>
                                            </button>
                                        </a>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                             <tfoot>
                               <tr align='center'>
                                    <th class="th-lg no-sort"> NOMOR </th>
                                    <th class="th-lg"> RINCIAN BARANG </th>
                                    <th class="th-lg"> JUMLAH PERMINTAAN  </th>
                                    <th class="th-lg"> SATUAN </th>
                                    <th class="th-lg"> TANGGAL DIUSULKAN </th>
                                    <th class="th-lg"> AKSI</th>
                                </tr>
                            </tfoot>
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
                        <input type="text" id="nama_usulan" name="nama_usulan" class="form-control" style="width: 100%" required readonly>
                      </div>

                      <div class="col-md-6">
                        <label>Spesifikasi</label>
                        <input type="text" id="spesifikasi" name="spesifikasi" class="form-control" placeholder="Nomor Aktif" style="width: 100%" readonly>
                      </div>

                      <div class="col-md-6">
                        <label>satuan</label>
                        <input type="text" id="satuan" name="satuan" class="form-control" placeholder="Nomor Aktif" style="width: 100%"readonly >
                      </div>

                      <div class="col-md-6">
                        <label>Jumlah Permintaan</label>
                        <input type="number" id="koefisien" name="koefisien" class="form-control" placeholder="Masukkan jumlah" style="width: 100%" required>
                      </div>

                        <input type="hidden" id="id_usulan" name="id_usulan" >
                        <input type="hidden" id="harga" name="harga" class="form-control" >
                        <input type="hidden" id="kode_rekening" name="kode_rekening" >
                    
                    </div>
                    </div>
                  </div>
                  
                </div>      
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary">Usulkan</button>
              </div>
            </div>
          </div>
        </div>
    </form>
<!-- FORM TAMBAH USULAN (TABEL RINCIAN) -->

<!-- FORM EDIT JUMLAH -->
    <form id="editJumlah">
        <div class="modal fade" id="modaleditJumlah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                            <input type="text" id="edt_nama_usulan" name="edt_nama_usulan" class="form-control" required readonly>
                        </div>

                         <div class="col-md-6">
                            <label>Spesifikasi</label>
                            <input type="text" id="edt_spesifikasi" name="edt_spesifikasi" class="form-control" required readonly>
                        </div>

                        <div class="col-md-6">
                            <label>satuan</label>
                            <input type="text" id="edt_satuan" name="edt_satuan" class="form-control" placeholder="Nomor Aktif" style="width: 100%"readonly >
                        </div>

                        <div class="col-md-6">
                            <label>Jumlah Permintaan</label>
                            <input type="number" id="edt_koefisien" name="edt_koefisien" class="form-control" placeholder="Masukkan jumlah" min="0" style="width: 100%" required>
                        </div>

                            <input type="hidden" id="edt_id_rincian" name="edt_id_rincian">
                            <input type="hidden" id="edt_id_usulan" name="edt_id_usulan">
                            <input type="hidden" id="edt_tgl_diusulkan" name="edt_tgl_diusulkan">
                            <input type="hidden" id="edt_harga" name="edt_harga">

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
<!-- FORM EDIT JUMLAH -->

<!-- CONTENT -->
<script>

    $(document).ready( function () {
        $('.dataTable').DataTable({
          "info": false,
        });
    });

    function tambahUsulan(id_usulan) {
        $.ajax({
            type  : 'POST',
            url   : '<?php echo base_url()?>index.php/C_Perencana/getDetailUsulan/'+id_usulan,
            async : false,
            dataType : 'json',
            success : function(data){
                $('[name="id_usulan"]').val(data['getDetailUsulan'][0].id_usulan);
                $('[name="nama_usulan"]').val(data['getDetailUsulan'][0].nama_usulan);
                $('[name="spesifikasi"]').val(data['getDetailUsulan'][0].spesifikasi);
                $('[name="satuan"]').val(data['getDetailUsulan'][0].satuan);
                $('[name="harga"]').val(data['getDetailUsulan'][0].harga_satuan);
                $('[name="kode_rekening"]').val(data['getDetailUsulan'][0].kode_rekening);
            }
        })

        $('#modalTambahUsulan').modal('show');
    }

    function editJumlah(id_rincian) {
        // alert(id_rincian);
        $.ajax({
            type  : 'POST',
            url   : '<?php echo base_url()?>index.php/C_Perencana/getDetailRincian/'+id_rincian,
            async : false,
            dataType : 'json',
            success : function(data){
                $('[name="edt_id_rincian"]').val(data['getDetailRincian'][0].id_rincian);
                $('[name="edt_id_usulan"]').val(data['getDetailRincian'][0].id_usulan);
                $('[name="edt_nama_usulan"]').val(data['getDetailRincian'][0].nama_usulan);
                $('[name="edt_spesifikasi"]').val(data['getDetailRincian'][0].spesifikasi);
                $('[name="edt_satuan"]').val(data['getDetailRincian'][0].satuan);
                $('[name="edt_koefisien"]').val(data['getDetailRincian'][0].koefisien);
                $('[name="edt_harga"]').val(data['getDetailRincian'][0].harga);
                $('[name="edt_tgl_diusulkan"]').val(data['getDetailRincian'][0].tgl_diusulkan);
            }
        })

        $('#modaleditJumlah').modal('show');
    }
</script>