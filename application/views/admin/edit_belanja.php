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

                    <?php echo form_open( current_url(), array('class' => 'needs-validation', 'novalidate' => '') ); ?>

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
                        <input type="text" class="form-control" name="status" value="<?php echo set_value('status', $belanja->status) ?>" required>
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