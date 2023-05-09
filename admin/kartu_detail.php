<?php
$id = $_REQUEST['id'];
$model = new Kartu();
$kartu = $model->getKartu($id);

?>
<div>
    <h3><?= $kartu['kode'] ?></h3>
</div>