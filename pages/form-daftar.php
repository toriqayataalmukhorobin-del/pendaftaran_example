<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <title>Formulir Pendaftaran Siswa Baru | SMK MUTUHARJO</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <?php include('nav.php'); ?>
    <header>
        <h3>Formulir Pendaftaran Siswa Baru</h3>
    </header>

    <form action="../proses-pendaftaran.php" method="POST">
        <fieldset>
            <legend>Isi Data Diri</legend>
            <div class="form-group">
                <label for="nama">Nama Lengkap</label>
                <input type="text" name="nama" placeholder="Masukkan nama lengkap" required />
            </div>
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <textarea name="alamat" placeholder="Masukkan alamat lengkap" required></textarea>
            </div>
            <div class="form-group">
                <label>Jenis Kelamin</label>
                <div class="radio-group">
                    <label><input type="radio" name="jenis_kelamin" value="laki-laki" required> Laki-laki</label>
                    <label><input type="radio" name="jenis_kelamin" value="perempuan"> Perempuan</label>
                </div>
            </div>
            <div class="form-group">
                <label for="agama">Agama</label>
                <select name="agama">
                    <option>Islam</option>
                    <option>Kristen</option>
                    <option>Hindu</option>
                    <option>Budha</option>
                </select>
            </div>
            <div class="form-group">
                <label for="sekolah_asal">Sekolah Asal</label>
                <input type="text" name="sekolah_asal" placeholder="Masukkan nama sekolah asal" required />
            </div>
            <div class="form-group">
                <input type="submit" value="DAFTAR SEKARANG" name="daftar" />
            </div>
        </fieldset>
    </form>
</body>
</html>