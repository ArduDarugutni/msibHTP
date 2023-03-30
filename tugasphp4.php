<?php
$ar_prodi = [
  "SI" => "Sistem Informasi",
  "TI" => "Teknik Informatika",
  "ILKOM" => "Ilmu Komputer",
  "TE" => "Teknik Elektro"
];

$ar_skill = [
  "HTML" => 10,
  "CSS" => 10,
  "Javascript" => 20,
  "RWD Bootstrap" => 20,
  "PHP" => 30,
  "MySQL" => 30,
  "Laravel" => 40
];
?>

<fieldset style="background-color: aquamarine;">
  <legend>Form Registrasi</legend>
  <form method="POST">
    <table>
      <thead>
        <tr>
          <th>Form Registrasi</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>NIM:</td>
          <td><input type="text" name="nim"></td>
        </tr>
        <tr>
          <td>Nama:</td>
          <td><input type="text" name="nama"></td>
        </tr>
        <tr>
          <td>Jenis Kelamin:</td>
          <td>
            <input type="radio" name="jk" id="laki-laki" value="L">
            <label for="laki-laki">Laki-Laki</label>&nbsp;
            <input type="radio" name="jk" id="perempuan" value="P">
            <label for="perempuan">Perempuan</label>
          </td>
        </tr>
        <tr>
          <td>Program Studi:</td>
          <td>
            <select name="prodi">
              <?php foreach ($ar_prodi as $prodi => $nama_prodi) { ?>
                <option value="<?= $prodi ?>"><?= $nama_prodi ?></option>
              <?php } ?>
            </select>
          </td>
        </tr>
        <tr>
          <td>Skill Programming:</td>
          <td>
            <?php foreach ($ar_skill as $skill => $skor) { ?>
              <input type="checkbox" name="skill[]" id="<?= $skill ?>" value="<?= $skill ?>">
              <label for="<?= $skill ?>"><?= $skill ?></label>
            <?php } ?>
          </td>
        </tr>
        <tr>
          <td>Email:</td>
          <td><input type="email" name="email"></td>
        </tr>
      </tbody>
      <tfoot>
        <tr>
          <th colspan="2"><button name="proses">Submit</button></th>
        </tr>
      </tfoot>
    </table>
  </form>
</fieldset>

<?php if (isset($_POST['proses'])) {
  $nim = $_POST['nim'];
  $nama = $_POST['nama'];
  $jk = $_POST['jk'];
  $prodi = $_POST['prodi'];
  $skill = isset($_POST['skill']) ? $_POST['skill'] : [];
  $email = $_POST['email'];

  $skor = 0;
  foreach ($skill as $s) {
    if (isset($ar_skill[$s])) {
      $skor += $ar_skill[$s];
    }
  }

  function kategori_skill($skor)
  {
    if ($skor >= 100 && $skor <= 150) {
      return "Sangat Baik";
    }elseif ($skor >= 60 && $skor < 100) {
      return "Baik";
    } elseif ($skor >= 40 && $skor < 60) {
      return "Cukup";
    } elseif ($skor >= 0 && $skor < 40) {
      return "Kurang";
    } else {
      return "Tidak Memadai";
    }
  }

  $kategori = kategori_skill($skor);
?>

  <fieldset style="background-color: bisque;">
    <legend>Profil Mahasiswa</legend>
    <table>
      <tr>
        <td>NIM</td>
        <td>:</td>
        <td><?= $nim ?></td>
      </tr>
      <tr>
        <td>Nama</td>
        <td>:</td>
        <td><?= $nama ?></td>
      </tr>
      <tr>
        <td>Jenis Kelamin:</td>
        <td>:</td>
        <td><?= $jk == 'L' ? 'Laki-Laki' : 'Perempuan' ?></td>
      </tr>
      <tr>
        <td>Program Studi</td>
        <td>:</td>
        <td><?= $ar_prodi[$prodi] ?></td>
      </tr>
      <tr>
        <td>Skill Programming</td>
        <td>:</td>
        <td>
          <?php foreach ($skill as $s) { ?>
            <?= $s ?>,
          <?php } ?>
        </td>
      </tr>
      <tr>
        <td>Skor Skill</td>
        <td>:</td>
        <td><?= $skor ?></td>
      </tr>
      <tr>
        <td>Kategori Skill</td>
        <td>:</td>
        <td><?= $kategori ?></td>
      </tr>
      <tr>
        <td>Email</td>
        <td>:</td>
        <td><?= $email ?></td>
      </tr>
    </table>
  </fieldset>
<?php } ?>

