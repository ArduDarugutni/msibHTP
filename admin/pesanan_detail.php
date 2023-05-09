<?php
$id = $_REQUEST['id'];
$model = new Pesanan();
$pesanan = $model->getPesanan($id);

?>
<div>
    <h3><?= $pesanan['tanggal'] ?></h3>
</div>