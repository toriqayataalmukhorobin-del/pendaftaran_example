<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <title>Portal Login | SMK Mutuharjo</title>
    <link rel="stylesheet" href="../css/style.css">
    <style>
        .login-container {
            max-width: 450px;
            margin: 50px auto;
        }

        .login-box {
            background: rgba(255, 255, 255, 0.85);
            border-radius: 16px;
            padding: 35px 30px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.6);
            transition: 0.3s;
        }

        .login-box:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        }

        .login-box h3 {
            text-align: center;
            color: #0052cc;
            margin-bottom: 15px;
            font-size: 22px;
            border-bottom: 2px solid rgba(0, 102, 255, 0.2);
            padding-bottom: 15px;
        }

        .login-desc {
            font-size: 13px;
            text-align: center;
            color: #555;
            margin-bottom: 25px;
            line-height: 1.5;
        }

        .btn-login {
            background: linear-gradient(135deg, #00c6ff, #0072ff) !important;
            width: 100%;
        }
    </style>
</head>
<body>
    <?php include('nav.php'); ?>
    <header>
        <h3>Halaman Login Akses Data</h3>
    </header>

    <div class="login-container">
        <div class="login-box">
            <h3>Login</h3>
            <p class="login-desc">Masukkan Nama (Siswa) atau (Admin).</p>
            <?php
            if (isset($_GET['pesan']) && $_GET['pesan'] == 'logout') {
                echo "<p style='color:#0072ff; font-weight:bold; font-size:13px; text-align:center; background:rgba(0,114,255,0.1); padding:8px; border-radius:5px;'>Anda berhasil logout.</p>";
            }
            if (isset($_GET['pesan']) && $_GET['pesan'] == 'belum_login') {
                echo "<p style='color:#ff416c; font-weight:bold; font-size:13px; text-align:center; background:rgba(255,65,108,0.1); padding:8px; border-radius:5px;'>Anda harus login admin!</p>";
            }
            ?>
            <form action="../proses-login.php" method="POST">
                <div class="form-group">
                    <label for="username">Username / Nama Pendaftar</label>
                    <input type="text" name="username" placeholder="Ketik nama atau username..." required />
                </div>
                <div class="form-group">
                    <label for="password">Password <span style="font-size:11px; color:#888;">(Kosongkan jika siswa)</span></label>
                    <input type="password" name="password" placeholder="Masukkan password..." style="width: 100%; padding: 12px 15px; border-radius: 8px; border: 1px solid rgba(0,0,0,0.1); font-family: 'Poppins', sans-serif; font-size: 14px; box-sizing: border-box;" />
                </div>
                <div class="form-group" style="margin-top: 30px;">
                    <input type="submit" value="MASUK KE PORTAL" name="login" class="btn-login" />
                </div>
            </form>
        </div>
    </div>
</body>
</html>
