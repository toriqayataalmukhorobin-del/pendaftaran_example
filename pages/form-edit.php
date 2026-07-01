<?php
include("../config.php");

// kalau tidak ada id di query string
if (!isset($_GET['id'])) {
    header('Location: list-siswa.php');
    exit;
}

// ambil id dari query string
$id = $_GET['id'];

// buat query untuk ambil data dari database
$sql = "SELECT * FROM calon_siswa WHERE id=$id";
$query = mysqli_query($db, $sql);
$siswa = mysqli_fetch_assoc($query);

// jika data yang di-edit tidak ditemukan
if (mysqli_num_rows($query) < 1) {
    die("Data tidak ditemukan...");
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <title>Formulir Edit Siswa | SMK Mutuharjo</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <?php include('nav.php'); ?>
    <header>
        <h3>Formulir Edit Siswa</h3>
    </header>

    <form action="../proses-edit.php" method="POST">
        <fieldset>
            <legend>Edit Data Diri</legend>
            <input type="hidden" name="id" value="<?php echo $siswa['id'] ?>" />

            <div class="form-group">
                <label for="nama">Nama Lengkap</label>
                <input type="text" name="nama" placeholder="Masukkan nama lengkap" value="<?php echo $siswa['nama'] ?>" required />
            </div>
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <textarea name="alamat" placeholder="Masukkan alamat lengkap" required><?php echo $siswa['alamat'] ?></textarea>
            </div>
            <div class="form-group">
                <label>Jenis Kelamin</label>
                <?php $jk = $siswa['jenis_kelamin']; ?>
                <div class="radio-group">
                    <label><input type="radio" name="jenis_kelamin" value="laki-laki" <?php echo ($jk == 'laki-laki') ? "checked" : "" ?> required> Laki-laki</label>
                    <label><input type="radio" name="jenis_kelamin" value="perempuan" <?php echo ($jk == 'perempuan') ? "checked" : "" ?>> Perempuan</label>
                </div>
            </div>
            <div class="form-group">
                <label for="agama">Agama</label>
                <?php $agama = $siswa['agama']; ?>
                <select name="agama">
                    <option <?php echo ($agama == 'Islam') ? "selected" : "" ?>>Islam</option>
                    <option <?php echo ($agama == 'Kristen') ? "selected" : "" ?>>Kristen</option>
                    <option <?php echo ($agama == 'Hindu') ? "selected" : "" ?>>Hindu</option>
                    <option <?php echo ($agama == 'Budha') ? "selected" : "" ?>>Budha</option>
                </select>
            </div>
            <div class="form-group">
                <label for="sekolah_asal">Sekolah Asal</label>
                <input type="text" name="sekolah_asal" placeholder="Masukkan nama sekolah asal" value="<?php echo $siswa['sekolah_asal'] ?>" required />
            </div>
            <div class="form-group">
                <input type="submit" value="SIMPAN PERUBAHAN" name="simpan" />
            </div>
        </fieldset>
    </form>
</body>
</html>