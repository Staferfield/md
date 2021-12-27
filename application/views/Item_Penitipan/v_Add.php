<!DOCTYPE html>
<html lang='en'>

<head>
  <meta charset='UTF-8'>
  <meta name="robots" content="noindex">
  <!-- <link rel="stylesheet" href="<?php //base_url('assets/')?>assets.css"> -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'assets/bootstrap/css/bootstrap.min.css' ?>">
</head>

<body>
  <div class="container mt-4">
    <h1 class="text-center p-2">Tambah Item Penitipan</h1>
    <hr/>

    <form action="<?php echo site_url('Item_penitipan/addAction/'.$nota_id); ?>" method="post">
      <input type="hidden" class="hidden" name="nama" placeholder="Nama" required="required" hidden value="<?php echo $item_penitipan['id'] ?>" />
      <!-- <input type="text" name="nama" placeholder="Nama" required="required" value="<?php //echo $item_penitipan['nama'] ?>" /> -->
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


      <input type="text" name="jml_titip" placeholder="Harga" required="required" value="<?php echo $item_penitipan['id'] ?>" />

      <a href="<?php echo site_url('roti'); ?>"><span class="btn btn-primary">Batal</span>
      </a>      
      <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
  </div>
</body>

</html>