    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit Data Karyawan
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="box box-success">
        <!-- box-header -->
        <div class="box-header with-border">
          <h3 class="box-title">Tambah Akun</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <form action="<?php echo site_url('user/editAction'); ?>" method="post">
              <input type="text" name="id" placeholder="id" required="required" value="<?php echo $user['id']; ?>" hidden />
              <div class="col-md-6">
                <div class="form-group">
                  <label for="nama">Nama</label>
                  <input type="text" class="form-control" name="nama" placeholder="Nama" required="required" value="<?php echo $user['nama']; ?>" maxlength="30" />
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="email">Email address</label>
                  <input type="text" class="form-control" name="email" placeholder="Email" required="required" value="<?php echo $user['email']; ?>" maxlength="40" />
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" class="form-control" name="password" placeholder="Password" required="required" maxlength="30" />
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="alamat">Alamat</label>
                  <textarea class="form-control" rows="3" name="alamat" placeholder="Alamat" required="required" maxlength="100" ><?php echo $user['alamat']; ?></textarea>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="no_hp">No Hp</label>
                  <input type="text" class="form-control" name="no_hp" placeholder="No Hp" required="required" value="<?php echo $user['no_hp']; ?>" maxlength="13" re />
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="level">Pekerjaan</label>
                  <select id="level" class="form-control" name="level" required>
                    <?php
                    if ($this->session->userdata("level") < 1) {
                      echo '<option value="1" ';
                      if ($user['level'] == 1) {
                        echo 'selected';
                      }
                      echo '>Owner</option>';
                    }
                    if ($this->session->userdata("level") < 2) {
                      echo '<option value="2" ';
                      if ($user['level'] == 2) {
                        echo 'selected';
                      }
                      echo '>Manajer</option>';
                    }
                    ?>
                    <option value="4" <?php if ($user['level'] == 4) {
                                        echo "selected";
                                      }; ?>>Sales</option>
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