<br>
<?php
$obj_kartu = new Kartu();
$data_kartu = $obj_kartu->Kartu();
?>

<form action="kartu_controller.php" method="POST">
  <div class="form-group row">
    <label for="text" class="col-4 col-form-label">Kode</label>
    <div class="col-8">
      <input id="kode" name="kode" type="text" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <label for="text" class="col-4 col-form-label">Nama </label>
    <div class="col-8">
      <input id="nama" name="nama" type="text" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <label for="text" class="col-4 col-form-label">Diskon</label>
    <div class="col-8">
      <input id="diskon" name="diskon" type="text" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <label for="text" class="col-4 col-form-label">Iuran</label>
    <div class="col-8">
      <input id="iuran" name="iuran" type="text" class="form-control">
    </div>
  </div>

  <div class="form-group row">
    <div class="offset-4 col-8">
      <button name="proses" type="submit" value="simpan" class="btn btn-primary">Submit</button>
    </div>
  </div>
</form>