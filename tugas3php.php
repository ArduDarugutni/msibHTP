<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas 3 PHP</title>

</head>
<style>
    table {
        border-collapse: collapse;
        width: 100%;
        font-family: Arial, sans-serif;
        text-align: center;
        background-color: lavender;
        /* tambahkan warna background */
    }

    th,
    td {
        border: 1px solid black;
        padding: 8px;
    }

    th {
        background-color: lightblue;
        color: white;
        text-align: center;
        font-weight: bold;
        font-size: 18px;
    }

    td {
        font-size: 16px;
    }

    tfoot tr td {
        background-color: lightblue;
        color: white;
        font-weight: bold;
    }
</style>

<body>

    <?php
    $m1 = ['NIM' => '01111021', 'nama' => 'Andi', 'nilai' => 80];
    $m2 = ['NIM' => '01111022', 'nama' => 'Ani', 'nilai' => 70];
    $m3 = ['NIM' => '01111023', 'nama' => 'Ari', 'nilai' => 50];
    $m4 = ['NIM' => '01111024', 'nama' => 'Aji', 'nilai' => 40];
    $m5 = ['NIM' => '01111025', 'nama' => 'Ali', 'nilai' => 90];
    $m6 = ['NIM' => '01111026', 'nama' => 'Ai', 'nilai' => 75];
    $m7 = ['NIM' => '01111027', 'nama' => 'Budi', 'nilai' => 30];
    $m8 = ['NIM' => '01111028', 'nama' => 'Bani', 'nilai' => 85];
    $mahasiswa = [$m1, $m2, $m3, $m4, $m5, $m6, $m7, $m8];
    $ar_judul = ['No', 'NIM', 'Nama', 'Nilai', 'Keterangan', 'Grade', 'Predikat'];

    /*1. Buat grade*/
    function get_grade($nilai)
    {
        if ($nilai >= 85 && $nilai <= 100) {
            return 'A';
        } else if ($nilai >= 75 && $nilai < 85) {
            return 'B';
        } else if ($nilai >= 60 && $nilai < 75) {
            return 'C';
        } else if ($nilai >= 30 && $nilai < 60) {
            return 'D';
        } else if ($nilai >= 0 && $nilai < 30) {
            return 'E';
        } else {
            return '';
        }
    }

    /*2. Buat Keterangan jumlah mahasiswa, nilai tertinggi, nilai terendah, rata rata Masukan kedalam tfoot */
    // hitung jumlah, nilai tertinggi, nilai terendah, dan rata-rata
    $count = count($mahasiswa);
    $nilai_max = max(array_column($mahasiswa, 'nilai'));
    $nilai_min = min(array_column($mahasiswa, 'nilai'));
    $nilai_avg = array_sum(array_column($mahasiswa, 'nilai')) / $count;

    ?>

    <table border="1px" width="100%" bgcolor="blue">
        <thead>

            <tr>
                <?php
                foreach ($ar_judul as $judul) {
                ?>
                    <th><?= $judul ?></th>
                <?php } ?>
            </tr>

        </thead>
        -->
        <tbody>
            <?php
            /* 3. Buat predikat dari nilai menggunakan switch case */
            $no = 1;
            foreach ($mahasiswa as $mhs) {
                $ket = ($mhs['nilai'] >= 60) ? 'Lulus' : 'Tidak lulus';
                $grade = get_grade($mhs['nilai']);
                $predikat = '';
                switch ($grade) {
                    case 'A':
                        $predikat = 'Sangat Baik';
                        break;
                    case 'B':
                        $predikat = 'Baik';
                        break;
                    case 'C':
                        $predikat = 'Cukup';

                    case 'D':
                        $predikat = 'Kurang';
                        break;
                    case 'E':
                        $predikat = 'Sangat Kurang';
                        break;
                }
            ?>

                <tr>
                    <td><?= $no ?></td>
                    <td><?= $mhs['NIM'] ?></td>
                    <td><?= $mhs['nama'] ?></td>
                    <td><?= $mhs['nilai'] ?></td>
                    <td><?= $ket ?></td>
                    <td><?= $grade ?></td>
                    <td><?= $predikat ?></td>
                </tr>
            <?php
                $no++;
            }
            ?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="3">Jumlah Mahasiswa</td>
                <td><?= count($mahasiswa) ?></td>

            <tr>
                <td colspan="3">Nilai Tertinggi</td>
                <td><?= max(array_column($mahasiswa, 'nilai')) ?></td>

            </tr>
            <tr>
                <td colspan="3">Nilai Terendah</td>
                <td><?= min(array_column($mahasiswa, 'nilai')) ?></td>

            </tr>
            <tr>
                <td colspan="3">Rata-rata Nilai</td>
                <td><?= array_sum(array_column($mahasiswa, 'nilai')) / count($mahasiswa) ?></td>
            </tr>
        </tfoot>
    </table>

</body>

</html>