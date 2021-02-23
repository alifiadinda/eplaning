 <div class="content-header">
              <div class="container-fluid">
                <div class="row mb-2">
                  <div class="col-sm-6">
                    <h1 class="m-0 text-dark">SK Belanja</h1>
                  </div>
                </div>
              </div>
            </div>

             <div class="app-main__outer">
                <div class="app-main__inner">   
                    <div class="row">
                        <div class="col-md-12 col-lg-12">
                        <div class="form-group">
                        <div class="mb-6 card">

                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-12 col-lg-12">
                      <!-- <form action="<?php echo base_url();?>index.php/C_Belanja" id="form1" name="form1"> -->
                          <?php
                          $this->form_validation->set_error_delimiters('<div class="alert alert-warning" role="alert">', '</div>');
                        ?>
                        <?php echo validation_errors(); ?>
                        <?php echo (isset( $upload_error)) ? '<div class="alert alert-warning" role="alert">' .$upload_error. '</div>' : ''; ?>
                       <?php echo form_open_multipart( 'C_Belanja/create', array('class' => 'needs-validation', 'novalidate' => '', 'id'=>'form1') ); ?>
                        <div class="form-group">
                          <label>Pilih Program : </label>
                          <select id="kategori" name="program" onchange="tampilkan()" class="form-control" required="">
                            <option value="" disabled selected>Pilih Program</option>
                            <option value="Program Pemenuhan Upaya Kesehatan Perorangan dan Upaya Kesehatan Masyarakat">Program Pemenuhan Upaya Kesehatan Perorangan dan Upaya Kesehatan Masyarakat</option>
                            <option value="Program Penunjang Urusan Pemerintahan Daerah Kabupaten/Kota">Program Penunjang Urusan Pemerintahan Daerah Kabupaten/Kota</option>
                          </select>
                        </div>
                        <div class="form-group">
                          <label>Pilih kegiatan : </label>
                          <select id="kegiatan" name="kegiatan" onchange="tampilkansub()" class="form-control" required="">
                            <option value="" disabled selected>Pilih Kegiatan</option>
                          </select>
                        </div>
                        <div class="form-group">
                          <label>Pilih Sub Kegiatan: </label>
                          <select id="tampil" name="subkegiatan" class="form-control" required="">
                            <option value="" disabled selected>Pilih Sub</option>
                          </select>
                        </div>
                         <div class="form-group">
                          <label for="title">Indikator</label>
                            <input type="number" class="form-control" name="indikator" value="<?php echo set_value('indikator') ?>" required>
                          <div class="invalid-feedback">Isi Indikator</div>
                         </div>
                         <div class="form-group">
                          <label for="title">Target</label>
                            <input type="number" class="form-control" name="target" value="<?php echo set_value('target') ?>" required>
                          <div class="invalid-feedback">Isi target</div>
                         </div>
                         <div class="form-group">
                          <label for="title">Date</label>
                            <input type="date" class="form-control" name="tanggal_sk" value="<?php echo set_value('tanggal_sk') ?>" required>
                          <div class="invalid-feedback">Isi Tgl SK</div>
                         </div>
                         <div class="form-group">
                          <label for="title">Alokasi Tahun 2021</label>
                            <input type="number" class="form-control" name="alokasi_tahun2021" value="<?php echo set_value('alokasi_tahun2021') ?>" required>
                          <div class="invalid-feedback">Isi 2021</div>
                         </div>
                         <div class="form-group">
                            <label for="title">Status</label>
                            <input type="text" class="form-control" name="status" value="RKA" readonly="readonly" required>
                          <div class="invalid-feedback"></div>
                      </div>
                          <button id="submitBtn" type="submit" class="btn btn-primary">Tambah</button><br><br>
                    </form>
                    </div>
                    </div>
                  </div>

                        </div>
                    </div>            
                </div>

        
                        <div class="col-md-12 col-lg-12">
                        <div class="form-group">
                        <div class="mb-6 card">

                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-12 col-lg-12">
                        <div class="form-group">
                          <label>Filter sebagai : <br>
                          <button class="btn btn-default">
                            <?php if(!empty($program)){?>
                            <?php echo $program; ?>
                            <?php }else{ ?>
                            None
                            <?php } ?>
                          </button>
                          <button class="btn btn-default">
                            <?php if(!empty($kegiatan)){?>
                            <?php 
                            // echo $kegiatan; 
                              if($kegiatan=='Penyedia Layanan Kesehatan Untuk UKM dan UKP Rujukan Tingkat Daerah Kabupaten /Kota (RSUD)'){
                                echo "Penyedia Layanan Kesehatan Untuk UKM dan UKP Rujukan Tingkat Daerah Kabupaten /Kota (RSUD)";
                              }else if($kegiatan=='Penyedia Fasilitas Pelayanan Kesehatan untuk UKM dan UKP Kewenangan Daerah Kabupaten /Kota (RSUD)'){
                                echo "Penyedia Fasilitas Pelayanan Kesehatan untuk UKM dan UKP Kewenangan Daerah Kabupaten /Kota (RSUD)";
                              }else if($kegiatan=='Penerbitan Izin Rumah Sakit kelas C,D dan Fasilitas Pelayanan Kesehatan tingkat Daerah Kabupaten atau kota'){
                                echo "Penerbitan Izin Rumah Sakit kelas C,D dan Fasilitas Pelayanan Kesehatan tingkat Daerah Kabupaten atau kota";
                              }else if($kegiatan=='Peningkatan Pelayanan RSUD'){
                                echo "Peningkatan Pelayanan RSUD";
                              }
                            ?>
                            <?php }else{ ?>
                            None
                            <?php } ?>
                          </button>
                          <button class="btn btn-default">
                            <?php if(!empty($subkegiatan)){?>
                            <?php 
                            // echo $subkegiatan; 
                              if($subkegiatan=='Operasional Pelayanan RSUD'){
                                echo "Operasional Pelayanan RSUD";
                              }else if($subkegiatan=='Pengadaan Prasarana dan Pendukung Fasilitas Pelayanan Kesehatan(RSUD)'){
                                echo "Pengadaan Prasarana dan Pendukung Fasilitas Pelayanan Kesehatan(RSUD)";
                              }else if($subkegiatan=='Pengadaan Alat Kesehatan atau Alat Penunjang Medik Fasilitas Pelayanan Kesehatan'){
                                echo "Pengadaan Alat Kesehatan atau Alat Penunjang Medik Fasilitas Pelayanan Kesehatan";
                              }else if($subkegiatan=='Peningkatan Tata Kelola RSUD dan Fasilitas Pelayanan Kesehatan Tingkat daerah kabupaten/Kota'){
                                echo "Peningkatan Tata Kelola RSUD dan Fasilitas Pelayanan Kesehatan Tingkat daerah kabupaten/Kota";
                              }else if($subkegiatan=='Pelayanan dan Penunjang Pelayanan BLUD'){
                                echo "Pelayanan dan Penunjang Pelayanan BLUD";
                              }
                            ?>
                            <?php }else{ ?>
                            None
                            <?php } ?>
                          </button>
                        </label>
                        <br>
                        </div>
                        <div class="form-group">
                          <label>Data tersaring sesuai pilihan diatas : </label><br>
                          <?php if(!empty($program)){?>
                          <!-- <?php echo anchor('C_Belanja/create', 'Tambah', array('class' => 'btn btn-primary')); ?><br><br> -->
                          <?php echo form_open( 'C_Belanja/create', array('class' => 'needs-validation', 'novalidate' => '') ); ?>
                            <input type="hidden" name="kategori" value="<?php echo $program?>">
                            <input type="hidden" name="kegiatan" value="<?php echo $kegiatan?>">
                            <input type="hidden" name="tampil" value="<?php echo $subkegiatan?>">
                          </form>

                          <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr align='center'>
                                                <th>No</th>
                                                <th>Tanggal Surat</th>
                                                <th>Status</th>
                                                <th>Program</th>
                                                <th>Kegiatan</th>
                                                <th>Sub Kegiatan</th>
                                                <th>Indikator</th>
                                                <th>Target</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($belanja as $key => $value) { ?>
                                            <tr>
                                                <?php if($value->subkegiatan==$subkegiatan){ ?>
                                                <td><center> <?php echo $key+1?> </center></td>
                                                <td><?php echo $value->tanggal_sk?></td>
                                                <td><?php echo $value->program?></td>
                                                <td><?php echo $value->kegiatan?></td>
                                                <td><?php echo $value->subkegiatan?></td>
                                                <td><?php echo $value->indikator?></td>
                                                <td><?php echo $value->target?></td>
                                                <td><?php echo $value->alokasi_tahun2021?></td>
                                                <td align='center'>
                                                   <a href="<?php echo site_url()?>/C_Karu/detail/<?php echo $value->id; ?>">
                                                      <button type="button" class="btn mr-2 mb-2 btn-primary">
                                                        <i class="metismenu-icon fa fa-edit"></i> Detail
                                                       </button>
                                                    </a>
                                                     <a href="<?php echo site_url()?>/C_Karu/edit/<?php echo $value->id; ?>">
                                                      <button type="button" class="btn mr-2 mb-2 btn-warning">
                                                          <i class="metismenu-icon fa fa-edit"></i> Edit
                                                      </button>
                                                     </a>
                                                    <a href="<?php echo site_url()?>/C_Karu/delete/<?php echo $value->id; ?>" onclick="return confirm('Anda ingin menghapus akun dengan username?')">
                                                    <button type="button" class="btn mr-2 mb-2 btn-danger" >
                                                      <i class="metismenu-icon fa fa-user-times"></i> Hapus
                                                    </button>
                                                    </a>
                                                </td>
                                                <?php } ?>
                                            </tr>
                                            <?php } ?>
                                            <tr>
                                                <th>No</th>
                                                <th>Tanggal Surat</th>
                                                <th>Status</th>
                                                <th>Program</th>
                                                <th>Kegiatan</th>
                                                <th>Sub Kegiatan</th>
                                                <th>Indikator</th>
                                                <th>Target</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </tbody>
                                    </table>
                          </div>
                          <?php } else{echo "Tidak ada data, pilih program terlebih dahulu"; } ?>

                        </div>
                        
                    </div>
                    </div>
                  </div>

                        </div>
                    </div>            
                </div>