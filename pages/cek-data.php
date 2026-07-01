<?php include("../config.php"); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <title>Cek Data Saya | SMK Mutuharjo</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <?php include('nav.php'); ?>
    <header>
        <h3>Dasbor Siswa</h3>
    </header>

    <?php
    if (!isset($_GET['cari']) || trim($_GET['cari']) == '') {
        // Jika diakses tanpa parameter nama, kembalikan ke portal login
        header("Location: login.php");
        exit;
    }

    if (isset($_GET['pesan']) && $_GET['pesan'] == 'sukses') {
        echo "<p style='text-align:center; color:#0052cc; font-weight:bold; background:rgba(255,255,255,0.85); padding:15px; max-width:550px; margin:20px auto 0; border-radius:12px; backdrop-filter:blur(10px); border:1px solid rgba(255,255,255,0.6); box-shadow:0 10px 30px rgba(0,0,0,0.05);'>Perubahan Data Berhasil Disimpan!</p>";
    }

    if (isset($_GET['cari']) && trim($_GET['cari']) !== '') {
        $cari = trim($_GET['cari']);
        $cari = mysqli_real_escape_string($db, $cari);

        $sql = "SELECT * FROM calon_siswa WHERE nama LIKE '%$cari%'";
        $query = mysqli_query($db, $sql);

        if ($query && mysqli_num_rows($query) > 0) {
            echo "<div class='table-wrapper'>";
            echo "<table>";
            echo "<thead><tr><th>ID</th><th>Nama</th><th>Alamat</th><th>Jenis Kelamin</th><th>Agama</th><th>Sekolah Asal</th><th>Aksi</th></tr></thead>";
            echo "<tbody>";
            while ($siswa = mysqli_fetch_array($query)) {
                echo "<tr>";
                echo "<td>" . $siswa['id'] . "</td>";
                echo "<td>" . htmlspecialchars($siswa['nama']) . "</td>";
                echo "<td>" . htmlspecialchars($siswa['alamat']) . "</td>";
                echo "<td>" . htmlspecialchars($siswa['jenis_kelamin']) . "</td>";
                echo "<td>" . htmlspecialchars($siswa['agama']) . "</td>";
                echo "<td>" . htmlspecialchars($siswa['sekolah_asal']) . "</td>";
                echo "<td>";
                echo "<a href='form-edit.php?id=" . $siswa['id'] . "' class='btn-edit'>Edit Data</a>";
                echo "</td>";
                echo "</tr>";
            }
            echo "</tbody>";
            echo "</table>";
            echo "</div>";
        } else if ($query) {
            echo "<p style='text-align:center; color:#ff416c; font-weight:bold; background:rgba(255,255,255,0.85); padding:15px; max-width:500px; margin:auto; border-radius:8px; backdrop-filter:blur(10px); border:1px solid rgba(255,255,255,0.6);'>Data tidak ditemukan. Pastikan nama yang diketik benar.</p>";
        } else {
            echo "<p style='text-align:center; color:red;'>Error sistem: " . mysqli_error($db) . "</p>";
        }
    }
    ?>
    <a href="login.php" style="position: fixed; bottom: 0; right: 0; width: 40px; height: 40px; opacity: 0; z-index: 9999; cursor: default;" title=""></a>
</body>
</html>
