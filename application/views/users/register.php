 
 <div class="one-half">
    
    				<?php
						$this->form_validation->set_error_delimiters('<div class="alert alert-warning" role="alert">', '</div>');
					?>
					<?php echo validation_errors(); ?>
					<?php echo (isset( $upload_error)) ? '<div class="alert alert-warning" role="alert">' .$upload_error. '</div>' : ''; ?>
					<?php echo form_open_multipart( 'welcome/daftarAkun', array('class' => 'needs-validation', 'novalidate' => '') ); ?>
					<div class="form-group">
						<label for="title">Username</label>
						<input type="text" class="form-control" name="username" value="<?php echo set_value('username') ?>" required>
						<div class="invalid-feedback">Isi Username</div>
					</div>
					<div class="form-group">
						<label for="title">Password</label>
						<input type="password" class="form-control" name="password" value="<?php echo set_value('password') ?>" required>
						<div class="invalid-feedback">Isi Password</div>
					</div>
					<div class="form-group">
						<label for="title">Nama</label>
						<input type="text" class="form-control" name="nama" value="<?php echo set_value('nama') ?>" required>
						<div class="invalid-feedback">Isi Nama</div>
					</div>
					<div class="form-group">
            		<label for="title">Level</label>
            			<select id="level" name="level" class="form-control" required>
              				<option value="" disabled selected>Pilih Level Akun</option>
                			<option value="admin">Admin</option>
                			<option value="pengusul">Pengusul</option>
                			<option value="penerima">Penerima</option>
            			</select>
        		</div>
					<button id="submitBtn" type="submit" class="btn btn-primary">Proses</button>
				</form>
    
  </div>