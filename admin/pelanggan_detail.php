<?php
$id = $_REQUEST['id'];
$model = new Pelanggan();
$pelanggan = $model->getPelanggan($id);

?>
<div>
    <h3><?= $pelanggan['kode'] ?></h3>
</div>