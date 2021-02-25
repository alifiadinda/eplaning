<!-- CONTENT -->
            <div class="app-main__outer">
                <div class="app-main__inner">   
                    <div class="row">
                        <div class="col-md-12 col-lg-12">
                            <div class="mb-6 card">
                                <div class="card-header-tab card-header-tab-animation card-header">
                                    <div class="card-header-title">
                                        <i class="header-icon lnr-apartment icon-gradient bg-love-kiss"> </i>
                                        Edit Sub Kegiatan Belanja
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="tab-content">
                                        <div class="tab-pane fade show active" id="tabs-eg-77">

                        <?php    
                        $this->form_validation->set_error_delimiters('<div class="alert alert-warning" role="alert">', '</div>');
                    ?>
                    <?php echo validation_errors(); ?>

                    <?php echo (isset( $upload_error)) ? '<div class="alert alert-warning" role="alert">' .$upload_error. '</div>' : ''; ?>

                    <?php echo form_open( current_url(), array('class' => 'needs-validation', 'novalidate' => '', 'id'=>'form1') ); ?>

                        
                     <div class="form-group">
                          <label>Pilih Program : </label>
                          <select id="kategori" name="program" onchange="tampilkan()" class="form-control" required="">
                            <option value="Program Pemenuhan Upaya Kesehatan Perorangan dan Upaya Kesehatan Masyarakat" <?php if($belanja->program=="Program Pemenuhan Upaya Kesehatan Perorangan dan Upaya Kesehatan Masyarakat"){echo "selected";} ?>>Program Pemenuhan Upaya Kesehatan Perorangan dan Upaya Kesehatan Masyarakat</option>
                            <option value="Program Penunjang Urusan Pemerintahan Daerah Kabupaten/Kota" <?php if($belanja->program=="Program Penunjang Urusan Pemerintahan Daerah Kabupaten/Kota"){echo "selected";} ?>>Program Penunjang Urusan Pemerintahan Daerah Kabupaten/Kota</option>
                          </select>
                        </div>

                        <div class="form-group">
                          <label for="title">Pilih Program</label>
                            <select id="kegiatan" name="kegiatan"  onchange="tampilkansub()" class="form-control" required>
                            <?php
                              $program=$belanja->program;
                              if ($program== "Program Pemenuhan Upaya Kesehatan Perorangan dan Upaya Kesehatan Masyarakat"){ ?>

                                <option value='Penyedia Layanan Kesehatan Untuk UKM dan UKP Rujukan Tingkat Daerah Kabupaten /Kota (RSUD)' <?php if($belanja->kegiatan=="Penyedia Layanan Kesehatan Untuk UKM dan UKP Rujukan Tingkat Daerah Kabupaten /Kota (RSUD)"){echo "selected";} ?>>Penyedia Layanan Kesehatan Untuk UKM dan UKP Rujukan Tingkat Daerah Kabupaten /Kota (RSUD)</option>
                                <option value='Penyedia Fasilitas Pelayanan Kesehatan untuk UKM dan UKP Kewenangan Daerah Kabupaten /Kota (RSUD)' <?php if($belanja->kegiatan=="Penyedia Fasilitas Pelayanan Kesehatan untuk UKM dan UKP Kewenangan Daerah Kabupaten /Kota (RSUD)"){echo "selected";} ?>>Penyedia Fasilitas Pelayanan Kesehatan untuk UKM dan UKP Kewenangan Daerah Kabupaten /Kota (RSUD)</option>
                                <option value='Penerbitan Izin Rumah Sakit kelas C,D dan Fasilitas Pelayanan Kesehatan tingkat Daerah Kabupaten atau kota' <?php if($belanja->kegiatan=="Penerbitan Izin Rumah Sakit kelas C,D dan Fasilitas Pelayanan Kesehatan tingkat Daerah Kabupaten atau kota"){echo "selected";} ?>>Penerbitan Izin Rumah Sakit kelas C,D dan Fasilitas Pelayanan Kesehatan tingkat Daerah Kabupaten atau kota</option>

                                <?php
                              }else{ ?>
                                <option value='Peningkatan Pelayanan RSUD' <?php if($belanja->kegiatan=="Peningkatan Pelayanan RSUD"){echo "selected";} ?>>Peningkatan Pelayanan RSUD</option>
                              <?php }
                            ?>
                          </select>
                        </div>

                        <div class="form-group">
                          <label for="title">Pilih Kegiatan</label>
                          <select id="tampil" name="subkegiatan" class="form-control" required>
                            <?php
                              $kegiatan=$belanja->kegiatan;
                              if ($kegiatan== "Penyedia Layanan Kesehatan Untuk UKM dan UKP Rujukan Tingkat Daerah Kabupaten /Kota (RSUD)"){ ?>
                                <option value='Operasional Pelayanan RSUD' <?php if($belanja->subkegiatan=="Operasional Pelayanan RSUD"){echo "selected";} ?>>Operasional Pelayanan RSUD</option>
                                <?php
                              }else if ($kegiatan== "Penyedia Fasilitas Pelayanan Kesehatan untuk UKM dan UKP Kewenangan Daerah Kabupaten /Kota (RSUD)"){
                            ?>
                              <option value="Pengadaan Prasarana dan Pendukung Fasilitas Pelayanan Kesehatan(RSUD)" <?php if($belanja->subkegiatan=="Pengadaan Prasarana dan Pendukung Fasilitas Pelayanan Kesehatan(RSUD)"){echo "selected";} ?>>Pengadaan Prasarana dan Pendukung Fasilitas Pelayanan Kesehatan(RSUD)</option>
                              <option value="Pengadaan Alat Kesehatan atau Alat Penunjang Medik Fasilitas Pelayanan Kesehatan" <?php if($belanja->subkegiatan=="Pengadaan Alat Kesehatan atau Alat Penunjang Medik Fasilitas Pelayanan Kesehatan"){echo "selected";} ?>>Pengadaan Alat Kesehatan atau Alat Penunjang Medik Fasilitas Pelayanan Kesehatan</option>
                            <?php }else if ($kegiatan== "Penerbitan Izin Rumah Sakit kelas C,D dan Fasilitas Pelayanan Kesehatan tingkat Daerah Kabupaten atau kota"){?>
                              <option value="Peningkatan Tata Kelola RSUD dan Fasilitas Pelayanan Kesehatan Tingkat daerah kabupaten/Kota" <?php if($belanja->subkegiatan=="Peningkatan Tata Kelola RSUD dan Fasilitas Pelayanan Kesehatan Tingkat daerah kabupaten/Kota"){echo "selected";} ?>>Peningkatan Tata Kelola RSUD dan Fasilitas Pelayanan Kesehatan Tingkat daerah kabupaten/Kota</option>
                            <?php }else{
                              ?>
                              <option value="Pelayanan dan Penunjang Pelayanan BLUD" <?php if($belanja->subkegiatan=="Pelayanan dan Penunjang Pelayanan BLUD"){echo "selected";} ?>>Pelayanan dan Penunjang Pelayanan BLUD</option>
                              <?php
                            }
                            ?>
                          </select>
                        </div>

                    <div class="form-group">
                        <label for="text">Tanggal</label>
                        <input type="date" class="form-control" name="tanggal_sk" value="<?php echo set_value('tanggal_sk', $belanja->tanggal_sk) ?>" required>
                        <div class="invalid-feedback">Isi Tanggal SK</div>
                    </div>

                      <div class="form-group">
                        <label for="text">Indikator</label>
                        <input type="text" class="form-control" name="indikator" value="<?php echo set_value('indikator', $belanja->indikator) ?>" required>
                        <div class="invalid-feedback">Isi Indikator</div>
                    </div>

                      <div class="form-group">
                        <label for="text">Target</label>
                        <input type="text" class="form-control" name="target" value="<?php echo set_value('target', $belanja->target) ?>" required>
                        <div class="invalid-feedback">Isi Target</div>
                    </div>

                      <div class="form-group">
                        <label for="text">Alokasi Tahun 2021</label>
                        <input type="number" class="form-control" name="alokasi_tahun2021" value="<?php echo set_value('alokasi_tahun2021', $belanja->alokasi_tahun2021) ?>" required>
                        <div class="invalid-feedback">Isi Alokasi Tahun 2021</div>
                    </div>


                     <div class="form-group">
                        <label for="text">Status</label>
                        <input type="text" class="form-control" name="status" readonly="readonly" value="<?php echo set_value('status', $belanja->status) ?>" required>
                        <div class="invalid-feedback">Isi Status</div>
                    </div>
                    
                        <button id="submitBtn" type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
</div>