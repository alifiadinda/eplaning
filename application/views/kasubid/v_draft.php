<div class="card mb-3">
     <div class="card-header">
        <i class="fa fa-table"></i> <?php echo $page_title ?>
      </div>
        <div class="card-body">
           <form id="form1" class="row" method="get">
     <div class="form-group col-sm-3">
      <label>Pilih Program : </label>
      <select id="kategori" name="kategori" onchange="tampilkan()" class="form-control" required="">
        <option value="" disabled selected>Pilih Program</option>
         <option value="Program Pemenuhan Upaya Kesehatan Perorangan dan Upaya Kesehatan Masyarakat">Program Pemenuhan Upaya Kesehatan Perorangan dan Upaya Kesehatan Masyarakat</option>
        <option value="Program Penunjang Urusan Pemerintahan Daerah Kabupaten/Kota">Program Penunjang Urusan Pemerintahan Daerah Kabupaten/Kota</option>
      </select>
    </div>
    <div class="form-group col-sm-4">
      <label>Pilih kegiatan : </label>
      <select id="kegiatan" name="kegiatan" onchange="tampilkansub()" class="form-control" required="">
        <option value="" disabled selected>Pilih Kegiatan</option>
      </select>
    </div>
    <div class="form-group col-sm-4">
      <label>Pilih Sub Kegiatan: </label>
      <select id="tampil" name="tampil" class="form-control" required="">
        <option value="" disabled selected>Pilih Sub</option>
      </select>
    </div>
    <div class="form-group col-sm-1">
      <label style="color: white">a</label>
      <button id="submitBtn" type="submit" class="form-control btn btn-primary">Terapkan</button>
    </div>
  </form>
            <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Tanggal Surat</th>
                  <th>Status</th>
                  <th>Program</th>
                  <th>Kegiatan</th>
                  <th>Sub Kegiatan</th>
                  <th>Indikator</th>
                  <th>Target</th>
                  <th>Alokasi Tahun 2021</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tfoot>
                 <tr>
                  <th>Tanggal Surat</th>
                  <th>Status</th>
                  <th>Program</th>
                  <th>Kegiatan</th>
                  <th>Sub Kegiatan</th>
                  <th>Indikator</th>
                  <th>Target</th>
                  <th>Alokasi Tahun 2021</th>
                  <th>Aksi</th>
                </tr>
              </tfoot>
              <tbody>
              <?php if( !empty($Draft) ) : ?>

              <?php
                foreach ($Draft as $key) :
              ?>
                <tr>
                  <td><?php echo $key->tanggal_sk?></td>
                  <td><?php echo $key->status?></td>
                  <td><?php echo $key->program?></td>
                  <td><?php echo $key->kegiatan?></td>
                  <td><?php echo $key->subkegiatan?></td>
                  <td><?php echo $key->indikator?></td>
                  <td><?php echo $key->target?></td>
                  <td><?php echo $key->alokasi_tahun2021?></td>
                  <td align='center'>


                  <?php 
                    if($this->session->userdata('level')=="Karu"){
                      if($key->status_karu==1 && $key->status_karu_dpa==0){
                  ?>
                    <a href="<?php echo site_url()?>/C_Belanja/ajukan_dpa/<?php echo $key->id; ?>">
                      <button type="button" class="btn mr-2 mb-2 btn-warning">
                        <i class="metismenu-icon fa fa-edit"></i> Ajukan ACC DPA
                      </button>
                    </a>
                  <?php
                      }else if($key->status_karu==1 && $key->status_karu_dpa==1){ ?>
                      <button type="button" class="btn mr-2 mb-2 btn-success">
                        <i class="metismenu-icon fa fa-check"></i> Ajuan terkirim
                      </button>
                  <?php }
                    }
                  ?>


                  <?php 
                    if($this->session->userdata('level')=="Kasubid"){
                      if($key->status_karu==1 && $key->status_karu_dpa==1 && $key->status=="Draft DPA"){
                  ?>
                    <a href="<?php echo site_url()?>/C_Belanja/ajukan_dpa_kasubid/<?php echo $key->id; ?>">
                      <button type="button" class="btn mr-2 mb-2 btn-warning">
                        <i class="metismenu-icon fa fa-edit"></i> ACC Draft DPA
                      </button>
                    </a>
                  <?php
                      }else if($key->status_karu==1 && $key->status=="DPA"){ ?>
                      <button type="button" class="btn mr-2 mb-2 btn-success">
                        <i class="metismenu-icon fa fa-check"></i> Sudah Diacc
                      </button>
                  <?php }
                    }
                  ?>

                     <a href="<?php echo site_url()?>/C_Kasubid/detail/<?php echo $key->id; ?>">
                      <button type="button" class="btn mr-6 mb-6 btn-primary">
                        <i class="metismenu-icon fa fa-list"></i> Detail
                      </button>
                    </a>
                    <div class="btn-group" role="group" aria-label="Basic example">
                      <a href="<?php echo site_url()?>/C_Kasubid/editdraft/<?php echo $key->id; ?>" class="btn btn-warning">
                        <i class="metismenu-icon fa fa-edit"></i>
                      </a>
                      <a href="<?php echo site_url()?>/C_Kasubid/deletedraft/<?php echo $key->id; ?>" onclick="return confirm('Anda ingin menghapus akun dengan username?')" class="btn btn-danger">
                        <i class="metismenu-icon fa fa-trash"></i>
                      </a>
                      <a href="<?php echo site_url()?>/c_admin/cetakdraft/<?php echo $key->id; ?>" target="_blank" class="btn btn-primary">
                        <i class="metismenu-icon fa fa-print"></i>
                      </a>
                    </div>
                </td>
                </tr>
                  <?php endforeach; ?>

              <?php else : ?>
              <p>Belum ada data.</p>
              <?php endif; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</div>

