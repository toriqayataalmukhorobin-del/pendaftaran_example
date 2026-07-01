<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php?pesan=belum_login");
    exit;
}
include("../config.php");
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <title>Pendaftaran Siswa Baru | SMK Mutuharjo</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <?php include('nav.php'); ?>
    <header>
        <h3>Siswa yang sudah mendaftar</h3>
        <a href="../logout.php" style="position:absolute; top:15px; right:70px; background:linear-gradient(135deg,#ff416c,#ff4b2b); color:white; padding:8px 16px; border-radius:8px; text-decoration:none; font-size:13px; font-weight:600;">🚪 Logout</a>
    </header>

    <br>

    <div class="table-wrapper">
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Jenis Kelamin</th>
                    <th>Agama</th>
                    <th>Sekolah Asal</th>
                    <th>Tindakan</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM calon_siswa";
                $query = mysqli_query($db, $sql);

                while ($siswa = mysqli_fetch_array($query)) {
                    echo "<tr>";
                    echo "<td>" . $siswa['id'] . "</td>";
                    echo "<td>" . htmlspecialchars($siswa['nama']) . "</td>";
                    echo "<td>" . htmlspecialchars($siswa['alamat']) . "</td>";
                    echo "<td>" . htmlspecialchars($siswa['jenis_kelamin']) . "</td>";
                    echo "<td>" . htmlspecialchars($siswa['agama']) . "</td>";
                    echo "<td>" . htmlspecialchars($siswa['sekolah_asal']) . "</td>";
                    echo "<td>";
                    echo "<a href='form-edit.php?id=" . $siswa['id'] . "' class='btn-edit'>Edit</a> ";
                    echo "<a href='../hapus.php?id=" . $siswa['id'] . "' class='btn-delete'>Hapus</a>";
                    echo "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <p class="total-data">Total: <?php echo mysqli_num_rows($query) ?></p>
</body>
</html>