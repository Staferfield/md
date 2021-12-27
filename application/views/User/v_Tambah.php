      <div class="box box-success box-solid collapsed-box">
        <!-- box-header -->
        <div class="box-header with-border">
          <h3 class="box-title">Tambah Karyawan</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <form action="<?php echo site_url('user/addAction'); ?>" method="post">

              <div class="col-md-6">
                <div class="form-group">
                  <label for="nama">Nama</label>
                  <input type="text" class="form-control" name="nama" placeholder="Nama" required="required" value="<?php  ?>" maxlength="30"/>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="email">Email address</label>
                  <input type="email" class="form-control" name="email" placeholder="Email" required="required" value="<?php  ?>" maxlength="40"/>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" class="form-control" name="password" placeholder="Password" required="required" maxlength="30"/>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="alamat">Alamat</label>
                  <textarea class="form-control" rows="3" name="alamat" placeholder="Alamat" required="required" value="<?php  ?>" maxlength="100"></textarea>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="no_hp">No Hp</label>
                  <!-- #EDIT rubah jadi input mask -->
                  <input type="text" class="form-control" name="no_hp" placeholder="No Hp" required="required" value="<?php  ?>" min="0" maxlength="13"/>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="level">Pekerjaan</label>
                  <label for="level">Pilih Pekerjaan:</label>
                  <select id="level" class="form-control" name="level" required>
                    <!-- Akun tidak dapat membuat akun dengan level yang sama  -->
                    <?php 
                    if($this->session->userdata("level")<1){
                      echo '<option value="1">Owner</option>';
                    }
                    if($this->session->userdata("level")<2){
                      echo '<option value="2">Manajer</option>';
                    }
                    ?>
                    <option value="4" selected>Sales</option>
                  </select>
                </div>
              </div>

              <div class="col-sm-6">
                <a href="<?php echo site_url('user'); ?>"><span class="btn btn-danger btn-block">Batal</span></a>
              </div>
              <div class="col-sm-6">
                <button type="submit" class="btn btn-success btn-block">Simpan</button>
              </div>

            </form>
          </div>
          <!-- /.row -->
        </div>
        <!-- /.box-body -->
      </div>