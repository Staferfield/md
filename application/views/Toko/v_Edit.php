  <div class="container mt-4">
    <h1 class="text-center p-2">Edit Toko</h1>
    <hr/>
    <form action="<?php echo site_url('toko/editAction'); ?>" method="post">
      <input type="id" name="id" placeholder="ID Toko" required="required" hidden value="<?php echo $toko['id']; ?>"/>
      <input type="text" name="nama" placeholder="Nama" required="required" value="<?php echo $toko['nama']; ?>" maxlength="30"/>
      <input type="text" name="pemilik" placeholder="Pemilik" required="required" value="<?php echo $toko['pemilik']; ?>" maxlength="30"/>
<!-- #Edit rubah jadi input mask -->
      <textarea name="alamat" placeholder="Alamat" required="required" maxlength="100"><?php echo $toko['alamat']; ?></textarea>
      <input type="text" name="no_telp" placeholder="No Telp" required="required" value="<?php echo $toko['no_telp']; ?>" maxlength="13"/>
      <textarea name="keterangan" placeholder="Keterangan Tambahan" maxlength="50"><?php echo $toko['keterangan']; ?></textarea>

      <input id="geo_latt" type="text" name="geo_latt" placeholder="Geo Lattitude" value="<?php echo $toko['geo_latt']; ?>" />
      <input id="geo_long" type="text" name="geo_long" placeholder="Geo Longitude"  value="<?php echo $toko['geo_long']; ?>" />

      <button type="button" onclick="getLocation()">Dapatkan Geolokasi</button>

      <a href="<?php echo site_url('toko'); ?>"><button type="button" class="btn btn-primary">Batal</button>
      </a>
      <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
  </div>

  <?php $this->load->view('Script/geolokasi') ?>