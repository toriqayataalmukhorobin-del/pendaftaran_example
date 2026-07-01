<?php
session_start();

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Hardcode otentikasi
    if ($username == 'admin' && $password == '5135513') {
        $_SESSION['admin'] = true;
        header("Location: pages/list-siswa.php?login=berhasil");
    } else {
        // Jika bukan kredensial admin, anggap sebagai siswa yang ingin mencari datanya
        $nama_url = urlencode($username);
        header("Location: pages/cek-data.php?cari=$nama_url&login=berhasil");
    }
} else {
    die("Akses dilarang...");
}
?>
