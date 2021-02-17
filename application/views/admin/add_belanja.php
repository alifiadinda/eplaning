<!-- CONTENT -->
            <div class="app-main__outer">
                <div class="app-main__inner">   
                    <div class="row">
                        <div class="col-md-12 col-lg-12">
                            <div class="mb-6 card">
                                <div class="card-header-tab card-header-tab-animation card-header">
                                    <div class="card-header-title">
                                        <i class="header-icon lnr-apartment icon-gradient bg-love-kiss"> </i>
                                        Tambah Sub Kegiatan Belanja
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
          <?php echo form_open_multipart( 'C_Belanja/create', array('class' => 'needs-validation', 'novalidate' => '') ); ?>
              <div class="form-group">
                          <label for="title">Capaian program : </label><br>
                            Indikator : <input type="text" class="col-sm-2 control-label ewLabel" name="indikator" value="<?php echo set_value('indikator') ?>" required>
                             Target : <input type="text" class="col-sm-2 control-label ewLabel" name="target" value="<?php echo set_value('target') ?>" required>
                        <div class="invalid-feedback">Isi Capaian Program</div>
                        </div>
                         <div class="form-group">
                          <label for="title">Unit Pengusul: </label>
                            <input type="text" class="form-control" name="unit_pengusul" value="<?php echo set_value('unit_pengusul') ?>" required>
                          <div class="invalid-feedback">Isi Unit Pengusul</div>
                        </div>

                        <div class="form-group">
                          <label for="title">Alokasi Tahun 2021: </label>
                            <input type="text" class="form-control" name="alokasi_tahun" value="<?php echo set_value('alokasi_tahun') ?>" required>
                          <div class="invalid-feedback">Isi Alokasi tahun</div>
                        </div>
          <div class="form-group">
            <label for="title">Kode Rekening</label>
            <input type="hidden" class="form-control" name="program" value="<?php echo $program; ?>" required>
            <input type="hidden" class="form-control" name="kegiatan" value="<?php echo $kegiatan; ?>" required>
            <input type="hidden" class="form-control" name="subkegiatan" value="<?php echo $subkegiatan; ?>" required>
            <input type="number" class="form-control" name="kode_rekening" value="<?php echo set_value('kode_rekening') ?>" required>
            <div class="invalid-feedback">Mohon Isi Kode Rekening</div>
          </div>
          <div class="form-group">
            <label for="title">Uraian</label>
            <input type="text" class="form-control" name="uraian" value="<?php echo set_value('uraian') ?>" required> 
            <div class="invalid-feedback">Isi Uraian</div>
          </div>
          <div class="form-group">
            <label for="title">Koefisien</label>
            <input type="text" class="form-control" name="koefisien" value="<?php echo set_value('koefisien') ?>" required>
            <div class="invalid-feedback">Isi Koefisien</div>
          </div>
          <div class="form-group">
            <label for="title">Satuan</label>
            <input type="number" class="form-control" name="satuan" value="<?php echo set_value('satuan') ?>" required>
            <div class="invalid-feedback">Isi Satuan</div>
          </div>
          <div class="form-group">
            <label for="title">Harga</label>
            <input type="number" class="form-control" name="harga" value="<?php echo set_value('harga') ?>" required>
            <div class="invalid-feedback">Isi Harga</div>
          </div>
          <div class="form-group">
            <label for="title">PPN</label>
            <input type="number" class="form-control" name="PPN" value="<?php echo set_value('PPN') ?>" required>
            <div class="invalid-feedback">Isi PPN</div>
          </div>
          <div class="form-group">
            <label for="title">Jumlah</label>
            <input type="number" class="form-control" name="jumlah" value="<?php echo set_value('jumlah') ?>" required>
            <div class="invalid-feedback">Isi Jumlah</div>
          </div>
          <div class="form-group">
            <label for="title">Keterangan</label>
            <input type="text" class="form-control" name="keterangan" value="<?php echo set_value('keterangan') ?>" required>
            <div class="invalid-feedback">Isi Keterangan</div>
          </div>
          <div class="form-group">
            <label for="title">Tanggal SK</label>
            <input type="date" class="form-control" name="tanggal_sk" value="<?php echo set_value('tanggal_sk') ?>" required>
            <div class="invalid-feedback">Isi Tanggal SK</div>
          </div>
          <div class="form-group">
            <label for="title">Status</label>
            <input type="text" class="form-control" name="status" value="RKA" readonly="readonly" required>
            <div class="invalid-feedback"></div>
          </div>
          <button id="submitBtn" type="submit" class="btn btn-primary">Tambah Sub Kegiatan Belanja</button>
        </form>
      </div>
    </div>
  </div>
</div>
</div>
</div>