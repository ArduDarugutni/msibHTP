<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Gaji Pegawai</title>
</head>

<body>
    <form method="post">
        <table>
            <h2>Form Gaji Pegawai</h2>

            <tr>
                <td><label>Nama Pegawai</label></td>
                <td>:</td>
                <td><input type="text" name="nama"></td>
            </tr>
            <tr>
                <td><label>Jabatan</label></td>
                <td>:</td>
                <td><select name="jabatan">
                        <option>--Kategori Jabatan--</option>
                        <option value="Manager">Manager</option>
                        <option value="Asisten">Asisten</option>
                        <option value="Kabag">Kabag</option>
                        <option value="Staff">Staff</option>
                    </select></td>
            </tr>
            <tr>
                <td><label>Status Keagamaan</label></td>
                <td>:</td>
                <td><input type="radio" name="keagamaan" value="Muslim">Muslim
                    <input type="radio" name="keagamaan" value="Non-Muslim">Non-Muslim
                </td>
            </tr>
            <tr>
                <td><label>Status Pernikahan</label></td>
                <td>:</td>
                <td><input type="radio" name="status" value="Menikah">Menikah
                    <input type="radio" name="status" value="Belum Menikah">Belum Menikah
                </td>
            </tr>
            <tr>
                <td><label>Jumlah Anak</label></td>
                <td>:</td>
                <td><input type="number" name="anak" min="0"></td>
            </tr>
            <tr>
                <td><input type="submit" name="submit" value="Hitung Gaji"></td>
            </tr>
        </table>
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $nama = $_POST['nama'];
        $jabatan = $_POST['jabatan'];
        $status = $_POST['status'];
        $anak = $_POST['anak'];
        $keagamaan = $_POST['keagamaan'];

        // Tentukan gaji pokok
        switch ($jabatan) {
            case 'Manager':
                $gapok = 20000000;
                break;
            case 'Asisten':
                $gapok = 15000000;
                break;
            case 'Kabag':
                $gapok = 10000000;
                break;
            case 'Staff':
                $gapok = 4000000;
                break;
            default:
                $gapok = 0;
                break;
        }

        // Tentukan tunjangan jabatan
        $tunjangan_jabatan = 0.2 * $gapok;

        // Tentukan tunjangan keluarga
        if ($status == 'Menikah') {
            if ($anak == 1 || $anak == 2) {
                $tunjangan_keluarga = 0.05 * $gapok;
            } elseif ($anak >= 3 && $anak <= 5) {
                $tunjangan_keluarga = 0.1 * $gapok;
            } else {
                $tunjangan_keluarga = 0;
            }
        } else {
            $tunjangan_keluarga = 0;
        }

        // Tentukan gaji kotor
        $gaji_kotor = $gapok + $tunjangan_jabatan + $tunjangan_keluarga;

        // Tentukan zakat profesi
        if ($keagamaan == 'Muslim') {
            $zakat_profesi = $gaji_kotor >= 6000000 ? 0.025 * $gaji_kotor : 0;
        }
        // Tentukan take home pay
        $take_home_pay = $gaji_kotor - $zakat_profesi;

        // Tampilkan hasil
        echo '<br>';
        echo "<h3>Hasil Perhitungan:</h3>";
        echo "Nama : $nama\n" . "<br>";
        echo "Jabatan : $jabatan\n" . "<br>";
        echo "Status Keagamaan : $keagamaan\n" . "<br>";
        echo "Status Pernikahan : $status\n" . "<br>";
        echo "Jumlah Anak : $anak\n" . "<br>";
        echo 'Gaji Pokok : ' . number_format($gapok, 0, ',', '.') . '<br>';
        echo 'Tunjangan Jabatan : ' . number_format($tunjangan_jabatan, 0, ',', '.') . '<br>';
        echo 'Tunjangan Keluarga : ' . number_format($tunjangan_keluarga, 0, ',', '.') . '<br>';
        echo 'Gaji Kotor : ' . number_format($gaji_kotor, 0, ',', '.') . '<br>';
        echo 'Zakat Profesi : ' . number_format($zakat_profesi, 0, ',', '.') . '<br>';
        echo 'Take Home Pay : ' . number_format($take_home_pay, 0, ',', '.') . '<br>';
    }
    ?>
</body>

</html>