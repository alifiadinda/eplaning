          <!-- CONTENT -->
		  <div class="app-main__outer">
                <div class="app-main__inner">
                        <div class="page-title-wrapper">
                            <div class="row">
                                <div class="page-title-actions">
                                    <h3>Edit Akun</h3> 
                                </div>   

                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<!-- <form action=""></form> -->
									<?php
										$this->form_validation->set_error_delimiters('<div class="alert alert-warning" role="alert">', '</div>');
									?>
									<?php echo validation_errors(); ?>
									<?php echo (isset( $upload_error)) ? '<div class="alert alert-warning" role="alert">' .$upload_error. '</div>' : ''; ?>
									<?php echo form_open_multipart( 'C_Admin/edtAkun/'.$this->uri->segment(3)); ?>
									<div class="form-group">
										<label for="title">Username</label>
										<input type="text" class="form-control" name="username" value="<?php echo $akun[0]->username ?>" readonly>
										<div class="invalid-feedback">Isi Username</div>
									</div>
									<div class="form-group">
										<label for="title">Nama</label>
										<input type="text" class="form-control" name="nama" value="<?php echo $akun[0]->nama ?>" required>
										<div class="invalid-feedback">Isi Nama</div>
									</div>
									<div class="form-group">
									<label for="title">Level</label>
										<select id="level" name="level" class="form-control" required>
											<option value="<?php echo $akun[0]->level ?>" selected hidden><?php echo $akun[0]->level ?></option>
											<option value="Admin">Admin</option>
											<option value="Karu">Karu</option>
											<option value="Kasubid">Kasubid</option>
										</select>
								</div>
									<button id="submitBtn" type="submit" class="btn btn-primary">Proses</button>
								</form>
                                </div>
                            </div>
                        </div>
                    </div>            
                </div>
        <!-- CONTENT -->