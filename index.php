<?php

require_once('lingkaran.php');
require_once('persegi_panjang.php');
require_once('segitiga.php');

$lingkaran = new Lingkaran(14);
$persegiPanjang = new PersegiPanjang(7, 5);
$segitiga = new Segitiga(8, 6);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Bentuk 2D</title>
    <style>
        table {
            border-collapse: collapse;
            margin: 0 auto;
        }

        th,
        td {
            padding: 10px;
            border: 1px solid black;
            text-align: center;
        }

        th {
            background-color: #2d9cdb;
            color: white;
        }

        td:first-child {
            text-align: left;
        }
    </style>
</head>

<body>
    <h2 style="text-align: center">Tugas PHP 6</h2>
    <table>
        <tr>
            <th>Nama Bidang</th>
            <th>Luas</th>
            <th>Keliling</th>
        </tr>
        <tr>
            <td><?php echo $lingkaran->namaBidang(); ?></td>
            <td><?php echo $lingkaran->luasBidang(); ?></td>
            <td><?php echo $lingkaran->kelilingBidang(); ?></td>
        </tr>
        <tr>
            <td><?php echo $persegiPanjang->namaBidang(); ?></td>
            <td><?php echo $persegiPanjang->luasBidang(); ?></td>
            <td><?php echo $persegiPanjang->kelilingBidang(); ?></td>
        </tr>
        <tr>
            <td><?php echo $segitiga->namaBidang(); ?></td>
            <td><?php echo $segitiga->luasBidang(); ?></td>
            <td><?php echo $segitiga->kelilingBidang(); ?></td>
        </tr>
    </table>

</body>

</html>