<br>
<?php
$obj_pelanggan = new Pelanggan();
$data_pelanggan = $obj_pelanggan->Pelanggan();
?>

<form action="pelanggan_controller.php" method="POST">
  <div class="form-group row">
    <label for="text" class="col-4 col-form-label">Kode</label>
    <div class="col-8">
      <input id="kode" name="kode" type="text" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <label for="text" class="col-4 col-form-label">Nama Pelanggan</label>
    <div class="col-8">
      <input id="nama_pelanggan" name="nama_pelanggan" type="text" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <label for="text" class="col-4 col-form-label">Jenis Kelamin</label>
    <div class="col-8">
      <input id="jk" name="jk" type="text" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <label for="text" class="col-4 col-form-label">Tempat Lahir</label>
    <div class="col-8">
      <input id="tmp_lahir" name="tmp_lahir" type="text" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <label for="text" class="col-4 col-form-label">Tanggal Lahir</label>
    <div class="col-8">
      <input id="tgl_lahir" name="tgl_lahir" type="date" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <label for="text" class="col-4 col-form-label">Email</label>
    <div class="col-8">
      <input id="email" name="email" type="email" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <label for="text" class="col-4 col-form-label">Alamat</label>
    <div class="col-8">
      <input id="alamat" name="alamat" type="text" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <label for="text" class="col-4 col-form-label">Id Kartu</label>
    <div class="col-8">
      <input id="kartu_id" name="kartu_id" type="text" class="form-control">
    </div>
  </div>
  </div>
  <div class="form-group row">
    <div class="offset-4 col-8">
      <button name="proses" type="submit" value="simpan" class="btn btn-primary">Submit</button>
    </div>
  </div>
</form>