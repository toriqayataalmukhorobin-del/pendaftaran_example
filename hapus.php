<?php
session_start();

if (!isset($_SESSION['admin'])) {
    die("Akses ditolak. Hanya admin yang boleh menghapus data.");
}

include("config.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM calon_siswa WHERE id=$id";
    $query = mysqli_query($db, $sql);

    if ($query) {
        header('Location: pages/list-siswa.php?hapus=berhasil');
    } else {
        die("Gagal menghapus...");
    }
} else {
    die("Akses dilarang...");
}
?>