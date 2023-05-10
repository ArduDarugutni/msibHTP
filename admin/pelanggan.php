<?php
// include_once 'top.php';
// include_once 'menu.php';
$model = new Pelanggan();
$Pelanggan = $model->Pelanggan();

// foreach ($data_produk as $row){    
//     print $row['kode'];
// }

?>
<h1 class="mt-4">Tables</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
    <li class="breadcrumb-item active">Tables</li>
</ol>
<div class="card mb-4">
    <div class="card-body">
        DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the
        <a target="_blank" href="https://datatables.net/">official DataTables documentation</a>
        .
    </div>
</div>
<div class="card mb-4">
    <div class="card-header">
        <!-- <i class="fas fa-table me-1"></i> -->
        <!-- Membuat tomboh mengarahkan ke file produk_form.php -->
        <a href="index.php?url=pelanggan_form" class="btn btn-primary btn-sm">Tambah</a>
    </div>
    <div class="card-body">
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode</th>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>Tempat Lahir</th>
                    <th>Tanggal Lahir</th>
                    <th>Email</th>
                    <th>Alamat</th>
                    <th>Id Kartu</th>
                    <th>Kartu Member</th>
                    <th>Action</th>

                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>No</th>
                    <th>Kode</th>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>Tempat Lahir</th>
                    <th>Tanggal Lahir</th>
                    <th>Email</th>
                    <th>Alamat</th>
                    <th>Id Kartu</th>
                    <th>Kartu Member</th>
                    <th>Action</th>

            </tfoot>
            <tbody>
                <?php
                $no = 1;
                foreach ($Pelanggan as $row) {

                ?>
                    <tr>
                        <td><?= $no ?></td>
                        <td><?= $row['kode'] ?></td>
                        <td><?= $row['nama_pelanggan'] ?></td>
                        <td><?= $row['jk'] ?></td>
                        <td><?= $row['tmp_lahir'] ?></td>
                        <td><?= $row['tgl_lahir'] ?></td>
                        <td><?= $row['email'] ?></td>
                        <td><?= $row['alamat'] ?></td>
                        <td><?= $row['kartu_id'] ?></td>
                        <td><?= $row['kartu_member'] ?></td>
                        <td>
                            <form action="pelanggan_controller.php" method="POST">
                                <a class="btn btn-info btn-sm" href="index.php?url=pelanggan_detail&id=<?= $row['id'] ?>">Detail</a>
                                <a class="btn btn-warning btn-sm" href="index.php?url=pelanggan_form&idedit=<?= $row['id'] ?>">Ubah</a>
                                <button class="btn btn-danger btn-sm" name="proses" value="hapus" onclick="return confirm('Anda yakin akan dihapus?')">Hapus</button>

                                <input type="hidden" name="idx" value="<?= $row['id'] ?>" />
                            </form>
                        </td>
                    </tr>
                <?php
                    $no++;
                }
                ?>

            </tbody>
        </table>
    </div>

</div>
</div>

<?php
// include_once 'bottom.php';
?>